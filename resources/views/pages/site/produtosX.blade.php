<!DOCTYPE html>
<html lang="en">

    @include('pages.layout.head')
<body>
    @include('pages.layout.header')

    <main>

        @include('pages.layout.nav-bar')
	
		<div class="breadcrumb">
			<a href="home.html" class="link_breadcrumb">
			Home
			</a>
			>
			<a href="pesquisa.html" class="link_breadcrumb">
			Pesquisas
			</a>
			> 
			<a href="produto.html" class="link_breadcrumb">
			Produtos
			</a>
			> 
			<a href="racoes.html" class="link_breadcrumb">
			Rações para cachorros
			</a>
			>
			<a href="produtoX.html" class="link_breadcrumb">
			<b>Ração colorida</b>
			</a>
		</div>
		
		<section class="descricao_produto">
			<div class="produto">
				<div class="detalhe_produto">
					<div class="detalhe_produto_bt">
						<h2 class="titulo_racao">Ração colorida</h2>
						<p class="produto-preco">R$ 80,00</p>
						<p class="descricao_detalhe">It is a long established fact that a reader will be a distracted by the readable content of a page when looking at its layout.
						It is a long established fact that a reader will be a distracted by the readable content of a page when looking at its layout.
						It is a long established fact that a reader will be a distracted by the readable content of a page when looking at its layout.</p></br>
						<input type="submit" value="Adicionar aos favoritos" class="btn-addFavoritos">
						<input type="submit" value="Comprar agora" class="btn-comprar">
					</div>
						<img src="img2/prod1.png" alt="item1" class="img_racao">
				</div>
			</div>
		</section>

		<div class="produto-descricao">
			<div class="produto-descricao-detalhes">
				<img src="img2/prod1_1.png" alt="item1" class="img_racao_colorida">
				<div class="produto-descricao-detalhes_2">
					<h2>Descrição do Produto</h2>
					<div class="produto-descricao-detalhes_3">
						<img src="img/detalhe.png" alt="detalhesproduto" class="imagem_tralha">
						<p class="detalhes-racao-colorida">Lorem ipsum, dolor sit amet consectetur adipisicing elit. A ipsa aspernatur, qui dolorem consequatur quasi, ad esse excepturi accusantium 
						odio dolor autem eveniet dignissimos delectus mollitia voluptatum quis ab quam?Lorem ipsum, dolor sit amet consectetur adipisicing elit. A ipsa aspernatur, qui dolorem consequatur quasi, ad esse excepturi accusantium  
						odio dolor autem eveniet dignissimos delectus mollitia voluptatum quis ab quam? Lorem ipsum, dolor sit amet consectetur adipisicing elit. A ipsa aspernatur, qui dolorem consequatur quasi, ad esse excepturi accusantium 
						odio dolor autem eveniet dignissimos delectus mollitia voluptatum quis ab quam?Lorem ipsum, dolor sit amet consectetur adipisicing elit. A ipsa aspernatur, qui dolorem consequatur quasi, ad esse excepturi accusantium  
						odio dolor autem eveniet dignissimos delectus mollitia voluptatum quis ab quam? </p>
					</div>
				</div>
			</div>
		</div>
				
		<ul class="similares">
			<p class="produtos-similares">Conheça produtos <br></p>
			<p class="produtos-similares_2"><b>similares</b></p>
            <li>
                <div class="card"> 
					<div class="card_titulo">
						<img class="card-produto" src="img2/prod2.png" alt="item2">
					</div>
					<div>
						<h3>Ração para Cachorro XXXX</h3>
						<div class="card_link">
							<a href="http://www.petpah.com">Visualizar</a>
							<img src="img/seta.png" alt="imagem da seta" class="seta">
						</div>
					</div>
				</div>
            </li>

            <li>
                <div class="card"> 
					<div class="class_titulo">
						<img class="card2-produto" src="img2/prod6.png" alt="item2">
					</div>	
					<div> 
						<h3>Biscoito para Cachorro Filhote XXXX</h3>
						<div class="card_link">
							<a href="http://www.petpah.com">Visualizar</a>
							<img src="img/seta.png" alt="imagem da seta" class="seta">
						</div>
					</div>
				</div>
            </li>
		</ul>
    </main>

    @include('pages.layout.footer')
</body>
</html>