<?php 

include_once("../system/verifica_sessao.php");

 //BUSCA CODIGO NA URL
 $id_imagem = $_GET['codigo'];
 $id_produto = $_GET['produto'];
     
  $sql = mysqli_query($conn, "DELETE FROM loja_fotos_produtos WHERE id = '$id_imagem' ") or print mysql_error();          
      
      if($sql)
         //header("Location: lista_produtos.php");

       echo "<script>
       alert('Foto excluida');
       location.href='edita_produto.php?codigo=$id_produto';
       </script>";

      else
        echo "<script>
       alert('Erro ao excluir a imagem, tente novamente!!');
       location.href='hp?codigo=$id_produto';
       </script>";

 ?>