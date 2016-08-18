<?php

function auto_include_file ($page) {
    $onLoad = false;
    $prefix = CORE_DIR . APP_DIR . $page . '/' . $page;
    foreach (['controller','model','view'] as $key) {
        include_once(__DIR__.'/default/default_'.$key.'.php');
        if (file_exists($prefix . '_'.$key.'.php')) {
            include($prefix . '_'.$key.'.php');
            $onLoad = true;
        } else {
            include_once(__DIR__.'/parent/_'.$key.'.php');
            $onLoad = true;
        }
    }
    return $onLoad;
}

function autoload_function ($page, $action) {
    $action_name = "_{$action}";
    $function_name = $page.$action_name;
    if (function_exists($function_name)) {
        return $function_name();
    } else {
        return $action_name();
    }
}
