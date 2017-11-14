<!DOCTYPE html><html><head><meta charset="utf-8"></head><body>
<?php 
include("phpmailer/class.phpmailer.php");

$mail             = new PHPMailer();
$mail->From       = "absender@pmtest.de";
$mail->FromName   = "Arnold Absender";
$mail->Subject    = "Betreff der Mail";
$mail->Body       = "<table border='1'>"
   . "<tr><td>Das ist <b>fett</b></td></tr></table>";
$mail->AltBody    = "Nur Text";

$mail->AddAddress("empfaenger@empf.de");
// $mail->AddCC("nocheinempfaenger@empf.de");
// $mail->AddBCC("derbccempfaenger@empf.de");
$mail->AddReplyTo("beantworter@pmtest.de");
$mail->AddAttachment("mail_word.doc");
$mail->AddAttachment("mail_excel.xls");

if($mail->Send())
   echo "oK";
?>
</body></html>
