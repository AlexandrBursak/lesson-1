<?php

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

$_SESSION['messages'] = $message;


