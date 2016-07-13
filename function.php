<?php

/**
 * @param $file string
 * @return array
 */
function getContent ($file) {
    $content = file_get_contents($file);
    return json_decode($content, true);
}

function getTpl ($file) {
    return file_get_contents($file);
}

function getTemplate() {
    return file_get_contents('template.html');
}

function parseNavigation($content, $data) {
    $content = str_replace("[navigation]", $data, $content);
    return $content;
}

function parseAdditional($content, $data) {
    $content = str_replace("[additional_content]", $data, $content);
    return $content;
}

function parseContent($content, $data) {
    $content = str_replace("[title_page]", 'Page: '.$data['title'], $content);
    $content = str_replace("[title]", $data['title'], $content);
    $content = str_replace("[description]", $data['description'], $content);
    $content = str_replace("[additional_content]", '', $content);
    return $content;
}

function showContent($content) {
    echo $content;
}

function parseForm($content, $data, $action = '') {
    if ($action) {
        $action = ' action="' . $action . '"';
    }
    $form = '<form method="post" class="form"'.$action.' enctype="multipart/form-data">';
    foreach ($data as $value) {
        switch ($value['type']) {
            case 'password':
            case 'text':
                $form.= '<label>'.$value['title'].'<input name="'.$value['name'].'" type="'.$value['type'].'"></label>';
                break;
            case 'textarea':
                $form.= '<label>'.$value['title'].'<textarea name="'.$value['name'].'"></textarea></label>';
                break;
            case 'button':
            case 'submit':
                $form.= '<input name="'.$value['name'].'" type="'.$value['type'].'">';
                break;
        }
    }
    $form.= '</form>';
    $content = str_replace("[additional_content]", $form, $content);
    return $content;
}

/**
 * @param $data mixed
 */
function dump($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
}