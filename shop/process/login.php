<?php
require_once "../requireOnces.php";
$loginUser = $_POST['loginUser'];

if ($loginUser == "admin") {
    header("Location: ./../admin.php");
    die();
}
elseif ($loginUser == "login") {
	$userArray = array(
					"email" => $_POST['email'],
					"password" => md5($_POST['password'])
				);
	print_r($userStore->getLogin($userArray));
}
elseif ($loginUser == "create") {
	$newsletter = "0";
	if(isset($_POST['newsletter']))$newsletter = "1";
	$userArray = array(
					"salutation" => $_POST['salutation'],
					"company" => $_POST['company'],
					"department" => $_POST['department'],
					"firstname" => $_POST['name'],
					"lastname" => $_POST['lastname'],
					"email" => $_POST['email'],
					"password" => md5($_POST['password']),
					"encoder" => "md5",
					"newsletter" => $newsletter
				);
	print_r($userStore->createUser($userArray));
}
else {
    header("Location: ./../");
    die();
}
