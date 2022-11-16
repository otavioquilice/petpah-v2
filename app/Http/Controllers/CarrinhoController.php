<?php

namespace App\Http\Controllers;
use App\Models\CestaCliente;
use App\Models\Produto;
use App\Models\Ong;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function index()
    {
        if(!empty(Auth::user())){

            $id_user  = Auth::user()->id;
            $produtos = CestaCliente::where('cliente_id', $id_user)->get();
            $ongs     = Ong::where('ativo', 1)->pluck('nome_fantasia','id');
        }

        return view('pages.site.carrinho', ['produtos' => $produtos , 'ongs' => $ongs]);
    }

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

        if(!empty(Auth::user()) && !empty(CestaCliente::where('produto_id', $produto->id)->where('cliente_id', Auth::user()->id)->first()->quantidade)){

            $prod = CestaCliente::where('produto_id', $produto->id)->where('cliente_id', Auth::user()->id)->first();
            $count_produto = [
                'produto_id' => $prod->produto_id,
                'quantidade' => $prod->quantidade
            ];
            return response()->json([
                'qtd_itens_cesta' => $qtd_itens_cesta,
                'count_produto' => $count_produto,
            ]);
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

            //atualizar a quantidade removendo mais um produto.
            $produto_carrinho->quantidade -= 1;
            $produto_carrinho->save();

            //Caso o produto seja zerado do carrinho então deletar
            if($produto_carrinho->quantidade == 0){
                $qtd_carrinho = 0;
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

            if(!empty(Auth::user()) && !empty(CestaCliente::where('produto_id', $produto->id)->where('cliente_id', Auth::user()->id)->first())){

                $prod = CestaCliente::where('produto_id', $produto->id)->where('cliente_id', Auth::user()->id)->first();
                $count_produto = [
                    'produto_id' => $prod->produto_id,
                    'quantidade' => $prod->quantidade
                ];
                return response()->json([
                    'qtd_itens_cesta' => $qtd_itens_cesta,
                    'count_produto' => $count_produto,
                ]);
            }else{

                $count_produto = [
                    'produto_id' => $produto_id,
                    'quantidade' => $qtd_carrinho
                ];

                return response()->json([
                    'qtd_itens_cesta' => $qtd_itens_cesta,
                    'count_produto' => $count_produto,
                ]);
                
            }  
            return $qtd_itens_cesta;
            
        }else{

            return false;
        }

    }
}
