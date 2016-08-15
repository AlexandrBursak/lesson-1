<?php

function get_tpl ($file) {
    return file_get_contents($file);
}

function redirect ($redirect) {
    header('Location: '.$redirect);
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