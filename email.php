<?php
$name= $_POST["name"];
$email= $_POST["email"];
$sub= $_POST["sub"];
$msg=$_POST["msg"];

use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 0;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "info.spenlearning@gmail.com";
$mail->Password   = "Mimaansa@2012";
$mail->IsHTML(true);
$mail->AddAddress("info.spenlearning@gmail.com", "spenlearning");
$mail->SetFrom("info.spenlearning@gmail.com", "spenlearning");
$mail->AddReplyTo("info.spenlearning@gmail.com", "reply-to-name");
// $mail->AddCC("mpatat24@gmail.com", "cc-recipient-name");
$mail->Subject = "Contact Info for spenlearning";
$content = "
	This is contact informations <br>
	Name= ".$name." <br>
	Email = ".$email." <br>
	Subject = ".$sub." <br>
	Message =".$msg." <br>
";
$mail->MsgHTML($content); 
if(!$mail->Send()) {
  echo "Error while sending Email.";
  //var_dump($mail);
} else {
  echo "<script>
  alert('Email Sent successfull!!');
 </script>
 <h1>Redirecting.....</h1>
 <meta http-equiv='refresh' content='1; URL=index.html' />";
}





?>