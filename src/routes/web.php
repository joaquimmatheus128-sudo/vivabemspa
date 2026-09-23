<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SobreController;
use App\Http\Controllers\Site\ContatoController;
use App\Http\Controllers\Site\ServicoController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sobre', [SobreController::class, 'sobre'])->name('sobre');

Route::get('/servico', [ServicoController::class, 'servico'])->name('servico');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/contato', [ContatoController::class, 'contato'])->name('contato');


Route::get('/dashboard/categorias', [AdminController::class, 'categoria'])->name('admin.categoria.index');

// URLs sem página própria exibem a página inicial.
Route::fallback([HomeController::class, 'index']);
