<!DOCTYPE html>
<html lange="pt-br">

    @include('pages.layout.head')


    <body>
        @include('pages.layout.header')

        <main>
            @include('pages.layout.nav-bar')

            <br><br>
            <div class="container">
                <div class="row align-items-center"> 

                    <img class="col-md-5" src="{{ asset('media/imagens/imghome/hero.png') }}" alt="Imagem Hero">   

                    <section class="col-md-5 hero_incentivo_ONG">            

                        <h1 class="titulo-hero">Todo dia é dia de <br> cuidar de um bichinho</h1>
                        <p>Encontre aqui produtos e serviços para seu pet e ONGs <br>
                        que estão arrecadando para cuidar de um bichinho que <br> esteja passandopor necessidades.</p>
                        
                     <div class="btn_hero_incentivo_ONG">  
                        <button class="col-md-5 btn_home_hero">Sobre as ONGs parceiras</button>
                        <button class="col-md-5 btn_home_hero">Divulgue sua ONG aqui</button>
                     </div> 
                    </section>
                </div>
            </div>
            <br>    

            <div class='passos_container'> 
                <div class="row container-fluid "> 

                    <div class="col-md-12 text-center">
                        <h2 class="">Como fazer</h2>
                    </div>
                    <br>
                    <br>

                    <section class="row container-fluid text-left">

                        <div class="col-md-5">
                            <h5><p>Doação</p></h5>
                            <ul class="">
                                <li class="itens1">Escolha o produto</li>
                                <li class="itens1">Adicione ao carrinho</li>
                                <li class="itens1">Selecione a opção doar</li>
                                <li class="itens1">Selecione a ONG</li>
                                <li class="itens1">Fazer o pagamento</li>
                            </ul>
                        </div>
                        
                        <div class="col-md-5">
                            <h5><p>Compra</p></h5>
                            <ul class="">
                                <li class="itens2 ">Escolha o produto</li>
                                <li class="itens2">Adcione ao carrinho</li>
                                <li class="itens2">Selecione a opção comprar</li>
                                <li class="itens2">Fazer o pagamento</li>
                            </ul>
                        </div>
                        

                        <div class="col-md-2">
                            <img src="{{ asset('media/imagens/imghome/imgP.png') }}" alt="imgPassaro" class="imgPassos">
                        </div>
                    

                    </section>
                </div>
            </div>

            <section class="mapa">
                <h3 class="titulo-mapa">Nosso estabelecimento</h3>
                
                <p>Nosso estabelecimento está localizado próximo de você!</p>
                
                <div class="container-iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.85015788018!2d-46.61007378554181!3d-23.60970626926334!2m3!
                    1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5b995a446bf9%3A0x2102d3f76afde05d!2sFatec%20Ipiranga!5e0!3m2!1spt-PT!2sbr!4v1664290942616!5m2!1spt-PT!2sbr" 
                    class="responsive-iframe" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </section>

        </main>
    </body>
    @include('pages.layout.footer')
</html>