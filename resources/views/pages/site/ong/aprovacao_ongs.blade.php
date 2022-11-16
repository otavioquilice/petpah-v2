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
            <a href="/ongs/aprovacao" class="link_breadcrumb">
            <b>Aprovação de ONGs parceiras</b>
            </a>
        </div>
        <div class="container">
            <main>
                <!-- begin:: Content -->
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="row align-items-center col-md-12">

                            
                            <div class="col-md-3">

                                {{ Form::text("generalSearch", request("generalSearch", null), ["class" => "form-control", "placeholder" => "Pesquisar por uma Ong...", "id" => "kt_data_ong_search_query", "autocomplete" => "off"]) }}                   
                            </div> 
                            <div class="col-md-1 ">
                                <label for="Categoria">Status: </label>
                            </div>
                            <div class="col-md-2"> 
                                {{ Form::select("status", ["" => "Selecione", 'ativo' => 'Ativo', 'inativo' => 'Inativo'], (!empty($ong) ? $ong->status: ''), ["id" => "kt_data_ong_search_status_query", "class" => "form-control cronicos-select2"]) }}
                            </div>                      
                        

                        </div>
                        <br>
                        <div class="kt-portlet__body">
                            <!--begin: Datatable -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Razão Social</th>
                                        <th scope="col">Nome Fantasia</th>
                                        <th scope="col">Cnpj</th>
                                        <th scope="col">Representante</th>
                                        <th scope="col">Email Representante</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ongs as $key => $ong)
                                        <tr>
                                            <th scope="row">{{ $key }}</th>
                                            <td>{{ $ong->razao_social }}</td>
                                            <td>{{ $ong->nome_fantasia }}</td>
                                            <td>{{ $ong->cnpj }}</td>
                                            <td>{{ $ong->nome_representante_legal }}</td>
                                            <td>{{ $ong->email_representante_legal }}</td>
                                            <td>{{ $ong->telefone_representante_legal }}</td>
                                            <td>{{ $ong->ativo == 0 ? 'Pendente aprovação' : 'Aprovado' }}</td>
                                            <td><button class="aprovar-ong" data-ong-id="{{$ong->id}}">Aprovar</button></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end: Datatable -->
                        </div>
                    </div>
                </div>
            </main>
        </div>
    <br>
    <br>
    <script src="{{ asset('/js/ong.js') }}"></script>
    @include('pages.layout.footer')
    
</body>
</html>

<style>
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

.aprovar-ong{
    display: flex;
    justify-content: center;
    border-radius: 10px;
    padding: 5px 6px;
    background-color: #857AF5;
    color: #ffffff;
    font-weight: bold;
    font-size: 15px;
    transition: 1s background;
    cursor: pointer;
    width: 100%;
    border-radius: 10px;
    border: none;


}
  
.aprovar-ong:hover{
    background: #a49ff0;
}
</style>