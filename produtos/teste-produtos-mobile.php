<?php include_once 'dados/dados_produtos.php'; ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="../css/style.css">


<style>
.slide-mobile {display:none}
.w3-left, .w3-right, .button-slide {cursor:pointer}
.button-slide {height:13px;width:13px;padding:0}

.display-bottommiddle{
 float: left;
 width: 100%;
 text-align: center;
 margin-top: 16; 
 margin-bottom: 16px;
}
.button-slide{
 height: 15px;
 width: 15px;
 padding: 0;
 display: inline-block;
 text-align: center;
 cursor: pointer;
}
.button-slide-color{
 background: #151515;
}
.button-slide-color:hover{
 background-color: #c40f0f !important;
}
</style>
<body>

<div class="container-produtos-mobile">
  <div class="container-site">

   <div class="titulo-container-produtos" style="width: 100%; float: left;"><p style="font-size: 28px !important; color: #666666; margin-left: 10px; margin-right: 10px;">Nossos produtos</p></div>

  <div class="w3-content w3-display-container" style="max-width:800px">

    <div class="slide-mobile">
      <div class="item-produto">
      <img src="<?php echo ($foto_produto1); ?>" alt=""> <!-- FOTO -->
      <p><?php echo ($nome_produto1); ?></p> <!-- NOME -->
      <p id="descricao"><?php echo ($descricao1_produto1); ?></p> <!-- DESCRIÇÃO 1 -->
      <p id="descricao"><?php echo ($descricao2_produto1); ?></p> <!-- DESCRIÇÃO 2 -->
      <p id="descricao"><?php echo ($descricao3_produto1); ?></p> <!-- DESCRIÇÃO 3 -->
      <a href="#" class="button-item-produto">Orçamento</a>
      </div>
    </div>

    <div class="slide-mobile">
      <div class="item-produto">
      <img src="<?php echo ($foto_produto2); ?>" alt=""> <!-- FOTO -->
      <p><?php echo ($nome_produto2); ?></p> <!-- NOME -->
      <p id="descricao"><?php echo ($descricao1_produto2); ?></p> <!-- DESCRIÇÃO 1 -->
      <p id="descricao"><?php echo ($descricao2_produto2); ?></p> <!-- DESCRIÇÃO 2 -->
      <p id="descricao"><?php echo ($descricao3_produto2); ?></p> <!-- DESCRIÇÃO 3 -->
      <a href="#" class="button-item-produto">Orçamento</a>
      </div>
    </div>

    <div class="slide-mobile">
      <div class="item-produto">
      <img src="<?php echo ($foto_produto1); ?>" alt=""> <!-- FOTO -->
      <p><?php echo ($nome_produto3); ?></p> <!-- NOME -->
      <p id="descricao"><?php echo ($descricao1_produto3); ?></p> <!-- DESCRIÇÃO 1 -->
      <p id="descricao"><?php echo ($descricao2_produto3); ?></p> <!-- DESCRIÇÃO 2 -->
      <p id="descricao"><?php echo ($descricao3_produto3); ?></p> <!-- DESCRIÇÃO 3 -->
      <a href="#" class="button-item-produto">Orçamento</a>
      </div>
    </div>


    <div class="display-bottommiddle" style="width:100%">
      <span class="button-slide button-slide-color demo " onclick="currentDiv(1)"></span>
      <span class="button-slide button-slide-color demo " onclick="currentDiv(2)"></span>
      <span class="button-slide button-slide-color demo " onclick="currentDiv(3)"></span>
    </div>


  </div>

 </div>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("slide-mobile");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
     dots[i].className = dots[i].className.replace(" w3-white", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-white";
}
</script>

</body>
</html> 