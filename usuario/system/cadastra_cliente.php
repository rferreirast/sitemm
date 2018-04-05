<?php 

include_once("system/connect.php");

if (!isset($_SESSION)){session_start();}

if (isset($_POST['create_account'])) {
$nome = utf8_decode( $_POST["nome"]);  
$email = utf8_decode( $_POST["email"]);
$senha = utf8_decode( $_POST["senha"]);

//se vazio cancela operação
 if ($nome == "") {
  exit;
   }elseif($email == ""){
    exit;
       }elseif($senha == ""){
         exit;
          }else{

           //VERIFICA NO BANCO DE DADOS SE O EMAIL JA FOI CADASTRADO 
            $sql = mysqli_query($conn, "SELECT * FROM loja_clientes WHERE email= '$email'") or print mysql_error();          
            if(mysqli_num_rows($sql)>0)
                    echo '<script>alert("Esse email já foi cadastrado!!");</script>';
            else {

           //SALVA OS DADOS NO MYSQL
           $sql = "INSERT INTO loja_clientes (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
              if ($conn->query($sql) === TRUE) {

                if (!isset($_SESSION)){session_start();}

                $verifica = mysqli_query($conn,"SELECT * FROM loja_clientes WHERE email ='$email' AND senha = '$senha'");
                if (mysqli_num_rows($verifica) > 0) {             

                  // ATRIBUNDO TEMPO LIMITE DE LOGIN
                  $tempolimite = 10000;
                  $_SESSION['registro'] = time();
                  $_SESSION['limite'] = $tempolimite; 

                  $_SESSION['sessao_usuario'] = $email;

                  //CAPTURANDO EMAIL LOGIN
                    //setcookie("login", $email);   

                  header("location: minha-conta");        


                  }

              }
       }

    }

  }

 ?>