<link rel="stylesheet" href="css/style.css">

<style>
@media screen and (min-width:320px){
.apesentacao-blog{
 float: left;
 width: 100%;
 max-height: 520px;
 background-image: url(img/bg.png);
 background-repeat: no-repeat;
 background-size: 550px auto;
 background-position: -100px;
 padding-bottom: 100px;
}
.texto-apr{
 float: left;
 width: 100%;
}
/** LOGO DO TOPO MOBILE **/
.img-marca-mobile{
 display: block;
 width: 80%;
 margin: auto;
 margin-top: 20px;
 margin-bottom: 10px;
}
.img-marca-mobile img{
 width: 100%;
}

.frase-apr h2{
 color: #fff;
 font-size: 20px;
 text-align: center;
 margin-bottom: 20px;
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
 width: 50%;
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
@media screen and (min-width:1025px) {

/************ LOGO MENU ************/

.logo-menu-postagens{
 display: block;
 float: left;
 width: 50%; 
 margin-top: 20px;
}
.logo-menu-postagens img{
 max-width: 150px;
 margin-top: 10px;
 margin-left: -20px;
}

/************* APRESENTAÇÃO PAGINA INICIAL  *************/
.apesentacao-blog{
 float: left;
 width: 100%;
 min-height: 400px;
 background-image: url(img/bg.png);
 background-repeat: no-repeat;
 background-size: 1650px auto;
 background-position: 0px -220px;
}
.texto-apr{
 float: left;
 width: 100%;
 padding-top: 20px;
 padding-bottom: 20px;
}
.frase-apr h2{
 color: #fff;
 font-size: 25px !important;
 padding: 10px;
 margin-top: 50px;
 text-align: center;
 margin-bottom: 10px;
}

/** LOGO DO TOPO MOBILE **/
.img-marca-mobile{
 display: none;
 }

/************ MENU ************/
.menu-mobile{
 display: none; 
}
.menu-container{
 display: block;
 float: right;
 width: 50%;
 margin-top: 20px;
}
.itens-menu-container{
 float: right;
}
li{
 float: left;
 list-style-type: none;
}
.item-menu-container{
 float: left;
 color: #fff;
 font-size: 15px;
 padding: 10px 15px;
 font-weight: bold;
}
.item-menu-container:hover{
 color: #c4c4c4;
}

}

</style>


 <div class="apesentacao-blog">
   <div class="container">

<div class="logo-menu-postagens"><img src="/logo.png" alt=""></div>

<!-- MENU MOBILE -->

<div class="menu-mobile">

      <nav>
  
    <div class="item-mobile">
      <input type="checkbox" id="check1">
      <label for="check1"><span class="icon fa fa-align-justify"></span></label>
      <ul>

       <a class="item-mobile" href="/">inicio</a>
       <a class="item-mobile" href="/produtos">produtos</a>
       <a class="item-mobile" href="/clientes">clientes</a>       
       <a class="item-mobile" href="/contato">contato</a>
        
      </ul>
      </div>         

        </nav>

</div>


<!-- MENU DESKTOP -->

<div class="menu-container">
    
  <div class="itens-menu-container">
    <li><a class="item-menu-container" href="/">inicio</a></li>
    <li><a class="item-menu-container" href="/produtos">produtos</a></li>
    <li><a class="item-menu-container" href="/clientes">clientes</a></li>    
    <li><a class="item-menu-container" href="/contato">contato</a></li>
  </div>

</div>

  <div class="texto-apr"> 

    <div class="img-marca-mobile"><img src="img/startpages-logo.png" alt=""></div> 

   </div>  


 </div> 
</div>
</div>
