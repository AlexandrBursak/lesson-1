<?php
session_start();
include_once(CORE_DIR.'config/const.php');
include_once(CORE_DIR.'library/navigation.php');

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
    return getTpl(CORE_DIR.'template/template.tpl');
}

function getManualTemplate($template) {
    return getTpl(CORE_DIR.'template/'.$template);
}

function parseNavigation($content, $data) {
    return str_replace("[navigation]", $data, $content);
}

function parseAdditional($content, $data) {
    return str_replace("[additional_content]", $data.'[additional_content]', $content);
}

function saveMessage($data = null) {
    if (isset($data)) {
        $_SESSION['messages'] = $data;
    }
    return;
}

function parseMessages($content, $data) {
    if ($get = json_decode($data, TRUE)) {
        switch ($get['status']) {
            case 'error':
                $message = <<<MESSAGE
    <div class="alert alert-danger">{$get['message']}</div>
MESSAGE;
                break;
            case 'success':
            default:
                $message = <<<MESSAGE
    <div class="alert alert-success">{$get['message']}</div>
MESSAGE;
        }
    } else {
        $message = $data;
    }
    return str_replace("[messages]", $message, $content);
}

function parseContent($content, $data) {
    $content = str_replace("[messages]", '', $content);
    $content = str_replace("[title_page]", ($data['title'] ? 'Page: '.$data['title'] : ''), $content);
    $content = str_replace("[title]", ($data['title'] ?: ''), $content);
    $content = str_replace("[description]", ($data['description'] ?: ''), $content);
    $content = str_replace("[additional_content]", '', $content);
    return $content;
}

function parseForm($content, $data, $action = '') {
    if ($action) {
        $action = ' action="' . $action . '"';
    }
    $form = '<div class="form-group row"><form method="post" class="form col-sm-6"'.$action.' enctype="multipart/form-data">';
    foreach ($data as $value) {
        switch ($value['type']) {
            case 'password':
            case 'text':
            case 'file':
                $form.= '<label>'.$value['title'].' <input name="'.$value['name'].'" type="'.$value['type'].'" class="form-control"></label>';
                break;
            case 'hidden':
                $form.= '<input name="'.$value['name'].'" type="'.$value['type'].'" value="'.$value['value'].'">';
                break;
            case 'textarea':
                $form.= '<label>'.$value['title'].' <textarea name="'.$value['name'].'" class="form-control"></textarea></label>';
                break;
            case 'button':
            case 'submit':
                $form.= '<label><input name="'.$value['name'].'" type="'.$value['type'].'" class="btn btn-default"></label>';
                break;
        }
    }
    $form.= '</form></div>';
    $content = str_replace("[additional_content]", $form.'[additional_content]', $content);
    return $content;
}

function parseFormContent ($content, $data) {
    foreach ($data as $key => $val) {
        if ($key == 'active') {
            $checked = $val ? 'checked' : '';
            $content = str_replace('[form_' . $key . ']', $checked, $content);
        } else {
            $content = str_replace('[form_' . $key . ']', $val, $content);
        }
    }
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


$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded with success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);