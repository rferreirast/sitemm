<?php  

if (!isset($_SESSION)){session_start();}

include_once("../system/verifica_sessao.php");

 //BUSCA CODIGO NA URL
 $id_Post = intval($_GET['post']);

 //CARREGA PRODUTO 
 $pesquisa_post = "SELECT * FROM blog_postagens WHERE id = '$id_Post'";
 $resultado_pesquisaPost = mysqli_query($conn, $pesquisa_post);
 $carregar_Post = mysqli_fetch_assoc($resultado_pesquisaPost);

//SALVA NO BANCO DE DADOS
if (isset($_POST['atualiza_postagem'])) {
$post_titulo = utf8_decode( $_POST["tituloPost"]);  
$post_descricao = utf8_decode( $_POST["descricaoPost"]);
$post_conteudo = utf8_decode( $_POST["textoPost"]);
$keywords = utf8_decode( $_POST["keywords"]);
$post_categoria = utf8_decode( $_POST["categoria"]);

date_default_timezone_set('America/Sao_Paulo'); //DATA E HORA DO PEDIDO 
$data_modificacao = date('Y/m/d H:i');

$atualizaPost = "UPDATE blog_postagens SET 
`post_titulo`='$post_titulo',
`post_descricao`='$post_descricao',
`post_conteudo`='$post_conteudo',
`keywords`='$keywords',
`post_categoria`='$post_categoria',
`data_modificacao`='$data_modificacao'           
 WHERE id = '$id_Post' ";

  $data = mysqli_query($conn, $atualizaPost);
  if ($data) {

    header("Location: lista_postagens.php");  

    }else{

      echo '<script>alert("Erro no sistema, tente novamente!");</script>';
   }

}

?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Editar Postagem</title> <!-- INFO 1 -->
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
 margin-bottom: 50px;
}
.titulo-container-produto h2{
 font-size: 20px;
 color: #014d8f;
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

/*=========================================================================*/

.descricao{float: left; width: 80%; border: 1px solid #ccc; padding: 5px 10px; border-radius: 5px; margin-bottom: 0; padding: 9px 17px; font-size: 14px; min-height: 90px; max-height: 100px; resize: none!important; margin-left: 10px;}

.descricao:focus{border: 1px solid #014d8f;}

/*=========================================================================*/

.button-criar{
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
.button-criar:hover{background: #092a47;}

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

<?php include('../tarja_topo.php') ?>

<div class="container-area-administrador">

<!-- MENU LATERAL -->
<?php include('../menu_lateral.php'); ?>


<div class="conteudo-principal"> 
  <div class="container-conteudo">
  

    <div class="titulo-categotia-adm"><h2>Editar postagem</h2></div>


    <div class="conteinerPostagem">


      <form method="post">

       <div class="item-formulario caixa-border">

        <div class="item-formulario padding-form" style="margin-bottom: 10px;">

           <div class="tituloCat"><h2>Titulo da postagem</h2></div>

            <input type="text" class="campo-form" required="" name="tituloPost" value="<?php echo utf8_encode($carregar_Post['post_titulo']) ?>" style="width: 95%; margin-top: 20px;">

        </div>

        <div class="item-formulario padding-form" style="margin-bottom: 10px;">

           <div class="tituloCat"><h2>Descrição da postagem</h2></div>

           <div class="" style="margin-top: 20px; width: 100%;">

            <textarea type="text" name="descricaoPost" required="" class="descricao" rows="1" style="overflow-x: hidden; word-wrap: break-word; width: 95%;"><?php echo utf8_encode($carregar_Post['post_descricao']) ?></textarea>           

          </div>

        </div>

         <div class="item-formulario padding-form" style="margin-bottom: 10px;">

          <div class="tituloCat"><h2>Texto da postagem</h2></div>

          <link rel="stylesheet" href="editor/./minified/themes/default.min.css" id="theme-style" />
          <script src="editor/./minified/sceditor.min.js"></script>
          <script src="editor/./minified/icons/monocons.js"></script>
          <script src="editor/./minified/formats/bbcode.js"></script>

          <style>
            .sceditor-container{min-width: 100%; min-height: 450px;}
            .sceditor-toolbar{}
          </style>
            
         <textarea id="example" style="height:300px; width:600px;" name="textoPost" required=""><?php echo utf8_encode($carregar_Post['post_conteudo']) ?></textarea>


         </div>

         <div class="item-formulario padding-form" style="margin-bottom: 10px;">

          <div class="tituloCat"><h2>Informações da postagem</h2></div>

          <div class="padding-form" style="margin-bottom: 10px; width: 100%;">

          <div class="caixa">
          <p>Categoria:</p>
          <input type="text" class="campo-form" required="" name="categoria" value="<?php echo utf8_encode($carregar_Post['post_categoria']) ?>" style="width: 120px;">
          </div>

          <div class="" style="float: left; margin-bottom: 20px; margin-top: 20px; width: 100%;">

          <p style="float: left;">keywords:</p>
          <textarea type="text" name="keywords" required="" class="descricao" rows="1" style="overflow-x: hidden; word-wrap: break-word; float: left;"><?php echo utf8_encode($carregar_Post['keywords']) ?></textarea> 

          </div>


        </div>

        </div>       

       </div>

      <div class="botoes-form" style="width: 100%; float: left;; text-align: right; margin-bottom: 30px;">  

      <a href="lista_postagens.php" class="button-cancelar">cancelar</a>

      <input type="submit" value="Atualizar Postagem" class="button-criar" name="atualiza_postagem">

      </div>

    </form>

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