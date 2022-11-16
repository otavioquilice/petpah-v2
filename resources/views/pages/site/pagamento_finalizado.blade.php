<!DOCTYPE html>
<html lange="pt-br">

    @include('pages.layout.head')


    <body>
        @include('pages.layout.header')

        <main>
            @include('pages.layout.nav-bar')

            <div class="container_popup">
		        <h1 class="titulo_pagamento_sucesso">Pagamento efetuado com sucesso!</h1>
                <a href="/"><img class="img_pg_sucesso" src="{{ asset('media/imagens/img/compra2.png') }}" alt="Imagem confirmação pagamento"></a> 
		        <ol class="dados_pagamento_confirmado">Número do seu Pedido: {{$pedido->id}}</ol>
                <ol class="dados_pagamento_confirmado">Status: {{ $pedido->status == 'pago' ? 'Pago' : 'Nâo Pago'}}</ol>
                <a href="home.html"><button class="menu-principal">Voltar para página principal </button></a> 
            </div>

        </main>
    </body>
    @include('pages.layout.footer')
</html>

<style>
    .container_popup{
    width: 100%;
    text-align: center !important;
}

.titulo_pagamento_sucesso{
    margin: 10px;

}

.img_pg_sucesso{
    width: 60%;
    box-shadow: 3px 5px 10px;
    width: 90%;
	border: 1px solid grey;
    border: none;
    text-decoration: none;
    color:gray;
    border-radius: 10px; 
}

.dados_pagamento_confirmado{
    padding:0;
    margin: 10px 0;
    font-size: 30px;
}

.menu-principal{
border-radius: 10px;
border: none;
padding: 10px 50px;
background-color: #857AF5;
color: #ffffff;
font-weight: bold;
font-size: 15px;
transition: 1s background;
cursor: pointer;
}



</style>
