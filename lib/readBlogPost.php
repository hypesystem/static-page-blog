<?php

function readBlogPost($name, $rootDir = "") {
    return file_get_contents($rootDir."data/blog-posts/".$name.".md");
}

?>
