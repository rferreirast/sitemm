<?php 
    include_once("../system/config.php");

     //BUSCA CODIGO NA URL
	 $codigo_id = intval($_GET['categoria']);

	//$listar = mysqli_query($conn, "SELECT * FROM produtos") or print mysql_error();
	$listar = "SELECT * FROM produtos WHERE categoria = '$codigo_id' ";
    $resultado_listar = mysqli_query($conn, $listar);

 ?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="css/style-produtos.css">


<div class="container-produtos">
	<div class="container-site">

	<div class="titulo-container-produtos" style="width: 100%; float: left;"><p style="font-size: 28px !important; color: #666666; margin-left: 10px; margin-right: 10px;">Nossos produtos</p></div>
		
		<div class="container-produtos-itens" style="width: 100%; float: left;">

			<?php while($listar_produtos = mysqli_fetch_assoc($resultado_listar)){ ?>

				<!-- PRODUTO -->
				<div class="container-slide-mobile">
				<div class="border-item-produto"><div class="item-produto">
				<img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($listar_produtos["foto"]); ?>" alt=""> <!-- FOTO -->
				<p><?php echo utf8_encode ($listar_produtos["nome"]); ?></p> <!-- NOME -->
				<p id="descricao">Medidas: <?php echo utf8_encode ($listar_produtos["medidas"]); ?> cm</p> <!-- DESCRIÇÃO 1 -->
				<p id="descricao">Material: <?php echo utf8_encode ($listar_produtos["material"]); ?></p> <!-- DESCRIÇÃO 2 -->
				<p id="descricao">Peso: <?php echo utf8_encode ($listar_produtos["peso"]); ?> kg</p> <!-- DESCRIÇÃO 3 -->
				<a href="/contato" class="button-item-produto">Orçamento</a>
				</div></div>
				</div>

			<?php } ?>

		</div>

	</div>
</div>

