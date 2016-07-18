<?php

$file = './data/home.json';
$data = getContent($file);
$content = getTemplate();
$content = parseNavigation($content, $navContent);
if (isset($messages)) {
    $content = parseMessages($content, $messages);
}
$content = parseContent($content, $data);
