<div id="logo">
    <?php echo createLink("<img src=\"resources/images/logo.png\"/>", "home"); ?>
</div>

<div id="user-info">
    <?php
		if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]){
			echo createLink(getLangText("account")." (".$_SESSION["user"]["email"].")", "account");
		}
		else{
			echo createLink(getLangText("account"), "login");
		}
	?>
</div>

<div id="search-panel">
    <form name="search-form" action="/shop/index.php" method="get">
        <input type="hidden" name="action" value="search"/>
        <input type="text" class="searchbox" name="q" placeholder="<?= getLangText("search") ?>"/>
    </form>
</div>
