<?php

require "../../lib/index.php";

if(!isset($_GET["name"])) {
    apiRespond(400, array("error" => "No name provided"));
    exit();
}

$filePath = "../../data/blog-posts/".$_GET["name"].".md";
if(!file_exists($filePath)) {
    apiRespond(404, array("error" => "No such blog post exists"));
    exit();
}

$content = file_get_contents($filePath);
$title = $_GET["name"];

apiRespond(200, array("title" => $title, "content" => $content));

?>