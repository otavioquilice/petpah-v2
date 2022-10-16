<header class="header">

    <!-- Header Main -->

    <div class="header_main">
        <div class="container">
            <div class="row col-md-12">

                <div class="col-md-3">
                    <div class="logo_container">
                        <img src="{{ asset('/media/imagens/imghome/logo1.png') }}" alt="img da logo" class="imglogo">
                    </div>
                </div>		

                <!-- Search -->
                <div class="col-md-4">
                    <input class="form-control mb-2" type="search" placeholder="Search" aria-label="Search">
                </div>

                <div class="col-md-1">
                    <button class="btn btn-outline-success mb-2" type="submit">Search</button>
                </div>
                
                <!-- Wishlist -->
                <div class="col-md-1">
                    <div class="">
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
                        <div id='qtd_produto_carrinho' class="carrinho_item cart_count">
                            <a  href="/carrinho" ><img src="{{ asset('media/imagens/img/cart.png')}}" alt="cart"></a>
                            {{ !empty($qtd_itens_cesta) ? $qtd_itens_cesta.' Produto(s)' : '0' }}
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div>
                        <p>{{ !empty(Auth::user()) ? Auth::user()->name  : 'Bem vindo' }}</p>
                    </div>
                    @if(!empty(Auth::user()))
                        <div class="d-grid mb-10">
                            <button type="submit" class="btn btn-primary">Sair</button>
                        </div>
                    @else
                        <a href="/login">Entre ou cadastre-se</a>
                @endif
                </div>
            </div>
        </div>
    </div>
    

</header>