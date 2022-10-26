<!DOCTYPE html>
<html lang="pt-br">

  @include('pages.layout.head')

<body>

  @include('pages.layout.header')

  @include('pages.layout.nav-bar')
  
  <main class="main_produtos">
    
    <div class="carrinho_container">
      <ul class="produtos_carrinho">

        <h1>Carrinho</h1>

        @foreach($produtos as $item_prod)
        
        <li class="dados_produtos">
          <div class="info1">
            
            <h3>{{$item_prod->produto->nome}}</h3>
            <img src="{{ asset('media/imagens/img2/prod'.$item_prod->produto_id .'.png') }}" alt="item1">  
            <p class="produtos-preco">R$ {{ $item_prod->produto->preco[0]->preco}}</p>
                  
          </div>

          <div name="select" class="info2">
            <span class="material-symbols-rounded lixo">delete</span>
            <input type="number" value="{{$item_prod->quantidade}}" class="quantidade_produto"/> 
            <select class="tipo_produto">
              <option value="valor3" selected>Selecione o proposito dessa compra</option>
              <option value="valor2">Consumo proprio</option>
              <option value="valor1">Doação para ONGs</option>
             
            </select>
            
          </div>

        </li>
        @endforeach



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

          @foreach($produtos as $item_prod)
            <div class="resumo_produto"> <!-- resumo_compra -->
              <p class="resumo_produto_titulo">{{ $item_prod->produto->nome}}</p> <!-- resumo_titulo -->
              <p class="resumo_produto_valor">R$ {{ $item_prod->produto->preco[0]->preco}}</p>
               $produto=
            </div>
          @endforeach

          <input type="submit" value="Ir para pagamento" class="bt_pagamento">
          <input type="submit" value="Continuar comprando" class="bt_contimuar">
        </div>
      

    </div>

    <div class="doacoes">

      <div class="titulo_doacao">
        <img src="{{ asset('media/imagens/img3/cuidado.png') }}" alt="cuidado doação">
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

@include('pages.layout.footer')

</html>