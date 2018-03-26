<style>
@media screen and (min-width:320px) {
.container-clientes-destaques{
 float: left;
 width: 100%;
 background: #e4e4e5;
 padding-top: 20px;
 padding-bottom: 20px;
}
.container-clientes-desktop{
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
.container-slide{
 float: left;
 width: 100%;	
}
.border-item-clientes{
 float: left;
 width: 100%;
 margin-bottom: 10px;
}
.item-cliente{
 float: left;
 width: 100%;
 background: #fff;
 border-radius: 5px;
 padding: 30px 0px 30px 0px;
 box-shadow: 0 2px 2px 0 rgba(0,0,0,.2);	
}
.item-cliente img{
 padding-top: 0px;
}
.item-cliente p{
 color: #014d8f;
 font-size: 18px !important;
 font-weight: bold;
 text-align: center;
 padding-bottom: 10px;
}

@media screen and (min-width:1025px) {
.border-item-clientes{
 width: 25%;
 padding: 0 10px;
}

}

</style>


<div class="container-clientes-destaques" >
  <div class="container">

  <div class="titulo-categoria"><h2>Nossos clientes</h2><a href="clientes/">Ver mais</a></div>

            <!-- CLIENTES -->
            <div class="border-item-clientes"><div class="item-cliente">
			<img src="clientes/<?php echo ($foto_cliente1); ?>" alt="">
			</div></div>

			<!-- CLIENTES -->
            <div class="border-item-clientes"><div class="item-cliente">
			<img src="clientes/<?php echo ($foto_cliente4); ?>" alt="">
			</div></div>
	
			<!-- CLIENTES -->
            <div class="border-item-clientes"><div class="item-cliente">
			<img src="clientes/<?php echo ($foto_cliente8); ?>" alt="">
			</div></div>

			<!-- CLIENTES -->
            <div class="border-item-clientes"><div class="item-cliente">
			<img src="clientes/<?php echo ($foto_cliente13); ?>" alt="">
			</div></div>

  </div>
</div>	


<div class="container-produtos-destaques-mobile">

</div>