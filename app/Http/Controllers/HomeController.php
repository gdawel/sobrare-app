<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Models\Paginas;
use App\Models\Servico;
use App\Models\Depoimentos;
use Illuminate\Http\Request;
use App\Models\SiteConfiguration;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        Cache::flush();
        //$siteConfigData = Cache::forever('cacheSiteConfig', SiteConfiguration::all());
        $siteConfigData = SiteConfiguration::get()->first();

        //$siteConfigData = cache()->remember('cacheSiteConfig', 1000, function () {
        // Your code to fetch and return the site configuration data from the database
        //  SiteConfiguration::get()->first();
        // });
        //dd($siteConfigData);
        $servicos = Servico::where('ativo', '1')->get();

        $depoimentos = Depoimentos::where('ativo', '1')->get();
        //$depoimentos = Depoimentos::all();
        $artigos = Artigo::orderBy('created_at', 'desc')->take(3)->get();

        return view('home')->with([
            'servicos' => $servicos,
            'siteConfigData' => $siteConfigData,
            'depoimentos' => $depoimentos,
            'artigos' => $artigos
        ]);
    }
}
