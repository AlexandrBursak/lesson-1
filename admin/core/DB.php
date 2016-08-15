<?php

define('DTBASE', 'lesson-1');
define('USERNAME', 'root');
define('PASSWORD', '');
define('HOST', 'localhost');

$link = null;

function connect_db() {
    global $link;
    $link = mysqli_connect(HOST, USERNAME, PASSWORD, DTBASE);
    if (mysqli_connect_error()) {
        die('Ошибка подключения (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());
    }
}

function DB_get_all($sql) {
    global $link;
    $list = [];
    $query = mysqli_query($link, $sql);
    while ($result = mysqli_fetch_assoc($query)) {
        $list[] = $result;
    }
    return $list;
}

function DB_get_one($sql) {
    global $link;
    $result = [];
    $query = mysqli_query($link, $sql);
    if (mysqli_num_rows($query) == 1) {
        $result = mysqli_fetch_assoc($query);
        return $result;
    }
    return [];
}

function DB_update($sql) {
    global $link;
    $query = mysqli_query($link, $sql);
    return $query ? true : false;
}

function DB_insert($sql) {
    global $link;
    $query = mysqli_query($link, $sql);
    if ($query) {
        return mysqli_insert_id($link);
    }
}

function close_db() {
    global $link;
    mysqli_close($link);
}