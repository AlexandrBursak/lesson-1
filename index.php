<?php
include_once('function.php');
include_once('navigation.php');

if (isset($_SESSION['messages'])) {
    $messages = $_SESSION['messages'];
    unset($_SESSION['messages']);
}

$content = '';
if (!empty($_POST) && isset($_POST['page'])) {
    $page = $_POST['page'];
    if (file_exists('./action/'.$page.'.php')) {
        include_once('./action/'.$page.'.php');
    }
}

if (isset($_GET['page'])) {
    $redirect = '?page=home';
    $page = $_GET['page'];
    if (file_exists('./' . $page . '.php')) {
        $full_page = '?page=' . $page;
        include_once('./' . $page . '.php');
    }
}

if ($content == '') {
    header('Location: '.$redirect);
} else {
    showContent($content);
}

