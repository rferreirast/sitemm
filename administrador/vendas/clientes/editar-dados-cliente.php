<?php 

if (!isset($_SESSION)){session_start();}
include_once("../../system/verifica_sessao.php");

//BUSCA CODIGO NA URL
$idCliente = $_GET['codigo'];

 //CARREGA CLIENTE 
 $pesquisa = "SELECT * FROM loja_clientes WHERE id_cliente = '$idCliente'";
 $resultado_pesquisa = mysqli_query($conn, $pesquisa);
 $carrega_dados = mysqli_fetch_assoc($resultado_pesquisa);

if (isset($_POST['atualiza_dadosCliente'])) {
$nome = utf8_decode( $_POST["nome"]);  
$cpf = utf8_decode( $_POST["cpf"]);  
$data_nascimento = utf8_decode( $_POST["data_nascimento"]);  
$telefone = utf8_decode( $_POST["telefone"]);  
$celular = utf8_decode( $_POST["celular"]);  
$razao_social = utf8_decode( $_POST["razao_social"]);  
$cnpj = utf8_decode( $_POST["cnpj"]);  
$ie = utf8_decode( $_POST["ie"]); 

$cep = utf8_decode( $_POST["cep"]);  
$rua = utf8_decode( $_POST["rua"]);  
$numero_casa = utf8_decode( $_POST["numero_casa"]);  
$complemento = utf8_decode( $_POST["complemento"]);  
$bairro = utf8_decode( $_POST["bairro"]);  
$cidade = utf8_decode( $_POST["cidade"]);  
$estado = utf8_decode( $_POST["estado"]);  


//SALVA OS DADOS NO MYSQL
$atualiza_dadosCliente = "UPDATE loja_clientes SET 
`nome`='$nome',
`cpf`='$cpf',
`data_nascimento`='$data_nascimento',
`telefone`='$telefone',
`celular`='$celular',
`razao_social`='$razao_social', 
`cnpj`='$cnpj', 
`ie`='$ie',

`cep`='$cep',
`rua`='$rua',
`numero_casa`='$numero_casa',
`complemento`='$complemento',
`bairro`='$bairro',
`cidade`='$cidade',
`estado`='$estado'
WHERE id_cliente = '$idCliente' ";
          
if ($conn->query($atualiza_dadosCliente) === TRUE) {
echo "<script>alert('Dados do cliente atualizado com sucesso !!');</script>";
}

else{      
echo "<script>
      alert('Algo deu errado, tente novamente !!');
      location.href='/administrador/vendas/clientes';
      </script>";
}


}

?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Dados dos Clientes</title> <!-- INFO 1 -->
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

<script src="../js/mascara_numeros.js" type="text/javascript"></script>
<script src="../js/busca_cep.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> <!-- PARA O BUSCA CEP -->

<style>

/*****/
.dados_clientes input{
 display: block;
}

.formularioUsuario{float: left; width: 100%;}

.formularioItem{float: left; width: 33.333%; margin-bottom: 20px;}

.textoItem { float: left; width: 100%; border-bottom: 1px solid #8d8d8d; margin-bottom: 10px; margin-top: 10px;}

.textoItem p{
 color: #014d8f;
 font-size: 18px !important;
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
 width: 300px;
 border: 0;
 border-bottom: 1px solid #c4c4c4 !important;
}
 
input.form-dados:focus{ border-bottom: 3px solid #014d8f !important;}

.button-atualizarDados{
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
.button-atualizarDados:hover{background: #092a47;}



</style>

</head>

<?php include('../../tarja_topo.php') ?>

<div class="container-area-administrador">

<!-- MENU LATERAL -->
<?php include('../../menu_lateral.php'); ?>


<div class="conteudo-principal"> 
	<div class="container-conteudo">

<form method="POST">

<div class="textoItem"><p>Dados cadastrais</p></div>

  <div class="formularioItem">
    <p>Nome*:</p>
    <input type="text" class="form-dados" minlength="3" required="" value="<?php echo utf8_encode ($carrega_dados["nome"]); ?>" required="" name="nome">
  </div>  

  <div class="formularioItem">
    <p>Email*:</p>
    <input type="email" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["email"]); ?>" required="" name="email" style="color: #c4c4c4;" disabled="">
  </div>  

  <div class="formularioItem">
    <p>CPF*:</p>
    <input type="text" minlength="14" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["cpf"]); ?>" required="" name="cpf">
  </div> 

  <div class="formularioItem">
    <p>Data nascimento*:</p>
    <input type="text" minlength="10" maxlength="10" OnKeyPress="formatar('##/##/####', this)" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["data_nascimento"]); ?>" required="" name="data_nascimento">
  </div>

   <div class="formularioItem">
    <p>Telefone:</p>
    <input type="text" minlength="12" maxlength="12" OnKeyPress="formatar('## ####-####', this)" class="form-dados" value="<?php echo utf8_encode ($carrega_dados["telefone"]); ?>" name="telefone">
  </div> 

  <div class="formularioItem">
    <p>Celular*:</p>
    <input type="text" minlength="12" maxlength="13" OnKeyPress="formatar('## #####-####', this)" class="form-dados" value="<?php echo utf8_encode ($carrega_dados["celular"]); ?>" required="" name="celular">
  </div>

  <div class="textoItem"><p>Dados da empresa</p></div> 

  <div class="formularioItem">
    <p>Razão social*:</p>
    <input type="text" class="form-dados" minlength="5" required="" value="<?php echo utf8_encode ($carrega_dados["razao_social"]); ?>" required="" name="razao_social">
  </div> 

  <div class="formularioItem">
    <p>CNPJ:</p>
    <input type="text" minlength="18" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)" class="form-dados" value="<?php echo utf8_encode ($carrega_dados["cnpj"]); ?>" name="cnpj">
  </div> 

  <div class="formularioItem">
    <p>Inscrição estadual:</p>
    <input type="text" class="form-dados" value="<?php echo utf8_encode ($carrega_dados["ie"]); ?>" minlength="5" maxlength="30" name="ie">
  </div>

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

  <input type="submit" value="Atualizar dados" class="button-atualizarDados" name="atualiza_dadosCliente">  

</form>

<div class="lista-pedidos" style="float: left; width: 100%; border-top: 1px solid #8d8d8d; margin-top: 20px; margin-bottom: 60px; ">
	

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
.button-detalhesPedido:hover{ color: #fefefe; background: #ffb900; text-decoration: none;}
 


</style>	

<h2 style="font-size: 18px !important; font-weight: 400; color: #014d8f; margin-bottom: 20px; margin-top: 20px;">Lista de pedidos do cliente</h2>


<?php 

//BUSCA OS DADOS DO PEDIDO NO MYSQL
 $pesquisa_pedido = "SELECT * FROM loja_pedidos WHERE id_cliente = $idCliente";
 $resultado_pedido = mysqli_query($conn, $pesquisa_pedido);

?>

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
           <td class="cell"><a href="../detalhe_pedido?pedido=<?php echo utf8_encode($carregar_pedido["id"]); ?>" class="button-detalhesPedido">detalhes</a></td>
         </tr>
       </tbody>

     <?php } ?>


     </table>

</div>


</div>
</div>


</body>

</html>