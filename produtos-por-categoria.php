<?php  

include_once("system/config.php");

//CARREGA CATEGORIAS 
 $pesquisa_categoria = "SELECT * FROM categorias";
 $resultado_categorias = mysqli_query($conn, $pesquisa_categoria);

?>

<style>

@media screen and (min-width:320px) {

.produtosCategoria{float: left; width: 100%; display: block;}

.iconesCategoria{float: left; width: 100%; padding: 20px 0; margin-bottom: 20px;}

.iconeCategoria-iten{
float: left;
width: 100%;
background: #fff;
color: #014d8f;
text-align: center;
padding: 20px 20px;
border: 1px solid #d5d5d5;

}
.iconeCategoria-iten:hover{ cursor: pointer; text-decoration: underline; }

.img-icon{float: left; width: 100%;}
.img-icon img{ width: 50px; }

}
/****** PARA O PC ******/
@media screen and (min-width:1025px) {

.produtosCategoria{display: none;}

.iconeCategoria-iten{
width: 16.666666666%;
}

}



</style>


<div class="produtosCategoria">
 <div class="container-site">

<div class="titulo-iconesCategoria" style="width: 100%; float: left;"><h2 style="font-size: 28px !important; color: #666666; margin-left: 10px; margin-right: 10px; font-weight: 300;">Produtos por Categoria</h2></div>

 	<div class="iconesCategoria">

 		 <?php while($carregar_categorias = mysqli_fetch_assoc($resultado_categorias)){ ?>

        <a href="/produtos/pesquisa?categoria=<?php echo utf8_encode ($carregar_categorias["categoria"]); ?>">
 		<div class="iconeCategoria-iten">		
 			<div class="img-icon"><img src="img/icons/<?php echo utf8_encode ($carregar_categorias["icone_categoria"]); ?>" id="img-icon" alt=""></div>
 			<p><?php echo utf8_encode ($carregar_categorias["categoria"]); ?></p>	
 		</div>
 	    </a>
              
         <?php } ?>  

 	</div>

 </div>	
</div>
