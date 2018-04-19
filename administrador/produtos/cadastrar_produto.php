<?php 

if (!isset($_SESSION)){session_start();}
include_once("../system/verifica_sessao.php");

//CARREGA CATEGORIAS 
 $pesquisa_categoria = "SELECT * FROM categorias";
 $resultado_categorias = mysqli_query($conn, $pesquisa_categoria);

 $caminho_img = "Link foto" ;

if (isset($_POST['cadastrar_produto'])) {
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

            //VERIFICA NO BANCO DE DADOS SE O EMAIL JA FOI CADASTRADO 
            $sql = mysqli_query($conn, "SELECT * FROM loja_produtos WHERE foto= '$foto'") or print mysql_error();          
            if(mysqli_num_rows($sql)>0)
                    echo '<script>alert("Esse produto ja foi cadastrado!!");</script>';
            else {

           //SALVA OS DADOS NO MYSQL
           $sql = "INSERT INTO loja_produtos (
           status,          
           nome,
           foto,
           custo,
           preco,
           categoria,
           categoria_destaque,
           categoria_novidade,
           categoria_promocao,
           altura,
           comprimento,
           largura,
           peso,           
           descricao_completa,
           descricao_produto,
           keywords         
           ) 
           VALUES (
           '$status',
           '$nome',
           '$foto',
           '$custo',
           '$preco',
           '$categoria',
           '$categoria_destaque',
           '$categoria_novidade',
           '$categoria_promocao',
           '$altura',
           '$comprimento',
           '$largura',
           '$peso', 
           '$descricao_completa',
           '$descricao_produto',
           '$keywords'
           )";

              if ($conn->query($sql) === TRUE) {
              echo '<script>alert("Produto Cadastrado!");</script>';
              header("location: lista_produtos.php");
              }
       }

     }

   }



 ?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Cadastrar produto</title> <!-- INFO 1 -->
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
	

		<div class="titulo-categotia-adm"><h2>Cadastrar produto</h2></div>

    <div class="container-editar-produto">

      <div class="item-formulario caixa-border padding-form" style="margin-bottom: 20px; margin-top: 20px; width: 98%; margin: auto; margin-left: 10px; margin-top: 20px;">

        <div class="tituloCat" style="margin-bottom: 20px;"><h2>Fotos do produto</h2></div>

        <?php include('inserir_img_produto.php') ?>      

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
          <option value="ativo">ativo</option>
          <option value="inativo">inativo</option>          
          </select>
          </div>

          <div class="caixa">
          <p><b>Produto em Destaque?</b></p>
          <label for="categoria_destaque"></label>
          <select name="categoria_destaque" required="" class="campo-form form-option100">
          <option value="">Selecione</option>
          <option value="sim">sim</option>
          <option value="nao">nao</option>          
          </select>
          </div>

          <div class="caixa">
          <p><b>Produto novidade</b>?</p>
          <label for="categoria_novidade"></label>
          <select name="categoria_novidade" required="" class="campo-form form-option100">
          <option value="">Selecione</option>
          <option value="sim">sim</option>
          <option value="nao">nao</option>          
          </select>
          </div>

          <div class="caixa">
          <p><b>Em promoção?</b></p>
          <label for="categoria_promocao"></label>
          <select name="categoria_promocao" required="" class="campo-form form-option100">
          <option value="">Selecione</option>
          <option value="sim">sim</option>
          <option value="nao">nao</option>          
          </select>
          </div>

          </div>
         

          <div class="caixa w100">
          <p>Produto:</p>
          <input type="text" class="campo-form w80" placeholder="Nome do produto..." required="" name="nome">
          </div>
          
          <div class="caixa">
          <p>Categoria:</p>
          <label for="categoria"></label>
          <select name="categoria" required="" class="campo-form">

            <option value="">Selecione</option>

            <?php while($carregar_categorias = mysqli_fetch_assoc($resultado_categorias)){ ?>               

              <option value="<?php echo utf8_encode ($carregar_categorias["categoria"]); ?>"><?php echo utf8_encode ($carregar_categorias["categoria"]); ?></option>

            <?php } ?>          
            
          </select>
          </div>

          <div class="caixa">
          <p style="color: #d35400;">custo:</p>
          <input type="text" class="campo-form" required="" name="custo" style="width: 120px;">
          </div>

          <div class="caixa">
          <p style="color: #27ae60;">Preço:</p>
          <input type="text" class="campo-form" required="" name="preco" style="width: 120px;">
          </div>
          
          </div>

          <div class="item-formulario caixa-border padding-form">

          <style>

            .descricao{float: left; width: 80%; border: 1px solid #ccc; padding: 5px 10px; border-radius: 5px; margin-bottom: 0; padding: 9px 17px; font-size: 14px; min-height: 90px; max-height: 100px; resize: none!important; margin-left: 10px;}

            .descricao:focus{border: 1px solid #014d8f;}

          </style>

          <p>Descrição:</p>          
          <textarea type="text" name="descricao_produto" required="" class="descricao" rows="1" placeholder="Mensagem..." style="overflow-x: hidden; word-wrap: break-word;"></textarea> 
          
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
            
<textarea id="example" style="height:300px; width:600px;" name="descricao_completa" required="">

<h2><b>MEDIDAS DO PRODUTO</b></h2>

<p>Altura: x cm</p>
<p>Comprimento: x cm</p>
<p>Largura: x cm</p>

<h2><b>MATERIAL</b></h2>

<p>Material da base: x em aço carbono 1020, Pintura Eletrostática e Soldagem Mig/Mag.</p>
<p>Material do assento: </p>
<p>Material do tampo: Madeira MDF cor de 15 mm e Fita de Borda.</p>

<h2><b>DETALHES DO PRODUTO</b></h2>

<p>Peso do produto: x Kg</p>
<p>Peso suportado: x Kg</p>
<p>Garantia de 1 ano contra defeito de fabricação</p>

<h2><b>CUIDADOS NECESSÁRIOS</b></h2>

<p>Para limpeza do produto utilize um pano seco e macio ou utilize um pano levemente umedecido e logo em seguida use um pano seco e macio para secar a peça. </p>

<h2><b>O MELHOR CUSTO BENEFÍCIO DO MERCADO</b></h2>

<p>Nossos produtos possuem uma vida útil média de +10 anos. Se for usado seguindo as nossas recomendações de cuidados e limpeza você terá um bom produto por décadas.</p>

<h2><b>GARANTIA EXCLUSIVA</b></h2>

<p>Se em até 15 dias você não ficar satisfeito com a mercadoria, devolvemos o seu dinheiro.</p>
<p>Se você não gostar da mercadoria por qualquer motivo, você tem 15 dias para entrar em contato e cancelar a compra, você nos devolve a mercadoria e devolvemos o seu dinheiro total. Cobrimos todos os custos.</p>

<p></p>
</textarea>


          </div>


          <div class="item-formulario caixa-border padding-form" style="margin-bottom: 20px; margin-top: 20px;">

          <div class="tituloCat"><h2>Peso e dimensões</h2></div>

          <div class="caixa-border padding-form" style="margin-bottom: 20px; margin-top: 20px; width: 100%;">

          <div class="caixa">
          <p>Altura:</p>
          <input type="text" class="campo-form" required="" name="altura" style="width: 120px;">
          </div>

          <div class="caixa">
          <p>Comprimento:</p>
          <input type="text" class="campo-form" required="" name="comprimento" style="width: 120px;">
          </div>

          <div class="caixa">
          <p>Largura:</p>
          <input type="text" class="campo-form" required="" name="largura" style="width: 120px;">
          </div>

          <div class="caixa">
          <p>Peso:</p>
          <input type="text" class="campo-form" required="" name="peso" style="width: 120px;">
          </div>



          </div>
          </div>

          <div class="item-formulario caixa-border padding-form" style="margin-bottom: 20px; margin-top: 20px;">

          <div class="tituloCat"><h2>Keywords SEO</h2></div>

          <div class="" style="margin-bottom: 20px; margin-top: 20px; width: 100%;">

            <textarea type="text" name="keywords" required="" class="descricao" rows="1" placeholder="Ex: Cadeiras de ferro, mesas de ferro, cadeiras para buffet..." style="overflow-x: hidden; word-wrap: break-word; width: 95%;"></textarea>           

          </div>
          </div>

          <a href="lista_produtos.php" class="button-cancelar">cancelar</a>

          <input type="submit" value="Salvar Produto" class="button-cadastrar" name="cadastrar_produto">    


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
