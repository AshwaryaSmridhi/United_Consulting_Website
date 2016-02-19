<?php


if ($_SERVER["REQUEST_METHOD"] == "POST"){
$name = $_POST["name"];
$email=$_POST["email"];
$message= $_POST["message"];

require_once("phpmailer/class.phpmailer.php");
$mail = new PHPMailer();
if(!$mail->ValidateAddress($email)){
	echo"You must specify valid email";
}

$email_body="";
$email_body = $email_body . "Name:" . $name . "<br>";
$email_body = $email_body . "Email:" . $email . "<br>";
$email_body = $email_body . "Message:" . $message; 
//Set who the message is to be sent from
$mail->setFrom($email, $name);
$address="info@unitedcs.com.au";
//Set who the message is to be sent to
$mail->addAddress($address, 'Lenord');
//Set the subject line
$mail->Subject = 'New Enquiry |' . $name;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($email_body);

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
	exit;
} 

header("Location: thankyou.html");
exit;
}
?>