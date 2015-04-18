<?php

require "lib/index.php";

$views = getViews();
renderViews($views);

$blogPosts = getBlogPosts();
renderBlogPosts($blogPosts);
//renderIndex();
//renderAdminOverview();

function getViews() {
    $files = scandir("views");
    return array_diff($files, array(".", "..", "_layout.php"));
}

function renderViews($views) {
    foreach($views as $v) {
        renderView($v);
    }
}

function getBlogPosts() {
    $files = scandir("data/blog-posts");
    $files = array_diff($files, array(".", ".."));
    foreach($files as $i => $f) {
        $lastDot = strrpos($f, ".");
        $files[$i] = substr($f, 0, $lastDot);
    }
    return $files;
}

function renderBlogPosts($blogPosts) {
    foreach($blogPosts as $p) {
        renderBlogPost($p);
    }
}

?>