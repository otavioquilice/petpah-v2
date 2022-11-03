<br><br><br><br>
<footer class="rodape container-fluid text-center">
    
    <h2 class="proposito">Pet Pah Propósito</h2>
    <p class="prposito__descricao">Lorem ipsum, dolor sit amet consectetur adipisicing elit. A ipsa aspernatur, qui
      dolorem consequatur quasi, ad esse excepturi accusantium odio dolor autem eveniet dignissimos delectus mollitia
      voluptatum quis ab quam?Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quae, perspiciatis dicta? Dolor
      accusamus recusandae officiis ratione debitis aut, obcaecati eum eaque at sint blanditiis est. Asperiores
      praesentium consequatur aut consequuntur.
    </p>

    <div class="baixo_rodape">
      <section class="contatos">
        <h3 class="titulo_contato">Contatos</h3>
        <ul class="contato_lista">
          <li><p>xxxxx@fatec.sp.gov.br</p></li>
          <li><p>Tel.:(11)91234-5678</p></li>
        </ul>
      </section>

      <section class="logo_rodape">
        <img src="{{ asset('media/imagens/img/logoprtpah003 1.png') }}" alt="Petpah" class="rodape__logo">
      </section>

      <section>
        <h3>Nossas redes</h3>
          <ul class="redes__lista">
            <li class="redes__icine">
              <img src="{{ asset('media/imagens/img/facebook.png') }}" alt="ícone facebook">
            </li>
            <li class="redes__icone">
              <img src="{{ asset('media/imagens/img/instagram.png') }}" alt="ícone instagram">
            </li>
            <li class="redes__icone">
              <img src="{{ asset('media/imagens/img/youtube.png') }}" alt="ícone youtube">
            </li>
          </ul>
      </section>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script type="text/javascript">

  function mudarSelect(option, id){
    
    if(option.value === 'consumo_doacao'){
         
      $('.produto_doacao_'+id).removeAttr('hidden');
      $('.qtd_doacao_'+id).attr('required','true');

    }else{
      $('.produto_doacao_'+id).attr('hidden','true');
      $('.qtd_doacao_'+id).removeAttr('required');
      
    }
  }

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
