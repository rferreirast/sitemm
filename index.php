<?php include_once 'dados/page_dados.php'; ?>
<?php include_once 'produtos/dados/dados_produtos.php'; ?>
<?php include_once 'clientes/dados/dados_clientes.php'; ?>
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title><?php echo utf8_encode ($TITULO_PAGINA)?></title> <!-- INFO 1 -->
    <meta name="description" content="<?php echo utf8_encode ($SOBRE_PAGINA)?>"> <!-- INFO 2 -->
    <meta name="author" content="Start Page - Rafael Ferreira">
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
  <link rel="shortcut icon" href='../../img/logo-topo.png' /> <!-- INFO 3 -->
  <link rel="stylesheet" href="css/style.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

</head>

<body>

<div class="background" >


<!-- LOGO -->
<?php include('souce=cabecalho.php'); ?>

<!-- Analytics -->
<?php include_once('souce=analytics.php'); ?>

<!-- Produtos destaque -->
<?php include('souce=produtos-destaques.php'); ?>

<!-- Produtos destaque -->
<?php include('souce=clientes-destaques.php'); ?>


<!-- CONTATOS LEFT -->
<?php include_once('souce=contatos-page-left.php'); ?>

</div>

<!-- RODAPE -->
<?php include('souce=rodape.php'); ?>

</body>

</html>
