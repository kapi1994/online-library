<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once '../../mail/src/Exception.php';
require_once '../../mail/src/PHPMailer.php';
require '../../mail/src/SMTP.php';


$mail = new PHPMailer(true);
try {

    $mail->SMTPDebug = SMTP::DEBUG_OFF;
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false, 'verify_peer_name' => false,
        'allow_self_signed' => true
    ));
    $mail->CharSet = 'utf-8';
    $mail->SMTPSecure = '';
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    /* ********** Kredencijali email adrese sa kojeg se šalje email ********** */
    $mail->Username = 'masternews247@gmail.com'; //SMTP username
    $mail->Password = 'aidcywdeducdqabu'; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;


    $mail->setFrom($from, $usernameFrom);

    $mail->addAddress($to, $usernameTo); //Add a recipient

    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = "contact";
    $mail->msgHTML($messageHTML);
    $mail->altBody = $message;
    $mail->send();
    // return 'Message has been sent';
} catch (Exception $e) {
    return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
