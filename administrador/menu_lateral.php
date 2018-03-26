<?php 

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

 ?>
<style>

.menu-lateral{
 display: flex;
 flex-direction: column;
 width: 20%;
 background-color: #222222;
 transition: width 0.25s linear;
}

.menu-itens{
 float: left;
}
li{
 list-style: none;	
}
.menu-item a{
 width: 100%;
 float: left;
 font-size: 16px;
 color: #b2b2b2;
 padding: 18px 15px;
 border-bottom: 1px solid rgba(255, 255, 255, 0.04);
 text-decoration: none;
}
.menu-item a:hover{
  background: #0c385e;
  color: #fff;
}

.menu-select{
 background: #092a47;
 color: #fff !important;
}
#icones-menu{
 font-size: 20px;
 margin-right: 5px;
}


</style>

<div class="menu-lateral">
		
         <div class="menu-itens">

         	<li class="menu-item"><a href="painel_adm.php"><i class="fas fa-home" id="icones-menu"></i>Inicio</a></li>
          <li class="menu-item"><a href=""><i class="fas fa-file-alt" id="icones-menu"></i>Pedidos</a></li>
         	<li class="menu-item"><a href="lista_produtos.php"><i class="fas fa-cubes" id="icones-menu"></i> Produtos</a></li>
          <li class="menu-item"><a href="lista_clientes.php"><i class="far fa-address-book" id="icones-menu"></i>Foto Clientes</a></li>
         	<li class="menu-item"><a href="lista_newsletter.php"><i class="far fa-envelope-open" id="icones-menu"></i>Newsletter</a></li>
         	<li class="menu-item"><a href="galeria_imagens.php"><i class="fas fa-images" id="icones-menu"></i>Galeria</a></li>

         </div>

</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$(" a[href='"+location.href.substring(location.href.lastIndexOf("/")+1,255)+"']").addClass("menu-select");
});
</script>