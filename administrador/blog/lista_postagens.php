<?php 

if (!isset($_SESSION)){session_start();}
include_once("../system/verifica_sessao.php");

//BUSCA OS DADOS DO PEDIDO NO MYSQL
 $pesquisa_post = "SELECT * FROM blog_postagens";
 $resultado_post = mysqli_query($conn, $pesquisa_post);

 ?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre Moveleiro | Postagem Clientes</title> <!-- INFO 1 -->
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
.container-addPostagem{
 float: left;
 width: 20%; 
 text-align: right;
}
.button-add-Postagem a{
 padding: 8px 20px;
 background: #555;
 color: #fff;
 border-radius: 5px;
 text-decoration: none;  
}
/*==========================*/
.container-lista-Postagem{
 float: left;
 width: 100%;  
}

</style>

</head>

<?php include('../tarja_topo.php') ?>

<div class="container-area-administrador">

<!-- MENU LATERAL -->
<?php include('../menu_lateral.php'); ?>

<div class="conteudo-principal"> 
  <div class="container-conteudo">
  
    <div class="titulo-categotia-adm"><h2>Postagem Clientes</h2></div>

    <div class="container-m2">
   
    <div class="container-addPostagem" style="width: 100%; text-align: right;">
      <div class="button-add-Postagem"><a href="nova_postagem.php">Nova Postagem</a></div>
    </div>  

    </div>

    <div class="container-lista-Postagem">

<style>

.listaPosts{width: 100%;}
.headerPosts{padding: 16px; font-size: 14px !important; font-weight: 700; text-align: center; color: #fff; background: #014d8f; text-align: left;}
.cellPosts{position: relative; padding: 14px; font-size: 14px !important; text-align: center; border: 0; border-bottom: 1px solid #c4c4c4; text-align: left;}

.button-detalhesPost{
 padding: 8px 20px;
 background: #ffc11e;
 color: #fff;
 border-radius: 5px;
 text-decoration: none;
}
.button-detalhesPost:hover{ color: #fefefe; background: #ffb900; text-decoration: none;}

</style>

      <table class="listaPosts">

       <thead>
         <tr>
           <th class="headerPosts">Id</th>
           <th class="headerPosts">Titulo</th>
           <th class="headerPosts">Descrição</th>
           <th class="headerPosts"></th>
         </tr>
       </thead>     

     <?php while($carrega_post = mysqli_fetch_assoc($resultado_post)){ ?>

       <tbody>
         <tr>
           <td class="cellPosts"><?php echo utf8_encode($carrega_post["id"]); ?></td>
           <td class="cellPosts"><?php echo utf8_encode($carrega_post["post_titulo"]); ?></td>
           <td class="cellPosts"><?php echo utf8_encode($carrega_post["post_descricao"]); ?></td>
           <td class="cellPosts"><a href="editar_postagem.php?post=<?php echo utf8_encode($carrega_post["id"]); ?>" class="button-detalhesPost">detalhes</a></td>
         </tr>
       </tbody>

     <?php } ?>


     </table>

    </div>

    </div>

  </div>


</body>

</html>
