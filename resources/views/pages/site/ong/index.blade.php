<!DOCTYPE html>
<html lang="pt-br">
    @include('pages.layout.head')
<body>
    @include('pages.layout.header')

    @include('pages.layout.nav-bar')

    <main>
        <br>
        <br>
    <ul class="ongs row container-fluid text-center">
        <li class="border col-md-6">
            <h2>ONG LOVE ANIMAL</h2>
            <p>Proposito: Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry. Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry.</p>
            <a href="#" class="link_ong">Conheça melhor a ONE LOVE ANIMAL</a>
        </li>

        <li class="border col-md-6">
            <h2>LITTLE DOG</h2>
            <p>Proposito: Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry. Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry.</p>
            <a href="#" class="link_ong">Conheça melhor a LITTLE DOG</a>
        </li>

        <li class="border col-md-6">
            <h2>Fralda para cachorro</h2>
            <p>Proposito: Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry. Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry.</p>
            <a href="#" class="link_ong">Conheça melhor a LITTLE DOG</a>
        </li>

        <li class="border col-md-6">
            <h2>PATAS EM AÇÃO</h2>
            <p>Proposito: Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry. Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry.</p>
            <a href="#" class="link_ong">Conheça melhor a PATAS EM AÇÃO</a>
        </li>

        <li class="border col-md-6">
            <h2>ONG LAMBEIJO</h2>
            <p>Proposito: Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry. Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry.</p>
            <a href="#" class="link_ong">Conheça melhor a ONG LAMBEIJO</a>
        </li>

        <li class="border col-md-6">
            <h2>Pata Cá Pata Lá</h2>
            <p>Proposito: Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry. Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry.</p>
            <a href="#" class="link_ong">Conheça melhor a Pata Cá Pata Lá</a>
        </li>

        <li class="border col-md-6">
            <h2>THE BICHO GANGSTER </h2>
            <p>Proposito: Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry. Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry.</p>
            <a href="#" class="link_ong">Conheça melhor a THE BICHO GANGSTER</a>
        </li>

        <li class="border col-md-6">
            <h2>BICHINHOS ZEN</h2>
            <p>Proposito: Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry. Lorem Ipsum is simply 
                dummy text of the printing and 
                typesetting industry.</p>
            <a href="#" class="link_ong">Conheça melhor a BICHINHOS ZEN</a>
        </li>
    </ul>
    <br>
    <br>
    <br>


    </main>

    @include('pages.layout.footer')
    
</body>
</html>

<style>
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