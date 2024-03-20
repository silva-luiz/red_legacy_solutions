<?php
if(isset($_POST['email']) && !empty['email']) {

$name = addslashes($_POST['name']);
$email = addslashes($_POST['email']);
$cnpj = addslashes($_POST['cnpj']);
$phone = addslashes($_POST['phone']);

$to = "luiz.xd14@hotmail.com";
$subject = "Website form";
$body = "Nome: ".$name. "\r\n".
        "CNPJ: ".$cnpj. "\r\n".
        "Telefone: ".$phone;
$header = "From: luizera169@gmail.com"."\r\n".
          ."Replay-To:".$email."\r\n".
          ."X=Mailer:PHP/".phpversion();



if(mail($to, $subject, $body, $header)){
  echo("Email enviado com sucesso!");
}else{
  echo("Ocorreu um erro no envio do email");
}

}

?>