<?php

namespace App\Http\Controllers;
use App\Models\Produto;


use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function buscaProduto(Request $r)
    {
        $texto_digitado = $r->buscar_produto;

        $produtos = Produto::where('nome', 'LIKE', '%'.$texto_digitado.'%')->get();

        return $produtos;
    }
}
