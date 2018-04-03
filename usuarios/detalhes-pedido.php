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
  <title>Mestre Moveleiro | Detalhes do Pedido #01</title> <!-- INFO 1 -->
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

.container-detalhesPedido{
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
 .meus-pedido{width: 100%;}
 .header-pedido{padding: 16px; font-size: 12px !important; font-weight: 700; text-align: center; color: #151515; border-bottom: 1px solid #c4c4c4;}
 .header-pedido p{font-size: 12px !important;}

 .cell-pedido{position: relative; padding: 16px; font-size: 14px !important; text-align: center; border: 0; border-bottom: 1px solid #c4c4c4;}
 .cell-pedido p{font-size: 12px !important;}



}

/*=================================================================================*/

@media screen and (min-width:768px) {


}

/*=================================================================================*/

/* PARA PC **/
@media screen and (min-width:1025px) {

.container-detalhesPedido{
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

    <div class="texto-container" style="border-bottom: 1px solid #c4c4c4;"><p>Detalhes do Pedido #01548454154 03/04/2018</p></div>

    <?php include_once('menu_usuario.php'); ?>

    <div class="container-detalhesPedido">
       <div class="pedido-detalhes">  

       <div class="statusPedido"><p><b>Status do pedido:</b> Solicitado</p></div>     

        <table class="detalhes-pedido">

       <thead>
         <tr>
           <th class="header-pedido" style="text-align: left;">Itens do pedido</th>
           <th class="header-pedido"></th>
           <th class="header-pedido">Ferragem</th>
           <th class="header-pedido">Assento/Tampo</th>
           <th class="header-pedido">Qtd</th>
           <th class="header-pedido">Valor</th>
           <th class="header-pedido">Subtotal</th>
           <th class="header-pedido"></th>
         </tr>
       </thead>     

     <tbody>
       <tr>
         <td class="cell-pedido"><img src="../produtos/img-produtos/produto10.jpg" alt="" style="height: 80px; width:auto;"></td>
         <td class="cell-pedido" style="text-align: left;"><p>Conjunto de mesa com cadeiras </p></td>
         <td class="cell-pedido"><p>Branco</p></td>
         <td class="cell-pedido"><p>Vermelho</p></td>
         <td class="cell-pedido"><p>100</p></td>
         <td class="cell-pedido"><p>R$ 100,00</p></td>
         <td class="cell-pedido"><p>R$ 10.000,00</p></td>
       </tr>
     </tbody>

     <tbody>
       <tr>
         <td class="cell-pedido"><img src="../produtos/img-produtos/produto1.jpg" alt="" style="height: 80px; width:auto;"></td>
         <td class="cell-pedido" style="text-align: left;"><p>Cadeira Tiffany Italia</p></td>
         <td class="cell-pedido"><p>Marrom</p></td>
         <td class="cell-pedido"><p>Branco</p></td>
         <td class="cell-pedido"><p>100</p></td>
         <td class="cell-pedido"><p>R$ 100,00</p></td>
         <td class="cell-pedido"><p>R$ 10.000,00</p></td>
       </tr>
     </tbody>     

     </table>

     <p class="totalPedido" style="float: right; text-align: right; width: 100%; padding-top: 20px; font-size: 18px !important; margin-right: 30px;"><b>Total: R$ 10.000,00</b></p>

     <div class="fretePedido"><p>Valor do frete: R$ 1.500,00</p></div>

<style>

/*MENSAGENS ================*/

/**/
.mensagens{float: left; width: 100%;border: 1px solid #dfdfdf; margin-top: 60px; padding: 20px; border-radius: 5px;}
.textMensagens{float: left; width: 100%;}
.textMensagens p{font-size: 16px !important; color: #888;}

/**/
.conversaPedido{float: left; width: 100%; padding-top: 20px; padding-bottom: 20px;}
.mensagemItem{float: left; width: 100%; margin-bottom: 10px;}
.mensagemItem p{font-size: 14px !important; margin: 0;}
#mensagemCliente{float: right; padding: 10px 20px; background: #e3e3e3; color:#151515; max-width: 400px; border-radius: 15px 15px 0px 15px; text-align: left; }
#mensagemAtendente{float: left; padding: 10px 20px; background: #014d8f; color:#fff; max-width: 400px; border-radius: 15px 15px 15px 0px; text-align: left}
#time{width: 100%; font-size: 9px !important; text-align: right; color: #c4c4c4;}

/**/
mandar-mensagem{ float: left;width: 100%; }

.mensage-pedido{float: left; width: 85%; border: 1px solid #ccc; padding: 5px 10px; border-radius: 5px;
 margin-bottom: 0; padding: 9px 17px; font-size: 14px; min-height: 90px; max-height: 100px; resize: none!important;}

.mensage-pedido:focus{border: 1px solid #014d8f;}

.button-enviarMensagem{float: left; width: 14%; margin-left: 1%;}

.button-enviarMensagem{ width: 14%; margin-left: 1%; font-size: 16px !important; padding: 8px 20px; background: #014d8f; color: #fff; border-radius: 5px; text-decoration: none;}
.button-enviarMensagem:hover{ color: #fefefe; background: #014d8f;}

</style>

     <div class="mensagens">
       <div class="textMensagens"><p>Menssagens do pedido #01548454154</p></div>

       <div class="conversaPedido">

         <div class="mensagemItem">
           <div id="mensagemCliente">
           <p><b>Rafael Ferreira</b></p>
           <p>Olá, gostaria de saber mais informações sobre o envio do produto!</p>
           <p id="time">15:30</p>
           </div>
         </div>

         <div class="mensagemItem">
           <div id="mensagemAtendente">
           <p><b>Mestre Moveleiro</b></p>
           <p>Como possso te ajudar, quais informações são necessárias?</p>
           <p id="time">15:31</p>
           </div>
         </div>

         <div class="mensagemItem">
           <div id="mensagemCliente">
           <p><b>Rafael Ferreira</b></p>
           <p>Gostaria de informações sobre o envio dele.</p>
           <p id="time">15:32</p>
           </div>
         </div>

         <div class="mensagemItem">
           <div id="mensagemAtendente">
           <p><b>Mestre Moveleiro</b></p>
           <p>Certo, O seu prduto foi enviado pela transfortadoraX no dia 03/04/2018! O prazo de entrega é de 15 dias úteis! Ajudo em mais algo?</p>
           <p id="time">15:33</p>
           </div>
         </div> 

       </div>

       <div class="mandar-mensagem">
         <textarea class="mensage-pedido" rows="1" placeholder="Mensagem..." style="overflow-x: hidden; word-wrap: break-word;"></textarea>   

         <input type="submit" class="button-enviarMensagem" value="enviar">
       </div>

     </div>


     </div>
    </div>
      

    </div>


  </div>
</div>

<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>

</body>


</html>


