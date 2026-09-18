<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function categoria()
    {
        $listaCategoria = Categoria::orderBy('nome_categoria')->get();

        return view('admin.categoria.index', compact('listaCategoria'));
    }
}
