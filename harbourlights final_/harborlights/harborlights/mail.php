<?php

require_once('phpmailer/PHPMailerAutoload.php');

$mail = new PHPMailer();
$maiL->isSMTP();
$mail->SMTPAuth() = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '587';
$mail->isHTML();
$mail->Username = 'dharminlad1199@gmail.com';
$mail->Password = 'Dh@rminlad110399';
$mail->SetFrom(' no-reply@gmail.com');
$mail->Subject = 'Hello';
$mail->Body = "Test";

$mail->Send();
?>