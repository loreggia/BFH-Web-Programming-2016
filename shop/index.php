<?php
$rootLink = "/shop/";

require_once "configuration.php";
$configuration = new Configuration();

require_once "utilities.php";

require_once "classes/database.php";
$database = new Database($configuration);

require_once "classes/categorystore.php";
$categoryStore = new CategoryStore($database);

require_once "classes/articlestore.php";
$articleStore = new ArticleStore($database, $categoryStore);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Webshop</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" media="screen" href="resources/css.css"/>
</head>
<body>
<div class="wrapper">
    <header>
        <?php require_once "header.php"; ?>
    </header>

    <nav>
        <?php require_once "navigation.php"; ?>
    </nav>

    <main>
        <?php

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

        if ($fileName) {
            require_once "content/" . $fileName;
        }

        ?>
    </main>

    <footer>
        <?php require_once "footer.php"; ?>
    </footer>
</div>
</body>
</html>
