<?php

define('PAGE_NAME', 'page');

function do_controller ($page) {
    $content = '';
    if (has_admin_access()) {

        $action = getAction();
        $content = autoload_function($page, $action);

        if (empty($_POST)) {
            $data = ['title' => PAGE_NAME, 'description' => ''];
            do_view($content, $data);
        }
    } else {
        $message = json_encode([
            'status' => 'error',
            'message' => 'Have not access'
        ]);
        saveMessage($message);
    }
    return $content;
}