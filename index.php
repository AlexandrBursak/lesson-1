<?php
error_reporting(8191);
define('CORE_DIR', __DIR__.'/');
define('CORE_PATH', implode('/', explode('/',$_SERVER['PHP_SELF'], -1)));

include_once(CORE_DIR.'core/DB.php');
include_once(CORE_DIR.'core/core.php');
include_once(CORE_DIR.'core/function.php');

connect_db();
$redirect = CORE_PATH.'/home.html';

$content = '';
$page = '';
$folder = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

if (isset($_GET['folder'])) {
    $folder = $_GET['folder'];
}

if (!empty($page)) {
    auto_include_file($page, $folder);
    if (function_exists('do_controller')) {
        $content = do_controller($page);
    }
}

close_db();

if ($content == '') {
    header('Location: '.$redirect);
}

