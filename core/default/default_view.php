<?php

define('TWIG_TEMPLATE', CORE_DIR.'template');
define('TWIG_CACHE', CORE_DIR.'template/cache');
$twig = null;
$loader = null;

function do_default_view ($content, $data) {
    global $navContent;

    if (function_exists('do_view')) {
        do_view($content, $data);
    }

    $content = parseNavigation($content, $navContent);
    $content = parseContent($content, $data);
    showContent($content);
}

function showContent ($content) {
    echo $content;
}

function loadDefaultTemplate() {
    global $loader;
    $loader = new Twig_Loader_Filesystem(TWIG_TEMPLATE);
}

function loadTwigEnvironment() {
    global $loader;
    global $twig;
    $twig = new Twig_Environment($loader, array(
        'cache' => TWIG_CACHE,
    ));
}
