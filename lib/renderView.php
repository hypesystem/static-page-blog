<?php

function renderView($v, $rootDir = "") {
    $content = render($rootDir."views/".$v);
    $content = render($rootDir."views/_layout.php", array(
        "content" => $content
    ));
    file_put_contents($rootDir."build/".$v, $content);
}

?>
