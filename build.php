<?php

require "lib/index.php";

buildPublicFolderStructure();

copyApiToPublic();

$views = getViews();
renderViews($views);

$blogPosts = getBlogPosts();
renderBlogPosts($blogPosts);
//renderIndex();
//renderAdminOverview();

function buildPublicFolderStructure() {
    if(!file_exists("public")) {
        mkdir("public");
    }
    if(!file_exists("public/_api")) {
        mkdir("public/_api");
    }
    if(!file_exists("public/blog-posts")) {
        mkdir("public/blog-posts");
    }
}

function copyApiToPublic() {
    $files = scandir("api");
    $files = array_diff($files, array(".", ".."));
    foreach($files as $f) {
        copyApiFileToPublic($f);
    }
}

function copyApiFileToPublic($f) {
    copy("api/".$f, "public/_api/".$f);
}

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