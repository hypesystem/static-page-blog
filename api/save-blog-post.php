<?php

require "../../lib/index.php";

if(!isset($_POST)) {
    apiRespond(400, array("error" => "Requests to this endpoint must be POST request"));
    exit();
}

$data = json_decode(file_get_contents("php://input"));

if($data == null) {
    apiRespond(400, array("error" => "Could not decode posted JSON", "requestData" => $data));
    exit();
}

if(!isset($data->title) || !isset($data->content)) {
    apiRespond(400, array("error" => "Missing argument. Must provide both title and content fields"));
    exit();
}

saveBlogPost($data->title, $data->content);
renderBlogPost($data->title, "../../");
apiRespond(200, array("ok" => "Saved succesfully"));
exit();

function saveBlogPost($title, $content) {
    file_put_contents("../../data/blog-posts/".$title.".md", $content);
}

?>