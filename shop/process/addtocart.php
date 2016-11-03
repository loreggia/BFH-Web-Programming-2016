<?php
require_once "../requireOnces.php";
echo "blabla";
// TODO options, etc
if (isset($_POST["count"]) && isset($_POST["article_id"])) {
    $count = $_POST["count"];
    $articleId = $_POST["article_id"];
    
    $cookie = [];
    if (isset($_COOKIE["cart"])) {
        $cookie = unserialize($_COOKIE["cart"]);
    }

    array_push($cookie, ["article_id" => $articleId, "count" => $count]);
    
    setcookie("cart", serialize($cookie), time() + 3600);
    
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else {
    header("Location: ./../");
    die();
}
