<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
<<<<<<< HEAD
=======
use App\Models\Equipamento;
use App\Models\Galeria;
>>>>>>> origin/main
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

    // ========== EQUIPAMENTOS ==========

    // LISTAR com paginação (10 por página)
    public function equipamento()
    {
        $listaEquipamento = Equipamento::orderBy('nome_equipamento')->paginate(10);

        return view('admin.equipamento.index', compact('listaEquipamento'));
    }

    // CADASTRAR (INSERT)
    public function equipamentoStore(Request $request)
    {
        $dados = $request->validate([
            'nome_equipamento' => 'required|max:100',
            'descricao_equipamento' => 'nullable',
            'status_equipamento' => 'required|in:ATIVO,INATIVO',
        ]);

        try {
            Equipamento::create($dados);

            return redirect()->route('admin.equipamento.index')->with('sucesso', 'Equipamento cadastrado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.equipamento.index')->with('erro', 'Erro ao cadastrar o equipamento.');
        }
    }

    // EDITAR (UPDATE)
    public function equipamentoUpdate(Request $request, $id)
    {
        $dados = $request->validate([
            'nome_equipamento' => 'required|max:100',
            'descricao_equipamento' => 'nullable',
            'status_equipamento' => 'required|in:ATIVO,INATIVO',
        ]);

        try {
            $equipamento = Equipamento::findOrFail($id);
            $equipamento->update($dados);

            return redirect()->route('admin.equipamento.index')->with('sucesso', 'Equipamento atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.equipamento.index')->with('erro', 'Erro ao atualizar o equipamento.');
        }
    }

    // EXCLUIR (DELETE)
    public function equipamentoDestroy($id)
    {
        try {
            $equipamento = Equipamento::findOrFail($id);
            $equipamento->delete();

            return redirect()->route('admin.equipamento.index')->with('sucesso', 'Equipamento excluído com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.equipamento.index')->with('erro', 'Erro ao excluir o equipamento.');
        }
    }

    // ========== GALERIA ==========

    // LISTAR com paginação (10 por página)
    public function galeria()
    {
        $listaGaleria = Galeria::orderBy('id_galeria', 'desc')->paginate(10);

        return view('admin.galeria.index', compact('listaGaleria'));
    }

    // CADASTRAR (INSERT + upload da imagem)
    public function galeriaStore(Request $request)
    {
        $dados = $request->validate([
            'nome_galeria' => 'required|max:100',
            'categoria_galeria' => 'nullable|max:80',
            'descricao_galeria' => 'nullable',
            'status_galeria' => 'required|in:ATIVO,INATIVO',
            'imagem_galeria' => 'required|image|max:4096',
        ]);

        try {
            $dados['imagem_galeria'] = $this->salvarImagemGaleria($request);

            Galeria::create($dados);

            return redirect()->route('admin.galeria.index')->with('sucesso', 'Imagem cadastrada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.galeria.index')->with('erro', 'Erro ao cadastrar a imagem.');
        }
    }

    // EDITAR (UPDATE). Se não enviar imagem nova, mantém a atual
    public function galeriaUpdate(Request $request, $id)
    {
        $dados = $request->validate([
            'nome_galeria' => 'required|max:100',
            'categoria_galeria' => 'nullable|max:80',
            'descricao_galeria' => 'nullable',
            'status_galeria' => 'required|in:ATIVO,INATIVO',
            'imagem_galeria' => 'nullable|image|max:4096',
        ]);

        try {
            $galeria = Galeria::findOrFail($id);

            if ($request->hasFile('imagem_galeria')) {
                $dados['imagem_galeria'] = $this->salvarImagemGaleria($request);
            } else {
                unset($dados['imagem_galeria']);
            }

            $galeria->update($dados);

            return redirect()->route('admin.galeria.index')->with('sucesso', 'Imagem atualizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.galeria.index')->with('erro', 'Erro ao atualizar a imagem.');
        }
    }

    // EXCLUIR (DELETE). Apaga o registro e o arquivo da imagem
    public function galeriaDestroy($id)
    {
        try {
            $galeria = Galeria::findOrFail($id);

            $arquivo = public_path('vivabem-spa/assets/' . $galeria->imagem_galeria);

            if ($galeria->imagem_galeria && file_exists($arquivo)) {
                unlink($arquivo);
            }

            $galeria->delete();

            return redirect()->route('admin.galeria.index')->with('sucesso', 'Imagem excluída com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('admin.galeria.index')->with('erro', 'Erro ao excluir a imagem.');
        }
    }

    // Move o upload para public/vivabem-spa/assets/galeria e devolve
    // o caminho no mesmo formato do banco (ex: galeria/1727000000_foto.png)
    private function salvarImagemGaleria(Request $request)
    {
        $imagem = $request->file('imagem_galeria');

        $nomeArquivo = time() . '_' . $imagem->getClientOriginalName();

        $imagem->move(public_path('vivabem-spa/assets/galeria'), $nomeArquivo);

        return 'galeria/' . $nomeArquivo;
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
