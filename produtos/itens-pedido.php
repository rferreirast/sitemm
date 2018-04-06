<?php 

include_once("../usuario/system/connect.php");

if (!isset($_SESSION)){session_start();}
include_once("../usuario/system/verifica_sessao.php");

include_once("system/config.php");

//session_start();

if (!isset($_SESSION['itens'])) {
	$_SESSION['itens'] = array();
}

$totalPedido = ('0,00');


if (isset($_GET['addItem'])) {
	
	$idProduto = $_GET['addItem'];

//if (isset($_SESSION['itens'][$idProduto][0])){unset($_SESSION['itens'][0]);}

	if (!isset($_SESSION['itens'][$idProduto])) {
		
		$_SESSION['itens'][$idProduto] = 1;
		header("Location: itens-pedido");
	}else{
		$_SESSION['itens'][$idProduto] += 1;
		header("Location: itens-pedido");
	}
}

if (isset($_GET['removeItem'])) {
	
	$idProdutoR = $_GET['removeItem'];
	
	unset($_SESSION['itens'][$idProdutoR]);
	header("Location: itens-pedido");

}

if (isset($_POST['atualiza_quantidades'])) {
$qtdProduto = $_POST['qtd'];
$idprod = $_POST['idprod'];

header("Location: itens-pedido?atualizaItem=$idprod&qt=$qtdProduto");

if ($qtdProduto != '') {
	$_SESSION['itens'][$idprod] = $qtdProduto;
	}else{
		unset($_SESSION['itens'][$idprod]);
	}

header("Location: itens-pedido");

   /*$produto = (int)$_POST['prod'];
   $qt = ['prod'];

   header("Location: itens-pedido?atualizaItem=$produto&qt=$qt");

   /*$idProduto = $_GET['atualizaItem'];
   $atualizaqt = $_GET['qt'];*/

}

if (isset($_POST['finalizar_pedido'])) {
$valor_produtos = $_POST['totalPedido'];

//FAZ A BUSCA DO ULTIMO ID DE PEDIDO E SOMA MAIS 1;
$busca_ultimoId = mysqli_query($conn, "SELECT MAX(id) FROM loja_pedidos") or print mysql_error();
$ultimo_id = mysqli_fetch_array($busca_ultimoId);
$numero_pedido = $ultimo_id[0] + 1;

//DADOS CLIENTE
$email = $_SESSION['sessao_usuario']; //PESQUISA O EMAIL LOGADO
 
$pesquisa_dadosCliente = "SELECT * FROM loja_clientes WHERE email = '$email'"; // FAZ A BUSCA NO MYSQL
$resultado_cliente = mysqli_query($conn, $pesquisa_dadosCliente);
$carrega_dados = mysqli_fetch_assoc($resultado_cliente);

$id_cliente = utf8_encode($carrega_dados["id_cliente"]); //RETORNA O CODIGO DO CLIENTE

date_default_timezone_set('America/Sao_Paulo'); //DATA E HORA DO PEDIDO
$data_atual = date('Y/m/d H:i');  


//DALVA OS DADOS DO PEDIDO NA TABELA

$salva_pedido = "INSERT INTO loja_pedidos (id, id_cliente, valor_produtos, status, data_pedido) VALUES ('$numero_pedido', '$id_cliente', '$valor_produtos', 'Solicitado', '$data_atual')";

if ($conn->query($salva_pedido) === TRUE) {

//SALVA OS PRODUTOS DO PEDIDO
echo "<script>alert('OK !!');</script>";

//header("location: meus-pedidos");

else{

	echo "<script>alert('Algo deu errado, tente novamente !!');</script>";
}

}*/

/*//DADOS PRODUTO
$valor_pedido = ;
$status_pedido = ['solicitado'];
$data_pedido = [''];

//LISTA DOS PRODUTOS DO PEDIDO
$id_produto = $_POST[''];
$quantidade_produtos = $_POST[''];
$valor = $_POST[''];
$subtotal = $_POST[''];




//SALVA EM loja_pedidos

//SALVA EM loja_produtos_pedidos


foreach ($_SESSION['itens'] as $idProduto => $quantidade){
$preco = $produtos[0]["preco"];

$sql = "INSERT INTO loja_produtos_pedidos (nome, email, senha) VALUES ('$idProduto', '$quantidade', '$preco')";
if ($conn->query($sql) === TRUE) {

}

}*/

}


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

.container-produtos{width: 100%; float: left; min-height: 480px;}
.lista-itens-pedido{
 float: left;
 width: 100%;
}

/*EXIBICAO LISTA PEDIDOS=========================*/

 .itens-pedido{float: left; width: 100%; margin-top: 20px; border-radius: 10px; background: #fff;}

.header-itensPedido{
 padding: 16px;
 font-size: 12px !important;
 font-weight: 700;
 text-align: center;
 background: #014d8f;
 color: #fff;
}

.header-itensPedido p{font-size: 12px !important;}

.cell-itensPedido{
 position: relative;
 padding: 16px;
 font-size: 14px !important;
 text-align: center;
 border: 0;
 border-bottom: 1px solid #d9d9d9;
 background: #fff;
}

.cell-itensPedido p{font-size: 12px !important;}


input.qt_itens{float: right; color: #151515; margin-top: 8px; margin-right: 5px; width: 45px; border: 1px solid #d4d4d4 ; font-size: 15px !important; text-align: center;}
input.qt_itens_atualizar{float: right; color: #151515; margin-top: 8px; margin-right: 50px; width: 20px; border: 1px solid #d4d4d4 ; font-size: 15px !important; text-align: center;}
input.qt_itens_atualizar:hover{color: #fff; background: #27ae60 ; cursor: pointer;}

#button_excluirItem{color: #e74c3c; font-weight: bold; margin-left: 10px; font-size: 16px !important;}
#button_excluirItem:hover{color: #c0392b;}

/*========================*/

.buttons-actionPedido{ float: left; width: 100%; text-align: left; padding: 20px 0;}

#finalizaPedido{float: right; color: #fff; background: #16a085; border-radius: 5px; padding: 10px 20px; width: 20%; font-size: 18px !important; margin: 0 10px; text-align: center;}
#adicionarItens{float: right; color: #fff; background: #014d8f; border-radius: 5px; padding: 10px 20px; width: 20%; font-size: 18px !important; margin: 0 10px; text-align: center;}

.zero{width: 0px; height: 0px;}

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

	<div class="obsPedido" style="float: left; width: 100%; background: #64c574; font-size: 16px !important; color: #fff; padding: 10px 20px; border-radius: 10px;"><i class="fas fa-lock"></i> Fique tranquilo, esse ambiente é 100% seguro. Nós não solicitamos dados de cartão de crédito ou conta bancária.</div>
		
		<div class="container-itens-pedido" style="width: 100%; float: left;">

			<div class="lista-itens-pedido">

			<?php if (count($_SESSION['itens']) == 0) { 
				echo '<p style="color: #595959; font-size: 30px !important; text-align: center; margin-top: 60px; min-height: 100px;"><i class="fas fa-shopping-cart"></i> Carrinho Vazio</p>';
			}else{ ?>
            
            <table class="itens-pedido">

				<thead>
		         <tr>
		           <th class="header-itensPedido" style="text-align: left;">Itens do pedido</th>
		           <th class="header-itensPedido"></th>
		           <th class="header-itensPedido">Qtd</th>
		           <th class="header-itensPedido">Valor</th>
		           <th class="header-itensPedido">Subtotal</th>
		           <th class="header-itensPedido">Remover</th>		           
		         </tr>
		       </thead>
				
				<?php foreach ($_SESSION['itens'] as $idProduto => $quantidade) {
                $select = $conexao->prepare("SELECT * FROM produtos WHERE id=?");
				$select->bindParam (1,$idProduto);
				$select->execute();
				$produtos = $select->fetchAll();

				//$totalIten = number_format($produtos[0]["preco"] * $quantidade, 2,',','.');

                ?>

                <form method="post">			 		       

				     <tbody>
				       <tr>
				         <td class="cell-itensPedido"><img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo $produtos[0]["foto"]; ?>" alt="" style="height: 80px; width:auto;"></td>

				         <td class="cell-itensPedido" style="text-align: left;">
				         	<p><a href="mmp?<?php echo utf8_encode (str_replace (" ", "-",$produtos[0]["nome"])); ?>&produto=<?php echo $idProduto; ?>"><?php echo utf8_encode ($produtos[0]["nome"]); ?></a></p>
				         	<p style="color: #acacac">Codigo: <?php echo $idProduto; ?></p>
				         	<p style="color: #acacac">Cores: A escolher</p>
				         </td>
				         

				         <td class="cell-itensPedido">
				         <input type="submit" value="🔃" class="qt_itens_atualizar" name="atualiza_quantidades">
						 <input type="number" value="<?php echo $quantidade; ?>" class="qt_itens" name="qtd">
						 <input type="text" value="<?php echo $idProduto; ?>" class="zero" name="idprod"> <!-- PEGA O ID DO PRODUTO 'INVISIVEL' PARA ATUALIZAR AS QUANTIDADES-->
				         </td>

				         <td class="cell-itensPedido"><p>R$ <?php echo number_format($produtos[0]["preco"], 2,',','.'); ?></p></td>

				         <td class="cell-itensPedido"><p>R$ <?php echo number_format($produtos[0]["preco"] * $quantidade, 2,',','.'); ?></p></td>

				         <td class="cell-itensPedido">
				         <div class="cont-buttons"><a href="itens-pedido?removeItem=<?php echo $produtos[0]["id"]; ?>" id="button_excluirItem">✘</a></td></div>

				       </tr>
				     </tbody> 
						

			    <?php error_reporting(0); $totalPedido += $produtos[0]["preco"] * $quantidade; }}?>

			    </table> 


				<!-- FIM ITEM PEDIDO -->

				<div class="cont-TotalPedido">

					<input type="text" value="<?php echo number_format($totalPedido, 2,'.',''); ?>" name="totalPedido" style="width: 0; height: 0;">

					<p id="valorTotal">R$<?php echo number_format($totalPedido, 2,',','.'); ?></p>
					
					<p id="textoTotal">Total do pedido: </p>
				</div>

				<div class="obs-itensPedid">
					<p>Após a finalização do pedido a nossa equipe de atendimento vai entrar em contato para confirmar as quantidades, cores e detalhes do produto. Informaremos também o valor do frete para a entrega das quantidades informadas e o prosseguimento com a forma de pagamento.</p>
				</div>

                <div class="buttons-actionPedido">
                <input type="submit" id="finalizaPedido" value="Finalizar pedido" class="" name="finalizar_pedido">
				<a href="#" id="adicionarItens">Adicionar Itens</a>
				</div>

				</form>	


			</div>

		</div>

	</div>
</div>


<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>

</body>

</html>


