<?php

$file = './data/contact.json';
$data = getContent($file);
$content = getTemplate();
if (isset($messages)) {
    $content = parseMessages($content, $messages);
}
$content = parseNavigation($content, $navContent);
if (isset($data['page_content'])) {
    $action = 'index.php';
    $content = parseForm($content, $data['page_content'], $action);
}
$content = parseContent($content, $data);