<?php

use App\Livewire\HomeNeuroDiv;
use App\Livewire\Auth\LoginPage;
use App\Livewire\TratarRespostas;
use App\Models\SiteConfiguration;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Livewire\Auth\EsqueceuSenhaPage;
use App\Livewire\Auth\RecuperarSenhaPage;
use App\Http\Controllers\PaginaController;
use App\Livewire\Auth\RegistroUsuarioPage;
use App\Livewire\Layouts\Ecomm\GruposPage;
use App\Http\Controllers\ContatoController;
use App\Livewire\Layouts\Ecomm\CarrinhoPage;
use App\Livewire\Layouts\Ecomm\CheckoutPage;
use App\Http\Controllers\ImportDataController;
use App\Http\Controllers\RelatoriosController;
use App\Livewire\HistoricoMedico;
use App\Livewire\Layouts\Ecomm\MeusPedidosPage;
use App\Livewire\Layouts\Ecomm\PedidoCanceladoPage;
use App\Livewire\Layouts\Ecomm\PedidoDetalhesPage;
use App\Livewire\Layouts\Ecomm\PedidoSucessoPage;
use App\Livewire\Relatorios\OrdenacaoAssuntos;
use App\Livewire\Layouts\Ecomm\ProdutoDetalhesPage;
use App\Livewire\Layouts\Ecomm\VerTestesPage;
use App\Livewire\MontaPergunta;
use App\Livewire\Relatorios\ControladorRelatorios;
use App\Livewire\ResponderTeste;

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

/*  As rotas abaixo, iniciadas com "import", tem por objetivo facilitar a entrada de dados dos testes,
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
Route::get('import/genero', [ImportDataController::class, 'genero']);
Route::post('import/genero', [ImportDataController::class, 'importarGenero']);
Route::get('import/descendencias', [ImportDataController::class, 'descendencias']);
Route::post('import/descendencias', [ImportDataController::class, 'importarDescendencias']);
Route::get('import/estados', [ImportDataController::class, 'estados']);
Route::post('import/estados', [ImportDataController::class, 'importarEstados']);
Route::get('import/grau-escolar', [ImportDataController::class, 'grauEscolar']);
Route::post('import/grau-escolar', [ImportDataController::class, 'importarGrauEscolar']);
Route::get('import/texto-resposta', [ImportDataController::class, 'textoResposta']);
Route::post('import/texto-resposta', [ImportDataController::class, 'importarTextoResposta']);

Route::get('import/', function () {
    return view('importData.import');
  });
Route::get('import/verificar', function () {
    return view('importData.verificarTestes');
  });

// Roteamento para teste de buscar o pedido e testes do cliente. Por ora, o user ID está fixo no componente  
Route::get('layouts/neurodiv/tst-responder', function () {
    return view('layouts.neurodiv.tst-responder');
  });
Route::get('/tratar-respostas/{key}', TratarRespostas::class);
Route::get('/ordenacao-assuntos', OrdenacaoAssuntos::class);
  
/*  As rotas abaixo tem por objetivo implementar o E-Comm e Testes de neurodiversidade.
      
    Dawel: 15/07/2024
*/
// Rota para a página principal do projeto NeuroDiversidade
Route::get('/', HomeNeuroDiv::class)->name('neurodiv');
Route::get('/vitrine', GruposPage::class);
Route::get('/produtos/{slug}', ProdutoDetalhesPage::class);
Route::get('/carrinho', CarrinhoPage::class);


Route::middleware('guest')->group(function () {
    Route::get('/login', LoginPage::class)->name('login');
    Route::get('/registro', RegistroUsuarioPage::class);
    Route::get('/esqueceu-senha', EsqueceuSenhaPage::class)->name('password.request');
    Route::get('/recuperar-senha/{token}', RecuperarSenhaPage::class)->name('password.reset');
});


Route::middleware('auth')->group(function () {
    Route::get('logout', function(){
      auth()->logout();
      return redirect('/');
    });
    Route::get('/checkout', CheckoutPage::class);
    Route::get('/meus-pedidos', MeusPedidosPage::class);
    Route::get('/meus-pedidos/{order_id}', PedidoDetalhesPage::class);
    Route::get('/ver-testes/{order_id}', VerTestesPage::class);
    Route::get('/historico/{order_id}', HistoricoMedico::class);
    Route::get('/pedido-sucesso', PedidoSucessoPage::class)->name('success');
    Route::get('/pedido-cancelado', PedidoCanceladoPage::class)->name('cancel');
    Route::get('/responderteste', ResponderTeste::class)->name('responder');
    Route::get('/relatorios', ControladorRelatorios::class)->name('relatorio');
    
});



// Rotas do site principal da SOBRARE
Route::get('/XXX', [HomeController::class, 'index'])->name('home');
Route::get('/pagina/{key}', [PaginaController::class, 'show'])->name('pagina.show');
Route::get('/publicacoes', [HomeController::class, 'blog'])->name('layouts.publicacoes');
Route::get('/publicacoes/{key}', [HomeController::class, 'blogSingle'])->name('layouts.publicacoesSingle');
Route::get('/blogPorCategoria/{key}', [HomeController::class, 'blogPorCategoria'])->name('layouts.blogPorCategoria');
Route::post('/contato', [ContatoController::class, 'enviar'])->name('contato.enviar');

// Rota apontando para o sitema (legado) QUEST_Resiliencia
Route::get('/quest', function () {
    return redirect(route(asset('/public/legacy/index.php')));
});


