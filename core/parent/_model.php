<?php

function _index ($page) {
    do_default_model($page);
    $content = getPageContent();
    $messages = getMessages();
    if (isset($messages)) {
        $content = parseMessages($content, $messages);
    }
    return $content;
}