<?php

define('PAGE_NAME', 'blog');

function do_controller ($page) {
    do_default_controller($content, $page);
    return $content;
}
