<?php 

if (!isset($_SESSION)){session_start();}
include_once("../../system/verifica_sessao.php");


//BUSCA OS DADOS DO CLIENTE NO MYSQL
$pesquisa_clientes = "SELECT * FROM loja_clientes";
$resultado_clientes = mysqli_query($conn, $pesquisa_clientes);

if (isset($_GET['ordem'])) {

    $ordem = $_GET['ordem'];

  if ($ordem = $_GET['ordem'] == 'pedido') {

  $pesquisa_pedido = "SELECT * FROM loja_pedidos ORDER BY id DESC";
  $resultado_pedido = mysqli_query($conn, $pesquisa_pedido);

  }

  if ($ordem = $_GET['ordem'] == 'data') {

  $pesquisa_pedido = "SELECT * FROM loja_pedidos ORDER BY data_pedido DESC";
  $resultado_pedido = mysqli_query($conn, $pesquisa_pedido);

  }

  if ($ordem = $_GET['ordem'] == 'nome') {

  $pesquisa_pedido = "SELECT * FROM loja_pedidos ORDER BY preco DESC";
  $resultado_pedido = mysqli_query($conn, $pesquisa_pedido);

  }

  if ($ordem = $_GET['ordem'] == 'status') {

  $pesquisa_pedido = "SELECT * FROM loja_pedidos ORDER BY status ASC";
  $resultado_pedido = mysqli_query($conn, $pesquisa_pedido);

  }

  if ($ordem = $_GET['ordem'] == 'menor-valor') {

  $pesquisa_pedido = "SELECT * FROM loja_pedidos ORDER BY valor_produtos ASC";
  $resultado_pedido = mysqli_query($conn, $pesquisa_pedido);

  }

  if ($ordem = $_GET['ordem'] == 'maior-valor') {

  $pesquisa_pedido = "SELECT * FROM loja_pedidos ORDER BY valor_produtos DESC";
  $resultado_pedido = mysqli_query($conn, $pesquisa_pedido);

  }

}


if (isset($_POST['fazer_busca'])) {

$clientePesquisa = $_POST['pesquisar_cliente']; 

echo "<script> location.href='http://mm.siteoficial.ws/administrador/vendas/clientes?pesquisa=$clientePesquisa'; </script>";

}

if (isset($_GET['pesquisa'])) {

  $pesquisa = $_GET['pesquisa'];

  $pesquisa_pedido = "SELECT * FROM loja_pedidos WHERE nome LIKE '%$pesquisa%' ORDER BY preco ASC";
  $resultado_pedido = mysqli_query($conn, $pesquisa_pedido);

}


 ?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Lista de Clientes Cadastrados</title> <!-- INFO 1 -->
  <meta name="author" content="Rafael Ferreira">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- ICONES -->
  <meta name=viewport content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href='../../../img/logo-topo.png' /> <!-- INFO 3 -->
  <link rel="stylesheet" href="../../css/style-painel_adm.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

  <meta name="robots" content="noindex, nofollow">

<style>

.container-m2{
 float: left;
 width: 100%;
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
.container-addPedidos{
 float: left;
 text-align: right;
}
.button-add-produto a{
 padding: 8px 20px;
 background: #555;
 color: #fff;
 border-radius: 5px;
 text-decoration: none;  
}
/*==========================*/
.container-lista-pedidosClientes{
 float: left;
 width: 100%;  
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
 border: 1px solid #ddd;
 z-index: 99;
}

.dropdown-contentfiltro a {
 color: black;
 color: #333;
 padding: 6px 8px;
 text-decoration: none;
 display: block;
}
#icon-drop{ color: #fff; margin-left: 10px; }

.dropdown-contentfiltro a:hover {color: #fff; background: #3d566d; }

.category_listfiltro:hover .dropdown-contentfiltro {
    display: block;
}

.dropdown:hover .dropbtnfiltro {
}


</style>

</head>

<?php include('../../tarja_topo.php') ?>

<div class="container-area-administrador">

<!-- MENU LATERAL -->
<?php include('../../menu_lateral.php'); ?>

<div class="conteudo-principal"> 
	<div class="container-conteudo">
	
		<div class="titulo-categotia-adm"><h2><i class="fas fa-users"></i> Lista de Clientes</h2></div>

    <div class="container-m2">


      <div class="barraPesquisa" style="float: left; width: 100%; margin-bottom: 10px;">

        <form method="post">

         <input type="text" class="campo-form" placeholder="Buscar Cliente..." name="pesquisar_cliente" style="width: 90%; height: 35px; margin-left: 0;">
         <input type="submit" value="⌕" class="campo-form button-buscar" name="fazer_busca" style="width: 30px !important; height: 35px; margin-top: 10px; margin: -25px; background: #333; color: #fff; ">

        </form>
        
      </div>


      <div class='category_listfiltro' style="margin-left: 0px;">
          <button class='dropbtnfiltro'><i class="fas fa-filter"></i> Ordenar por<span class='icon fas fa-angle-down' id='icon-drop'></span></button>
          <div class='dropdown-contentfiltro'>

            <a href='http://mm.siteoficial.ws/administrador/vendas/clientes?ordem=status'>ID</a>
            <a href='http://mm.siteoficial.ws/administrador/vendas/clientes?ordem=pedido'>Alfabetica</a>
            <a href='http://mm.siteoficial.ws/administrador/vendas/clientes?ordem=data'>Data de Cadastro</a>
            <!--<a href='http://mm.siteoficial.ws/administrador/vendas/clientes?ordem=nome'>Nome</a>-->
            
            <div class="dividir" style="height: 1px; margin: 12px 0; overflow: hidden; background-color: #c4c4c4;"></div>

            <a href='http://mm.siteoficial.ws/administrador/vendas/clientes?ordem=menor-valor'>Menor Valor</a>
            <a href='http://mm.siteoficial.ws/administrador/vendas/clientes?ordem=maior-valor'>Maior Valor</a>

          </div>
        </div>

   
        <div class="container-addPedidos">
         <!-- <div class="button-add-produto"><a href="cadastrar_produto.php">+ Pedido</a></div> -->
        </div>  

    </div>

    <div class="container-lista-pedidosClientes">

<style>

/*==============================*/

 /*MENU DROP LISTA DE CLIENTES*/
.item-listaClientes{
 width: 100%;
}
#margin-left{
 margin-right: 10px;
 padding-top: 10px;
 padding-bottom: 10px;
}
#iconCC{font-size: 18px !important; margin-left: 10px; color: #014d8f}
#iconCC:hover{color: #014d8f;}


/*****************/
.listaClientes{width: 100%;}
.header-cliente{padding: 16px; font-size: 14px !important; font-weight: 700; text-align: center; color: #fff; background: #014d8f;}
.cell-cliente{position: relative; padding: 14px; font-size: 14px !important; text-align: center; border: 0; border-bottom: 1px solid #c4c4c4;}


</style>

<div class="item-listaClientes">  

<table class="listaClientes">

       <thead>
         <tr>
           <th class="header-cliente">Id</th>
           <th class="header-cliente">Nome</th>
           <th class="header-cliente">Cidade</th>
           <th class="header-cliente">Data de cadastro</th>
           <th class="header-cliente"></th>
         </tr>
       </thead>   

<?php while($carrega_dados = mysqli_fetch_assoc($resultado_clientes)){ ?>   

       <tbody>
         <tr>
           <td class="cell-cliente">#<?php echo utf8_encode ($carrega_dados["id_cliente"]); ?></td>
           <td class="cell-cliente"><?php echo utf8_encode ($carrega_dados["nome"]); ?></td> 
           <td class="cell-cliente"><?php echo utf8_encode ($carrega_dados["cidade"]); ?></td> 
           <td class="cell-cliente"><?php echo date('d/m/Y', strtotime($carrega_dados["data_cadastro"])); ?></td> 
           <td class="cell-cliente"><a href="editar-dados-cliente?codigo=<?php echo utf8_encode ($carrega_dados["id_cliente"]); ?>" alt="Ver dados do cliente"><i class="fas fa-share" id="iconCC"></i></a></td> 
         </tr>
       </tbody>

     <?php } ?>


</table>


</div>

</div>

</div>
</div>


</body>

</html>