<?php

function do_default_controller(&$content, $page) {
    $action = getAction();
    $content = autoload_function($page, $action);

    $data = getPageData($page.'.html');
    do_default_view($content, $data);
}

function getAction () {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'index';
    }
    return $action;
}