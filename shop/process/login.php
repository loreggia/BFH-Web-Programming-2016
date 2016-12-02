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
	$result = $userStore->getLogin($userArray);
	
	if($result){
		$_SESSION['loggedIn'] = true;
		$_SESSION['user'] = $result;
		$_SESSION['isAdmin'] = $result['admin'];
		header("Location: ./../index.php?action=account");
		die();
	}
	else{
		$_SESSION['loggedIn'] = false;
		$_SESSION['isAdmin'] = false;
		header("Location: " . $_SERVER['HTTP_REFERER']);
		die();
	}
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
	$result = $userStore->createUser($userArray);
	
	if($result){
		$_SESSION['loggedIn'] = true;
		$_SESSION['user'] = $result;
		header("Location: ./../index.php?action=account");
		die();
	}
	else{
		$_SESSION['loggedIn'] = false;
		header("Location: " . $_SERVER['HTTP_REFERER']);
		die();
	}
}
else {
    header("Location: ./../");
    die();
}
