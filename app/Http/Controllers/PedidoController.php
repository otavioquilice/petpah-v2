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
        $base_url = url('/');

        $pedido = new Pedido();

        $pedido->cliente_id     = Auth::user()->id;
        $pedido->status         = 'nao_pago';
        $pedido->tipo_entrega   = $r->opca_entrega;
        $pedido->ong_id         = $r->ong_id ? $r->ong_id : null;

        if($r->opca_entrega == 'solicitar_entregador'){

            $pedido->cep            = $r->cep ? $r->cep : '';
            $pedido->rua            = $r->rua ? $r->rua : '';
            $pedido->numero         = $r->numero ? $r->numero : '';
            $pedido->complemento    = $r->complemento ? $r->complemento : '';
            $pedido->bairro         = $r->bairro ? $r->bairro : '';
            $pedido->cidade         = $r->cidade ? $r->cidade : '';
            $pedido->estado         = $r->estado ? $r->estado : '';
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
                if($item_pedido->quantidade != 0)
                {
                    $item_pedido->save();
                }

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

        // Adicione as credenciais
        \MercadoPago\SDK::setAccessToken('TEST-5749839346263524-112414-da95827a69d169f98638cbef56354826-259157785');

        // Cria um objeto de preferência
        $preference = new \MercadoPago\Preference();

        // Cria um item na preferência
        $item = new \MercadoPago\Item();
        $item->title = $pedido->ong_id ? 'PetPah Pedido/Doação N°'.$pedido->id : 'PetPah Pedido N°'.$pedido->id;
        $item->quantity = 1;
        $item->unit_price = $pedido->valor;

        $preference->items = array($item);

        $preference->back_urls = array(
            "success" => $base_url.'/pagamento/finalizado/'.$pedido->uuid,
            "failure" => $base_url.'/pagamento/show/'.$pedido->uuid,
            "pending" => $base_url
        );
        $preference->auto_return = "approved"; 
        $preference->save();

        $pedido->sandbox_init_point = $preference->sandbox_init_point;
        $pedido->save();


        return redirect()->route('pagamento.show', [$pedido->uuid]);

    }

    public function show(Request $r){

        $pedido = Pedido::findByUuid($r->uuid);

        return view('pages.site.pagamento', ['pedido' => $pedido]);

    }

    public function pagamento(Request $r){

        $pedido = Pedido::findByUuid($r->uuid);


        // if($cartao_valido_numero == $r->num_cartao && $cartao_valido_validade == $r->validade && $cartao_valido_cvv == $r->cvv){
        //     $pedido->status = 'pago';
        //     $pedido->save();

        //     // return redirect()>back()->withSuccess('Deu certo'); 
        //     return redirect()->route('pagamento.finalizado', [$pedido->uuid]);
            
        // }else{

        //     return redirect()->back()->withErrors('Cartão não aprovado'); 
        // }

        return redirect($pedido->sandbox_init_point);


    }

    public function pagamento_finalizado(Request $r){

        $pedido = Pedido::findByUuid($r->uuid);

        if(!empty($r->payment_id)){

            $pedido->status     = 'pago';
            $pedido->payment_id = $r->payment_id;
            $pedido->save();

        }

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
