<!DOCTYPE html>
<html lang="en">

    @include('pages.layout.head')

<body>
    @include('pages.layout.header')

    <main>

        @include('pages.layout.nav-bar')
        <br><br>
        <div class="container">
            <div class="row col-md-12">
                @foreach($produtos as $produto)
                    <div class="col-md-4 border">
                        <div>
                            <img src="{{ asset('media/imagens/img2/prod'.$produto->id .'.png') }}" alt="item1">
                            <h2>{{$produto->nome}}</h2>
                            <h3 class="produtos-preco">R$ {{ $produto->preco[0]->preco}}</h3>
                            <a type="button" class="plus-circle- add-produto-carrinho" data-produto-id="{{ $produto->id }}">                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg></a>
                            <a type="button" class="x-circle-fill remove-produto-carrinho" data-produto-id="{{ $produto->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-minus" viewBox="0 0 16 16">
                                <path d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                                <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                            </svg></a>
                        </div>
                        <h5 id="count_produto_id_{{$produto->id}}"> {{ (!empty(Auth::user()) && !empty(\app\Models\CestaCliente::where('produto_id', $produto->id)->where('cliente_id', Auth::user()->id)->first()->quantidade) ? \app\Models\CestaCliente::where('produto_id', $produto->id)->where('cliente_id', Auth::user()->id)->first()->quantidade .' Iten(s) adicionado(s)' : '0 Iten(s) adicionado(s)') }} </h5>

                        <br><br>
                    </div>
                @endforeach
            </div>  
        </div>  
    </main>
</body>
@include('pages.layout.footer')
</html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">

    $(document).ready(function()
	{
        $(document).on("click", ".add-produto-carrinho", function(){

            var logado  = {{ !empty(Auth::user()) ? 1 : 0 }};

			var produto_id = $(this).attr('data-produto-id');

            if(logado == 0){

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Antes de adicionar o produto no carrinho é necessário fazer o login!',
                    footer: '<a href="/login">Clique aqui para fazer o login.</a>'
                })

            }else{
                $.ajax({
                    url: "/ajax/add-produto-carrinho",
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        produto_id: produto_id
                    },
                    dataType: "json",
                    success: function (result)
                    {
                        $('#qtd_produto_carrinho').text(result.qtd_itens_cesta+' Produto(s)');
                        $('#count_produto_id_'+produto_id).text(result.count_produto.quantidade+' Iten(s) adicionado(s)')
                        
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal.fire(
                            'Erro!',
                            'Não foi adicionar o produto no carrinho',
                            'error'
                        );
                    }
                });
            }
		});

        $(document).on("click", ".remove-produto-carrinho", function(){

            var logado  = {{ !empty(Auth::user()) ? 1 : 0 }};

            var produto_id = $(this).attr('data-produto-id');

            if(logado == 0){

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Antes de adicionar ou remover o produto no carrinho é necessário fazer o login!',
                    footer: '<a href="/login">Clique aqui para fazer o login.</a>'
                })

            }else{
                $.ajax({
                    url: "/ajax/remove-produto-carrinho",
                    type: "post",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        produto_id: produto_id
                    },
                    dataType: "json",
                    success: function (result)
                    {
                        $('#qtd_produto_carrinho').text(result.qtd_itens_cesta+' Produto(s)');
                        $('#count_produto_id_'+produto_id).text(result.count_produto.quantidade+' Iten(s) adicionado(s)')
                        
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        swal.fire(
                            'Erro!',
                            'Não foi possivel remover o produto no carrinho',
                            'error'
                        );
                    }
                });
            }
        });

    });


</script>