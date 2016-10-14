<section>
    <aside>login aside</aside>
    <?php
    //	$actual_link = substr("$_SERVER[REQUEST_URI]",5);
    //	if($actual_link == "/") {include 'content/home.php';}
    //	else{
    //		$actual_link = explode("?",$actual_link);
    //		include 'content'.$actual_link[0];
    //	}
    ?>
    Login-Seite - Dies wird mit einem korrekten Formular ersetzt und der Process entscheided, wo der User landet.<br/>
    <form action="./process/login.php" method="post">
        <input type="hidden" name="loginUser" value="admin"/>
        <input type="submit" value="Admin User"/>
    </form>

    <form action="./process/login.php" method="post">
        <input type="hidden" name="loginUser" value="normal"/>
        <input type="submit" value="Normaler User"/>
    </form>
</section>
