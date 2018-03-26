<?php 
    include_once("../system/config.php");

     //BUSCA CODIGO NA URL
	 $item_pesquisa = $_GET['produto'];

	//$listar = mysqli_query($conn, "SELECT * FROM produtos") or print mysql_error();
	$listar = "SELECT * FROM produtos WHERE nome LIKE '%$item_pesquisa%' AND status = '1' ";
    $resultado_listar = mysqli_query($conn, $listar);

 ?>
 
 <?php include_once '../dados/page_dados.php'; ?>
 <?php include_once 'dados/dados_produtos.php'; ?>
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | <?php echo utf8_encode ($item_pesquisa)?></title> <!-- INFO 1 -->
    <meta name="description" content="<?php echo utf8_encode ($SOBRE_PAGINA)?>"> <!-- INFO 2 -->
    <meta name="author" content="Rafael Ferreira">
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

	<div class="titulo-container-produtos" style="width: 100%; float: left;"><p style="font-size: 28px !important; color: #666666; margin-left: 10px; margin-right: 10px;">Pesquisa: <?php echo ucfirst ($item_pesquisa)?></p></div>
		
		<div class="container-produtos-itens" style="width: 100%; float: left;">

			<?php while($listar_produtos = mysqli_fetch_assoc ($resultado_listar)){ ?>

				<!-- PRODUTO -->
				<a href="mmp.php?produto=<?php echo utf8_encode ($listar_produtos["id"]); ?>">
				<div class="border-item-produto">
				<div class="item-produto">
				<img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($listar_produtos["foto"]); ?>" alt=""> <!-- FOTO -->
				<p><?php echo utf8_encode ($listar_produtos["nome"]); ?></p> <!-- NOME -->
				<p id="preco">R$ 148,90</p> <!-- PREÇO 1 -->
				</a>

					<div class="button-sacola">
						<a href="itens-pedido.php?addItem=<?php echo utf8_encode ($listar_produtos["id"]); ?>" class="button-item-produto">Adicionar <i class="fas fa-shopping-cart" id="icon-sacola"></i></a>
					</div>


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


