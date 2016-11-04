<?php
	if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]){
	}
	else{
		$_SESSION['loggedIn'] = false;
		header("Location: ./index.php?action=login");
		die();
	}
	
	$mode = "home";
	if (isset($_GET["mode"])) {
		$mode = $_GET["mode"];
	}
	
	switch ($mode) {
		case "address":
		case "personal":
		case "orders":
		case "payment":
			$accountFileName = $mode.".php";
			break;
		case "home":
		default:
			$accountFileName = "home.php";
			break;
	}

	$accountBody = "";
	if ($fileName) {
		ob_start();
		require_once "content/account/" . $accountFileName;
		$accountBody = ob_get_contents();
		ob_end_clean();
	}
?>

<aside>
	<h3>Mein Konto</h3>
	<ul>
		<li><?=createLink("Übersicht", "account"); ?></li>
		<li><?=createLink("Persönliche Daten", "account&mode=personal"); ?></li>
		<li><?=createLink("Adressen", "account&mode=address"); ?></li>
		<li><?=createLink("Zahlungsarten", "account&mode=payment"); ?></li>
		<li><?=createLink("Bestellungen", "account&mode=orders"); ?></li>
		<li><?= createLink(getLangText("logout"), "logout"); ?></li>
	</ul>
</aside>

<section>
   <?= $accountBody ?>  
</section>