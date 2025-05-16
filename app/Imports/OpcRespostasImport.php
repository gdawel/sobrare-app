<?php

namespace App\Imports;

use App\Models\GrupoOpcoesResposta;
use App\Models\OpcoesRespostas;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OpcRespostasImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
                $getGrOpcRespID = GrupoOpcoesResposta::where('codGrupoOpcRespostas', $row['cod_gr_opc_respostas'])->first();
                if(! $getGrOpcRespID) {
                    redirect('/import/opcoes-respostas')->with('status', 'Tabela Excel com Erro: Grupo Opção de Resposta não encontrado');
                }
                
                $opcRespostaExistente = OpcoesRespostas::where('grupo_opcoes_respostas_id', $getGrOpcRespID['id'])
                                   ->where('numSeqResp', $row['num_seq_resposta'])
                                   ->first();
                if ($opcRespostaExistente) {
                    $opcRespostaExistente->update([
                        'grupo_opcoes_respostas_id' => $getGrOpcRespID['id'], 
                        'numSeqResp' => $row['num_seq_resposta'], 
                        'textoResposta' => $row['texto_resposta'], 
                        'valorResposta' => $row['valor_resposta'], 
                        'requer_comentarios' => $row['requer_comentarios'],
                        'requer_complemento' => $row['requer_complemento'],
                        'validar_complemento' => $row['validar_complemento'],
                        'validar_intensidade' => $row['validar_intensidade'],
                        'tipoOpcaoResposta' => $row['tipo_opc_resposta'],
                        'inputType' => $row['field_input_type']

                    ]);

                } else {

                    OpcoesRespostas::create([
                    
                        'grupo_opcoes_respostas_id' => $getGrOpcRespID['id'], 
                        'numSeqResp' => $row['num_seq_resposta'], 
                        'textoResposta' => $row['texto_resposta'], 
                        'valorResposta' => $row['valor_resposta'], 
                        'requer_comentarios' => $row['requer_comentarios'],
                        'requer_complemento' => $row['requer_complemento'],
                        'validar_complemento' => $row['validar_complemento'],
                        'validar_intensidade' => $row['validar_intensidade'],
                        'tipoOpcaoResposta' => $row['tipo_opc_resposta'],
                        'inputType' => $row['field_input_type']
                    ]);
                    }
        }
    
    }
}