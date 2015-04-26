<?php

function getBlogPosts($rootDir = "") {
    $blogPosts = scandir($rootDir."data/blog-posts");
    $blogPosts = array_diff($blogPosts, array(".", ".."));
    $blogPostsToOrder = array();
    
    foreach($blogPosts as $b) {
        $blogPostsToOrder[] = $rootDir."data/blog-posts/".$b;
    }

    usort($blogPostsToOrder, "compareBlogPostCreationDate");
    
    $blogPosts = array();
    
    foreach($blogPostsToOrder as $b) {
        $lastSlash = strrpos($b, "/");
        $blogPosts[] = substr($b, $lastSlash + 1);
    }
    
    return $blogPosts;
}

function compareBlogPostCreationDate($a, $b) {
    $aTime = filemtime($a);
    $bTime = filemtime($b);
    if($aTime == $bTime) return 0;
    return $aTime > $bTime ? -1 : 1;
}

?>
