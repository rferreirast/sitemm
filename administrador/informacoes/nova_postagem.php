<?php  

if (!isset($_SESSION)){session_start();}

include_once("../system/verifica_sessao.php");

include_once("../system/acao-usuario.php");

if (isset($_POST['criar_Postagem'])) {
$status = utf8_decode( $_POST["status"]); 
$principal = utf8_decode( $_POST["principal"]); 
$post_titulo = utf8_decode( $_POST["tituloPost"]);  
$post_descricao = utf8_decode( $_POST["descricaoPost"]);
$post_conteudo = html_entity_decode( $_POST["textoPost"]);
$keywords = utf8_decode( $_POST["keywords"]);
$post_categoria = utf8_decode( $_POST["categoria"]);

date_default_timezone_set('America/Sao_Paulo'); //DATA E HORA DO PEDIDO 
$data_postagem = date('Y/m/d H:i');

$post_por = $carregar_usuario['nome'];

//VERIFICA NO BANCO DE DADOS SE JA FOI CADASTRADO 
$verificaPost = mysqli_query($conn, "SELECT * FROM informacoes_postagens WHERE post_titulo = '$post_titulo'") or print mysql_error();          
if(mysqli_num_rows($verificaPost)>0)

  echo '<script>alert("Essa postagem já foi feita!!");</script>';

else {
  
  //SALVA OS DADOS NO MYSQL
  $inserePost = "INSERT INTO informacoes_postagens (
  status,
  principal,
  post_titulo,          
  post_descricao,
  post_conteudo,
  keywords,
  post_categoria,
  data_postagem,
  post_por
  )
  VALUES (
  '$status',
  '$principal',
  '$post_titulo',
  '$post_descricao',
  '$post_conteudo',
  '$keywords',
  '$post_categoria',
  '$data_postagem',
  '$post_por'
   )";
   
  if ($conn->query($inserePost) === TRUE) {
    header("location: lista_postagens.php");
    }

  }

}

?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Nova Postagem</title> <!-- INFO 1 -->
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
select.campo-form{
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
  

    <div class="titulo-categotia-adm"><h2><i class="fas fa-edit"></i> Criar postagem</h2></div>


    <div class="conteinerPostagem">


      <form method="post">

       <div class="item-formulario caixa-border">

        <div class="item-formulario padding-form" style="margin-bottom: 10px;">

           <div class="tituloCat"><h2>Titulo</h2></div>

            <input type="text" class="campo-form" required="" name="tituloPost" placeholder="Titulo da postagem" style="width: 95%; margin-top: 20px;">

        </div>

        <div class="item-formulario padding-form" style="margin-bottom: 10px;">

           <div class="tituloCat"><h2>Descrição da postagem</h2></div>

           <div class="" style="margin-top: 20px; width: 100%;">

            <textarea type="text" name="descricaoPost" required="" class="descricao" rows="1" placeholder="Descrição da postagem" style="overflow-x: hidden; word-wrap: break-word; width: 95%;"></textarea>           

          </div>

        </div>

         <div class="item-formulario  padding-form" style="margin-bottom: 10px;">

          <div class="tituloCat"><h2>Postagem</h2></div>

          <style>
            .cke_chrome{min-width: 100%;}
            #txtArtigo{min-width: 100%; }
            #cke_1_contents{min-height: 450px !important; padding: 10px;}
          </style>
            
         <textarea id="txtArtigo" name="textoPost" style="height:300px; width:600px;"></textarea>

         <script src="ckeditor/ckeditor.js"></script>
        <script>
                CKEDITOR.replace( 'txtArtigo' );
        </script>

         </div>

         <div class="item-formulario  padding-form" style="margin-bottom: 10px;">

          <div class="tituloCat"><h2>Informações</h2></div>

          <div class=" padding-form" style="margin-bottom: 10px; width: 100%;">

          <div class="caixa">
          <p>Categoria:</p>
          <input type="text" class="campo-form" required="" name="categoria" style="width: 120px;">
          </div>

          <div class="caixa">
          <p><b>Status:</b></p>
          <label for="status"></label>
          <select name="status" required="" class="campo-form" style="width: 150px;">
          <option value="">Selecione</option>
          <option value="ativo" >ativo</option>
          <option value="inativo" >inativo</option>          
          </select>
          </div>

          <div class="caixa">
          <p><b>Principal:</b></p>
          <label for="principal"></label>
          <select name="principal" required="" class="campo-form" style="width: 150px;">
          <option value="">Selecione</option>
          <option value="sim" >sim</option>
          <option value="nao" >nao</option>          
          </select>
          </div>

          <div class="" style="float: left; margin-bottom: 10px; width: 100%;">

          <p style="float: left;">keywords:</p>
          <textarea type="text" name="keywords" required="" class="descricao" rows="1" placeholder="Ex: Cadeiras de ferro, mesas de ferro, cadeiras para buffet..." style="overflow-x: hidden; word-wrap: break-word; float: left;"></textarea> 

          </div>


        </div>

        </div>       


       </div>

       <div class="botoes-form" style="width: 100%; float: left;; text-align: right; margin-bottom: 30px;">

        <a href="lista_postagens.php" class="button-cancelar">cancelar</a>

        <input type="submit" value="Criar Postagem" class="button-criar" name="criar_Postagem">

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