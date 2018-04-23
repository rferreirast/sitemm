<?php 

if (!isset($_SESSION)){session_start();}

require("config.php");

        if (isset($_POST['entrar'])) {
     	$email = $_POST['email'];
     	$senha = $_POST['senha'];

		$verifica = mysqli_query($conn,"SELECT * FROM usuarios WHERE email ='$email' AND senha = '$senha'");
		if (mysqli_num_rows($verifica) > 0) {			    		

            // ATRIBUNDO TEMPO LIMITE DE LOGIN
			$tempolimite = 10000;
			$_SESSION['registro'] = time();
			$_SESSION['limite'] = $tempolimite; 

			$_SESSION['sessao_administrador'] = $email;

			//CAPTURANDO EMAIL LOGIN
     		//setcookie("login", $email);   

			header("location: painel_adm.php");        


     	}else{
     		echo '<script>alert("Senha e e-mail não conferem, tente novamente !!");</script>';
     	}

     }

 ?>