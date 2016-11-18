<?php
require_once "../../requireOnces.php";

$userId = $userStore->getUserId($_SESSION["user"]["email"]);
$address = array(
	"address_mode" => $_POST["address_mode"],
	"salutation" => $_POST['salutation'],
	"company" => $_POST['company'],
	"department" => $_POST['department'],
	"firstname" => $_POST['name'],
	"lastname" => $_POST['lastname'],
	"street" => $_POST['street'],
	"zip" => $_POST['zip'],
	"city" => $_POST['city'],
	"country" => $_POST['country'],
	"additional1" => $_POST['additional1'],
	"additional2" => $_POST['additional2'],
);

$addressStore->saveAddress($address, $userId);

header("Location: " . $_SERVER['HTTP_REFERER']);
die();

