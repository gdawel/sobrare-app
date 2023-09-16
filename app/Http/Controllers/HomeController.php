<?php

namespace App\Http\Controllers;

use App\Models\Artigo;
use App\Models\Depoimentos;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // $servicos = Model1::all();
        // $servicos = [''];
        $depoimentos = Depoimentos::where('ativo', '1')->get();
        //$depoimentos = Depoimentos::all();
        $artigos = Artigo::orderBy('created_at', 'desc')->take(3)->get();

        return view('home')->with([
            //'servicos' => $servicos,
            'depoimentos' => $depoimentos,
            'artigos' => $artigos
        ]);
    }
}
