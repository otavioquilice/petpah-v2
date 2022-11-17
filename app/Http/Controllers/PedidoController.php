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
        $pedido->ong_id         = $r->ong_id;

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
                    
                    if($doacao > 0){

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

        return redirect()->route('pagamento.show', [$pedido->uuid]);

    }

    public function show(Request $r){

        $pedido = Pedido::findByUuid($r->uuid);

        return view('pages.site.pagamento', ['pedido' => $pedido]);

    }

    public function pagamento(Request $r){

        $r->validate(
            [
                "num_cartao"        => 'required',
                "titular_cartao"    => 'required',
                "validade"          => 'required',
                "cvv"               => 'required',
                'titular_cpf'       => 'required',
            ],
            [
                'num_cartao.required'          => "O campo Número Cartão é obrigatório",
                'titular_cartao.required'      => "O campo Titular do cartão é obrigatório",
                'validade.required'            => "O campo Validade é obrigatório",
                'cvv.required'                 => "O campo Cvv Representante é obrigatório",
                'titular_cpf.required'         => "O campo CPF Titular é obrigatório",
            ]
        );

        $pedido = Pedido::findByUuid($r->uuid);

        $cartao_valido_numero           = '5470.1126.8705.2236';
        $cartao_valido_validade         = '03/24';
        $cartao_valido_cvv              = '695';
        $cartao_valido_cpf              = '110.024.760-20';
        $cartao_valido_nome_titular     = 'Carlos Silva';


        if($cartao_valido_numero == $r->num_cartao && $cartao_valido_validade == $r->validade && $cartao_valido_cvv == $r->cvv){
            $pedido->status = 'pago';
            $pedido->save();

            // return redirect()>back()->withSuccess('Deu certo'); 
            return redirect()->route('pagamento.finalizado', [$pedido->uuid]);
            
        }else{

            return redirect()->back()->withErrors('Cartão não aprovado'); 
        }


    }

    public function pagamento_finalizado(Request $r){

        $pedido = Pedido::findByUuid($r->uuid);

        return view('pages.site.pagamento_finalizado', ['pedido' => $pedido ]);

    }

    public function meus_pedidos(Request $r){

        $pedidos = Pedido::where('cliente_id', $r->id)->get();

        return view('pages.site.cliente.pedidos', ['pedidos' => $pedidos]);
    }

    public function minhas_doacoes(Request $r){

        $itens_doados = ItemPedido::where('tipo_pedido', 'consumo_doacao')->whereHas('pedido', function ($query) use ($r){
            $query->where('status', 'pago')->where('cliente_id', $r->id);
        })->get();

        return view('pages.site.cliente.doacoes', ['itens_doados' => $itens_doados]);

    }

    public function todas_doacoes(Request $r){

        $itens_doados = ItemPedido::where('tipo_pedido', 'consumo_doacao')->whereHas('pedido', function ($query) use ($r){
            $query->where('status', 'pago');
        })->get();

        return view('pages.site.doacoes', ['itens_doados' => $itens_doados]);

    }
}
