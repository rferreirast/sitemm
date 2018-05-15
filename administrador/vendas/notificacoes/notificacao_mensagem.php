<?php

//Variaveis de configuração do servidor do email
  $host     = 'email-ssl.com.br';
  $username = 'contato@mestremoveleiro.com.br';
  $password = 'ieA$mo>#03';
  $port     = 465;
  $secure   = 'ssl';

// Os arquivos do PHPMailer foram extraidos na pasta /mail
  require '../system/phpmailer/class.phpmailer.php';
  require '../system/phpmailer/class.smtp.php';
 
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
  $mail->FromName = 'Mestre Moveleiro';

  // Destino
  $mail->addAddress($email);
  $mail->isHTML(true);
  $mail->CharSet     = 'utf-8';
  $mail->WordWrap    = 70;
 
// Exemplos de texto para o e-mail com HTML e sem.
 
  $mail->Subject = 'Você recebeu uma nova mensagem no seu pedido '.$id_pedido.' ';

  $message = '

  <div style="float: left; width: 100%; text-align:left"><img src="http://www.mestremoveleiro.com.br/img/capa-email.png" alt="Mestre Moveleiro" style="width: 100%; margin-bottom: 20px;"></div>

  <h3 style="color: #555; font-size: 18px; font-family: Roboto;">Nova Mensagem</h3>

  <p style="color: #333; font-size: 16px; font-family: Roboto;">Você recebeu uma nova mensagem no pedido #'.$id_pedido.'.</p>
  <p></p>

  <div style="padding-top:2px; padding-bottom:2px; text-align:left">

  <p style="color: #333; font-size: 16px; font-family: Roboto; background: #dcdcdc; padding: 10px 20px; border-radius: 5px;">'.$mensagemSend.'</p>

  </div>

  <div style="padding-top:10px; padding-bottom:20px; text-align:right">

  <a href="http://www.mestremoveleiro.com.br/usuario/detalhes-pedido?pedido='.$id_pedido.' " style="background: #014d8f; padding: 10px 20px; border-radius: 5px; color: #fff; text-decoration: none; margin-bottom: 10px; margin-top: 10px;">Ver mensagem</a>

  </div>

  <p style="color: #333; font-size: 15px; font-family: Roboto;">Caso esse email tenha sido enviado por engano, ignore.</p>
  
  ';
  $mail->Body = $message;
  $mail->AltBody = strip_tags($message);
 
 //echo '<script>alert("Mensagem enviada, logo entraremos em contato");</script>';
 // Faz a validação se a mensagem foi enviada para o servidor. 
 return $mail->Send();


?>