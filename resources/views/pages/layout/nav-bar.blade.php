<ul class="header_navbar">
    <li class="nav-item">
      <a class="nav-link active" href="/">Home</a>
    </li>
    <div class="divisor_nav"></div>
    <li class="nav-item">
      <a class="nav-link" href="/produtos">Produtos</a>
    </li>
    <div class="divisor_nav"></div>
    <li class="nav-item">
        <a class="nav-link" href="/ongs">ONGs</a>
    </li>
    <div class="divisor_nav"></div>
    <li class="nav-item">
      <a class="nav-link" href="/ongs/cadastro">Quero ser uma ONG parceira</a>
  </li>
</ul>

<nav class="menu-lateral">
  <a href="/" class="menu-lateral_link menu-lateral_link--ativo">Home</a>
  <a href="/produtos" class="menu-lateral_link menu-lateral_link--ativo_2">Produtos</a>
  <a href="/ongs" class="menu-lateral_link menu-lateral_link--ativo">ONGs</a>
  <a href="/ongs/cadastro" class="menu-lateral_link menu-lateral_link--ativo_2">Quero ser uma ONG parceira</a>
</nav>



<style>
      .header_navbar {
          list-style:none;  
      }

      .nav-item{
        padding: 10px 100px;
      }

      .header_navbar{
        display: flex;
        justify-content: center; 
        padding: 0;
        flex-wrap: wrap;
      }

      @media screen and (max-width: 768px) {
        .header_navbar{
        display: none;
      }
        
      }

      .divisor_nav{
        margin: 1rem 1rem;
        background-color: black;
        width: 1px;
        opacity: 0.5;
      }
      
      .menu-lateral_icone{
        height:5vw;
      }

      .menu-lateral{
        display: none;
        
      }

      @media screen and (max-width: 768px) {
      .menu-lateral{
        display: flex;
        flex-direction:column;
        background-color: rgba(255,219,153, 0.95);
        width: 52vw;
        height: 20vh;
        border-radius: 0 0 10px;

        position: absolute;
        left: -100vw;
        transition: .25s;
    }


      .menu-lateral--ativo{
        left: 0;
        transition: .25s;
      }

      .menu-lateral_link{
        text-decoration: none;
        height:40px;
        color: #333333;
        padding-left: 24px;
        display: flex;
        align-items: center;
        
      }

      .menu-lateral_link:hover{
      color: #333333;
      }

      .menu-lateral_link--ativo{
        border-left: 6px solid #F6E266;
      }

      .menu-lateral_link--ativo_2{
        border-left: 6px solid #ffffff;
      }

      .menu-lateral_link::before{
        width: 24px;
        height: 24px;
        font-size: 24px;
        position: absolute;
        left: 24px;
      }

</style>

<script>
  const botaoMenu = document.querySelector('.cabecalho__menu')
  const menu = document.querySelector('.menu-lateral')

  botaoMenu.addEventListener('click', () =>{
    menu.classList.toggle('menu-lateral--ativo')
  })
</script>