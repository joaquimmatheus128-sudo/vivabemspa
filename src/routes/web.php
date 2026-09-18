<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/dashboard/categorias', [AdminController::class, 'categoria'])->name('admin.categoria.index');

// URLs sem página própria exibem a página inicial.
Route::fallback([HomeController::class, 'index']);
