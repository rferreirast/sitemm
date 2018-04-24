<?php 

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

 ?>
<style>

.menu-lateral{
 display: flex;
 flex-direction: column;
 width: 20%;
 background-color: #222222;
 transition: width 0.25s linear;
 min-height: 100vh;
}

.menu-itens{
 float: left;
}
li{
 list-style: none;	
}
.menu-item a{
 width: 100%;
 float: left;
 font-size: 16px;
 color: #b2b2b2;
 padding: 18px 15px;
 border-bottom: 1px solid rgba(255, 255, 255, 0.04);
 text-decoration: none;
}
.menu-item a:hover{
  background: #0c385e;
  color: #fff;
}

.menu-select{
 background: #092a47;
 color: #fff !important;
}
#icones-menu{
 font-size: 20px;
 margin-right: 5px;
}


/* MENU ADMINITRADOR ==================*/
.menu-adm{
 float: right;
 width: 100%;
 background: #232322;
 padding: 10px 0;
 border-bottom: 1px solid rgba(255, 255, 255, 0.04);
}

.item-menu{
 float: left;
 width: 100%;
}
.item-menu label{
 color: #fff;
 font-size: 20px;
 font-weight: bold;
 display: block;
 padding: 10px;
}
.item-menu ul{
 width: 100%;
 list-style: none;
 overflow: hidden;
 max-height: 0;
 transition: all .4s linear;
 padding: 0;
 margin: 0;
 /*transform: translateX(-65%);*/
}
.item-menu a{
 width: 100%;
 float: left;
 color: #b2b2b2;
 font-size: 16px;
 padding: 10px;
 text-decoration: none;
 padding-left: 50px;
}
.item-menu a:hover{
 background: #0c385e; 
}
.item-menu input{
 display: none;
}
.texto-menu-adm{
 float: left;
 width: 100%;
 display: flex;  
}
.texto-menu-adm p{
 font-size: 16px;
 margin-left: 10px;
 margin-right: 10px;
}
.item-menu input:checked ~ ul{
 width: 100%;
 height: auto;
 background: #333;
 max-height: 500px;
 transform: all;
 padding: 0;
 margin: 0;
 margin-top: 27px;
}

</style>

<div class="menu-lateral">
		
         <div class="menu-itens">

         	<li class="menu-item"><a href="painel_adm.php"><i class="fas fa-home" id="icones-menu"></i>Inicio</a></li>

          <div class="menu-adm">

          <nav>
          
            <div class="item-menu">
              <input type="checkbox" id="check2">
              <label for="check2"><div class="texto-menu-adm"><span class="icon fas fa-shopping-cart"></span><p>Vendas</p><span class="icon fas fa-angle-right"></span></div></label>
               <ul>

              <li><a class="item-menu" href="/administrador/vendas/lista_pedidos.php">Pedidos</a></li>
              <li><a class="item-menu" href="/administrador/vendas/lista_clientes.php">Clientes</a></li>
              <li><a class="item-menu" href="#">Incluir Pedido</a></li>
              <li><a class="item-menu" href="#">Incluir Cliente</a></li>              
                  
               </ul>
            </div>         

          </nav>

        </div>

        <div class="menu-adm">

          <nav>
          
            <div class="item-menu">
              <input type="checkbox" id="check3">
              <label for="check3"><div class="texto-menu-adm"><span class="icon fas fa-cubes"></span><p>Produtos</p><span class="icon fas fa-angle-right"></span></div></label>
               <ul>

              <li><a class="item-menu" href="/administrador/produtos/lista_produtos.php">Produtos Cadastrados</a></li>
              <li><a class="item-menu" href="#">Categorias</a></li>
                  
               </ul>
            </div>         

          </nav>

        </div>

        <div class="menu-adm">

          <nav>
          
            <div class="item-menu">
              <input type="checkbox" id="check4">
              <label for="check4"><div class="texto-menu-adm"><span class="icon fas fa-cubes"></span><p>Informações</p><span class="icon fas fa-angle-right"></span></div></label>
               <ul>

              <li><a class="item-menu" href="informacoes/lista_postagens.php">Postagens</a></li>                
               </ul>
            </div>         

          </nav>

        </div>

        <div class="menu-adm">

          <nav>
          
            <div class="item-menu">
              <input type="checkbox" id="check5">
              <label for="check5"><div class="texto-menu-adm"><span class="icon fas fa-th-large"></span><p>Mais</p><span class="icon fas fa-angle-right"></span></div></label>
               <ul>

              <li><a class="item-menu" href="#">Minhas informações</a></li>
              <li><a class="item-menu" href="#">SEO</a></li> 
              <li><a class="item-menu" href="mais/lista_newsletter.php">Newsletter</a></li> 
              <li><a class="item-menu" href="mais/lista_clientes.php">Nossos Clientes</a></li> 
              <li><a class="item-menu" href="mais/galeria_imagens.php">Galeria Imagens</a></li>                
               </ul>
            </div>         

          </nav>

        </div>



         </div>

</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$(" a[href='"+location.href.substring(location.href.lastIndexOf("/")+1,255)+"']").addClass("menu-select");
});
</script>