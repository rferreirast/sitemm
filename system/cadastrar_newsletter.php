<?php

include_once("config.php");

if (isset($_POST['cadastrar-email'])) {
$email = $_POST["email-newsletter"];

//se vazio cancela operação
 if ($email == "") {
  exit;
 }else{

     //VERIFICA NO BANCO DE DADOS SE O EMAIL JA FOI CADASTRADO 
     $sql = mysqli_query($conn, "SELECT * FROM lista_newsletter WHERE email= '$email'") or print mysql_error();          
     if(mysqli_num_rows($sql)>0)
            echo '<script>alert("Esse e-mail ja foi cadastrado!!");</script>';
      else {
           //SALVA O EMAIL NO MYSQL CASO AINDA NÃO TENHA SIDO CADASTRADO
           $sql = "INSERT INTO lista_newsletter (email) VALUES ('$email')";

              if ($conn->query($sql) === TRUE) {
              echo '<script>alert("E-mail cadastrado!");</script>';
              }
       }

 }
}

 ?>