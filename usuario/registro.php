<?php

include_once("../system/config.php");

include_once("system/cadastra_cliente.php");

?>
 
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title><?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Crie a sua conta</title>
<meta name="author" content="Rafael Ferreira - Mestre Moveleiro">

<meta name="author" content="Rafael Ferreira">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- ICONES -->
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href='../img/logo-topo.png' /> <!-- INFO 3 -->
<link rel="stylesheet" href="css/style-usuarios.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<meta name="robots" content="noindex, nofollow">

<style>
@media screen and (min-width:320px) {

.container-registrar{float: left; width: 100%; min-height: 520px;}
.margin-registrar{
 width: 90%;
 margin: auto;
}

.formulario-registro{
 float: left;
 width: 100%;
 background: #fff;
 min-height: 250px;
 border-radius: 10px;
 margin-top: 80px;
 margin-bottom: 40px;
 border: 1px solid #c4c4c4;
 padding: 20px 20px;
}

.form_item{ float: left;width: 100%; text-align: center; margin-bottom: 10px; }

.texto-usuarios p{
 color: #333;
 font-size: 22px !important;
 font-weight: 400;
 padding: 10px 20px;
 border-radius: 10px;
 text-align: center;
}

input.compo_form{
 font-size: 15px;
 color: #343434;
 background-color: #fff;
 box-sizing: border-box;
 height: 32px;
 padding: 0px 0.4em;
 width: 250px;
 margin-left: 10px;
 border: 0;
 border-bottom: 1px solid #c4c4c4 !important;
}
input.compo_form:focus{ border-bottom: 3px solid #014d8f !important;}

input.button_criar{
 float: right;
 text-align: right;
 padding: 8px 20px;
 background: #014d8f;
 color: #fff;
 border-radius: 5px;
 margin-top: 25px;
 text-decoration: none;
 margin-left: 10px;
}


}

/* PARA PC **/
@media screen and (min-width:1025px) {

.margin-registrar{
 width: 30%;
}

input.compo_form{
 max-width: 300px;
}

}

/****** PARA O PC ******/
@media screen and (min-width:1300px) {

input.compo_form{
 min-width: 350px; 
 max-width: 400px;
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

<div class="container-registrar">
  <div class="margin-registrar">
    
    <div class="formulario-registro">

    <div class="texto-usuarios"><p>Crie a sua conta</p></div>
      
      <form method="POST">

        <div class="form_item"><input type="text" placeholder="Nome" autofocus="" required="" class="compo_form" name="nome" selected></div>
        <div class="form_item"><input type="email" placeholder="Email" required="" class="compo_form" name="email"></div>
        <div class="form_item"><input type="password" placeholder="Senha" required="" class="compo_form" name="senha"></div>
        <input type="submit" class="button_criar" value="Criar conta" name="create_account">

      </form>


    </div>


  </div>
</div>

<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>

</body>



</html>


