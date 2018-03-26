<?php 

if (!isset($_SESSION)){session_start();}
require("valida_login.php");

/*$login_cookie = $_COOKIE['login'];
  if (!isset($login_cookie)) {
  header("Location: index.php");
}*/

if (!$_SESSION['sessao_usuario']) {
	header("location:index.php");
}

if($_SESSION['registro']){
	$segundos = time() - $_SESSION['registro']; //VERIFICA O TEMPO ATUAL - O TEMPO QUE DE ENTRADA PARA SABER A QUANTO TEMPO ESTA LOGADO
}

if ( $segundos > $_SESSION['limite']) { //SE O TEMPO ACIMA FOR MAIOR QUE O PERMITIDO, DESFAZ A CONEXÃO
	unset($_SESSION['registro']);
	unset($_SESSION['limite']);
	unset($_SESSION['sessao_usuario']);
	session_destroy();
	header("location:index.php");
}else{
	$_SESSION['registro'] = time(); //FAZ A RENOVAÇÃO DO TEMPO
}



 ?>