<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Models\Paginas;
use App\Models\Servico;
use App\Models\Categoria;
use App\Models\Depoimentos;
use Illuminate\Http\Request;
use App\Models\CategoriaArtigo;
use App\Models\SiteConfiguration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;


class HomeController extends Controller
{
    public $siteConfigData;
    public $servicos;
    public $depoimentos;
    public $artigos;

    public function __construct()
    {
        $this->siteConfigData = SiteConfiguration::where('configStatus', '1')->get()->first();
        $this->servicos = Servico::where('ativo', '1')->get();
        $this->depoimentos = Depoimentos::where('ativo', '1')->get();
        $this->artigos = Artigo::orderBy('created_at', 'desc')->take(3)->get();
    }
    
    
    public function index()
    {
        Cache::flush();
        //$siteConfigData = Cache::forever('cacheSiteConfig', SiteConfiguration::all());
        //$siteConfigData = SiteConfiguration::where('configStatus', '1')->get()->first();


        //$siteConfigData = cache()->remember('cacheSiteConfig', 1000, function () {
        // Your code to fetch and return the site configuration data from the database
        //  SiteConfiguration::get()->first();
        // });
        //dd($siteConfigData);
        //$servicos = Servico::where('ativo', '1')->get();

       
        $artigos = Artigo::orderBy('created_at', 'desc')->take(3)->get();

        return view('home')->with([
            'servicos' => $this->servicos,
            'siteConfigData' => $this->siteConfigData,
            'depoimentos' => $this->depoimentos,
            'artigos' => $this->artigos
        ]);
    }

    public function blog()
    {
        
        $artigos = Artigo::query()
            ->leftjoin('users', 'users.id', '=', 'artigos.user_id')
            ->select('artigos.*', 'users.name as autor')
            ->orderBy('created_at', 'desc')
            ->get();
        //dd($artigos);

        $categorias = Categoria::query()
            ->join('artigo_categoria', 'categorias.id', '=', 'artigo_categoria.categoria_id')
            ->select('categorias.title', 'categorias.id', DB::raw('count(*) as total'))
            ->groupBy('categorias.title')
            ->groupBy('categorias.id')
            ->get();

        return view('layouts.publicacoes')->with([
            //'servicos' => $this->servicos,
            'siteConfigData' => $this->siteConfigData,
            'categorias' => $categorias,
            'artigos' => $artigos
        ]);
    }

    public function blogPorCategoria($qualCategoria)
    {
              
        //$artigos = Artigo::query()

        $artigos = Categoria::query()
        ->join('artigo_categoria', 'artigo_categoria.categoria_id', '=', 'categorias.id')
        ->join('artigos', 'artigos.id', '=', 'artigo_categoria.artigo_id')
        ->join('users', 'users.id', '=', 'artigos.user_id')
        ->select('artigos.*', 'categorias.title as categoria', 'users.name as autor')
        ->where('categorias.id', '=', $qualCategoria)
        ->orderBy('created_at', 'desc')
        ->get();
        //dd($artigos);

        $categorias = Categoria::query()
            ->join('artigo_categoria', 'categorias.id', '=', 'artigo_categoria.categoria_id')
            ->select('categorias.title', 'categorias.id', DB::raw('count(*) as total'))
            ->groupBy('categorias.title')
            ->groupBy('categorias.id')
            ->get();

        //dd($categorias);
                
        return view('layouts.publicacoes')->with([
            //'servicos' => $this->servicos,
            'siteConfigData' => $this->siteConfigData,
            'artigos' => $artigos,
            'categorias' => $categorias
            
        ]);
    }

    public function blogSingle($chave)
    {
        $chave = $chave + 0;
        //var_dump($chave);       
        
        

        //$artigos = $query->first()->toSQL();
        //dd($query->toSQL());
        
        $artigos = Artigo::query()
            ->leftjoin('users', 'users.id', '=', 'artigos.user_id')
            ->leftjoin('artigo_categoria', 'artigos.id', '=', 'artigo_categoria.artigo_id')
            ->join('categorias', 'categorias.id', '=', 'artigo_categoria.categoria_id')
            ->select('users.name', 'artigos.*', 'categorias.title as cat_title')
            ->where('artigos.id', '=', $chave )
            ->first();
        //dd($artigos);
        
        $categorias = Categoria::query()
            ->join('artigo_categoria', 'categorias.id', '=', 'artigo_categoria.categoria_id')
            ->select('categorias.title', 'categorias.id', DB::raw('count(*) as total'))
            ->groupBy('categorias.title')
            ->groupBy('categorias.id')
            ->get();
        //@dd($categorias);

        

        return view('layouts.publicacoesSingle')->with([
            //'servicos' => $this->servicos,
            'siteConfigData' => $this->siteConfigData,
            'categorias' => $categorias,
            'artigos' => $artigos
        ]);
    }
}
