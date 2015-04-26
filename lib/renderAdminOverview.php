<?php

function renderAdminOverview($rootDir = "") {
    $blogPosts = scandir($rootDir."data/blog-posts");
    $blogPosts = array_diff($blogPosts, array(".", ".."));
    
    $content = "";
    foreach($blogPosts as $p) {
        $name = getFileNameWithoutExt($p);
        $length = getBlogPostLength($name, $rootDir);
        ob_start();
        ob_implicit_flush(false);
        require $rootDir."views/_adminBlogPostListItem.php";
        $content .= ob_get_clean();
    }
    
    ob_start();
    ob_implicit_flush(false);
    require $rootDir."views/_adminLayout.php";
    $content = ob_get_clean();
    
    ob_start();
    ob_implicit_flush(false);
    require $rootDir."views/_layout.php";
    file_put_contents($rootDir."public/admin.htm", ob_get_clean());
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
