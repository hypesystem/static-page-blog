<?php

function apiRespond($code, $msg) {
    header("Content-Type: application/json");
    http_response_code($code);
    echo json_encode($msg);
}

?>
