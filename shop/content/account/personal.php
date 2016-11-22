<?php
	$user = $_SESSION["user"];

	$userForm = new Form("post", "./process/account/personal.php", "user", array(array("change", "user")), array("salutation", "company", "department", "firstname", "lastname", "password", "submit"),$user,$countryStore);
	echo $userForm->generateForm();

	$newsForm = new Form("post", "./process/account/personal.php", "news", array(array("change", "newsletter")), array("newsletter", "submit"),$user,$countryStore);
	echo $newsForm->generateForm();
	
	$emailForm = new Form("post", "./process/account/personal.php", "mail", array(array("change", "email")), array("email", "password", "submit"),$user,$countryStore);
	echo $emailForm->generateForm();
	
	$passwordForm = new Form("post", "./process/account/personal.php", "pw", array(array("change", "password")), array("passwordOld", "passwordNew", "submit"),$user,$countryStore);
	echo $passwordForm->generateForm();
?>