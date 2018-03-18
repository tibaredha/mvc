<?php
$sujet  = $_POST["sujet"] ;
$Body  = $_POST["Body"] ;

$per->sautligne (20);
$per ->fieldset("ins","Messages");
$per ->url(90+790,250,"index.php?uc=LGRH1&idp=".$_POST["idp"]."","ادارة المستخدم","2");    
require './PHPMMAIL/class.phpmailer.php';
require './PHPMMAIL/class.smtp.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'tibaredhaamranemimi';
$mail->Password = '030570170176';
$mail->SMTPSecure = 'tls';
$mail->From = 'tibaredhaamranemimi@gmail.com';
$mail->FromName = 'tiba redha';
$mail->addAddress('tibaredhaamranemimi@gmail.com', 'tiba redha');
$mail->addReplyTo('tibaredha@yahoo.fr', 'tiba redha');
$mail->WordWrap = 50;
$mail->isHTML(true);
$mail->Subject = $sujet;
$mail->Body    = $Body;
$mail->AddAttachment('./***.php');
if(!$mail->send()) {
$per ->label(500,275,'Message could not be sent. '); 
$per ->label(500,275+30,'Mailer Error:'.$mail->ErrorInfo); 
exit;  
}
else
{
$per ->label(500,275,'Message has been sent '); 
$per ->label(500,275+30,$Body); 
}

?>