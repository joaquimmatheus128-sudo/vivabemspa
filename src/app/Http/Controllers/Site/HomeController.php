<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
class HomeController extends Controller
{
    public function index(): View
    {
        $servicos = require resource_path('views/site/home/servicos-dados.blade.php');

        return view('site.home.home', compact('servicos'));
    }
}
