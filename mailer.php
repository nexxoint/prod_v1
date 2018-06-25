<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// === CREDENTIALS ===
$mail_host = "smtp.nexxo.com";
$mail_username = "noreply@nexxo.com";
$mail_password = "passwordhere";
$mail_port = 2525;
$mail_from = "noreply@nexxo.com";
$mail_to = "dummy@nexxo.com";
$mail_to_name = "Admin";
$mail_subject = "Nexxo sign up";

$email=$_POST['email'];
$mail        = new PHPMailer();

$mail->IsSMTP();
//$mail->SMTPDebug = 1;
$mail->SMTPAuth = true;
$mail->Host = $mail_host;
$mail->Port = $mail_port;
$mail->IsHTML(true);
$mail->Username = $mail_username;
$mail->Password = $mail_password;
$mail->SetFrom($mail_from);
$mail->AddAddress($mail_to, $mail_to_name);
$mail->Subject = $mail_subject;

$mail_body = "Sign up email address: " . $email;

$mail->Body    = $mail_body;

//send the message, check for errors
if (!$mail->send()) {
    $result = array('status'=>"error", 'message'=>"Mailer Error: ".$mail->ErrorInfo);//
    echo json_encode($result);
} else {
    $result = array('status'=>"success", 'message'=>"Message sent.");
    echo json_encode($result);
}


?>