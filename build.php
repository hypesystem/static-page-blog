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
