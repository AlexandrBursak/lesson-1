<?php
include_once('function.php');
include_once('navigation.php');

$file = './data/gallery.json';
$data = getContent($file);
$content = getTemplate();
$content = parseNavigation($content, $navContent);
if (isset($data['page_content'])) {
    $action = './action/upload.php';
    $content = parseForm($content, $data['page_content'], $action);
}
$gallery_data = './data/data_gallery.json';
$array_data = getContent($gallery_data);
if (!empty($array_data) && is_array($array_data)) {
    foreach ($array_data as $picture) {
        $content_gallery = '<div>
            <h3>'.$picture['title'].'</h3>
            <img src="./upload/'.$picture['file_name'].'" width="300" />
        </div>';
        $content = parseAdditional($content, $content_gallery);
    }
}
$content = parseContent($content, $data);
showContent($content);

