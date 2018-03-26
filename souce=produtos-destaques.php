<style>
@media screen and (min-width:320px) {
.container-produtos-destaques{
 float: left;
 width: 100%;
 background: #e4e4e5;
}
.container-produtos-desktop{
 display: block !important;
 float: left;
 width: 100%;
 margin-top: 30px;
 margin-bottom: 30px;
}
.titulo-categoria{
 float: left;
 width: 100%;
 margin-bottom: 10px;
 display: flex	
}
.titulo-categoria h2{
 font-size: 25px !important;
 color: #666666;
 margin-left: 10px;
 margin-right: 10px;
}
.titulo-categoria a{
 font-size: 16px;
 color: #014d8f;
 font-weight: bold;
 margin: auto 0 8px;
}
.titulo-categoria a:hover{	
 color: #666666;
}
.container-slide{
 float: left;
 width: 100%;	
}
.border-item-produto{
 float: left;
 width: 100%;
 margin-bottom: 20px;
}
.item-produto{
 float: left;
 width: 100%;
 background: #fff;
 border-radius: 10px;
 border: 4px solid transparent;	
 padding: 30px 20px 30px 20px;
 box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);	
}
.item-produto img{
 padding: 0 20px;
 padding-top: 0px;
 margin-bottom: 20px;
}
.item-produto p{
 color: #014d8f;
 font-size: 18px !important;
 font-weight: bold;
 text-align: center;
 padding-bottom: 10px;
}

@media screen and (min-width:1025px) {
.border-item-produto{
 width: 25%;
 padding: 0 10px;
}

}

</style>


<div class="container-produtos-destaques">
  <div class="container">

  <div class="titulo-categoria"><h2>Nossos produtos</h2><a href="produtos/">Ver mais</a></div>

            <!-- PRODUTO DESTAQUE -->
            <div class="border-item-produto"><div class="item-produto">
			<img src="produtos/<?php echo ($foto_produto1); ?>" alt="">
			<p><?php echo ($nome_produto1); ?></p></div></div>


			<!-- PRODUTO DESTAQUE -->
            <div class="border-item-produto"><div class="item-produto">
			<img src="produtos/<?php echo ($foto_produto2); ?>" alt="">
			<p><?php echo ($nome_produto2); ?></p></div></div>

			<!-- PRODUTO DESTAQUE -->
            <div class="border-item-produto"><div class="item-produto">
			<img src="produtos/<?php echo ($foto_produto14); ?>" alt="">
			<p><?php echo ($nome_produto14); ?></p></div></div>

			<!-- PRODUTO DESTAQUE -->
            <div class="border-item-produto"><div class="item-produto">
			<img src="produtos/<?php echo ($foto_produto6); ?>" alt="">
			<p><?php echo ($nome_produto6); ?></p></div></div>

  </div>
</div>	


<div class="container-produtos-destaques-mobile">

</div>