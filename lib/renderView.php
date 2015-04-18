<?php

function renderView($v, $rootDir = "") {
    ob_start();
    ob_implicit_flush(false);
    require $rootDir."views/".$v;
    $content = ob_get_clean();
    ob_start();
    ob_implicit_flush(false);
    require $rootDir."views/_layout.php";
    $content = ob_get_clean();
    file_put_contents($rootDir."public/".$v, $content);
}

?>