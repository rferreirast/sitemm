<?php 

include_once("system/connect.php");

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

 $email = $_SESSION['sessao_usuario'];

//CARREGA PRODUTO 
 $pesquisa = "SELECT * FROM loja_clientes WHERE email = '$email'";
 $resultado_pesquisa = mysqli_query($conn, $pesquisa);
 $carrega_dados = mysqli_fetch_assoc($resultado_pesquisa);


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
 min-height: 300px;
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
 border-bottom: 1px solid #c4c4c4;
 border-left: 1px solid #c4c4c4;
 border-right: 1px solid #c4c4c4;
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

          <div class="textoItem"><p>Endereço</p></div> 

          <div class="formularioItem">
            <p>CEP*:</p>
            <input type="text" maxlength="9" OnKeyPress="formatar('#####-###', this)" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["cep"]); ?>" required="" name="cep">
          </div>  

          <div class="formularioItem">
            <p>Nome da rua*:</p>
            <input type="text" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["rua"]); ?>" required="" name="rua">
          </div>  

          <div class="formularioItem">
            <p>Número*:</p>
            <input type="text" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["numero_casa"]); ?>" required="" name="numero_casa">
          </div>  

          <div class="formularioItem">
            <p>Complemento:</p>
            <input type="text" class="form-dados" value="<?php echo utf8_encode ($carrega_dados["complemento"]); ?>" required="" name="complemento">
          </div>

          <div class="formularioItem">
            <p>Bairro*:</p>
            <input type="text" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["bairro"]); ?>" required="" name="bairro">
          </div>

          <div class="formularioItem">
            <p>Cidade*:</p>
            <input type="text" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["cidade"]); ?>" required="" name="cidade">
          </div>

          <div class="formularioItem">
            <p>Estado*:</p>
            <input type="text" class="form-dados" required="" value="<?php echo utf8_encode ($carrega_dados["estado"]); ?>" required="" name="estado">
          </div> 

          <input type="submit" value="Salvar" class="button-salvarDados" ame="salvarEndereco">     
          


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


