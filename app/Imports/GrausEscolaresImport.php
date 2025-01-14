<?php

namespace App\Imports;

//use App\Models\GrupoOpcoesResposta;
use App\Models\GrausEscolares;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GrausEscolaresImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
                $getGrauEscolarID = GrausEscolares::where('grau_escolar', $row['grau_escolar'])->first();
                if(! $getGrauEscolarID) {
                    redirect('/import/grau-escolar')->with('status', 'Tabela Excel com Erro: GrausEscolares não encontrado');
                }
                GrausEscolares::create([
                
                    'grau_escolar' => $row['grau_escolar'], 
                    
                ]);
        }
    }
    
}
