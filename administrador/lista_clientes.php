<?php 

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

 $listar = "SELECT * FROM clientes";
 $resultado_listar = mysqli_query($conn, $listar);

 ?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre moveleiro | Lista de Clientes</title> <!-- INFO 1 -->
  <meta name="author" content="Rafael Ferreira">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script> <!-- ICONES -->
  <meta name=viewport content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href='../img/logo-topo.png' /> <!-- INFO 3 -->
  <link rel="stylesheet" href="css/style-painel_adm.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

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
.container-addCliente{
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
.container-lista-clientes{
 float: left;
 width: 100%;  
}

/**************/
.cliente-item{
 float: left;
 width: 100%;
 padding: 0 20px;
 display: flex;
 margin-bottom: 20px;
 border-bottom: 1px solid #dddddd;
}
.status-produto{
 float: left;
 width: 60px;
 height: 100px;
}
.status-produto p{
 font-size: 18px;
 color: #151515;
 text-align: center;
 margin-top: 25px;
}
.codigo-cliente{
 float: left;
 width: 55px;
 height: 100px;
}
.codigo-cliente p{
 font-size: 18px;
 color: #151515;
 text-align: center;
 margin-top: 25px;
}
.imagem-item-cliente{
 float: left;
 width: 100px;
 height: 100px;
 padding: 5px;
}
.imagem-item-cliente img{
 width: 80px;
 height: 60px;
 margin-top: 10px;
}
.nome-cliente{
 float: left;
 width: 900px;
 height: 100px;
 padding: 5px;
}
.nome-cliente p{
 font-size: 18px;
 color: #151515;
 margin-top: 25px;
}
.button-editar-cliente, .button-excluir-produtos {
 float: left;
 height: 100px; 
}
/* BOTÃO EDITAR **/
.button-editar-cliente a{
 float: left;
 padding: 8px 20px;
 background: #014d8f;
 color: #fff;
 border-radius: 5px;
 margin-top: 25px;
 text-decoration: none;
}
.button-editar-cliente a:hover{background: #092a47;}

</style>

</head>

<?php include('tarja_topo.php') ?>

<div class="container-area-administrador">

<!-- MENU LATERAL -->
<?php include('menu_lateral.php'); ?>


<div class="conteudo-principal"> 
	<div class="container-conteudo">
	

		<div class="titulo-categotia-adm"><h2>Lista de clientes</h2></div>

    <div class="container-m2">

    <div class="container-pesquisa">
      <p>Pesquisa:</p> <input type="text" class="campo-form" placeholder="Descrição 1" required="" name="descricao1">
    </div>  

    <div class="container-addCliente">
      <div class="button-add-produto"><a href="cadastrar_cliente.php">+ Cliente</a></div>
    </div>  

    </div>

    


    <div class="container-lista-clientes">

     <div class="lista-itens-cliente">

     <?php while($listar_clientes = mysqli_fetch_assoc($resultado_listar)){ ?>

       <div class="cliente-item">     

         <div class="codigo-cliente"><p><?php echo utf8_encode ($listar_clientes["id"]); ?></p></div>

         <div class="imagem-item-cliente"><img src="http://www.mestremoveleiro.com.br/clientes/img-clientes/<?php echo utf8_encode ($listar_clientes["foto"]); ?>" alt=""></div>  

         <div class="nome-cliente"><p><?php echo utf8_encode ($listar_clientes["cliente"]); ?></p></div>      

         <div class="button-editar-cliente"><a href="editar_cliente.php?codigo=<?php echo utf8_encode ($listar_clientes["id"]); ?>">editar</a></div>
         
       </div>

       <?php } ?>
      
     </div>
       



    </div>

	</div>

</div>

</div>

</body>

</html>
