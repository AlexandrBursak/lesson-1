<?php
include_once('function.php');
include_once('navigation.php');

$file = 'http://demjan.890m.com/resource/contact.json';
$data = getContent($file);
$content = getTemplate();
$content = parseNavigation($content, $navContent);
if (isset($data['page_content'])) {
    $content = parseForm($content, $data['page_content']);
}
$content = parseContent($content, $data);
showContent($content);