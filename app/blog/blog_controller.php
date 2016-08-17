<?php

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'index';
}

include($page.'_model.php');
include($page.'_view.php');

//dump('vdfvdfvd');

$function_name = $page.'_'.$action;
$content = $function_name();

$content = parseNavigation($content, $navContent);

//exit;
//do_view();


//$content = TRUE;
