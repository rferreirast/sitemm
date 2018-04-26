<?php

//Variaveis de configuração do servidor do email
  $host     = 'email-ssl.com.br';
  $username = 'naoresponda@mestremoveleiro.com.br';
  $password = 'ieA$mo>#03';
  $port     = 465;
  $secure   = 'ssl';

 // SITE INFO
 define('SITE_NAME', 'Mestre Moveleiro');

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
  $mail->addAddress($emailChange);
  $mail->isHTML(true);
  $mail->CharSet     = 'utf-8';
  $mail->WordWrap    = 70;
 
// Exemplos de texto para o e-mail com HTML e sem.
 
  $mail->Subject = 'Alterar Senha';

  $message = '

  <div style="float: left; width: 100%; text-align:left"><img src="http://www.mestremoveleiro.com.br/img/capa-email.png" alt="Mestre Moveleiro" style="width: 100%; margin-bottom: 20px;"></div>

  <h3 style="color: #555; font-size: 18px; font-family: Roboto;">Alterar Senha de acesso</h3>

  <p style="color: #333; font-size: 16px; font-family: Roboto;">Recebemos uma solicitação para a alteração da sua senha de acesso.</p>
  <p></p>

  <div style="padding-top:24px;padding-bottom:24px; text-align:center">
  <a href="http://www.mestremoveleiro.com.br/usuario/password/nova-senha?chave='.$chaveAlteracao.' " style="background: #014d8f; padding: 10px 20px; border-radius: 5px; color: #fff; text-decoration: none; margin-bottom: 10px; margin-top: 10px;">Criar uma nova senha</a>
  </div>

  <p style="color: #333; font-size: 15px; font-family: Roboto;">Caso não tenha solicitado a alteração, ignore este e-mail.</p>

  
  ';
  $mail->Body = $message;
  $mail->AltBody = strip_tags($message);
 
 //echo '<script>alert("Mensagem enviada, logo entraremos em contato");</script>';
 // Faz a validação se a mensagem foi enviada para o servidor. 
 return $mail->Send();


?>