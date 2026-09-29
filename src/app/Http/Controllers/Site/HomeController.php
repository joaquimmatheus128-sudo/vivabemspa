<?php
namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Servico;
use App\Models\Galeria;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(): View
    {
        $listaGaleria = Galeria::where('status_galeria', 'ATIVO')->get();


        // Vai buscar os serviços ativos para mandar para o carrossel da Home
        $listaServico = Servico::where('status_servico', 'ATIVO')->get();
        $depoimentos = DB::connection('mysql')->table('tbl_depoimento')
            ->leftJoin('tbl_cliente', 'tbl_depoimento.id_cliente', '=', 'tbl_cliente.id_cliente')
            ->where('tbl_depoimento.status_depoimento', 'APROVADO')
            ->select([
                'tbl_depoimento.titulo_depoimento',
                'tbl_depoimento.descricao_depoimento',
                'tbl_depoimento.nota_depoimento',
                'tbl_cliente.nome_cliente',
            ])
            ->orderByDesc('tbl_depoimento.data_criacao')
            ->get();

        return view('site.home.home', compact('listaServico', 'depoimentos', 'listaGaleria'));
    }
}
