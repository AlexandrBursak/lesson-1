<?php

function do_view ($content, $data) {
    global $navContent;

    $content = parseNavigation($content, $navContent);
    $content = parseContent($content, $data);

    showContent($content);
}