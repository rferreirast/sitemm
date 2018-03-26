<style>
@media screen and (min-width:320px) {
.content-topo-tarja{
 float: left;
 width: 100%;
 padding-top: 20px;
 padding-bottom: 20px;
 background: #014d8f;
}
.logo{
 float: left;
 width: 10%;
}
.img-logo{
 float: left;
 width: 100%;
 text-align: center;
}
.img-logo img{
 max-width: 150px;
}

/*=====================*/
.container-pesquisa{
 float: left;
 width: 70%;
 text-align: left;
}
 input.campo-form{
 font-size: 15px;
 border-radius: 3px;
 color: #343434;
 background-color: #fff;
 box-sizing: border-box;
 height: 30px;
 padding: 0px 0.4em;
 width: 250px;
 margin-left: 10px;
 border: 1px solid #c4c4c4 !important;
 margin-top: 0px;
 box-shadow: 0 1px 2px 0 rgba(0,0,0,.2);
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
.content-topo-tarja{
 padding-top: 5px;
 padding-bottom: 5px;
}
.logo{
 float: left;
 width: 10%;
 margin-left: 15px;
 text-align: left;
}
.img-logo{
 max-width: 100px;
}
.img-logo img{

}

/*====================*/
.container-pesquisa{
 float: left;
 width: 80%;
 text-align: left;
}
 input.campo-form{
 width: 600px;
 height: 35px;
 margin-top: 10px;
}

}
</style>

<div class="content-topo-tarja">
 <div class="container-site">

<div class="cabecalho-topo-logo-menu" style="width: 100%; float: left;">

 <div class="logo"><div class="img-logo"><img src="img/logo.png" alt=""></div></div> 

 <div class="container-pesquisa">
   
      <form method="post">

         <input type="text" class="campo-form" placeholder="Buscar Produtos..." name="pesquisa-produtos">

      </form>


 </div>

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




</div>

</div>
</div>