<?php

function renderIndex($rootDir = "") {
    $blogPosts = getBlogPosts($rootDir);
    
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
