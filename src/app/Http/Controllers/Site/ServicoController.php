<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use App\Models\Servico;

class ServicoController extends Controller
{
    public function servico(): View
    {
        $listaServico = Servico::where('status_servico', 'ATIVO')->inRandomOrder()->get();

        return view('site.servicos.catalogoservico', compact('listaServico'));
    }

    // Método novo para a rota /servico/{slug}
    public function show($id): View
    {
        $servicoAtual = Servico::where('id_servico', $id)
            ->where('status_servico', 'ATIVO')
            ->firstOrFail();

        return view('site.servicos.show', compact('servicoAtual'));
    }
}