<!DOCTYPE html>
<html lang="en">

    @include('pages.layout.head')

<body>
    @include('pages.layout.header')

    <main>

        @include('pages.layout.nav-bar')

        <div class="pagamento container centered">
            <div class="finalizar-pedido">
                @if($pedido->status != 'pago')
                <h2>Finalizar pedido</h2>
                @else()
                <h2>Pedido Finalizado</h2>
                @endif()
                <div class="circle">
                    <img src="{{ asset('media/imagens/img/cart.png')}}" alt="carrinho" class="icone_carrinho">
                    <p class="info_pagamento" >Insira as informações abaixo e você recebera um e-mail 
                    com os detalhes da compra e orientações por e-mail.</p>
                </div>
                
                
                <h2>Informações</h2>
                <form class="dadospagamento form col-md-12" action="/finalizar/pagamento/{{$pedido->uuid}}" method="POST">
                    @csrf
                    <div class="form">
                        <input type="text" value="{{Auth::user()->name}}" disabled id="nome" placeholder="Nome">
                    </div> 

                    <div class="form">
                        <input type="text" value="{{Auth::user()->email}}" disabled id="email"placeholder="E-mail">
                    </div> 

                    @if($pedido->tipo_entrega == 'solicitar_entregador')
                        <h2>Endereço de Entrega</h2>
                        <p>CEP: {{$pedido->cep}}</p>
                    @else()
                        <h2>Endereço de Retirada</h2>
                        <p>R. Frei João, 59 - Ipiranga, São Paulo - SP, 04280-130</p> 
                    @endif()

                    <h2>Pagamento</h2>
                    @if($errors->any())
                        <div class="row col-md-6 offset-md-3 mt-4">
                            <div class="small-12 medium-12 columns">
                                <div class="error-message">
                                    <p class="notificar_correcao">Por favor, verifique os erros abaixo:</p>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li><span class="label label-danger">{{ $error }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- @if (session('success'))
                    <li><span class="label label-danger">{{ session('success') }}</span></li>
                        <script type="text/javascript">
                            $(document).ready(function()
                            {
                                $.notify("{{session('success')}}",
                                {
                                    offset: {
                                        x: 30,
                                        y: 30
                                    },
                                    type: 'success',
                                    animate: {
                                        enter: 'animated bounce',
                                        exit: 'animated bounce'
                                    },
                                    placement: {
                                        from: 'bottom',
                                        align: 'right'
                                    },
                                    delay: 1000
                                });
                            });
                        </script>
                    @endif --}}
                    @if($pedido->status != 'pago')       
                        <div class="form col-md-12">
                            <input type="text" name="num_cartao" id="num_cartao" class="numero_cartao-mask"  placeholder="Número do cartão" {{ $pedido->status == 'pago' ? 'disabled' : '' }}>
                        </div> 

                        <div class="form col-md-12">
                            <input type="text" name="titular_cartao" id="titular_cartao"  placeholder="Nome do Titular do Cartão" {{ $pedido->status == 'pago' ? 'disabled' : '' }}>
                        </div>
                        
                        <div class="form col-md-12">
                            <input type="text" name="validade" id="validade"  class="validade-mask" placeholder="Validade" {{ $pedido->status == 'pago' ? 'disabled' : '' }}>
                        </div>

                        <div class="form col-md-12">
                            <input type="text" name="cvv" id="cvv"  class="cvv-mask" placeholder="CVV" {{ $pedido->status == 'pago' ? 'disabled' : '' }}>
                        </div>
                        
                        <div class="form col-md-12">
                            <input type="text" name="titular_cpf" id="titular_cpf" class="cpf-mask"  placeholder="CPF do titular" {{ $pedido->status == 'pago' ? 'disabled' : '' }}>
                        </div>
                        {{-- <div class="form col-md-12">
                            <input type="text" name="num_parcelas" id="num_parcelas"  placeholder="Número de parcelas">
                        </div> --}}
                    @else()
                    <div class="form col-md-12">
                        <p>STATUS DO PAGAMENTO: EFETUADO</p>
                        <p>STATUS DO PEDIDO: FINALIZADO</p>
                    </div> 
                    @endif()
                </div>
                
                <div class="btwn"></div>

                <div class="resumo-pedido">
                    <h2 class="resumo_pedido_titulo"> Resumo do pedido </h2>

                    <div class="resumo1">
                        <h3 class="pg_titulo_doacao"> Doação </h3>
                        @foreach($pedido->itens_pedido as $item)
                            @if($item->tipo_pedido == 'consumo_doacao')
                                <ol>{{$item->produto->nome}} | Quantidade: {{$item->quantidade}} | Valor Total: R$: {{ $item->valor_total}} </ol> 
                            @endif()
                        @endforeach()
                    </div>

                    <div class="resumo1">
                        <h3 class="pg_titulo_doacao"> Consumo Próprio </h3>
                        @foreach($pedido->itens_pedido as $item)
                            @if($item->tipo_pedido == 'consumo_proprio')
                            <ol>{{$item->produto->nome}} | Quantidade: {{$item->quantidade}} | Valor Total: R$: {{ $item->valor_total}} </ol> 
                            @endif()
                        @endforeach()
                    </div>

                    <div class="btwn_total"></div>

                    <div class="total_preco">
                        <h3 class="total"> Total </h3>
                        <p class="preço-total">R$ {{$pedido->valor}}</p> <!--substituir com o total-->
                    </div>

                    @if($pedido->status != 'pago') 
                        <a type="submite"><button id="finalizar-pagamento">Finalizar o pagamento</button></a>
                    @else()
                    <button><a type="button" href="/pedidos/meus-pedidos/{{Auth::user()->id}}" class="link_voltar_pedidos">Voltar para meus pedidos</a></button>
                    @endif()

                    
                </div>
                
            </form>
                
        </div>
        
    </main>
</body>
@include('pages.layout.footer')
</html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
