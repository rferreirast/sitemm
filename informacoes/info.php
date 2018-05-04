<?php 

include_once("../system/config.php");

if (!isset($_SESSION)){session_start();}

$id_Post = $_GET['p'];

$busca_post = "SELECT * FROM informacoes_postagens WHERE id = '$id_Post' AND status = 'ativo' ";
$resultado_post = mysqli_query($conn, $busca_post);
$carregar_post = mysqli_fetch_assoc($resultado_post);


/*$texto = 'A principal matÃ©ria prima utilizada na fabricaÃ§Ã£o das cadeiras de ferro Ã© o ferro aÃ§o carbono';

echo utf8_decode($texto);*/

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name=viewport content="width=device-width, initial-scale=1">

<title><?php echo utf8_encode ($carregar_post["post_titulo"])?> | <?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?></title> <!-- INFO 1 <--></-->
<meta name="description" content="<?php echo utf8_encode ($carregar_post["post_descricao"])?>"> <!-- INFO 2 -->
<meta name="author" content="Rafael Ferreira - Mestre Moveleiro">
<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo utf8_encode ($carregar_post["post_titulo"])?>" />
<meta property="og:description" content="<?php echo utf8_encode ($carregar_post["post_descricao"])?>" />
<meta property="og:region" content="SP" />
<meta property="og:phone_number" content=" <?php echo utf8_encode ($carrega_dadosEmpresa['telefone'])?>" />

<meta property="og:url" content="http://www.mestremoveleiro.com.br/informacoes/info?<?php echo utf8_encode(str_replace (" ", "-",$carregar_post["post_titulo"])); ?>
&p=<?php echo utf8_encode ($carregar_post["id"])?>" />

<meta property="og:site_name" content="Mestre Moveleiro" />
<meta property="article:published_time" content="<?php echo utf8_encode ($carregar_post["data_postagem"])?>" />
<meta property="article:modified_time" content="<?php echo utf8_encode ($carregar_post["data_modificacao"])?>" />
<meta property="og:image" content="https://www.conversion.com.br/informacoes/img-postagens/<?php echo utf8_encode ($carregar_post["imagem_postagem"])?>" />

<meta name="keywords" content="<?php echo utf8_encode ($carregar_post["keywords"])?>">
<meta name="robots" content="index, follow">
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- ICONES -->

<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="css/style-informacoes.css">
<link rel="shortcut icon" href='../img/logo-topo.png' />
<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">


</head>
<body>

<style>

@media screen and (min-width:320px) {

.tituloinformacoes{float: left; width: 100%; background: #fff; margin-top: 60px; padding-bottom: 10px; border-bottom: 1px solid #c4c4c4;}
.tituloinformacoes h1{ color: #333; text-align: center; font-size: 32px !important; font-weight: bold; margin-bottom: 10px; letter-spacing: -.055em;}
.tituloinformacoes h2{ color: #a0a0a0; text-align: center; font-size: 20px !important; margin-bottom: 10px;}

.section{float: left; width: 90%; margin: 30px 0px;}
.container-conteudo{width: 100%; margin: auto;}

.section h2{color: #333; font-size: 25px !important; margin-bottom: 20px; padding-top: 10px; font-weight: 400;}
.section p{color: #333; font-size: 16px !important; margin-bottom: 20px; line-height: 1.6em;}
.section ul{float: left; width: 100%; margin-bottom: 20px;}
.section li{display: list-item; list-style-type: initial; width: 100%; margin-bottom: 10px; margin-left: 15px; color: #333; font-size: 16px !important; line-height: 1.6em;}
strong{font-weight: bold;}
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

<div class="tituloinformacoes">
  <div class="container-conteudo">
	<h1><?php echo utf8_encode ($carregar_post["post_titulo"])?></h1>
	<h2><?php echo utf8_encode ($carregar_post["post_descricao"])?></h2>
  </div>
</div>

<section id="conteudo" class="section">
<div class="container-conteudo">

<?php echo html_entity_decode($carregar_post["post_conteudo"])?>

</div>
</section>

<!-- NOSSOS PRODUTOS -->

<!-- CONTATOS LEFT -->
<?php include_once('../souce=contatos-page-left.php'); ?>

<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>


</body>
</html>