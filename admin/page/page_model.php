<?php

function page_index () {
    $content = getContent('index');
    $data_content = '';

    $sql = 'SELECT * FROM pages WHERE active = 1';
    $data = DB_get_all($sql);
    foreach ($data as $page) {
        $data_content .= '<li><a href="?page=page&action=edit&id='.$page['id'].'">'.$page['title'].'</a></li>';
    }

    $content = str_replace('[page_list]', $data_content, $content);

    echo $content;
}

function page_edit () {
    if (isset($_GET['id'])) {
        $id = (int)$_GET['id'];
        $content = getContent('edit');
        $sql = 'SELECT * FROM pages WHERE id = '.$id;
        $data = DB_get_one($sql);

        echo parseFormContent($content, $data);

    } else {
        redirect('?page=page');
    }
}

function page_create () {
    $content = getContent('create');

    echo $content;
}

function page_save () {
    $title = $_POST['title'];
    $link = $_POST['link'];
    $description = $_POST['description'];
    $grant = $_POST['grant'];
    $active = isset($_POST['active']) ? 1 : 0;

    $sql_inj = "SET title = '{$title}', link = '{$link}', description = '{$description}', active = {$active}, grant = {$grant}";

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $sql = "UPDATE pages {$sql_inj} WHERE id = {$id}";
        DB_update($sql);
    } else {
        $sql = "INSERT pages {$sql_inj}";
        $id = DB_insert($sql);
    }
    redirect('?page=page&action=edit&id='.$id);
}

function getContent ($action) {
    return get_tpl(__DIR__.'/templates/'.$action.'.tpl');
}
