<?php 

//if (!isset($_SESSION)){session_start();}

if (!isset($_SESSION)){session_start();}

require("connect.php");

        if (isset($_POST['entrar'])) {
     	$email = $_POST['email'];
     	$senha = $_POST['senha'];

		$verifica = mysqli_query($conn,"SELECT * FROM loja_clientes WHERE email ='$email' AND senha = '$senha'");
		if (mysqli_num_rows($verifica) > 0) {			    		

            // ATRIBUNDO TEMPO LIMITE DE LOGIN
			$tempolimite = 40000;
			$_SESSION['registro'] = time();
			$_SESSION['limite'] = $tempolimite; 

			$_SESSION['sessao_usuario'] = $email;

			//CAPTURANDO EMAIL LOGIN
     		//setcookie("login", $email);   

			header("location: meus-pedidos");        


     	}else{
            $dadosIncorretos = "dados incorretos";
     		//echo $dadosIncorretos;
     	}

     }

 ?>