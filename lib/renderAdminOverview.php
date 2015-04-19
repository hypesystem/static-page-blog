<?php

function renderAdminOverview($rootDir = "") {
    $blogPosts = scandir($rootDir."data/blog-posts");
    $blogPosts = array_diff($blogPosts, array(".", ".."));
    
    $content = "";
    foreach($blogPosts as $p) {
        $lastDotIndex = strrpos($p, ".");
        $name = substr($p, 0, $lastDotIndex);
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

?>
