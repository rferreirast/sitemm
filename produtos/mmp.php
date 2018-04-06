<?php 
    include_once("../system/config.php");

     //BUSCA CODIGO NA URL
	 $id_produto = $_GET['produto'];

	//$listar = mysqli_query($conn, "SELECT * FROM produtos") or print mysql_error();
	$listar = "SELECT * FROM produtos WHERE id = '$id_produto' AND status = '1' ";
    $resultado_listar = mysqli_query($conn, $listar);
    $carregar_produto = mysqli_fetch_assoc($resultado_listar);

    //LISTA OS PRODUTOS SEMELHANTES 

    $categoria = $carregar_produto["categoria"];

	$listar_produtosSemelhante = "SELECT * FROM produtos WHERE id != '$id_produto' AND categoria LIKE '%$categoria%' AND status = '1' LIMIT 4";
    $resultado_produtosSemelhante = mysqli_query($conn, $listar_produtosSemelhante);

 ?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | <?php echo utf8_encode ($carregar_produto["nome"]); ?></title> <!-- INFO 1 -->
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
  <link rel="stylesheet" href="https://www.mmpschools.com/mmpcss/4/mmp.css">

  
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<style>
@media screen and (min-width:320px) {
.container-informacoes-produto{
 float: left;
 width: 100%;
 background: #fff;
 border-radius: 20px;
 margin-top: 30px;
 margin-bottom: 30px;
 box-shadow: 0px 1px 10px 0px rgba(0,0,0,.2);
}


/*====================*/
.mmp-do-produto {
 float: left;
 width: 100%;
}
.mmp-do-produto-margem{ width: 90%; margin: auto;}

/* IMAGENS DO PRODUTO======================*/
.mmp-img-produto{
 float: left;
 width: 60%;
 padding: 15px;
 text-align: center;
}
.mmp-img-produto img{
 width: 70%;
}
.mmp-outrasImagens{ float: left; width: 100%; margin-top: 20px;}
.mmp-outrasImagens-item{ float: left; width: 80px; height: 80px; margin-left: 10px; border: 1px solid #d4d4d4; border-radius: 3px; }
.mmp-outrasImagens-item:hover{border: 1px solid #014d8f; cursor: pointer;}
.mmp-outrasImagens-item img{width: 100%; padding: 5px;}
/* INFORMAÇOES DO PRODUTO ==================*/
.mmp-infos-produto{
 float: left;
 width: 40%;
 margin-top: 20px;
 padding-top: 30px;
 padding-bottom: 40px;
}
.mmp-infos-produto-margem{
 padding: 10px;
}
.mmp-infos-produto-nome p{
 color: #151515;
 font-size: 20px !important;
 font-weight: normal;
 margin-bottom: 10px;
}
.mmp-infos-produto-preco p{
 color: #014d8f;
 font-size: 35px !important;
 font-weight: 400;
 margin-bottom: 20px;
}
.mmp-infos-descricao-lateral{float: left; width: 100%; display: inline-block; padding-bottom: 20px;}
#infoMedidas{
 color: #014d8f;
 font-size: 20px !important;
 font-weight: bold;
 margin-bottom: 10px;
 width: 50%;
 padding-bottom: 5px;
 border-bottom: 5px solid #014d8f;
}
.mmp-infos-descricao-lateral p{ 
 color: #555;
 font-size: 16px !important;
 font-weight: 300;
 margin-bottom: 10px;
}

.mmp-button-comprar a{
 float: left;
 font-size: 16px;
 color: #fff;
 padding: 15px 20px;
 background: #014d8f;
 border-radius: 5px;
 font-weight: bold;
 text-decoration: none;	
 text-align: center;
 box-shadow: rgba(0, 0, 0, 0.2) 3px 4px 6px 1px;
}
.mmp-button-comprar a:hover{
 background: #014d8fed;
}

/*DESCRICAO DO PRODUTO ==================*/
.mmp-descricao-produto{
 float: left;
 width: 100%;
 padding: 10px 0px;	
}
.mmp-descricao-produto-margin{ width: 90%; margin: auto; border-bottom: 1px solid #d4d4d4; border-top: 1px solid #d4d4d4;}
.mmp-descricao-produto h2{ 
 color: #555;
 font-size: 30px !important;
 font-weight: bold;
 margin: 0px;
 padding: 20px 0px;
}

.mmp-infos-descricao-completa{
 float: left;
 width: 100%;
 padding-top: 20px;
 padding-bottom: 40px;
}
.mmp-infos-descricao-texto{
 width: 90%;
 margin: auto;
 border-radius: 10px;
 border: 1px solid #d7d7d7;
 padding: 20px 30px;
}
.mmp-infos-descricao-completa p{
 color: #a1a1a1;
 font-size: 18px !important;
 font-weight: 300;
 margin-bottom: 10px;
}
.mmp-infos-descricao-completa h2{
 color: #787777;
 font-size: 21px !important;
 font-weight: 300;
 margin-bottom: 10px;	
}


}
/* PARA PC **/
@media screen and (min-width:1025px) {


}


</style>

</head>

<body style="background: #eeeeee;">

<!-- ANALYTICS -->
<?php include('../souce=analytics.php'); ?>

<!-- LOGO -->
<?php include('../tarja-topo.php'); ?>

<!-- MENU -->
<?php include('../menu.php'); ?>

<div class="container-produtos">
	<div class="container-site">

	  <div class="container-informacoes-produto">
	  
      <div class="mmp-do-produto">
       <div class="mmp-do-produto-margem">

	  <div class="mmp-img-produto">
	  	<img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($carregar_produto["foto"]); ?>" alt="">

	  	<div class="mmp-outrasImagens">
	  		<div class="mmp-outrasImagens-item"><img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/produto4.jpg" alt=""></div>
	  		<div class="mmp-outrasImagens-item"><img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/produto2.jpg" alt=""></div>
	  		<div class="mmp-outrasImagens-item"><img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/produto5.jpg" alt=""></div>
	  	</div>
	  </div>

	  <div class="mmp-infos-produto">
	    <div class="mmp-infos-produto-margem">
	  	
	  	<div class="mmp-infos-produto-nome"><p><?php echo utf8_encode ($carregar_produto["nome"]); ?></p></div>
	  	<p style="width: 100%; float: left; color: #848484; font-size: 12px !important;">Codigo produto: <?php echo utf8_encode ($carregar_produto["id"]); ?></p>
	  	<div class="mmp-infos-produto-preco"><p>R$ <?php echo utf8_encode (number_format($carregar_produto["preco"], 2,',','.')); ?></p></div>

	  	<style>
	  		.variavelProduto{float: left; width: 100%; margin-bottom: 10px;}
            .item-variavel{float: left; width: 100%; padding-bottom: 5px;}
            .item-variavel p{color: #151515;font-size: 14px !important; padding-bottom: 0px;}
            .form-variavelProduto{border: 1px solid #014d8f; border-radius: 5px; width: 50%; padding: 5px 10px;}

            
	  	</style>

	  	<div class="variavelProduto">
	  		
	  	  <div class="item-variavel">
          <p><b>Cor da Ferragem:</b></p>
          <label for="variavel1"></label>
          <select name="variavel1" class="form-variavelProduto">
            <option value="">Selecione</option>
            <option value="Branca">Branca</option>
            <option value="Preta">Preta</option>
            <option value="Preta">Prata</option>  
            <option value="Preta">Ouro Velho</option>                    
          </select>                 
          </select>
          </div>

          <div class="item-variavel">
          <p><b>Cor do estofado:</b></p>
          <label for="variavel2"></label>
          <select name="variavel2" class="form-variavelProduto">
            <option value="">Selecione</option>
            <option value="Branca">Branco</option>
            <option value="Preta">Preto</option>
            <option value="Preta">Azul</option> 
            <option value="Preta">Vermelho</option>                    
          </select>
          </div>

	  	</div>	  	

	  	<div class="mmp-infos-descricao-lateral">
	  	    <p id="infoMedidas">Medidas</p>
	  		<p><b><i class="fas fa-arrows-alt-v"></i> Altura:</b> 62 cm</p>
			<p><b><i class="fas fa-arrows-alt-h"></i> Comprimento:</b> 45 cm</p>
			<p><b><i class="fas fa-arrows-alt-h"></i> Largura:</b> 45 cm</p>
			<p><b><i class="fas fa-cube"></i> Peso:</b> 12 kg</p>
	  	</div>

	  	<div class="mmp-button-comprar"><a href="itens-pedido?addItem=<?php echo utf8_encode ($carregar_produto["id"]); ?>">Adicionar ao pedido <i class="fas fa-shopping-cart" id="icon-sacola"></i></a></div>

        </div> 
	  </div>

	    </div>
	  </div>

     <div class="mmp-descricao-produto"><div class="mmp-descricao-produto-margin"><h2>Descrição do produto</h2></div></div>

	  <div class="mmp-infos-descricao-completa">
	     <div class="mmp-infos-descricao-texto">
	  	
	  	<!--<p><?php echo utf8_encode ($carregar_produto["descricao_completa"]); ?></p>-->

	  	<p></p>
	  	    <h2><b>MEDIDAS DO PRODUTO</b></h2>

			<p>Altura: 62 cm</p>
			<p>Comprimento: 45 cm</p>
			<p>Largura: 45 cm / 40 </p>

			<h2><b>MATERIAL</b></h2>

			<p>Material da base: Metalon 20x20 em aço carbono 1020, Pintura Eletrostática e Soldagem Mig/Mag.</p>
			<p>Material do tampo: Madeira MDF Amarelo Citrino Brilho de 15 mm e Fita de Borda.</p>

			<h2><b>DETALHES DO PRODUTO</b></h2>

			<p>Peso do produto: 15,3 Kg</p>
			<p>Peso suportado: 100 Kg</p>
			<p>Garantia de 1 ano contra defeito de fabricação</p>

			<h2><b>CUIDADOS NECESSÁRIOS</b></h2>

			<p>Para limpeza do produto utilize um pano seco e macio ou utilize um pano levemente umedecido e logo em seguida use um pano seco e macio para secar a peça. </p>

			<h2><b>O MELHOR CUSTO BENEFÍCIO DO MERCADO</b></h2>

			<p>Nossos produtos possuem uma vida útil média de +10 anos. Se for usado seguindo as nossas recomendações de cuidados e limpeza você terá um bom produto por décadas.</p>

			<h2><b>GARANTIA EXCLUSIVA</b></h2>

			<p>Se em até 15 dias você não ficar satisfeito com a mercadoria, devolvemos o seu dinheiro.</p>
			<p>Se você não gostar da mercadoria por qualquer motivo, você tem 15 dias para entrar em contato e cancelar a compra, você nos devolve a mercadoria e devolvemos o seu dinheiro total. Cobrimos todos os custos.</p>

         <p></p>

        </div>
	  </div>

	  </div>

	</div>
</div>

<style>
@media screen and (min-width:320px) {
.produtosSemelhantes{float: left; width: 100%;}
.produtosSemelhantes-itens{margin: auto; width: 80%;}
.border-item-produto{width: 100%;}
}

/* PARA PC **/
@media screen and (min-width:1025px) {
.border-item-produto{
 width: 25%;
}
/* PARA PC **/
@media screen and (min-width:1400px) {
.border-item-produto{
 width: 25%;
}
</style>

<div class="produtosSemelhantes">
	
	<div class="produtosSemelhantes-itens">

		<div class="texto-produtosSemelhantes" style="float: left; width: 100%; margin-bottom: 10px;"><p style="font-size: 22px !important; font-weight: bold; color: #8f8e8e;">Produtos que você também pode se interessar</p></div>

	 <?php while($res_produtosSemelhante = mysqli_fetch_assoc ($resultado_produtosSemelhante)){ ?>

		<!-- PRODUTO -->
        <a href="mmp?<?php echo utf8_encode (str_replace (" ", "-", $res_produtosSemelhante["nome"])); ?>&produto=<?php echo utf8_encode ($res_produtosSemelhante["id"]); ?>">
        <div class="border-item-produto">
        <div class="item-produto">
        <img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($res_produtosSemelhante["foto"]); ?>" alt=""> <!-- FOTO -->
        <p><?php echo utf8_encode ($res_produtosSemelhante["nome"]); ?></p> <!-- NOME -->
        <p id="preco">R$ <?php echo utf8_encode (number_format($res_produtosSemelhante["preco"], 2,',','.')); ?></p> <!-- PREÇO 1 -->
        </a>

        </div></div>

		<?php } ?>

	</div>


</div>



<!-- CONTATOS LEFT -->
<?php include_once('../souce=contatos-page-left.php'); ?>

<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>

</body>

</html>


