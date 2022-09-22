<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="{{ asset('css/carrinho.css') }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
  <header>

    <div class="container">
      <div>
        <a href="/produtos">
            <h1 class="titulo">PET PAH</h1>
        </a>
        </div>

      <div>
        <form>
          <span class="material-symbols-rounded lupabusca">search</span>
          <input class="busca" type="search" aria-label="Busca">
        </form>
      </div>

      <div>
        <img src="{{ asset('/media/imagens/img/login.png') }}" alt="login">
      </div>

      <div>
        <p>{{ !empty(Auth::user()) ? Auth::user()->nome  : 'Bem vindo' }}</p>
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
      0 item
    </div>

    </div>
  </header>


  <ul class="produtos">

    <h1>Carrinho</h1>
    <li>

      <h3>Ração para cachorro colorido</h3>
      <img src="{{ asset('/media/imagens/img3/prod1 1.png') }}" alt="item1">
      <span class="material-symbols-rounded lixo">delete</span>
      <input type="number" value="0" class="quantidade" />
      <p class="produtos-preco">R$ 80,00</p>

      <select name="select" class="combobox">
        <option value="valor1">Doação</option>
        <option value="valor2" selected>Consumo</option>
      </select>

    </li>

    <li>

      <h3>Fralda para cachorro</h3>
      <img src="{{ asset('/media/imagens/img3/prod3.png') }}" alt="item1">
      <span class="material-symbols-rounded lixo">delete</span>
      <input type="number" value="0" class="quantidade" />
      <p class="produtos-preco">R$ 100,00</p>

      <select name="select" class="combobox">
        <option value="valor1">Doação</option>
        <option value="valor2" selected>Consumo</option>
      </select>

    </li>

    <li>

      <h3>---------------------------------------------------</h3>
      <h4>Em caso de consumo própio, <br>
      selecione como irá receber o produto.</h4>

      <select name="select" class="combobox2">
        <option value="valor1">Reirar na loja</option>
        <option value="valor2" selected>Solicitar um entregador</option>
      </select>

    </li>

  </ul>

  <div class="doacoes">
    <img src="{{ asset('/media/imagens/img3/cuidado.png') }}" alt="cuidado doação">
    <h3 class="doacao">Doações</h3>
    <h4 class="doacao">Selecione a ONG</h4>
    <select name="select" class="combobox3">
      <option value="valor1">ONG LOVE ANIMAL</option>
      <option value="valor2" selected>LITTLE DOG</option>
      <option value="valor3">PATAS EM AÇÃO</option>
      <option value="valor4" selected>ONG LAMBEIJO</option>
      <option value="valor5">ONG XX</option>
    </select>
    <input type="submit" value="Selecionar ONG" class="selecionar">
  </div>

</body>
<footer class="rodape">
  <img src="{{ asset('/media/imagens/img/logoprtpah003 1.png') }}" alt="Petpah" class="rodape__logo">
  <h2 class="proposito">Pet Pah Propósito</h2>
  <p class="prposito__descricao">Lorem ipsum, dolor sit amet consectetur adipisicing elit. A ipsa aspernatur, qui
    dolorem consequatur quasi, ad esse excepturi accusantium odio dolor autem eveniet dignissimos delectus mollitia
    voluptatum quis ab quam?Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae, perspiciatis dicta? Dolor
    accusamus recusandae officiis ratione debitis aut, obcaecati eum eaque at sint blanditiis est. Asperiores
    praesentium consequatur aut consequuntur.
  </p>
  <section class="contatos">
    <h3>Contatos</h3>
    <p>xxxxx@fatec.sp.gov.br</p>
    <p>Tel.:(11)91234-5678</p>
    <p>Nossas redes</p>
  </section>
  <ul class="redes__lista">
    <li class="redes__icine">
      <img src="{{ asset('/media/imagens/img/facebook.png') }}" alt="ícone facebook">
    </li>
    <li class="redes__icine">
      <img src="{{ asset('/media/imagens/img/instagram.png') }}" alt="ícone instagram">
    </li>
    <li class="redes__icine">
      <img src="{{ asset('/media/imagens/img/youtube.png') }}" alt="ícone youtube">
    </li>
  </ul>
</footer>

</html>