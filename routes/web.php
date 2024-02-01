<?php

use App\Models\SiteConfiguration;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaginaController;
use App\Http\Controllers\ProfileController;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/loginX', [HomeController::class, 'login'])->name('loginX');
Route::get('/pagina/{key}', [PaginaController::class, 'show'])->name('pagina.show');
Route::get('/publicacoes', [HomeController::class, 'blog'])->name('layouts.publicacoes');
Route::get('/publicacoes/{key}', [HomeController::class, 'blogSingle'])->name('layouts.publicacoesSingle');
Route::get('/blogPorCategoria/{key}', [HomeController::class, 'blogPorCategoria'])->name('layouts.blogPorCategoria');

Route::get('/quest', function () {
    return redirect(route(asset('/public/legacy/index.php')));
});
