<?php
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message']))
{
$sendername = strip_tags(trim($_POST["name"]));
$emailaddress = strip_tags(trim($_POST["email"]));
$sendermessage = strip_tags(trim($_POST["message"]));
$sendersubject = strip_tags(trim($_POST["email_subject"]));
$recepient = strip_tags(trim($_POST["recipient_email"]));
$recipient_name = strip_tags(trim($_POST["recipient_name"]));

//Output in receiver email
$message = 'Message: ' .$sendermessage ."\r\n";
$message.= 'Sender-name: '. $sendername ."\r\n";
$message.= 'Sender-email: '. $emailaddress ."\r\n";
$pagetitle = $sendersubject;
$mail= '';
}