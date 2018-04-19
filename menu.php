<?php 

include_once("system/config.php");

//CARREGA CATEGORIAS 
 $pesquisa_categoria = "SELECT * FROM categorias";
 $resultado_categorias = mysqli_query($conn, $pesquisa_categoria);


if (isset($_SESSION['sessao_usuario'])) {

   $menu1 = '

   <style>
/*MENU DROP*/

.dropd {
 float: left;
 display: inline-block;
}
.dropbtn {
 color: #fff;
 font-size: 15px;
 padding: 5px 15px;
 font-weight: bold;
 cursor: pointer;
 background: none;
}

.drop-minhaConta {
 display: none;
 position: absolute;
 background-color: #fff;
 min-width: 100px;
 border-radius: 5px;
 padding: 20px 0;
 margin-left: 0px;
 z-index: 999;
}

.drop-minhaConta a {
 color: black;
 color: #151515;
 font-weight: bold;
 padding: 12px 16px;
 text-decoration: none;
 display: block;
}

.drop-minhaConta a:hover {color: #014d8f; background-color: #fff;}

.dropd:hover .drop-minhaConta {
    display: block;
}

.dropd:hover .dropbtn {
}

#icon-drop{
 color: #dbdbdb;
 font-size: 12px;
 margin-left: 5px;  
}

</style>

   <div class="dropd">
      <button class="dropbtn" id="border-left">Minha conta <span class="icon fas fa-angle-down" id="icon-drop"></span></button>
      <div class="drop-minhaConta">
        <a href="/usuario/meus-pedidos">Meus pedidos</a>
        <a href="/usuario/meus-dados">Meus dados</a>
        <a href="/usuario/meu-endereco">Meu endereço</a>
        <a href="/usuario/logout" style="color: #e74c3c;">Sair</a>

      </div>
    </div>

   ';
   $menu2 = '<a class="item-menu-usuarios" href="/usuario/meus-pedidos" id="border-left">Meus pedidos</a>';

   }else{    
    $menu1 = '<a class="item-menu-usuarios" href="/usuario/registro" id="border-left">Cadastre-se</a>';
    $menu2 = '<a class="item-menu-usuarios" href="/usuario/login" id="border-left">Entrar</a>';
   }

?>
<style>
@media screen and (min-width:320px) {
.content-topo-menu{
 display: none;
}


}
/****** PARA O PC ******/

@media screen and (min-width:1025px) {
.content-topo-menu{
 display: block;
 float: left;
 width: 100%;
 padding-top: 5px;
 padding-bottom: 5px;
 background: #044883;
 background: #03335e;
}

/************ MENU ************/
.menu-mobile{
 display: none;	
}
.menu-container{
 display: block;
 float: left;
 width: 100%;
}
.itens-menu-container{
 float: left;
 width: 70%;
}
li{
 float: left;
 list-style: none;
}
.item-menu-container{
 float: left;
 color: #fff;
 font-size: 15px;
 padding: 5px 15px;
 font-weight: bold;
 cursor: pointer;
 background: none;
}
.item-menu-container:hover{
 color: #fff;
}

/*MENU DROP*/

.dropdown {
 float: left;
 display: inline-block;
}
.dropbtn {
 color: #fff;
 font-size: 15px;
 padding: 5px 15px;
 font-weight: bold;
 cursor: pointer;
 background: none;
}

.dropdown-content {
 display: none;
 position: absolute;
 background-color: #333;
 min-width: 150px;
 border-radius: 5px;
 padding: 20px 0;
 margin-left: 0px;
 z-index: 999;
}

.dropdown-content a {
 color: black;
 color: #fff;
 padding: 12px 16px;
 text-decoration: none;
 display: block;
}

.dropdown-content a:hover {background-color: #ffc11e;}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
}

#icon{
 color: #dbdbdb;
 font-size: 12px;
 margin-left: 5px;  
}

#icon-sacola{
 color: #fff;
 font-size: 15px; 
 margin-top: 5px;
}
/*=========================================*/

.menu-usuario{ 
 display: block;
 float: left;
 width: 30%;
}
.menu-usuarios{
 float: right;
}
.item-menu-usuarios{
 float: left;
 color: #fff;
 font-size: 15px;
 padding: 5px 12px;
 font-weight: bold;
 cursor: pointer;
 background: none;
 text-align: right;
}
.item-menu-usuarios:hover{
 color: #fff;
}

#border-left{ border-right: 1px solid #c4c4c4; }

}

</style>

<div class="content-topo-menu">
 <div class="container-site">

<div class="container-menu" style="width: 100%; float: left;">

<!-- MENU DESKTOP -->

<div class="menu-container">
    
  <div class="itens-menu-container">

    <div class="dropdown">
      <button class="dropbtn">Produtos <span class="icon fas fa-angle-down" id="icon"></span></button>
      <div class="dropdown-content">
        <a href="/produtos">Todos</a>

        <?php while($carregar_categorias = mysqli_fetch_assoc($resultado_categorias)){ ?>

        <a href="/produtos/pesquisa?categoria=<?php echo utf8_encode ($carregar_categorias["categoria"]); ?>"><?php echo utf8_encode ($carregar_categorias["categoria"]); ?></a>
              
        <?php } ?>  

      </div>
    </div>

    <li><a class="item-menu-container" href="#">Novidades</a></li>
    <li><a class="item-menu-container" href="#">Destaques</a></li>
    <li><a class="item-menu-container" href="#">Em promoção</a></li>
    <li><a class="item-menu-container" href="/clientes">Nossos Clientes</a></li>


  </div>

<!-- MENU USUARIO -->

<div class="menu-usuario">
  
   <div class="menu-usuarios">

      <li><?php echo $menu1 ?></li>
      <li><?php echo $menu2 ?></li>
      <!--<li><a class="item-menu-usuarios" href="#" id="border-left">Contato</a></li>-->
      <li><a class="item-menu-usuarios" href="/produtos/itens-pedido"><i class="fas fa-shopping-cart" id="icon-sacola"></i></a></li>
     
   </div>
  

</div>

</div>


</div>

</div>
</div>