<?php

define('CURRENT_PAGE', 1);
define('PER_PAGE', 2);

function blog_index () {

    $content = getTpl(__DIR__.'/templates/blog.tpl');
    $blog_content = '';

    $sql = "SELECT * FROM articles WHERE active = 1 ORDER BY date DESC";
    $articles = DB_get_all($sql);

    if (isset($_GET['Cpag']) and is_numeric($_GET['Cpag'])) {
        $current = $_GET['Cpag'];
    } else {
        $current = CURRENT_PAGE;
    }
    $per_page = PER_PAGE;

    $pagination = function ($all) use ($per_page, $current) {
        $pag = '<ul>';
        for ($i = 0, $j = 0; $i < count($all); $i += $per_page, $j++) {
            if ($current == $j + 1) {
                $pag .= '<li><span>' . ($j + 1) . '</span></li>';
            } else {
                $pag .= '<li><a href="?Cpag=' . ($j + 1) . '">' . ($j + 1) . '</a></li>';
            }
        }
        $pag .= '</ul>';
        return $pag;
    };

    $file = __DIR__.'/templates/article.tpl';
    $all_count = count($articles);
    $start = ($current - 1) * $per_page;
    $end = (($current * $per_page) < $all_count) ? $current * $per_page : $all_count;
    for ($i = $start; $i < $end; $i++) {
        $tpl = getTpl($file);
        $article = $articles[$i];
        $tpl = str_replace("[article_title]", $article['title'], $tpl);
        $tpl = str_replace("[article_date]", $article['date'], $tpl);
        $tpl = str_replace("[article_author]", $article['author'], $tpl);
        $tpl = str_replace("[article_text]", explode('<->', wordwrap($article['text'], 20, '<->'))[0] . '...', $tpl);
        $tpl = str_replace("[article_url]", 'blog-' . ($i + 1) . '.html', $tpl);
        $blog_content .= $tpl;
    }
    $blog_content .= $pagination($articles);
    $content = parseAdditional($content, $blog_content);


    return $content;
}
