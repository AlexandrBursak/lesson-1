<?php

include_once(__DIR__.'/core/function.php');
include_once(__DIR__.'/core/DB.php');

connect_db();

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if (file_exists('./'.$page.'/'.$page.'_controller.php')) {
        include('./'.$page.'/'.$page.'_model.php');
        include('./'.$page.'/'.$page.'_controller.php');
    }
}