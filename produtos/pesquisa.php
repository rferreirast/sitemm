<?php 
    include_once("../system/config.php");
    
     if (!isset($_SESSION)){session_start();}

     //BUSCA CODIGO NA URL
	 $categoria_pesquisa = $_GET['categoria'];

	//$listar = mysqli_query($conn, "SELECT * FROM produtos") or print mysql_error();
	$listar = "SELECT * FROM loja_produtos WHERE categoria = '$categoria_pesquisa' AND status = 'ativo' ORDER BY preco ASC";
    $resultado_listar = mysqli_query($conn, $listar);

 ?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title><?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Categoria: <?php echo utf8_encode ($categoria_pesquisa)?></title>
<meta name="description" content="<?php echo utf8_encode ($carrega_dadosEmpresa['sobre_empresa'])?>">
<meta name="author" content="Rafael Ferreira - Mestre Moveleiro">

<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Produtos" />
<meta property="og:description" content="<?php echo utf8_encode ($carrega_dadosEmpresa['sobre_empresa'])?>" />
<meta property="og:url" content="http://www.mestremoveleiro.com.br/produtos/pesquisa?categoria=<?php echo utf8_encode ($categoria_pesquisa)?>" />
<meta property="og:site_name" content="<?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?>" />
<meta name="robots" content="index, follow">

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
</style>

</head>

<body style="background: #e4e4e5;">

<!-- ANALYTICS -->
<?php include('../souce=analytics.php'); ?>

<!-- LOGO -->
<?php include('../tarja-topo.php'); ?>

<!-- MENU -->
<?php include('../menu.php'); ?>

<div class="container-produtos">
	<div class="container-site">

	<div class="titulo-container-produtos" style="width: 100%; float: left;"><p style="font-size: 28px !important; color: #666666; margin-left: 10px; margin-right: 10px;"><?php echo ucfirst ($categoria_pesquisa)?></p></div>
		
		<div class="container-produtos-itens" style="width: 100%; float: left;">

			<?php while($listar_produtos = mysqli_fetch_assoc ($resultado_listar)){ ?>

				<!-- PRODUTO -->
				<a href="mmp?<?php echo utf8_encode (str_replace (" ", "-",$listar_produtos["nome"])); ?>&produto=<?php echo utf8_encode ($listar_produtos["id"]); ?>">
				<div class="border-item-produto">
				<div class="item-produto">
				<img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($listar_produtos["foto"]); ?>" alt=""> <!-- FOTO -->				
				<p id="preco">R$ <?php echo utf8_encode (number_format($listar_produtos["preco"], 2,',','.')); ?></p> <!-- PREÇO 1 -->
				<p id="nomeProduto" ><?php echo utf8_encode ($listar_produtos["nome"]); ?></p> <!-- NOME -->
				</a>

				</div>
				</div>

			<?php } ?>

		</div>

	</div>
</div>



<!-- CONTATOS LEFT -->
<?php include_once('../souce=contatos-page-left.php'); ?>

<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>

</body>

</html>


