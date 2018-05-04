<?php include_once("../system/config.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title><?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Nossos Clientes</title>
<meta name="description" content="<?php echo utf8_encode ($carrega_dadosEmpresa['sobre_empresa'])?>">
<meta name="author" content="Rafael Ferreira - Mestre Moveleiro">

<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Nossos Clientes" />
<meta property="og:description" content="<?php echo utf8_encode ($carrega_dadosEmpresa['sobre_empresa'])?>" />
<meta property="og:url" content="http://www.mestremoveleiro.com.br/nossos-clientes">
<meta property="og:site_name" content="<?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?>" />
<meta name="robots" content="index, follow">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Merriweather:300,400" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- ICONES -->
<meta name=viewport content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href='../img/logo-topo.png' /> <!-- INFO 3 -->
<link rel="stylesheet" href="../css/style.css">
<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<style>
</style>

</head>

<body style="background: #e4e4e5;">

<!-- ANALYTICS -->
<?php include('../souce=analytics.php'); ?>

<!-- LOGO -->
<?php include('../tarja-topo.php'); ?>

<!-- MENU -->
<?php include('../menu.php'); ?>


<?php include('clientes.php'); ?>

<!-- CONTATOS LEFT -->
<?php include_once('../souce=contatos-page-left.php'); ?>

<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>

</body>


</html>
