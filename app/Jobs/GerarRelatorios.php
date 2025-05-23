<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Testes;
use App\Models\Useranswers;
use App\Models\Historicomedicos;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;
use Illuminate\Foundation\Bus\Dispatchable;


class GerarRelatorios implements ShouldQueue
{
    
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ccxx;
    protected $cctt;
    protected $ccii;
    protected $userId;
    protected $dadosRelatorio;

    /**
     * Create a new job instance.
     */
    public function __construct($ccxx, $cctt, $ccii, $userId)
    {
        $this->ccxx = $ccxx;
        $this->cctt = $cctt;
        $this->ccii = $ccii;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        // Step 1: Prepare Data
        $orders_id = $this->ccxx;
        $testes_id = $this->cctt;
        $orderItem_id = $this->ccii;

       /*  $checkParameters = "handle-ccxx=".$this->ccxx . " / cctt=". $this->cctt . " / ccii=". $this->ccii . " / userId:".$this->userId;
        dd($checkParameters); */

        $resultadoTeste = Useranswers::with('pergunta', 'opcaoResposta:id,numSeqResp,textoResposta,valorResposta', 'textoResposta')
            ->where('orderitems_id', $orderItem_id)
            ->where('testes_id', $testes_id)
            ->get();

        $dataFinalTeste = $resultadoTeste->max('created_at')->format('d-m-Y');

        $user = User::where('id', $this->userId)->first();
        $nomeCliente = $user['name'];
        $idadeCliente = Carbon::parse($user->data_nascimento)->age;
        $sexoBiologico = $user->sexo_biologico;
        $estadoNascimentoCliente = $user->estado_nascimento;
        $dadosCliente = Historicomedicos::where('orders_id', $orders_id)->first();

        $dataEmissao = Carbon::now()->format('d-m-Y');

        $dadosDoTeste = Testes::where('id', $testes_id)->first();
        $tituloTeste = $dadosDoTeste->nomeTeste;
        $codTeste = $dadosDoTeste->codTeste;
        $textoIntro = $dadosDoTeste->textoIntro;
        $textoFecha = $dadosDoTeste->textoFecha;
        $textoRodape = $dadosDoTeste->textoRodape;

        $this->dadosRelatorio = [
            'tituloTeste' => $tituloTeste,
            'codTeste' => $codTeste,
            'textoIntro' => $textoIntro,
            'textoFecha' => $textoFecha,
            'textoRodape' => $textoRodape,
            'orders_id' => $orders_id,
            'idadeCliente' => $idadeCliente,
            'estadoNascimentoCliente' => $estadoNascimentoCliente,
            'nomeCliente' => $nomeCliente,
            'sexoBiologico' => $sexoBiologico,
            'dataEmissao' => $dataEmissao,
            'dataFinalTeste' => $dataFinalTeste,
            'resultadoTeste' => $resultadoTeste,
            'dadosCliente' => $dadosCliente,
        ];
        
        

        // Step 2: Choose View Based on Test Code
        switch ($codTeste) {

            case '01-HstCrpEnrdvrgc':

                $relatorio = $this->dadosRelatorio;
                
                //return url('/meus-pedidos');
                /* Spatie Laravel-pdf */
                /* Pdf::view('livewire.relatorios.relat-01-HstCrpEnrdvrgc', 
                        ['dadosRelatorio' => $relatorio])
                    ->format('a4')
                    ->save(storage_path('01HstCrpEnrdvrg6gd.pdf')); 
                    return ("DONE!"); */

                /* 
                ==> dompdf   */   
                /* $template = view('livewire.relatorios.relat-01-HstCrpEnrdvrgc', ['dadosRelatorio' => $dadosRelatorio])->render();  */
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
                ->view('livewire.relatorios.relat-01-HstCrpEnrdvrgc', $dadosRelatorio)
                ->name('01-HstCrpEnrdvrg.pdf')
                ->download(); */

                /*  BROWSERSHOT */

                /* $template = view('livewire.relatorios.relat-01-HstCrpEnrdvrgc', ['dadosRelatorio' => $this->dadosRelatorio])->render();
                //dd($template);
                Browsershot::html($template)->timeout(300)->save(storage_path('relat-01-HstCrpEnrdvrgc-gd0S.pdf'));
                return url('/meus-pedidos'); */
                
                /* return view('livewire.relatorios.relat-01-HstCrpEnrdvrgc', [
                    'dadosRelatorio' => $this->dadosRelatorio
                ]
                ); */
            break;

            case '02-PrcpStrss':

                $somaTudo = 0;
                $somaB = 0;
                foreach ($resultadoTeste as $items) {
                
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

                /* return view('livewire.relatorios.relat-02-PrcpStrss', [
                    'dadosRelatorio' => $dadosRelatorio,
                    'resultado' => $resultado
                ]); */
                $qualRelatorio = 'livewire.relatorios.relat-'.$this->dadosRelatorio['codTeste'];
                
                /*  BROWSERSHOT */

                $template = view('livewire.relatorios.relat-02-PrcpStrss', 
                            [ 'dadosRelatorio' => $this->dadosRelatorio,
                              'resultado' => $resultado ])
                            ->render();
                //dd($template);
                Browsershot::html($template)->timeout(300)->save(storage_path('relat-02-PrcpStrss-gd0S.pdf'));
                




                /* try {

                $html = View::make('livewire.relatorios.relat-02-PrcpStrss', [
                    'dadosRelatorio' => $dadosRelatorio,
                    'resultado' => $resultado
                ])->render();

                //dd($html);

                    } catch (\Exception $e) {
                        dd('Error generating view:', $e->getMessage(), $e->getTrace());
                    } */
            
            

            case '03-OrdncAsst':

                $comunicacao=0;
                $pensamento=0;
                $atencao=0;
                $tensao=0;
                $social=0;
                $emocional=0;
                $mental=0;
                $sexualidade=0;
                
                foreach ($resultadoTeste as $items) {
                
                    /* A Minha Comunicação */
                    if($items->sequencia == 1 or $items->sequencia == 9 or $items->sequencia == 12 or 
                                                $items->sequencia == 14) {
                        $comunicacao = $comunicacao + $items->opcaoResposta->valorResposta; 
                    }

                    /* Meu Pensamento */
                    if($items->sequencia == 3 or $items->sequencia == 4 or $items->sequencia == 13 or 
                                                $items->sequencia == 21 or $items->sequencia == 26 or $items->sequencia == 27) {
                        $pensamento = $pensamento + $items->opcaoResposta->valorResposta; 
                    }
                    
                    /* Meu Processo de Atenção */
                    if($items->sequencia == 5 or $items->sequencia == 7 or $items->sequencia == 17 or 
                                                $items->sequencia == 18 or $items->sequencia == 19) {
                        $atencao = $atencao + $items->opcaoResposta->valorResposta; 
                    }
                    
                    /* Minha Tensão Muscular */
                    if($items->sequencia == 6 or $items->sequencia == 10 or $items->sequencia == 20 or 
                                                $items->sequencia == 23) {
                        $tensao = $tensao + $items->opcaoResposta->valorResposta; 
                    }
                    
                    /* Meu Desempenho Social */
                    if($items->sequencia == 2 or $items->sequencia == 8 or $items->sequencia == 15) {
                        $social = $social + $items->opcaoResposta->valorResposta; 
                    }

                    /* Meus Estados Emocionais */
                    if($items->sequencia == 11 or $items->sequencia == 22 or $items->sequencia == 24 or 
                                                $items->sequencia == 25) {
                        $emocional = $emocional + $items->opcaoResposta->valorResposta; 
                    }

                    /* Condições Mentais e Físicas */
                    if($items->sequencia == 28 or $items->sequencia == 29 or $items->sequencia == 30) {
                        $mental = $mental + $items->opcaoResposta->valorResposta; 
                    }

                    /* Minha Sexualidade e Lazer */
                    if($items->sequencia == 31 or $items->sequencia == 32 or $items->sequencia == 33 or 
                                                $items->sequencia == 34) {
                        $sexualidade = $sexualidade + $items->opcaoResposta->valorResposta; 
                    }
                }
                

                return view('livewire.relatorios.relat-03-OrdncAsst', [
                    'dadosRelatorio' => $this->dadosRelatorio,
                    'comunicacao' => $comunicacao,
                    'pensamento' => $pensamento,
                    'atencao' => $atencao,
                    'tensao' => $tensao,
                    'social' => $social,
                    'emocional' => $emocional,
                    'mental' => $mental,
                    'sexualidade' => $sexualidade,
                    'dadosGrafico' => [
                        [ 'Assuntos' => 'Comunicacao', 'Valor' => $comunicacao ],
                        [ 'Assuntos' => 'Pensamento', 'Valor' => $pensamento ],
                        [ 'Assuntos' => 'Atencao', 'Valor' => $atencao ],
                        [ 'Assuntos' => 'Tensao', 'Valor' => $tensao ],
                        [ 'Assuntos' => 'Social', 'Valor' => $social ],
                        [ 'Assuntos' => 'Emocional', 'Valor' => $emocional ],
                        [ 'Assuntos' => 'Mental', 'Valor' => $mental ],
                        [ 'Assuntos' => 'Sexualidade', 'Valor' => $sexualidade ]
                        
                    ]
                ]);

            break;

            case '04-CmCrbrFcn':
                $cerebroSocial = 0;
                $cerebroMesclado = 0;
                $cerebroSistematizador = 0;

                foreach ($resultadoTeste as $items) {
                    if ($items->opcaoResposta->textoResposta == 'Concordo Totalmente') {
                        if ($items->sequencia >= 1 && $items->sequencia <= 11) {
                            $cerebroSocial += $items->opcaoResposta->valorResposta;
                        }
                        if ($items->sequencia >= 11 && $items->sequencia <= 20) {
                            $cerebroSistematizador += $items->opcaoResposta->valorResposta;
                        }
                    }

                    if ($items->opcaoResposta->textoResposta == 'Discordo Totalmente') {
                        $cerebroMesclado += $items->opcaoResposta->valorResposta;
                    }
                }

                $html = View::make('livewire.relatorios.relat-04-CmCrbrFcn', [
                    'dadosRelatorio' => $this->dadosRelatorio,
                    'cerebroSocial' => $cerebroSocial,
                    'cerebroMesclado' => $cerebroMesclado,
                    'cerebroSistematizador' => $cerebroSistematizador,
                    'dadosGrafico' => [
                        ['Assuntos' => 'Cérebro Social (Tipo QE)', 'Valor' => $cerebroSocial],
                        ['Assuntos' => 'Cérebro Mesclado (Tipo B)', 'Valor' => $cerebroMesclado],
                        ['Assuntos' => 'Cérebro Sistematizador (Tipo QS)', 'Valor' => $cerebroSistematizador],
                    ]
                ])->render();
                break;



                case '05-AnsddDthd':

                    // RELATÓRIO: Ansiedade Detalhada e Neurodiversidade
    
                    return view('livewire.relatorios.relat-05-AnsddDthd', 
                            ['dadosRelatorio' => $this->dadosRelatorio]);
                break;
    
                
                case '06-Ansieddbsc':
    
                    // RELATÓRIO: Inventário para Fobia Social ou Disturbio de Ansiedade
                    
                    return view('livewire.relatorios.relat-06-Ansieddbsc', 
                            ['dadosRelatorio' => $this->dadosRelatorio]);
                break;
    
    
                
                case '07-Depressbsc':
    
                    // RELATÓRIO: Inventário para Disturbios Depressivos
                    
                    return view('livewire.relatorios.relat-07-Depressbsc', 
                            ['dadosRelatorio' => $this->dadosRelatorio]);
                break;
    
    
                case '08-CmptRpttv':
    
                    // RELATÓRIO: Inventário para Disturbios Depressivos
    
                    $percentSistematizacao = ceil($resultadoTeste[0]->opcaoResposta->valorResposta +
                                                    $resultadoTeste[1]->opcaoResposta->valorResposta);
                    $percentRegulacao = ceil($resultadoTeste[2]->opcaoResposta->valorResposta +
                                                    $resultadoTeste[3]->opcaoResposta->valorResposta +
                                                    $resultadoTeste[4]->opcaoResposta->valorResposta +
                                                    $resultadoTeste[5]->opcaoResposta->valorResposta);
                    $percetInteresses = ceil($resultadoTeste[6]->opcaoResposta->valorResposta +
                                                    $resultadoTeste[7]->opcaoResposta->valorResposta +
                                                    $resultadoTeste[8]->opcaoResposta->valorResposta +
                                                    $resultadoTeste[9]->opcaoResposta->valorResposta);
                    $percentAcumulacao = ceil($resultadoTeste[10]->opcaoResposta->valorResposta +
                                                    $resultadoTeste[11]->opcaoResposta->valorResposta);
                    $percentMesmice = ceil($resultadoTeste[12]->opcaoResposta->valorResposta +
                                                    $resultadoTeste[13]->opcaoResposta->valorResposta);
                    $percentSensibilidade = ceil($resultadoTeste[14]->opcaoResposta->valorResposta +
                                                    $resultadoTeste[15]->opcaoResposta->valorResposta);
                    $percentRestricao = ceil($resultadoTeste[16]->opcaoResposta->valorResposta +
                                            $resultadoTeste[17]->opcaoResposta->valorResposta +
                                            $resultadoTeste[18]->opcaoResposta->valorResposta +
                                            $resultadoTeste[19]->opcaoResposta->valorResposta);
    
                    $percentCM = $percentSistematizacao + $percentRegulacao;
                    $percentIM = $percetInteresses + $percentAcumulacao + $percentMesmice;
                    $percentRS = $percentSensibilidade + $percentRestricao;
                    $percentSomaTendencia = $percentCM + $percentIM + $percentRS;
    
                    
                    
                    if($percentCM <= 13.35) {
                        $diagnosticoCM = "Leve ou pouco significante";
                    } else { 
                        if($percentCM <= 19.81) {
                            $diagnosticoCM = "Necessita atenção";
                        } else { 
                            if($percentCM > 19.81) {
                                $diagnosticoCM = "Requer ajuda clínica";
                            }
                        }
                    };
    
                    if($percentIM <= 13.35) {
                        $diagnosticoIM = "Leve ou pouco significante";
                    } else { 
                        if($percentIM <= 19.81) {
                            $diagnosticoIM = "Necessita atenção";
                        } else { 
                            if($percentIM > 19.81) {
                                $diagnosticoIM = "Requer ajuda clínica";
                            }
                        }
                    };
    
                    if($percentRS <= 13.35) {
                        $diagnosticoRS = "Leve ou pouco significante";
                    } else { 
                        if($percentRS <= 19.81) {
                            $diagnosticoRS = "Necessita atenção";
                        } else { 
                            if($percentRS > 19.81) {
                                $diagnosticoRS = "Requer ajuda clínica";
                            }
                        }
                    };
    
                    //dd($diagnosticoRS);

                    /*  BROWSERSHOT */

                $template = view('livewire.relatorios.relat-08-CmptRpttv', 
                [ 'dadosRelatorio' => $this->dadosRelatorio,
                   ])
                ->render();
                //dd($template);
                Browsershot::html($template)->timeout(300)->save(storage_path('relat-relat-08-CmptRpttv-gd0S.pdf'));          
    
                    return view('livewire.relatorios.relat-08-CmptRpttv', 
                            ['dadosRelatorio' => $this->dadosRelatorio]);
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
                    return view('livewire.relatorios.relat-09-InvntrTDA_TDAH', 
                            ['dadosRelatorio' => $this->dadosRelatorio]);
                break;

            default:
                $html = View::make('livewire.relatorios.relat-'.$this->dadosRelatorio['codTeste'], [
                    'dadosRelatorio' => $this->dadosRelatorio
                ])->render();
        }

        // Step 3: Generate PDF with Browsershot

        /* $qualRelatorio = "livewire.relatorios.relat-" . $this->dadosRelatorio['codTeste'];
        
        Pdf::view($qualRelatorio , ['dadosRelatorio' => $this->dadosRelatorio])
                        ->format('A4')
                        ->margins(10,4,18,4)
                        //->footerHtml('<p style="font-family: Verdana; font-size: 10px; text-align:center;">© 2024 SOBRARE - Todos os direitos reservados.</p>')
                        ->withBrowsershot(function (Browsershot $browsershot) {
                            $browsershot
                                ->setNodeBinary('C:\Program Files\nodejs\node.exe')
                                ->setNpmBinary('C:\Program Files\nodejs\npm.exe')
                                ->timeout(300)
                                
                                ->setOption('newHeadless', true);
                        })
                        ->save(storage_path('app/pdf/'. $this->dadosRelatorio['codTeste'] . "_" .$this->dadosRelatorio['orders_id'] . '_' . $this->dadosRelatorio['nomeCliente'] . '.pdf'));

                        return; */
        $fileName = "rel-" . $codTeste . "_" . $orders_id . "_" . $nomeCliente . ".pdf";
        dd($fileName);
        Browsershot::html($html)
            ->setOption('displayHeaderFooter', false)
            ->save(storage_path('app/pdf/' . $fileName));


        // Dawel: working in the old version
        /* $qualRelatorio = "livewire.relatorios.relat-" . $dadosRelatorio['codTeste'];

        dd($qualRelatorio);
        
        Pdf::view($qualRelatorio , ['dadosRelatorio' => $dadosRelatorio, 'resultado' => $resultado])
                        ->format('A4')
                        ->margins(10,4,18,4)
                        //->footerHtml('<p style="font-family: Verdana; font-size: 10px; text-align:center;">© 2024 SOBRARE - Todos os direitos reservados.</p>')
                        ->withBrowsershot(function (Browsershot $browsershot) {
                            $browsershot
                                ->setNodeBinary('C:\Program Files\nodejs\node.exe')
                                ->setNpmBinary('C:\Program Files\nodejs\npm.exe')
                                ->timeout(300)
                                
                                ->setOption('newHeadless', true);
                        })
                        ->save(storage_path('app/pdf/'. $dadosRelatorio['codTeste'] . "_" .$dadosRelatorio['orders_id'] . '_' . $dadosRelatorio['nomeCliente'] . '.pdf')); */

                        return;
    }
}