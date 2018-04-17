<?php

if (!isset($_SESSION)){session_start();}
include_once("../system/verifica_sessao.php");

//SALVA IMAGEM NA PASTA DE IMAGENS DO FTP
/*if( $_SERVER['REQUEST_METHOD']=='POST' ){*/

 if (isset($_FILES['arquivo'])) {


  $servidor = 'ftp.mestremoveleiro.com.br';
  $caminho_absoluto = 'web/produtos/img-produtos/';
  $arquivo = $_FILES['arquivo'];

  if($arquivo['name'] == "")      
     echo '<script>alert("Insira uma imagem!");</script>';

  else { 

  $con_id = ftp_connect($servidor) or die( 'Não conectou em: '.$servidor );
  ftp_login( $con_id, 'mestremoveleiro', 'ieASmo03' );

  ftp_put( $con_id, $caminho_absoluto.$arquivo['name'], $arquivo['tmp_name'], FTP_BINARY );

  $caminho_img = $arquivo['name'];

}

}

//SALVA O CAMINHO DA FOTO NO BANCO DE DADOS

?>

<style>

.container-formulario, .container-imagem-formulario, .container-caminho-imagem{
  float: left;
  width: 100%;       
}

input.enviar_imagem_form{
 float: left;
 margin-bottom: 20px;
 
}
input.enviar_imagem_button{
 float: left;
 margin-left: 20px;
 width: 150px;
 height: 30px;
 border-radius: 10px;
 background: #014d8f;
 color: #fff;
 margin-bottom: 20px;
}
input.form_caminhoImg{
 float: left;
 margin-bottom: 20px; 
 width: 150px;
 height: 30px; 
 border: 1px solid #c4c4c4;    
}
        
</style>

<div class="container-formulario">  

<form action="" method="post" enctype="multipart/form-data">             
  <input type="file" class="enviar_imagem_form" name="arquivo" />
  <input type="submit" class="enviar_imagem_button" name="enviar" value="Carregar Imagem" />
</form>

</div>  
<div class="container-imagem-formulario">

 <img src="http://www.mestremoveleiro.com.br/produtos/img-produtos/<?php echo $caminho_img; ?>" alt="" style="width: 300px; height: 300px; background: #d4d4d4; "><br><p></p>
</div>

<div class="container-caminho-imagem">

 </div>
