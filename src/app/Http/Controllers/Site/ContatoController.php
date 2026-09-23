<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
class ContatoController extends Controller
{
    public function contato(): View
    {
        return view('site.contato.contato');
    }
}
