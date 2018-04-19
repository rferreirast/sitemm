<?php 

include_once("../system/config.php");

include_once("system/connect.php");

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

?>

<link rel="stylesheet" href="css/style-usuario.css">
<meta name="robots" content="noindex, nofollow">

<style>
@media screen and (min-width:320px) {
/****** PARA O PC ******/

.container-menuUsuario{
 float: left;
 width: 100%;
 margin-top: 10px;
}
.menuUsuario-itens{
 float: left;
 width: 100%;
 display: inline-block;
}
.menuUsuario-item{
 float: left;
 width: 100%;
 padding: 10px;
}
.menuUsuario-item a{
 color: #333;
 font-size: 16px !important;
 font-weight: 400;
 text-align: left;
 text-decoration: none;
 padding-bottom: 4px;
}

#sair{color: #e74c3c;}
#sair:hover{color: #c0392b; border: none;}

.menuUsuario-item a:hover{color: #014d8f; text-decoration: none; border-bottom: 2px solid #014d8f; }

.menuUsuario-select{color: #01294d !important; text-decoration: none; border-bottom: 2px solid #01294d;}

}

@media screen and (min-width:1025px) {

.container-menuUsuario{
 width: 15%;
 border-right: 1px solid #c4c4c4;
}


}
/****** PARA O PC ******/
@media screen and (min-width:1300px) {

}


</style>


<div class="container-menuUsuario">
	
	<div class="menuUsuario-itens">
		
	  <div class="menuUsuario-item"><a href="minha-conta">Minha conta</a></div>
	  <div class="menuUsuario-item"><a href="meus-pedidos">Meus pedidos</a></div>
	  <div class="menuUsuario-item"><a href="alterar-senha">Alterar Senha</a></div>
	  <div class="menuUsuario-item"><a href="meus-dados">Meus dados</a></div>
	  <div class="menuUsuario-item"><a href="meu-endereco">Meu endereco</a></div>
	  <div class="menuUsuario-item"><a href="/usuario/logout" id="sair">Sair</a></div>

	</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$(" a[href='"+location.href.substring(location.href.lastIndexOf("/")+1,255)+"']").addClass("menuUsuario-select");
});
</script>

</div>