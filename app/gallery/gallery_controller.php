<?php

define('PAGE_NAME', 'gallery');

function do_controller ($page) {
    do_default_controller($content, $page);
    return $content;
}
