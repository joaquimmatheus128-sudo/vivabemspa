<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
class ServicoController extends Controller
{
    public function servico(): View
    {
        return view('site.servicos.catalogoservico');
    }
}
