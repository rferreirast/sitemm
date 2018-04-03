<?php 
/*
include_once("system/connect.php");

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

 $email = $_SESSION['sessao_usuario'];

//CARREGA PRODUTO 
 $pesquisa = "SELECT * FROM loja_clientes WHERE email = '$email'";
 $resultado_pesquisa = mysqli_query($conn, $pesquisa);
 $carrega_dados = mysqli_fetch_assoc($resultado_pesquisa);


*/
 ?>
 
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Meus pedidos</title> <!-- INFO 1 -->
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
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
  <script src="js/mascara_numeros.js" type="text/javascript"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>


<style>
@media screen and (min-width:320px) {

.container-meus-dados{float: left; width: 100%; min-height: 500px;}
.margin-meus-pedidos{
 width: 90%;
 margin: auto;
}
.formulario-meus-dados{
 float: left;
 width: 100%;
 background: #fff;
 min-height: 500px;
 border-radius: 10px;
 margin-top: 40px;
 margin-bottom: 40px;
 box-shadow: 0px 5px 15px 2px rgba(0,0,0,.2);
 padding: 20px 20px;
}
.texto-container p{
 color: #333;
 font-size: 22px !important;
 font-weight: 400;
 padding: 10px 20px;
 border-radius: 10px;
 text-align: left;
}

/*===================*/

.container-meusPedidos{
 float: left;
 width: 100%;
 padding: 20px;
 margin-top: 10px;
 min-height: 300px;
 border-radius: 5px;
 border-bottom: 1px solid #c4c4c4;
 border-left: 1px solid #c4c4c4;
 border-right: 1px solid #c4c4c4;
 margin-bottom: 40px;
}

. p{
 color: #014d8f;
 font-size: 22px !important;
 font-weight: 400;
 text-decoration: none;
}


/*==============================*/
 .meus-pedidos{width: 100%;}
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


}

/*=================================================================================*/

@media screen and (min-width:768px) {


}

/*=================================================================================*/

/* PARA PC **/
@media screen and (min-width:1025px) {

.container-meusPedidos{
 width: 83%;
 margin-left: 2%;
}

.margin-meus-pedidos{
 width: 80%;
}


}

</style>


</head>

<body style="background: #fff;">

<!-- ANALYTICS -->
<?php include('../souce=analytics.php'); ?>

<!-- LOGO -->
<?php include('../tarja-topo.php'); ?>

<!-- MENU -->
<?php include('../menu.php'); ?>

<div class="container-meus-dados">
  <div class="margin-meus-pedidos">
    
    <div class="formulario-meus-dados">

    <div class="texto-container" style="border-bottom: 1px solid #c4c4c4;"><p>Meus Pedidos</p></div>

    <?php include_once('menu_usuario.php'); ?>

    <div class="container-meusPedidos"> 

    <table class="meus-pedidos">

       <thead>
         <tr>
           <th class="header">N° pedido</th>
           <th class="header">Data</th>
           <th class="header">Valor</th>
           <th class="header">Status</th>
           <th class="header"></th>
         </tr>
       </thead>     

     <tbody>
       <tr>
         <td class="cell">01</td>
         <td class="cell">03/04/2018</td>
         <td class="cell">R$ 10.000,00</td>
         <td class="cell">Solicitado</td>
         <td class="cell"><a href="detalhes-pedido.php?pedido=01" class="button-detalhesPedido">detalhes</a></td>
       </tr>
     </tbody>

     <tbody>
       <tr>
         <td class="cell">02</td>
         <td class="cell">03/04/2018</td>
         <td class="cell">R$ 15.000,00</td>
         <td class="cell">Solicitado</td>
         <td class="cell"><a href="" class="button-detalhesPedido">detalhes</a></td>
       </tr>
     </tbody>

     </table>

    </div>
      

    </div>


  </div>
</div>

<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>

</body>


</html>


