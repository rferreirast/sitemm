<?php 

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");

 ?>

<style>
@media screen and (min-width:320px) {

.tarja-topo-paineladm{
 float: left;
 width: 100%;
 background: #014d8f;
}
.img-logo{
 float: left;
 width: 70%;
 margin-left: 15px;
}
.img-logo img{
 max-height: 50px;
 text-align: center;
 margin-top: 7px;
}

.menu-login{
 float: right;
 width: 220px;
 background: #03335e;
 padding: 10px 0;
}

/* MENU ADMINITRADOR ==================*/
.item-menu-adm{
 float: left;
 width: auto;
}
.item-menu-adm label{
 color: #fff;
 font-size: 20px;
 font-weight: bold;
 display: block;
 padding: 10px;
}
.item-menu-adm ul{
 width: 220px;;
 list-style: none;
 overflow: hidden;
 max-height: 0;
 transition: all .4s linear;
 padding: 0;
 margin: 0;
 position: absolute;
 /*transform: translateX(-65%);*/
}
.item-menu-adm a{
 width: 100%;
 float: right;
 color: #fff;
 font-size: 16px;
 padding: 10px;
 text-decoration: none;
}
.item-menu-adm a:hover{
 background: #0c385e ; 
}
.item-menu-adm input{
 display: none;
}
.texto-menu-tarja{
 float: left;
 width: 100%;
 display: flex;  
}
.texto-menu-tarja p{
 font-size: 16px;
 margin-left: 10px;
 margin-right: 10px;
}
.item-menu-adm input:checked ~ ul{
 width: 220px;;
 height: auto;
 background: #333;
 max-height: 500px;
 transform: all;
 padding: 0;
 margin: 0;
 margin-top: 27px;
}

}
	
</style>

<div class="tarja-topo-paineladm">
	
<div class="img-logo"><img src="http://www.mestremoveleiro.com.br/produtos/img/logo.png" alt=""></div>

<div class="menu-login">

  <nav>
  
    <div class="item-menu-adm">
      <input type="checkbox" id="check1">
      <label for="check1"><div class="texto-menu-tarja"><span class="icon fas fa-user-circle"></span><p>Mestre moveleiro</p><span class="icon fas fa-angle-down"></span></div></label>
       <ul>

      <li><a class="item-menu-adm" href="#">Perfil</a></li>
	    <li><a class="item-menu-adm" href="#">Sair</a></li>
	        
       </ul>
    </div>         

  </nav>

</div>


</div>

