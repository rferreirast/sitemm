<?php 

include_once("verifica_sessao.php");

//DADOS ADMINISTRADOR
$email = $_SESSION['sessao_administrador']; //PESQUISA O EMAIL LOGADO

$pesquisa_usuario = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado_usuario = mysqli_query($conn, $pesquisa_usuario);
$carregar_usuario = mysqli_fetch_assoc($resultado_usuario);

?>