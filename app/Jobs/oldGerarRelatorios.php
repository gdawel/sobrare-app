<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Spatie\LaravelPdf\Facades\Pdf;
use Spatie\Browsershot\Browsershot;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class GerarRelatorios implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public $dadosRelatorio = [];
    
    public function __construct($dadosRelatorio)
    {
        $this->dadosRelatorio = $dadosRelatorio;
        

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $qualRelatorio = "livewire.relatorios.relat-" . $this->dadosRelatorio['codTeste'];
        
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

                        return;
    }
}
