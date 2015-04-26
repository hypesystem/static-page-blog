<?php

function renderAdminOverview($rootDir = "") {
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

function compareBlogPostCreationDate($a, $b) {
        $aTime = filemtime($a);
        $bTime = filemtime($b);
        if($aTime == $bTime) return 0;
        return $aTime > $bTime ? -1 : 1;
    }

function getBlogPostLength($name, $rootDir = "") {
    $blogContent = readBlogPost($name, $rootDir);
    $length = strlen($blogContent);
    if($length > 100) {
        $length = convertLengthToThousands($length);
    }
    return $length;
}

function convertLengthToThousands($length) {
    return round($length / 1000, 1)."k";
}

?>
