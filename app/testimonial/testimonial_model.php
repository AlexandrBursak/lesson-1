<?php

define('CURRENT_PAGE', 1);
define('PER_PAGE', 2);


function testimonial_index ($page) {
    do_default_model($page);
    $content = getPageContent();
    $testimonial_content = '';

    $sql = "SELECT * FROM testimonials WHERE active = 1 ORDER BY id DESC";
    $testimonials = DB_get_all($sql);

    if (count($testimonials)) {
        $file = __DIR__.'/templates/testimonial.tpl';
        foreach ($testimonials as $testimonial) {
            $tpl = getTpl($file);
            $tpl = str_replace("[testimonial_name]", $testimonial['name'], $tpl);
            $tpl = str_replace("[testimonial_text]", $testimonial['text'], $tpl);
            $testimonial_content.= $tpl;
        }
        $content = parseAdditional($content, $testimonial_content);
    }
    return $content;
}

function testimonial_edit () {

}

function testimonial_view () {

}
