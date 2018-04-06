<?php 

if (isset($_POST['fazer_busca'])) {
$pesquisar_produtos = $_POST["pesquisar_produtos"];
 
 //header("Location: /produtos/busca.php?produto=$pesquisar_produtos");
echo" <script>document.location.href='/produtos/busca.php?produto=$pesquisar_produtos'</script>";
}

?>
<style>
@media screen and (min-width:320px) {
.content-topo-tarja{
 float: left;
 width: 100%;
 padding-top: 20px;
 padding-bottom: 20px;
 background: #014d8f;
}
.logo{
 float: left;
 width: 25%;
 margin-right: 10px;
}
.img-logo{
 float: left;
 width: 100%;
 text-align: center;
}
.img-logo img{
 max-width: 150px;
}

/*=====================*/
.container-pesquisa{
 float: left;
 width: 55%;
 text-align: left;
 margin-top: 6px;
}
 input.campo-form{
 font-size: 16px;
 border-radius: 3px;
 color: #343434;
 background-color: #fff;
 box-sizing: border-box;
 height: 30px;
 padding: 0px 0.4em;
 width: 170px;
 margin-left: 0px;
 margin-top: 0px;
}
input.button-buscar{
 width: 30px !important;
 margin: 5px -15px 0px;
}

/************ MENU MOBILE ************/
.menu-container{
  display: none;  
}
.menu-mobile-postagens{
 float: left;
 width: 100%;
 background: #121212;
 padding-top: 6px;
 padding-bottom: 6px;
}
.logo-menu-postagens{
 display: none;
}
.menu-mobile{
 display: block;
 width: auto;
 float: right;
}
.item-mobile{
 float: right;
 width: 30px;
}
.item-mobile label{
 color: #fff;
 font-size: 20px;
 font-weight: bold;
 display: block;
 padding: 10px;
}
.item-mobile ul{
 width: 230px;
 list-style: none;
 overflow: hidden;
 max-height: 0;
 transition: all .4s linear;
 padding: 0;
 margin: 0;
 position: absolute;
 transform: translateX(-65%); 
}
.item-mobile a{
 width: 100%;
 float: right;
 color: #fff;
 font-size: 18px;
 padding: 10px;
 text-decoration: none;
}
.item-mobile input{
 display: none;
}
.item-mobile input:checked ~ ul{
 width: 200px;
 height: auto;
 background: #333;
 max-height: 500px;
 transform: all;
 padding: 0;
 margin: 0;
}

}
/****** PARA O PC ******/

@media screen and (min-width:1025px) {
.content-topo-tarja{
 padding-top: 5px;
 padding-bottom: 5px;
}
.logo{
 float: left;
 width: 10%;
 margin-left: 15px;
 text-align: left;
}
.img-logo{
 max-width: 100px;
}
.img-logo img{

}

/*====================*/
.container-pesquisa{
 float: left;
 width: 80%;
 text-align: left;
 margin-top: 0;
}
input.button-buscar{
 margin: -25px;
}
 input.campo-form{
 width: 600px;
 height: 35px;
 margin-top: 10px;
}

}
</style>

<div class="content-topo-tarja">
 <div class="container-site">

<div class="cabecalho-topo-logo-menu" style="width: 100%; float: left;">

 <div class="logo"><div class="img-logo"><a href="/"><img src="http://www.mestremoveleiro.com.br/produtos/img/logo.png" alt=""></a></div></div> 

 <div class="container-pesquisa">
   
      <form method="post">

         <input type="text" class="campo-form" placeholder="Buscar Produtos..." name="pesquisar_produtos">
         <input type="submit" value="⌕" class="campo-form button-buscar" name="fazer_busca">

      </form>


 </div>

 <!-- MENU MOBILE -->

<div class="menu-mobile">

      <nav>
  
    <div class="item-mobile">
      <input type="checkbox" id="check1">
      <label for="check1"><span class="icon fa fa-align-justify"></span></label>
      <ul>

       <li><a class="item-mobile" href="/">inicio</a></li>
       
       <li><a class="item-mobile" href="/produtos">produtos</a></li>

       <li><a class="item-mobile" href="/clientes">clientes</a></li>       
       <li><a class="item-mobile" href="/contato">contato</a></li>
        
      </ul>
    </div>         

        </nav>

</div>




</div>

</div>
</div>