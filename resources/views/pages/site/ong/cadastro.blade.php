<!DOCTYPE html>
<html lang="pt-br">
    @include('pages.layout.head')
<body>
    @include('pages.layout.header')

    @include('pages.layout.nav-bar')

        <div class="breadcrumb">
			<a href="/" class="link_breadcrumb">
			Home
			</a>
			> 
			<a href="/produto" class="link_breadcrumb">
			<b>Cadastro de ONGs parceiras</b>
			</a>
		</div>
    <main>
        <div>

            <div class="form_cadastro_geral"> 

                <span></span>
                <form action="/ongs/store" method="POST" class="form_cadastro_todos">
                    
                    @csrf
                        @if($errors->any())
                            <div>
                                <div class="small-12 medium-12 columns">
                                    <div class="error-message">
                                        <div class="mensagem_erro_icone">
                                            <img src="{{ asset('media/imagens/img/remove.png')}}" alt="deu erro" class="icone_cadastro_erro">
                                            <p class="notificar_correcao">Por favor, verifique os erros abaixo</p>
                                        </div>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li><span class="label label-danger">{{ $error }}</span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(session('success'))
                            <img src="{{ asset('media/imagens/img/correct.png')}}" alt="check mark" class="icone_cadastro_sucesso">
                            <h4 class="ong_cadastra_sucesso">{{session('success')}}! <br> Fique de olho no e-mail, entraremos em contato em breve.</h4>
                            <br>
                        @endif

                    <h3>Cadastro de ONGs parceiras</h3>

                    <div class="input_cadastro_ong">
                        <label for="razão_social">Razão social</label>
                        <input type="text" name="razao_social" id="razao_social" class="form-control" placeholder="Digite a razão social da ONG">
                    </div>

                    <div class="input_cadastro_ong">
                        <label for="nome_fantasia">Nome fantasia</label>
                        <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control" placeholder="Digite o nome fantasia da ONG">
                    </div>

                    <div class="input_cadastro_ong">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="Digite o CNPJ da ONG">
                    </div>

                    <div class="input_cadastro_ong">
                        <label for="representante">Nome do responsável</label>
                        <input type="text" name="nome_representante_legal" id="nome_representante_legal" class="form-control" placeholder="Digite o nome do responsável">
                    </div> 

                    <div class="input_cadastro_ong">
                        <label for="email-representante">Endereço de email</label>
                        <input type="email" name="email_representante_legal" id="email_representante_legal" class="form-control" placeholder="Digite o email do responsável">
                    </div> 
                    
                    <div class="input_cadastro_ong">
                        <label for="tel-representante">Telefone de contato</label>
                        <input type="phone" name="telefone_representante_legal" id="telefone_representante_legal" class="form-control" placeholder="Digite o telefone de contato">
                    </div>  

                    <div class="input_cadastro_ong">
                        <label for="insta-ong">Instagram da ONG</label>
                        <input type="text" name="instagram_ONG" id="instagram_ONG" class="form-control" placeholder="Digite o instagram da ONG">
                    </div>

                    <div class="input_cadastro_ong">
                        <label for="face-ong">Facebook da ONG</label>
                        <input type="text" name="facebook_ONG" id="facebook_ONG" class="form-control" placeholder="Digite o facebook da ONG">
                    </div>

                    <div class="input_cadastro_ong">
                        <label for="site-ong">Site da ONG</label>
                        <input type="text" name="site_ONG" id="site_ONG" class="form-control" placeholder="Digite o link do site da ONG">
                    </div>

                    <div class="input_cadastro_ong">
                        <input type="submit" value="Solicitar cadastro" class="btn col-md-12 btn_cadastro_ONG">
                    </div>

                    

                </form>
                    
            </div>
        </div>
    </main>

    @include('pages.layout.footer')
    
</body>
</html>

<style>
    /*---------Navegador Secundário--------*/
    /* Style the list */
    .breadcrumb{
    display: flex;
    justify-content: flex-start;
    align-items: center;
    font-size: 18px;
    padding: 0 0 0 50px;   
    margin:0;      
}

.link_breadcrumb{
    text-decoration: none;
    color: rgb(102, 102, 105);
    padding: 10px;
}


.link_breadcrumb:hover{
    color: rgb(102, 102, 105);
}

    /*---------ONG cadastro--------*/
    .icone_cadastro_erro{
        width: 10%;
        text-align: center;
    }

    .mensagem_erro_icone{
        text-align: center; 
    }

    .notificar_correcao{
        font-size: 35px;
    }
    
    .icone_cadastro_sucesso{
        width: 4%;
        text-align: center;
    }

    .ong_cadastra_sucesso{
        color: green;
        font-size: 35px;
        text-align: center;
    }

    .form-control{
        width: 100%;
        padding: 5px 0 5px 2px;
        font-family:'Segoe UI'!important;
    }

    .form_cadastro_todos{
        display: flex;
        flex-direction: column;
        align-items: center;
    }  

    .input_cadastro_ong{
        width: 40%;
        padding: 10px 0;
    }

    @media screen and (max-width: 768px) { 
        .input_cadastro_ong{
            width: 80%;
        }
    }

    .btn_cadastro_ONG{
        width: 100%;
        background-color: rgb(133,122,245)  !important;
        color: #ffffff;
        border-radius: 40px;

    }

    .btn_cadastro_ONG:hover{
        color: #ffffff !important;
    }
    
    .notificar_correcao{
        color: red;
        font-weight: bold;
    }

</style>