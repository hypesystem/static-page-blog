<?php

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
        ob_start();
        ob_implicit_flush(false);
        require "views/".$v;
        $content = ob_get_clean();
        ob_start();
        ob_implicit_flush(false);
        require "views/_layout.php";
        $content = ob_get_clean();
        file_put_contents("public/".$v, $content);
    }
}

?>