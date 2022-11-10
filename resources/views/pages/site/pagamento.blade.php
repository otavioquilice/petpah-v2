<!DOCTYPE html>
<html lang="en">

    @include('pages.layout.head')

<body>
    @include('pages.layout.header')

    <main>

        @include('pages.layout.nav-bar')
        <br><br>

        <div class="pagamento row container centered text-center">
            <div class="col-md-12">
                <div class="finalizar-pedido">
                    <h2>Finalizar pedido</h2>
                    <div class="circle">
                        <img src="{{ asset('media/imagens/img/cart.png')}}" alt="carrinho">
                    </div>
                    <p id="info" >Insira as informações abaixo e você recebera um e-mail 
                    com os detalhes da compra e orientações por e-mail.</p>
                    
                    <h2>Informações</h2>
                    <form class="dadospagamento form col-md-12" action="/finalizar/pagamento" method="POST">
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
                            <p>Rua. Podpah 123, São Paulo - SP, CEP 789-0000</p> 
                        @endif()
                        
                        <h2>Pagamento</h2>
            

                        <div class="form col-md-12">
                            <input type="text" id="numCartao"  placeholder="Número do cartão">
                        </div> 

                        <div class="form col-md-12">
                            <input type="text" id="titularCartao"  placeholder="Nome do Titular do Cartão">
                        </div>
                        
                        <div class="form col-md-12">
                            <input type="text" id="validade"  placeholder="Validade">
                        </div>

                        <div class="form col-md-12">
                            <input type="text" id="CVV"  placeholder="CVV">
                        </div>
                        
                        <div class="form col-md-12">
                            <input type="text" id="titularCPF"  placeholder="CPF do titular">
                        </div>
                        <div class="form col-md-12">
                            <input type="text" id="numParcelas"  placeholder="Número de parcelas">
                        </div>

                        <div class="form">
                            <a type="submite" href="#popup"><button id="finalizar-pagamento">Finalizar o pagamento</button></a>
                        </div>
                        <div class="btwn"></div>
                    </form>
                </div>

                <div class="resumo-pedido">
                    <h2> Resumo do pedido </h2>

                    <div class="doacao">
                        <h3 class="pg_titulo_doacao"> Doação </h3>
                    </div>

                    <div class="consumo">
                        <h3 class="pg_titulo_doacao"> Consumo </h3>
                    </div>
                </div>

                <div class="total_preco">
                    <h3 class="total"> Total </h3>
                    <p class="preço-total">R$ 00,00</p> <!--substituir com o total-->
                </div>
            </div>

        </div>
        
        <!--*********************PopUp****************************-->
        <!-- <div id="container">
            <div id="pag">
                <img src="{{ asset('media/imagens/img/compra2.png') }}" width="800px 400px">
                <a href="#pag"><p>X</p></a>
                <a href="home.html"><button class="menu-principal">Voltar para Página Principal </button></a> 
            </div>  
        </div> -->
    </main>
</body>
@include('pages.layout.footer')
</html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
