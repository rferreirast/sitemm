<?php 

include_once("system/valida_login.php");

 unset($_SESSION['registro']);
 unset($_SESSION['limite']);
 unset($_SESSION['sessao_administrador']);
 session_destroy();
 header("location:/administrador");


 ?>