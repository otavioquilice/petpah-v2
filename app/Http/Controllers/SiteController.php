<?php

namespace App\Http\Controllers;

use App\Models\CestaCliente;
use Illuminate\Support\Facades\Auth;
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
        if(!empty(Auth::user())){

            $id_user  = Auth::user()->id;
            $produtos = CestaCliente::where('cliente_id', $id_user)->get();
        }

        return view('pages.site.carrinho', ['produtos' => !empty($produtos) ? $produtos : [] ]);
    }

    public function view_home()
    {
        return view('pages.site.home', ['titulo' => '' ]);
    }

    public function view_ongs()
    {
        return view('pages.site.ong.index', ['ongs' => '' ]);
    }
}
