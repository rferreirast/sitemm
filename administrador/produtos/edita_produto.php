<?php 

if (!isset($_SESSION)){session_start();}
include_once("../system/verifica_sessao.php");
 
 //BUSCA CODIGO NA URL
 $id_produto = intval($_GET['codigo']);

 //CARREGA PRODUTO 
 $pesquisa = "SELECT * FROM loja_produtos WHERE id = '$id_produto'";
 $resultado_pesquisa = mysqli_query($conn, $pesquisa);
 $carregar_produto = mysqli_fetch_assoc($resultado_pesquisa);

 $caminho_img = $carregar_produto["foto"];

 //CARREGA CATEGORIAS 
 $pesquisa_categoria = "SELECT * FROM categorias";
 $resultado_categorias = mysqli_query($conn, $pesquisa_categoria);
 $resultado_categorias2 = mysqli_query($conn, $pesquisa_categoria);

 $categoria_produto[""] = "Selecione";
 //$categoria_produto[2] = "Mesas";



//LISTA AS FOTOS DO PRODUTO
$listar_fotos = "SELECT * FROM loja_fotos_produtos WHERE id_produto = '$id_produto'";
$resultado_fotos = mysqli_query($conn, $listar_fotos);

if (isset($_POST['editar-produto'])) {
$status = utf8_decode( $_POST["status"]);  
$nome = utf8_decode( $_POST["nome"]);
$foto = utf8_decode( $_POST["foto"]);
$custo = utf8_decode( $_POST["custo"]);
$preco = utf8_decode( $_POST["preco"]);
$categoria = utf8_decode($_POST["categoria"]);
$categoria_destaque = utf8_decode($_POST["categoria_destaque"]);
$categoria_novidade = utf8_decode($_POST["categoria_novidade"]);
$categoria_promocao = utf8_decode($_POST["categoria_promocao"]);
$altura = utf8_decode($_POST["altura"]);
$comprimento = utf8_decode($_POST["comprimento"]);
$largura = utf8_decode($_POST["largura"]);
$peso = utf8_decode($_POST["peso"]);
$descricao_completa = utf8_decode($_POST["descricao_completa"]);
$descricao_produto = utf8_decode($_POST["descricao_produto"]);
$keywords = utf8_decode($_POST["keywords"]);

//se vazio cancela operação
 if ($status == "") {
  exit;
 }elseif($nome == ""){
  exit;
 }elseif($foto == ""){
  exit;
 }elseif($custo == ""){
  exit;
 }elseif($categoria == ""){
  exit;
 }elseif($categoria_destaque == ""){
  exit;
 }elseif($categoria_novidade == ""){
  exit;
 }elseif($categoria_promocao == ""){
  exit;
 }elseif($altura == ""){
  exit;
 }elseif($comprimento == ""){
  exit;
 }elseif($largura == ""){
  exit;
 }elseif($peso == ""){
  exit;
 }elseif($descricao_completa == ""){
  exit;
 }elseif($descricao_produto == ""){
  exit;
 }elseif($keywords == ""){
  exit; 

 }else{

            $sql = "UPDATE loja_produtos SET 

            `status`='$status',
            `nome`='$nome',
            `foto`='$foto',
            `custo`='$custo',
            `preco`='$preco',
            `categoria`='$categoria',
            `categoria_destaque`='$categoria_destaque',
            `categoria_novidade`='$categoria_novidade',
            `categoria_promocao`='$categoria_promocao',
            `altura`='$altura',
            `comprimento`='$comprimento',
            `largura`='$largura',
            `peso`='$peso',
            `descricao_completa`='$descricao_completa',
            `descricao_produto`='$descricao_produto',
            `keywords`='$keywords' 
            WHERE id = '$id_produto' ";

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
  <title>Mestre Moveleiro | Editar produto</title> <!-- INFO 1 -->
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

.container-editar-produto{
 float: left;
 width: 100%;
 border: 1px solid #c4c4c4;
 margin-bottom: 50px;
}
.titulo-container-produto h2{
 font-size: 20px;
 color: #014d8f;
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
 flex-wrap: wrap;
}
.item-formulario p{
 font-size: 16px;
 color: #014d8f; 
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



/*=========================================================================*/

.tituloCat{float: left; width: 100%; border: 1px solid #c4c4c4; padding: 5px 5px; border-radius: 5px 5px 0px 0px; background: #014d8f;}
.tituloCat h2{font-size: 20px; color: #fff}

.zero{width: 0 !important; height: 0 !important;}

.padding-form{padding: 20px 10px !important;}

.caixa-border{border: 1px solid #c4c4c4; padding: 0 0 10px; border-radius: 5px;}

.form-option100{width: 100px !important;}

.caixa{float: left; display: flex; margin-left: 10px; margin-bottom: 10px;}

.w100{float: left; width: 100% !important;}
.w80{float: left; width: 80% !important;}
.w50{float: left; width: 49% !important;}
.w33{width: 29%}

input.campo-form:focus{border: 1px solid #014d8f !important;}


</style>

</head>

<?php include('../tarja_topo.php') ?>

<div class="container-area-administrador">

<!-- MENU LATERAL -->
<?php include('../menu_lateral.php'); ?>


<div class="conteudo-principal"> 
  <div class="container-conteudo">
  

    <div class="titulo-categotia-adm"><h2>Editar produto</h2></div>

    <div class="container-editar-produto">

      <div class="item-formulario caixa-border padding-form" style="margin-bottom: 20px; margin-top: 20px; width: 98%; margin: auto; margin-left: 10px; margin-top: 20px;">

        <div class="tituloCat" style="margin-bottom: 20px;"><h2>Mudar foto do produto</h2></div>

        <?php include('inserir_img_produto.php') ?>      

      </div>

      <style>
        .outrasImagens{ float: left; width: 100%; margin-top: 20px;}

        .imagens-iten{float: left; width: 150px; height: 150px; margin-left: 10px; border: 1px solid #b9b9b9; border-radius: 3px; margin-bottom: 10px;}

        img.outrasImagens-item{ width: 100%;}
        a#delImg{float: left; width: 100%; text-align: center; background: #c40f0f; color: #fff; padding: 5px 10px; margin-top: 10px; text-decoration: none}

      </style>

      <div class="outrasImagens item-formulario">

        <h2 style="float: left; width: 100%; color: #fff; background: #014c8f; padding: 10px 20px; margin: 5px 10px;">Adicionar mais imagens</h2>

        <?php include("inserir_img_Adicionalproduto.php"); ?>

        <?php while($resultado_listarFotos = mysqli_fetch_assoc ($resultado_fotos)){ ?>
         
         <div class="imagens-iten">

         <img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo($resultado_listarFotos["outras_fotos"]) ?>" alt="" class="outrasImagens-item">

         <a href="deletar_imagem.php?codigo=<?php echo($resultado_listarFotos["id"]) ?>&produto=<?php echo($resultado_listarFotos["id_produto"]) ?>" id="delImg">deletar imagem</a>

         </div>        

            <?php } ?>
      
      </div>

      <div class="container-editar-produto-forms">
        
        <div class="container-editar-produto-formularios">
          
          <form method="post">

          <div class="item-formulario">
          <!--<p>Foto:</p>-->
          <input type="text" class="zero" value="<?php echo $caminho_img; ?>" name="foto">
          <!--<input type="text" class="campo-form" placeholder="Foto do produto..." required="" name="foto">-->
          </div>          

          <div class="item-formulario caixa-border padding-form">

          <div class="tituloCat"><h2>Informações principais</h2></div>

          <div class="caixa-border padding-form" style="margin-bottom: 20px; margin-top: 10px; width: 100%;">
          <div class="caixa">
          <p><b>Status:</b></p>
          <label for="status"></label>
          <select name="status" required="" class="campo-form form-option100">
          <option value="">Selecione</option>
          <option value="ativo" <?php if($carregar_produto["status"] == 'ativo') echo "selected"; ?> >ativo</option>
          <option value="inativo" <?php if($carregar_produto["status"] == 'inativo') echo "selected"; ?> >inativo</option>          
          </select>
          </div>

          <div class="caixa">
          <p><b>Produto em Destaque?</b></p>
          <label for="categoria_destaque"></label>
          <select name="categoria_destaque" required="" class="campo-form form-option100">
          <option value="">Selecione</option>
          <option value="sim" <?php if($carregar_produto["categoria_destaque"] == 'sim') echo "selected"; ?> >sim</option>
          <option value="nao" <?php if($carregar_produto["categoria_destaque"] == 'nao') echo "selected"; ?> >nao</option>          
          </select>
          </div>

          <div class="caixa">
          <p><b>Produto novidade</b>?</p>
          <label for="categoria_novidade"></label>
          <select name="categoria_novidade" required="" class="campo-form form-option100">
          <option value="">Selecione</option>
          <option value="sim" <?php if($carregar_produto["categoria_novidade"] == 'sim') echo "selected"; ?> >sim</option>
          <option value="nao" <?php if($carregar_produto["categoria_novidade"] == 'nao') echo "selected"; ?> >nao</option>          
          </select>
          </div>

          <div class="caixa">
          <p><b>Em promoção?</b></p>
          <label for="categoria_promocao"></label>
          <select name="categoria_promocao" required="" class="campo-form form-option100">
          <option value="">Selecione</option>
          <option value="sim" <?php if($carregar_produto["categoria_promocao"] == 'sim') echo "selected"; ?> >sim</option>
          <option value="nao" <?php if($carregar_produto["categoria_promocao"] == 'nao') echo "selected"; ?> >nao</option>          
          </select>
          </div>

          </div>
         

          <div class="caixa w100">
          <p>Produto:</p>
          <input type="text" class="campo-form w80" value="<?php echo utf8_encode ($carregar_produto["nome"]); ?>" required="" name="nome">
          </div>
          
          <div class="caixa">
          <p>Categoria:</p>
          <label for="categoria"></label>
          <select name="categoria" required="" class="campo-form">

            <option value="">Selecione</option>

            <?php while($carregar_categorias = mysqli_fetch_assoc($resultado_categorias)){ ?>               

              <option value="<?php echo utf8_encode ($carregar_categorias["categoria"]); ?>" 
               <?php if($carregar_produto["categoria"] == $carregar_categorias["categoria"]) echo "selected"; ?> >

               <?php echo utf8_encode ($carregar_categorias["categoria"]); ?></option>

            <?php } ?>          
            
          </select>
          </div>

          <div class="caixa">
          <p style="color: #d35400;">custo:</p>
          <input type="text" class="campo-form" required="" name="custo" value="<?php echo utf8_encode ($carregar_produto["custo"]); ?>" style="width: 120px;">
          </div>

          <div class="caixa">
          <p style="color: #27ae60;">Preço:</p>
          <input type="text" class="campo-form" required="" name="preco" value="<?php echo utf8_encode ($carregar_produto["preco"]); ?>" style="width: 120px;">
          </div>
          
          </div>

          <div class="item-formulario caixa-border padding-form">

          <style>

            .descricao{float: left; width: 80%; border: 1px solid #ccc; padding: 5px 10px; border-radius: 5px; margin-bottom: 0; padding: 9px 17px; font-size: 14px; min-height: 90px; max-height: 100px; resize: none!important; margin-left: 10px;}

            .descricao:focus{border: 1px solid #014d8f;}

          </style>

          <p>Descrição:</p>          
          <textarea type="text" name="descricao_produto" class="descricao" rows="1" required="" style="overflow-x: hidden; word-wrap: break-word;"><?php echo utf8_encode ($carregar_produto["descricao_produto"]); ?></textarea> 
          
          </div>

           <div class="item-formulario caixa-border padding-form" style="margin-bottom: 20px; margin-top: 20px;">
           <div class="tituloCat"><h2>Descrição completa</h2></div>

          <link rel="stylesheet" href="editor/./minified/themes/default.min.css" id="theme-style" />
          <script src="editor/./minified/sceditor.min.js"></script>
          <script src="editor/./minified/icons/monocons.js"></script>
          <script src="editor/./minified/formats/bbcode.js"></script>

          <style>
            .sceditor-container{min-width: 100%; min-height: 450px;}
            .sceditor-toolbar{}
          </style>
            
<textarea id="example" style="height:300px;width:600px;" name="descricao_completa" required="">

<?php echo utf8_encode ($carregar_produto["descricao_completa"]); ?>

</textarea>

          </div>

          <div class="item-formulario caixa-border padding-form" style="margin-bottom: 20px; margin-top: 20px;">

          <div class="tituloCat"><h2>Peso e dimensões</h2></div>

          <div class="caixa-border padding-form" style="margin-bottom: 20px; margin-top: 20px; width: 100%;">

          <div class="caixa">
          <p>Altura:</p>
          <input type="text" class="campo-form" required="" name="altura" value="<?php echo utf8_encode ($carregar_produto["altura"]); ?>" style="width: 120px;">
          </div>

          <div class="caixa">
          <p>Comprimento:</p>
          <input type="text" class="campo-form" required="" name="comprimento" value="<?php echo utf8_encode ($carregar_produto["comprimento"]); ?>" style="width: 120px;">
          </div>

          <div class="caixa">
          <p>Largura:</p>
          <input type="text" class="campo-form" required="" name="largura" value="<?php echo utf8_encode ($carregar_produto["largura"]); ?>" style="width: 120px;">
          </div>

          <div class="caixa">
          <p>Peso:</p>
          <input type="text" class="campo-form" required="" name="peso" value="<?php echo utf8_encode ($carregar_produto["peso"]); ?>" style="width: 120px;">
          </div>


          </div>
          </div>

          <div class="item-formulario caixa-border padding-form" style="margin-bottom: 20px; margin-top: 20px;">

          <div class="tituloCat"><h2>Keywords SEO</h2></div>

          <div class="" style="margin-bottom: 20px; margin-top: 20px; width: 100%;">

            <textarea type="text" name="keywords" class="descricao" rows="1" required="" style="overflow-x: hidden; word-wrap: break-word; width: 95%;"><?php echo utf8_encode ($carregar_produto["keywords"]); ?></textarea>           

          </div>
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

<script>
//CODIGO DO EDITOR DE TEXTO
var textarea = document.getElementById('example');
  sceditor.create(textarea, {
  format: 'xhtml',
  icons: 'monocons',
  style: 'editor/minified/themes/content/default.min.css'
  });

  var themeInput = document.getElementById('theme');
  themeInput.onchange = function() {
    var theme = 'editor/minified/themes/' + themeInput.value + '.min.css';

    document.getElementById('theme-style').href = theme;
  };

</script>

</html>
