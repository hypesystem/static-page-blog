<?php

function render($file, $variables = array()) {
    extract($variables);
    ob_start();
    ob_implicit_flush(false);
    include $file;
    return ob_get_clean();
}