<?php

namespace App\Http\Controllers;

use App\Jobs\GerarRelatorios;
use App\Models\User;
use App\Models\Testes;
use App\Models\Useranswers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Historicomedicos;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;
//use Spatie\Browsershot\Browsershot;

use function Spatie\LaravelPdf\Support\pdf;

class RelatoriosController extends Controller
{
    public function index(Request $request) {

        $orders_id = $request->ccxx;
        $testes_id = $request->cctt;
        $orderItem_id = $request->ccii;

        $resultadoTeste = Useranswers::with('pergunta', 'opcaoResposta:id,textoResposta,valorResposta')
                                    ->where('orderitems_id', $orderItem_id)
                                    ->where('testes_id', $testes_id)
                                    ->get();
        
        $dataFinalTeste = $resultadoTeste->max('created_at')->format('d-m-Y');
        
        //$this->useranswers = $this->resultadoTeste[0]->useranswers;
        //dd($this->useranswers);
        
        $user = User::where('id', auth()->user()->id)->first();
        $nomeCliente = $user['name'];
        $idadeCliente = Carbon::parse($user->data_nascimento)->age;
        $sexoBiologico = $user->sexo_biologico;
        $estadoNascimentoCliente = $user->estado_nascimento;
        $dadosCliente = Historicomedicos::where('orders_id', $orders_id)->first();

        $dataEmissao = Carbon::now()->format('d-m-Y');

        $dadosDoTeste = Testes::where('id',$testes_id)->first();
        $tituloTeste = $dadosDoTeste->nomeTeste;
        $codTeste = $dadosDoTeste->codTeste;

        $dadosRelatorio = [
            'tituloTeste' => $tituloTeste,
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

        GerarRelatorios::dispatch($dadosRelatorio);
        /*  BROWSERSHOT */

           // $template = view('livewire.relatorios.relat_01_teste', ['dadosRelatorio' => $dadosRelatorio])->render();
            //dd($template);
            /* $pdf = Browsershot::html($template)
                    ->setIncludePath('$PATH://Program Files/nodejs')
                    ->timeout(360)
                    ->savePdf(storage_path('app/pdf/relat01_HstCrp_' . auth()->user()->name . '.pdf')); */
            /* $pdf = Browsershot::html($template)->timeout(300)->savePdf(storage_path('relat-01-HstCrpEnrdvrgc-gd07S.pdf')); */
           // dd($pdf);

           //  $pdf = generatePdf(); // Replace with your PDF generation logic
          //  $pdfFilePath = storage_path('app/pdf/relat-01-HstCrpEnrdvrgc' . auth()->user()->name . '.pdf');
          //  file_put_contents($pdfFilePath, $pdf);

          /*  SPATIE LARAVEL-PDF */

          /* return pdf()
            ->view('livewire.relatorios.relat_01_teste', ['dadosRelatorio' => $dadosRelatorio])
            ->name('invoice-2023-04-10.pdf'); */

          /* Pdf::view('livewire.relatorios.relat_01_teste', ['dadosRelatorio' => $dadosRelatorio])
                        ->format('A4')
                        ->margins(10,10,10,10)
                        ->withBrowsershot(function (Browsershot $browsershot) {
                            $browsershot
                                //->setNodeBinary('C:\Program Files\nodejs\node.exe')
                                //->setNpmBinary('C:\Program Files\nodejs\npm.exe')
                                ->timeout(300)
                                ->setOption('newHeadless', true);
                        })
                        ->save(storage_path('app/pdf/relat_01_'. $orders_id . '_' . auth()->user()->name . '.pdf'));
            
            return url('/meus-pedidos'); */
            return redirect('/meus-pedidos'); 
}

}