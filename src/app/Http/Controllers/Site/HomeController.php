<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Servico;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        // Vai buscar os serviços ativos para mandar para o carrossel da Home
        $listaServico = Servico::where('status_servico', 'ATIVO')->get();

        return view('site.home.home', compact('listaServico'));
    }
}