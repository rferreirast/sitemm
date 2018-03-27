<?php 

include_once("system/config.php");

session_start();

if (!isset($_SESSION['itens'])) {
	$_SESSION['itens'] = array();
}


if (isset($_GET['addItem'])) {
	
	$idProduto = $_GET['addItem'];

	if (!isset($_SESSION['itens'][$idProduto])) {
		
		$_SESSION['itens'][$idProduto] = 1;
	}else{
		$_SESSION['itens'][$idProduto] += 1;
	}
}


/*if (count($_SESSION['itens']) == 0) {
	echo "Carrinho Vazio";
}else{
	foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
    
    echo $idProduto;}
    /*$idProduto = (int)$idProduto;
	$listar = "SELECT * FROM produtos WHERE id=?";
    $resultado_listar = mysqli_query($conn, $listar);
    $resultado_listar->execute(array($idProduto));

    $produtos = $resultado_listar->fetchObject();

    echo $produtos->nome;

    //echo $produtos[0]["nome"].'<br/>';

	}
}}*/


?>

 <?php include_once '../dados/page_dados.php'; ?>
 <?php include_once 'dados/dados_produtos.php'; ?>
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Itens do pedido</title> <!-- INFO 1 -->
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

input.qt_itens{float: right; color: #151515; margin-top: 8px; margin-right: 5px; width: 40px; border: 1px solid #d4d4d4 ; font-size: 15px !important; text-align: center;}
input.qt_itens_atualizar{float: right; color: #151515; margin-top: 8px; margin-right: 50px; width: 20px; border: 1px solid #d4d4d4 ; font-size: 15px !important; text-align: center;}
input.qt_itens_atualizar:hover{color: #fff; background: #27ae60 ; cursor: pointer;}

#precoTotal{float: right; color: #151515; width: 20%; font-size: 25px !important;}
#corferro{float: left; color: #151515; margin-left: 10px; font-size: 16px !important;}
#corassento{float: left; color: #151515; margin-left: 10px; font-size: 16px !important;}

#button_excluirItem{color: #e74c3c; font-weight: bold; margin-left: 10px; font-size: 16px !important;}
#button_excluirItem:hover{color: #c0392b;}

/*========================*/

.buttons-actionPedido{ float: left; width: 100%; text-align: left; padding: 20px 0;}

#finalizaPedido{float: right; color: #fff; background: #16a085; border-radius: 5px; padding: 10px 20px; width: 20%; font-size: 18px !important; margin: 0 10px; text-align: center;}
#adicionarItens{float: right; color: #fff; background: #014d8f; border-radius: 5px; padding: 10px 20px; width: 20%; font-size: 18px !important; margin: 0 10px; text-align: center;}

/*OBSERVAÇOES LISTA DE PEDIDOS============*/

.obs-itensPedid{float: left; width: 100%; background: #dcdcdc; border-radius: 12px 12px 0px 12px; padding: 10px 20px;}
.obs-itensPedid p{font-size: 16px !important; color: #777; text-align: left; }


/*TEXTO DO TOTAL DO PEDIDO =============*/

.cont-TotalPedido{float: right; width: 100%; padding: 15px 0;}
#textoTotal{float: right;color: #151515; font-size: 18px !important; text-align: right; margin-right: 10px;}
#valorTotal{float: right;color: #151515; font-size: 18px !important; text-align: right; }

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

	<div class="titulo-container-produtos" style="width: 100%; float: left;"><p style="font-size: 28px !important; color: #666666; margin-left: 10px; margin-right: 10px;">Produtos do pedido</p></div>
		
		<div class="container-itens-pedido" style="width: 100%; float: left;">

			<div class="lista-itens-pedido">

			<?php if (count($_SESSION['itens']) == 0) { 
				echo "Carrinho Vazio";
			}else{
				$total = 0;
				foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
                $select = $conexao->prepare("SELECT * FROM produtos WHERE id=?");
				$select->bindParam (1,$idProduto);
				$select->execute();
				$produtos = $select->fetchAll();

				//$totalIten = number_format($produtos[0]["preco"] * $quantidade, 2,',','.');

                ?>

			    <div class="iten-pedido">	
                    
				    <div class="cont-imgProduto">
				    <img id="imagempedido" src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo $produtos[0]["foto"]; ?>" alt="">
				    </div>
				    
				    <div class="cont-sobreProduto">			
					<p id="produto"><?php echo utf8_encode ($produtos[0]["nome"]); ?></p>
					<p id="preco">R$ <?php echo number_format($produtos[0]["preco"], 2,',','.'); ?></p>

					<p id="precoTotal">R$ <?php echo number_format($produtos[0]["preco"] * $quantidade, 2,',','.'); ?></p>
					<input type="text" value="🔃" class="qt_itens_atualizar" name="update">
					<input type="text" value="<?php echo utf8_encode ($quantidade); ?>" class="qt_itens" name="quantidade">
					
					</div>

					<div class="cont-variaveisProduto">				
					<p id="corferro"><b>Ferragem:</b> Preta</p>
					<p id="corassento"><b>Assento:</b> Branco</p>
					</div>

					<div class="cont-buttons">
					<a href="removeritem/<?php echo $produtos[0]["id"]; ?>" id="button_excluirItem">✘ remover item</a>
					</div>
				</div>


			<?php } }?>

			<!---<?php while($listar_produtos = mysqli_fetch_assoc($resultado_listar)){ ?>

			<!-- ITEM PRODUTO -->				
				<div class="iten-pedido">	

                    
				    <div class="cont-imgProduto">
				    <img id="imagempedido" src="http://www.mestremoveleiro.com.br/produtos/img-produtos/produto1.jpg" alt="">
				    </div>
				    
				    <div class="cont-sobreProduto">			
					<p id="produto"><?php echo utf8_encode ($listar_produtos["nome"]); ?></p>
					<p id="preco">199,90</p>

					<p id="precoTotal">R$ 1.999,90</p>
					<input type="text" value="🔃" class="qt_itens_atualizar" name="update">
					<input type="text" class="qt_itens" name="quantidade">
					
					</div>

					<div class="cont-variaveisProduto">				
					<p id="corferro"><b>Ferragem:</b> Preta</p>
					<p id="corassento"><b>Assento:</b> Branco</p>
					</div>

					<div class="cont-buttons">
					<a href="#" id="button_excluirItem">✘ remover item</a>
					</div>
				</div>

				<?php } ?>-->

				<!-- FIM ITEM PEDIDO -->

				<div class="cont-TotalPedido">
				    <p id="valorTotal"><?php echo $total; ?></p>
					<p id="textoTotal">Total:</p>
				</div>

				.<div class="obs-itensPedid">
					<p>Após a finalização do pedido a nossa equipe de atendimento vai entrar em contato para confirmar as quantidades, cores e detalhes do produto. Informaremos também o valor do frete para a entrega das quantidades informadas e o prosseguimento com a forma de pagamento.</p>
				</div>

                <div class="buttons-actionPedido">
				<a href="#" id="finalizaPedido">Finalizar pedido</a>
				<a href="#" id="adicionarItens">Adicionar + Itens</a>
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


