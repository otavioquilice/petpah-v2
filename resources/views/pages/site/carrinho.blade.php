<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pet Pah | Carrinho</title>
  <link rel="stylesheet" href="carrinho.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
  <header>

    <div class="container">
      <div>
        <h1 class="titulo">PET PAH</h1>
      </div>

      <div>
        <form>
          <span class="material-symbols-rounded lupabusca">search</span>
          <input class="busca" type="search" aria-label="Busca">
        </form>
      </div>

      <div>
        <img src="img/login.png" alt="login">
      </div>

      <div>
        <p>Bem vindo</p>
      </div>

      <div class="entremsg">
        <p>Entre ou cadastre-se</p>
      </div>

      <div>
        <img src="img/cart.png" alt="cart">
        0 item
      </div>

    </div>
  </header>

  <main class="main_produtos">
    <div class="carrinho_container">
      <ul class="produtos">

        <h1>Carrinho</h1>

        <li class="dados_produtos">
          <div class="info1">
            <h3 class="titulo_produto">Ração para cachorro colorido</h3>
            <img src="img3/prod1 1.png" alt="item1" class="imagem_produto">   
            <p class="preco_produto">R$ 80,00</p>
                  
          </div>

          <div name="select" class="info2">
            <span class="material-symbols-rounded lixo">delete</span>
            <input type="number" value="0" class="quantidade_produto"/> 
            <select class="tipo_produto">
              <option value="valor3" selected>Selecione o proposito dessa compra</option>
              <option value="valor2">Consumo proprio</option>
              <option value="valor1">Doação para ONGs</option>
             
            </select>
            
          </div>

        </li>

        <li class="dados_produtos">
          <div class="info1">
            <h3 class="titulo_produto">Fralda para cachorro</h3>
            <img src="img3/prod3.png" alt="item1" class="imagem_produto">
            <p class="preco_produto">R$ 100,00</p>
            
          </div>

          <div name="select" class="info2">
          <span class="material-symbols-rounded lixo">delete</span>
          <input type="number" value="0" class="quantidade_produto" />
            <select class="tipo_produto">
              <option value="valor3" selected>Selecione o proposito dessa compra</option>
              <option value="valor2">Consumo proprio</option>
              <option value="valor1">Doação para ONGs</option>
            </select>
          </div>
        </li>

        <li class="opcao_entrega">
          <div class="forma_entrega">
            <p class="descricao_entrega">Em caso de consumo própio, selecione como irá receber o produto.<p>
            <select name="select" class="dropdown2">
              <option value="valor1">Reirar na loja</option>
              <option value="valor2" selected>Solicitar um entregador</option>
            </select>
          </div>

        </li>

      </ul> 
    

      <div class="resumo">
        <h1>Resumo</h1>
        <div class="resumo_produto"> <!-- resumo_compra -->
          <p class="resumo_produto_titulo">Ração para cachorro colorido</p> <!-- resumo_titulo -->
          <p class="resumo_produto_valor">R$00,00</p>
        </div>
        <div class="resumo_produto">
        <p class="resumo_produto_titulo">Fralda para cachorro</p>
        <p class="resumo_produto_valor">R$00,00</p>
        </div>
        <div class="resumo_divisao"></div>
        <div class="resumo_total">
          <p class="resumo_total_titulo">Total<p>
          <p class="resumo_total_valor">R$00,00</p>
        </div>
        <input type="submit" value="Ir para pagamento" class="bt_pagamento">
        <input type="submit" value="Continuar comprando" class="bt_contimuar">
      </div>

    </div>

    <div class="doacoes">
      <div class="titulo_doacao">
        <img src="img3/cuidado.png" alt="cuidado doação">
        <h1 class="titulo_doacoes">Doações</h1>
      </div>

    <div class="selecione_ong">
      <div class="selecione">
        <p class="selecione_titulo">Selecione a ONG</p>
      </div>
      <select name="select" class="dropdown3">
        <option value="valor1">ONG LOVE ANIMAL</option>
        <option value="valor2" selected>LITTLE DOG</option>
        <option value="valor3">PATAS EM AÇÃO</option>
        <option value="valor4" selected>ONG LAMBEIJO</option>
        <option value="valor5">ONG XX</option>
      </select>
      <input type="submit" value="Selecionar ONG" class="selecionar">
    </div>
    </div>
  </main>
</body>

<footer class="rodape">
  <img src="img/logoprtpah003 1.png" alt="Petpah" class="rodape__logo">
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
      <img src="img/facebook.png" alt="ícone facebook">
    </li>
    <li class="redes__icine">
      <img src="img/instagram.png" alt="ícone instagram">
    </li>
    <li class="redes__icine">
      <img src="img/youtube.png" alt="ícone youtube">
    </li>
  </ul>
</footer>

</html>