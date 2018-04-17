<?php 

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

 //BUSCA CODIGO NA URL
 $id_cliente = intval($_GET['codigo']);

 //CARREGA PRODUTO 
 $pesquisa = "SELECT * FROM clientes WHERE id = '$id_cliente'";
 $resultado_pesquisa = mysqli_query($conn, $pesquisa);
 $carregar_clientes = mysqli_fetch_assoc($resultado_pesquisa);

 $caminho_img = $carregar_clientes["foto"];

if (isset($_POST['editar_cliente'])) {
$foto = utf8_decode( $_POST["foto"]);  
$cliente = utf8_decode( $_POST["cliente"]);
$cidade = utf8_decode( $_POST["cidade"]);

//se vazio cancela operação
if ($foto == "") {
  exit;
   }elseif($cliente == ""){
    exit;
       }elseif($cidade == ""){
         exit;
          }else{

            $sql = "UPDATE clientes SET `foto`='$foto', `cliente`='$cliente', `cidade`='$cidade' WHERE id = '$id_cliente' ";
            $data = mysqli_query($conn, $sql);
            if ($data) {
                header("Location: lista_clientes.php");   

            }else{
                echo '<script>alert("Erro no sistema, tente novamente!");</script>';
            }
         }
     }



   //EXCLUI PRODUTOS
if (isset($_POST['excluir-cliente'])) {
     
      $sql = mysqli_query($conn, "DELETE FROM clientes WHERE id = '$id_cliente' ") or print mysql_error();          
      if($sql)
         //header("Location: lista_clientes.php");

       echo "<script>
       alert('Cliente excluido');
       location.href='lista_clientes.php';
       </script>";

      else
        echo "<script>
       alert('Erro ao excluir o cliente, tente novamente!!');
       location.href='lista_clientes.php';
       </script>";

       }


 ?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre moveleiro | Cadastrar cliente</title> <!-- INFO 1 -->
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

.container-cadastrar-cliente-formulario{
 float: left;
 width: 100%;
 border: 1px solid #c4c4c4;
 margin-bottom: 50px;
}
.titulo-container-cliente h2{
 font-size: 20px;
 color: #014d8f;
 padding-bottom: 20px;
}

.container-cadastrar-cliente-imagem{
 float: left;
 width: 100%;
 padding: 10px 20px; 
}
.container-cadastrar-cliente-forms{
 float: left;
 width: 100%;
 padding: 10px 20px; 
}
.container-cadastrar-cliente-formularios{
 float: left;
 width: 100%;  
}
.item-formulario{
 float: left;
 width: 100%;
 display: flex; 
 margin-bottom: 20px; 
}
.item-formulario p{
 width: 70px;
 font-size: 16px;
 color: #333; 
 font-weight: bold;
}
input.campo-form{
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
input.form-id{
 width: 90px;
}
select.campo-form{
 font-size: 15px;
 border-radius: 3px;
 color: #343434;
 background-color: #fff;
 box-sizing: border-box;
 height: 32px;
 padding: 0px 0.4em;
 width: 200px;
 margin-left: 10px;
 border: 1px solid #c4c4c4 !important;
}
.button-editar{
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
.button-editar:hover{background: #092a47;}

/* BOTÃO EXCLUIR **/
.button-excluir{
 float: right;
 padding: 8px 20px;
 background: #c40f0f;
 color: #fff;
 border-radius: 5px;
 margin-top: 25px;
 text-decoration: none;
 margin-left: 10px;
}
.button-excluir:hover{background: #890a0a;}

/* BOTÃO CANCELAR **/
a.button-cancelar{
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
a.button-cancelar:hover{background: #c24e02;}

</style>

</head>

<?php include('tarja_topo.php') ?>

<div class="container-area-administrador">

<!-- MENU LATERAL -->
<?php include('menu_lateral.php'); ?>


<div class="conteudo-principal"> 
	<div class="container-conteudo">
	

		<div class="titulo-categotia-adm"><h2>Editar cliente</h2></div>

    <div class="container-cadastrar-cliente-formulario">

      <div class="container-cadastrar-cliente-imagem">
        
        <div class="titulo-container-cliente"><h2>Foto do cliente</h2></div>

        <?php include('inserir_img_cliente.php') ?>  

      </div>

      <div class="container-cadastrar-cliente-forms">
        
        <div class="titulo-container-cliente"><h2>Descrição do cliente</h2></div>

        <div class="container-cadastrar-cliente-formularios">
          
          <form method="post">

          <div class="item-formulario">
          <p>Foto:</p>
          <input type="text" class="campo-form" value="<?php echo $caminho_img; ?>" name="foto">
          <!--<input type="text" class="campo-form" placeholder="Foto do produto..." required="" name="foto">-->
          </div>

          <div class="item-formulario">
          <p>Cliente:</p>
          <input type="text" class="campo-form" value="<?php echo utf8_encode ($carregar_clientes["cliente"]); ?>" required="" name="cliente">
          </div>

          <div class="item-formulario">
          <p>Cidade:</p>
          <input type="text" class="campo-form" value="<?php echo utf8_encode ($carregar_clientes["cidade"]); ?>" required="" name="cidade">
          </div>

          <a href="lista_clientes.php" class="button-cancelar">cancelar</a>

          <input type="submit" value="excluir" class="button-excluir" onclick="return ExcluiProduto();" name="excluir-cliente">

          <!-- SCRIPT DE CONFIRMAÇÃO PARA EXCLUIR OU NÃO O CLIENTE -->
          <script> function ExcluiProduto() {if (confirm("Excluir esse cadastro?")) {return true;} else {return false;} } </script>

          <input type="submit" value="editar" class="button-editar" name="editar_cliente">    


          </form>


        </div>

      </div>
      


    </div>

    



	</div>

</div>

</div>

</body>

</html>
