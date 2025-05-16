<?php

namespace App\Imports;

use App\Models\GrupoOpcoesResposta;
use App\Models\Testes;
use App\Models\Perguntas;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PerguntasImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
                $getTestId = Testes::where('codTeste', $row['cod_teste'])->first();
                if(! $getTestId) {
                    redirect('/import/perguntas')->with('status', 'Tabela Excel com Erro: Cód. Teste não encontrado');
                }

                $getOpcRespId = GrupoOpcoesResposta::where('codGrupoOpcRespostas', $row['grupo_opc_respostas'])->first();
                if(! $getOpcRespId) {
                    redirect('/import/perguntas')->with('status', 'Tabela Excel com Erro: Opc Resposta não encontrado');
                }

                $perguntaExistente = Perguntas::where('testes_id', $getTestId['id'])
                                   ->where('sequencia', $row['n_pergunta'])
                                   ->first();
                if ($perguntaExistente) {
                    $perguntaExistente->update([
                        'testes_id' => $getTestId['id'], 
                        'grupo_opcoes_respostas_id' => $getOpcRespId['id'],
                        'sequencia' => $row['n_pergunta'], 
                        'enunciado' => $row['enunciado'], 
                        'sexo' => $row['sexo'],
                        'codGrupoOpcRespostas' => $row['grupo_opc_respostas']
                

                    ]);

                } else {
                    Perguntas::create([
                
                    'testes_id' => $getTestId['id'], 
                    'grupo_opcoes_respostas_id' => $getOpcRespId['id'],
                    'sequencia' => $row['n_pergunta'], 
                    'enunciado' => $row['enunciado'], 
                    'sexo' => $row['sexo'],
                    'codGrupoOpcRespostas' => $row['grupo_opc_respostas']
                    ]);
                
                };
        }
    
    }
}