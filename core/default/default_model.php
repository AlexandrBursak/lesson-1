<?php

function do_default_model () {
}

function getPageData ($page) {
    $sql = "SELECT title, description FROM pages WHERE active = 1 AND link = '{$page}'";
    return DB_get_one($sql);
}

function getPageContent () {
    return getTemplate();
}