<?php 


 ?>
 <?php include_once '../dados/page_dados.php'; ?>
 <?php include_once 'dados/dados_produtos.php'; ?>
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Itens de pedido</title> <!-- INFO 1 -->
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

.lista-itens-pedido{
 float: left;
 width: 100%;
}
.iten-pedido{
 float: left;
 width: 100%;
 background: #fff;
 border-radius: 10px;
 padding-top: 10px;
 padding-bottom: 10px;
 margin-top: 10px;
 margin-bottom: 10px;
}

.cont-imgProduto{float: left; width: 10%;}
.cont-sobreProduto {float: left; width: 90%;}
.cont-variaveisProduto{float: left; width: 30%;}
.cont-buttons {float: left; width: 70%;}

#imagempedido{ float: left; width: 100px; }
#produto{float: left; color: #151515;  margin-left: 10px; font-weight: bold; font-size: 22px !important;}
#preco{float: left; color: #151515; margin-left: 10px; margin-top: 8px; font-weight: normal; font-size: 14px !important;}

input.qt_itens{float: right; color: #151515; margin-top: 8px; margin-right: 50px; width: 40px; border: 1px solid #d4d4d4 ; font-size: 15px !important; text-align: center;}

#precoTotal{float: right; color: #151515; width: 20%; font-size: 25px !important;}
#corferro{float: left; color: #151515; margin-left: 10px; font-size: 16px !important;}
#corassento{float: left; color: #151515; margin-left: 10px; font-size: 16px !important;}

#button_excluirItem{color: #e74c3c; font-weight: bold; margin-left: 10px; font-size: 16px !important;}
#button_excluirItem:hover{color: #c0392b;}

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

	<div class="titulo-container-produtos" style="width: 100%; float: left;"><p style="font-size: 28px !important; color: #666666; margin-left: 10px; margin-right: 10px;">Itens de pedido</p></div>
		
		<div class="container-itens-pedido" style="width: 100%; float: left;">

			<div class="lista-itens-pedido">
				
				<div class="iten-pedido">	


				    <div class="cont-imgProduto">
				    <img id="imagempedido" src="http://www.mestremoveleiro.com.br/produtos/img-produtos/produto1.jpg" alt="">
				    </div>
				    
				    <div class="cont-sobreProduto">			
					<p id="produto">Cadeira Tiffany</p>
					<p id="preco">199,90</p>

					<p id="precoTotal">R$ 1.999,90</p>
					<input type="text" class="qt_itens" name="quantidade">
					
					</div>

					<div class="cont-variaveisProduto">				
					<p id="corferro"><b>Ferragem:</b> Preta</p>
					<p id="corassento"><b>Assento:</b> Branco</p>
					</div>

					<div class="cont-buttons">
					<a href="#" id="button_excluirItem">remover item</a>
					</div>
				</div>


			</div>

		</div>

	</div>
</div>



<!-- CONTATOS LEFT -->
<?php include_once('../souce=contatos-page-left.php'); ?>

<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>

</body>

</html>


