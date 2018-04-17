<?php 

include_once("../system/config.php");

if (!isset($_SESSION)){session_start();}

$link_post = $_GET['p'];

$busca_post = "SELECT * FROM blog_postagens WHERE link = '$link_post'";
$resultado_post = mysqli_query($conn, $busca_post);
$carregar_post = mysqli_fetch_assoc($resultado_post);

?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name=viewport content="width=device-width, initial-scale=1">

<title><?php echo utf8_encode ($carregar_post["post_titulo"])?> - Mestre Moveleiro</title> <!-- INFO 1 <--></-->
<meta name="description" content="<?php echo utf8_encode ($carregar_post["post_descricao"])?>"> <!-- INFO 2 -->
<meta name="author" content="Rafael Ferreira - Mestre Moveleiro">
<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo utf8_encode ($carregar_post["post_titulo"])?>" />
<meta property="og:description" content="<?php echo utf8_encode ($carregar_post["post_descricao"])?>" />
<meta property="og:url" content="http://www.mestremoveleiro.com.br/<?php echo utf8_encode ($carregar_post["link"])?>" />
<meta property="og:site_name" content="Mestre Moveleiro" />
<meta property="article:published_time" content="<?php echo utf8_encode ($carregar_post["data_postagem"])?>" />
<meta property="article:modified_time" content="<?php echo utf8_encode ($carregar_post["data_modificacao"])?>" />
<meta property="og:image" content="https://www.conversion.com.br/blog/img-postagens/<?php echo utf8_encode ($carregar_post["imagem_postagem"])?>" />

<meta name="keywords" content="<?php echo utf8_encode ($carregar_post["keywords"])?>">
<meta name="robots" content="index, follow">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- ICONES -->

<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="css/style-blog.css">
<link rel="shortcut icon" href='../img/logo-topo.png' />
<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">


</head>
<body>

<style>

@media screen and (min-width:320px) {

.tituloBlog{float: left; width: 100%; background: #c4c4c4; padding: 40px 0px;}
.tituloBlog h1{ color: #fff; text-align: center; font-size: 22px !important; margin-bottom: 10px;}

.section{float: left; width: 90%; margin: 30px 0px;}
.container-conteudo{width: 100%; margin: auto;}

.section h2{color: #151515; font-size: 25px !important; margin-bottom: 20px; font-weight: 400;}
.section p{color: #151515; font-size: 16px !important; margin-bottom: 20px; line-height: 1.6em;}

}

@media screen and (min-width:1025px) {

.container-conteudo{width: 75%;}

}

@media screen and (min-width:1300px) {

}

</style>

<!-- ANALYTICS -->
<?php include('../souce=analytics.php'); ?>

<!-- LOGO -->
<?php include('../tarja-topo.php'); ?>

<!-- MENU -->
<?php include('../menu.php'); ?>

<div class="tituloBlog">
	<h1><?php echo utf8_encode ($carregar_post["post_titulo"])?></h1>
</div>

<section id="conteudo" class="section">
<div class="container-conteudo">

<?php echo utf8_encode ($carregar_post["post_conteudo"])?>

</div>
</section>

<!-- CONTATOS LEFT -->
<?php include_once('../souce=contatos-page-left.php'); ?>

<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>


</body>
</html>