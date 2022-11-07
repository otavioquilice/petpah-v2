<br><br><br><br>
<footer class="rodape container-fluid">
    
    <h2 class="proposito">Pet Pah Propósito</h2>
    <p class="prposito__descricao">Nosso único objetivo é fazer com que cada bichinho se sinta amado e seguro. 
      Para isto garantimos que seu bichinho consuma o produto de melhor qualidade. 
      Possuímos entregadores particulares que entregarão seu produto em um estante. 
      Apresentamos também parcerias com ONGs para ajudar os bichinhos que estão passando por necessidades. 
      Facilitamos o processo de doação dos nossos produtos, com apenas alguns clicks é possível realizar uma doação segura, 
      realizamos um processo minucioso para selecionarmos as nossas ONGs parceiras, que temos muito orgulho em tê-las como parceiras Pet pah!  
    </p>

    <div class="baixo_rodape">
      <section class="contatos">
        <h3 class="titulo_contato">Contatos</h3>
        <ul class="contato_lista">
          <li><p class="contato_petpah">xxxxx@fatec.sp.gov.br</p></li>
          <li><p class="contato_petpah">Tel.:(11)91234-5678</p></li>
        </ul>
      </section>

      <section class="logo_rodape">
        <img src="{{ asset('media/imagens/img/logoprtpah003 1.png') }}" alt="Petpah" class="rodape__logo">
      </section>

      <section>
        <h3>Nossas redes</h3>
          <ul class="redes__lista">
            <li class="redes__icine">
              <a href="https://www.facebook.com/"><img src="{{ asset('media/imagens/img/facebook.png') }}" alt="ícone facebook"></a>
            </li>
            <li class="redes__icone">
              <a href="https://www.instagram.com/"><img src="{{ asset('media/imagens/img/instagram.png') }}" alt="ícone instagram"></a>
            </li>
            <li class="redes__icone">
              <a href="https://www.youtube.com/"></a><img src="{{ asset('media/imagens/img/youtube.png') }}" alt="ícone youtube"></a>
            </li>
          </ul>
      </section>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
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
