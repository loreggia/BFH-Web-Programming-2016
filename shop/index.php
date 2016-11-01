<?php
$rootLink = "/shop/";

require_once "configuration.php";
$configuration = new Configuration();

require_once "utilities.php";

require_once "classes/Database.php";
$database = new Database($configuration);

require_once "classes/BaseStore.php";

require_once "classes/ConfigurationStore.php";
$configurationStore = new ConfigurationStore($database);

require_once "classes/CategoryStore.php";
$categoryStore = new CategoryStore($database);

require_once "classes/ImageStore.php";
$imageStore = new ImageStore($database);

require_once "classes/ArticleStore.php";
$articleStore = new ArticleStore($database, $categoryStore, $imageStore);

require_once "translation.php";

// body
$fileName = null;
$action = "home";

if (isset($_GET["action"])) {
    $action = $_GET["action"];
}

switch ($action) {
    case "admin":
        $fileName = "admin/admin.php";
        break;

    case "article":
        $fileName = "article.php";
        break;

    case "category":
        $fileName = "category.php";
        break;

    case "login":
        $fileName = "login.php";
        break;

    case "search":
        $fileName = "search.php";
        break;

    case "home":
    default:
        $fileName = "home.php";
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
