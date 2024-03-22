<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


if(isset($_POST['send'])) {

$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.office365.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@redlegacysolutions.com';                     //SMTP username
    $mail->Password   = 'Fol76450';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('info@redlegacysolutions.com', 'Mailer');
    $mail->addAddress('info@redlegacysolutions.com', 'Red Legacy Solutions');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contato via Forms do Site';

    $body = "Mensagem enviada atraves do site. Informacoes do Remetente:<br>
      Nome:". $_POST['name']."<br>
      Email:". $_POST['email']."<br>
      CNPJ: ". $_POST['cnpj']."<br>
      Telefone: ".$_POST['phone']."<br>";                                  

      $mail->Body    = $body;

    $mail->send();
    echo 'Email enviado com sucesso.';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
