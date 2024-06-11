<?php


/*  Este controlador tem por objetivo centralizar todas as importações de dados dos testes, via Excel. */
namespace App\Http\Controllers;

use App\Models\Testes;
use Illuminate\Http\Request;
use App\Imports\TestesImport;
use App\Models\GruposDeTestes;
use App\Imports\GrOpcRespostas;
use App\Imports\PerguntasImport;
use App\Imports\OpcRespostasImport;
use App\Models\GrupoOpcoesResposta;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GruposDeTestesImport;
use App\Models\OpcoesRespostas;
use App\Models\Perguntas;

class ImportDataController extends Controller
{
    /* === Importação de Grupo de Testes === */
    
    public function gruposDeTestes() 
    {
        $listarTodosOsGrupos = GruposDeTestes::all();

        return view('importData.gruposDeTestes', compact('listarTodosOsGrupos'));
    }

    public function importarGruposDeTestes(Request $request) 
    {
        $request->validate([
            'import_file' => [
                'required',
                
            ],
        ]);

        Excel::import(new GruposDeTestesImport, $request->file('import_file'));

        return redirect()->back()->with('status', 'Arquivo Importado com Sucesso');
    }

    /* === Importação do Testes === */
    
    public function testes() 
    {
        $listarTodosOsTestes = Testes::all();

        return view('importData.Testes', compact('listarTodosOsTestes'));
    }

    public function importarTestes(Request $request) 
    {
        $request->validate([
            'import_file' => [
                'required',
                
            ],
        ]);

        Excel::import(new TestesImport, $request->file('import_file'));

        return redirect('/import/testes')->with('status', 'Arquivo Importado com Sucesso');
    }

    /* === Importação dos Grupos de Opções de Respostas === */
    
    public function gropcrespostas() 
    {
        $listarGrOpcRespostas = GrupoOpcoesResposta::all();

        return view('importData.grupoOpcRespostas', compact('listarGrOpcRespostas'));
    }

    public function importarGrOpcRespostas(Request $request) 
    {
        $request->validate([
            'import_file' => [
                'required',
                
            ],
        ]);

        Excel::import(new GrOpcRespostas, $request->file('import_file'));

        return redirect('/import/gropcrespostas')->with('status', 'Arquivo Importado com Sucesso');
    }

    /* === Importação das Perguntas === */
    
    public function perguntas() 
    {
        $listarperguntas = Perguntas::all();

        return view('importData.perguntas', compact('listarperguntas'));
    }

    public function importarPerguntas(Request $request) 
    {
        $request->validate([
            'import_file' => [
                'required',
                
            ],
        ]);

        Excel::import(new PerguntasImport, $request->file('import_file'));

        return redirect('/import/perguntas')->with('status', 'Arquivo Importado com Sucesso');
    }

    /* === Importação das Opções de Respostas === */
    
    public function opcoesRespostas() 
    {
        $listarOpcResp = OpcoesRespostas::all();

        return view('importData.opcoesRespostas', compact('listarOpcResp'));
    }

    public function importarOpcoesRespostas(Request $request) 
    {
        $request->validate([
            'import_file' => [
                'required',
                
            ],
        ]);

        Excel::import(new OpcRespostasImport, $request->file('import_file'));

        return redirect('/import/opcoes-respostas')->with('status', 'Arquivo Importado com Sucesso');
    }
}
