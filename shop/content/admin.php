<?php
	if(!(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"])){
		header("Location: ./index.php?action=login");
		die();
	}
	
	if(!(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"])){
		header("Location: ./index.php?action=home");
		die();
	}
	
	$mode = "home";
	if (isset($_GET["mode"])) {
		$mode = $_GET["mode"];
	}
	
	switch ($mode) {
		case "user":
		case "article":
		case "manufracturer":
		case "category":
		case "orders":
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
		require_once "content/admin/" . $accountFileName;
		$accountBody = ob_get_contents();
		ob_end_clean();
	}
?>

<aside>
	<h3><?=getLangText("adm_administration")?></h3>
	<ul>
		<li><?=createLink(getLangText("adm_overview"), getLangText("adm_overview"), "admin"); ?></li>
		<li><?=createLink(getLangText("adm_user"), getLangText("adm_user"), "admin&mode=user"); ?></li>
		<li><?=createLink(getLangText("adm_article"), getLangText("adm_article"), "admin&mode=article"); ?></li>
		<li><?=createLink(getLangText("adm_manufracturer"), getLangText("adm_manufracturer"), "admin&mode=manufracturer"); ?></li>
		<li><?=createLink(getLangText("adm_category"), getLangText("adm_category"), "admin&mode=category"); ?></li>
		<li><?=createLink(getLangText("adm_orders"), getLangText("adm_orders"), "admin&mode=orders"); ?></li>
	</ul>
</aside>

<section>
   <?= $accountBody ?>  
</section>