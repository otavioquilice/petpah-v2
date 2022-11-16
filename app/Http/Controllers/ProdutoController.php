<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Produto;
use App\Models\CestaCliente;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();

        return view('pages.site.produtos', ['produtos' => $produtos ]);
    }

    public function buscarProduto(Request $r)
    {
        $texto_digitado = $r->buscar_produto;

        $produtos = Produto::where('nome', 'LIKE', '%'.$texto_digitado.'%')->get();

        return view('pages.site.produtos', compact('produtos'));

    } 
}
