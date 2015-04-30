<?php

require "../lib/index.php";

if(!isset($_GET["q"]) || $_GET["q"] == "") {
    redirect("/index.htm");
    exit();
}

echo render("../views/_layout.php", array(
    "content" => $_GET["q"]
));

?>
