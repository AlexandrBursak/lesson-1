<?php

function do_default_view ($content, $data) {
    global $navContent;

    if (function_exists('do_view')) {
        do_view($content);
    }

    $content = parseNavigation($content, $navContent);
    $content = parseContent($content, $data);
    showContent($content);
}

function showContent ($content) {
    echo $content;
}
