<?php

require dirname(__FILE__)."/../vendor/Michelf/Markdown.inc.php";

function renderBlogPost($p, $rootDir = "") {
    $rawBlogPost = readBlogPost($p);
    $content = htmlFromMarkdown($rawBlogPost, $rootDir);
    $content = render($rootDir."views/_layout.php", array(
        "content" => $content
    ));
    file_put_contents($rootDir."public/blog-posts/".$p.".htm", $content);
}

function htmlFromMarkdown($rawBlogPost) {
    return Michelf\Markdown::defaultTransform($rawBlogPost);
}

?>
