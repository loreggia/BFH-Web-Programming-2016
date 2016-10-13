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

require_once 'header.php'; // Header mit der Navigation
require_once 'body.php'; // Kann weiter unterteilt werden
require_once 'footer.php'; // Footer
?>