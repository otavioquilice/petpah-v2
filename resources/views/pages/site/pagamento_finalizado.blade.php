<!DOCTYPE html>
<html lange="pt-br">

    @include('pages.layout.head')


    <body>
        @include('pages.layout.header')

        <main>
            @include('pages.layout.nav-bar')

            <div class="container">
                <h1>Pagamento Efetuado com sucesso</h1>
                <ol>Número do seu Pedido: {{$pedido->id}}</ol>
                <ol>Status: {{ $pedido->status == 'pago' ? 'Pago' : 'Nâo Pago'}}</ol>
            </div>

        </main>
    </body>
    @include('pages.layout.footer')
</html>
