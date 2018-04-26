<?php

include_once("../../system/config.php");

include_once("../system/valida_login.php");

if (isset($_POST['mudarSenha'])) {
$emailChange = utf8_encode($_POST['email']);


//VERIFICA SE O EMAIL EXISTE NO BANCO DE DADOS
$consultaEmail = mysqli_query($conn, "SELECT * FROM loja_clientes WHERE email = '$emailChange' ") or print mysql_error();   

if(mysqli_num_rows($consultaEmail) == FALSE)

   $emailInvalido = 'Usuário não encontrado';

else {

	//GERA CHAVE DE SEGURANCA NO BD PARA ALTERACAO QUE SERA ENVIADA POR EMAIL
	$chave = md5(time());

	$chaveAlteracao = $chave;

	$salvaChave = "UPDATE loja_clientes SET `chave_alteracao`='$chaveAlteracao' WHERE email = '$emailChange' ";

	if ($conn->query($salvaChave) === TRUE) {

	//ENVIA EMAIL

  include_once('../system/mail_changeSenha.php');

  $verifiqueEmail = '<span id="verifiqueEmail"><p>Enviamos as orientações para criar a nova senha ao seu e-mail ! (verifique também a sua lixeira ou spam)</p></span>';

  //header para atualizar a pagina /esqueci-senha

  unset($salvaChave);

	}

	else{

		echo '<script>alert("Algo deu errado, tente novamente !!");</script>';

    }    
    
    }

}

?>
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name=viewport content="width=device-width, initial-scale=1">

<title><?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Esqueci minha Senha</title> <!-- INFO 1 -->
<meta name="author" content="Rafael Ferreira - Mestre Moveleiro">

<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- ICONES -->

<link rel="shortcut icon" href='../../img/logo-topo.png' /> <!-- INFO 3 -->
<link rel="stylesheet" href="../css/style-produtos.css">
<link rel="stylesheet" href="../../css/style.css">

<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<meta name="robots" content="noindex, nofollow">

<style>
@media screen and (min-width:320px) {

.container-mudarSenha{float: left; width: 100%; min-height: 550px;}
.margin-mudarSenha{
 width: 90%;
 margin: auto;
}
.formulario-mudarSenha{
 float: left;
 width: 100%;
 background: #fff;
 min-height: 250px;
 border-radius: 10px;
 margin-top: 80px;
 margin-bottom: 40px;
 border: 1px solid #c4c4c4;
 padding: 20px 20px;
 text-align: center;
}
.form_item{ float: left;width: 100%; text-align: center; margin-bottom: 20px; }

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

span.#emailInvalido{float: left; width: 100%; text-align: left;}
#emailInvalido p{
 color: #e74c3c;
 font-size: 15px !important;
 font-weight: 300;
 margin-bottom: 20px;
}

span.#verifiqueEmail{float: left; width: 100%; text-align: left;}
#verifiqueEmail p{
 color: #27ae60;
 font-size: 15px !important;
 font-weight: 300;
 margin-bottom: 20px;
 padding: 10px 0;
 background: #e4e3e3;
 font-weight: bold;
 padding: 5px;
}


input.button_esqueciSenha{
 max-width: 250px;
 text-align: center;
 padding: 8px 20px;
 background: #014d8f;
 color: #fff;
 border-radius: 5px;
 text-decoration: none;
 margin-left: 10px;
 cursor: pointer;
 font-weight: bold;
}
input.button_esqueciSenha:hover{background: #03335e;}

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

.margin-mudarSenha{
 width: 30%;
}

input.compo_form{
 max-width: 300px;
}

input.button_esqueciSenha{
 max-width: 300px;
}

}

/****** PARA O PC ******/
@media screen and (min-width:1300px) {

input.button_esqueciSenha{
 min-width: 350px;
 max-width: 400px;
}

input.compo_form{
 min-width: 350px; 
 max-width: 400px;
}

}



</style>

</head>

<body style="background: #fff;">

<!-- ANALYTICS -->
<?php include('../../souce=analytics.php'); ?>

<!-- LOGO -->
<?php include('../../tarja-topo.php'); ?>

<!-- MENU -->
<?php include('../../menu.php'); ?>

<div class="container-mudarSenha">
  <div class="margin-mudarSenha">
    
    <div class="formulario-mudarSenha">

    <div class="texto-usuarios"><p>Informe o seu e-mail</p></div>
      
      <form method="POST">

      	<p style="font-size: 16px !important; color: #333; text-align: center; margin-bottom: 20px;">Insira o seu e-mail abaixo para recuperar a sua senha.</p>      	

        <?php error_reporting(0); echo $verifiqueEmail; ?>

        <span id="emailInvalido"><p><?php error_reporting(0); echo $emailInvalido; ?></p></span>

        <div class="form_item"><input type="email" placeholder="Email" required="" autofocus class="compo_form" name="email" selected></div>
        
        <input type="submit" class="button_esqueciSenha" value="Recuperar Minha Senha" name="mudarSenha">

      </form>


    </div>

  </div>
</div>

<!-- RODAPE -->
<?php include('../../souce=rodape.php'); ?>

</body>

</html>

