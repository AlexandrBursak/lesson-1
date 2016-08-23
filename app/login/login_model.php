<?php

function login_index ($page) {
    do_default_model($page);
    $content = getPageContent();

    $sql = "SELECT * FROM forms WHERE `group` = 'login' ORDER BY field ASC";
    $form_content = DB_get_all($sql);
    if (!empty($form_content)) {
        $action = 'login.html';
        $content = parseForm($content, $form_content, $action);
    }

    return $content;
}

function login_signout ($page) {
    global $redirect;
    unset($_SESSION['user_access']);
    $message = json_encode([
        'status' => 'success',
        'message' => 'You sign out!'
    ]);
    $_SESSION['messages'] = $message;
    $redirect = 'home.html';
    return;
}

function login_signin ($page) {
    global $redirect;

    define('LOGIN', 'admin');
    define('PASSWORD', 'admin');

    $redirect = 'login.html';
    $message = '';

    if (isset($_POST['login']) && isset($_POST['password'])) {
        if ($_POST['login'] == LOGIN) {
            if ($_POST['password'] == PASSWORD) {
                $_SESSION['user_access'] = ACCESS;
                $message = json_encode([
                    'status' => 'success',
                    'message' => 'You authorized'
                ]);
                $redirect = 'home.html';
            } else {
                $message = json_encode([
                    'status' => 'error',
                    'message' => 'Password incorrect'
                ]);
            }
        } else {
            $message = json_encode([
                'status' => 'error',
                'message' => 'Login incorrect'
            ]);
        }
    } else {
        $message = json_encode([
            'status' => 'error',
            'message' => 'Data wrong!'
        ]);
    }

    saveMessage($message);
    return;
}