<?php

namespace App\Imports;

//use App\Models\GrupoOpcoesResposta;
use App\Models\Descendencias;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DescendenciasImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
                $getDescendenciaID = Descendencias::where('descendencia', $row['descendencia'])->first();
                if(! $getDescendenciaID) {
                    redirect('/import/descendencias')->with('status', 'Tabela Excel com Erro: Descendencias não encontrado');
                }
                Descendencias::create([
                
                    'descendencia' => $row['descendencia'], 
                    
                ]);
        }
    }
    
}
