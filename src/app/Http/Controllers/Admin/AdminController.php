<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalEspecialistas = DB::connection('mysql')->table('tbl_especialista')->count();

        return view('admin.dashboard', compact('totalEspecialistas'));
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

    public function especialistas()
    {
        $especialistas = DB::connection('mysql')->table('tbl_especialista')
            ->select([
                'id_especialista',
                'nome_especialista',
                'genero_especialista',
                'status_especialista',
                'data_criacao',
                'data_atualizacao',
            ])
            ->orderByDesc('data_criacao')
            ->get();

        return view('admin.especialista.especialista', compact('especialistas'));
    }

    public function atualizarEspecialista(Request $request, int $id)
    {
        $dados = $request->validate([
            'nome_especialista' => ['required', 'string', 'max:100'],
            'genero_especialista' => ['nullable', 'in:MASCULINO,FEMININO,OUTRO'],
            'status_especialista' => ['required', 'in:ATIVO,INATIVO'],
        ]);

        DB::connection('mysql')->table('tbl_especialista')
            ->where('id_especialista', $id)
            ->update($dados);

        return redirect()->route('admin.especialista.index')->with('success', 'Especialista atualizado com sucesso.');
    }

    public function removerEspecialista(int $id)
    {
        DB::connection('mysql')->table('tbl_especialista')
            ->where('id_especialista', $id)
            ->delete();

        return redirect()->route('admin.especialista.index')->with('success', 'Especialista removido com sucesso.');
    }

    public function eventos()
    {
        $categorias = DB::connection('mysql')->table('tbl_categoria')
            ->where('status_categoria', 'ATIVO')
            ->orderBy('nome_categoria')
            ->get(['id_categoria', 'nome_categoria']);

        $eventos = DB::connection('mysql')->table('tbl_evento')
            ->leftJoin('tbl_categoria', 'tbl_evento.id_categoria', '=', 'tbl_categoria.id_categoria')
            ->select([
                'tbl_evento.id_evento',
                'tbl_evento.nome_evento',
                'tbl_evento.descricao_evento',
                'tbl_evento.data_evento',
                'tbl_evento.horario_evento',
                'tbl_evento.status_evento',
                'tbl_categoria.nome_categoria',
            ])
            ->orderBy('tbl_evento.data_evento')
            ->orderBy('tbl_evento.horario_evento')
            ->get()
            ->map(fn ($evento) => [
                'id' => $evento->id_evento,
                'title' => $evento->nome_evento,
                'start' => $evento->data_evento . 'T' . $evento->horario_evento,
                'description' => $evento->descricao_evento,
                'category' => $evento->nome_categoria,
                'status' => $evento->status_evento,
            ])
            ->values();

        $hoje = now()->toDateString();
        $eventoParaAbrir = $eventos->first(fn ($evento) => substr($evento['start'], 0, 10) >= $hoje)
            ?? $eventos->last();
        $dataInicial = $eventoParaAbrir
            ? substr($eventoParaAbrir['start'], 0, 10)
            : $hoje;

        return view('admin.evento.evento', compact('categorias', 'eventos', 'dataInicial'));
    }

    public function criarEvento(Request $request)
    {
        $dados = $request->validate([
            'id_categoria' => ['required', 'integer', 'exists:mysql.tbl_categoria,id_categoria'],
            'nome_evento' => ['required', 'string', 'max:100'],
            'descricao_evento' => ['required', 'string'],
            'data_evento' => ['required', 'date'],
            'horario_evento' => ['required', 'date_format:H:i'],
        ]);

        $dados['status_evento'] = 'ATIVO';
        DB::connection('mysql')->table('tbl_evento')->insert($dados);

        return redirect()->route('admin.evento.index')->with('success', 'Evento adicionado ao calendário.');
    }
}
