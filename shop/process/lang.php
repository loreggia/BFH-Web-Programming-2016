<?php
require_once "../requireOnces.php";
if (isset($_POST["lang"])) {
	$_SESSION["lang"] = $_POST["lang"];
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
die();