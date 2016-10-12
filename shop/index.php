<?php
$rootLink = "/shop/";

require_once "configuration.php";
require_once "classes/database.php";

$database = new Database($CONFIG);
$database->connect();

require_once "classes/category.php";
$categoryClass = new Category($database);

require_once "classes/article.php";
$articleClass = new Article($database, $categoryClass);


require_once 'header.php'; // Header mit der Navigation
require_once 'body.php'; // Kann weiter unterteilt werden
require_once 'footer.php'; // Footer
?>