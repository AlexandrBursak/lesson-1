<?php
error_reporting(8191);
include_once('function.php');
include_once('navigation.php');

$redirect = 'home.html';


if (isset($_SESSION['messages'])) {
    $messages = $_SESSION['messages'];
    unset($_SESSION['messages']);
}

$content = '';
if (!empty($_POST) && isset($_POST['page'])) {
    $page = addslashes($_POST['page']);
    if (file_exists('./action/'.$page.'.php')) {
        include_once('./action/'.$page.'.php');
    }
}

if (isset($_GET['page'])) {

    $page = $_GET['page'];
    if (file_exists('./' . $page . '.php')) {
        $full_page = $page.'.html';
        include_once('./' . $page . '.php');
    }
}

if ($content == '') {
    header('Location: '.$redirect);
} else {
    showContent($content);
}

