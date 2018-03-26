<?php 

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

 $listar = "SELECT * FROM produtos";
 $resultado_listar = mysqli_query($conn, $listar);

 $status_produto[1] = "Ativo";
 $status_produto[2] = "Inativo";

 //CARREGA CATEGORIAS 
 $pesquisa_categoria = "SELECT * FROM categorias";
 $resultado_categorias = mysqli_query($conn, $pesquisa_categoria);

 ?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre moveleiro | Lista de Produtos</title> <!-- INFO 1 -->
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

.container-m2{
 float: left;
 width: 100%;
 display: flex;
 padding: 0 20px;
 padding-bottom: 30px;
 margin-bottom: 30px;
 border-bottom: 1px solid #dddddd;
}
/*========================*/
.container-pesquisa{
 float: left;
 display: flex;
 width: 80%;  
}
.campo-form{
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
/*========================*/
.container-addProduto{
 float: left;
 width: 20%; 
 text-align: right;
}
.button-add-produto a{
 padding: 8px 20px;
 background: #555;
 color: #fff;
 border-radius: 5px;
 text-decoration: none;  
}
/*==========================*/
.container-lista-produtos{
 float: left;
 width: 100%;  
}

/**************/
.produto-item{
 float: left;
 width: 100%;
 padding: 0 20px;
 display: flex;
 margin-bottom: 20px;
 border-bottom: 1px solid #dddddd;
}
.status-produto{
 float: left;
 width: 60px;
 height: 100px;
}
.status-produto p{
 font-size: 18px;
 color: #151515;
 text-align: center;
 margin-top: 25px;
}
.codigo-produto{
 float: left;
 width: 55px;
 height: 100px;
}
.codigo-produto p{
 font-size: 18px;
 color: #151515;
 text-align: center;
 margin-top: 25px;
}
.imagem-item-produto{
 float: left;
 width: 100px;
 height: 100px;
 padding: 5px;
}
.imagem-item-produto img{
 width: 100%;
}
.descricao-produto{
 float: left;
 width: 900px;
 height: 100px;
 padding: 5px;
}
.descricao-produto p{
 font-size: 18px;
 color: #151515;
 margin-top: 25px;
}
.button-editar-produtos, .button-excluir-produtos {
 float: left;
 height: 100px; 
}
/* BOTÃO EDITAR **/
.button-editar-produtos a{
 float: left;
 padding: 8px 20px;
 background: #014d8f;
 color: #fff;
 border-radius: 5px;
 margin-top: 25px;
 text-decoration: none;
}
.button-editar-produtos a:hover{background: #092a47;}

/* BOTÃO EXCLUIR **/
.button-excluir-produtos a{
 float: left;
 padding: 8px 20px;
 background: #c40f0f;
 color: #fff;
 border-radius: 5px;
 margin-top: 25px;
 text-decoration: none;
 margin-left: 10px;
}
.button-excluir-produtos a:hover{background: #890a0a;}


/*===========================*/
.item a{
 color: #014d8f;
 font-weight: bold;
}
.item b{
 font-weight: bold;
}
.item input{
 display: none;
}
.item input:checked ~ ul{
 height: auto;
 max-height: 1500px;
 transform: all;
 padding-top: 20px;
 padding-bottom: 25px;
 margin-left: 10px;
}

/*MENU DROP*/
.category_list {
 float: left;
 display: inline-block;
}
.dropbtn {
 color: #fff;
 font-size: 15px;
 padding: 5px 15px;
 font-weight: bold;
 cursor: pointer;
 background: #014d8f;
 border-radius: 5px;
 margin-bottom: 2px;
}

.dropdown-content {
 display: none;
 position: absolute;
 background-color: #333;
 min-width: 185px;
 border-radius: 5px;
 padding: 20px 0;

}

.dropdown-content a {
 color: black;
 color: #fff;
 padding: 12px 16px;
 text-decoration: none;
 display: block;
}

.dropdown-content a:hover {background-color: #3887f5;}

.category_list:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
}
</style>

</head>

<?php include('tarja_topo.php') ?>

<div class="container-area-administrador">

<!-- MENU LATERAL -->
<?php include('menu_lateral.php'); ?>


<div class="conteudo-principal"> 
	<div class="container-conteudo">
	

		<div class="titulo-categotia-adm"><h2>Lista de produtos</h2></div>

    <div class="container-m2">

    <div class="container-pesquisa">
      <!---<p>Pesquisa:</p> <input type="text" class="campo-form" placeholder="Descrição 1" required="" name="descricao1">-->

          <!--<p>Categoria:</p>
          <label for="categoria"></label>
          <select name="categoria" class="category_list campo-form">
            <option class="categoy_item" value="0">Todos</option>            
            <option class="categoy_item" value="1">Cadeiras</option>
            <option class="categoy_item" value="2">Mesas</option> 
            <option class="categoy_item" value="3">Banquetas</option> 
            <option class="categoy_item" value="4">Poltronas</option>                
          </select>--> 


        <div class="category_list">
          <button class="dropbtn">Filtro por Categorias <span class="icon fas fa-angle-down" id="icon"></span></button>
          <div class="dropdown-content">

            <a href="#" class="category_item" category="0">Todos</a>

            <?php while($carregar_categorias = mysqli_fetch_assoc($resultado_categorias)){ ?>               

                  <a href="#" class="category_item" category="<?php echo utf8_encode ($carregar_categorias["categoria"]); ?>"><?php echo utf8_encode ($carregar_categorias["categoria"]); ?></a>

                <?php } ?> 

          </div>
        </div>


      </div>      

    <div class="container-addProduto">
      <div class="button-add-produto"><a href="cadastrar_produto.php">+ Produto</a></div>
    </div>  

    </div>

    <div class="container-lista-produtos">

     <div class="lista-itens-produto">

     <?php while($listar_produtos = mysqli_fetch_assoc($resultado_listar)){ ?>

       <div class="produto-item product-item" category="<?php echo utf8_encode ($listar_produtos["categoria"]); ?>">
         <div class="status-produto"><p><?php echo utf8_encode ($status_produto[$listar_produtos["status"]]); ?></p></div>
         <div class="codigo-produto"><p><?php echo utf8_encode ($listar_produtos["id"]); ?></p></div>
         <div class="imagem-item-produto"><img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo utf8_encode ($listar_produtos["foto"]); ?>" alt=""></div>
         <div class="descricao-produto"><p><?php echo utf8_encode ($listar_produtos["nome"]); ?></p></div>

         <div class="button-editar-produtos"><a href="edita_produto.php?codigo=<?php echo utf8_encode ($listar_produtos["id"]); ?>">editar</a></div>
         
       </div>

       <?php } ?>
      
     </div>    

    </div>

	</div>

</div>

</div>

</body>

<script>
      
      $(document).ready(function(){

        //$('.category_list .categoy_item[value="0"]');

        $('.category_item').click(function(){
          var catProduct = $(this).attr('category');
          console.log(catProduct);

          //OCULTA OS PRODUTOS
          $('.product-item').hide();

          //MOTRA OS PRODUTOS
          $('.product-item[category="'+catProduct+'"]').show();

        });

        $('.category_item[category="0"]').click(function(){
          //MOTRA TODOS PRODUTOS
          $('.product-item').show();
        

        });

      });

    </script>

</html>
