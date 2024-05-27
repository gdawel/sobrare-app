<?php

use App\Models\SiteConfiguration;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ImportDataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* As rotas abaixo, iniciadas com "import", tem por objetivo facilitar a entrada de dados dos testes,
      por meio da importação de dados do Excel (cada tabela em arquivo separado).
      
      Estas rotas serão desabilitadas quando esta versão do sistema for colocada em produção.
      */
Route::get('import/grupo-de-testes', [ImportDataController::class, 'gruposDeTestes']);
Route::post('import/grupo-de-testes', [ImportDataController::class, 'importarGruposDeTestes']);
Route::get('import/testes', [ImportDataController::class, 'testes']);
Route::post('import/testes', [ImportDataController::class, 'importarTestes']);
Route::get('import/gropcrespostas', [ImportDataController::class, 'gropcrespostas']);
Route::post('import/gropcrespostas', [ImportDataController::class, 'importarGrOpcRespostas']);
Route::get('import/perguntas', [ImportDataController::class, 'perguntas']);
Route::post('import/perguntas', [ImportDataController::class, 'importarPerguntas']);
Route::get('import/opcoes-respostas', [ImportDataController::class, 'opcoesRespostas']);
Route::post('import/opcoes-respostas', [ImportDataController::class, 'importarOpcoesRespostas']);

Route::get('import/', function () {
    return view('importData.import');
  });
Route::get('import/verificar', function () {
    return view('importData.verificarTestes');
  });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pagina/{key}', [PaginaController::class, 'show'])->name('pagina.show');
Route::get('/publicacoes', [HomeController::class, 'blog'])->name('layouts.publicacoes');
Route::get('/publicacoes/{key}', [HomeController::class, 'blogSingle'])->name('layouts.publicacoesSingle');
Route::get('/blogPorCategoria/{key}', [HomeController::class, 'blogPorCategoria'])->name('layouts.blogPorCategoria');
Route::post('/contato', [ContatoController::class, 'enviar'])->name('contato.enviar');

Route::get('/quest', function () {
    return redirect(route(asset('/public/legacy/index.php')));
});

//Route::get('/publicacoes', function () {
  //  $siteConfigData = SiteConfiguration::get()->first();
    //return view('layouts.publicacoes')->with([
      //      
        //    'siteConfigData' => $siteConfigData,
//
  //      ]);
//});

Route::get('/texto', function () {
    return view('layouts.pagina-texto');
});
