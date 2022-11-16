<header class="header">
<br>
    <!-- Header Main -->

    <div class="header_main">
        <div class="container">
            <div class="container-fluid header_geral">

                <div class="col-md-3">
                    <div class="logo_container">
                        <a href="\"><img src="{{ asset('/media/imagens/imghome/logo1.png') }}" alt="imagem da logo" class="imglogo"></a>
                    </div>
                </div>		

                <!-- Search -->
                <div class="header_pesquisa_geral">
                    <div class="col-md-9 header_caixa_pesquisa">
                        <form class="form w-100" method="POST" action="/buscar-produto">
                            @csrf
                            <input class="mb-2 fonte_label_pesquisa" type="search" name="buscar_produto" placeholder="Pesquise produto(s)" aria-label="Search">
                        
                    </div>

                    <div class="col-md-1 header_caixa_pesquisa">
                            <button class="mb-2 buscar-produto" type="submit">Pesquisar</button>
                        </form>
                    </div>
                </div>

                <div class="col-md-2 header_login_menu">
                    <button type="button" class="cabecalho__menu"><img src="{{ asset('media/imagens/img/menu.png')}}" alt="menu lateral icone" class="menu-lateral_icone" width="20"></button>
                        <div class="logo_container_mobile">
                            <a href="\"><img src="{{ asset('/media/imagens/imghome/logo1.png') }}" alt="img da logo" class="imglogo" width="120" height="35"></a>
                        </div>
                    <div class="header_login_bem-vindo">
                        <a  href="/login" ><img src="{{ asset('media/imagens/img/login.png')}}" alt="boneco login" class="header_img_login"></a>
                        <span class="material-icons">
                        <p class="header_bem-vindo">{{ !empty(Auth::user()) ? Auth::user()->name  : '' }}</p>
                        @if(!empty(Auth::user()))
                            <div class="">
                                <form class="form w-100" method="POST" action="/logout">
                                    @csrf
                                    <button type="submit" class="btn btn_sair">Sair</button>
                                </form>
                            </div>
                        @else
                            <div class="header_entre_cadastre">
                                <a href="/login" class="link_header_entre_cadastre">Entre ou cadastre-se</a>
                            </div>
                        @endif
                    </div>
                    
                </div>

                <!-- Wishlist -->
                <div class="col-md-1 header_carrinho">
                        <div>
                            @php
                                if(Auth::user()){
                                    $itens_cesta = Auth::user()->cesta_produtos()->get();
                                    $qtd_itens_cesta = 0;
                                    if(!empty($itens_cesta)){
                                        foreach($itens_cesta as $item){
                                            $qtd_itens_cesta += $item->quantidade;
                                        }
                                    }
                                }
                            @endphp
                            <div class="header_carrinho_grupo">
                                <a  href="#" class="carrinho_click"><img src="{{ asset('media/imagens/img/cart.png')}}" alt="cart"></a>
                                <span id='qtd_produto_carrinho' class="carrinho_item cart_count">
                                    {{ !empty($qtd_itens_cesta) ? $qtd_itens_cesta.' Produto(s)' : '0' }}
                                </span>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
    

</header>


