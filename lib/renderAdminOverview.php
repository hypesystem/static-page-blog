<?php

function renderAdminOverview($rootDir = "") {
    $blogPosts = scandir($rootDir."data/blog-posts");
    $blogPosts = array_diff($blogPosts, array(".", ".."));
    
    $content = "";
    foreach($blogPosts as $p) {
        $name = getFileNameWithoutExt($p);
        $content .= render($rootDir."views/_adminBlogPostListItem.php", array(
            "name" => $name,
            "length" => getBlogPostLength($name, $rootDir)
        ));
    }
    
    $content = render($rootDir."views/_adminLayout.php", array(
        "content" => $content
    ));
    
    $content = render($rootDir."views/_layout.php", array(
        "content" => $content
    ));
    
    file_put_contents($rootDir."public/admin.htm", $content);
}

function getFileNameWithoutExt($fileName) {
    $lastDotIndex = strrpos($fileName, ".");
    return substr($fileName, 0, $lastDotIndex);
}

function getBlogPostLength($name, $rootDir = "") {
    $blogContent = readBlogPost($name, $rootDir);
    return strlen($blogContent);
}

?>
