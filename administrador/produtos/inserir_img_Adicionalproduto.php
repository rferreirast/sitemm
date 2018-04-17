<?php

if (!isset($_SESSION)){session_start();}
include_once("../system/verifica_sessao.php");

//SALVA IMAGEM NA PASTA DE IMAGENS DO FTP
/*if( $_SERVER['REQUEST_METHOD']=='POST' ){*/

 if (isset($_FILES['imagem'])) {


  $servidor = 'ftp.mestremoveleiro.com.br';
  $caminho_absoluto = 'web/produtos/img-produtos/';
  $imagem = $_FILES['imagem'];

  if($imagem['name'] == "")      
     echo '<script>alert("Insira uma imagem!");</script>';

  else { 

  $con_id = ftp_connect($servidor) or die( 'Não conectou em: '.$servidor );
  ftp_login( $con_id, 'mestremoveleiro', 'ieASmo03' );

  ftp_put( $con_id, $caminho_absoluto.$imagem['name'], $imagem['tmp_name'], FTP_BINARY );

  $caminho_maisImg = $imagem['name'];


//SALVA IMAGEM NO BD
  $id_produto = $_GET['codigo'];
  $outras_fotos = $caminho_maisImg;

 $salvaFoto = "INSERT INTO loja_fotos_produtos (id_produto, outras_fotos) VALUES ('$id_produto', '$outras_fotos') ";
  
  if ($conn->query($salvaFoto) > 0) {
   //header("location: edita_produto.php?codigo=$id_produto");
   echo" <script>document.location.href='edita_produto.php?codigo=$id_produto'</script>";
  }

}

}

//SALVA O CAMINHO DA FOTO NO BANCO DE DADOS

?>

<style>

.container-formulario, .container-imagem-formulario, .container-caminho-imagem{
  float: left;
  width: 100%;   
  margin-left: 10px;    
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
  <input type="file" class="enviar_imagem_form" name="imagem" />
  <input type="submit" class="enviar_imagem_button" name="enviar" value="Inserir Imagem" />
</form>

</div> 
