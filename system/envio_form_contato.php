<?php require 'config.php'; ?>
<?php


if (isset($_POST['enviar'])) {
$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$mensagem = $_POST["mensagem"];

//se vazio cancela operação
 if ($nome == "") {
  exit;
   }elseif($email==""){
    exit;
      }elseif($telefone==""){
      exit;
 }else{

// Os arquivos do PHPMailer foram extraidos na pasta /mail
  require 'phpmailer/class.phpmailer.php';
  require 'phpmailer/class.smtp.php';
 
  $mail = new PHPMailer();
  $mail->setLanguage('pt');

 $mail->isSMTP();
  $mail->Host = $host;
  $mail->SMTPAuth   = true;
  $mail->Username   = $username;
  $mail->Password   = $password;
  $mail->Port       = $port;
  $mail->SMTPSecure = $secure;
 
  // Remetente
  $mail->From = $username;
  $mail->FromName = SITE_NAME;

  // Destino
  $mail->addAddress($username);
  $mail->isHTML(true);
  $mail->CharSet     = 'utf-8';
  $mail->WordWrap    = 70;
 
// Exemplos de texto para o e-mail com HTML e sem.
 
  $mail->Subject = 'Nova Mensagem: ';

  $message = '
  <h3 style="color: #555; font-size: 17px; font-family: Open Sans;">Dados do cliente:</h3>

  <p style="color: #333; font-size: 18px; font-family: Open Sans;"><h3 style="font-weight: normal; font-size: 18px; color: #014d8f;">Nome:</h3> '.$nome.'</p><hr>

  <p style="color: #333; font-size: 18px; font-family: Open Sans;"><h3 style="font-weight: normal; font-size: 18px; color: #014d8f;">E-mail:</h3> '.$email.'</p><hr>

  <p style="color: #333; font-size: 18px; font-family: Open Sans;"><h3 style="font-weight: normal; font-size: 18px; color: #014d8f;">Telefone:</h3> '.$telefone.'</p><hr>

  <p style="color: #333; font-size: 18px; font-family: Open Sans;"><h3 style="font-weight: normal; font-size: 18px; color: #014d8f;">Mensagem:</h3> '.$mensagem.'</p><hr>
  
  ';
  $mail->Body = $message;
  $mail->AltBody = strip_tags($message);
 
 echo '<script>alert("Mensagem enviada, logo entraremos em contato");</script>';
 // Faz a validação se a mensagem foi enviada para o servidor. 
 return $mail->Send();

}

}

?>