<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Servico;
use App\Models\Galeria;
use App\Models\Eventos;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $listaGaleria = Galeria::where('status_galeria', 'ATIVO')->get();

        // Vai buscar os serviços ativos para mandar para o carrossel da Home
        $listaServico = Servico::where('status_servico', 'ATIVO')->get();

        $listaEventos = Eventos:: get();
        return view('site.home.home', compact('listaServico', 'listaGaleria', 'listaEventos'));
    }
}