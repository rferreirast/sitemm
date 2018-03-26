<style>
@media screen and (min-width:320px) {
.footer{
 width: 100%;
 float: left;
 background-color: #151515;
 padding-top: 20px;
 padding-bottom: 5px;
}
.dados-contato{
 float: left;
 width: 100%;
 margin-bottom: 20px;
}

.endereco, .telefone, .atendimento{ float: left;width: 100%;}
.endereco p{font-size: 15px !important; color: #fff;}
.telefone p{font-size: 15px !important; color: #fff;}
.atendimento p{font-size: 15px !important; color: #fff;}


.dados-newsletter{
 float: left;
 width: 100%;
 margin-bottom: 20px;	
}
.dados-redes-sociais{
 float: left;
 width: 100%;
 margin-bottom: 20px;
 text-align: center;	
}

/*foooter*/  
.copyright{
 float: left;
 width: 100%;
 background-color: #121212;
}
.copyright-titulo p{
 font-size: 16px !important;
 color: rgba(255,255,255,0.7);
 text-align: center;
 margin-top: 10px;
}

}

/****** PARA O PC ******/
@media screen and (min-width:1025px) {
.dados-contato{
 width: 45%;
}
.dados-newsletter{
 width: 30%;
}
.dados-redes-sociais{
 width: 25%;
}

</style>

</head>

<body>

<div class="footer">
 <div class="container">

  <div class="dados-contato">
     <div class="endereco"><p>Rua Benedita Silveira Leme - Mogi Guaçu-SP</p></div>
  	 <div class="telefone"><p>(19) 3818-8942</p></div>
  	 <div class="atendimento"><p>Seg - Sex: 08:00 as 18:00</p></div>
  </div>

  <div class="dados-newsletter">
  	<?php include('souce=newsletter.php'); ?>
  </div>

  <div class="dados-redes-sociais">
  	<?php include('souce=redes-sociais.php'); ?>
  </div>

</div>

        <!-- FOOTER -->
        <div class="copyright">
          <div class="container-site">
            <div class="copyright-titulo"><p>Copyright ©Mestre Moveleiro. Todos os direitos reservados.</p></div>
          </div>
        </div>
</div>

</body>


</html>