<?php

function contact_index ($page) {
    do_default_model($page);
    $content = getPageContent();

    $sql = "SELECT * FROM forms WHERE `group` = 'contact' ORDER BY field ASC";
    $form_content = DB_get_all($sql);

    if (!empty($form_content)) {
        $action = 'index.php';
        $content = parseForm($content, $form_content, $action);
    }

    return $content;
}