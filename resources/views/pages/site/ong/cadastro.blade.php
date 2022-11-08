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
			<b>Cadastro de ONG's parceiras</b>
			</a>
		</div>
    <main>
        <div class="container">

            <div class="row"> 

                <span></span>
                <form action="/ongs/store" method="POST">
                    @csrf
                    @if($errors->any())
                        <div class="row col-md-6 offset-md-3 mt-4">
                            <div class="small-12 medium-12 columns">
                                <div class="error-message">
                                    <p>Por favor, verifique os erros abaixo:</p>
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
                        <h4 class="row col-md-6 offset-md-3 mt-4">{{session('success')}}</h4>
                    @endif

                    <h3 class="titulo_form col-md-6 offset-md-3 mt-4">Cadastro de ONG's parceiras</h3>

                    <div class="col-md-6 offset-md-3 mt-4">
                        <label for="razão_social">Razão social</label>
                        <input type="text" name="razao_social" id="razao_social" class="form-control" placeholder="Digite a razão social da ONG">
                    </div>

                    <div class="col-md-6 offset-md-3 mt-4">
                        <label for="nome_fantasia">Nome fantasia</label>
                        <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control" placeholder="Digite o nome fantasia da ONG">
                    </div>

                    <div class="col-md-6 offset-md-3 mt-4">
                        <label for="cnpj">CNPJ</label>
                        <input type="text" name="cnpj" id="cnpj" class="form-control" placeholder="Digite o CNPJ">
                    </div>

                    <div class="col-md-6 offset-md-3 mt-4">
                        <label for="representante">Nome do representante legal</label>
                        <input type="text" name="nome_representante_legal" id="nome_representante_legal" class="form-control" placeholder="Digite o nome do representante legal">
                    </div> 

                    <div class="col-md-6 offset-md-3 mt-4">
                        <label for="email-representante">Email do representante legal</label>
                        <input type="email" name="email_representante_legal" id="email_representante_legal" class="form-control" placeholder="Digite o nome do representante legal">
                    </div> 
                    
                    <div class="col-md-6 offset-md-3 mt-4">
                        <label for="tel-representante">Telefone do representante legal</label>
                        <input type="phone" name="telefone_representante_legal" id="telefone_representante_legal" class="form-control" placeholder="Digite o nome do representante legal">
                    </div>  

                    <div class="col-md-6 offset-md-3 mt-4">
                        <label for="insta-ong">Instagram da ONG</label>
                        <input type="text" name="instagram_ONG" id="instagram_ONG" class="form-control" placeholder="Digite o instagram da ONG">
                    </div>

                    <div class="col-md-6 offset-md-3 mt-4">
                        <label for="face-ong">Facebook da ONG</label>
                        <input type="text" name="facebook_ONG" id="facebook_ONG" class="form-control" placeholder="Digite o facebook da ONG">
                    </div>

                    <div class="col-md-6 offset-md-3 mt-4">
                        <label for="site-ong">Site da ONG</label>
                        <input type="text" name="site_ONG" id="site_ONG" class="form-control" placeholder="Digite o link do site da ONG">
                    </div>

                    <div class="col-md-6 offset-md-3 mt-4">
                        <input type="submit" value="Solicitar cadastro" class="btn col-md-12 btn_cadastro_ONG">
                    </div>
                </form>
            </div>
        </div>
    </main>

    <br>
    <br>

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
        padding: 0 0 0 100px;   
        margin: 0;
    }

    /* Display list items side by side */
    .link_breadcrumb{
        text-decoration: none;
        color: rgb(102, 102, 105);
        padding: 10px;
    }


    /* link visitado */
    .link_breadcrumb a:visited {
        color: rgb(39, 0, 146);
    }

    /*---------ONG cadastro--------*/
    .btn_cadastro_ONG{
    background-color: rgb(133,122,245)  !important;
    color: #ffffff;
    border-radius: 40px;
}
</style>