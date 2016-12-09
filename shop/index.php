<?php
error_reporting(E_ALL);
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');
require_once "requireOnces.php";

// body
$fileName = null;
$action = "home";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
	$pageTitle = getLangText($action);
}

switch ($action) {
    case "article":
        $fileName = $action.".php";
		if (isset($_GET["ordernumber"])) {
			$pageTitle = $articleStore->getArticleTitle($_GET["ordernumber"]);
		}
        break;

	case "account":
	case "admin":
	case "basket":
    case "category":
    case "login":
	case "logout":
    case "search":
        $fileName = $action.".php";
        break;

    case "home":
    default:
        $fileName = "home.php";
		$pageTitle = getLangText("home");
        break;
}

$body = "";
if ($fileName) {
    ob_start();
    require_once "content/" . $fileName;
    $body = ob_get_contents();
    ob_end_clean();
}

$siteTitle = $configurationStore->getValue("sitename", "Webshop");
if (isset($pageTitle) && $pageTitle) {
    $siteTitle .= " - " . $pageTitle;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $siteTitle ?></title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<script src="./resources/js/validate.js"></script>
	<script src="./resources/js/jsEnabled.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="resources/css.css"/>
</head>
<body>
<div class="container">
    <header>
        <?php require_once "header.php"; ?>
    </header>

    <nav>
        <?php require_once "navigation.php"; ?>
    </nav>

    <main>
        <?= $body ?>
    </main>

    <footer>
        <?php require_once "footer.php"; ?>
    </footer>
</div>
</body>
</html>
