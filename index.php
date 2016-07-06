<?php
include_once('function.php');
include_once('navigation.php');

$file = 'http://demjan.890m.com/resource/home.json';
$data = getContent($file);
$content = getTemplate();
$content = parseNavigation($content, $navContent);
$content = parseContent($content, $data);
showContent($content);

