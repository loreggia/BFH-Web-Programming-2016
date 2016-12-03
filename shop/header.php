<div id="logo">
    <?php echo createLink('<img src="resources/images/logo.png">', getLangText("home"), "home"); ?>
</div>

<div id="language-selector">
    <?php
		if(!isset($_SESSION["lang"])){
			$lang = "de";
		}
		else{
			$lang = $_SESSION["lang"];
		}
	?>
	<form name="language" action="/shop/process/lang.php" method="post">
        <select name="lang" id="lang" onchange="this.form.submit()">
			<option value="de" <?php if($lang == "de") echo"selected"; ?>><?= getLangText("lang_de") ?></option>
			<option value="en" <?php if($lang == "en") echo"selected"; ?>><?= getLangText("lang_en") ?></option>
			<option value="fr" <?php if($lang == "fr") echo"selected"; ?>><?= getLangText("lang_fr") ?></option>
		</select>
    </form>
</div>

<div id="user-info">
    <?php
		if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]){
			echo createLink(getLangText("account")." (".$_SESSION["user"]["email"].")", getLangText("account"), "account");
		}
		else{
			echo createLink(getLangText("account"), getLangText("account"), "login");
		}
	?>
</div>

<div id="search-panel">
    <form name="search-form" action="/shop/index.php" method="get">
        <input type="hidden" name="action" value="search"/>
        <input type="text" class="searchbox" name="q" placeholder="<?= getLangText("search") ?>"/>
    </form>
</div>
