<?php

namespace App\Http\Controllers;
use App\Models\Produto;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function view_produtos()
    {
        $produtos = Produto::all();

        return view('pages.site.produtos', ['produtos' => $produtos ]);
    }

    public function view_carrinho()
    {
        return view('pages.site.carrinho', ['produtos' => '' ]);
    }

    public function view_home()
    {
        return view('pages.site.home', ['produtos' => '' ]);
    }
}
