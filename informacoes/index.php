<?php 

include_once("../system/config.php");

if (!isset($_SESSION)){session_start();}

$busca_post = "SELECT * FROM informacoes_postagens WHERE status = 'ativo' ORDER BY data_postagem DESC";
$resultado_post = mysqli_query($conn, $busca_post);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name=viewport content="width=device-width, initial-scale=1">

<title>Informações | <?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?></title>
<meta name="description" content="<?php echo utf8_encode ($carrega_dadosEmpresa['sobre_empresa'])?>">
<meta name="author" content="Rafael Ferreira - Mestre Moveleiro">

<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Informações" />
<meta property="og:description" content="<?php echo utf8_encode ($carrega_dadosEmpresa['sobre_empresa'])?>" />
<meta property="og:url" content="http://www.mestremoveleiro.com.br/informacoes" />
<meta property="og:site_name" content="<?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?>" />
<meta name="robots" content="index, follow">

<meta name="keywords" content="<?php echo utf8_encode ($carregar_post["keywords"])?>">
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

.container-conteudo{width: 100%; margin: auto;}

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
	<h1>Todas as Informações</h1>
  </div>
</div>

<style>
@media screen and (min-width:320px) {

.postagensinformacoes{float: left; width: 100%; margin-top: 60px; padding-bottom: 30px;}

.iten-postagem{float: left; width: 100%; border-bottom: 1px solid #c4c4c4; padding-bottom: 20px; margin-bottom: 20px; text-align: center;}

.borderLeft{float: left; border-left: 6px solid #014d8f; }
.borderLeft:hover{border-left: 6px solid #337ab7;}

/*#imginformacoes{width: 100%; text-align: center;}
img#imginformacoes{max-width: 100px; margin-right: 20px;}*/

#tituloinformacoes{float: left; width: 100%; font-size: 22px !important; color: #333; text-align: left; font-weight: 400; margin-bottom: 10px; margin-left: 10px;}
#tituloinformacoes:hover{color: #337ab7}

#descricaoinformacoes{float: left; width: 100%; font-size: 18px !important; color: #888; text-align: left; margin-left: 10px;}

}

@media screen and (min-width:1025px) {

/*#imginformacoes{float: left; width: 20%;}*/

#tituloinformacoes{width: 80%;}

#descricaoinformacoes{width: 80%;}

}

</style>

<div class="postagensinformacoes">
 <div class="container-conteudo">

<?php while($carrega_post = mysqli_fetch_assoc($resultado_post)){ ?>

	<div class="iten-postagem">
		<a href="info?<?php echo utf8_encode(str_replace (" ", "-",$carrega_post["post_titulo"])); ?>&p=<?php echo utf8_encode ($carrega_post["id"]); ?>" id="">
		<div class="borderLeft">
		<h2 id="tituloinformacoes"><?php echo utf8_encode($carrega_post["post_titulo"]); ?></h2>
		<p id="descricaoinformacoes"><?php echo utf8_encode($carrega_post["post_descricao"]); ?></p>
		</div>		
		</a>
	</div>

<?php } ?>

 </div>
</div>

<!-- NOSSOS PRODUTOS -->

<!-- CONTATOS LEFT -->
<?php include_once('../souce=contatos-page-left.php'); ?>

<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>


</body>
</html>