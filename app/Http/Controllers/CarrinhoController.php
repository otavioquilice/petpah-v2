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
        $produto = Produto::find($produto_id);

        //Verificando disponibilidade do produto.
        if($produto->quantidade <= 0){
            
            return false;
        }

        //Verificando se o produto já foi adicionado no carrinho
        $produto_carrinho = CestaCliente::where('produto_id',$produto_id)->where('cliente_id', $id_user)->first();
        if(!empty($produto_carrinho) && $produto_carrinho->count()){
            
            //Caso o produto já tenha sido adicionado no carrinho, então atualizar a quantidade somando mais um produto.
            $produto_carrinho->quantidade += 1;
            $produto_carrinho->save(); 

            $produto->quantidade -= 1;
            $produto->save();
        
        }else{
            //Caso produto não tenha sido adicionado no carrinho, então adicionar-lo.
            $add_produto = new CestaCliente();
            $add_produto->cliente_id = $id_user;
            $add_produto->produto_id = $produto_id;
            $add_produto->save();

            $produto->quantidade -= 1;
            $produto->save();
        }

        $itens_cesta = Auth::user()->cesta_produtos;
        $qtd_itens_cesta = 0;
        if(!empty($itens_cesta)){
            foreach($itens_cesta as $item){
                $qtd_itens_cesta += $item->quantidade;
            }
        }
        return $qtd_itens_cesta;
    }

    public function ajaxRemoveCarrinho(Request $r){

        $produto_id = $r->produto_id;
        $id_user    = Auth::user()->id;
        $produto = Produto::find($produto_id);

        //Verificando o produto que será removido do carrinho
        $produto_carrinho = CestaCliente::where('produto_id',$produto_id)->where('cliente_id', $id_user)->first();
        if(!empty($produto_carrinho) && $produto_carrinho->count()){

            //Caso o produto já tenha sido adicionado no carrinho, então atualizar a quantidade somando mais um produto.
            $produto_carrinho->quantidade -= 1;
            $produto_carrinho->save();

            //Caso o produto seja zerado do carrinho então deletar
            if($produto_carrinho->quantidade == 0){
                $produto_carrinho->delete();
            } 

            $produto->quantidade += 1;
            $produto->save();

            $itens_cesta = Auth::user()->cesta_produtos;
            $qtd_itens_cesta = 0;
            if(!empty($itens_cesta)){
                foreach($itens_cesta as $item){
                    $qtd_itens_cesta += $item->quantidade;
                }
            }
            return $qtd_itens_cesta;
            
        }else{

            return false;
        }

    }
}
