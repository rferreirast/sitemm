<?php 

if (!isset($_SESSION)){session_start();}
include_once("system/verifica_sessao.php");


// Create connection
$connct = new mysqli('bdmestre.mysql.dbaas.com.br', 'bdmestre', 'ieASmo03', 'bdmestre');
// Check connection
if ($connct->connect_error) {
    die("Connection failed: " . $connct->connect_error);
} 

//BUSCA CODIGO NA URL
$id_pedido = $_GET['pedido'];
$id_produto = $_GET['produto'];
$variavel1 = utf8_decode($_GET['variavel1']);
$variavel2 = utf8_decode($_GET['variavel2']);

$atualizaProduto = "UPDATE loja_produtos_pedidos SET 
  `variavel1`='$variavel1',
  `variavel2`='$variavel2'
   WHERE id_pedido = '$id_pedido' AND id_produto = '$id_produto' ";

 $data = mysqli_query($connct, $atualizaProduto);
   if ($data) {
     header("Location: detalhe_pedido.php?pedido=$id_pedido");   

      }else{
          echo '<script>alert("Algo deu errado, tente novamente!");</script>';
  }

?>