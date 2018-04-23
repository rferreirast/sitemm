<?php include_once("system/config.php"); ?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title><?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?></title>
<meta name="description" content="<?php echo utf8_encode ($carrega_dadosEmpresa['sobre_empresa'])?>">
<meta name="author" content="Rafael Ferreira - Mestre Moveleiro">

<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?>" />
<meta property="og:description" content="<?php echo utf8_encode ($carrega_dadosEmpresa['sobre_empresa'])?>" />
<meta property="og:url" content="http://www.mestremoveleiro.com.br">
<meta property="og:site_name" content="<?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?>" />
<meta name="robots" content="index, follow">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<meta name=viewport content="width=device-width, initial-scale=1">

<link rel="shortcut icon" href='img/logo-topo.png' />
<link rel="stylesheet" href="css/style.css">

 <link rel="stylesheet" href="produtos/css/style-produtos.css">

</head>

<body>

<div class="background" >


<!-- LOGO -->
<?php include('souce=cabecalho.php'); ?>

<!-- Analytics -->
<?php include_once('souce=analytics.php'); ?>

<!-- PRODUTOS EM DESTAQUE =====================================================================================================-->

<?php 

//$listar = mysqli_query($conn, "SELECT * FROM produtos") or print mysql_error();
$listarDestaque = "SELECT * FROM loja_produtos WHERE categoria_destaque = 'sim' ORDER BY nome ASC LIMIT 4";
$resultado_listarDestaque = mysqli_query($conn, $listarDestaque);

 ?>

<div class="container-produtos" style="margin-top: 20px; margin-bottom: 0; min-height: auto;">
  <div class="container-site">

<div class="titulo-container-produtos" style="width: 100%; float: left;"><p style="float: left; font-size: 28px !important; color: #666666; margin-left: 10px; margin-right: 10px;">Produtos em Destaque</p></div>
    
<div class="container-produtos-itens" style="width: 100%; float: left;">

<?php while($listar_produtosDestaque = mysqli_fetch_assoc ($resultado_listarDestaque)){ ?>
<!-- PRODUTO -->
<a href="/produtos/mmp?<?php echo utf8_encode (str_replace (" ", "-",$listar_produtosDestaque["nome"])); ?>&produto=<?php echo utf8_encode ($listar_produtosDestaque["id"]); ?>">
<div class="border-item-produto">
<div class="item-produto">
<img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($listar_produtosDestaque["foto"]); ?>" alt=""> <!-- FOTO -->  
        
<div class="informacoesProduto" style="float: left; width: 100%; max-height: 100px; min-height: 100px;">

<?php 
error_reporting(0);

$buscaPrecoAntigo = $listar_produtosDestaque["preco_antigo"];
$precoVenda = $listar_produtosDestaque["preco"];

if ($buscaPrecoAntigo > 0) {

 $formataPreco = number_format($buscaPrecoAntigo, 2,',','.');

 $calculoOFF = number_format(-($precoVenda / $buscaPrecoAntigo * 100 - 100), 0);

  echo "

  <div class='emPromocao' style='float: left; width: 100%; min-height: 20.8px;'>

  <p id='preco_antigo' style='float: left; margin: 0; padding: 0; font-size: 14px !important; color: #797979; text-decoration: line-through; font-weight: 400; margin-bottom: 0px; margin-left: 15px; margin-right: 5px;'>R$ ".$formataPreco."</p>

  <p id='valorOFF' style='float: left; margin: 0; padding: 0; color: #64c574; font-size: 15px !important; font-weight: bold; padding: 0;'> ".$calculoOFF."% OFF</p>

  </div>

  ";

}else{

  echo "

  <div class='emPromocao' style='float: left; width: 100%;'>

  <p id='semValor' style='float: left; margin: 0; padding: 0; font-size: 14px !important; text-decoration: line-through; font-weight: 400; margin-bottom: 0px; margin-left: 15px; margin-right: 5px; color: transparent;'>0</p> 

  </div>

  ";

//echo "<div id='id_resultado'><a href='visualizar.php?id=". $row_usuario['id_relacionado'] ."'>". $idrelacionado['numero'] ."</a></div>";
   

}

?>        
<p id="preco">R$ <?php echo utf8_encode (number_format($listar_produtosDestaque["preco"], 2,',','.')); ?></p>
<p id="nomeProduto"><?php echo utf8_encode ($listar_produtosDestaque["nome"]); ?></p> 
</div>

</a>
</div>
</div>

<?php } ?>

</div>
</div>
</div>


<!-- PRODUTOS EM PROMOÇÃO ===================================================================================================== -->

<?php 

//$listar = mysqli_query($conn, "SELECT * FROM produtos") or print mysql_error();
$listarPromocao = "SELECT * FROM loja_produtos WHERE categoria_promocao = 'sim' ORDER BY nome ASC LIMIT 4";
$resultado_listarPromocao = mysqli_query($conn, $listarPromocao);

 ?>

<div class="container-produtos" style="margin-bottom: 20px; min-height: auto;">
  <div class="container-site">

<div class="titulo-container-produtos" style="width: 100%; float: left;"><p style="font-size: 28px !important; color: #666666; margin-left: 10px; margin-right: 10px;">Produtos em Promoção</p></div>
    
<div class="container-produtos-itens" style="width: 100%; float: left;">

<?php while($listar_produtosPromocao = mysqli_fetch_assoc ($resultado_listarPromocao)){ ?>
<!-- PRODUTO -->
<a href="/produtos/mmp?<?php echo utf8_encode (str_replace (" ", "-",$listar_produtosPromocao["nome"])); ?>&produto=<?php echo utf8_encode ($listar_produtosPromocao["id"]); ?>">
<div class="border-item-produto">
<div class="item-produto">
<img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($listar_produtosPromocao["foto"]); ?>" alt=""> <!-- FOTO -->  
        
<div class="informacoesProduto" style="float: left; width: 100%; max-height: 100px; min-height: 100px;">

<?php 
error_reporting(0);

$buscaPrecoAntigo = $listar_produtosPromocao["preco_antigo"];
$precoVenda = $listar_produtosPromocao["preco"];

if ($buscaPrecoAntigo > 0) {

 $formataPreco = number_format($buscaPrecoAntigo, 2,',','.');

 $calculoOFF = number_format(-($precoVenda / $buscaPrecoAntigo * 100 - 100), 0);

  echo "

  <div class='emPromocao' style='float: left; width: 100%; min-height: 20.8px;'>

  <p id='preco_antigo' style='float: left; margin: 0; padding: 0; font-size: 14px !important; color: #797979; text-decoration: line-through; font-weight: 400; margin-bottom: 0px; margin-left: 15px; margin-right: 5px;'>R$ ".$formataPreco."</p>

  <p id='valorOFF' style='float: left; margin: 0; padding: 0; color: #64c574; font-size: 15px !important; font-weight: bold; padding: 0;'> ".$calculoOFF."% OFF</p>

  </div>

  ";

}else{

  echo "

  <div class='emPromocao' style='float: left; width: 100%;'>

  <p id='semValor' style='float: left; margin: 0; padding: 0; font-size: 14px !important; text-decoration: line-through; font-weight: 400; margin-bottom: 0px; margin-left: 15px; margin-right: 5px; color: transparent;'>0</p> 

  </div>

  ";

//echo "<div id='id_resultado'><a href='visualizar.php?id=". $row_usuario['id_relacionado'] ."'>". $idrelacionado['numero'] ."</a></div>";
   

}

?>        
<p id="preco">R$ <?php echo utf8_encode (number_format($listar_produtosPromocao["preco"], 2,',','.')); ?></p>
<p id="nomeProduto"><?php echo utf8_encode ($listar_produtosPromocao["nome"]); ?></p> 
</div>

</a>
</div>
</div>

<?php } ?>

</div>
</div>
</div>

<!-- PRODUTOS POR CATEGORIA ===================================================================================================== -->

<?php include('produtos-por-categoria.php'); ?>

<!-- CONTATOS LEFT -->
<?php include_once('souce=contatos-page-left.php'); ?>

</div>

<!-- RODAPE -->
<?php include('souce=rodape.php'); ?>

</body>

</html>
