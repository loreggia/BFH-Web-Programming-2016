<?php
require_once "../requireOnces.php";
// TODO options, etc
if (isset($_POST["count"]) && isset($_POST["ordernumber"])) {
    $cart->addItem($_POST["ordernumber"], $_POST["count"]);
	
    header('Location: ' . $_SERVER['HTTP_REFERER']);
	die();
}
else {
    header("Location: ./../");
    die();
}
