<?php

function do_default_model ($page) {
    global $navContent;
    $navContent = createNavContent($page);
}

function getPageData ($page) {
    $sql = "SELECT title, description FROM pages WHERE active = 1 AND link = '{$page}'";
    return DB_get_one($sql);
}

function getPageContent () {
    return getTemplate();
}

function getMessages() {
    if (isset($_SESSION['messages'])) {
        $messages = $_SESSION['messages'];
        unset($_SESSION['messages']);
        return $messages;
    }
    return;
}
