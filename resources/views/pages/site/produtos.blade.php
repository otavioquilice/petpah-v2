<!DOCTYPE html>
<html lang="en">

    @include('pages.layout.head')

<body>
    @include('pages.layout.header')

    <main>

        @include('pages.layout.nav-bar')

        <div class="breadcrumb">
			<a href="/" class="link_breadcrumb">
			Home
			</a>
			> 
			<a href="/produto" class="link_breadcrumb">
			<b>Produtos</b>
			</a>
		</div>

        <div class="container">
            <div class="row container-fluid text-center todos-produtos">
                @if(!empty($produtos) && $produtos->count())
                    @foreach($produtos as $produto)
                        <div class="col-md-4 justfy-content border produto-row produto-geral">
                        <a href="/produtosX"><img src="{{ asset('media/imagens/img2/prod'.$produto->id .'.png') }}" alt="item1" class="produto-imagem"><a>
                            <div class="produto-quantidade">
                                
                                <a href="/produtosX" class="link_descricao_produtos"><h2 class="produto-nome" href="/produtosX">{{$produto->nome}}</h2><a>
                                <h3 class="produtos-preco">R$ {{ $produto->preco->where('ativo', 1)->first()->preco}}</h3>
                                
                                <h5 id="count_produto_id_{{$produto->id}}"> {{ (!empty(Auth::user()) && !empty(\app\Models\CestaCliente::where('produto_id', $produto->id)->where('cliente_id', Auth::user()->id)->first()->quantidade) ? \app\Models\CestaCliente::where('produto_id', $produto->id)->where('cliente_id', Auth::user()->id)->first()->quantidade .' Iten(s) adicionado(s)' : '0 Iten(s) adicionado(s)') }} </h5>
                                
                                <a type="button" class="x-circle-fill remove-produto-carrinho" data-produto-id="{{ $produto->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-file-minus" viewBox="0 0 16 16">
                                        <path d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                                        <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                                    </svg>
                                </a>

                                <a type="button" class="plus-circle- add-produto-carrinho" data-produto-id="{{ $produto->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </a>                              
                           
                            </div>

                            <br><br>
                        </div>
                    @endforeach
                @else
                    <h4>BUSCA SEM RESULTADOS</h4>
                @endif
            </div>  
        </div>  
    </main>
</body>
@include('pages.layout.footer')
</html>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<style>
    /*---------Navegador Secundário--------*/
    /* Style the list */
    .breadcrumb{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        font-size: 18px;
        padding: 0 0 0 100px;   
        margin: 0;
    }

    .link_breadcrumb:hover{
         color: #333333;
    }

    /* Display list items side by side */
    .link_breadcrumb{
        text-decoration: none;
        color: rgb(102, 102, 105);
        padding: 10px;
    }


    /* link visitado */
    .link_breadcrumb a:visited {
        color: rgb(39, 0, 146);
    }

    /*---------Produtos--------*/
    .link_descricao_produtos{
        text-decoration: none;
        color: #333333;
    }

    .link_descricao_produtos:hover{
        text-decoration: none;
        color: #333333;
    }
    
    .produto-geral{
        padding: 0 30px;
    }

    .produto-imagem{
        text-align: center;
    }

    .produto-nome{
        text-align: left;
        font-size: 24px;
    }

    .produtos-preco{
        text-align: left;
        font-size: 20px;
    }

    .produto-quantidade{
        text-align: right;
        font-family:'Segoe UI' !important;
    }

    .todos-produtos{
         margin-left: 0 !important;
        margin-right: 0 !important;

    }

</style>