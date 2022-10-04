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

        $produtoCarrinho = CestaCliente::where('produto_id',$produto_id)->where('cliente_id', $id_user)->get();
        
        if(!empty($produtoCarrinho) && $produtoCarrinho->count()){
    
            $produtoCarrinho->quantidade = $produtoCarrinho->quantidade + 1; 
        
        }else{

            $add_produto = new CestaCliente();
            $add_produto->cliente_id = $id_user;
            $add_produto->produto_id = $produto_id;
            $add_produto->save();
        }

        return true;
    }
}
