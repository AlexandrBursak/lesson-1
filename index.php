<?php
include_once('function.php');

$file = 'http://demjan.890m.com/resource/home.json';
$data = getContent($file);
$content = getTemplate();
$content = parseContent($content, $data);
echo $content;

