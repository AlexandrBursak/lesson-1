<?php

define('PAGE_NAME', 'login');

function do_controller ($page) {
    do_default_controller($content, $page);
    return $content;
}
