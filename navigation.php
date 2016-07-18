<?php

$file = './data/navigation.json';
$navigation = getContent($file);

$navContent = '<nav><menu>';
foreach ($navigation as $nav) {

    if ((isset($nav['access']) && $nav['access'] == ACCESS)) {
        if (isset($_SESSION['user_access']) && $_SESSION['user_access'] == ACCESS) {
            $navContent .= '<li><a href="' . $nav['link'] . '">' . $nav['title'] . '</a></li>';
        }
    }
    if (isset($nav['submenu'])) {
        $navContent.= '<li><a href="'.$nav['link'].'">'.$nav['title'].'</a>';
            $navContent.= '<ul>';
                foreach ($nav['submenu'] as $sub_nav) {
                    $navContent.= '<li><a href="'.$sub_nav['link'].'">'.$sub_nav['title'].'</a></li>';
                }
            $navContent.= '</ul>';
        $navContent.= '</li>';

    } else {
        if (!isset($nav['access'])) {
            $navContent .= '<li><a href="' . $nav['link'] . '">' . $nav['title'] . '</a></li>';
        }
    }

}
$navContent.= '</menu></nav>';
