<?php

namespace App\Imports;

//use App\Models\GrupoOpcoesResposta;
use App\Models\Generos;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GenerosImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
                $getGeneroID = Generos::where('genero', $row['genero'])->first();
                if(! $getGeneroID) {
                    redirect('/import/genero')->with('status', 'Tabela Excel com Erro: Generos não encontrado');
                }
                Generos::create([
                
                    'genero' => $row['genero'], 
                    
                ]);
        }
    }
    
}
