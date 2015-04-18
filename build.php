<?php

require "lib/index.php";

$views = getViews();
renderViews($views);

//$blogPosts = getBlogPosts();
//renderBlogPosts($blogPosts);
//renderIndex($blogPosts);
//renderAdminOverview($blogPosts);

function getViews() {
    $files = scandir("views");
    return array_diff($files, array(".", "..", "_layout.php"));
}

function renderViews($views) {
    foreach($views as $v) {
        renderView($v);
    }
}

?>