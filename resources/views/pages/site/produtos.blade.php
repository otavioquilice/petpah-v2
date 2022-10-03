<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Produtos</title>
    <link rel="stylesheet" href="{{ asset('css/produtos.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>

<body>
    <header> 
        <div class="container">
            <a href="/">
                <h1 class="titulo">PET PAH</h1>
            </a>
      
            <div>
              <form >
                <span class="material-symbols-rounded lupabusca">search</span>
                <input class="busca" type="search"  aria-label="Busca"> 
              </form>
            </div>
      
            <div>
              <img src="{{ asset('media/imagens/img/login.png') }}" alt="login">
            </div>
            
            <div>
              <p>{{ !empty(Auth::user()) ? Auth::user()->name  : 'Bem vindo' }}</p>
            </div>
      
            <div class="entremsg"> 
                @if(!empty(Auth::user()))
                <form class="form w-100" method="POST" action="/logout">
                    @csrf
                    <div class="d-grid mb-10">
                        <button type="submit" class="btn btn-primary">Sair</button>
                    </div>
                </form>
                @else
                    <a href="/login">Entre ou cadastre-se</a> 
                @endif

            </div>  
      
            <div>
                <a  href="/carrinho" ><img src="{{ asset('media/imagens/img/cart.png') }}" alt="cart"></a>
              <span id='qtd_carrinho'> 0 </span><span> Produtos</span>
            </div>
      
          </div>
    </header>

    <main>

        <nav>
            <ul>
              <li><a href="/">Home</a></li><bold>|
              <li><a href="/produtos">Produtos</a></li>|
              <li><a href="/doacoes">Doações</a></li>|
              <li><a href="/servicos">Serviços</a></li>
            </ul>
        </nav>

        <ul class="produtos">
            @foreach($produtos as $produto)
                <li>
                    <span class="material-symbols-rounded favorito">favorite</span>
                    <img src="{{ asset('media/imagens/img2/prod'.$produto->id .'.png') }}" alt="item1">
                    <p class="produtos-preco">R$ {{ $produto->preco[0]->preco}}</p>
                    <h2>{{$produto->nome}}</h2>
                    <button type="button" class="material-symbols-rounded circulo add-produto-carrinho" data-produto-id="{{ $produto->id }}">add_circle</button>
                    <button type="button" class="material-symbols-rounded circulo remove-produto-carrinho" data-produto-id="{{ $produto->id }}">remove_circle</button>
                </li>
            @endforeach
        </ul>
    </main>

    <footer class="rodape">
        <img src="{{ asset('media/imagens/img/logoprtpah003 1.png') }}" alt="Petpah" class="rodape__logo">
        <h2 class="proposito">Pet Pah Propósito</h2>
        <p class="prposito__descricao">Lorem ipsum, dolor sit amet consectetur adipisicing elit. A ipsa aspernatur, qui dolorem consequatur quasi, ad esse excepturi accusantium odio dolor autem eveniet dignissimos delectus mollitia voluptatum quis ab quam?Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae, perspiciatis dicta? Dolor accusamus recusandae officiis ratione debitis aut, obcaecati eum eaque at sint blanditiis est. Asperiores praesentium consequatur aut consequuntur.
        </p>
        <section class="contatos">
            <h3>Contatos</h3>
            <p>xxxxx@fatec.sp.gov.br</p>
            <p>Tel.:(11)91234-5678</p>
            <p>Nossas redes</p>
        </section>
        <ul class="redes__lista">
            <li class="redes__icine">
                <img src="{{ asset('media/imagens/img/facebook.png') }}" alt="ícone facebook">  
            </li>
            <li class="redes__icine">
                <img src="{{ asset('media/imagens/img/instagram.png') }}" alt="ícone instagram">  
            </li>
            <li class="redes__icine">
                <img src="{{ asset('media/imagens/img/youtube.png') }}" alt="ícone youtube">  
            </li>
        </ul>
    </footer>
</body>
</html>

<script type="text/javascript">

    $(document).ready(function()
	{
        $(document).on("click", ".add-produto-carrinho", function(){

			var produto_id = $(this).attr('data-produto-id');

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
                    $('#qtd_carrinho').text(result);
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal.fire(
                        'Erro!',
                        'Não foi adicionar o produto no carrinho',
                        'error'
                    );
                }
            });
		});

    });

    // setTimeout(function(){
    //     window.location.href = window.location.href.replace( /[\?#].*|$/, "?show_atendimentos=true" );
    // }, 1000)

</script>