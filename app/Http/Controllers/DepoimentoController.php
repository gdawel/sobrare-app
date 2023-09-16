<?php

namespace App\Http\Controllers;

use App\Models\Depoimentos;
use Illuminate\Http\Request;

class DepoimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     * George: este método é para mostrar todos os depoimentos na página principal do Site
     */
    public function index()
    {
        $depoimentos = Depoimentos::query()->where('ativo', '=', '1');

        return $depoimentos;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Depoimentos $depoimentos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Depoimentos $depoimentos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Depoimentos $depoimentos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depoimentos $depoimentos)
    {
        //
    }
}
