<?php 

if (!isset($_SESSION)){session_start();}
include_once("../system/verifica_sessao.php");

//BUSCA OS DADOS DO PEDIDO NO MYSQL
 $pesquisa_pedido = "SELECT * FROM loja_pedidos";
 $resultado_pedido = mysqli_query($conn, $pesquisa_pedido);

 ?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Pedidos Clientes</title> <!-- INFO 1 -->
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
 padding: 0 20px;
 padding-bottom: 30px;
 margin-bottom: 30px;
 border-bottom: 1px solid #dddddd;
}
/*========================*/
.container-pesquisa{
 float: left;
 display: flex;
 width: 80%;  
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
 width: 20%; 
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

</style>

</head>

<?php include('../tarja_topo.php') ?>

<div class="container-area-administrador">

<!-- MENU LATERAL -->
<?php include('../menu_lateral.php'); ?>

<div class="conteudo-principal"> 
	<div class="container-conteudo">
	
		<div class="titulo-categotia-adm"><h2>Pedidos Clientes</h2></div>

    <div class="container-m2">
   
    <div class="container-addPedidos">
     <!-- <div class="button-add-produto"><a href="cadastrar_produto.php">+ Pedido</a></div> -->
    </div>  

    </div>

    <div class="container-lista-pedidosClientes">

<style>

/*==============================*/
.pedidosClientes{width: 100%;}
.header{padding: 16px; font-size: 14px !important; font-weight: 700; text-align: center; color: #fff; background: #014d8f;}
.cell{position: relative; padding: 14px; font-size: 14px !important; text-align: center; border: 0; border-bottom: 1px solid #c4c4c4;}

.button-detalhesPedido{
 padding: 8px 20px;
 background: #ffc11e;
 color: #fff;
 border-radius: 5px;
 text-decoration: none;
}
.button-detalhesPedido:hover{ color: #fefefe; background: #ffb900;}
 


</style>

    <table class="pedidosClientes">

       <thead>
         <tr>
           <th class="header">N° pedido</th>
           <th class="header">Data</th>
           <th class="header">Valor</th>
           <th class="header">Status</th>
           <th class="header"></th>
         </tr>
       </thead>     

     <?php while($carregar_pedido = mysqli_fetch_assoc($resultado_pedido)){ ?>

     <?php 

     $valorProdutos = $carregar_pedido["valor_produtos"];
     $valorFrete = $carregar_pedido["valor_frete"];
     $valorDesconto = $carregar_pedido["valor_desconto"];

     $totalPedido = ($valorProdutos + $valorFrete - $valorDesconto)


     ?>

       <tbody>
         <tr>
           <td class="cell"><?php echo utf8_encode($carregar_pedido["id"]); ?></td>
           <td class="cell"><?php echo date('d/m/Y', strtotime($carregar_pedido["data_pedido"])); ?></td> 
           <td class="cell">R$ <?php echo number_format($totalPedido, 2,',','.'); ?></td>
           <td class="cell"><?php echo utf8_encode($carregar_pedido["status"]); ?></td>
           <td class="cell"><a href="detalhe_pedido.php?pedido=<?php echo utf8_encode($carregar_pedido["id"]); ?>" class="button-detalhesPedido">detalhes</a></td>
         </tr>
       </tbody>

     <?php } ?>


     </table>

    </div>

    </div>

	</div>


</body>

</html>
