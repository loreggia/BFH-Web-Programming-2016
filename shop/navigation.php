<?php
require_once "artikelaufbau.php"; // Artikel
require_once "database.php";

$rootLink = "/shop/";

$navLinks = array(
	array( 
		"name" => "Home",
		"link" => $rootLink
	)
);

$database = new Database($CONFIG);
$database->connect();
$categories = $database->query("SELECT * FROM category");

foreach($categories as $category) {
	array_push($navLinks,
		array( 
			"name" => $category["name"],
			"link" => $rootLink."category.php?cat=".$category["url"]
		)
	);
}
?>