<?php 

    include_once("../system/config.php");

    //$listar = mysqli_query($conn, "SELECT * FROM produtos") or print mysql_error();

    $listar = "SELECT * FROM clientes";
    $resultado_listar = mysqli_query($conn, $listar);
    
 ?>

<style>
@media screen and (min-width:320px) {

.container-clientes{
 float: left;
 width: 100%;
 margin-top: 50px;
 margin-bottom: 30px;
}
.item-produto{
 width: 100%;
 float: left;
}
.item-produto-nivel{
 width: 100%;
 float: left;
 padding: 0;
 background: #fff;
 margin-bottom: 15px;
 border-radius: 4px;
 padding-top: 20px;
 padding-bottom: 20px;
box-shadow: rgba(0, 0, 0, 0.3) 5px 10px 8px 1px;
}
.texto-item-produto h2{
 color: #666;
 font-weight: 700;
 font-size: 28px !important;
 letter-spacing: -1.75px;
 line-height: 32px;
 margin: 4px 0;
}
.item-produto-nivel p{
 color: #333;
 font-size: 16px !important;
}
.item-produto-nivel img{
 padding-bottom: 20px;
}

}

/****** PARA O PC ******/
@media screen and (min-width:1025px) {
.item-produto{
 width: 33.333%;
 padding: 0 5px;
 float: left;
}

.texto-item-produto h2{
 font-size: 24px !important;
}

}
/* PARA PC **/
@media screen and (min-width:1400px) {

.texto-item-produto h2{
 font-size: 28px !important;
}

}
	
</style>

<div class="container-clientes">
	<div class="container-site">

	<div class="titulo-container-clientes" style="width: 100%; float: left;"><p style="font-size: 28px !important; color: #666666; margin-left: 10px; margin-right: 10px;">Nossos clientes</p></div>

    <?php while($listar_clientes = mysqli_fetch_assoc($resultado_listar)){ ?>

    <!-- CLIENTE -->
    <div class="item-produto"> <div class="item-produto-nivel">    
    <div class="texto-item-produto" style="padding: 16px 16px 0;">
    <h2><?php echo utf8_encode ($listar_clientes["cliente"]); ?></h2> <!-- TITULO CLIENTE -->
    <p><?php echo utf8_encode ($listar_clientes["cidade"]); ?></p></div> <!-- DESCRIÇÃO CLIENTE -->    
    <img src="http://www.mestremoveleiro.com.br/clientes/img-clientes/<?php echo utf8_encode ($listar_clientes["foto"]); ?>" alt=""> <!-- IMAGEM CLIENTE -->
    </div></div>

    <?php } ?>


  </div>
</div>  