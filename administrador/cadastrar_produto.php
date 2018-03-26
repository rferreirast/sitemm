<?php 

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

//CARREGA CATEGORIAS 
 $pesquisa_categoria = "SELECT * FROM categorias";
 $resultado_categorias = mysqli_query($conn, $pesquisa_categoria);

 $caminho_img = " Link foto" ;

if (isset($_POST['cadastrar_produto'])) {
$foto = utf8_decode( $_POST["foto"]);  
$nome = utf8_decode( $_POST["nome"]);
$medidas = utf8_decode( $_POST["medidas"]);
$material = utf8_decode( $_POST["material"]);
$peso = utf8_decode( $_POST["peso"]);
$categoria = utf8_decode( $_POST["categoria"]);

//se vazio cancela operação
 if ($foto == "") {
  exit;
   }elseif($nome == ""){
    exit;
      }elseif($medidas == ""){
      exit;
       }elseif($material == ""){
       exit;
        }elseif($peso == ""){
        exit;
          }elseif($categoria == ""){
        exit;
          }else{

            //VERIFICA NO BANCO DE DADOS SE O EMAIL JA FOI CADASTRADO 
            $sql = mysqli_query($conn, "SELECT * FROM produtos WHERE foto= '$foto'") or print mysql_error();          
            if(mysqli_num_rows($sql)>0)
                    echo '<script>alert("Esse produto ja foi cadastrado!!");</script>';
            else {

           //SALVA OS DADOS NO MYSQL
           $sql = "INSERT INTO produtos (foto, nome, medidas, material, peso, categoria, status) VALUES ('$foto', '$nome', '$medidas', '$material', '$peso', '$categoria', '1' )";

              if ($conn->query($sql) === TRUE) {
              echo '<script>alert("Produto Cadastrado!");</script>';
              header("location: lista_produtos.php");
              }
       }

     }

     if (isset($_POST['calcelar'])) {
            header("Location: lista_produtos.php");

        }

   }



 ?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre moveleiro | Cadastrar produto</title> <!-- INFO 1 -->
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

.container-editar-produto{
 float: left;
 width: 100%;
 border: 1px solid #c4c4c4;
 margin-bottom: 50px;
}
.titulo-container-produto h2{
 font-size: 20px;
 color: #014d8f;
 padding-bottom: 20px;
}

.container-editar-produto-imagem{
 float: left;
 width: 100%;
 padding: 10px 20px; 
}
.container-editar-produto-forms{
 float: left;
 width: 100%;
 padding: 10px 20px; 
}
.container-editar-produto-formularios{
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
.button-cadastrar{
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
.button-cadastrar:hover{background: #092a47;}

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

</head>

<?php include('tarja_topo.php') ?>

<div class="container-area-administrador">

<!-- MENU LATERAL -->
<?php include('menu_lateral.php'); ?>


<div class="conteudo-principal"> 
	<div class="container-conteudo">
	

		<div class="titulo-categotia-adm"><h2>Cadastrar produto</h2></div>

    <div class="container-editar-produto">

      <div class="container-editar-produto-imagem">
        
        <div class="titulo-container-produto"><h2>Fotos do produto</h2></div>

        <?php include('inserir_img_produto.php') ?>      

      </div>

      <div class="container-editar-produto-forms">
        
        <div class="titulo-container-produto"><h2>Descrição do produto</h2></div>

        <div class="container-editar-produto-formularios">
          
          <form method="post">

          <div class="item-formulario">
          <p>Foto:</p>
          <input type="text" class="campo-form" value="<?php echo $caminho_img; ?>" name="foto">
          <!--<input type="text" class="campo-form" placeholder="Foto do produto..." required="" name="foto">-->
          </div>

          <div class="item-formulario">
          <p>Produto:</p>
          <input type="text" class="campo-form" placeholder="Nome do produto..." required="" name="nome">
          </div>

          <div class="item-formulario">
          <p>Medidas:</p>
          <input type="text" class="campo-form" placeholder="Medidas do produto..." required="" name="medidas">
          </div>

          <div class="item-formulario">
          <p>Material:</p>
          <input type="text" class="campo-form" placeholder="Material do produto..." required="" name="material">
          </div>

          <div class="item-formulario">
          <p>Peso:</p>
          <input type="text" class="campo-form" placeholder="Peso do produto..." required="" name="peso">
          </div>

          <div class="item-formulario">
          <p>Categoria:</p>
          <label for="categoria"></label>
          <select name="categoria" class="campo-form">

            <option value="">Selecione</option>

            <?php while($carregar_categorias = mysqli_fetch_assoc($resultado_categorias)){ ?>               

              <option value="<?php echo utf8_encode ($carregar_categorias["id"]); ?>"><?php echo utf8_encode ($carregar_categorias["categoria"]); ?></option>

            <?php } ?>          
            
          </select>
          </div>

          <a href="lista_produtos.php" class="button-cancelar">cancelar</a>

          <input type="submit" value="cadastrar" class="button-cadastrar" name="cadastrar_produto">    


          </form>


        </div>

      </div>
      


    </div>

    



	</div>

</div>

</div>

</body>

</html>
