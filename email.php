<?php

include('phpmailer/PHPMailerAutoload.php');
function sendmail($to, $subject, $content){
	$mail = new PHPMailer();
//$subject = "Test Mail using PHP mailer";
//$content = "<b>This is a test mail using PHP mailer class.</b>";
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port     = 587;  
$mail->Username = "baba850850@gmail.com";
$mail->Password = "a.43211234";
$mail->Host     = "smtp.gmail.com";
$mail->Mailer   = "smtp";
$mail->SetFrom("vincy@phppot.com", "PHPPot");
$mail->AddReplyTo("baba850850@gmail.com");
$mail->AddAddress($to);
$mail->Subject = $subject;
$mail->WordWrap   = 80;
$mail->MsgHTML($content);
$mail->IsHTML(true);

if(!$mail->Send()){ 
	$_SESSION["email"]=" Problem on sending mail<br>";
	//echo $msg;
}
else {
$_SESSION["email"]= " Your mail is sent, please check the mail box";
	
}
	//echo($_SESSION["email"]);
}
?>




