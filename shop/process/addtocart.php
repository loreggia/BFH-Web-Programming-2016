<?php
require_once "../requireOnces.php";
// TODO options, etc
if (isset($_POST["count"]) && isset($_POST["article_id"])) {
    $cart->addItem($_POST["article_id"], $_POST["count"]);
	
    header('Location: ' . $_SERVER['HTTP_REFERER']);
	die();
}
else {
    header("Location: ./../");
    die();
}
