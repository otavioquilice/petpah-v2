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
            <a href="/todas-doacoes" class="link_breadcrumb">
            <b>Todas Doações</b>
            </a>
        </div>
        <div class="container">
            <main>
                <!-- begin:: Content -->
                <div class="card card-custom">
                    <div class="card-body">
                        {{-- <div class="row align-items-center col-md-12">

                            <div class="col-md-1 ">
                                <label for="Categoria">Status: </label>
                            </div>
                            <div class="col-md-2"> 
                                {{ Form::select("status", ["" => "Selecione", 'pago' => 'Pago', 'nao-pago' => 'Não Pago', 'cancelado' => 'Cancelado'], '', ["id" => "kt_data_pedido_search_status_query", "class" => "form-control cronicos-select2"]) }}
                            </div>                      
                        </div> --}}
                        <br>
                        <div class="kt-portlet__body">
                            <!--begin: Datatable -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">N° Pedido</th>
                                        <th scope="col">Doador</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Item</th>
                                        <th scope="col">Valor Doação</th>
                                        <th scope="col">Ong</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($itens_doados as $key => $item)
                                        <tr>
                                            <th scope="row">{{ $key }}</th>
                                            <td>{{ $item->pedido->id }}</td>
                                            <td>{{ $item->cliente->name }}</td>
                                            <td>{{ $item->quantidade }}</td>
                                            <td>{{ $item->produto->nome }}</td>
                                            <td>R$: {{ $item->preco_unitario }}</td>
                                            <td>{{ !empty($item->pedido->ong) ? $item->pedido->ong->nome_fantasia : 'Pedido sem doação' }}</td>
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
</style>