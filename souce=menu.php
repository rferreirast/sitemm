<style>
@media screen and (min-width:320px) {
.content-topo{
 float: left;
 width: 100%;
 padding-top: 20px;
 padding-bottom: 20px;
 background: #014d8f;
}
.logo{
 float: left;
 width: 80%;
}
.img-logo{
 float: left;
 width: 100%;
 text-align: center;
}
.img-logo img{
 max-width: 150px;
}

/************ MENU MOBILE ************/

.menu-container{
  display: none;  
}
.menu-mobile-postagens{
 float: left;
 width: 100%;
 background: #121212;
 padding-top: 6px;
 padding-bottom: 6px;
}
.logo-menu-postagens{
 display: none;
}
.menu-mobile{
 display: block;
 width: auto;
 float: right;
}
.item-mobile{
 float: right;
 width: 30px;
}
.item-mobile label{
 color: #fff;
 font-size: 20px;
 font-weight: bold;
 display: block;
 padding: 10px;
}
.item-mobile ul{
 width: 230px;
 list-style: none;
 overflow: hidden;
 max-height: 0;
 transition: all .4s linear;
 padding: 0;
 margin: 0;
 position: absolute;
 transform: translateX(-65%); 
}
.item-mobile a{
 width: 100%;
 float: right;
 color: #fff;
 font-size: 18px;
 padding: 10px;
 text-decoration: none;
}
.item-mobile input{
 display: none;
}
.item-mobile input:checked ~ ul{
 width: 200px;
 height: auto;
 background: #333;
 max-height: 500px;
 transform: all;
 padding: 0;
 margin: 0;
}

}
/****** PARA O PC ******/

@media screen and (min-width:1025px) {
.content-topo{
 padding-top: 10px;
 padding-bottom: 10px;
}
.logo{
 float: left;
 width: 30%;
 text-align: left;
}
.img-logo{
 max-width: 100px;
}
.img-logo img{

}

/************ MENU ************/
.menu-mobile{
 display: none;	
}
.menu-container{
 display: block;
 float: right;
 width: 70%;
 margin-top: 10px;
}
.itens-menu-container{
 float: right;
}
li{
 float: left;
}
.item-menu-container{
 float: left;
 color: #fff;
 font-size: 16px;
 margin: 5px 20px;
 font-weight: bold;
}
.item-menu-container:hover{
 color: #c8c8c8;
}

}
</style>

<div class="content-topo">
 <div class="container-site">

<div class="cabecalho-topo-logo-menu" style="width: 100%; float: left;">

 <div class="logo"><div class="img-logo"><img src="img/logo.png" alt=""></div></div> 

  <!-- MENU MOBILE -->

<div class="menu-mobile">

      <nav>
  
    <div class="item-mobile">
      <input type="checkbox" id="check1">
      <label for="check1"><span class="icon fa fa-align-justify"></span></label>
      <ul>

       <li><a class="item-mobile" href="/">inicio</a></li>
       <li><a class="item-mobile" href="/produtos">produtos</a></li>
       <li><a class="item-mobile" href="/clientes">clientes</a></li>       
       <li><a class="item-mobile" href="/contato">contato</a></li>
        
      </ul>
    </div>         

        </nav>

</div>

<!-- MENU DESKTOP -->

<div class="menu-container">
    
  <div class="itens-menu-container">
  	<a class="item-menu-container" href="/">inicio</a>
    <a class="item-menu-container" href="/produtos">produtos</a>
  	<a class="item-menu-container" href="/clientes">clientes</a>  	
    <a class="item-menu-container" href="/contato">contato</a>
  </div>

</div>


</div>

</div>
</div>