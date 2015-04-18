<?php

header("Content-Type: application/json");

if(!isset($_GET["name"])) {
    http_response_code(400);
    echo json_encode(array("error" => "No name provided"));
    exit();
}

$filePath = "../../data/blog-posts/".$_GET["name"].".md";
if(!file_exists($filePath)) {
    http_response_code(404);
    echo json_encode(array("error" => "No such blog post exists"));
    exit();
}

$content = file_get_contents($filePath);
$title = $_GET["name"];

echo json_encode(array("title" => $title, "content" => $content));

?>