<?php

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index';
}



$function_name = $page.'_'.$action;

$function_name();


