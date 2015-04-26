<?php

require dirname(__FILE__)."/../vendor/Michelf/Markdown.inc.php";

function renderBlogPost($p, $rootDir = "") {
    $rawBlogPost = readBlogPost($p);
    $content = htmlFromMarkdown($rawBlogPost, $rootDir);
    ob_start();
    ob_implicit_flush(false);
    require $rootDir."views/_layout.php";
    $content = ob_get_clean();
    file_put_contents($rootDir."public/blog-posts/".$p.".htm", $content);
}

function htmlFromMarkdown($rawBlogPost) {
    return Michelf\Markdown::defaultTransform($rawBlogPost);
}

?>