<?php
require_once "../../requireOnces.php";
$changeType = $_POST['change'];
$currEmail =  $_SESSION["user"]["email"];

if ($changeType == "newsletter") {
	$newsletter = "0";
	if(isset($_POST['newsletter']))$newsletter = "1";
	if($userStore->saveNewsletter($newsletter, $currEmail)){
		$_SESSION['user']['newsletter'] = $newsletter;
	}
	header("Location: " . $_SERVER['HTTP_REFERER']);
	die();
}

if(!$userStore->isCorrectPassword($currEmail, md5($_POST['password']))){
	header("Location: " . $_SERVER['HTTP_REFERER']);
	die();
}

if ($changeType == "user") {
	$userArray = array(
					"salutation" => $_POST['salutation'],
					"company" => $_POST['company'],
					"department" => $_POST['department'],
					"firstname" => $_POST['name'],
					"lastname" => $_POST['lastname'],
					"email" => $currEmail,
					"password" => md5($_POST['password']),
				);
	if($userStore->savePersonal($userArray)){
		$result = $userStore->getLogin($userArray);
		$_SESSION['user'] = $result;
	}
}
elseif ($changeType == "email") {
	if($userStore->saveEmail($_POST['email'], $currEmail)){
		$_SESSION['user']['email'] = $_POST['email'];
	}
}
elseif ($changeType == "password") {
	$userStore->savePassword(md5($_POST['password-new']), $currEmail);
}

header("Location: " . $_SERVER['HTTP_REFERER']);
die();

