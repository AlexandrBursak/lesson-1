<?php
error_reporting(8191);
include_once(__DIR__.'/core/DB.php');
include_once('function.php');

connect_db();

include_once('library/navigation.php');

$redirect = 'home.html';

if (isset($_SESSION['messages'])) {
    $messages = $_SESSION['messages'];
    unset($_SESSION['messages']);
}

$mvc = false;
$content = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if (file_exists('./app/'.$page.'/'.$page.'_controller.php')) {
        $mvc = true;
        include('./app/'.$page.'/'.$page.'_controller.php');
    }
}

if ($mvc === false) {
    if (!empty($_POST) && isset($_POST['page'])) {
        $page = addslashes($_POST['page']);
        if (file_exists('./action/' . $page . '.php')) {
            include_once('./action/' . $page . '.php');
        }
    }

    if (isset($_GET['page'])) {

        $page = $_GET['page'];
        if (file_exists('./' . $page . '.php')) {
            $full_page = $page . '.html';
            include_once('./' . $page . '.php');
        }
    }
}

if ($content == '') {
    header('Location: '.$redirect);
} else {
    showContent($content);
}

