<?php 
    include_once("../system/config.php");

     //BUSCA CODIGO NA URL
	 $id_produto = $_GET['produto'];

	//$listar = mysqli_query($conn, "SELECT * FROM produtos") or print mysql_error();
	$listar = "SELECT * FROM produtos WHERE id = '$id_produto' AND status = '1' ";
    $resultado_listar = mysqli_query($conn, $listar);
    $carregar_produto = mysqli_fetch_assoc($resultado_listar);

 ?>
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | <?php echo utf8_encode ($id_produto)?></title> <!-- INFO 1 -->
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
@media screen and (min-width:320px) {



}
/* PARA PC **/
@media screen and (min-width:1025px) {
.container-informacoes-produto{
 float: left;
 width: 100%;
 background: #fff;
 border-radius: 20px;
}
.w3-img-produto{
 float: left;
 width: 60%;
 padding: 15px;
}
.w3-img-produto img{
 width: 70%;
}
.w3-infos-produto{
 float: left;
 width: 40%;
 margin-top: 20px;
 padding-top: 30px;
 padding-bottom: 40px;
 border-left: 1px solid #c4c4c4;
 border-bottom: 1px solid #c4c4c4;
}
.w3-infos-produto-margin{
 padding: 10px;
}
.w3-infos-produto-nome p{
 color: #151515;
 font-size: 30px !important;
 font-weight: normal;
 margin-bottom: 20px;
}
.w3-infos-produto-preco p{
 color: #151515;
 font-size: 35px !important;
 font-weight: normal;
 margin-bottom: 20px;
}
.w3-infos-descricao-completa{
 float: left;
 width: 100%;
 margin-top: 20px;
}

.w3-button-comprar a{
 float: left;
 width: 100%;
 font-size: 20px;
 color: #fff;
 background: #014d8f;
 padding: 8px 20px;
 border-radius: 5px;
 font-weight: bold;
 text-decoration: none;	
 text-align: center;
 box-shadow: rgba(0, 0, 0, 0.2) 3px 4px 6px 1px;
}
.w3-button-comprar a:hover{
 background: #014d8fed;
}

}


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


	  <div class="container-informacoes-produto">

	  <div class="w3-img-produto">
	  	<img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($carregar_produto["foto"]); ?>" alt="">
	  </div>

	  <div class="w3-infos-produto">
	    <div class="w3-infos-produto-margin">
	  	
	  	<div class="w3-infos-produto-nome"><p><?php echo utf8_encode ($carregar_produto["nome"]); ?></p></div>
	  	<div class="w3-infos-produto-preco"><p>R$ <?php echo utf8_encode ($carregar_produto["preco"]); ?></p></div>

	  	<div class="w3-button-comprar"><a href="itens-pedido.php?addItem=<?php echo utf8_encode ($carregar_produto["id"]); ?>">Comprar</a></div>

        </div>
	  </div>

	  <div class="w3-infos-descricao-completa">
	  	
	  	<!--<p><?php echo utf8_encode ($carregar_produto["descricao_completa"]); ?></p>-->

	  	<p>
	  	    MEDIDAS DO PRODUTO

			Altura: 62 cm / 57 cm / 52 cm
			Comprimento: 45 cm / 40 cm / 35 cm
			Largura: 45 cm / 40 cm / 35 cm

			MATERIAL

			Material da base: Metalon 20x20 em aço carbono 1020, Pintura Eletrostática e Soldagem Mig/Mag.
			Material do tampo: Madeira MDF Amarelo Citrino Brilho de 15 mm e Fita de Borda.

			DETALHES DO PRODUTO

			Peso do produto: 15,3 Kg
			Peso suportado: 100 Kg
			Garantia de 1 ano contra defeito de fabricação

			CUIDADOS NECESSÁRIOS

			Para limpeza do produto utilize um pano seco e macio ou utilize um pano levemente umedecido e logo em seguida use um pano seco e macio para secar a peça. 

			O MELHOR CUSTO BENEFÍCIO DO MERCADO

			Nossos produtos possuem uma vida útil média de +10 anos. Se for usado seguindo as nossas recomendações de cuidados e limpeza você terá um bom produto por décadas.

			GARANTIA EXCLUSIVA

			Se em até 15 dias você não ficar satisfeito com a mercadoria, devolvemos o seu dinheiro.
			Se você não gostar da mercadoria por qualquer motivo, você tem 15 dias para entrar em contato e cancelar a compra, você nos devolve a mercadoria e devolvemos o seu dinheiro total. Cobrimos todos os custos.
</p>

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


