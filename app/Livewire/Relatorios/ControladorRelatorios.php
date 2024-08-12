<?php

namespace App\Livewire\Relatorios;

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
        $this->useranswers = $this->resultadoTeste[0]->useranswers;
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

        $this->dadosRelatorio = [
            'tituloTeste' => $this->tituloTeste,
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
