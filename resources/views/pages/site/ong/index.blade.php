<!DOCTYPE html>
<html lang="pt-br">
    @include('pages.layout.head')
<body>
    @include('pages.layout.header')

    @include('pages.layout.nav-bar')

    <main>
        <div class="breadcrumb">
			<a href="/" class="link_breadcrumb">
			Home
			</a>
			> 
			<a href="/ongs" class="link_breadcrumb">
			<b>ONG's</b>
			</a>
		</div>

    <ul class="ongs row container-fluid text-center">

        @if(!empty($ongs))
            @foreach($ongs as $ong)

                <li class="border col-md-6">
                    <h2>{{ $ong->nome_fantasia}}</h2>
                    <p>Proposito: Lorem Ipsum is simply 
                        dummy text of the printing and 
                        typesetting industry. Lorem Ipsum is simply 
                        dummy text of the printing and 
                        typesetting industry.</p>
                    <a href="#" class="link_ong">Conheça melhor a ONE LOVE ANIMAL</a>
                </li>
            @endforeach()

        @endif()
    </ul>
    <br>
    <br>
    <br>


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
        padding: 0 0 0 100px;   
        margin:0;   

    }

    /* Display list items side by side */
    .link_breadcrumb{
        text-decoration: none;
        color: rgb(102, 102, 105);
        padding: 20px;
    }

    /*---------Sobre ONG's--------*/
    /* link visitado */
    .link_breadcrumb a:visited {
        color: rgb(39, 0, 146);
    }

    .ongs{
        width: 90%;
        display: flex;
        justify-content: space-around; 
        margin: 0 5%;
    }

    li {
    list-style-type: none;
    }

    .border{
        padding:30px;
    }

</style>