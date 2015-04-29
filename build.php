<?php

require "lib/index.php";

buildPublicFolderStructure();

copyApiToPublic();

$views = getViews();
renderViews($views);

$blogPosts = getBlogPosts();
renderBlogPosts($blogPosts);
renderIndex();
renderAdminOverview();

function buildPublicFolderStructure() {
    if(!file_exists("build")) {
        mkdir("build");
    }
    if(!file_exists("build/_api")) {
        mkdir("build/_api");
    }
    if(!file_exists("build/blog-posts")) {
        mkdir("build/blog-posts");
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
    copy("api/".$f, "build/_api/".$f);
}

function getViews() {
    $files = scandir("views");
    return array_diff($files, array(".", "..", "_layout.php", "_indexBlogPostListItem.php", "_indexLayout.php", "_adminBlogPostListItem.php", "_adminLayout.php"));
}

function renderViews($views) {
    foreach($views as $v) {
        renderView($v);
    }
}

function renderBlogPosts($blogPosts) {
    foreach($blogPosts as $p) {
        $name = getFileNameWithoutExt($p);
        renderBlogPost($name);
    }
}

?>
