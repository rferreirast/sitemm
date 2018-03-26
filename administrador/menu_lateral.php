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
}

</style>

<div class="menu-lateral">
		
         <div class="menu-itens">

         	<li class="menu-item"><a href="painel_adm.php">Inicio</a></li>
         	<li class="menu-item"><a href="lista_produtos.php">Produtos</a></li>
          <li class="menu-item"><a href="lista_clientes.php">Clientes</a></li>
         	<li class="menu-item"><a href="">Orçamentos</a></li>
         	<li class="menu-item"><a href="galeria_imagens.php">Galeria</a></li>

         </div>

</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$(" a[href='"+location.href.substring(location.href.lastIndexOf("/")+1,255)+"']").addClass("menu-select");
});
</script>