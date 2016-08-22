<?php

function do_default_controller(&$content, $page) {
    $action = getAction();
    $content = autoload_function($page, $action);

    if (empty($_POST) || $action != 'signout') {
        $data = getPageData($page.'.html');
        do_default_view($content, $data);
        return $content;
    }
    return;
}

function getAction () {
    if (isset($_GET['action']) || isset($_POST['action'])) {
        $action = isset($_GET['action']) ? $_GET['action'] : $_POST['action'];
    } else {
        $action = 'index';
    }
    return $action;
}