<?php 

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

 $listar = "SELECT * FROM produtos";
 $resultado_listar = mysqli_query($conn, $listar);

 $status_produto[1] = "Ativo";
 $status_produto[2] = "Inativo";

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
      <p>Pesquisa:</p> <input type="text" class="campo-form" placeholder="Descrição 1" required="" name="descricao1">
    </div>  

    <div class="container-addProduto">
      <div class="button-add-produto"><a href="cadastrar_produto.php">+ Produto</a></div>
    </div>  

    </div>

    


    <div class="container-lista-produtos">

     <div class="lista-itens-produto">

     <?php while($listar_produtos = mysqli_fetch_assoc($resultado_listar)){ ?>

       <div class="produto-item">
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

</html>
