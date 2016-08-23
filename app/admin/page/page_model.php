<?php

include_once(__DIR__.'/../navigation.php');

function page_index () {
    global $navContent;
    $navContent = getAdminNavigation();
    $content = getPageContent('admin_template.tpl');

    $template = __DIR__.'/templates/index.tpl';
    $page_content = getTpl($template);
    $data_content = '';


    $sql = 'SELECT * FROM pages WHERE active = 1';
    $data = DB_get_all($sql);
    foreach ($data as $page) {
        $data_content .= '<tr>
        <td><a href="page.html?action=edit&id='.$page['id'].'">'.$page['title'].'</a></td>
        <td><a href="'.CORE_PATH.'/'.$page['link'].'">'.$page['link'].'</a></td>
        <td>'.$page['active'].'</td>
        <td>'.$page['grant'].'</td>
    </tr>';
    }

    $page_content = str_replace('[page_list]', $data_content, $page_content);


    $content = parseAdditional($content, $page_content);

    return $content;
}

function page_edit () {
    global $redirect;
    global $navContent;
    $navContent = getAdminNavigation();

    if (isset($_GET['id'])) {

        $content = getPageContent('admin_template.tpl');

        $id = (int)$_GET['id'];
        $template = __DIR__.'/templates/edit.tpl';
        $page_content = getTpl($template);
        $sql = 'SELECT * FROM pages WHERE id = '.$id;
        $data = DB_get_one($sql);

        $page_content = parseFormContent($page_content, $data);
        $content = parseAdditional($content, $page_content);


        return $content;

    }
    $redirect = 'page.html';
    return;
}

function page_create () {
    global $navContent;
    $navContent = getAdminNavigation();
    $content = getPageContent('admin_template.tpl');

    $template = __DIR__.'/templates/create.tpl';
    $page_content = getTpl($template);
    $content = parseAdditional($content, $page_content);

    return $content;
}

function page_save () {
    global $redirect;

    $title = $_POST['title'];
    $link = $_POST['link'];
    $description = $_POST['description'];
    $grant = $_POST['grant'];
    $active = isset($_POST['active']) ? 1 : 0;

    $sql_inj = "SET title = '{$title}', link = '{$link}', description = '{$description}', active = {$active}, `grant` = {$grant}";

    if (isset($_POST['id'])) {
        $id = (int)$_POST['id'];
        $sql = "UPDATE pages {$sql_inj} WHERE id = {$id}";
        DB_update($sql);
    } else {
        $sql = "INSERT pages {$sql_inj}";
        $id = DB_insert($sql);
    }
    $redirect = 'page.html?action=edit&id='.$id;
    return;
}

function page_delete () {
    global $redirect;
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id = (int)$_POST['id'];
        $sql = "DELETE FROM pages WHERE id = {$id}";
        DB_delete($sql);
    }
    $redirect = 'page.html';
    return;
}
