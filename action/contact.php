<?php
require CORE_DIR.'thirdparty/PHPMailer/PHPMailerAutoload.php';

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
        $message = json_encode([
            'status' => 'success',
            'message' => 'Message has been sent'
        ]);
    } else {
        $message = json_encode([
            'status' => 'error',
            'message' => 'Message could not be sent.' . 'Mailer Error: ' . $mail->ErrorInfo
        ]);
    }
}
if ($messages) {
    $_SESSION['messages'] = $messages;
}

$redirect = 'contact.html';