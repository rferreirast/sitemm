<?php 

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre moveleiro | Cadastrar produto</title> <!-- INFO 1 -->
  <meta name="author" content="Rafael Ferreira">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- ICONES -->
  <meta name=viewport content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href='../img/logo-topo.png' /> <!-- INFO 3 -->
  <link rel="stylesheet" href="css/style-painel_adm.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<style>

.container-editar-produto{
 float: left;
 width: 100%;
 border: 1px solid #c4c4c4;
 margin-bottom: 50px;
}
.titulo-container-produto h2{
 font-size: 20px;
 color: #014d8f;
 padding-bottom: 20px;
}

.container-galeria-imagens{
 float: left;
 width: 100%;	
}
.gi-itens{
 float: left;
 width: 100%;
  padding: 0 10px;	
}
.gi-item-border{
 float: left;
 width: 25%;
 padding: 0 10px;
 margin-bottom: 20px;
}
.gi-item{
 float: left;
 width: 100%;
 height: 300px;
 background: #000;
}

</style>

</head>

<?php include('tarja_topo.php') ?>

<div class="container-area-administrador">

<!-- MENU LATERAL -->
<?php include('menu_lateral.php'); ?>


<div class="conteudo-principal"> 
	<div class="container-conteudo">

    <div class="titulo-categotia-adm"><h2>Galeria de imagens</h2></div>

  <div class="container-galeria-imagens">
  	
  	<div class="gi-itens">

  		<div class="gi-item-border"><div class="gi-item"><img src="" alt=""></div></div>

  		<div class="gi-item-border"><div class="gi-item"><img src="" alt=""></div></div>

  		<div class="gi-item-border"><div class="gi-item"><img src="" alt=""></div></div>

  		<div class="gi-item-border"><div class="gi-item"><img src="" alt=""></div></div>

  		<div class="gi-item-border"><div class="gi-item"><img src="" alt=""></div></div>

  		<div class="gi-item-border"><div class="gi-item"><img src="" alt=""></div></div>

  	</div>


  </div>

    

</div>

</div>

</body>

</html>
