<?php

function _index ($page) {
    do_default_model($page);
    $content = getPageContent();
    return $content;
}