<?php

namespace App\Imports;

//use App\Models\GrupoOpcoesResposta;
use App\Models\Estados;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EstadosImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
                $getEstadoID = Estados::where('estado', $row['estado'])->first();
                if(! $getEstadoID) {
                    redirect('/import/estados')->with('status', 'Tabela Excel com Erro: Estados não encontrado');
                }
                Estados::create([
                
                    'uf' => $row['uf'], 
                    'estado' => $row['estado'], 
                    
                ]);
        }
    }
    
}
