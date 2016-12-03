<?php
require_once "../requireOnces.php";
// TODO options, etc
if (isset($_POST["article"])) {
    $cart->removeItem($_POST["article"]);
	
    header('Location: ' . $_SERVER['HTTP_REFERER']);
	die();
}
else {
    header("Location: ./../");
    die();
}
