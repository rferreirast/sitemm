<?php 

include_once("system/connect.php");

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

 $email = $_SESSION['sessao_usuario'];

//CARREGA PRODUTO 
 $pesquisa = "SELECT * FROM loja_clientes WHERE email = '$email'";
 $resultado_pesquisa = mysqli_query($conn, $pesquisa);
 $carrega_dados = mysqli_fetch_assoc($resultado_pesquisa);


if (isset($_POST['salvarDadosCadastro'])) {

$nome = utf8_decode( $_POST["nome"]);  
$cpf = utf8_decode( $_POST["cpf"]);  
$data_nascimento = utf8_decode( $_POST["data_nascimento"]);  
$telefone = utf8_decode( $_POST["telefone"]);  
$celular = utf8_decode( $_POST["celular"]);  
$razao_social = utf8_decode( $_POST["razao_social"]);  
$cnpj = utf8_decode( $_POST["cnpj"]);  
$ie = utf8_decode( $_POST["ie"]); 


       //SALVA OS DADOS NO MYSQL
       $sql = "UPDATE loja_clientes SET 
       `nome`='$nome',
       `cpf`='$cpf',
       `data_nascimento`='$data_nascimento',
       `telefone`='$telefone',
       `celular`='$celular',
       `razao_social`='$razao_social', 
       `cnpj`='$cnpj', 
       `ie`='$ie'
       WHERE email = '$email' ";
          
              if ($conn->query($sql) === TRUE) {
              header("location: meus-dados");
              }
       else{        
        echo "<script>
       alert('Algo deu errado, tente novamente !!');
       location.href='meus-dados';
       </script>";
       }
     }

 ?>
 
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Meus dados</title> <!-- INFO 1 -->
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

    <div class="texto-container" style="border-bottom: 1px solid #c4c4c4;"><p>Meus dados</p></div>

    <?php include_once('menu_usuario.php'); ?>

    <div class="container-dadosUsuario">      
      <div class="formularioUsuario">
        
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
            <input type="text" minlength="12" maxlength="12" OnKeyPress="formatar('## ####-####', this)" class="form-dados" value="<?php echo utf8_encode ($carrega_dados["telefone"]); ?>" required="" name="telefone">
          </div> 

          <div class="formularioItem">
            <p>Celular:</p>
            <input type="text" minlength="12" maxlength="13" OnKeyPress="formatar('## #####-####', this)" class="form-dados" value="<?php echo utf8_encode ($carrega_dados["celular"]); ?>" required="" name="celular">
          </div>

          <div class="textoItem"><p>Dados da empresa</p></div> 

          <div class="formularioItem">
            <p>Razão social*:</p>
            <input type="text" class="form-dados" minlength="5" required="" value="<?php echo utf8_encode ($carrega_dados["razao_social"]); ?>" required="" name="razao_social">
          </div> 

          <div class="formularioItem">
            <p>CNPJ*:</p>
            <input type="text" minlength="18" maxlength="18" OnKeyPress="formatar('##.###.###/####-##', this)" class="form-dados" value="<?php echo utf8_encode ($carrega_dados["cnpj"]); ?>" name="cnpj">
          </div> 

          <div class="formularioItem">
            <p>Inscrição estadual:</p>
            <input type="text" class="form-dados" value="<?php echo utf8_encode ($carrega_dados["ie"]); ?>" minlength="5" maxlength="30" name="ie">
          </div>

          <input type="submit" value="Salvar" class="button-salvarDados" name="salvarDadosCadastro">  

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


