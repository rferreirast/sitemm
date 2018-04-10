<?php 

include_once("system/connect.php");

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

$email = $_SESSION['sessao_usuario'];

//CARREGA PRODUTO 
 $pesquisa = "SELECT * FROM loja_clientes WHERE email = '$email'";
 $resultado_pesquisa = mysqli_query($conn, $pesquisa);
 $carrega_dados = mysqli_fetch_assoc($resultado_pesquisa);

if (isset($_POST['salvarEndereco'])) {

$cep = utf8_decode( $_POST["cep"]);  
$rua = utf8_decode( $_POST["rua"]);  
$numero_casa = utf8_decode( $_POST["numero_casa"]);  
$complemento = utf8_decode( $_POST["complemento"]);  
$bairro = utf8_decode( $_POST["bairro"]);  
$cidade = utf8_decode( $_POST["cidade"]);  
$estado = utf8_decode( $_POST["estado"]);  

       //SALVA OS DADOS NO MYSQL    
       $sql = "UPDATE loja_clientes SET `cep`='$cep', `rua`='$rua', `numero_casa`='$numero_casa', `complemento`='$complemento', `bairro`='$bairro', `cidade`='$cidade', `estado`='$estado' WHERE email = '$email' ";
          
              if ($conn->query($sql) === TRUE) {
              header("location: meu-endereco");
              }

       else{        
        echo "<script>
       alert('Algo deu errado, tente novamente !!');
       location.href='meu-endereco';
       </script>";
       }
     }

//===================================================================

if (isset($_POST['finalizar_pedido'])) {
$valor_produtos = $_POST['totalPedido'];

//FAZ A BUSCA DO ULTIMO ID DE PEDIDO E SOMA MAIS 1;
$busca_ultimoId = mysqli_query($conn, "SELECT MAX(id) FROM loja_pedidos") or print mysql_error();
$ultimo_id = mysqli_fetch_array($busca_ultimoId);
$numero_pedido = $ultimo_id[0] + 1;

//DADOS CLIENTE
$email = $_SESSION['sessao_usuario']; //PESQUISA O EMAIL LOGADO
 
$pesquisa_dadosCliente = "SELECT * FROM loja_clientes WHERE email = '$email'"; // FAZ A BUSCA NO MYSQL
$resultado_cliente = mysqli_query($conn, $pesquisa_dadosCliente);
$carrega_dados = mysqli_fetch_assoc($resultado_cliente);

$id_cliente = utf8_encode($carrega_dados["id_cliente"]); //RETORNA O CODIGO DO CLIENTE

date_default_timezone_set('America/Sao_Paulo'); //DATA E HORA DO PEDIDO
$data_atual = date('Y/m/d H:i');  


//DALVA OS DADOS DO PEDIDO NA TABELA
$salva_pedido = "INSERT INTO loja_pedidos (id, id_cliente, valor_produtos, status, data_pedido) VALUES ('$numero_pedido', '$id_cliente', '$valor_produtos', 'Solicitado', '$data_atual')";

if ($conn->query($salva_pedido) === TRUE) {

//SALVA OS PRODUTOS DO PEDIDO
foreach ($_SESSION['itens'] as $idProduto => $quantidade){
$preco = '10';
$subtotal = $preco * $quantidade;

$salva_produtosPedido = "INSERT INTO loja_produtos_pedidos (id_pedido, id_produto, quantidade, valor, subtotal) VALUES ('$numero_pedido', '$idProduto', '$quantidade', '$preco', '$subtotal')";

//echo "Pedido: $numero_pedido / id produto: $idProduto / quantidade: $quantidade / Preço: $preco / subtotal: $subtotal </br>";

}

if ($conn->query($salva_produtosPedido) === TRUE) {

echo "<script>alert('OK !!');</script>";
//header("location: meus-pedidos");}

}

}

else{

  echo "<script>alert('Algo deu errado, tente novamente !!');</script>";
  }

}     

 ?>
 
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Meu Endereço</title> <!-- INFO 1 -->
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
  <script src="js/mascara_numeros.js" type="text/javascript"></script>
  <script src="js/busca_cep.js" type="text/javascript"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> <!-- PARA O BUSCA CEP -->

<style>
@media screen and (min-width:320px) {

.container-meus-dados{float: left; width: 100%; min-height: 500px;}
.margin-meus-dados{
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

.container-dadosUsuario{
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

.formularioUsuario{float: left; width: 100%;}

.formularioItem{float: left; width: 100%; margin-bottom: 20px;}

.textoItem { float: left; width: 100%; border-bottom: 1px solid #8d8d8d; margin-bottom: 20px; margin-top: 20px;}

.textoItem p{
 color: #014d8f;
 font-size: 22px !important;
 font-weight: 400;
 text-decoration: none;
}

.formularioItem p{
 color: #c4c4c4;
 font-size: 15px !important;
 font-weight: 400;
 text-decoration: none;
 margin: 0;
}
input.form-dados{
 font-size: 15px;
 border-radius: 3px;
 color: #333;
 font-weight: 400;
 background-color: #fff;
 box-sizing: border-box;
 height: 32px;
 padding: 0px 0.4em;
 width: 220px;
border: 0;
 border-bottom: 1px solid #c4c4c4 !important;
}
 
input.form-dados:focus{ border-bottom: 3px solid #014d8f !important;}


.button-salvarDados{
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
.button-salvarDados:hover{background: #092a47;}


}

/*=================================================================================*/

@media screen and (min-width:768px) {
input.form-dados{
 width: 400px;
}

}

/*=================================================================================*/

/* PARA PC **/
@media screen and (min-width:1025px) {

.container-dadosUsuario{
 width: 83%;
 margin-left: 2%;
}

.margin-meus-dados{
 width: 80%;
}

/*********/

.formularioItem {
 width: 50%;
}
input.form-dados{
 height: 30px;
 width: 400px;
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
  <div class="margin-meus-dados">
    
    <div class="formulario-meus-dados">

    <div class="texto-container" style="border-bottom: 1px solid #c4c4c4;"><p>Meu Endereço</p></div>

    <?php include_once('menu_usuario.php'); ?>

    <div class="container-dadosUsuario">      
      <div class="formularioUsuario">
        
        <form method="POST">     

          <div class="textoItem"><p>Endereço</p></div> 

          <div class="formularioItem">
            <p>CEP*:</p>
            <input type="text" id="cep" minlength="9" maxlength="9" OnKeyPress="formatar('#####-###', this)" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["cep"]); ?>" required="" name="cep">
          </div>  

          <div class="formularioItem">
            <p>Nome da rua*:</p>
            <input type="text" id="rua" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["rua"]); ?>" required="" name="rua">
          </div>  

          <div class="formularioItem">
            <p>Número*:</p>
            <input type="text" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["numero_casa"]); ?>" required="" name="numero_casa">
          </div>  

          <div class="formularioItem">
            <p>Complemento:</p>
            <input type="text" class="form-dados" value="<?php echo utf8_encode ($carrega_dados["complemento"]); ?>" name="complemento">
          </div>

          <div class="formularioItem">
            <p>Bairro*:</p>
            <input type="text" id="bairro" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["bairro"]); ?>" required="" name="bairro">
          </div>

          <div class="formularioItem">
            <p>Cidade*:</p>
            <input type="text" id="cidade" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["cidade"]); ?>" required="" name="cidade">
          </div>

          <div class="formularioItem">
            <p>Estado*:</p>
            <input type="text" id="uf" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["estado"]); ?>" required="" name="estado">
          </div> 

          <input type="submit" value="Salvar" class="button-salvarDados" name="salvarEndereco">     
          


        </form>


      </div>
    </div>
      


    </div>


  </div>
</div>

<!-- RODAPE -->
<?php include('../souce=rodape.php'); ?>

</body>

</html>


