<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function tela_produtos()
    {
        return view('pages.site.produtos', ['produtos' => '' ]);
    }

    public function tela_carrinho()
    {
        return view('pages.site.carrinho', ['produtos' => '' ]);
    }
}
