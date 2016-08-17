<?php

define('LOGIN', 'admin');
define('PASSWORD', 'admin');

$redirect = 'login.html';
$message = '';

if (isset($_POST['login']) && isset($_POST['password'])) {
    if ($_POST['login'] == LOGIN) {
        if ($_POST['password'] == PASSWORD) {
            $_SESSION['user_access'] = ACCESS;
            $message = '<div class="error">You authorized</div>';
            $redirect = 'home.html';
        } else {
            $message = '<div class="error">Password incorrect</div>';
        }
    } else {
        $message = '<div class="error">Login incorrect</div>';
    }
} else {
    $message = '<div class="error">Data wrong!</div>';
}

$_SESSION['messages'] = $message;


