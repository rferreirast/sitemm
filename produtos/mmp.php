<?php 
include_once("../system/config.php");

    include_once("../system/config.php");

     if (!isset($_SESSION)){session_start();}

     //BUSCA CODIGO NA URL
	 $id_produto = $_GET['produto'];

	//LISTA OS DADOS DO PRODUTO DO BANCO DE DADOS
	//$listar = mysqli_query($conn, "SELECT * FROM produtos") or print mysql_error();
	$listar = "SELECT * FROM loja_produtos WHERE id = '$id_produto' AND status = 'ativo' ";
    $resultado_listar = mysqli_query($conn, $listar);
    $carregar_produto = mysqli_fetch_assoc($resultado_listar);

    //LISTA AS FOTOS DO PRODUTO
    $listar_fotos = "SELECT * FROM loja_fotos_produtos WHERE id_produto = '$id_produto'";
    $resultado_fotos = mysqli_query($conn, $listar_fotos);

    //LISTA OS PRODUTOS SEMELHANTES 

    $categoria = $carregar_produto["categoria"];

	$listar_produtosSemelhante = "SELECT * FROM loja_produtos WHERE id != '$id_produto' AND categoria LIKE '%$categoria%' AND status = 'ativo' LIMIT 4";
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

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

<style>
@media screen and (min-width:320px) {

.container-produtos{margin: 0; padding: 0;}

.container-informacoes-produto{
 float: left;
 width: 100%;
 background: #fff;
 border-radius: 2px;
 margin-top: 0px;
 padding-top: 20px;
 margin-bottom: 30px;
 /*box-shadow: 0px 1px 10px 0px rgba(0,0,0,.2);*/
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
 width: 100%;
 padding: 5px;
 text-align: center;
}
.img-principal img{
 width: 100%;
}
.mmp_outrasImagens{ float: left; width: 100%; margin-top: 20px;}
img.mmp-outrasImagens-item{ float: left; width: 80px; height: 80px; margin-left: 10px; border: 1px solid #b9b9b9; border-radius: 3px; margin-bottom: 10px; }
img.mmp-outrasImagens-item:hover{border: 1.15px solid #014d8f; cursor: pointer;}
/* INFORMAÇOES DO PRODUTO ==================*/
.mmp-infos-produto{
 float: left;
 width: 100%;
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
.mmp-button-comprar{
 float: left;
 width: 100%;
 text-align: center;
}
.mmp-button-comprar a{
 float: left;
 width: 100%;
 font-size: 16px;
 color: #fff;
 padding: 15px 20px;
 background: #014d8f;
 border-radius: 5px;
 font-weight: bold;
 text-decoration: none;	
 text-align: center;
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
 width: 100%;
 padding: 10px 20px;
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

.container-siteP{
 width: 100%;	
}

}
/* PARA PC **/
@media screen and (min-width:1025px) {

.container-siteP{
 width: 80%;
 margin: auto;
}
.container-informacoes-produto{
 margin-top: 30px;
}

.mmp-img-produto{
 width: 60%;
 padding: 15px;
}
.img-principal img{
 width: 70%;
}

.mmp-infos-produto{
 width: 40%;
}

.mmp-button-comprar a{
 width: auto;
}

.mmp-infos-descricao-texto{
 width: 90%;
 margin: auto;
 border-radius: 5px;
 border: 1px solid #d7d7d7;
 padding: 20px 30px;
}

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
	<div class="container-siteP">

	  <div class="container-informacoes-produto">
	  
      <div class="mmp-do-produto">
       <div class="mmp-do-produto-margem">

	  <style>

	  /* Fade in animation */
		@keyframes fadeIn {
		  to {
		    opacity: 1;
		  }
		}

		.fade-in {
		  opacity: 0;
		  animation: fadeIn 0.5s ease-in 1 forwards;
		}

		.mmp-outrasImagens-item:select{border: 1px solid #014d8f;}
		
	 </style>


	  <div class="mmp-img-produto">

	  	<div class="img-principal"><img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($carregar_produto["foto"]); ?>" id="Fotoprincipal"></div>

	  	<div class="mmp_outrasImagens">

	  		<img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($carregar_produto["foto"]); ?>" alt="" class="mmp-outrasImagens-item">

	  		<?php while($resultado_listarFotos = mysqli_fetch_assoc ($resultado_fotos)){ ?>

	  		 <img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo($resultado_listarFotos["outras_fotos"]) ?>" alt="" class="mmp-outrasImagens-item">
	  		

            <?php } ?>
	  	
	  	</div>
	  </div>

	  <div class="mmp-infos-produto">
	    <div class="mmp-infos-produto-margem">
	  	
	  	<div class="mmp-infos-produto-nome"><p><?php echo utf8_encode ($carregar_produto["nome"]); ?></p></div>
	  	<p style="width: 100%; float: left; color: #848484; font-size: 12px !important;">Código produto: <?php echo utf8_encode ($carregar_produto["id"]); ?></p>
	  	<div class="mmp-infos-produto-preco"><p>R$ <?php echo utf8_encode (number_format($carregar_produto["preco"], 2,',','.')); ?></p></div> 
	  	<p style="width: 100%; float: left; color: #848484; font-size: 14px !important; margin-bottom: 20px;"><i class="fas fa-paint-brush"></i> Veja a tabela de cores disponíveis para esse produto <a href="#">clicando aqui</a></p>	

	  	<div class="mmp-infos-descricao-lateral">
	  	    <p id="infoMedidas">Medidas</p>
	  		<p><b><i class="fas fa-arrows-alt-v"></i> Altura:</b> <?php echo utf8_encode ($carregar_produto["altura"]); ?></p>
			<p><b><i class="fas fa-arrows-alt-h"></i> Comprimento:</b> <?php echo utf8_encode ($carregar_produto["comprimento"]); ?></p>
			<p><b><i class="fas fa-arrows-alt-h"></i> Largura:</b> <?php echo utf8_encode ($carregar_produto["largura"]); ?></p>
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

	  	    <p><?php echo utf8_encode ($carregar_produto["descricao_completa"]); ?></p>

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

<script>
// SLIDE DAS FOTOS DOS OUTROS PRODUTOS
const Fotoprincipal = document.querySelector("#Fotoprincipal");
const mmp_outrasImagens = document.querySelectorAll(".mmp_outrasImagens img");
const opacity = 0.6;

// Set first img opacity
mmp_outrasImagens[0].style.opacity = opacity;

mmp_outrasImagens.forEach(img => img.addEventListener("click", imgClick));

function imgClick(e) {
  // Reset the opacity
  mmp_outrasImagens.forEach(img => (img.style.opacity = 1));

  // Change Fotoprincipal image to src of clicked image
  Fotoprincipal.src = e.target.src;

  // Add fade in class
  Fotoprincipal.classList.add("fade-in");

  // Remove fade-in class after .5 seconds
  setTimeout(() => Fotoprincipal.classList.remove("fade-in"), 500);

  // Change the opacity to opacity var
  e.target.style.opacity = opacity;
}




</script>

</html>


