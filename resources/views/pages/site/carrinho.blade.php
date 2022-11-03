<!DOCTYPE html>
<html lang="pt-br">

  @include('pages.layout.head')

<body>

  @include('pages.layout.header')

  @include('pages.layout.nav-bar')
  
  <main class="main_produtos">
    
    <form action="/store/pedido" method="POST">

      <div class="container row col-md-12">
        <div class="col-md-7">
          <h2>Carrinho</h2>

          @foreach($produtos as $item_prod)
            <div class="dados_produtos col-md-11">
              <div class="info1">
                <h3 class="titulo_produto">Ração para cachorro colorido</h3>
                <img src="{{ asset('media/imagens/img2/prod'.$item_prod->produto_id .'.png') }}" alt="item1">  
                <h5><p class="produtos-preco">R$ {{ $item_prod->produto->preco->where('ativo', 1)->first()->preco}}</p></h5>
                      
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
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>
                    </svg>
                </a>
                <select class="tipo_produto" onClick="mudarSelect(this, {{$item_prod->produto_id}})" required>
                  <option value="" selected disabled hidden>Selecione o proposito dessa compra</option>
                  <option value="consumo_proprio">Consumo proprio</option>
                  <option value="consumo_doacao">Doação para ONGs</option>
                </select>
                <div hidden class="produto_doacao_{{$item_prod->produto_id}}">
                  <p>Digite a quantidade para doação</p>
                  <input type="number" class="qtd_doacao_{{$item_prod->produto_id}}"  name="produto_doacao[{{$item_prod->produto_id}}]"  min="1" max="{{$item_prod->quantidade}}" step="1" placeholder="Digite a quantidade para doação">
                </div>
                
              </div>

            </div>
          @endforeach

        </div> 
      
        <div class="col-md-5">

            @csrf
            @php $total = 0 @endphp
            <h2>Resumo</h2>
            <div class="">
              @foreach($produtos as $item_prod)
                <div class="resumo_produto"> <!-- resumo_compra -->
                  <h6 class="resumo_produto_titulo">{{ $item_prod->produto->nome}}</h6> <!-- resumo_titulo -->
                  <h6 class="resumo_produto_valor">{{ $item_prod->quantidade }} X R$ {{ $item_prod->produto->preco->where('ativo', 1)->first()->preco}}</h6>
                </div>
              <br>
                @php $total = $total + ( $item_prod->quantidade * $item_prod->produto->preco->where('ativo', 1)->first()->preco) @endphp
              @endforeach
            </div>
            <h3 class="resumo_valor_total">Total de R$: {{ $total}}</h3>
            
            <br>

            <li class="opcao_entrega">
              <h2 class="titulo_doacoes">Forma de recebimento</h2>
              <div class="forma_entrega">
                <p class="descricao_entrega">Em caso de consumo própio, selecione como irá receber o produto.<p>
                <select name="select" class="dropdown2">
                  <option value="" selected disabled hidden>Escolha uma opção de Retirada/Entrega.</option>
                  <option value="valor1">Reirar na loja</option>
                  <option value="valor2">Solicitar um entregador</option>
                </select>
              </div>


            </li>
            <br>

            <div class="doacoes">

              <div class="titulo_doacao">
                <img src="{{ asset('media/imagens/img3/cuidado.png') }}" alt="cuidado doação">
                <h2 class="titulo_doacoes">Doações</h2>
              </div>
        
              <div class="selecione_ong">
                <div class="selecione">
                  <p class="selecione_titulo">Selecione a ONG</p>
                </div>
                <select name="select" class="dropdown3">
                  <option value="" selected disabled hidden>Escolha uma ONG</option>
                  <option value="valor1">ONG LOVE ANIMAL</option>
                  <option value="valor2">LITTLE DOG</option>
                  <option value="valor3">PATAS EM AÇÃO</option>
                  <option value="valor4">ONG LAMBEIJO</option>
                  <option value="valor5">ONG XX</option>
                </select>
                <br>
                {{-- <input type="submit" value="Selecionar ONG" class="bt_pagamento col-md-8"> --}}
              </div>
        
            </div>

            <br>

            <input type="submit" value="Ir para pagamento" class="bt_pagamento col-md-8">
            <input type="submit" value="Continuar comprando" class="bt_contimuar col-md-8">

          

        </div>
      </div>
    </form>
  </main>
</body>


@include('pages.layout.footer')

</html>