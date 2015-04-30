<?php

require "lib/index.php";

ensureBuildFolderStructure();

copyApiToBuild();

$views = getViews();
renderViews($views);

$blogPosts = getBlogPosts();
renderBlogPosts($blogPosts);
renderIndex();
renderAdminOverview();
copyPublicFolderToBuild();

function copyApiToBuild() {
    $files = scandir("api");
    $files = array_diff($files, array(".", ".."));
    foreach($files as $f) {
        copyApiFileToBuild($f);
    }
}

function ensureBuildFolderStructure() {
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

function copyApiFileToBuild($f) {
    copy("api/".$f, "build/_api/".$f);
}

function getViews() {
    $files = scandir("views");
    return array_diff($files, array(".", "..", "_layout.php", "_indexBlogPostListItem.php", "_indexLayout.php", "_adminBlogPostListItem.php", "_adminLayout.php", "_searchResult.php"));
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

function copyPublicFolderToBuild() {
    recursiveCopy("public", "build");
}

function recursiveCopy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ($file = readdir($dir))) { 
        if($file != '.' && $file != '..') { 
            if(is_dir($src . '/' . $file)) { 
                recursiveCopy($src.'/'.$file, $dst.'/'.$file); 
            } 
            else { 
                copy($src.'/'.$file, $dst.'/'.$file); 
            } 
        } 
    } 
    closedir($dir); 
}

?>
