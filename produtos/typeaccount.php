<?php 
 include_once("../system/config.php");


 ?>
 
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Faça login ou crie a sua conta! </title> <!-- INFO 1 -->
    <meta name="description" content="<?php echo utf8_encode ($SOBRE_PAGINA)?>"> <!-- INFO 2 -->
    <meta name="author" content="Rafael Ferreira">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- ICONES -->
  <meta name=viewport content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href='../img/logo-topo.png' /> <!-- INFO 3 -->
  <link rel="stylesheet" href="css/style-produtos.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<style>

@media screen and (min-width:320px) {

.container-usuarios{float: left; width: 100%; min-height: 500px;}
.margin-usuarios{
 width: 90%;
 margin: auto;
}
.usuario-container{
 float: left;
 width: 100%;
 background: #fff;
 height: 300px;
 border-radius: 10px;
 margin-top: 40px;
 margin-bottom: 40px;
 box-shadow: 0px 5px 15px 2px rgba(0,0,0,.2);
}

/***/

.texto-usuarios{float: left; width: 100%; text-align: center; margin-top: 20px;}
.texto-usuarios p{
 color: #333;
 font-size: 22px !important;
 font-weight: bold;
 padding: 10px 20px;
 border-radius: 10px;
 text-align: center;
}

/***/
.usuario-iten {
 float: left;
 width: 100%;
 margin: 12px 0;
 text-align: center;
}
.usuario-iten a{ 
 width: 300px;
 padding: 10px 0;
 display: inline-block;
 font-size: 16px !important;
 font-weight: 300;
 border-radius: 5px;
 text-align: center;
}
#registro a{
 font-weight: bold;
 color: #fff;
 background: #014d8f;
 margin-top: 20px;
}
#login a{
 color: #fff;
 background: #2c3e50;
}
#registro a:hover{ background: #014d8fed; }
#login a:hover{ background: #34495e; }

}

/* PARA PC **/
@media screen and (min-width:1025px) {

.margin-usuarios{
 width: 40%;
}
.usuario-iten a{ 
 width: 350px;
}


}

</style>

</head>

<body style="background: #fff;">

<!-- ANALYTICS -->
<?php include('../souce=analytics.php'); ?>

<!-- LOGO -->
<?php include('../tarja-topo.php'); ?>

<!-- MENU -->
<?php include('../menu.php'); ?>

<div class="container-usuarios">
	<div class="margin-usuarios">

		<div class="usuario-container">	

		<div class="texto-usuarios"><p>Você precisa estar logado para fazer um pedido !!</p></div>

			<div class="usuario-iten" id="registro"><a href="/usuario/registro.php">Sou novo</a></div>
			<div class="usuario-iten" id="login"><a href="/usuario/login.php">Já tenho conta</a></div>

		</div>

	</div>
</div>

<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>

</body>

</html>


