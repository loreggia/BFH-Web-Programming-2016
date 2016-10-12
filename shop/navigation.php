<?php
$navLinks = array(
	array( 
		"name" => "Home",
		"link" => $rootLink
	)
);

$categories = $database->query("SELECT * FROM category WHERE category_id <> parentId");

foreach($categories as $category) {
	array_push($navLinks,
		array( 
			"name" => $category["name"],
			"link" => $rootLink."category.php?cat=".$category["url"]
		)
	);
}
?>