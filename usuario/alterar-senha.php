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

$senha_atual = utf8_decode( $_POST["senha_atual"]);  
$nova_senha = utf8_decode( $_POST["nova_senha"]);   


        //VERIFICA NO BANCO DE DADOS SE EMAIL E SENHA CONFEREM
        $sql = mysqli_query($conn, "SELECT * FROM loja_clientes WHERE email = '$email' AND senha = '$senha_atual' ") or print mysql_error();          
        if(mysqli_num_rows($sql) == FALSE)
                    echo '<script>alert("Senhas não conferem, tente novamente !!");</script>';
        else {

        //SALVA OS DADOS NO BD
        $sql = " UPDATE loja_clientes SET `senha`='$nova_senha' WHERE email = '$email' AND senha = '$senha_atual' ";

          if ($conn->query($sql) === TRUE) {
          echo '<script>alert("Senha alterada com sucesso !!");</script>';
          }
       }

     }

 ?>
 
<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Alterar Senha</title> <!-- INFO 1 -->
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
  <link rel="stylesheet" href="css/style-usuario.css">

  <script src="js/mascara_numeros.js" type="text/javascript"></script>
  <script src="js/busca_cep.js" type="text/javascript"></script>

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>

  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script> <!-- PARA O BUSCA CEP -->

<style>
@media screen and (min-width:320px) {

.container-alterar-senha{float: left; width: 100%; min-height: 500px;}
.margin-alterar-senha{
 width: 90%;
 margin: auto;
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

.formularioalterarSenha{float: left; width: 100%;}

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

.margin-alterar-senha{
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

<div class="container-alterar-senha">
  <div class="margin-alterar-senha">
    
    <div class="ct-geral">

    <div class="texto-container" style="border-bottom: 1px solid #c4c4c4;"><p>Alterar senha</p></div>

    <?php include_once('menu_usuario.php'); ?>

    <div class="container-dados">      
      <div class="formularioalterarSenha">
        
        <form method="POST">     

          <div class="formularioItem" style="width: 100%;">
            <p>Senha Atual*:</p>
            <div id="input"><input type="password" minlength="8" class="form-dados" required="" value="" required="" name="senha_atual" style="width: 200px;">
             <a id="eye"><i class="fas fa-eye" style="color: #c4c4c4; cursor: pointer;"></i></a>
            </div>
          </div>

          <div class="formularioItem" style="width: 100%;">
            <p>Nova Senha*:</p>
            <div id="input2"><input type="password" minlength="8" class="form-dados" required="" value="" required="" name="nova_senha" style="width: 200px;">
            <a id="eye2"><i class="fas fa-eye" style="color: #c4c4c4; cursor: pointer;"></i></a>
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

<script>
 var input = document.querySelector('#input input');
 var eye = document.querySelector('#input #eye');
 eye.addEventListener('click', function () {
  input.type = input.type == 'text' ? 'password' : 'text';
});

  var input2 = document.querySelector('#input2 input');
 var eye2 = document.querySelector('#input2 #eye2');
 eye2.addEventListener('click', function () {
  input2.type = input2.type == 'text' ? 'password' : 'text';
});
</script>

</html>





