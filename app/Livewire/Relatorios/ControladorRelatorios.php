<?php

namespace App\Livewire\Relatorios;

use App\Jobs\GerarRelatorios;
use App\Models\User;
use App\Models\Orders;
use App\Models\Testes;
use Livewire\Component;
use App\Models\Perguntas;
use App\Models\Orderitems;
use App\Models\Useranswers;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

use Illuminate\Support\Carbon;

//use Barryvdh\DomPDF\Facade\Pdf;

use Livewire\Attributes\Layout;
use App\Models\Historicomedicos;
//use Spatie\LaravelPdf\Facades\Pdf;
//use function Spatie\LaravelPdf\Support\pdf;
use Spatie\Browsershot\Browsershot;

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
    
    /* Dawel: retirado: 30/07/2024 - #[On('resultadoTeste')] */
    public function mount() {
        
        /*  cctt: código do teste testes_id
            ccxx: código do pedido orders_id
            ccii: código do item do pedido orderItems_id
        */
        $this->orders_id = $this->ccxx;
        $this->testes_id = $this->cctt;
        $this->orderItem_id = $this->ccii;
        //dd($this->orderItem_id);

        /* $this->resultadoTeste2 = Orderitems::with('useranswers', 'testes', 'pergunta')
                                        ->where('orders_id', $this->orders_id)
                                        ->where('testes_id', $this->testes_id)
                                        ->get(); */
        $this->resultadoTeste = Useranswers::with('pergunta', 'opcaoResposta:id,textoResposta,valorResposta')
                                    ->where('orderitems_id', $this->orderItem_id)
                                    ->where('testes_id', $this->testes_id)
                                    ->get();
        //dd($this->resultadoTeste);

        

        $this->dataFinalTeste = $this->resultadoTeste->max('created_at')->format('d-m-Y');
        //dd($this->dataFinalTeste);
        

        //dd($this->useranswers);
        $user = User::where('id', auth()->user()->id)->first();
        $this->nomeCliente = $user['name'];
        $this->idadeCliente = Carbon::parse($user->data_nascimento)->age;
        $this->sexoBiologico = $user->sexo_biologico;
        $this->estadoNascimentoCliente = $user->estado_nascimento;
        $this->dadosCliente = Historicomedicos::where('orders_id', $this->orders_id)->first();

        $this->dataEmissao = Carbon::now()->format('d-m-Y');

        //dd($this->dadosCliente);
        /* Dawel: 30/07/2024 $this->resultadoTeste = Orderitems::with('useranswers')
                                        ->where('orders_id',$orders_id)
                                        ->where('testes_id',$testes_id)
                                        ->get(); */
        // Em 03/07/2024 - Testar de pegar todos os dados pelo Useranswers.
        //$testandoDadosPeloUseranswers = Useranswers::with('perguntas', 'opcoesderespostas')->get();
        //  INCOMPLETO  03/07/2024 ///

        
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
            'resultadoTeste' => $this->resultadoTeste,
            'dadosCliente' => $this->dadosCliente,

        ];
        //dd($this->dadosRelatorio);
        //dd($testes_id);
        //dd($parametrosParaRelatorios);
       /*  $this->colecaoRespostas = Useranswers::with('pergunta', 'opcaoresposta')
                                    ->where('orderitems_id', $parametrosParaRelatorios['orderItem_id'])
                                    ->get();
        dd($this->colecaoRespostas); */
        //dd($this->useranswers);
        //dd($this->resultadoTeste);
    }

    #[Layout('components.layouts.relatorios')] 
    public function render()
    {
        switch ($this->codTeste) {

            case '01-HstCrpEnrdvrgc':

                $relatorio = $this->dadosRelatorio;
                GerarRelatorios::dispatch($relatorio);
                //return url('/meus-pedidos');
                /* Spatie Laravel-pdf */
                /* Pdf::view('livewire.relatorios.relat-01-HstCrpEnrdvrgc', 
                        ['dadosRelatorio' => $relatorio])
                    ->format('a4')
                    ->save(storage_path('01HstCrpEnrdvrg6gd.pdf')); 
                    return ("DONE!"); */

                /* 
                ==> dompdf   */   
                /* $template = view('livewire.relatorios.relat-01-HstCrpEnrdvrgc', ['dadosRelatorio' => $this->dadosRelatorio])->render();  */
                /* $pdf = Pdf::loadView('livewire.relatorios.relat-01-HstCrpEnrdvrgc', [
                        'dadosRelatorio' => $relatorio
                ]); */
                $teste = "<html><body><h1>Hey George!</h1></body></html>";
                /*return Pdf::loadFile($template)->save(storage_path('/app/livewire-tmp/my_stored_file.pdf'))->stream('download.pdf'); */
                /* $pdf->loadHTML($teste); */
                //dd($pdf);
                /* $pdf->save(storage_path('GDinvoice.pdf')); 
                return redirect()->intended(); */
           /*  return pdf()
                ->view('livewire.relatorios.relat-01-HstCrpEnrdvrgc', $this->dadosRelatorio)
                ->name('01-HstCrpEnrdvrg.pdf')
                ->download(); */

                /*  BROWSERSHOT */

                /* $template = view('livewire.relatorios.relat-01-HstCrpEnrdvrgc', ['dadosRelatorio' => $this->dadosRelatorio])->render();
                //dd($template);
                Browsershot::html($template)->timeout(300)->save(storage_path('relat-01-HstCrpEnrdvrgc-gd0S.pdf'));
                return url('/meus-pedidos'); */
                
                return view('livewire.relatorios.relat-01-HstCrpEnrdvrgc', [
                    'dadosRelatorio' => $this->dadosRelatorio
                ]);
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

                return view('livewire.relatorios.relat-02-PrcpStrss', [
                    'dadosRelatorio' => $this->dadosRelatorio,
                    'resultado' => $resultado
                ]);

            break;

            case '03-OrdncAsst':

                
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
                

                return view('livewire.relatorios.relat-03-OrdncAsst', [
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
                        [ 'Assuntos' => 'Sexualidade', 'Valor' => $this->sexualidade ]
                        
                    ]
                ]);

                case '04-CmCrbrFcn':

                    //dd($this->resultadoTeste);
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
                    
    
                    return view('livewire.relatorios.relat-04-CmCrbrFcn', [
                        'dadosRelatorio' => $this->dadosRelatorio,
                        'cerebroSocial' => $this->cerebroSocial,
                        'cerebroMesclado' => $this->cerebroMesclado,
                        'cerebroSistematizador' => $this->cerebroSistematizador,
                        'dadosGrafico' => [
                            [ 'Assuntos' => 'Cérebro Social (Tipo QE)', 'Valor' => $this->cerebroSocial ],
                            [ 'Assuntos' => 'Cérebro Mesclado (Tipo B)', 'Valor' => $this->cerebroMesclado ],
                            [ 'Assuntos' => 'Cérebro Sistematizador (Tipo QS)', 'Valor' => $this->cerebroSistematizador ]

                        ]
                        
                    ]);

            break;


            case '09-InvntrTDA_TDAH':

                /* Pdf::view('livewire.relatorios.relat-01-HstCrpEnrdvrgc', ['useranswers' => $this->useranswers])
                    ->format('a4')
                    ->save('01-HstCrpEnrdvrg.pdf'); */

                /* $pdf = Pdf::loadView('livewire.relatorios.relat-01-HstCrpEnrdvrgc', [
                        'useranswers' => $this->useranswers
                ]);
                return $pdf->download('invoice.pdf'); */
            /* return pdf()
                ->view('livewire.relatorios.relat-01-HstCrpEnrdvrgc', ['useranswers' => $this->useranswers])
                ->name('01-HstCrpEnrdvrg.pdf')
                ->download(); */
                return view('livewire.relatorios.relat-09-InvntrTDA_TDAH');
            break;

             default:
                return view('livewire.relatorios.respostas-gravadas-bd');

        }

        

        
    }
}
