<?php

require "../lib/index.php";

if(!isset($_GET["q"]) || $_GET["q"] == "") {
    redirect("/index.htm");
    exit();
}

$results = searchFor($_GET["q"]);

$content = "";
foreach($results as $result) {
    $content .= render("../views/_searchResult.php", array(
        "result" => $result
    ));
}

echo render("../views/_layout.php", array(
    "content" => $content
));

function searchFor($query) {
    $query = trim($query);
    $terms = explode(" ", $query);
    $terms = array_diff($terms, array("", " "));
    $results = array();
    foreach($terms as $term) {
        $termResults = searchForTerm($term);
        foreach($termResults as $termResult) {
            $results[] = $termResult;
        }
    }
    //TODO: eliminate duplicates
    return $results;
}

function searchForTerm($term) {
    $path = "../data/blog-posts";
    $posts = array_diff(scandir($path), array(".", ".."));
    $results = array();
    foreach($posts as $post) {
        $c = file_get_contents("$path/$post");
        $i = strpos($c, $term);
        if($i == false) continue;
        $name = getFileNameWithoutExt($post);
        $preStart = max(0, $i - 50);
        $preEnd = $i;
        $postStart = $i + strlen($term);
        $postEnd = min(strlen($c), $i + strlen($term) + 50);
        $highlight = substr($c, $preStart, $preEnd - $preStart)."<b>".substr($c, $preEnd, $postStart - $preEnd)."</b>".substr($c, $postStart, $postEnd - $postStart);
        $highlight = str_replace(array("=","#","-","[","]"), "", $highlight);
        $link = "/blog-posts/$name.htm";
        $results[] = array(
            "title" => $name,
            "highlight" => $highlight,
            "link" => $link
        );
    }
    return $results;
}

?>
