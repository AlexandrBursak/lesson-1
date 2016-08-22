<?php
error_reporting(8191);
define('CORE_DIR', __DIR__.'/');

include_once(CORE_DIR.'core/DB.php');
include_once(CORE_DIR.'core/core.php');
include_once(CORE_DIR.'core/function.php');

connect_db();
$redirect = 'home.html';

$mvc = false;
$content = '';
$page = '';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

if (!empty($page)) {
    $mvc = auto_include_file($page);
    if (function_exists('do_controller')) {
        $content = do_controller($page);
    }
}

close_db();

if ($content == '') {
    header('Location: '.$redirect);
}

