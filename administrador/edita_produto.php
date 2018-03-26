<?php 

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");
 
 //BUSCA CODIGO NA URL
 $id_produto = intval($_GET['codigo']);

 //CARREGA PRODUTO 
 $pesquisa = "SELECT * FROM produtos WHERE id = '$id_produto'";
 $resultado_pesquisa = mysqli_query($conn, $pesquisa);
 $carregar_produto = mysqli_fetch_assoc($resultado_pesquisa);

 $caminho_img = $carregar_produto["foto"];

 //CARREGA CATEGORIAS 
 $pesquisa_categoria = "SELECT * FROM categorias";
 $resultado_categorias = mysqli_query($conn, $pesquisa_categoria);
 $resultado_categorias2 = mysqli_query($conn, $pesquisa_categoria);

//CARREGA TODOS OS CODIGO DE CATEGORIAS E ATRIBUI VALORES DE TEXTO A ELAS
while($converte_categoria = mysqli_fetch_assoc($resultado_categorias2) ){
           
  $categoria_produto[ $converte_categoria["id"] ] = $converte_categoria["categoria"];
          
} 
 $categoria_produto[""] = "Selecione";
 //$categoria_produto[2] = "Mesas";

 $status_produto[1] = "Ativo";
 $status_produto[2] = "Inativo";


if (isset($_POST['editar-produto'])) {
$foto = utf8_decode( $_POST["foto"]);  
$nome = utf8_decode( $_POST["nome"]);
$medidas = utf8_decode( $_POST["medidas"]);
$material = utf8_decode( $_POST["material"]);
$peso = utf8_decode( $_POST["peso"]);
$categoria = utf8_decode( $_POST["categoria"]);
$status = utf8_decode( $_POST["status"]);

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
          }else{

            $sql = "UPDATE produtos SET `foto`='$foto', `nome`='$nome', `medidas`='$medidas', `material`='$material', `peso`='$peso', `categoria`='$categoria', `status`='$status' WHERE id = '$id_produto' ";
            $data = mysqli_query($conn, $sql);
            if ($data) {
                header("Location: lista_produtos.php");   

            }else{
                echo '<script>alert("Erro no sistema, tente novamente!");</script>';
            }
         }
     }

//EXCLUI PRODUTOS
if (isset($_POST['excluir-produto'])) {
     
      $sql = mysqli_query($conn, "DELETE FROM produtos WHERE id = '$id_produto' ") or print mysql_error();          
      if($sql)
         //header("Location: lista_produtos.php");

       echo "<script>
       alert('Produto excluido');
       location.href='lista_produtos.php';
       </script>";

      else
        echo "<script>
       alert('Erro ao excluir o produto, tente novamente!!');
       location.href='lista_produtos.php';
       </script>";

       }

 ?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre moveleiro | Editar produto</title> <!-- INFO 1 -->
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
.imagem-container-produto img{
 padding: 10px;
 max-width: 180px; 
 border: 1px solid #c4c4c4;
 margin-bottom: 20px;
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
	

		<div class="titulo-categotia-adm"><h2>Editar produto</h2></div>

    <div class="container-editar-produto">

      <div class="container-editar-produto-imagem">
        
      <div class="titulo-container-produto"><h2>Mudar foto do produto</h2></div>

      <?php include('inserir_img_produto.php') ?>       

      </div>

      <div class="container-editar-produto-forms">
        
        <div class="titulo-container-produto"><h2>Descrição do produto</h2></div>

        <div class="container-editar-produto-formularios">

        <!--<div class="imagem-container-produto"><img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($carregar_produto["foto"]); ?>" alt=""></div>-->
          
          <form method="post">

          <div class="item-formulario">
          <p>Ativo:</p>
          <label for="status"></label>
          <select name="status" class="campo-form">
            <option value="">Selecionar</option>            
            <option value="1" <?php if($carregar_produto["status"] == 1) echo "selected"; ?> >Ativo</option>
            <option value="2" <?php if($carregar_produto["status"] == 2) echo "selected"; ?> >Inativo</option>                 
          </select>
          </div>

          <div class="item-formulario">
          <p>Foto:</p>
          <input type="text" class="campo-form" value="<?php echo $caminho_img; ?>" name="foto">
          <!--<input type="text" class="campo-form" placeholder="Foto do produto..." required="" name="foto">-->
          </div>

          <div class="item-formulario">
          <p>Produto:</p>
          <input type="text" class="campo-form" value="<?php echo utf8_encode ($carregar_produto["nome"]); ?>" required="" name="nome">
          </div>

          <div class="item-formulario">
          <p>Medidas:</p>
          <input type="text" class="campo-form" value="<?php echo utf8_encode ($carregar_produto["medidas"]); ?>" required="" name="medidas">
          </div>

          <div class="item-formulario">
          <p>Material:</p>
          <input type="text" class="campo-form" value="<?php echo utf8_encode ($carregar_produto["material"]); ?>" required="" name="material">
          </div>

          <div class="item-formulario">
          <p>Peso:</p>
          <input type="text" class="campo-form" value="<?php echo utf8_encode ($carregar_produto["peso"]); ?>" required="" name="peso">
          </div>

          <div class="item-formulario">
          <p>Categoria:</p>
          <label for="categoria"></label>
          <select name="categoria" class="campo-form">

            <option value=""><?php echo utf8_encode ($categoria_produto[$carregar_produto["categoria"]]); ?></option>

            <?php while($carregar_categorias = mysqli_fetch_assoc($resultado_categorias)){ ?>               

              <option value="<?php echo utf8_encode ($carregar_categorias["id"]); ?>" > <?php echo utf8_encode ($carregar_categorias["categoria"]); ?></option>

            <?php } ?>          
            
          </select>
          </div>

          <a href="lista_produtos.php" class="button-cancelar">cancelar</a>

          <input type="submit" value="excluir" class="button-excluir" onclick="return ExcluiProduto();" name="excluir-produto">

          <!-- SCRIPT DE CONFIRMAÇÃO PARA EXCLUIR OU NÃO O PRODUTO -->
          <script> function ExcluiProduto() {if (confirm("Excluir esse cadastro?")) {return true;} else {return false;} } </script>

          <input type="submit" value="editar" class="button-editar"  name="editar-produto">              

          </form>


        </div>

      </div>
      


    </div>

    



	</div>

</div>

</div>

</body>

</html>
