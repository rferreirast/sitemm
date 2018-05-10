<?php 

if (!isset($_SESSION)){session_start();}
include_once("../system/verifica_sessao.php");

 $listar = "SELECT * FROM loja_produtos";
 $resultado_listar = mysqli_query($conn, $listar);

 //CARREGA CATEGORIAS 
 $pesquisa_categoria = "SELECT * FROM categorias";
 $resultado_categorias = mysqli_query($conn, $pesquisa_categoria);

if (isset($_GET['ordem'])) {

    $ordem = $_GET['ordem'];

  if ($ordem = $_GET['ordem'] == 'status') {

  $listar = "SELECT * FROM loja_produtos ORDER BY status DESC";
  $resultado_listar = mysqli_query($conn, $listar);

  }

  if ($ordem = $_GET['ordem'] == 'alfabetica') {

  $listar = "SELECT * FROM loja_produtos ORDER BY nome ASC";
  $resultado_listar = mysqli_query($conn, $listar);

  }

  if ($ordem = $_GET['ordem'] == 'menor-preco') {

  $listar = "SELECT * FROM loja_produtos ORDER BY preco ASC";
  $resultado_listar = mysqli_query($conn, $listar);

  }

  if ($ordem = $_GET['ordem'] == 'maior-preco') {

  $listar = "SELECT * FROM loja_produtos ORDER BY preco DESC";
  $resultado_listar = mysqli_query($conn, $listar);

  }
}

if (isset($_POST['fazer_busca'])) {

$produtoPesquisa = $_POST['pesquisar_produtos']; 

echo "<script> location.href='http://mm.siteoficial.ws/administrador/produtos/lista_produtos?pesquisa=$produtoPesquisa'; </script>";

}

if (isset($_GET['pesquisa'])) {

  $pesquisa = $_GET['pesquisa'];

  $listar = "SELECT * FROM loja_produtos WHERE nome LIKE '%$pesquisa%' ORDER BY preco ASC";
  $resultado_listar = mysqli_query($conn, $listar);

  }


 ?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Lista de Produtos</title> <!-- INFO 1 -->
  <meta name="author" content="Rafael Ferreira">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- ICONES -->
  <meta name=viewport content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href='../../img/logo-topo.png' /> <!-- INFO 3 -->
  <link rel="stylesheet" href="../css/style-painel_adm.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

  <meta name="robots" content="noindex, nofollow">

<style>

.container-m2{
 float: left;
 width: 100%;
 display: flex;
 padding-bottom: 30px;
 margin-bottom: 30px;
 border-bottom: 1px solid #dddddd;
}
/*========================*/
.container-pesquisa{
 float: left;
 width: 100%;  
}
.campo-form{
 font-size: 15px;
 border-radius: 3px;
 color: #343434;
 background-color: #fff;
 box-sizing: border-box;
 height: 32px;
 padding: 0px 0.4em;
 width: 400px;
 margin-left: 10px;
 border: 1px solid #c4c4c4 !important; 
}
/*========================*/
.container-addProduto{
 float: right;
 text-align: right;
 margin-top: 15px;
}
.button-add-produto a{
 padding: 8px 20px;
 background: #014d8f;
 color: #fff;
 border-radius: 5px;
 text-decoration: none;  
}
/*==========================*/
.container-lista-produtos{
 float: left;
 width: 100%;  
}

/**************/
.produto-item{
 float: left;
 width: 100%;
 margin-bottom: 20px;
 border: 1px solid #014d8f;
 border-radius: 5px;
}
.status-produto{
 float: left;
 padding: 5px;
 height: 100px;
}
.status-produto p{
 font-size: 14px;
 color: #151515;
 text-align: center;
 margin-top: 25px;
}
.codigo-produto{
 float: left;
 padding: 5px;
 margin-left: 10px;
}
.codigo-produto p{
 font-size: 16px;
 color: #fff;
 text-align: center;
}

/*******************************/
.imagem-item-produto{
 float: left;
 width: 100px;
 height: 100px;
 padding: 5px;
}
.imagem-item-produto img{
 width: 100%;
}
.categoriaProduto, .custoProduto, .precoProduto, .lucroProduto, .medidasProduto, .pesoProduto{
 float: left;
 width: auto;
 padding: 5px;
 margin-left: 10px;
 margin-top: 25px;
 display: flex;
}

span#produto{
 color: #919191;
} 
.categoriaProduto, .custoProduto, .precoProduto, .lucroProduto, .medidasProduto, .pesoProduto p{
 font-size: 14px; 
 color: #151515;
}

.descricao-produto{
 float: left;
 padding: 5px;
}
.descricao-produto p{
 font-size: 16px;
 color: #fff;
}
.ver-naLoja{
 float: right;
 padding: 5px;
 margin-right: 10px;
}
.ver-naLoja a{
 font-size: 16px;
 color: #fff; 
}


.button-editar-produtos, .button-excluir-produtos {
 float: right;
 height: 100px; 
}
/* BOTÃO EDITAR **/
.button-editar-produtos a{
 float: left;
 padding: 8px 20px;
 background: #014d8f;
 color: #fff;
 border-radius: 5px;
 margin-top: 25px;
 text-decoration: none;
}
.button-editar-produtos a:hover{background: #092a47;}

/* BOTÃO EXCLUIR **/
.button-excluir-produtos a{
 float: left;
 padding: 8px 20px;
 background: #c40f0f;
 color: #fff;
 border-radius: 5px;
 margin-top: 25px;
 text-decoration: none;
 margin-left: 10px;
}
.button-excluir-produtos a:hover{background: #890a0a;}


/*===========================*/
.item a{
 color: #014d8f;
 font-weight: bold;
}
.item b{
 font-weight: bold;
}
.item input{
 display: none;
}
.item input:checked ~ ul{
 height: auto;
 max-height: 1500px;
 transform: all;
 padding-top: 20px;
 padding-bottom: 25px;
 margin-left: 10px;
}


/*MENU DROP ORDEM PRODUTOS*/
.category_listfiltro {
 float: left;
 display: inline-block;
}
.dropbtnfiltro {
 color: #fff;
 font-size: 15px !important;
 background: #014d8f;
 padding: 4px 10px;
 margin-top: 15px;
 font-weight: bold;
 cursor: pointer;
 border-radius: 5px;
 margin-bottom: 2px;
}

.dropdown-contentfiltro {
 display: none;
 position: absolute;
 background-color: transparent;
 border-bottom: 2px;
 background-color: #fff;
 min-width: 185px;
 border-radius: 5px;
 padding: 0px 0;
}

.dropdown-contentfiltro a {
 color: black;
 color: #333;
 padding: 12px 16px;
 border-left: 2px solid #014d8f;
 border-bottom: 1px solid #c4c4c4;
 text-decoration: none;
 display: block;
}
#icon-drop{ color: #fff; margin-left: 10px; }

.dropdown-contentfiltro a:hover {color: #3887f5; border-left: 2px solid #3887f5;}

.category_listfiltro:hover .dropdown-contentfiltro {
    display: block;
}

.dropdown:hover .dropbtnfiltro {
}
</style>

</head>

<?php include('../tarja_topo.php') ?>

<div class="container-area-administrador">

<!-- MENU LATERAL -->
<?php include('../menu_lateral.php'); ?>


<div class="conteudo-principal"> 
	<div class="container-conteudo">
	

		<div class="titulo-categotia-adm"><h2><i class="fas fa-cube"></i> Lista de produtos</h2></div>

    <div class="container-m2">

    <div class="container-pesquisa">

      <div class="barraPesquisa" style="float: left; width: 100%; margin-bottom: 10px;">

        <form method="post">

         <input type="text" class="campo-form" placeholder="Buscar Produtos..." name="pesquisar_produtos" style="width: 90%; height: 35px; margin-left: 0;">
         <input type="submit" value="⌕" class="campo-form button-buscar" name="fazer_busca" style="width: 30px !important; height: 35px; margin-top: 10px; margin: -25px; background: #333; color: #fff; ">

        </form>
        
      </div>

        <div class="category_listfiltro">
          <button class="dropbtnfiltro"><i class="fas fa-cube"></i> Categorias <span class="icon fas fa-angle-down" id='icon-drop'></span></button>
          <div class="dropdown-contentfiltro">

            <a href="#" class="category_item" category="0">Todos</a>

            <?php while($carregar_categorias = mysqli_fetch_assoc($resultado_categorias)){ ?>               

                  <a href="#" class="category_item" category="<?php echo utf8_encode ($carregar_categorias["categoria"]); ?>"><?php echo utf8_encode ($carregar_categorias["categoria"]); ?></a>

                <?php } ?> 

          </div>
        </div>

        <div class='category_listfiltro' style="margin-left: 20px;">
          <button class='dropbtnfiltro'><i class="fas fa-filter"></i> Ordenar por<span class='icon fas fa-angle-down' id='icon-drop'></span></button>
          <div class='dropdown-contentfiltro'>

            <a href='http://mm.siteoficial.ws/administrador/produtos/lista_produtos?ordem=status'>Status</a>
            <a href='http://mm.siteoficial.ws/administrador/produtos/lista_produtos?ordem=alfabetica'>Ordem alfabética</a>
            <a href='http://mm.siteoficial.ws/administrador/produtos/lista_produtos?ordem=menor-preco'>Menor preço</a>
            <a href='http://mm.siteoficial.ws/administrador/produtos/lista_produtos?ordem=maior-preco'>Maior preço</a>                   
          </div>
        </div>


         <div class="container-addProduto">
          <div class="button-add-produto"><a href="cadastrar_produto.php"><i class="fas fa-plus"></i> Cadastrar</a></div>
        </div>


      </div>    

    </div>

    <div class="container-lista-produtos">

     <div class="lista-itens-produto">

     <?php while($listar_produtos = mysqli_fetch_assoc($resultado_listar)){ ?>


       <div class="produto-item product-item" category="<?php echo utf8_encode ($listar_produtos["categoria"]); ?>">

        <div class="tarja-top-produto" style="width: 100%; float: left; background: #014d8f; border-radius: 3px; ">

          <div class="codigo-produto"><p>#<?php echo utf8_encode ($listar_produtos["id"]); ?></p></div>
          <div class="descricao-produto"><p><?php echo utf8_encode ($listar_produtos["nome"]); ?></p></div>

          <div class="ver-naLoja"><a href="#" title="Ver na loja"><i class="fas fa-share-square"></i></a></div>
       
        </div>

        <div class="informacoesProduto" style="width: 100%; float: left; padding: 10px 20px;">

         <div class="status-produto"><p><?php echo utf8_encode ($listar_produtos["status"]); ?></p></div>
         
         <div class="imagem-item-produto"><img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($listar_produtos["foto"]); ?>" alt=""></div>

         <div class="categoriaProduto"><p><span id="produto">Categoria:</span> <?php echo utf8_encode ($listar_produtos["categoria"]); ?></p></div> 

         <div class="custoProduto"><p><span id="produto">Custo:</span> R$ <?php echo utf8_encode (number_format($listar_produtos["custo"], 2,',','.')); ?></p></div>

         <div class="precoProduto"><p><span id="produto">Preco:</span> R$ <?php echo utf8_encode (number_format($listar_produtos["preco"], 2,',','.')); ?></p></div>

<?php 

error_reporting(0);

//CALCULO DO LUCRO
 $precoVenda = $listar_produtos["preco"];
 $custo = $listar_produtos["custo"];

 $imposto = ($precoVenda * 0.1);
 $txCartao = ($precoVenda * 0.08);
 $txContribuicao = ($precoVenda * 0.4);

 //echo "$custo // $imposto // $txCartao // $txContribuicao";

 $somaDespesas = $custo + $imposto + $txCartao + $txContribuicao; 

 $valorLucro = $somaDespesas - $precoVenda;

 $lucro = number_format(-($valorLucro / $precoVenda)*100, 3,',','.');


//SE O PRODUTO TEM MENOS DE 10% DE LUCRO
 if ($lucro < 10) {

  echo " <div class='lucroProduto'><p style='color: #fff; background: #c0392b; font-weight: bold;'><span id='produto' style='color: #fff;
'>Lucro:</span> ".$lucro."% </p></div> ";
   
 }
 //SE O PRODUTO TEM MAIS DE 20% DE LUCRO
elseif ($lucro > 19.999) {

  echo "

   <div class='lucroProduto'><p style='color: #27ae60; font-weight: bold;'><span id='produto'>Lucro:</span> ".$lucro."% </p></div>

";
}else{

  echo "<div class='lucroProduto'><p><span id='produto'>Lucro:</span> ".$lucro."% </p></div> ";

 }

?>

         <div class="medidasProduto"><p><span id="produto">Medidas:</span> <?php echo utf8_encode ($listar_produtos["altura"]); ?>x<?php echo utf8_encode ($listar_produtos["comprimento"]); ?>x<?php echo utf8_encode ($listar_produtos["largura"]); ?></p></div> 

         <div class="pesoProduto"><p><span id="produto">Peso:</span> <?php echo utf8_encode ($listar_produtos["peso"]); ?> Kg</p></div>    

         <div class="button-editar-produtos"><a href="edita_produto.php?codigo=<?php echo utf8_encode ($listar_produtos["id"]); ?>"><i class="fas fa-cog"></i></a></div>

         </div>
         
       </div>

       <?php } ?>
      
     </div>    

    </div>

	</div>

</div>

</div>

</body>

<script>
      
      $(document).ready(function(){

        //$('.category_list .categoy_item[value="0"]');

        $('.category_item').click(function(){
          var catProduct = $(this).attr('category');
          console.log(catProduct);

          //OCULTA OS PRODUTOS
          $('.product-item').hide();

          //MOTRA OS PRODUTOS
          $('.product-item[category="'+catProduct+'"]').show();

        });

        $('.category_item[category="0"]').click(function(){
          //MOTRA TODOS PRODUTOS
          $('.product-item').show();
        

        });

      });

    </script>

</html>
