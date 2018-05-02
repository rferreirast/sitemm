<?php 
  include_once("../system/config.php");
   
  if (!isset($_SESSION)){session_start();}
 
  //$listar = mysqli_query($conn, "SELECT * FROM produtos") or print mysql_error();
  $listar = "SELECT * FROM loja_produtos WHERE status = 'ativo' ORDER BY nome ASC";
  $resultado_listar = mysqli_query($conn, $listar);

if (isset($_GET['ordem'])) {

    $ordem = $_GET['ordem'];

  if ($ordem = $_GET['ordem'] == 'alfabetica') {

  $listar = "SELECT * FROM loja_produtos WHERE status = 'ativo' ORDER BY nome ASC";
  $resultado_listar = mysqli_query($conn, $listar);

  }

  if ($ordem = $_GET['ordem'] == 'menor-preco') {

  $listar = "SELECT * FROM loja_produtos WHERE status = 'ativo' ORDER BY preco ASC";
  $resultado_listar = mysqli_query($conn, $listar);

  }

  if ($ordem = $_GET['ordem'] == 'maior-preco') {

  $listar = "SELECT * FROM loja_produtos WHERE status = 'ativo' ORDER BY preco DESC";
  $resultado_listar = mysqli_query($conn, $listar);

  }
}


 ?>
 
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title><?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Produtos</title>
<meta name="description" content="<?php echo utf8_encode ($carrega_dadosEmpresa['sobre_empresa'])?>">
<meta name="author" content="Rafael Ferreira - Mestre Moveleiro">

<meta property="og:locale" content="pt_BR" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Produtos" />
<meta property="og:description" content="<?php echo utf8_encode ($carrega_dadosEmpresa['sobre_empresa'])?>" />
<meta property="og:url" content="http://www.mestremoveleiro.com.br/produtos" />
<meta property="og:site_name" content="<?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?>" />
<meta name="robots" content="index, follow">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<meta name=viewport content="width=device-width, initial-scale=1">

<link rel="shortcut icon" href='../img/logo-topo.png' />
<link rel="stylesheet" href="css/style-produtos.css">
<link rel="stylesheet" href="../css/style.css">
  
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

  <div class="titulo-container-produtos" style="width: 100%; float: left;">
    <p style="float: left; font-size: 28px !important; color: #666666; margin-left: 10px; margin-right: 10px;">Nossos produtos</p>

     <div class="filtroOrdem">

     <div class='category_listfiltro'>
          <button class='dropbtnfiltro'>Ordenar por<span class='icon fas fa-angle-down' id='icon-drop'></span></button>
          <div class='dropdown-contentfiltro'>

            <a href='/produtos?ordem=alfabetica'>Ordem alfabética</a>
            <a href='/produtos?ordem=menor-preco'>Menor preço</a>
            <a href='/produtos?ordem=maior-preco'>Maior preço</a>                   

          </div>
        </div>

     </div>

  </div>
    
    <div class="container-produtos-itens" style="width: 100%; float: left;">

      <?php while($listar_produtos = mysqli_fetch_assoc($resultado_listar)){ ?>

        <!-- PRODUTO -->
        <a href="mmp?<?php echo utf8_encode (str_replace (" ", "-",$listar_produtos["nome"])); ?>&produto=<?php echo utf8_encode ($listar_produtos["id"]); ?>">
        <div class="border-item-produto">
        <div class="item-produto">
        <img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($listar_produtos["foto"]); ?>" alt=""> <!-- FOTO -->

        <div class="informacoesProduto" style="float: left; width: 100%; max-height: 100px; min-height: 100px;">

<?php 
error_reporting(0);

$buscaPrecoAntigo = $listar_produtos["preco_antigo"];
$precoVenda = $listar_produtos["preco"];

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
        <p id="preco">R$ <?php echo utf8_encode (number_format($listar_produtos["preco"], 2,',','.')); ?></p>
        <p id="nomeProduto"><?php echo utf8_encode ($listar_produtos["nome"]); ?></p> 
        </div>

        </a>

        </div></div>
       

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


