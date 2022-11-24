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

                <li class="border rounded col-md-6">
                    <h2>{{ $ong->nome_fantasia}}</h2>
                    <p>Somos uma entidade sem fins lucrativos com um unico objetivo, promover ações caridosas com animais se necessitam de cuidados, resgatamos animais abandonados e ciodamos com muito amor e carinho.</p>
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