<?php

use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\SobreController;
use App\Http\Controllers\Site\ContatoController;
use App\Http\Controllers\Site\ServicoController;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/galeria/{id}', [HomeController::class, 'galeriaShow'])->name('imagem_galeria');

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
|
| O middleware guest permite acessar estas rotas somente quando o usuário NÃO está autenticado.
|
*/

Route::middleware('guest')->group(function () {

    // Exibir tela de login
    Route::get('/login', [LoginController::class, 'index'])
        ->name('login');

    // Processar login
    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.auth');

});


/*
|--------------------------------------------------------------------------
| ÁREA RESTRITA
|--------------------------------------------------------------------------
|
| Todas as rotas deste grupo exigem autenticação.
|
*/

Route::middleware('auth')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', [AdminController::class, 'dashboard'])
        ->name('admin.dashboard');


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');


    /*
    |--------------------------------------------------------------------------
    | ROTAS ADMINISTRATIVAS
    |--------------------------------------------------------------------------
    */

    Route::prefix('admin')->group(function () {


    });

});

