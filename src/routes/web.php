<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SobreController;
use App\Http\Controllers\Site\ContatoController;
use App\Http\Controllers\Site\ServicoController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sobre', [SobreController::class, 'sobre'])->name('sobre');

// Listagem geral dos serviços
Route::get('/servico', [ServicoController::class, 'servico'])->name('servico');

// Detalhe de cada serviço dinâmico (ex: /servico/shiatsu)
Route::get('/servico/{id}', [ServicoController::class, 'show'])->name('servico.show');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

Route::get('/contato', [ContatoController::class, 'contato'])->name('contato');

Route::get('/dashboard/categorias', [AdminController::class, 'categoria'])->name('admin.categoria.index');

// URLs sem página própria exibem a página inicial.
Route::fallback([HomeController::class, 'index']);