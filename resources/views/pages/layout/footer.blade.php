<br><br><br><br>
<footer class="rodape container-fluid">
    
    <h2 class="proposito">Pet Pah Propósito</h2>
    <p class="prposito__descricao">Nosso único objetivo é fazer com que cada bichinho se sinta 
      amado e seguro, consumindo o produto da melhor qualidade. 
      Possuímos entregadores particulares garantindo sua entrega em um estante. 
      Apresentamos também parcerias com ONGs para ajudar os bichinhos que necessitam de cuidados.
      Facilitamos o processo de doação dos nossos produtos. 
      Com apenas alguns cliques é possível realizar uma doação segura, 
      que através de um processo minucioso selecionamos as nossas ONGs parceiras, 
      que temos muito orgulho em nomeá-las como parceiras Pet pah!  
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

<script type="text/javascript">

  function selecionarQuantidadeDoacao(option, id){
    
    if(option.value === 'consumo_doacao'){
         
      $('.produto_doacao_'+id).removeAttr('hidden');
      $('.qtd_doacao_'+id).attr('required','true');

      $('.form_doacoes').removeAttr('hidden');
      $('.ong_id').attr('required','true');

    }else{
      $('.produto_doacao_'+id).attr('hidden','true');
      $('.qtd_doacao_'+id).removeAttr('required');
      
      $('.form_doacoes').attr('hidden','true');
      $('.ong_id').removeAttr('required');
    }
  }

  function selecionarOpcaoEntrega(option){
    
    if(option.value === 'solicitar_entregador'){
         
      $('.solicitar_entrega').removeAttr('hidden');

    }else{
      $('.solicitar_entrega').attr('hidden','true');
      
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
                  footer: '<a href="/login">Clique aqui para fazer o login.</a><p>- OU -</p><a href="/register">Clique aqui para se cadastrar.</a>'
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
                      $('#count_produto_id_'+produto_id).text(result.count_produto.quantidade+' Iten(s) adicionado(s)');
                      $('.count_produto_id_'+produto_id).attr('max',result.count_produto.quantidade);
                      
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
                  footer: '<a href="/login">Clique aqui para fazer o login.</a><p>- OU -</p><a href="/register">Clique aqui para se cadastrar.</a>'
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
                      $('#count_produto_id_'+produto_id).text(result.count_produto.quantidade+' Iten(s) adicionado(s)');
                      $('.count_produto_id_'+produto_id).attr('max',result.count_produto.quantidade);
                      
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

      $(document).on("click", ".aprovar-ong", function(e) {
          var ong_id = $(this).attr("data-ong-id");

          swal.fire({
              title: 'Aprovar Ong',
              text: "Você está prestes a aprovar esta Ong, deseja continuar?",
              icon: 'warning',
              showCancelButton: true,
              cancelButtonText: "Cancelar",
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Sim',
              reverseButtons: true
          }).then((result) => {
              if (result.value) {
                  $.ajax({
                      url: "/ongs/aprovar",
                      type: "post",
                      data: {
                          id: ong_id
                      },
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      dataType: "html",
                      success: function () {
                          swal.fire(
                            'Aprovado!',
                            'A Ong foi aprovada com sucesso!',
                            'success'
                          );
                          setTimeout(function(){
                              location.reload();
                          }, 1000)
                      },
                      error: function (xhr, ajaxOptions, thrownError) {
                          swal.fire(
                            'Erro!',
                            'Não foi Aprovar a Ong.',
                            'error'
                          );
                      }
                  });
              }
          });     
      });

      $(document).on("click", ".carrinho_click", function(){

        var logado  = {{ !empty(Auth::user()) ? 1 : 0 }};

        var produto_id = $(this).attr('data-produto-id');

        if(logado == 0){

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Antes de acessar o carrinho é necessário fazer o login!',
                footer: '<a href="/login">Clique aqui para fazer o login.</a><p>- OU -</p><a href="/register">Clique aqui para se cadastrar.</a>'
            })

        }else{
            window.location.replace("/carrinho");
        }
      });

      $('.cpf-mask').mask('000.000.000-00', {reverse: true});
      $('.numero_cartao-mask').mask('0000.0000.0000.0000', {reverse: true});
      $('.validade-mask').mask('00/00', {reverse: true});
      $('.cvv-mask').mask('000', {reverse: true});

  });

</script>
