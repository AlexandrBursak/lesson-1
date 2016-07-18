<?php

$file = './data/login.json';
$data = getContent($file);
$content = getTemplate();
$content = parseNavigation($content, $navContent);
if (isset($messages)) {
    $content = parseMessages($content, $messages);
}
if (isset($data['page_content'])) {
    $action = './index.php';
    $content = parseForm($content, $data['page_content'], $action);
}
$content = parseContent($content, $data);