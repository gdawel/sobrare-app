<?php

namespace App\Http\Controllers;

use App\Models\Paginas;
use Illuminate\Http\Request;
use App\Models\SiteConfiguration;

class PaginaController extends Controller
{
    public function show($chave)
    {
        $pagina = Paginas::where('chave', $chave)->first();
        $siteConfigData = SiteConfiguration::get()->first();


        //dd($pagina);
        return view('layouts.pagina')->with([
            'pagina' => $pagina,
            'siteConfigData' => $siteConfigData,

        ]);
    }
}
