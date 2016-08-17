<?php

$sql = "SELECT * FROM pages WHERE active = 1";
$navigation = DB_get_all($sql);

//$navigation = getContent($file);

//dump($_SESSION['user_grant']);

$navContent = '<nav><menu>';
foreach ($navigation as $nav) {

    if (($nav['grant'] == ACCESS)) {
        if (isset($_SESSION['user_access']) && $_SESSION['user_access'] == ACCESS) {
            $navContent .= '<li><a href="' . $nav['link'] . '">' . $nav['title'] . '</a></li>';
        }
    }
    if (($nav['grant'] == INLOGIN)) {
        if (empty($_SESSION['user_access'])) {
            $navContent .= '<li><a href="' . $nav['link'] . '">' . $nav['title'] . '</a></li>';
        }
    }
//    if (isset($nav['submenu'])) {
//        $navContent.= '<li><a href="'.$nav['link'].'">'.$nav['title'].'</a>';
//        $navContent.= '<ul>';
//        foreach ($nav['submenu'] as $sub_nav) {
//            $navContent.= '<li><a href="'.$sub_nav['link'].'">'.$sub_nav['title'].'</a></li>';
//        }
//        $navContent.= '</ul>';
//        $navContent.= '</li>';
//
//    } else {
        if ($nav['grant'] == 0) {
            $navContent .= '<li><a href="' . $nav['link'] . '">' . $nav['title'] . '</a></li>';
        }
//    }

}
$navContent.= '</menu></nav>';
