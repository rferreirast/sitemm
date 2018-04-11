<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
</head>
<body>

<style>	
body {
  margin: 20px;
  padding: 0;
  background: #333;
}

.container {
  max-width: 760px;
  margin: auto;
  border: #fff solid 3px;
  background: #fff;
}

.main-img img,
.imgs img {
  width: 100%;
}

.imgs {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 5px;
}

.imgs img:hover{

}

/* Fade in animation */
@keyframes fadeIn {
  to {
    opacity: 1;
  }
}

.fade-in {
  opacity: 0;
  animation: fadeIn 0.5s ease-in 1 forwards;
}
.menu-select{border: 1px solid #000 }

</style>

<div class="container">
  <div class="main-img">
    <img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/produto1.jpg" id="current">
 </div>

  <div class="imgs">
    <img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/produto2.jpg">
    <img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/produto3.jpg">
    <img src="https://preview.ibb.co/iQsPOb/img3.jpg" class="outraimagem" category="outraimagem">
    <img src="https://preview.ibb.co/gFFdib/img4.jpg" class="outraimagem" category="outraimagem">
    <img src="https://preview.ibb.co/hS5ppG/img5.jpg" class="outraimagem" category="outraimagem">
    <img src="https://preview.ibb.co/goKtGw/img6.jpg" class="outraimagem" category="outraimagem">
    <img src="https://preview.ibb.co/bSWjOb/img7.jpg" class="outraimagem" category="outraimagem">
    <img src="https://preview.ibb.co/i2o9pG/img8.jpg" class="outraimagem" category="outraimagem">
  </div>
</div>


<script>
const current = document.querySelector("#current");
const imgs = document.querySelectorAll(".imgs img");
const opacity = 0.6;

// Set first img opacity
imgs[0].style.opacity = opacity;

imgs.forEach(img => img.addEventListener("click", imgClick));

function imgClick(e) {
  // Reset the opacity
  imgs.forEach(img => (img.style.opacity = 1));

  // Change current image to src of clicked image
  current.src = e.target.src;

  // Add fade in class
  current.classList.add("fade-in");

  // Remove fade-in class after .5 seconds
  setTimeout(() => current.classList.remove("fade-in"), 500);

  // Change the opacity to opacity var
  e.target.style.opacity = opacity;
}

$(document).ready(function(){

        $('.outraimagem').click(function(){
          var catProduct = $(this).attr('class');
          console.log(catProduct);

          //OCULTA OS PRODUTOS
          //$(catProduct).addClass("menu-select");
           catProduct.classList.add("menu-select");

        });

      });
      


</script>

</body>
</html>

