<?php 

include_once("../system/config.php");

include_once("system/connect.php");

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

$email = $_SESSION['sessao_usuario'];

//CARREGA DADOS CLIENTE 
 $pesquisa = "SELECT * FROM loja_clientes WHERE email = '$email'";
 $resultado_pesquisa = mysqli_query($conn, $pesquisa);
 $carrega_dados = mysqli_fetch_assoc($resultado_pesquisa);

error_reporting(0);
$id_cliente = utf8_encode($carrega_dados["id_cliente"]); //BUSCA O CODIGO DO CLIENTE
$id_pedido = intval($_GET['pedido']);  //BUSCA O ID DO PEDIDO NA URL
$nome = utf8_encode($carrega_dados["nome"]);

    //BUSCA OS DADOS DO PEDIDO NO MYSQL
     $pesquisa_pedido = "SELECT * FROM loja_pedidos WHERE id = '$id_pedido' ";
     $resultado_pedido = mysqli_query($conn, $pesquisa_pedido);
     $carregar_pedido = mysqli_fetch_assoc($resultado_pedido);

     //BUSCA OS PRODUTOS DO PEDIDO
     $pesquisa_produtosPedido = "SELECT * FROM loja_produtos_pedidos WHERE id_pedido = '$id_pedido' ";
     $resultado_listarproPedido = mysqli_query($conn, $pesquisa_produtosPedido);

     //BUSCA E LISTA AS MENSAGENS DO PEDIDO
     $pesquisa_mensagensPedido = "SELECT * FROM loja_mensagens_pedido WHERE id_pedido = '$id_pedido' ";
     $resultado_mensagensPedido = mysqli_query($conn, $pesquisa_mensagensPedido);

//DATA E HORA DO ENVIO DA MENSAGEM
date_default_timezone_set('America/Sao_Paulo');
 $data_atual = date('Y/m/d H:i');           

if (isset($_POST['enviar_mensagem'])) {
  $mensagem = utf8_decode($_POST["mensagem"]);

  //se vazio cancela operação
  if ($mensagem == "") {
     echo "<script>alert('Escreva a sua mensagem !!');</script>";
    }else{

      $salva_mensagem = "INSERT INTO loja_mensagens_pedido (id_pedido, quem_enviou, tipo_mensagem, mensagem, data_envio) VALUES ('$id_pedido', '$nome', 'mensagemCliente', '$mensagem', '$data_atual')";

      echo $salva_mensagem;

      if ($conn->query($salva_mensagem) === TRUE) {

      header("location: detalhes-pedido?pedido=$id_pedido"); 

    }else{

      echo "<script>
       alert('Algo deu errado, tente novamente !!');
       location.href='detalhes-pedido?pedido=$id_pedido';
       </script>";

    }
 }

}


 ?>
 
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">

<title><?php echo utf8_encode ($carrega_dadosEmpresa['nome'])?> | Detalhes do Pedido #<?php echo utf8_encode($carregar_pedido["id"]) ?></title>
<meta name="author" content="Rafael Ferreira - Mestre Moveleiro">

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

<meta name="robots" content="noindex, nofollow">


<style>

@media print{
    .content-topo-tarja{display:none;}
    .content-topo-menu{display:none;} 
    .imprimirPedido{display: none}
    #texto-topo{display: none;}   
    .container-menuUsuario{display:none;}  
    .mandar-mensagem{display: none;}  
    .footer{display:none;}

    .container-mensagens{display:block;}  

/*===============================================*/
    .cabecalho_impressao{      
    display: block !important;
    float: left;
    width: 100%;
    border: 1px solid #c4c4c4;
    margin-top: 10px;
    margin-bottom: 20px;
    text-align: left;
    }
    .imagem_cabecalho_impressao{float: left;}
    .imagem_cabecalho_impressao img{float: left; width: 300px; margin-top: 28px; margin-left: -40px;}
    .dados_cabecalho_impressao{float: left; margin-top: 10px;}
    .dados_cabecalho_impressao p{color: #151515; font-size: 12px !important;}

/*===============================================*/

    .container-dados{display:block; border-bottom: 1px solid #c4c4c4; margin-bottom: 20px;}

    .statusPedido{border-bottom: 1px solid #c4c4c4; margin-bottom: 20px;}
    .statusPedido p{color: #151515; font-size: 14px !important;}

    .header-pedido {
    padding: 16px;
    font-size: 12px !important;
    font-weight: 700;
    text-align: center;
    color: #151515;
    border-bottom: 1px solid #c4c4c4;
    }
    .cell-pedido{
    position: relative;
    padding: 16px;
    font-size: 14px !important;
    text-align: center;
    border: 0;
    border-bottom: 1px solid #c4c4c4;
    margin-bottom: 10px;
  }

  .totaisPedido{margin-bottom: 20px; margin-top: 20px;}
  .totaisPedido p{text-align: right; }

  .dadosCLiente{float: left; width: 100%; margin-bottom: 20px; margin-top: 10px; border-bottom: 1px solid #c4c4c4;}
  .dadosCliente-Iten{float: left; width: 33.3333%; }
    
}

@media screen and (min-width:320px) {

.container-meus-dados{float: left; width: 100%; min-height: 500px;}

.margin-meus-pedidos{
 width: 90%;
 margin: auto;
}

.texto-container p{
 color: #333;
 font-size: 16px !important;
 font-weight: 400;
 margin-left: 10px;
 border-radius: 10px;
 text-align: left;
}

/*==============================*/
 .meus-pedido{float: left; width: 100%;}
 .detalhes-pedido{float: left; width: 100%;}
 .header-pedido{padding: 16px; font-size: 12px !important; font-weight: 700; text-align: center; color: #151515; border-bottom: 1px solid #c4c4c4;}
 .header-pedido p{font-size: 12px !important;}

 .cell-pedido{position: relative; padding: 16px; font-size: 14px !important; text-align: center; border: 0; border-bottom: 1px solid #c4c4c4;}
 .cell-pedido p{font-size: 12px !important;}


/*TOTAIS DO PEDIDO=====================================*/
.totaisPedido{float: left ;width: 100%; margin-bottom: 20px; margin-top: 10px;}
.totaisPedido p{float: right; text-align: right; width: 100%; font-size: 16px !important; margin-right: 0px; margin-bottom: 5px; padding: 10px 0;}

/*DADOS DO CLIENTE NO PEDIDO ===================================*/

.dadosCLiente{float: left;width: 100%;}
.dadosCliente-Iten{float: left; width: 100%; margin-bottom: 20px;}
.dadosCliente-Iten p{color: #888; font-size: 14px !important; padding: 0; margin-bottom: 5px;}

}


/*=================================================================================*/

@media screen and (min-width:768px) {


}

/*=================================================================================*/

/* PARA PC **/
@media screen and (min-width:1025px) {

/*TOTAIS DO PEDIDO=====================================*/
.totaisPedido p{ margin-right: 10px;}

.margin-meus-pedidos{
 width: 80%;
}

.dadosCliente-Iten{ width: 33.333%}


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
    
    <div class="ct-geral">

    <div class="texto-container" style="border-bottom: 1px solid #c4c4c4;">

      <p style="color: #151515; font-size: 16px !important;" id="texto-topo">Detalhes do Pedido</p>

    <?php include_once('menu_usuario.php'); ?>

    <div class="container-dados">
       <div class="pedido-detalhes">  

       <?php $verifica_pedido = mysqli_query($conn,"SELECT * FROM loja_pedidos WHERE id = '$id_pedido' AND id_cliente = '$id_cliente' ");
        if (mysqli_num_rows($verifica_pedido) > 0) { ?>

        <style>
          .imprimirPedido{float: left; width: 100%; text-align: right; margin-bottom: 10px;}
          .imprimirPedido a{ color: #014d8f; font-size: 16px !important; }
        </style>

        <div class="imprimirPedido">
          <a href="#" onclick="window.print();" alt="Imprimir tela" title="Imprimir Pedido"><i class="fas fa-print"></i> <b>Imprimir Pedido</b></a>
        </div>

        <div class="cabecalho_impressao" style="display: none; float: left; width: 100%;">
         <div class="imagem_cabecalho_impressao">
         <img src="../img/logo2.png" alt="">         
         </div>
         <div class="dados_cabecalho_impressao">
         <p><b><?php echo utf8_encode ($carrega_dadosEmpresa['razao_social'])?></b></p>
         <p><?php echo utf8_encode ($carrega_dadosEmpresa['endereco'])?> | <?php echo utf8_encode ($carrega_dadosEmpresa['cidade'])?></p>
         <p>CNPJ: <?php echo utf8_encode ($carrega_dadosEmpresa['cnpj'])?> </p>
         <p style="float: left; margin-right: 10px;">Telefone: <?php echo utf8_encode ($carrega_dadosEmpresa['telefone'])?> |</p>
         <p style="float: left;">Whatsapp:<?php echo utf8_encode ($carrega_dadosEmpresa['whatsapp'])?></p>
         </div>
        </div>

       <div class="statusPedido" style="float: left; width: 100%;">
        <p style="float: left; color: #151515; font-size: 14px !important;"><b>Pedido:</b> <?php echo utf8_encode($carregar_pedido["id"]) ?> |</p>
        <p style="float: left; color: #151515; font-size: 14px !important;"><b>Status do pedido:</b> <?php echo utf8_encode($carregar_pedido["status"]) ?> |</p>
        <p style="float: left; color: #151515; font-size: 14px !important;"><b>Data do pedido:</b> <?php echo date('d/m/Y', strtotime($carregar_pedido["data_pedido"])); ?></p>
       </div>     

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
         </tr>
       </thead>   
     
     <?php while($listar_produtosPedido = mysqli_fetch_assoc($resultado_listarproPedido)){ ?>  

     <?php 

     $id_produto = $listar_produtosPedido["id_produto"];

     //BUSCA OS DETALHES DOS PRODUTOS
     $pesquisa_detalhesProduto = "SELECT * FROM loja_produtos WHERE id = '$id_produto' ";
     $resultado_detalhesProduto  = mysqli_query($conn, $pesquisa_detalhesProduto );
     $carrega_detalhesProduto = mysqli_fetch_assoc($resultado_detalhesProduto);  
     ?>   

      <tbody idProduto="<?php echo utf8_encode ($listar_produtosPedido["id_produto"]); ?>">
       <tr>
         <td class="cell-pedido"><img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($carrega_detalhesProduto["foto"]); ?>" alt="" style="height: 80px; width:auto;"></td>

         <td class="cell-pedido" style="text-align: left;"><p><?php echo utf8_encode ($carrega_detalhesProduto["nome"]); ?></p></td>
         
         <td class="cell-pedido"><p><?php echo utf8_encode ($listar_produtosPedido["variavel1"]); ?></p></td>
         
         <td class="cell-pedido"><p><?php echo utf8_encode ($listar_produtosPedido["variavel2"]); ?></p></td>
         
         <td class="cell-pedido"><p><?php echo utf8_encode ($listar_produtosPedido["quantidade"]); ?></p></td>
         
         <td class="cell-pedido"><p>R$ <?php echo number_format($listar_produtosPedido["valor"], 2,',','.'); ?></p></td>
         
         <td class="cell-pedido"><p>R$ <?php echo number_format($listar_produtosPedido["subtotal"], 2,',','.'); ?></p></td>

       </tr>
     </tbody>     

     <?php } ?>
   

     </table>

     <div class="totaisPedido">

     <?php $valor_produtos = $carregar_pedido["valor_produtos"] ; $valor_frete = $carregar_pedido["valor_frete"]; $valor_desconto = $carregar_pedido["valor_desconto"]; ?>

     <p>Total produtos: R$ <?php echo number_format($carregar_pedido["valor_produtos"], 2,',','.') ?></p>

     <p>Valor do frete: R$ <?php echo number_format($carregar_pedido["valor_frete"], 2,',','.') ?></p>

     <p style="color: #e74c3c;">Desconto: R$ - <?php echo number_format($carregar_pedido["valor_desconto"], 2,',','.') ?></p>

     <p style="color: #014d8f;"><b>Total pedido: R$ <?php echo number_format($valor_produtos + $valor_frete - $valor_desconto, 2,',','.'); ?></b></p>
       
     </div>



     <div class="dadosCLiente">

       <div class="dadosCliente-Iten">
       <p style="font-size: 16px !important; font-weight: bold; color: #333;">Dados do cliente</p>
       <p>Empresa: <?php echo utf8_encode($carrega_dados["razao_social"]); ?></p>
       <p>CNPJ: <?php echo utf8_encode($carrega_dados["cnpj"]); ?></p>
       <p>IE: <?php echo utf8_encode($carrega_dados["ie"]); ?></p>
       <p>Representante:</b> <?php echo utf8_encode($carrega_dados["nome"]); ?></p>
       <p>CPF: <?php echo utf8_encode($carrega_dados["cpf"]); ?></p>
         
       </div>

       <div class="dadosCliente-Iten">
       <p style="font-size: 16px !important; font-weight: bold; color: #333;">Endereço de entrega</p>
       <p>Rua: <?php echo utf8_encode($carrega_dados["rua"]); ?>, <?php echo utf8_encode($carrega_dados["numero_casa"]); ?></p>
       <p>Bairro: <?php echo utf8_encode($carrega_dados["bairro"]); ?></p>
       <p>Cidade: <?php echo utf8_encode($carrega_dados["cidade"]); ?> / <?php echo utf8_encode($carrega_dados["estado"]); ?></p>
         
       </div>

       <div class="dadosCliente-Iten">
         <p style="font-size: 16px !important; font-weight: bold; color: #333;">Pagamento</p>
         <p>Forma pag.: <?php echo utf8_encode($carregar_pedido["forma_pagamento"]); ?></p>
         <p>Parcelas: <?php echo utf8_encode($carregar_pedido["parcelas_pagamento"]); ?></p>
       </div>
       
     </div>

    </div>

</div>


<style>

/*MENSAGENS ================*/
@media screen and (min-width:320px) {
 .container-mensagens{ width: 100%;}
/**/
.mensagens{float: left; width: 100%; margin-top: 20px; padding: 0px; border-radius: 5px;}
.textMensagens{float: left; width: 100%;}
.textMensagens p{font-size: 16px !important; color: #333; font-weight: bold;}

/**/
.conversaPedido{float: left; width: 100%; padding-top: 20px; padding-bottom: 20px;}
.mensagemItem{float: left; width: 100%; margin-bottom: 10px;}
.mensagemItem p{font-size: 14px !important; margin: 0;}


#mensagemCliente{float: right; padding: 10px 20px; background: #e3e3e3; max-width: 400px; border-radius: 15px 15px 0px 15px; text-align: left; }
#mensagemCliente p{color:#565656; margin: 0; padding: 0;}

#mensagemAtendente{float: left; padding: 10px 20px; background: #014d8f; max-width: 400px; border-radius: 15px 15px 15px 0px; text-align: left}
#mensagemAtendente p{color:#fff; margin: 0; margin: 0; padding: 0;}

#time{width: 100%; font-size: 9px !important; text-align: right; color: #c4c4c4;}

/**/
.mandar-mensagem{ float: left;width: 100%; }

.mensage-pedido{float: left; width: 100%; border: 1px solid #ccc; padding: 5px 10px; border-radius: 5px;
 margin-bottom: 0; padding: 9px 17px; font-size: 14px; min-height: 90px; max-height: 100px; resize: none!important;}

.mensage-pedido:focus{border: 1px solid #014d8f;}

.button-enviarMensagem{float: left; width: auto; margin-left: 1%; font-size: 16px !important; padding: 8px 20px; background: #014d8f; color: #fff; border-radius: 5px; text-decoration: none; margin-top: 25px;}
.button-enviarMensagem:hover{ color: #fefefe; background: #014d8f;}

}

@media screen and (min-width:768px) {

}

/* PARA PC **/
@media screen and (min-width:1025px) {

.mensagens{ border: 1px solid #dfdfdf; padding: 20px;} 

.mensage-pedido{width: 85%; }
.button-enviarMensagem{width: 14%;}

.container-mensagens{ width: 83%; margin-left: 2%; float: right;}

}

</style>

     <div class="container-mensagens">
     <div class="mensagens">
       <div class="textMensagens"><p>Mensagens do pedido #<?php echo utf8_encode($carregar_pedido["id"]); ?></p></div>

       <div class="conversaPedido">

        <div class="mensagemItem">
           <div id="mensagemAtendente">
           <p><b>Mestre moveleiro</b></p>
           <p>Seja bem vindo! Caso tenha alguma dúvida sobre o seu pedido você pode estar entrando em contato conosco por aqui.</p>
           <p id="time"></p>
           </div>
         </div>

         <div class="mensagemItem">
           <div id="mensagemAtendente">
           <p><b>Mestre moveleiro</b></p>
           <p>Para concluir o seu pedido preencha o seu endereço em <b>"meu endereço"</b> no menu para calcularmos o frete dessa entrega. Após isso precisamos combinar o prazo da entrega e a forma de pagamento.</p>
           <p id="time"></p>
           </div>
         </div>

         <?php while($listar_mensagensPedido = mysqli_fetch_assoc($resultado_mensagensPedido)){ ?>

          <div class="mensagemItem">
           <div id="<?php echo $listar_mensagensPedido["tipo_mensagem"];?>">
           <p><b><?php echo utf8_encode($listar_mensagensPedido["quem_enviou"]);?></b></p>
           <p><?php echo utf8_encode($listar_mensagensPedido["mensagem"]);?></p>
           <p id="time"><?php echo date('H:i', strtotime($listar_mensagensPedido["data_envio"])); ?></p>
           </div>
         </div>

         <?php } ?>

      </div> 

      <form method="POST"> 

       <div class="mandar-mensagem">
         <textarea type="text" name="mensagem" class="mensage-pedido" rows="1" placeholder="Mensagem..." style="overflow-x: hidden; word-wrap: break-word;"></textarea>   

         <input type="submit" class="button-enviarMensagem" value="enviar" name="enviar_mensagem">
       </div>

       </form>

            <?php }else{

           echo '<p style="color: #555; font-size: 25px !important; text-align: center; margin-top: 60px;"><i class="fas fa-exclamation-triangle"></i> Pagina não encontrada</p>';

      }?>

     </div>

     </div>
 </div>

  </div>
</div>

<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>

</body>


</html>


