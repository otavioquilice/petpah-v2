<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function view_produtos()
    {
        return view('pages.site.produtos', ['produtos' => '' ]);
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
