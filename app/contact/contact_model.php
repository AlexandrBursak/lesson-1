<?php

function contact_index ($page) {
    do_default_model($page);
    $content = getPageContent();

    $messages = getMessages();

    $sql = "SELECT * FROM forms WHERE `group` = 'contact' ORDER BY field ASC";
    $form_content = DB_get_all($sql);

    if (isset($messages)) {
        $content = parseMessages($content, $messages);
    }

    if (!empty($form_content)) {
        $action = 'contact.html';
        $content = parseForm($content, $form_content, $action);
    }

    return $content;
}

function contact_send ($page) {
    global $redirect;

    require CORE_DIR.'thirdparty/PHPMailer/PHPMailerAutoload.php';

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

    saveMessage($message);

    $redirect = 'contact.html';
    return;
}