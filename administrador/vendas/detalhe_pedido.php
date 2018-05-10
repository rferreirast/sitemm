<?php 

if (!isset($_SESSION)){session_start();}
include_once("../system/verifica_sessao.php");

error_reporting(0);
$id_pedido = intval($_GET['pedido']);  //BUSCA O ID DO PEDIDO NA URL

    //BUSCA OS DADOS DO PEDIDO NO MYSQL
     $pesquisa_pedido = "SELECT * FROM loja_pedidos WHERE id = '$id_pedido' ";
     $resultado_pedido = mysqli_query($conn, $pesquisa_pedido);
     $carregar_pedido = mysqli_fetch_assoc($resultado_pedido);

     $id_cliente = utf8_encode($carregar_pedido["id_cliente"]); //BUSCA O CODIGO DO CLIENTE

     //CARREGA DADOS CLIENTE 
     $pesquisa = "SELECT * FROM loja_clientes WHERE id_cliente = '$id_cliente' ";
     $resultado_pesquisa = mysqli_query($conn, $pesquisa);
     $carrega_dados = mysqli_fetch_assoc($resultado_pesquisa);

     //BUSCA OS PRODUTOS DO PEDIDO
     $pesquisa_produtosPedido = "SELECT * FROM loja_produtos_pedidos WHERE id_pedido = '$id_pedido' ";
     $resultado_listarproPedido = mysqli_query($conn, $pesquisa_produtosPedido);

     //BUSCA E LISTA AS MENSAGENS DO PEDIDO
     $pesquisa_mensagensPedido = "SELECT * FROM loja_mensagens_pedido WHERE id_pedido = '$id_pedido' ";
     $resultado_mensagensPedido = mysqli_query($conn, $pesquisa_mensagensPedido);

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

/* INFORMAÇÕES PEDIDOS =================================================*/

.container-meus-dados{float: left; width: 100%; min-height: 500px;}

.margin-meus-pedidos{
 width: 90%;
 margin: auto;
}

.texto-container p{
 color: #333;
 font-size: 16px !important;
 font-weight: 400;
 padding: 10px 20px;
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
.dadosCliente-Iten{float: left; width: 33.33333%; margin-bottom: 20px;}
.dadosCliente-Iten p{color: #888; font-size: 14px !important; padding: 0; margin-bottom: 5px;}

}

</style>

</head>

<?php include('../tarja_topo.php') ?>

<div class="container-area-administrador">

<!-- MENU LATERAL -->
<?php include('../menu_lateral.php'); ?>

<div class="conteudo-principal"> 
	<div class="container-conteudo">
	
		<div class="titulo-categotia-adm"><h2><i class="fas fa-list-ul"></i> Pedidos Clientes</h2></div>

<!-- ========================================================================================================= -->
    <div class="container-lista-pedidosClientes">


      <div class="container-dados">
       <div class="pedido-detalhes"> 

        <p style="text-align: right;">Data do pedido: <?php echo date('d/m/Y', strtotime($carregar_pedido["data_pedido"])); ?></p>

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
           <th class="header-pedido">Atualizar</th>
         </tr>
       </thead>   



       <style>
         .form-pedido{border: 1px solid #c4c4c4; border-radius: 5px; height: 25px; padding: 5px 10px; font-size: 12px;}
       </style>

     
     <?php while($listar_produtosPedido = mysqli_fetch_assoc($resultado_listarproPedido)){ ?>  

     <?php 

     $id_produto = $listar_produtosPedido["id_produto"];?>     
 
     <?php 
     //BUSCA OS DETALHES DOS PRODUTOS
     $pesquisa_detalhesProduto = "SELECT * FROM loja_produtos WHERE id = '$id_produto' ";
     $resultado_detalhesProduto  = mysqli_query($conn, $pesquisa_detalhesProduto );
     $carrega_detalhesProduto = mysqli_fetch_assoc($resultado_detalhesProduto);  
     ?>

     <form method="post">

      <tbody idProduto="<?php echo utf8_encode ($listar_produtosPedido["id_produto"]); ?>">
       <tr>
         <td class="cell-pedido"><img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($carrega_detalhesProduto["foto"]); ?>" alt="" style="height: 80px; width:auto;"></td>

         <td class="cell-pedido" style="text-align: left;">
          <p><?php echo utf8_encode ($carrega_detalhesProduto["nome"]); ?></p>
          <p style="float: left; margin-right: 5px">Codigo: </p><input type="text" value="<?php echo utf8_encode ($listar_produtosPedido["id_produto"]); ?>" name="idProduto">
         </td>
         
         <td class="cell-pedido"><input type="text" value="<?php echo utf8_encode ($listar_produtosPedido["variavel1"]); ?>" name="variavel1" class="form-pedido" required></td>
         
         <td class="cell-pedido"><p><input type="text" value="<?php echo utf8_encode ($listar_produtosPedido["variavel2"]); ?>" name="variavel2" class="form-pedido" required></p></td>
         
         <td class="cell-pedido"><p><?php echo utf8_encode ($listar_produtosPedido["quantidade"]); ?></p></td>
         
         <td class="cell-pedido"><p>R$ <?php echo number_format($listar_produtosPedido["valor"], 2,',','.'); ?></p></td>
         
         <td class="cell-pedido"><p>R$ <?php echo number_format($listar_produtosPedido["subtotal"], 2,',','.'); ?></p></td>

         <td class="cell-pedido">
          <?php 

          if (isset($_POST['editaIten'])) {
          $produto = $_POST['idProduto'] ;    
          $variavel1 = utf8_encode($_POST['variavel1']);
          $variavel2 = utf8_encode($_POST['variavel2']);

          echo "<script>location.href='atualiza_produto.php?pedido=$id_pedido&produto=$produto&variavel1=$variavel1&variavel2=$variavel2';</script>";

          }

          echo '<input type="submit" value="🔃" name="editaIten" style="background: #fff; color: #27ae60; font-size: 16px;">';

          ?>

           
        </td>

       </tr>
     </tbody>  

     </form> 

     <?php } ?>
   

     </table>

     <?php 

     if (isset($_POST['salvarPedido'])) {
       $valor_frete = $_POST['valor_frete'];
       $desconto = $_POST['desconto'];
       $forma_pagamento = utf8_encode($_POST['forma_pagamento']);
       $parcelas = $_POST['parcelas'];
       $status = utf8_encode($_POST['status']);

       $atualizaPedido = "UPDATE loja_pedidos SET 
       valor_frete = '$valor_frete',
       valor_desconto ='$desconto',
       forma_pagamento ='$forma_pagamento',
       parcelas_pagamento ='$parcelas',
       status ='$status'
       WHERE id = '$id_pedido' ";

       $data = mysqli_query($conn, $atualizaPedido);
         if ($data) {  

           echo "<script>
           alert('Pedido Atualizado !!');
           location.href='detalhe_pedido.php?pedido=$id_pedido';
           </script>";

      }else{
          echo '<script>alert("Algo deu errado, tente novamente!");</script>';
      }   

       //echo "Valor desconto: R$ $desconto // Forma Pag.: $forma_pagamento // Parcelas: $parcelas // Status Pedido: $status";
      
     }


     ?>

     <form method="post">

     <div class="totaisPedido">

     <?php $valor_produtos = $carregar_pedido["valor_produtos"] ; $valor_frete = $carregar_pedido["valor_frete"]; $valor_desconto = $carregar_pedido["valor_desconto"]; ?>

     <p>Total produtos: R$ <?php echo number_format($carregar_pedido["valor_produtos"], 2,',','.') ?></p>

     <p>Valor do frete: R$ <input type="text" value="<?php echo number_format($carregar_pedido["valor_frete"], 2,'.','.') ?>" name="valor_frete" style="width: 75px; border: 1px solid #c4c4c4; border-radius: 5px; font-size: 16px; padding-left: 5px;"></p>

     <p style="color: #e74c3c;">Desconto: R$ <input type="text" value="<?php echo number_format($carregar_pedido["valor_desconto"], 2,'.','.') ?>" name="desconto" style="width: 75px; border: 1px solid #e74c3c; border-radius: 5px; font-size: 16px; padding-left: 5px;"></p>

     <p style="color: #014d8f;"><b>Total pedido: R$ <?php echo number_format($valor_produtos + $valor_frete - $valor_desconto, 2,',','.'); ?></b></p>
       
     </div>

     <div class="dadosCLiente">

       <div class="dadosCliente-Iten">
       <p style="font-size: 16px !important; font-weight: bold; color: #333;">Dados do cliente</p>
       <p>Empresa: <?php echo utf8_encode($carrega_dados["razao_social"]); ?></p>
       <p>CNPJ: <?php echo utf8_encode($carrega_dados["cnpj"]); ?></p>
       <p>IE: <?php echo utf8_encode($carrega_dados["ie"]); ?></p>
       <p>Representante:</b> <?php echo utf8_encode($carrega_dados["nome"]); ?></p>
       <p>Email:</b> <?php echo utf8_encode($carrega_dados["email"]); ?></p>
       <p>CPF: <?php echo utf8_encode($carrega_dados["cpf"]); ?></p>
       <p>Telefone: <?php echo utf8_encode($carrega_dados["telefone"]); ?></p>
       <p>Celular: <?php echo utf8_encode($carrega_dados["celular"]); ?></p>
         
       </div>

       <div class="dadosCliente-Iten">
       <p style="font-size: 16px !important; font-weight: bold; color: #333;">Endereço de entrega</p>
       <p>Rua: <?php echo utf8_encode($carrega_dados["rua"]); ?>, <?php echo utf8_encode($carrega_dados["numero_casa"]); ?></p>
       <p>Bairro: <?php echo utf8_encode($carrega_dados["bairro"]); ?></p>
       <p>Cidade: <?php echo utf8_encode($carrega_dados["cidade"]); ?> / <?php echo utf8_encode($carrega_dados["estado"]); ?></p>
         
       </div>

       <div class="dadosCliente-Iten">
         <p style="font-size: 16px !important; font-weight: bold; color: #333;">Pagamento</p>

         <p style="float: left;">Forma pag.:</p>
          <label for="forma_pagamento"></label>
          <select name="forma_pagamento" class="campo-form" style="width: 180px;">

          <option value="">Selecione</option>

          <option value="À Vista" <?php if($carregar_pedido["forma_pagamento"] == 'À Vista') echo "selected"; ?> >À Vista</option>

          <option value="Cartao de credito" <?php if($carregar_pedido["forma_pagamento"] == 'Cartao de credito') echo "selected"; ?> >Cartao de credito</option>

          <option value="Boleto" <?php if($carregar_pedido["forma_pagamento"] == 'Boleto') echo "selected"; ?> >Boleto</option>        

          </select>

         <p style="margin-top: 20px;">Parcelas: <input type="text" class="" value="<?php echo utf8_encode($carregar_pedido["parcelas_pagamento"]); ?>" name="parcelas" style="width: 50px; border: 1px solid #c4c4c4; border-radius: 5px; font-size: 16px; padding-left: 5px;"></p>
       </div>

       <div class="statusPedido" style="float: left; width: 100%; border-radius: 5px; border: 1px solid #c4c4c4; padding: 20px;">

        <p style="float: left;"><b>Status do pedido:</b></p>        
          <label for="status"></label>
          <select name="status" required="" class="campo-form" style="width: 200px;">

          <option value="">Selecione</option>

          <option value="Solicitado" <?php if($carregar_pedido["status"] == 'Solicitado') echo "selected"; ?> >Solicitado</option>

          <option value="Aguardando Pagamento" <?php if($carregar_pedido["status"] == 'Aguardando Pagamento') echo "selected"; ?> >Aguardando Pagamento</option> 

          <option value="Em Producao" <?php if($carregar_pedido["status"] == 'Em Producao') echo "selected"; ?> >Em Producao</option>

          <option value="Em Transportadora" <?php if($carregar_pedido["status"] == 'Em Transportadora') echo "selected"; ?> >Em Transportadora</option>

          <option value="Cancelado" <?php if($carregar_pedido["status"] == 'Cancelado') echo "selected"; ?> >Cancelado</option>

          </select>
        </div>
       
     </div>   

<style>

.button-salvar{
 float: right;
 text-align: right;
 padding: 8px 20px;
 background: #014d8f;
 color: #fff;
 border-radius: 5px;
 margin-top: 25px;
 text-decoration: none;
 margin-left: 10px;
}
.button-salvar:hover{background: #092a47;}

/* BOTÃO CANCELAR **/
.button-cancelar{
 float: right;
 text-align: right;
 padding: 8px 20px;
 background: #d35400;
 color: #fff;
 border-radius: 5px;
 margin-top: 25px;
 text-decoration: none;
 margin-left: 10px;
}
.button-cancelar:hover{background: #c24e02; color: #fff;text-decoration: none}
       
</style>

     <input type="submit" class="button-salvar" value="Salvar Alterações" name="salvarPedido">      

    </div>

  </form>

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


#mensagemAtendente{float: right; padding: 10px 20px; background: #e3e3e3; max-width: 400px; border-radius: 15px 15px 0px 15px; text-align: left; }
#mensagemAtendente p{color:#565656; margin: 0; padding: 0;}

#mensagemCliente{float: left; padding: 10px 20px; background: #014d8f; max-width: 400px; border-radius: 15px 15px 15px 0px; text-align: left}
#mensagemCliente p{color:#fff; margin: 0; margin: 0; padding: 0;}

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

.container-mensagens{ width: 100%; margin-left: 2%; float: right;}

}

</style>


<?php 

//DATA E HORA DO ENVIO DA MENSAGEM
date_default_timezone_set('America/Sao_Paulo');
 $data_atual = date('Y/m/d H:i');           

if (isset($_POST['enviar_mensagem'])) {
  $mensagem = utf8_decode($_POST["mensagem"]);

  //se vazio cancela operação
  if ($mensagem == "") {
     echo "<script>alert('Escreva a sua mensagem !!');</script>";
    }else{

      $salva_mensagem = "INSERT INTO loja_mensagens_pedido (id_pedido, quem_enviou, tipo_mensagem, mensagem, data_envio) VALUES ('$id_pedido', 'Mestre Moveleiro', 'mensagemAtendente', '$mensagem', '$data_atual')";

      if ($conn->query($salva_mensagem) === TRUE) {

      echo "<script>location.href='detalhe_pedido.php?pedido=$id_pedido';</script>";

    }else{

      echo "<script>
       alert('Algo deu errado, tente novamente !!');
       location.href='detalhe_pedido.php?pedido=$id_pedido';
       </script>";
    }
 }

}


?>

   <h2 style="float: left; width: 100%; background: #333; margin-top: 20px;"><p style="color: #fff; padding: 10px 5px; margin: 0;">Mensagens do pedido</p></h2>

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

     </div>

     </div>


    </div>

    </div>

	</div>


</body>

</html>
