<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Produto;
use App\Models\Pedido;
use App\Models\ItemPedido;
use App\Models\CestaCliente;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function store(Request $r)
    {
        $pedido = new Pedido();

        $pedido->cliente_id     = Auth::user()->id;
        $pedido->status         = 'nao_pago';
        $pedido->tipo_entrega   = $r->opca_entrega;

        if($r->opca_entrega == 'solicitar_entregador'){
            $pedido->cep = $r->cep;
        }

        $pedido->save();

        if(!empty(Auth::user())){

            $id_user  = Auth::user()->id;
            $produtos_cesta = CestaCliente::where('cliente_id', $id_user)->get();
        }

        if(!empty($produtos_cesta) && $produtos_cesta->count()){
            
            if(!empty($r->produto_doacao)){
                foreach($r->produto_doacao as $key => $doacao){
                    
                    $item_doacao_pedido = new ItemPedido();

                    $item_doacao_pedido->cliente_id        = $id_user;
                    $item_doacao_pedido->pedido_id         = $pedido->id;
                    $item_doacao_pedido->produto_id        = $key;
                    $item_doacao_pedido->quantidade        = $doacao;
                    $item_doacao_pedido->preco_unitario    = Produto::find($key)->preco->where('ativo', 1)->first()->preco;
                    $item_doacao_pedido->valor_total       = (Produto::find($key)->preco->where('ativo', 1)->first()->preco * $doacao);
                    $item_doacao_pedido->tipo_pedido       = 'consumo_doacao';
                    $item_doacao_pedido->save();
                        
                }
            }

            foreach($produtos_cesta as $item_cesta){

                $item_pedido = new ItemPedido();

                $item_pedido->cliente_id        = $id_user;
                $item_pedido->pedido_id         = $pedido->id;
                $item_pedido->produto_id        = $item_cesta->produto_id;
                $item_pedido->preco_unitario    = $item_cesta->produto->preco->where('ativo', 1)->first()->preco;
                $item_pedido->tipo_pedido       = 'consumo_proprio';

                if(!empty($r->produto_doacao)){
                    foreach($r->produto_doacao as $key => $doacao){
                        if($item_pedido->produto_id == $key){

                            $item_pedido->quantidade   = ($item_cesta->quantidade - $doacao);
                            $item_pedido->valor_total  = ($item_cesta->produto->preco->where('ativo', 1)->first()->preco * $item_pedido->quantidade);

                        }
                    }    
                }
                $item_pedido->save();

            }
        }

        if(!empty($pedido->itens_pedido) && $pedido->itens_pedido->count()){
            foreach($pedido->itens_pedido as $item){

                if($pedido->valor == null){

                    $pedido->valor = $item->valor_total;

                }else{

                    $pedido->valor += $item->valor_total;
                }
                $pedido->save();
                CestaCliente::where('cliente_id', $id_user)->where('produto_id', $item->produto_id)->delete();
            }
        }

        return view('pages.site.pagamento', ['pedido' => $pedido]);

    } 
}
