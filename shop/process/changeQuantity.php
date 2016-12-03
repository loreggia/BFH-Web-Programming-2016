<?php
require_once "../requireOnces.php";
// TODO options, etc
if (isset($_POST["quantity"]) && isset($_POST["article"])) {
    $cart->setItem($_POST["article"], $_POST["quantity"]);
	
    header('Location: ' . $_SERVER['HTTP_REFERER']);
	die();
}
else {
    header("Location: ./../");
    die();
}
