<!DOCTYPE html>
<html lang="pt-br">

  @include('pages.layout.head')

<body>

  @include('pages.layout.header')

  @include('pages.layout.nav-bar')
  
  <main class="main_produtos">
    
    <div class="container row col-md-12">

      <ul class="col-md-8">

        <h1>Carrinho</h1>

        @foreach($produtos as $item_prod)
        
        <li class="dados_produtos">
          <div class="info1">
            <h3 class="titulo_produto">Ração para cachorro colorido</h3>
            <img src="{{ asset('media/imagens/img2/prod'.$item_prod->produto_id .'.png') }}" alt="item1">  
            <p class="produtos-preco">R$ {{ $item_prod->produto->preco[0]->preco}}</p>
                  
          </div>

            <div name="select" class="info2">
              {{-- <span class="count_produto_id_{{$item_prod->produto_id}}"> {{ $item_prod->quantidade }} </span>  --}}
              <h5 id="count_produto_id_{{$item_prod->produto_id}}"> {{ $item_prod->quantidade }} Iten(s) adicionado(s)</h5>
              <a type="button" class="plus-circle- add-produto-carrinho" data-produto-id="{{ $item_prod->produto_id }}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                      <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                      <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                  </svg>
              </a>
              <a type="button" class="x-circle-fill remove-produto-carrinho" data-produto-id="{{ $item_prod->produto_id }}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-minus" viewBox="0 0 16 16">
                      <path d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                      <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                  </svg>
              </a>
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