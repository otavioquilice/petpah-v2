<!DOCTYPE html>
<html lange="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>home</title>
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
        <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
                    <img src="{{ asset('/media/imagens/img/login.png') }}" alt="login">
                </div>
                
                <div>
                    <p>{{ !empty(Auth::user()) ? Auth::user()->name  : 'Bem vindo' }}</p>
                </div>
        
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
        
                <div>
                    <a  href="/carrinho" ><img src="{{ asset('media/imagens/img/cart.png') }}" alt="cart"></a>
                    0 item
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

            <div class="container_chamada_principal"> 
                 <img class="hero" src="{{ asset('media/imagens/imghome/hero.png') }}" alt="Imagem Hero">   

                    <section class="principal">            

                    <h1 class="titulo-hero">Todo dia é dia de <br> cuidar de um bichinho</h1>
                    <p>Encontre aqui produtos e serviços para seu pet e ONGs <br>
                    que estão arrecadando para cuidar de um bichinho que <br> esteja passandopor necessidades.</p>
                        
                    <div class="principal_botoes">
                        <button class="principal_botao">Sobre as ONGs parceiras</button> 
                        <button class="principal_botao">Divulgue sua ONG aqui</button>
                    </div>
                </section>
            </div>

            <section class="passos_container">

                <h1 class="titulo-passos">Como fazer</h1>
                
                <div class="conteudo-doacao">
                    <p>Doação</p>
                    <ul class="doacao">
                        <li class="itens1">Escolha o produto</li>
                        <li class="itens1">Adicione ao carrinho</li>
                        <li class="itens1">Selecione a opção doar</li>
                        <li class="itens1">Selecione a ONG</li>
                        <li class="itens1">Fazer o pagamento</li>
                    </ul>
                </div>
                
                <div class="conteudo-compra">
                    <p>Compra</p>
                    <ul class="compra">
                        <li class="itens2">Escolha o produto</li>
                        <li class="itens2">Adcione ao carrinho</li>
                        <li class="itens2">Selecione a opção comprar</li>
                        <li class="itens2">Fazer o pagamento</li>
                    </ul>
                </div>

                <div class="passos_imagem">
                    <img src="{{ asset('media/imagens/imghome/imgP.png') }}" alt="imgPassaro" class="imgPassos">
                </div>

            </section>

            <section class="mapa">
                <h3 class="titulo-mapa">Nosso estabelecimento</h3>
                
                <p>Nosso estabelecimento está localizado próximo de você!</p>
                
                <div class="mapa-fatec">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.85015788018!2d-46.61007378554181!3d-23.60970626926334!2m3!
                    1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5b995a446bf9%3A0x2102d3f76afde05d!2sFatec%20Ipiranga!5e0!3m2!1spt-PT!2sbr!4v1664290942616!5m2!1spt-PT!2sbr" 
                    width="900" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </section>

        </main>
    </body>

    <footer class="rodape">
        <img src="{{ asset('media/imagens/img/logoprtpah003 1.png') }}" alt="Petpah" class="rodape__logo">
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
</html>