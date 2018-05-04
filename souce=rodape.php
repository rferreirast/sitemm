<style>
@media screen and (min-width:320px) {
.footer{
 width: 100%;
 float: left;
 background-color: #151515;
 padding-top: 20px;
 padding-bottom: 5px;
}
.container-footer{margin: auto; width: 80%;}
.dados-rodape{
 float: left;
 width: 100%;
 display: inline-grid;
 margin-bottom: 20px;
}
.dados-rodape p{width: 100%; float: left; font-size: 16px !important; color: #797979; margin-bottom: 5px;}
.dados-rodape a > p:hover{color: #014d8f;}
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
 padding: 10px 0;
}

}

/****** PARA O PC ******/
@media screen and (min-width:1025px) {
.dados-rodape{
 width: 25%;
}

</style>

</head>

<body>

<div class="footer">
 <div class="container-footer">

  <div class="dados-rodape">
     <h2 style="color: #444; font-size: 18px !important; font-weight: bold; margin-bottom: 10px;">CONTEÚDO</h2>
     <a href="/informacoes/info?Sobre-a-empresa&p=1"><p>Sobre a Empresa</p></a>
     <a href="/informacoes/info?Sobre-Produtos&p=2"><p>Sobre produtos</p></a>
  	 <a href="/informacoes/info?Sobre-o-Frete&p=3"><p>Sobre o Frete</p></a>
  	 <a href="/informacoes/info?Formas-de-Pagamento&p=4"><p>Sobre Pagamento</p></a>
     <a href="/nossos-clientes"><p>Nossos Clientes</p></a>
     <a href="/informacoes/"><p>Informações</p></a>
     <a href="/contato"><p>Contato</p></a>
  </div>

  <div class="dados-rodape">
  <h2 style="color: #555; font-size: 18px !important; font-weight: bold; margin-bottom: 10px;">CATEGORIAS</h2>

 <?php
 //CARREGA CATEGORIAS 
 $pesquisa_categoria = "SELECT * FROM categorias";
 $resultado_categorias = mysqli_query($conn, $pesquisa_categoria);
 ?>

     <?php while($carregar_categorias = mysqli_fetch_assoc($resultado_categorias)){ ?> 

     <a href="/produtos/pesquisa?categoria=<?php echo utf8_encode ($carregar_categorias["categoria"]); ?>"><p><?php echo utf8_encode ($carregar_categorias["categoria"]); ?></p></a>              

      <?php } ?>

  </div>

  <div class="dados-rodape">
  <h2 style="color: #555; font-size: 18px !important; font-weight: bold; margin-bottom: 10px;">INFORMAÇÕES</h2>

 <?php
 //CARREGA INFORMACOES PRINCIPAIS 
 $pesquisa_principal = "SELECT * FROM informacoes_postagens WHERE principal = 'sim' ";
 $resultado_principal = mysqli_query($conn, $pesquisa_principal);
 ?>

     <?php while($carregar_principal = mysqli_fetch_assoc($resultado_principal)){ ?> 

     <a href="/informacoes/info?<?php echo utf8_encode(str_replace (" ", "-",$carregar_principal["post_titulo"])); ?>&p=<?php echo utf8_encode ($carregar_principal["id"]); ?>"><p><?php echo utf8_encode ($carregar_principal["post_titulo"]); ?></p></a>             

      <?php } ?>

  </div>

  <div class="dados-rodape">
     <h2 style="color: #444; font-size: 18px !important; font-weight: bold; margin-bottom: 10px;">ATENDIMENTO</h2>
     <p><i class="fas fa-phone"></i> (19) 3818-8942</p>  
     <p><i class="fab fa-whatsapp"></i> (19) 3818-8942</p>
     <p><i class="fas fa-envelope-open"></i> contato@mestremoveleiro.com.br</p>
     <p><i class="fas fa-clock"></i> Segunda à sexta 08h às 18h</p>
  </div>

   
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