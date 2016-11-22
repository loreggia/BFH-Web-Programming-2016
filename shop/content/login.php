<aside>login aside</aside>

<section>
	<h1><?= getLangText("old_user")?></h1>
	<?php
	$loginForm = new Form("post", "./process/login.php", "li-login", array(array("loginUser", "login")), array("email", "password", "submit"),NULL,$countryStore);
	echo $loginForm->generateForm();
	?>
	<p></p>
	<h1><?= getLangText("new_user")?></h1>
	<?php
	$createForm = new Form("post", "./process/login.php", "li", array(array("loginUser", "create")), array("salutation", "company", "department", "firstname", "lastname", "email", "password", "newsletter", "submit"),NULL,$countryStore);
	echo $createForm->generateForm();
	?>
</section>