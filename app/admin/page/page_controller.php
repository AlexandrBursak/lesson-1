<?php

define('PAGE_NAME', 'page');

function do_controller ($page) {
    $action = getAction();
    $content = autoload_function($page, $action);

    if (empty($_POST)) {
        $data = ['title' => PAGE_NAME, 'description' => ''];
        do_view($content, $data);
    }
    return $content;
}