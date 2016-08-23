<?php

require CORE_DIR.'thirdparty/Twig/Autoloader.php';
Twig_Autoloader::register();

function auto_include_file ($page, $folder = '') {
    $prefix = CORE_DIR . APP_DIR . ( $folder ? $folder . '/' : '' ) . $page . '/' . $page;
    foreach (['controller','model','view'] as $key) {
        include_once(__DIR__.'/default/default_'.$key.'.php');
        if (file_exists($prefix . '_'.$key.'.php')) {
            include_once($prefix . '_'.$key.'.php');
        } else {
            include_once(__DIR__.'/parent/_'.$key.'.php');
        }
    }
    return;
}

function autoload_function ($page, $action) {
    $action_name = "_{$action}";
    $function_name = $page.$action_name;
    if (function_exists($function_name)) {
        return $function_name($page);
    } else {
        return $action_name($page);
    }
}

