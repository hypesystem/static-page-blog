<?php

function renderIndex($rootDir = "") {
    $blogPosts = scandir($rootDir."data/blog-posts");
    $blogPosts = array_diff($blogPosts, array(".", ".."));
    
    $content = "";
    foreach($blogPosts as $p) {
        $name = getFileNameWithoutExt($p);
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
