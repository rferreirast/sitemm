<?php 

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

 $listar = "SELECT * FROM lista_newsletter";
 $resultado_listar = mysqli_query($conn, $listar);

 ?>

<!DOCTYPE html>
<html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Mestre moveleiro | Lista Newsletter</title> <!-- INFO 1 -->
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

.container-painel-adm{

 height: 900px;
}

.container-newsletter{ 
 float: left;
 width: 100%;
}
.newsletter-item{ 
 float: left;
 width: 100%;
 padding: 0 20px;
 display: flex;
 margin-bottom: 20px;
 border-bottom: 1px solid #dddddd;
}

.codigo-newsletter{
 float: left;
 width: 55px;
 height: 100px;
}
.codigo-newsletter p{
 font-size: 18px;
 color: #151515;
 text-align: center;
 margin-top: 25px;
}
.nome-newsletter{
 float: left;
 width: 100px;
 height: 100px;
 padding: 5px;
}
.nome-newsletter p{
 font-size: 18px;
 color: #151515;
 text-align: center;
 margin-top: 25px;
}
	
</style>

</head>

<?php include('tarja_topo.php') ?>

<div class="container-area-administrador">

<!-- MENU LATERAL -->
<?php include('menu_lateral.php'); ?>


<div class="conteudo-principal"> 
	<div class="container-conteudo">
		
		<div class="titulo-categotia-adm"><h2>Lista Newsletter</h2></div>

    <div class="container-painel-adm">

    <div class="container-newsletter">

     <?php while($listar_newsletter = mysqli_fetch_assoc($resultado_listar)){ ?>

       <div class="newsletter-item">     

         <div class="codigo-newsletter"><p><?php echo utf8_encode ($listar_newsletter["id"]); ?></p></div>

         <div class="nome-newsletter"><p><?php echo utf8_encode ($listar_newsletter["email"]); ?></p></div>      
         
       </div>

       <?php } ?>
      
     </div>

    </div>
      


	</div>

</div>


</div>

</body>

</html>
