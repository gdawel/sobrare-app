<?php

namespace App\Livewire\Relatorios;

use App\Jobs\GerarRelatorios;
use App\Models\User;
use App\Models\Orders;
use App\Models\Testes;
use Livewire\Component;
use App\Models\Perguntas;
use App\Models\OpcoesRespostas;
use App\Models\Useranswers;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Carbon;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

use App\Models\ControleRelatorios;
use App\Models\Orderitems;

use Livewire\Attributes\Layout;
use App\Models\Historicomedicos;
use App\Models\TextoResposta;

use Jantinnerezo\LivewireAlert\LivewireAlert;

use Illuminate\Support\Facades\Http; 



/**
 * @property array $userAnswer->areasImpactadas
 * @property string|null $userAnswer->intensidadeTextoResposta
 */
class ControladorRelatorios extends Component
{
    
    public $resultadoTeste;
    public $dataFinalTeste;
    public $orders_id;
    public $orderItem_id;
    public $testes_id;
    public $tituloTeste;
    public $textoIntro; 
    public $textoFecha; 
    public $textoRodape; 
    public $parametrosParaRelatorios =[];
    public $useranswers =[];
    public $perguntas = [];
    public $colecaoRespostas = [];
    public $codTeste;

    #[Url]
    public $cctt;
    #[Url]
    public $ccxx;
    #[Url]
    public $ccii;

    public $userId;
    public $nomeCliente;
    public $idadeCliente;
    public $sexoBiologico;
    public $estadoNascimentoCliente;
    public $dadosCliente=[];
    public $dataEmissao;
    public $dadosRelatorio=[];

    public $comunicacao = 0;
    public $pensamento = 0;
    public $atencao = 0;
    public $tensao = 0;
    public $social = 0;
    public $emocional = 0;
    public $mental = 0;
    public $sexualidade = 0;

    public $cerebroSocial = 0;
    public $cerebroMesclado = 0;
    public $cerebroSistematizador = 0;

    public $percentSistematizacao = 0;
    public $percentRegulacao = 0;
    public $percetInteresses = 0;
    public $percentAcumulacao = 0;
    public $percentMesmice = 0;
    public $percentSensibilidade = 0;
    public $percentRestricao = 0;
    public $percentCM = 0;
    public $percentIM = 0;
    public $percentRS = 0;
    public $diagnosticoCM;
    public $diagnosticoIM;
    public $diagnosticoRS;
    public $percentSomaTendencia = 0;

    // Variáveis para o Relatório 14 - AUTORREALIZAÇÃO e NEURODIVERGÊNCIA
    public $constrangimento = 0;
    public $regrasSociais = 0;
    public $contextos = 0;
    public $fragilizar = 0;
    public $controladora = 0;
    public $impulsiva = 0;
    public $baseRisco = 0;

    public $alimentBalanceada = 0;
    public $exercRegular = 0;
    public $gerenciaEstresse = 0;
    public $relaxMental = 0;
    public $redesApoio = 0;
    public $acompClinico = 0;
    public $organizTarefas = 0;
    public $atualizarCapacitar = 0;

    public $arrayTipoItemNeurodiv = [];
    public $arrayDiscipFavorNeurodiv = [];

    use LivewireAlert;
    
    /* Dawel: retirado: 30/07/2024 - #[On('resultadoTeste')] */
    public function mount() {

    $this->alert('success', 'Seu relatório está sendo gerado e estará disponível para baixar pelo seu painel de pedidos. Aguarde a página recarregar.', [
                    'position' => 'center',
                    'timer' => 6000,
                    'toast' => true,
                    'timerProgressBar' => true,
                ]);
        
        /*  cctt: código do teste testes_id
            ccxx: código do pedido orders_id
            ccii: código do item do pedido orderItems_id
        
        */

        /* $checkParameters = "mount = ccxx=".$this->ccxx . " / cctt=". $this->cctt . " / ccii=". $this->ccii;
        dd($checkParameters); */

        $this->orders_id = $this->ccxx;
        $this->testes_id = $this->cctt;
        $this->orderItem_id = $this->ccii;

        //dd($this->orderItem_id);

        $userAnswers  = Useranswers::with('pergunta', 'opcaoResposta:id,numSeqResp,textoResposta,valorResposta',
                                                    'textoResposta')
                                    ->where('orderitems_id', $this->orderItem_id)
                                    ->where('testes_id', $this->testes_id)
                                    ->get();
        /** @var \App\Models\Useranswers[] $userAnswers */
        foreach ($userAnswers as &$userAnswer) {
            $textoRespostas = [];
            $userAnswer->areasImpactadas = [];
            $opcRespCheckbox = $userAnswer->opcRespCheckbox; // Get the JSON string
    
            if ($opcRespCheckbox) { // Check if it's not null or empty
                $decodedOpcRespCheckbox = json_decode($opcRespCheckbox, true);
    
                if (is_array($decodedOpcRespCheckbox)) {
                    // The keys of this array are likely the IDs if it was stored as an associative array
                    // If it was stored as a simple array of IDs, then $decodedOpcRespCheckbox itself contains the IDs
                    $opcaoRespostaIds = $decodedOpcRespCheckbox;
    
                    $retrievedOpcoes = OpcoesRespostas::whereIn('id', $opcaoRespostaIds)->get();
                    
    
                    $textoRespostas = $retrievedOpcoes->pluck('textoResposta')->toArray();
                } else {
                    // Handle the case where JSON decoding failed
                    $userAnswer->areasImpactadas = [];
                    continue;
                }
            }
    
            $userAnswer->areasImpactadas = $textoRespostas;

            // Handle opcRespIntensidade
            $intensidadeTextoResposta = null;
            $opcRespIntensidadeId = $userAnswer->opcRespIntensidade;

            if ($opcRespIntensidadeId !== null) {
                $opcaoIntensidade = OpcoesRespostas::find($opcRespIntensidadeId);
                if ($opcaoIntensidade) {
                    $intensidadeTextoResposta = $opcaoIntensidade->textoResposta;
                }
            }
            $userAnswer->intensidadeTextoResposta = $intensidadeTextoResposta;
        }
    
        //dd($userAnswers); // Final check
        //dd($this->resultadoTeste);

        

        $this->dataFinalTeste = $userAnswers->max('created_at')->format('d-m-Y');
        //dd($this->dataFinalTeste);
        

        //dd($this->useranswers);
        $user = User::where('id', auth()->user()->id)->first();
        $this->userId = auth()->user()->id;
        $this->nomeCliente = $user['name'];
        $this->idadeCliente = Carbon::parse($user->data_nascimento)->age;
        $this->sexoBiologico = $user->sexo_biologico;
        $this->estadoNascimentoCliente = $user->estado_nascimento;
        $this->dadosCliente = Historicomedicos::where('orders_id', $this->orders_id)->first();

        $this->dataEmissao = Carbon::now()->format('d-m-Y');

        //dd($this->dadosCliente);
        
        $dadosDoTeste = Testes::where('id',$this->testes_id)->first();
        $this->tituloTeste = $dadosDoTeste->nomeTeste;
        $this->codTeste = $dadosDoTeste->codTeste;
        $this->textoIntro = $dadosDoTeste->textoIntro;
        $this->textoFecha = $dadosDoTeste->textoFecha;
        $this->textoRodape = $dadosDoTeste->textoRodape;

                
        $this->dadosRelatorio = [
            'tituloTeste' => $this->tituloTeste,
            'codTeste' => $this->codTeste,
            'textoIntro' => $this->textoIntro,
            'textoFecha' => $this->textoFecha,
            'textoRodape' => $this->textoRodape,
            'orders_id' => $this->orders_id,
            'idadeCliente' => $this->idadeCliente,
            'estadoNascimentoCliente' => $this->estadoNascimentoCliente,
            'nomeCliente' => $this->nomeCliente,
            'sexoBiologico' => $this->sexoBiologico,
            'dataEmissao' => $this->dataEmissao,
            'dataFinalTeste' => $this->dataFinalTeste,
            'resultadoTeste' => $userAnswers,
            'dadosCliente' => $this->dadosCliente,

        ];
        $this->resultadoTeste = $userAnswers;
     
        $nomePDF = "pdf/rel_" . $this->codTeste . "_" . $this->nomeCliente . "_Ped_" . $this->orders_id . ".pdf";

        $controleRelatorios = ControleRelatorios::where('orderitem_id', $this->orderItem_id)->first();
        if ($controleRelatorios) {
                $controleRelatorios->update(['testeStatus' => 'falha']);
            } else {
                // Opcional: Logar um erro para saber por que não foi encontrado
                Log::error("Não foi possível encontrar o registro em Controle Relatórios com ID: " . $this->orderItem_id);
            }
        $orderItens = Orderitems::find($this->orderItem_id);
        if ($orderItens) {
                $orderItens->update(['testeStatus' => 'falha']);
            } else {
                // Opcional: Logar um erro para saber por que não foi encontrado
                Log::error("Não foi possível encontrar o registro em OrderItem com ID: " . $this->orderItem_id);
            }

        /* 
            Os relatórios e gráficos são gerados em backend e o blade view apenas renderiza a view para gerar o pdf.
        */
        switch ($this->codTeste) {

            case '01-HstCrpEnrdvrgc':

                $relatorio = $this->dadosRelatorio;

/*              //   GerarRelatorios::dispatch($this->ccxx, $this->cctt, $this->ccii, $this->userId); */

                
                $relatorio = $this->dadosRelatorio;

                $controleRelatorios->update(['status' => 'gerando']);
                
                /* $checkParameters = "01-ccxx=".$this->ccxx . " / cctt=". $this->cctt . " / ccii=". $this->ccii;
                dd($checkParameters); */

                // GERAR RELATÓRIO EM PDF USANDO O DOMPDF
                //   
                try {
                    $pdf = Pdf::loadView('pdf.relat-01-hstcrpenrdvrgc', [
                            'dadosRelatorio' => $relatorio
                    ]);
                    $filePath = 'pdf/RELAT01-GD-TESTE-novo.pdf'; // Nome criado temporário para teste

                    // 4. Salve o PDF no storage privado do Laravel
                    Storage::disk('local')->put($nomePDF, $pdf->output());
                    //$pdf->save(storage_path($nomePDF));
                    
                    $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                    $orderItens->update(['testeStatus' => 'concluido']);
                    }
                
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                    $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");
                
                break;
            
            case '02-PrcpStrss':

                $somaTudo = 0;
                $somaB = 0;
                foreach ($this->resultadoTeste as $items) {
                
                    if($items->sequencia == 3 or $items->sequencia == 6 or $items->sequencia == 19 or $items->sequencia == 20) {
                        $somaB = $somaB + $items->opcaoResposta->valorResposta; 
                    }
                    $somaTudo = $somaTudo + $items->opcaoResposta->valorResposta;
                }
                $somaA = $somaTudo - $somaB;
                $somaC = 32 - $somaB;
                $somaD = $somaA + $somaC;
                $resultado = $somaD / 21;
                $checa = "t=".$somaTudo."/a=".$somaA."/b=".$somaB."/c=".$somaC."/d=".$somaD." => Resultado=".$resultado;
                //dd($checa);

                
                $qualRelatorio = 'livewire.relatorios.relat-'.$this->dadosRelatorio['codTeste'];
                
                $controleRelatorios->update(['status' => 'gerando']);

                // (Esta é a mesma configuração do Chart.js que estava no blade view)
                $chartConfig = [
                    'type' => 'horizontalBar',
                    'data' => [
                        // O label foi removido daqui para virar um título
                        'labels' => [''],
                        'datasets' => [[
                            'data' => [number_format($resultado, 2, '.', '')],
                            'backgroundColor' => 'rgba(54, 162, 235, 0.7)',
                            'borderColor' => 'rgba(54, 162, 235, 1)',
                            'borderWidth' => 1,
                        ]],
                    ],
                    'options' => [
                        // Opção 2: Adiciona o título em uma linha separada, acima do gráfico
                        'title' => [
                            'display' => true,
                            'text' => 'Nível de Estresse Percebido',
                            'fontSize' => 16,
                            'fontColor' => '#333',
                            'padding' => 20,
                        ],
                        'legend' => ['display' => false],
                        'scales' => [
                            'xAxes' => [['ticks' => ['min' => 0, 'max' => 6]]],
                            'yAxes' => [['gridLines' => ['display' => false]]],
                        ],
                        // Opção 3: Adiciona o plugin para mostrar o valor na barra
                        'plugins' => [
                            'datalabels' => [
                                'display' => true,
                                'align' => 'end',   // Posição do texto: no final da barra
                                'anchor' => 'end',  // Ponto de ancoragem: no final da barra
                                'color' => '#1a202c',
                                'font' => [
                                    'weight' => 'bold',
                                    'size' => 14,
                                ],
                            
                            ],
                        ],
                    ],
                ];

                
                $chartApiUrl = 'https://quickchart.io/chart?w=330&h=130&bkg=transparent&c=' . urlencode(json_encode($chartConfig));

                
                $response = Http::get($chartApiUrl);

            
                $chartImageUrl = null;
                if ($response->successful()) {
                    // A string 'data:image/png;base64,' é essencial para o navegador entender que isso é uma imagem
                    $chartImageUrl = 'data:image/png;base64,' . base64_encode($response->body());
                }
                
                try {
                        $pdf = Pdf::loadView('pdf.relat-02-prcpstrss', [
                        'dadosRelatorio' => $this->dadosRelatorio,
                        'resultado' => $resultado,
                        'chartImageUrl' => $chartImageUrl, // Passa a imagem (ou null se a API falhar)
                ]);
                       
                        Storage::disk('local')->put($nomePDF, $pdf->output());

                         $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                         $orderItens->update(['testeStatus' => 'concluido']);
                    }
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");

            break;

            case '03-OrdncAsst':

                // GerarRelatorios::dispatch($this->ccxx, $this->cctt, $this->ccii, $this->userId);
                foreach ($this->resultadoTeste as $items) {
                
                    /* A Minha Comunicação */
                    if($items->sequencia == 1 or $items->sequencia == 9 or $items->sequencia == 12 or 
                                                $items->sequencia == 14) {
                        $this->comunicacao = $this->comunicacao + $items->opcaoResposta->valorResposta; 
                    }

                    /* Meu Pensamento */
                    if($items->sequencia == 3 or $items->sequencia == 4 or $items->sequencia == 13 or 
                                                $items->sequencia == 21 or $items->sequencia == 26 or $items->sequencia == 27) {
                        $this->pensamento = $this->pensamento + $items->opcaoResposta->valorResposta; 
                    }
                    
                    /* Meu Processo de Atenção */
                    if($items->sequencia == 5 or $items->sequencia == 7 or $items->sequencia == 17 or 
                                                $items->sequencia == 18 or $items->sequencia == 19) {
                        $this->atencao = $this->atencao + $items->opcaoResposta->valorResposta; 
                    }
                    
                    /* Minha Tensão Muscular */
                    if($items->sequencia == 6 or $items->sequencia == 10 or $items->sequencia == 20 or 
                                                $items->sequencia == 23) {
                        $this->tensao = $this->tensao + $items->opcaoResposta->valorResposta; 
                    }
                    
                    /* Meu Desempenho Social */
                    if($items->sequencia == 2 or $items->sequencia == 8 or $items->sequencia == 15) {
                        $this->social = $this->social + $items->opcaoResposta->valorResposta; 
                    }

                    /* Meus Estados Emocionais */
                    if($items->sequencia == 11 or $items->sequencia == 22 or $items->sequencia == 24 or 
                                                $items->sequencia == 25) {
                        $this->emocional = $this->emocional + $items->opcaoResposta->valorResposta; 
                    }

                    /* Condições Mentais e Físicas */
                    if($items->sequencia == 28 or $items->sequencia == 29 or $items->sequencia == 30) {
                        $this->mental = $this->mental + $items->opcaoResposta->valorResposta; 
                    }

                    /* Minha Sexualidade e Lazer */
                    if($items->sequencia == 31 or $items->sequencia == 32 or $items->sequencia == 33 or 
                                                $items->sequencia == 34) {
                        $this->sexualidade = $this->sexualidade + $items->opcaoResposta->valorResposta; 
                    }
                }

                $dadosGrafico = [
                    ['Assuntos' => 'Comunicacao', 'Valor' => $this->comunicacao],
                    ['Assuntos' => 'Pensamento', 'Valor' => $this->pensamento],
                    ['Assuntos' => 'Atencao', 'Valor' => $this->atencao],
                    ['Assuntos' => 'Tensao', 'Valor' => $this->tensao],
                    ['Assuntos' => 'Social', 'Valor' => $this->social],
                    ['Assuntos' => 'Emocional', 'Valor' => $this->emocional],
                    ['Assuntos' => 'Mental', 'Valor' => $this->mental],
                    ['Assuntos' => 'Sexualidade', 'Valor' => $this->sexualidade],
                ];

                // 2. Prepare os dados para o formato que o Chart.js precisa
                $labels = array_column($dadosGrafico, 'Assuntos');
                $values = array_column($dadosGrafico, 'Valor');

                // 3. Defina a configuração do gráfico
                $chartConfig = [
                    'type' => 'horizontalBar',
                    'data' => [
                        'labels' => $labels,
                        'datasets' => [[
                            'label' => 'Relevância dos Assuntos',
                            'data' => $values,
                            'backgroundColor' => [ // Paleta de cores mantida
                                'rgba(255, 99, 132, 0.8)',
                                'rgba(54, 162, 235, 0.8)',
                                'rgba(255, 206, 86, 0.8)',
                                'rgba(75, 192, 192, 0.8)',
                                'rgba(153, 102, 255, 0.8)',
                                'rgba(255, 159, 64, 0.8)',
                                'rgba(46, 204, 113, 0.8)',
                                'rgba(231, 76, 60, 0.8)',
                            ],
                        ]],
                    ],
                    'options' => [
                        'title' => [
                            'display' => true,
                            'text' => 'Relevância por Assunto',
                            'fontSize' => 18,
                            'fontColor' => '#333',
                        ],
                        'legend' => ['display' => false], // Legenda no topo pode ser redundante
                        'scales' => [
                            'xAxes' => [['ticks' => ['min' => 0, 'max' => 20]]], // Ajuste o 'max' se necessário
                            'yAxes' => [['ticks' => ['fontSize' => 10]]], // Diminui a fonte dos eixos para caber
                        ],
                        'plugins' => [
                            'datalabels' => [
                                'display' => true,
                                'color' => '#fff',
                                'font' => ['weight' => 'bold'],
                                'anchor' => 'center',
                                'align' => 'center',
                            ],
                        ],
                    ],
                ];

                // 4. Monte a URL e busque a imagem
                $chartApiUrl = 'https://quickchart.io/chart?w=700&h=400&bkg=transparent&c=' . urlencode(json_encode($chartConfig));
                $response = Http::get($chartApiUrl);

                $chartImageUrl = null;
                if ($response->successful()) {
                    $chartImageUrl = 'data:image/png;base64,' . base64_encode($response->body());
                }

                try {
                        $pdf = Pdf::loadView('pdf.relat-03-ordncasst', [
                        'dadosRelatorio' => $this->dadosRelatorio,
                        'comunicacao' => $this->comunicacao,
                        'pensamento' => $this->pensamento,
                        'atencao' => $this->atencao,
                        'tensao' => $this->tensao,
                        'social' => $this->social,
                        'emocional' => $this->emocional,
                        'mental' => $this->mental,
                        'sexualidade' => $this->sexualidade,
                        'dadosGrafico' => [
                            [ 'Assuntos' => 'Comunicacao', 'Valor' => $this->comunicacao ],
                            [ 'Assuntos' => 'Pensamento', 'Valor' => $this->pensamento ],
                            [ 'Assuntos' => 'Atencao', 'Valor' => $this->atencao ],
                            [ 'Assuntos' => 'Tensao', 'Valor' => $this->tensao ],
                            [ 'Assuntos' => 'Social', 'Valor' => $this->social ],
                            [ 'Assuntos' => 'Emocional', 'Valor' => $this->emocional ],
                            [ 'Assuntos' => 'Mental', 'Valor' => $this->mental ],
                            [ 'Assuntos' => 'Sexualidade', 'Valor' => $this->sexualidade ],
                        ],
                        'chartImageUrl' => $chartImageUrl, // Passa a imagem (ou null se a API falhar)
                        
                        ]);
                       
                        Storage::disk('local')->put($nomePDF, $pdf->output());

                         $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                         $orderItens->update(['testeStatus' => 'concluido']);
                    }
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");
                
            break;

            case '04-CmCrbrFcn':

                    foreach ($this->resultadoTeste as $items) {
                    
                        /* Cérebro Social */
                        if($items->opcaoResposta->textoResposta == 'Concordo Totalmente') {
                            if($items->sequencia >= 1 and $items->sequencia <= 11) {
                                $this->cerebroSocial = $this->cerebroSocial + $items->opcaoResposta->valorResposta; 
                            }
                        }

                        /* Cérebro Mesclado */
                        if($items->opcaoResposta->textoResposta == 'Discordo Totalmente') {
                            
                                $this->cerebroMesclado = $this->cerebroMesclado + $items->opcaoResposta->valorResposta; 
                            
                        }
                        
                        /* Cérebro Sistematizador */
                        if($items->opcaoResposta->textoResposta == 'Concordo Totalmente') {
                            if($items->sequencia >= 11 and $items->sequencia <= 20) {
                                $this->cerebroSistematizador = $this->cerebroSistematizador + $items->opcaoResposta->valorResposta; 
                            }
                        }
                        
                        
                    }


                    $dadosGrafico = [
                        ['Assuntos' => 'Cérebro Social (Tipo QE)', 'Valor' => $this->cerebroSocial],
                        ['Assuntos' => 'Cérebro Mesclado (Tipo B)', 'Valor' => $this->cerebroMesclado],
                        ['Assuntos' => 'Cérebro Sistematizador (Tipo QS)', 'Valor' => $this->cerebroSistematizador],
                    ];

                    // 2. Prepare os dados para o formato que o Chart.js precisa
                    $labels = array_column($dadosGrafico, 'Assuntos');
                    $values = array_column($dadosGrafico, 'Valor');

                    // 3. Defina a configuração do gráfico de pizza
                    $chartConfig = [
                        'type' => 'pie',
                        'data' => [
                            'labels' => $labels,
                            'datasets' => [[
                                'data' => $values,
                                'backgroundColor' => [ // Paleta de cores mantida
                                    '#29B6F6', // Azul claro vibrante
                                    '#FFC107', // Amarelo vibrante
                                    '#66BB6A', // Verde vibrante
                                ],
                                'borderWidth' => 0,
                            ]],
                        ],
                        'options' => [
                            'title' => [
                                'display' => true,
                                'text' => 'Como Funciona Meu Cérebro',
                                'fontSize' => 20,
                                'fontColor' => '#333',
                                'padding' => 20,
                            ],
                            'legend' => [
                                'position' => 'bottom',
                                'labels' => [
                                    'fontSize' => 12,
                                    'boxWidth' => 15,
                                    'padding' => 20,
                                ],
                            ],
                            'plugins' => [
                                'datalabels' => [
                                    'color' => '#000',
                                    'font' => [
                                        'weight' => 'bold',
                                        'size' => 14,
                                    ],
                                    // Formata o valor para adicionar o símbolo de '%'
                                    'formatter' => "function(value) { return value + '%'; }",
                                ],
                            ],
                        ],
                    ];

                    // 4. Monte a URL e busque a imagem do gráfico
                    // Gráficos de pizza ficam melhores em formato quadrado
                    $chartApiUrl = 'https://quickchart.io/chart?w=500&h=500&bkg=transparent&c=' . urlencode(json_encode($chartConfig));
                    $response = Http::get($chartApiUrl);

                    $chartImageUrl = null;
                    if ($response->successful()) {
                        $chartImageUrl = 'data:image/png;base64,' . base64_encode($response->body());
                    }
                    
                    try {
                        $pdf = Pdf::loadView('pdf.relat-04-cmcrbrfcn', [
                        'dadosRelatorio' => $this->dadosRelatorio,
                        'cerebroSocial' => $this->cerebroSocial,
                        'cerebroMesclado' => $this->cerebroMesclado,
                        'cerebroSistematizador' => $this->cerebroSistematizador,
                        'dadosGrafico' => [
                            [ 'Assuntos' => 'Cérebro Social (Tipo QE)', 'Valor' => $this->cerebroSocial ],
                            [ 'Assuntos' => 'Cérebro Mesclado (Tipo B)', 'Valor' => $this->cerebroMesclado ],
                            [ 'Assuntos' => 'Cérebro Sistematizador (Tipo QS)', 'Valor' => $this->cerebroSistematizador ]

                        ],
                        
                        'chartImageUrl' => $chartImageUrl, // Passa a imagem (ou null se a API falhar)
                        
                        ]);
                       
                        Storage::disk('local')->put($nomePDF, $pdf->output());

                         $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                         $orderItens->update(['testeStatus' => 'concluido']);
                    }
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");

            break;

            case '05-AnsddDthd':

                // RELATÓRIO: Ansiedade Detalhada e Neurodiversidade
                try {
                    $pdf = Pdf::loadView('pdf.relat-05-ansdddthd', [
                            'dadosRelatorio' => $this->dadosRelatorio
                    ]);
                    
                    // 4. Salve o PDF no storage privado do Laravel
                    Storage::disk('local')->put($nomePDF, $pdf->output());
                    //$pdf->save(storage_path($nomePDF));
                    
                    $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                    $orderItens->update(['testeStatus' => 'concluido']);
                    }
                
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                    $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");

            break;

            case '06-Ansieddbsc':

                // RELATÓRIO: Inventário para Fobia Social ou Disturbio de Ansiedade
                try {
                    $pdf = Pdf::loadView('pdf.relat-06-ansieddbsc', [
                            'dadosRelatorio' => $this->dadosRelatorio
                    ]);
                    
                    // 4. Salve o PDF no storage privado do Laravel
                    Storage::disk('local')->put($nomePDF, $pdf->output());
                    //$pdf->save(storage_path($nomePDF));
                    
                    $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                    $orderItens->update(['testeStatus' => 'concluido']);
                    }
                
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                    $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");
                
            break;

            case '07-Depressbsc':

                // RELATÓRIO: Inventário para Fobia Social ou Disturbio de Ansiedade
                try {
                    $pdf = Pdf::loadView('pdf.relat-07-depressbsc', [
                            'dadosRelatorio' => $this->dadosRelatorio
                    ]);
                    
                    // 4. Salve o PDF no storage privado do Laravel
                    Storage::disk('local')->put($nomePDF, $pdf->output());
                    //$pdf->save(storage_path($nomePDF));
                    
                    $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                    $orderItens->update(['testeStatus' => 'concluido']);
                    }
                
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                    $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");
                
            break;

            case '08-CmptRpttv':

                // RELATÓRIO: Inventário para Disturbios Depressivos

                $this->percentSistematizacao = ceil($this->resultadoTeste[0]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[1]->opcaoResposta->valorResposta);
                $this->percentRegulacao = ceil($this->resultadoTeste[2]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[3]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[4]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[5]->opcaoResposta->valorResposta);
                $this->percetInteresses = ceil($this->resultadoTeste[6]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[7]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[8]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[9]->opcaoResposta->valorResposta);
                $this->percentAcumulacao = ceil($this->resultadoTeste[10]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[11]->opcaoResposta->valorResposta);
                $this->percentMesmice = ceil($this->resultadoTeste[12]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[13]->opcaoResposta->valorResposta);
                $this->percentSensibilidade = ceil($this->resultadoTeste[14]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[15]->opcaoResposta->valorResposta);
                $this->percentRestricao = ceil($this->resultadoTeste[16]->opcaoResposta->valorResposta +
                                        $this->resultadoTeste[17]->opcaoResposta->valorResposta +
                                        $this->resultadoTeste[18]->opcaoResposta->valorResposta +
                                        $this->resultadoTeste[19]->opcaoResposta->valorResposta);

                $this->percentCM = $this->percentSistematizacao + $this->percentRegulacao;
                $this->percentIM = $this->percetInteresses + $this->percentAcumulacao + $this->percentMesmice;
                $this->percentRS = $this->percentSensibilidade + $this->percentRestricao;
                $this->percentSomaTendencia = $this->percentCM + $this->percentIM + $this->percentRS;

                
                
                if($this->percentCM <= 13.35) {
                    $this->diagnosticoCM = "Leve ou pouco significante";
                } else { 
                    if($this->percentCM <= 19.81) {
                        $this->diagnosticoCM = "Necessita atenção";
                    } else { 
                        if($this->percentCM > 19.81) {
                            $this->diagnosticoCM = "Requer ajuda clínica";
                        }
                    }
                };

                if($this->percentIM <= 13.35) {
                    $this->diagnosticoIM = "Leve ou pouco significante";
                } else { 
                    if($this->percentIM <= 19.81) {
                        $this->diagnosticoIM = "Necessita atenção";
                    } else { 
                        if($this->percentIM > 19.81) {
                            $this->diagnosticoIM = "Requer ajuda clínica";
                        }
                    }
                };

                if($this->percentRS <= 13.35) {
                    $this->diagnosticoRS = "Leve ou pouco significante";
                } else { 
                    if($this->percentRS <= 19.81) {
                        $this->diagnosticoRS = "Necessita atenção";
                    } else { 
                        if($this->percentRS > 19.81) {
                            $this->diagnosticoRS = "Requer ajuda clínica";
                        }
                    }
                };

                try {
                    $pdf = Pdf::loadView('pdf.relat-08-cmptrpttv', [
                            'dadosRelatorio' => $this->dadosRelatorio,
                            'resultadoTeste' => $this->resultadoTeste, // A view usa esta variável
                            'diagnosticoCM' => $this->diagnosticoCM,
                            'diagnosticoIM' => $this->diagnosticoIM,
                            'diagnosticoRS' => $this->diagnosticoRS,
                            'percentCM' => $this->percentCM,
                            'percentIM' => $this->percentIM,
                            'percentRS' => $this->percentRS,
                            'percentSistematizacao' => $this->percentSistematizacao,
                            'percentRegulacao' => $this->percentRegulacao,
                            'percetInteresses' => $this->percetInteresses,
                            'percentAcumulacao' => $this->percentAcumulacao,
                            'percentMesmice' => $this->percentMesmice,
                            'percentSensibilidade' => $this->percentSensibilidade,
                            'percentRestricao' => $this->percentRestricao,
                            'percentSomaTendencia' => $this->percentSomaTendencia,
                    ]);
                    
                    // 4. Salve o PDF no storage privado do Laravel
                    Storage::disk('local')->put($nomePDF, $pdf->output());
                    //$pdf->save(storage_path($nomePDF));
                    
                    $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                    $orderItens->update(['testeStatus' => 'concluido']);
                    }
                
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                    $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");

                
            break;

            case '09-InvntrTDA_TDAH':
                //Recuperar os textos de diagnóstico ao final do relatório
                $databaseArray = TextoResposta::whereBetween('codTextoResposta', ['09-InvntrTDA_TDAHC142', '09-InvntrTDA_TDAHC152'])
                        ->get();

                $filteredArray = [];

                // Montar um array com as frases do diagnóstico, usando como chave a célula da planilha de todos os testes
                foreach ($databaseArray as $item) {
                    // Extrair os últimos 4 caracteres do codTextoResposta
                    $chave = substr($item->codTextoResposta, -4);

                
                    if ($chave !== false && $chave !== '') {
                        // Usar a chave extraída e criar o array com o respectivo textoResposta
                        $filteredArray[$chave] = $item->textoResposta;
                    }
                    
                }
                //dd($filteredArray);

                $testeSomaC133 = 0;
                $testeSomaD133 = 0;
                $retesteSomaC214 = 0; // Soma todas as respostas Frequente (Coluna C) e Muito Frequente (Coluna D)
                $retesteSomaD214 = 0; // Soma todas as respostas Frequente (Coluna C) e Muito Frequente (Coluna D): só perguntas da 20 a 37 
                $retesteSomaD215 = 0; // Soma todas as respostas de Muito Frequente (Coluna D): só perguntas da 20 a 37 
                $retesteSomaC216 = 0; // Soma todas as respostas Frequente (Coluna C) e Muito Frequente (Coluna D): só perguntas da 01 a 18

                foreach ($this->resultadoTeste as $item) {
                    if($item->pergunta->codGrupoOpcRespostas == 'GOR09-1') {
                        if($item->opcaoResposta->numSeqResp == 3) {
                            $testeSomaC133=$testeSomaC133+1;
                        }
                        if($item->opcaoResposta->numSeqResp == 4) {
                            $testeSomaD133=$testeSomaD133+1;
                        }
                    }

                    if($item->pergunta->codGrupoOpcRespostas == 'GOR09-2') {
                        if($item->opcaoResposta->numSeqResp == 3 || $item->opcaoResposta->numSeqResp == 4) {

                            $retesteSomaC214=$retesteSomaC214+1;

                            if ($item->sequencia >= 20 && $item->sequencia <= 37) {
                                $retesteSomaD214=$retesteSomaD214+1;
                            }

                            if ($item->sequencia >= 1 && $item->sequencia <= 18) {
                                $retesteSomaC216=$retesteSomaC216+1;
                            }
                        }

                        if($item->opcaoResposta->numSeqResp == 4) {
                            if ($item->sequencia >= 20 && $item->sequencia <= 37) {
                                $retesteSomaD215=$retesteSomaD215+1;
                            }
                        }
                    }

                }

                $textoDiagnostico = "<br>";
                $textoDiagnosticoReteste = "<br>";

                /* Apenas para testar o funcionamento da lógica abaixo, conferindo com a planilha de todos os testes 
                $testeSomaC133 = 8;
                $testeSomaD133 = 8; */

                if ($testeSomaC133 >= 4) {
                    $textoDiagnostico = $textoDiagnostico . $filteredArray['C146'];
                } else {
                    if($testeSomaD133 >= 6) {
                        $textoDiagnostico = $textoDiagnostico . $filteredArray['C147'];
                    }
                }
                
                $textoDiagnostico = $textoDiagnostico . "<br><stronger>Observação: ";
                if ($testeSomaD133 >= 10) {
                        $textoDiagnostico = $textoDiagnostico . $filteredArray['C143'] . $filteredArray['C147'];
                } else {
                    $textoDiagnostico = $textoDiagnostico . $filteredArray['C142'];
                }

                if ( $testeSomaC133 >= 6 ) {
                    $textoDiagnostico = $textoDiagnostico . "<br>" . $filteredArray['C144'];
                } 

                if ( ($testeSomaC133+$testeSomaD133) >= 9 ) {
                    $textoDiagnostico = $textoDiagnostico . "<br>" . $filteredArray['C143'];
                }

                if ( $testeSomaD133 >= 8 ) {
                    $textoDiagnostico = $textoDiagnostico . "<br>" . $filteredArray['C144'] . $filteredArray['C145'];
                } 

                if ( $testeSomaC133 <= 4 ) {
                    $textoDiagnostico = $textoDiagnostico . "<br>" . $filteredArray['C152'];
                }
                
                /* RETESTE - Apenas para testar o funcionamento da lógica abaixo, conferindo com a planilha de todos os testes 
                $testeSomaC133 = 8;
                $testeSomaD133 = 8; */
                //dd($textoDiagnostico);

                if ( $retesteSomaC214 >= 5 ) {
                    $textoDiagnosticoReteste = $textoDiagnosticoReteste . $filteredArray['C148'];
                } else {
                    $textoDiagnosticoReteste = $textoDiagnosticoReteste . $filteredArray['C150'];
                }
                
                if ( $retesteSomaD214 >= 5 ) {
                    $textoDiagnosticoReteste = $textoDiagnosticoReteste . "<br>" . $filteredArray['C149'];
                }
                
                if ( $retesteSomaD214 >= 8 ) {
                    $textoDiagnosticoReteste = $textoDiagnosticoReteste . "<br>" . $filteredArray['C143'];
                }
                
                if ( $retesteSomaD214 >= 6 ) {
                    $textoDiagnosticoReteste = $textoDiagnosticoReteste . "<br>" . $filteredArray['C144'];
                }
                
                if ( $retesteSomaD215 >= 4 ) {
                    $textoDiagnosticoReteste = $textoDiagnosticoReteste . "<br>" . $filteredArray['C145'];
                }
                
                if ( $retesteSomaD215 >= 5 ) {
                    $textoDiagnosticoReteste = $textoDiagnosticoReteste . "<br>" . $filteredArray['C147'];
                }
                
                if ( $retesteSomaC216 <= 6 ) {
                    $textoDiagnosticoReteste = $textoDiagnosticoReteste . "<br>" . $filteredArray['C152']
                                                                        . "<br>" . $filteredArray['C148'];
                }
                
                if ( $retesteSomaC216 >= 5 ) {
                    $textoDiagnosticoReteste = $textoDiagnosticoReteste . "<br>" . $filteredArray['C146'];
                }
                

                try {
                    $pdf = Pdf::loadView('pdf.relat-09-invntrtda_tdah', [
                            'dadosRelatorio' => $this->dadosRelatorio,
                            'testeSomaC133' => $testeSomaC133,
                            'testeSomaD133' => $testeSomaD133,
                            'retesteSomaC214' => $retesteSomaC214,
                            'retesteSomaD214' => $retesteSomaD214,
                            'textoDiagnostico' =>$textoDiagnostico,
                            'textoDiagnosticoReteste' =>$textoDiagnosticoReteste,
                    ]);
                    
                    // 4. Salve o PDF no storage privado do Laravel
                    Storage::disk('local')->put($nomePDF, $pdf->output());
                    //$pdf->save(storage_path($nomePDF));
                    
                    $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                    $orderItens->update(['testeStatus' => 'concluido']);
                    }
                
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");
               
                
            break;

            case '10-AutorrltDisfunTDA_TDAH':

                // RELATÓRIO: Inventário para Fobia Social ou Disturbio de Ansiedade
                try {
                    $pdf = Pdf::loadView('pdf.relat-10-autorrltdisfuntda_tdah', [
                            'dadosRelatorio' => $this->dadosRelatorio
                    ]);
                    
                    // 4. Salve o PDF no storage privado do Laravel
                    Storage::disk('local')->put($nomePDF, $pdf->output());
                    //$pdf->save(storage_path($nomePDF));
                    
                    $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                    $orderItens->update(['testeStatus' => 'concluido']);
                    }
                
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                    $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");
                
            break;

            case '11-HptsTEA':

                // RELATÓRIO: Hipótese de TEA - Nível 1 (antiga Síndrome de Asperger) - 11-HptsTEA
                
                $contaNeuroTipico = 0;
                $contaNeuroDivergente = 0;
                $contarHabilidadesSociais = 0;
                $contarAtencaoDetalhes = 0;
                $contarClarezaComunicacao = 0;
                $contarHiperfoco = 0;
                $contarUsoImaginacao = 0;
                
                foreach ($this->resultadoTeste as $item) {
                    $textoCompleto = $item->textoResposta->textoResposta;

                    // Encontra as posições dos delimitadores
                    $posIgual = strpos($textoCompleto, ' = ');
                    $posDoisPontos = strpos($textoCompleto, ': ');

                    // Extrai as substrings
                    if ($posIgual !== false && $posDoisPontos !== false) {
                        $classifNeuro = substr($textoCompleto, 0, $posIgual);
                        $areasMapeadas = substr($textoCompleto, $posIgual + 3, $posDoisPontos - ($posIgual + 3));
                        $anomalidadePercebida = substr($textoCompleto, $posDoisPontos + 2);

                        // Conta 'neurotipico' e 'neurodivergente' (case-insensitive)
                        if (stripos($classifNeuro, 'neurotipico') !== false) {
                            $contaNeuroTipico++;
                        } elseif (stripos($classifNeuro, 'neurodivergente') !== false) {
                            $contaNeuroDivergente++;
                        }

                        // Conta ocorrências em $areasMapeadas (case-insensitive)
                        if (stripos($areasMapeadas, 'Dificuldades com as habilidades sociais') !== false) {
                            $contarHabilidadesSociais++;
                        }
                        if (stripos($areasMapeadas, 'distração e mudança de atenção') !== false) {
                            $contarAtencaoDetalhes++;
                        }
                        if (stripos($areasMapeadas, 'clareza na comunicação') !== false) {
                            $contarClarezaComunicacao++;
                        }
                        if (stripos($areasMapeadas, 'excepcional concentração na atividade') !== false) {
                            $contarHiperfoco++;
                        }
                        if (stripos($areasMapeadas, 'uso e aplicações da imaginação') !== false) {
                            $contarUsoImaginacao++;
                        }
                    }

                }
                
                try {
                    $pdf = Pdf::loadView('pdf.relat-11-hptstea', [
                            'dadosRelatorio' => $this->dadosRelatorio
                    ]);
                    
                    // 4. Salve o PDF no storage privado do Laravel
                    Storage::disk('local')->put($nomePDF, $pdf->output());
                    //$pdf->save(storage_path($nomePDF));
                    
                    $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                    $orderItens->update(['testeStatus' => 'concluido']);
                    }
                
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                    $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");

            break;

            case '12-DomEproc':

                // RELATÓRIO: Inventário para Fobia Social ou Disturbio de Ansiedade
                try {
                    $pdf = Pdf::loadView('pdf.relat-12-domeproc', [
                            'dadosRelatorio' => $this->dadosRelatorio
                    ]);
                    
                    // 4. Salve o PDF no storage privado do Laravel
                    Storage::disk('local')->put($nomePDF, $pdf->output());
                    //$pdf->save(storage_path($nomePDF));
                    
                    $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                    $orderItens->update(['testeStatus' => 'concluido']);
                    }
                
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                    $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");

             break;

            case '13-SnsldeEndvrgnc':

                // RELATÓRIO: Inventário para Fobia Social ou Disturbio de Ansiedade
                try {
                    $pdf = Pdf::loadView('pdf.relat-13-snsldeendvrgnc', [
                            'dadosRelatorio' => $this->dadosRelatorio
                    ]);
                    
                    // 4. Salve o PDF no storage privado do Laravel
                    Storage::disk('local')->put($nomePDF, $pdf->output());
                    //$pdf->save(storage_path($nomePDF));
                    
                    $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                    $orderItens->update(['testeStatus' => 'concluido']);
                    }
                
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                    $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");

            break;

            case '14-ArrzcEndvrgc':

                // RELATÓRIO: 14 - Interações Sociais e Neurodivergências

                //dd($this->resultadoTeste);
                if($this->sexoBiologico == 'M') {
                    $this->constrangimento = ceil($this->resultadoTeste[4]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[17]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[18]->opcaoResposta->valorResposta);
                } else {
                    $this->constrangimento = ceil($this->resultadoTeste[4]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[18]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[19]->opcaoResposta->valorResposta);
                }

                if($this->sexoBiologico == 'M') {
                    $this->regrasSociais = ceil($this->resultadoTeste[1]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[13]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[16]->opcaoResposta->valorResposta);
                } else {
                    $this->regrasSociais = ceil($this->resultadoTeste[1]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[14]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[17]->opcaoResposta->valorResposta);
                }

                if($this->sexoBiologico == 'M') {
                    $this->contextos = ceil($this->resultadoTeste[2]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[3]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[5]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[6]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[15]->opcaoResposta->valorResposta);
                } else {
                    $this->contextos = ceil($this->resultadoTeste[2]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[3]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[5]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[6]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[16]->opcaoResposta->valorResposta);
                }
                
                if($this->sexoBiologico == 'M') {
                    $this->fragilizar = ceil($this->resultadoTeste[7]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[9]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[10]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[20]->opcaoResposta->valorResposta);
                } else {
                    $this->fragilizar = ceil($this->resultadoTeste[7]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[10]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[11]->opcaoResposta->valorResposta);
                }

                if($this->sexoBiologico == 'M') {
                    $this->controladora = ceil($this->resultadoTeste[8]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[11]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[20]->opcaoResposta->valorResposta);
                } else {
                    $this->controladora = ceil($this->resultadoTeste[9]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[12]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[20]->opcaoResposta->valorResposta);
                }

                if($this->sexoBiologico == 'M') {
                    $this->impulsiva = ceil($this->resultadoTeste[12]->opcaoResposta->valorResposta);
                } else {
                    $this->impulsiva = ceil($this->resultadoTeste[13]->opcaoResposta->valorResposta);
                }

                if($this->sexoBiologico == 'M') {
                    $this->baseRisco = ceil($this->resultadoTeste[14]->opcaoResposta->valorResposta);
                } else {
                    $this->baseRisco = ceil($this->resultadoTeste[15]->opcaoResposta->valorResposta);
                }

                $this->alimentBalanceada = ceil($this->resultadoTeste[21]->opcaoResposta->valorResposta);

                $this->exercRegular = ceil($this->resultadoTeste[22]->opcaoResposta->valorResposta);

                $this->gerenciaEstresse = ceil($this->resultadoTeste[23]->opcaoResposta->valorResposta +
                                                $this->resultadoTeste[35]->opcaoResposta->valorResposta);

                $this->relaxMental = ceil($this->resultadoTeste[24]->opcaoResposta->valorResposta +
                                            $this->resultadoTeste[29]->opcaoResposta->valorResposta);

                $this->redesApoio = ceil($this->resultadoTeste[25]->opcaoResposta->valorResposta +
                                            $this->resultadoTeste[28]->opcaoResposta->valorResposta);
                
                $this->acompClinico = ceil($this->resultadoTeste[26]->opcaoResposta->valorResposta);

                $this->organizTarefas = ceil($this->resultadoTeste[27]->opcaoResposta->valorResposta +
                                            $this->resultadoTeste[31]->opcaoResposta->valorResposta +
                                            $this->resultadoTeste[32]->opcaoResposta->valorResposta +
                                            $this->resultadoTeste[33]->opcaoResposta->valorResposta);

                $this->atualizarCapacitar = ceil($this->resultadoTeste[30]->opcaoResposta->valorResposta +
                                            $this->resultadoTeste[34]->opcaoResposta->valorResposta);

                
                
                $this->constrangimento = number_format(($this->constrangimento / 12 * 100), 2);
                $this->regrasSociais = number_format(($this->regrasSociais / 12 * 100), 2);

                $this->contextos = number_format(($this->contextos / 20 * 100), 2);


                if($this->sexoBiologico == 'M') {
                    $this->fragilizar = number_format(($this->fragilizar / 16 * 100), 2);
                    
                } else {
                    $this->fragilizar = number_format(($this->fragilizar / 12 * 100), 2);
                }

                $this->controladora = number_format(($this->controladora / 12 * 100), 2);
                $this->impulsiva = number_format(($this->impulsiva / 4 * 100), 2);
                $this->baseRisco = number_format(($this->baseRisco / 4 * 100), 2);

                $this->alimentBalanceada = number_format(($this->alimentBalanceada / 4 * 100), 2);
                $this->exercRegular = number_format(($this->exercRegular / 4 * 100), 2);
                $this->gerenciaEstresse = number_format(($this->gerenciaEstresse / 8 * 100), 2);
                $this->relaxMental = number_format(($this->relaxMental / 8 * 100), 2);
                $this->redesApoio = number_format(($this->redesApoio / 8 * 100), 2);
                $this->acompClinico = number_format(($this->acompClinico / 4 * 100), 2);
                $this->organizTarefas = number_format(($this->organizTarefas / 16 * 100), 2);
                $this->atualizarCapacitar = number_format(($this->atualizarCapacitar / 8 * 100), 2);

                $this->arrayTipoItemNeurodiv = [
                                                   [ '"Causar constrangimento" ('.$this->constrangimento.'%)' , $this->constrangimento], 
                                                   [ '"Violar regras sociais" ('.$this->regrasSociais.'%)' , $this->regrasSociais], 
                                                   [ '"Manipular contextos" ('.$this->contextos.'%)' ,  $this->contextos], 
                                                   [ '"Fragilizar o outro" ('.$this->fragilizar.'%)' , $this->fragilizar], 
                                                   [ '"Pessoa controladora"`('.$this->controladora.'%)' , $this->controladora], 
                                                   [ '"Pessoa impulsiva" ('.$this->impulsiva.'%)' , $this->impulsiva],                                   
                                                   [ '"Agir com base no risco" ('.$this->baseRisco.'%)' , $this->baseRisco]
                ];

                $this->arrayDiscipFavorNeurodiv = [
                                                    [ 'Disciplina: Alimentação Balanceada ('.$this->alimentBalanceada.'%)', $this->alimentBalanceada],
                                                    [ 'Disciplina: Exercício Regular ('.$this->exercRegular.'%)', $this->exercRegular],
                                                    [ 'Disciplina: Gerenciamento do Estresse ('.$this->gerenciaEstresse.'%)', $this->gerenciaEstresse],
                                                    [ 'Disciplina: Relaxamento Mental ('.$this->relaxMental.'%)', $this->relaxMental],
                                                    [ 'Disciplina: Redes de Apoio ('.$this->redesApoio.'%)', $this->redesApoio],
                                                    [ 'Disciplina: Acompanhamento clínico ('.$this->acompClinico.'%)', $this->acompClinico],
                                                    [ 'Disciplina: Organização de Tarefas ('.$this->organizTarefas.'%)', $this->organizTarefas],
                                                    [ 'Disciplina: Atualizar e se capacitar ('.$this->atualizarCapacitar.'%)', $this->atualizarCapacitar]

                ];
                
                // 2. Preparando os dados para os gráficos
                $arrayTipoItemNeurodiv = [
                    [ '"Causar constrangimento" ('.number_format($this->constrangimento, 2).'%)' , $this->constrangimento], 
                    [ '"Violar regras sociais" ('.number_format($this->regrasSociais, 2).'%)' , $this->regrasSociais], 
                    [ '"Manipular contextos" ('.number_format($this->contextos, 2).'%)' ,  $this->contextos], 
                    [ '"Fragilizar o outro" ('.number_format($this->fragilizar, 2).'%)' , $this->fragilizar], 
                    [ '"Pessoa controladora"`('.number_format($this->controladora, 2).'%)' , $this->controladora], 
                    [ '"Pessoa impulsiva" ('.number_format($this->impulsiva, 2).'%)' , $this->impulsiva],                                   
                    [ '"Agir com base no risco" ('.number_format($this->baseRisco, 2).'%)' , $this->baseRisco]
                ];
                $arrayDiscipFavorNeurodiv = [
                    [ 'Disciplina: Alimentação Balanceada ('.number_format($this->alimentBalanceada, 2).'%)', $this->alimentBalanceada],
                    [ 'Disciplina: Exercício Regular ('.number_format($this->exercRegular, 2).'%)', $this->exercRegular],
                    [ 'Disciplina: Gerenciamento do Estresse ('.number_format($this->gerenciaEstresse, 2).'%)', $this->gerenciaEstresse],
                    [ 'Disciplina: Relaxamento Mental ('.number_format($this->relaxMental, 2).'%)', $this->relaxMental],
                    [ 'Disciplina: Redes de Apoio ('.number_format($this->redesApoio, 2).'%)', $this->redesApoio],
                    [ 'Disciplina: Acompanhamento clínico ('.number_format($this->acompClinico, 2).'%)', $this->acompClinico],
                    [ 'Disciplina: Organização de Tarefas ('.number_format($this->organizTarefas, 2).'%)', $this->organizTarefas],
                    [ 'Disciplina: Atualizar e se capacitar ('.number_format($this->atualizarCapacitar, 2).'%)', $this->atualizarCapacitar]
                ];

                // Array de cores do gráfico
                $coresGrafico = ["#FF5733", "#33FF57", "#5733FF", "#FF33A1", "#33FFF5", "#A133FF", "#FF0000", "#FFC300"];


                // --- GERAÇÃO DO GRÁFICO 1 ---
                $labels1 = array_column($arrayTipoItemNeurodiv, 0);
                $values1 = array_column($arrayTipoItemNeurodiv, 1);

                $chartConfig1 = [
                    'type' => 'horizontalBar',
                    'data' => [ 'labels' => $labels1, 'datasets' => [[
                        'data' => $values1, 
                        'backgroundColor' => $coresGrafico 
                    ]]],
                    'options' => [ 
                        'title' => ['display' => true, 'text' => 'Aspectos corrosivos às Neurodivergências', 'fontSize' => 16],
                        'legend' => ['display' => false],
                        'scales' => ['xAxes' => [['ticks' => ['min' => 0, 'max' => 100]]]],
                     ],
                ];
                $chartApiUrl1 = 'https://quickchart.io/chart?w=700&h=350&bkg=transparent&c=' . urlencode(json_encode($chartConfig1));
                $response1 = Http::get($chartApiUrl1);
                $chartImageUrl1 = $response1->successful() ? 'data:image/png;base64,' . base64_encode($response1->body()) : null;

                // --- GERAÇÃO DO GRÁFICO 2 ---
                $labels2 = array_column($arrayDiscipFavorNeurodiv, 0);
                $values2 = array_column($arrayDiscipFavorNeurodiv, 1);

                $chartConfig2 = [
                    'type' => 'horizontalBar',
                    'data' => [ 'labels' => $labels2, 'datasets' => [[
                        'data' => $values2, 
                        'backgroundColor' => $coresGrafico 
                    ]]],
                    'options' => [
                        'title' => ['display' => true, 'text' => 'Disciplinas favoráveis às Neurodivergências - 100% é a excelência', 'fontSize' => 16],
                        'legend' => ['display' => false],
                        'scales' => ['xAxes' => [['ticks' => ['min' => 0, 'max' => 100]]]],
                    ],
                ];
                $chartApiUrl2 = 'https://quickchart.io/chart?w=700&h=400&bkg=transparent&c=' . urlencode(json_encode($chartConfig2));
                $response2 = Http::get($chartApiUrl2);
                $chartImageUrl2 = $response2->successful() ? 'data:image/png;base64,' . base64_encode($response2->body()) : null;


                 try {
                    $pdf = Pdf::loadView('pdf.relat-14-arrzcendvrgc', [
                            'dadosRelatorio' => $this->dadosRelatorio,
                            'chartImageUrl1' => $chartImageUrl1,
                            'chartImageUrl2' => $chartImageUrl2,
                    ]);
                    
                    // 4. Salve o PDF no storage privado do Laravel
                    Storage::disk('local')->put($nomePDF, $pdf->output());
                    //$pdf->save(storage_path($nomePDF));
                    
                    $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                    $orderItens->update(['testeStatus' => 'concluido']);
                    }
                
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                    $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");

            break;

            case '15-DlxiaEaprndzg':
            // RELATÓRIO: CARACTERÍSTICAS LIGADAS À DISLEXIA, ATENÇÃO E A CONCENTRAÇÃO  Adultos
            
            //Recuperar os textos de diagnóstico ao final do relatório
            $databaseArray = TextoResposta::whereBetween('codTextoResposta', ['15-DlxiaEaprndzgQ15', '15-DlxiaEaprndzgQ22'])
                    ->get();

            $filteredArray = [];

            // Montar um array com as frases do diagnóstico, usando como chave a célula da planilha de todos os testes
            foreach ($databaseArray as $item) {
                // Extrair os últimos 4 caracteres do codTextoResposta
                $chave = substr($item->codTextoResposta, -3);

            
                if ($chave !== false && $chave !== '') {
                    // Usar a chave extraída e criar o array com o respectivo textoResposta
                    $filteredArray[$chave] = $item->textoResposta;
                }
                
            }
            //dd($filteredArray);

            // -- Preparação dos Cálculos Percentuais e Contagens para o Relatório --
            $contarRaro = 0;
            $contarAlgumasVezes = 0;
            $contarAconteceBastante = 0;
            $contarFrequente = 0;

            foreach ($this->dadosRelatorio['resultadoTeste'] as $item) {
               
                    if($item->opcaoResposta->numSeqResp == 1) {
                        $contarRaro++;}
                    elseif ($item->opcaoResposta->numSeqResp == 2) {
                        $contarAlgumasVezes++;
                    }elseif ($item->opcaoResposta->numSeqResp == 3){
                        $contarAconteceBastante++;
                    }else {
                        $contarFrequente++;
                    }
                };    


                $textoDiagnostico = "<br>";
                
                /* Apenas para testar o funcionamento da lógica abaixo, conferindo com a planilha de todos os testes 
                $testeSomaC133 = 8;
                $testeSomaD133 = 8; */
               
                $textoDiagnostico = $textoDiagnostico . "<stronger>Orientações gerais: No contexto geral de seus resultados você obteve: </stronger>";
                if ($contarRaro >= 15) {
                        $textoDiagnostico = $textoDiagnostico . $filteredArray['Q15'];
                }

                if ( $contarAlgumasVezes <= 6 ) {
                    $textoDiagnostico = $textoDiagnostico . "<br>" . $filteredArray['Q16'];
                } else {
                    $textoDiagnostico = $textoDiagnostico . "<br>" . $filteredArray['Q17'];
                }

                if ( $contarAconteceBastante <= 6 ) {
                    $textoDiagnostico = $textoDiagnostico . "<br>" . $filteredArray['Q18'];
                } else {
                    $textoDiagnostico = $textoDiagnostico . "<br>" . $filteredArray['Q19'];
                }

                if ( $contarFrequente <= 3 ) {
                    $textoDiagnostico = $textoDiagnostico . "<br>" . $filteredArray['Q20'];
                } elseif ( $contarFrequente >= 4 && $contarFrequente <= 8) {
                    $textoDiagnostico = $textoDiagnostico . "<br>" . $filteredArray['Q21'];
                } else {
                    $textoDiagnostico = $textoDiagnostico . "<br>" . $filteredArray['Q22'];
                }

            try {
                    $pdf = Pdf::loadView('pdf.relat-15-dlxiaeaprndzg', [
                            'dadosRelatorio' => $this->dadosRelatorio,
                            'contarRaro' => $contarRaro,
                            'contarAlgumasVezes' => $contarAlgumasVezes,
                            'contarAconteceBastante' => $contarAconteceBastante,
                            'contarFrequente' => $contarFrequente,
                            'textoDiagnostico' =>$textoDiagnostico,
                    ]);
                    
                    // 4. Salve o PDF no storage privado do Laravel
                    Storage::disk('local')->put($nomePDF, $pdf->output());
                    //$pdf->save(storage_path($nomePDF));
                    
                    $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                    $orderItens->update(['testeStatus' => 'concluido']);
                    }
                
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                    $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");                
                
            break;

            case '16-RslncTnsbase':
            // RELATÓRIO: Autopercepção do nível de Cansaço e Neurodivergência
            

            // -- Preparação dos Cálculos Percentuais e Contagens para o Relatório --
            $contarNegativos = 0;
            $contarPositivos = 0;
            $diferencaPositNegat = 0;
            $celulaD38 = 0;
            $indiceCansaco = 0;

            foreach ($this->dadosRelatorio['resultadoTeste'] as $item) {
               
                    if( $item->opcaoResposta->numSeqResp == 2 ||
                        $item->opcaoResposta->numSeqResp == 3 ||
                        $item->opcaoResposta->numSeqResp == 5 ||
                        $item->opcaoResposta->numSeqResp == 6 ||
                        $item->opcaoResposta->numSeqResp == 8 ||
                        $item->opcaoResposta->numSeqResp == 25 ) 
                        { $contarNegativos = $contarNegativos + $item->opcaoResposta->valorResposta;}

                    elseif ( $item->opcaoResposta->numSeqResp >=9 && $item->opcaoResposta->numSeqResp <=19 ) 
                                { $contarNegativos = $contarNegativos + $item->opcaoResposta->valorResposta; }

                    elseif (    $item->opcaoResposta->numSeqResp == 4 ||
                                $item->opcaoResposta->numSeqResp == 7 )
                                { $contarPositivos = $contarPositivos + $item->opcaoResposta->valorResposta; }

                    elseif ( $item->opcaoResposta->numSeqResp >=20 && $item->opcaoResposta->numSeqResp <=24 ) 
                                { $contarPositivos = $contarPositivos + $item->opcaoResposta->valorResposta; }
                };
                
                $diferencaPositNegat = $contarNegativos - $contarPositivos;
                $celulaD38 = $contarNegativos + $diferencaPositNegat;
                $indiceCansaco = $celulaD38 / 24;

                // Configuração do gráfico
                $chartConfig = [
                    'type' => 'horizontalBar',
                    'data' => [
                        'labels' => [''],
                        'datasets' => [[
                            'data' => [number_format($indiceCansaco, 2, '.', '')],
                            'backgroundColor' => 'rgba(255, 165, 0, 0.7)', // Laranja
                            'borderColor' => 'rgba(255, 165, 0, 1)',
                            'borderWidth' => 1,
                        ]],
                    ],
                    'options' => [
                        'title' => [
                            'display' => true,
                            'text' => 'Sua percepção de cansaço',
                            'fontSize' => 16,
                            'fontColor' => '#333',
                            'padding' => 20,
                        ],
                        'legend' => ['display' => false],
                        'scales' => [
                            'xAxes' => [['ticks' => ['min' => 0, 'max' => 8]]], // Escala de 0 a 8
                            'yAxes' => [['gridLines' => ['display' => false]]],
                        ],
                        'plugins' => [
                            'datalabels' => [
                                'display' => true,
                                'align' => 'end',
                                'anchor' => 'end',
                                'color' => '#1a202c',
                                'font' => ['weight' => 'bold', 'size' => 14],
                            ],
                        ],
                    ],
                ];

                // 3. Monte a URL e busque a imagem
                $chartApiUrl = 'https://quickchart.io/chart?w=700&h=180&bkg=transparent&c=' . urlencode(json_encode($chartConfig));
                $response = Http::get($chartApiUrl);

                $chartImageUrl = null;
                if ($response->successful()) {
                    $chartImageUrl = 'data:image/png;base64,' . base64_encode($response->body());
                }


            try {
                    $pdf = Pdf::loadView('pdf.relat-16-rslnctnsbase', [
                            'dadosRelatorio' => $this->dadosRelatorio,
                            'chartImageUrl' => $chartImageUrl,
                            'contarNegativos' => $contarNegativos,
                            'contarPositivos' => $contarPositivos,
                            'diferencaPositNegat' => $diferencaPositNegat,
                            'celulaD38' => $celulaD38,
                            'indiceCansaco' => $indiceCansaco,
                    ]);
                    
                    // 4. Salve o PDF no storage privado do Laravel
                    Storage::disk('local')->put($nomePDF, $pdf->output());
                    //$pdf->save(storage_path($nomePDF));
                    
                    $controleRelatorios->update(['status' => 'completo', 'file_path' => $nomePDF]);
                    $orderItens->update(['testeStatus' => 'concluido']);
                    }
                
                catch (\Exception $e) {
                    // Em caso de erro, atualiza o status para 'failed'
                     $controleRelatorios->update(['status' => 'falha']);
                     $orderItens->update(['testeStatus' => 'falha']);
                    // Opcional: Logar o erro
                    report($e);
                    }

                    $this->js("setTimeout(() => { Livewire.navigate('/meus-pedidos') }, 6000)");                
                
                
            break;


        }; // Fehcamento do sitch
                

           
    } // Fechamento da classe

    #[Layout('components.layouts.relatorios')] 
    public function render()
    {
       

        $texto_espera = '<h1 style="text-align: center; font-size: 20px; margin-top: 50px;">
                                Processando... A página vai carregar automaticamente.</h1>';

        switch ($this->codTeste) {

            case '01-HstCrpEnrdvrgc':

                

                return $texto_espera;
                
            break;

            case '02-PrcpStrss':

                
                
                return $texto_espera;

            break;

            case '03-OrdncAsst':

                return $texto_espera;

            break;
                

            case '04-CmCrbrFcn':

                    return $texto_espera;

            break;


            case '05-AnsddDthd':

                // RELATÓRIO: Ansiedade Detalhada e Neurodiversidade

                return $texto_espera;

            break;

            
            case '06-Ansieddbsc':

                // RELATÓRIO: Inventário para Fobia Social ou Disturbio de Ansiedade
                
                return $texto_espera;

            break;


            
            case '07-Depressbsc':

                // RELATÓRIO: Inventário para Disturbios Depressivos
                
                return $texto_espera;

            break;


            case '08-CmptRpttv':

                //GerarRelatorios::dispatch($this->ccxx, $this->cctt, $this->ccii, $this->userId);

                // RELATÓRIO: Inventário para Disturbios Depressivos

                return $texto_espera;

            break;

            case '09-InvntrTDA_TDAH':

                return $texto_espera;

            break;

            case '10-AutorrltDisfunTDA_TDAH':

                // RELATÓRIO: Autorrelato sobre características relacionadas ao TDA / TDAH - 10-AutorrltDisfunTDA_TDAH
                
                
                return $texto_espera;

            break;

            case '11-HptsTEA':

                 return $texto_espera;

            break;

            case '12-DomEproc':

                // RELATÓRIO: Domínios e Processos no Comportamento Adaptativo associados com a Neurodivergência							
                
                return $texto_espera;

            break;

            case '13-SnsldeEndvrgnc':

                // RELATÓRIO: PONTUAÇÃO e COMENTÁRIOS - SENSUALIDADE E NEURODIVERGÊNCIAS - 13-SnsldeEndvrgnc
                
                return $texto_espera;

            break;

            case '14-ArrzcEndvrgc':

                return $texto_espera;

            break;


            case '15-DlxiaEaprndzg':
            // RELATÓRIO: CARACTERÍSTICAS LIGADAS À DISLEXIA, ATENÇÃO E A CONCENTRAÇÃO  Adultos
            
                return $texto_espera;

            break;


            case '16-RslncTnsbase':

                 return $texto_espera;
            
            break;


             default:
                return view('livewire.relatorios.respostas-gravadas-bd');

        }

        

        
    }
}
