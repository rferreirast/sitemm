<?php include_once("system/config.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title><?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Contato</title>
<meta name="description" content="<?php echo utf8_encode ($carrega_dadosEmpresa['sobre_empresa'])?>">
<meta name="author" content="Rafael Ferreira - Mestre Moveleiro">

<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Contato" />
<meta property="og:description" content="<?php echo utf8_encode ($carrega_dadosEmpresa['sobre_empresa'])?>" />
<meta property="og:url" content="http://www.mestremoveleiro.com.br/contato">
<meta property="og:site_name" content="<?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?>" />
<meta property="og:region" content="SP" />
<meta property="og:phone_number" content=" <?php echo utf8_encode ($carrega_dadosEmpresa['telefone'])?>" />
<meta name="robots" content="index, follow">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<meta name=viewport content="width=device-width, initial-scale=1">

<link rel="shortcut icon" href='img/logo-topo.png' />
<link rel="stylesheet" href="css/style.css">

 <link rel="stylesheet" href="produtos/css/style-produtos.css">

<link rel="stylesheet" href="css/style.css">
<style>
@media screen and (min-width:320px) {
.content-formulario-contato{
 float: left;
 width: 100%;
 padding-top: 50px;
 padding-bottom: 80px;
}
.formulario-contato{
 width: 100%;
 margin: auto;	
 padding: 0 20px;
}
.dados-formulario{
 padding-top: 20px;
 padding-bottom: 20px;
 text-align: center;
}
.inscreverse-info{
 text-align: center;
}

/***/
input.campo-form{
 font-size: 15px;
 border: 1px solid #ABB0B2;
 -webkit-border-radius: 3px;
 -moz-border-radius: 3px;
 border-radius: 3px;
 color: #343434;
 background-color: #fff;
 box-sizing: border-box;
 height: 32px;
 padding: 0px 0.4em;
 display: inline-block;
 margin: 0;
 width: 100%;
 vertical-align: top;
 margin-bottom: 5px;
 border: 1px solid #c4c4c4 !important;
}
.button-enviar{
 background: #014d8f !important;
 color: #fff !important;
 font-size: 18px !important;
 font-weight: bold !important;
 border: none;
 -webkit-border-radius: 3px;
 -moz-border-radius: 3px;
 border-radius: 3px;
 letter-spacing: .03em;
 box-sizing: border-box;
 height: 32px;
 line-height: 32px;
 padding: 0 18px;
 display: inline-block;
 margin: 0;
 cursor: pointer;
 width: 100%;
 transition: all 0.23s ease-in-out 0s;
}
textarea.mensagem{
 font-size: 15px;
 border: 1px solid #ABB0B2;
 -webkit-border-radius: 3px;
 -moz-border-radius: 3px;
 border-radius: 3px;
 color: #343434;
 background-color: #fff;
 box-sizing: border-box;
 height: 32px;
 padding: 0px 0.4em;
 display: inline-block;
 margin: 0;
 min-width: 100%;
 max-width: 100%;
 height: 150px;
 vertical-align: top;
 margin-bottom: 10px;
 border: 1px solid #c4c4c4 !important;
 padding-top: 10px; 
}

}
/****** PARA O PC ******/

@media screen and (min-width:992px) {
.formulario-contato{
 width: 80%;
 float: left;
}
input.email-dados-formulario{
 width: 500px;
 height: 45px ;
}
.button-enviar{
 width: 25%;
 float: right;
 height: 45px;
}

}
	
</style>

</head>

<body>

<div class="background" >

<!-- LOGO -->
<?php include('tarja-topo.php'); ?>

<!-- MENU -->
<?php include('menu.php'); ?>

<!-- Analytics -->
<?php include_once('souce=analytics.php'); ?>

<div class="content-formulario-contato">
 <div class="container-site">

    <div class="titulo-container-produtos" style="width: 100%; float: left;"><p style="font-size: 28px !important; color: #666666; margin-left: 20px;">Entre em contato</p></div>

    <div class="formulario-contato">			  

    <form method="post">

    <input type="text" class="campo-form" placeholder="Insira seu Nome..." required="" name="nome">
    <input type="text" class="campo-form" placeholder="Insira seu e-mail..." required="" name="email">
    <input type="text" class="campo-form" placeholder="Insira seu telefone..." required="" name="telefone">
    <textarea class="campo-form mensagem" rows="6" placeholder="Insira sua mensagem..." name="mensagem" ></textarea>
    <input type="submit" value="Enviar" class="button-enviar" name="enviar">

    </form>

    </div>

    <style>
    .dados-contato{float: left; width: 100%; margin-left: 20px;}
    .dados-contato p{color: #555; font-size: 18px !important; margin-bottom: 10px;}
    </style>

    <div class="dados-contato">
     <h2 style="color: #444; font-size: 22px !important; font-weight: bold; margin-bottom: 10px;">ATENDIMENTO</h2>
     <p><i class="fas fa-phone"></i> (19) 3818-8942</p>  
     <p><i class="fab fa-whatsapp"></i> (19) 3818-8942</p>
     <p><i class="fas fa-envelope-open"></i> contato@mestremoveleiro.com.br</p>
     <p><i class="fas fa-clock"></i> Segunda à sexta 08h às 18h</p>
    </div>

   </div>

    <?php require 'system/envio_form_contato.php'; ?>

 </div>


</div>

<!-- CONTATOS LEFT -->
<?php include_once('souce=contatos-page-left.php'); ?>
<!-- RODAPE -->
<?php include('souce=rodape.php'); ?>

</body>

</html>
