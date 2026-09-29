<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;

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

    public function depoimentos()
    {
        $depoimentos = DB::connection('mysql')->table('tbl_depoimento')
            ->leftJoin('tbl_cliente', 'tbl_depoimento.id_cliente', '=', 'tbl_cliente.id_cliente')
            ->select([
                'tbl_depoimento.id_depoimento',
                'tbl_depoimento.id_cliente',
                'tbl_cliente.nome_cliente',
                'tbl_depoimento.titulo_depoimento',
                'tbl_depoimento.descricao_depoimento',
                'tbl_depoimento.nota_depoimento',
                'tbl_depoimento.status_depoimento',
                'tbl_depoimento.data_criacao',
            ])
            ->orderByDesc('tbl_depoimento.data_criacao')
            ->get()
            ->map(fn ($depoimento) => [
                'id' => $depoimento->id_depoimento,
                'cliente' => $depoimento->nome_cliente ?: 'Cliente #' . $depoimento->id_cliente,
                'titulo' => $depoimento->titulo_depoimento,
                'descricao' => $depoimento->descricao_depoimento,
                'nota' => (float) $depoimento->nota_depoimento,
                'status' => $depoimento->status_depoimento ?: 'PENDENTE',
                'data' => $depoimento->data_criacao,
            ])
            ->values();

        return view('admin.depoimento.depoimento', compact('depoimentos'));
    }

    public function clientes()
    {
        $clientes = DB::connection('mysql')->table('tbl_cliente')
            ->select([
                'id_cliente',
                'nome_cliente',
                'email_cliente',
                'genero_cliente',
                'condicao_saude',
                'status_cliente',
                'data_criacao',
                'data_atualizacao',
            ])
            ->orderByDesc('data_criacao')
            ->get();

        return view('admin.cliente.cliente', compact('clientes'));
    }
}
