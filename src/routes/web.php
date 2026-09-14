<?php

use App\Http\Controllers\Site\ContactController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\ServicosController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contato', [ContactController::class, 'contato'])->name('contato');
Route::post('/contato', [ContactController::class, 'store'])->name('contact.store');
Route::get('/servicos', [ServicosController::class, 'servicos'])->name('servicos');
