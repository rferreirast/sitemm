<?php

include_once("../system/config.php");

include_once("system/valida_login.php");

?>

 
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name=viewport content="width=device-width, initial-scale=1">

<title><?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Informe os seus dados</title> <!-- INFO 1 -->
<meta name="author" content="Rafael Ferreira - Mestre Moveleiro">

<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- ICONES -->

<link rel="shortcut icon" href='../img/logo-topo.png' /> <!-- INFO 3 -->
<link rel="stylesheet" href="css/style-produtos.css">
<link rel="stylesheet" href="../css/style.css">

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<meta name="robots" content="noindex, nofollow">

<style>
@media screen and (min-width:320px) {

.container-login{float: left; width: 100%; min-height: 500px;}
.margin-login{
 width: 90%;
 margin: auto;
}
.formulario-login{
 float: left;
 width: 100%;
 background: #fff;
 min-height: 250px;
 border-radius: 10px;
 margin-top: 40px;
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

span.#dadosIncorretos{float: left; width: 100%; text-align: left;}
#dadosIncorretos p{
 color: #e74c3c;
 font-size: 15px !important;
 font-weight: 300;
 margin-left: 10px;
}

input.button_login{
 float: right;
 text-align: right;
 padding: 8px 20px;
 background: #014d8f;
 color: #fff;
 border-radius: 5px;
 text-decoration: none;
 margin-left: 10px;
}

.forget-senha{ float: left; width: 100%; margin-top: 10px;}

a.forget-senha{
 color: #666;
 font-size: 16px !important;
 font-weight: normal;
 text-align: center;
}
a.forget-senha:hover{ color: #014d8f;}

}

/* PARA PC **/
@media screen and (min-width:1025px) {

.margin-login{
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

<div class="container-login">
  <div class="margin-login">
    
    <div class="formulario-login">

    <div class="texto-usuarios"><p>Informe os seus dados</p></div>
      
      <form method="POST">

        <div class="form_item"><input type="email" placeholder="Email" required="" autofocus class="compo_form" name="email" selected></div>
        <div class="form_item"><input type="password" placeholder="Senha" required="" class="compo_form" name="senha"></div>
        <span id="dadosIncorretos"><p><?php error_reporting(0); echo $dadosIncorretos; ?></p></span>
        <input type="submit" class="button_login" value="Entrar" name="entrar">

        <a href="#" class="forget-senha">Esqueci a minha senha</a>

      </form>


    </div>


  </div>
</div>

<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>

</body>

</html>


