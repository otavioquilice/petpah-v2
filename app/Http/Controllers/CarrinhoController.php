<?php

namespace App\Http\Controllers;
use App\Models\CestaCliente;
use App\Models\Produto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function ajaxAddCarrinho(Request $r)
    {
        $produto_id = $r->produto_id;
        $id_user    = Auth::user()->id;

        $add_produto = new CestaCliente();
        $add_produto->cliente_id = $id_user;
        $add_produto->produto_id = $produto_id;
        $add_produto->save();
        
        $produtos = Produto::whereHas('cesta_cliente',function($query) use($id_user) {
            $query->where('cliente_id', '=', $id_user);
        })->count();

        return $produtos;
    }
}
