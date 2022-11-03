<!DOCTYPE html>
<html lang="en">

    @include('pages.layout.head')

<body>
    @include('pages.layout.header')

    <main>

        @include('pages.layout.nav-bar')
        <br><br>

        <div class="pagamento">
            <div class="finalizar-pedido">
                <h2>Finalizar pedido</h2>
                <div class="circle">
                    <img src="{{ asset('media/imagens/img/cart.png')}}" alt="carrinho">
                </div>
                <p id="info" >Insira as informações abaixo e você recebera um e-mail 
                com os detalhes da compra e orientações por e-mail.</p>
                
                <h2>Informações</h2>
                <input type="text" id="nome" placeholder="Nome"></input>
                <input type="text" id="email"placeholder="E-mail"></input>
                
                <h2>Endereço de retirada</h2>
                <p>Rua. Podpah 123, São Paulo - SP, CEP 789-0000</p> <!--banco de dados-->
                
                <h2>Pagamento</h2>
        
                <form class="dadospagamento" action="" method=""> 
                    <input type="text" id="numCartao" placeholder="Número do cartão">
                    <input type="text" id="titularCartao" placeholder="Nome do Titular do Cartão">
                    <input type="text" id="validade" placeholder="Validade">
                    <input type="text" id="CVV" placeholder="CVV">
                    <input type="text" id="titularCPF" placeholder="CPF do titular">
                    <input type="text" id="numParcelas" placeholder="Número de parcelas">
                    <a href="#popup"><button id="finalizar-pagamento">Finalizar o pagamento</button></a>
                </form>
            </div>
            
            <div class="btwn"></div>
            
            <div class="resumo-pedido">
                <h2> Resumo do pedido </h2>
    
                    <div class="resumo1">
                <h3 class="pg_titulo_doacao"> Doação </h3>
                <p class="pg_nome_doacao"> ONG LOVE ANIMAL</p>
            </div>
    
            <div class="resumo_pedido_doacao"></div>
    
                <div class="resumo1_preco">
                    <p class="itens" >Ração para cachorro xxxx</p>
                    <p class="preço" >R$ 00,00</p> <!--substituir-->
                </div>
    
                <div class="resumo2">
                    <h3 class="pg_titulo_consumo"> Consumo </h3>
                    <p class="pg_titulo_entrega">Rua XXXX, Nº123, apt. 88, CEP XXXX-XXX</p>
                </div>
    
            <div class="resumo_pedido_consumo"></div>
    
            <div class="resumo2_preco">
                <p class="itens">Fralda para cachorro xxxx</p>
                <p class="preço">R$ 00,00</p> <!--substituir-->
            </div>
    
            <div class="total_pedido_preco"></div>
    
            <div class="total_preco">
                <h3 class="total"> Total </h3>
                <p class="preço-total">R$ 00,00</p> <!--substituir com o total-->
            </div>
        </div>
        
        <!--*********************PopUp****************************-->
        <div id="container">
            <div id="pag">
                <img src="{{ asset('media/imagens/img/compra2.png') }}" width="800px 400px">
                <a href="#pag"><p>X</p></a>
                <a href="home.html"><button class="menu-principal">Voltar para Página Principal </button></a> 
            </div>  
        </div>
    </main>
</body>
@include('pages.layout.footer')
</html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
