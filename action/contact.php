<?php
require 'thirdparty/PHPMailer/PHPMailerAutoload.php';

if (isset($_POST) and is_array($_POST)) {

    $email = null;
    if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $email = $_POST['email'];
    }

    $mail = new PHPMailer;

    if ($email) {
        $mail->setFrom($email, $_POST['FIO']);
    }
    $mail->addAddress(ADMIN_MAIL);

    $mail->Subject = 'Contact US from project 1 form '.$_POST['FIO'];
    $mail->Body    = $_POST['message'];

    if($mail->send()) {
        $messages = '<div class="success">Message has been sent</div>';
    } else {
        $messages = '<div class="error">Message could not be sent.' . 'Mailer Error: ' . $mail->ErrorInfo . '</div>';
    }
}
if ($messages) {
    $_SESSION['messages'] = $messages;
}

$redirect = 'contact.html';