<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaginaController;
use App\Models\SiteConfiguration;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/pagina/{key}', [PaginaController::class, 'show'])->name('pagina.show');
Route::get('/publicacoes', [HomeController::class, 'blog'])->name('layouts.publicacoes');
Route::get('/publicacoes/{key}', [HomeController::class, 'blogSingle'])->name('layouts.publicacoesSingle');
Route::get('/blogPorCategoria/{key}', [HomeController::class, 'blogPorCategoria'])->name('layouts.blogPorCategoria');

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
