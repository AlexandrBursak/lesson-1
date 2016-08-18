<?php
error_reporting(8191);
define('CORE_DIR', __DIR__.'/');

include_once(CORE_DIR.'core/DB.php');
include_once(CORE_DIR.'core/core.php');
include_once(CORE_DIR.'core/function.php');

connect_db();

$redirect = 'home.html';

if (isset($_SESSION['messages'])) {
    $messages = $_SESSION['messages'];
    unset($_SESSION['messages']);
}

$mvc = false;
$content = '';
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    include_once('library/navigation.php');
}

if (!empty($page)) {
    $mvc = auto_include_file($page);
    if (function_exists('do_controller')) {
        $content = do_controller($page);
    }
}
if ($mvc === false) {
    if (!empty($_POST) && isset($_POST['page'])) {
        $p_page = addslashes($_POST['page']);
        if (file_exists('./action/' . $p_page . '.php')) {
            include_once('./action/' . $p_page . '.php');
        }
    }

    if (!empty($page)) {
        if (file_exists('./' . $page . '.php')) {
            $full_page = $page . '.html';
            include_once('./' . $page . '.php');
        }
    }

    if ($content == '') {
        header('Location: '.$redirect);
    } else {
        showContent($content);
    }
}

