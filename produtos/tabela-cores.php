<?php  include_once("../system/config.php");  ?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title><?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Tabela de Cores</title>
<meta name="description" content="<?php echo utf8_encode ($carrega_dadosEmpresa['sobre_empresa'])?>">
<meta name="author" content="Rafael Ferreira - Mestre Moveleiro">

<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Tabela de Cores" />
<meta property="og:description" content="<?php echo utf8_encode ($carrega_dadosEmpresa['sobre_empresa'])?>" />
<meta property="og:url" content="http://www.mestremoveleiro.com.br/produtos/tabela-cores" />
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

<style>
@media screen and (min-width:320px) {

.container-tabelaCores{
 float: left;
 width: 100%;
 margin-top: 30px;
 margin-bottom: 30px;
 min-height: 520px;
}

.titulo-container-tabelaCores{width: 100%; float: left;}
.titulo-container-tabelaCores p{font-size: 28px !important; color: #666666; margin-left: 10px; margin-right: 10px;}

.containerCores{float: left; width: 100%;}
.cor-iten{float: left; width: 100%; padding: 0px 10px;} 
.cor-iten-border{width: 100%;}
.cor-iten img{width: 100%; max-height: 164px; border: 4px solid #656565; padding: 3px;}
.cor-iten p{color: #666; text-align: center; font-size: 15px !important;}

.lbox-borda{width: 350px; background: #fff;  margin: 160px auto;}

.lbox{visibility: hidden; display: none;}

.lbox:target{
 display: block;
 visibility: visible;
 width: 100%;
 height: 100%;
 top: 0;
 left: 0;
 background: rgba(10,10,10,.7);

 position: fixed;
}

.box_img{
 width: 330px;
 margin: auto;
 padding-top: 10px;
}
.box_img p{ color: #151515; text-align: center; font-size: 18px !important; padding-bottom: 10px; }

.buttonClose{
 color: #9a9898;
 text-decoration: none;
 position: absolute;
 width: 50px;
 height: 50px;
 font-size: 40px !important;
 text-align: center;
 margin: -60px 250px; 
 text-decoration: none;
}
.buttonClose:hover{color: #c4c4c4; text-decoration: none;}

}

/* PARA PC **/
@media screen and (min-width:1025px) {

.cor-iten{width: 20%;}

.buttonClose{
 margin: -50px 350px; 
}

}

</style>

<div class="container-tabelaCores">
  <div class="container-site">

<!-- CORES DA FERRAGEM - TINTA ====================================================== -->

<?php 

//CARREGA CORES 
 $pesquisa_tinta = "SELECT * FROM loja_produtos_tabelaCores WHERE categoria = 'tinta' ";
 $resultado_tinta = mysqli_query($conn, $pesquisa_tinta);

 ?>

<div class="titulo-container-tabelaCores"><p>Cores para ferragem</p></div>

<div class="containerCores">

	<?php while($carrega_tinta = mysqli_fetch_assoc($resultado_tinta)){ ?>

       <div class="cor-iten">
	     <div class="cor-iten-border">
	       <a href="#img<?php echo utf8_encode ($carrega_tinta["id"]); ?>">
		   <img src="img-cores/tinta/<?php echo utf8_encode ($carrega_tinta["foto"]); ?>" alt="">
		   </a>
		   <p><?php echo utf8_encode ($carrega_tinta["nome"]); ?></p>
	     </div>
	   </div>

		<div class="lbox" id="img<?php echo utf8_encode ($carrega_tinta["id"]); ?>">
	      <div class="lbox-borda">	
		  <div class="box_img">
		  	 <a href="" class="buttonClose" id="close"><i class="fas fa-window-close"></i></a>
		  	 <img src="img-cores/tinta/<?php echo utf8_encode ($carrega_tinta["foto"]); ?>" alt="">
		  	 <p><?php echo utf8_encode ($carrega_tinta["nome"]); ?></p>
		  </div>
		  </div>
		</div>
              
    <?php } ?>  

</div>

<!-- CORES DO ASSENTO - CORINO ====================================================== -->

<?php 

//CARREGA CORES 
 $pesquisa_corino = "SELECT * FROM loja_produtos_tabelaCores WHERE categoria = 'corino' ";
 $resultado_corino = mysqli_query($conn, $pesquisa_corino);

 ?>

 <div class="titulo-container-tabelaCores"><p>Cores para assento</p></div>

<div class="containerCores">

	<?php while($carrega_corino = mysqli_fetch_assoc($resultado_corino)){ ?>

       <div class="cor-iten">
	     <div class="cor-iten-border">
	       <a href="#img<?php echo utf8_encode ($carrega_corino["id"]); ?>">
		   <img src="img-cores/corino/<?php echo utf8_encode ($carrega_corino["foto"]); ?>" alt="">
		   </a>
		   <p><?php echo utf8_encode ($carrega_corino["nome"]); ?></p>
	     </div>
	   </div>

		<div class="lbox" id="img<?php echo utf8_encode ($carrega_corino["id"]); ?>">
	      <div class="lbox-borda">	
		  <div class="box_img">
		  	 <a href="" class="buttonClose" id="close"><i class="fas fa-window-close"></i></a>
		  	 <img src="img-cores/corino/<?php echo utf8_encode ($carrega_corino["foto"]); ?>" alt="">
		  	 <p><?php echo utf8_encode ($carrega_corino["nome"]); ?></p>
		  </div>
		  </div>
		</div>
              
    <?php } ?>  

</div>

<!-- CORES DO TAMPO - MDF ====================================================== -->

<?php 

//CARREGA CORES 
 $pesquisa_mdf = "SELECT * FROM loja_produtos_tabelaCores WHERE categoria = 'mdf' ";
 $resultado_mdf = mysqli_query($conn, $pesquisa_mdf);

 ?>

<div class="titulo-container-tabelaCores"><p>Cores para tampo mdf</p></div>

<div class="containerCores">

	<?php while($carrega_mdf = mysqli_fetch_assoc($resultado_mdf)){ ?>

       <div class="cor-iten">
	     <div class="cor-iten-border">
	       <a href="#img<?php echo utf8_encode ($carrega_mdf["id"]); ?>">
		   <img src="img-cores/mdf/<?php echo utf8_encode ($carrega_mdf["foto"]); ?>" alt="">
		   </a>
		   <p><?php echo utf8_encode ($carrega_mdf["nome"]); ?></p>
	     </div>
	   </div>

		<div class="lbox" id="img<?php echo utf8_encode ($carrega_mdf["id"]); ?>">
	      <div class="lbox-borda">	
		  <div class="box_img">
		  	 <a href="" class="buttonClose" id="close"><i class="fas fa-window-close"></i></a>
		  	 <img src="img-cores/mdf/<?php echo utf8_encode ($carrega_mdf["foto"]); ?>" alt="">
		  	 <p><?php echo utf8_encode ($carrega_mdf["nome"]); ?></p>
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


