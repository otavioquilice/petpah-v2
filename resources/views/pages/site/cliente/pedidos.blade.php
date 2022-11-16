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
            <a href="/pedidos/meus-pedidos/{{Auth::user()->id}}" class="link_breadcrumb">
            <b>Meus Pedidos</b>
            </a>
        </div>
        <div class="container">
            <main>
                <!-- begin:: Content -->
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="row align-items-center col-md-12">

                            <div class="col-md-1 ">
                                <label for="Categoria">Status: </label>
                            </div>
                            <div class="col-md-2"> 
                                {{ Form::select("status", ["" => "Selecione", 'pago' => 'Pago', 'nao-pago' => 'Não Pago', 'cancelado' => 'Cancelado'], '', ["id" => "kt_data_pedido_search_status_query", "class" => "form-control cronicos-select2"]) }}
                            </div>                      
                        </div>
                        <br>
                        <div class="kt-portlet__body">
                            <!--begin: Datatable -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">N° Pedido</th>
                                        <th scope="col">Nome Cliente</th>
                                        <th scope="col">Valor Total</th>
                                        <th scope="col">Ong</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pedidos as $key => $pedido)
                                        <tr>
                                            <th scope="row">{{ $key }}</th>
                                            <td>{{ $pedido->id }}</td>
                                            <td>{{ $pedido->cliente->name }}</td>
                                            <td>R$: {{ $pedido->valor }}</td>
                                            <td>{{ !empty($pedido->ong) ? $pedido->ong->nome_fantasia : 'Pedido sem doação' }}</td>
                                            <td>{{ $pedido->status == 'pago' ? 'Pago' : 'Não Pago' }}</td>
                                            <td><a href="/pagamento/show/{{$pedido->uuid}}"><button class="ver-pedido" data-pedido-uuid="{{$pedido->uuid}}">Visualizar</button></a></td>
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

.ver-pedido{
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
  
.ver-pedido:hover{
    background: #a49ff0;
}
</style>