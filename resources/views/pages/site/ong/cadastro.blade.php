<!DOCTYPE html>
<html lang="pt-br">
    @include('pages.layout.head')
<body>
    @include('pages.layout.header')

    @include('pages.layout.nav-bar')

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
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(session('success'))
                        <h4 class="row col-md-6 offset-md-3 mt-4">{{session('success')}}</h4>
                    @endif

                    <h3 class="titulo_form col-md-6 offset-md-3 mt-4">Cadastro de ONGs parceiras</h3>

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
                        <label for="estatuto_social">Estatuto social</label>
                        <input type="text" name="estatuto_social" id="estatuto_social" class="form-control" placeholder="Digite seu estatuto social">
                    </div>

                    <div class="col-md-6 offset-md-3 mt-4">
                        <label for="representante">Nome do representante legal</label>
                        <input type="text" name="nome_representante_legal" id="nome_representante_legal" class="form-control" placeholder="Digite o nome do representante legal">
                    </div> 

                    <div class="col-md-6 offset-md-3 mt-4">
                        <label for="representante">Email do representante legal</label>
                        <input type="email" name="email_representante_legal" id="email_representante_legal" class="form-control" placeholder="Digite o nome do representante legal">
                    </div> 
                    
                    <div class="col-md-6 offset-md-3 mt-4">
                        <label for="representante">Telefone do representante legal</label>
                        <input type="phone" name="telefone_representante_legal" id="telefone_representante_legal" class="form-control" placeholder="Digite o nome do representante legal">
                    </div>  

                    <div class="col-md-6 offset-md-3 mt-4">
                        <input type="submit" value="Solicitar cadastro" class="btn btn-primary col-md-12">
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