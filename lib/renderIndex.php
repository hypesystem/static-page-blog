<?php

function renderIndex($rootDir = "") {
    $blogPosts = scandir($rootDir."data/blog-posts");
    $blogPosts = array_diff($blogPosts, array(".", ".."));
    
    $content = "";
    foreach($blogPosts as $p) {
        $lastDotIndex = strrpos($p, ".");
        $name = substr($p, 0, $lastDotIndex);
        $content .= render($rootDir."views/_indexBlogPostListItem.php", array(
            "name" => $name
        ));
    }
    
    $content = render($rootDir."views/_indexLayout.php", array(
        "content" => $content
    ));
    
    $content = render($rootDir."views/_layout.php", array(
        "content" => $content
    ));
    
    file_put_contents($rootDir."public/index.htm", $content);
}

?>
