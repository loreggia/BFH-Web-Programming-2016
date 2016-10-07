<?php
include 'artikelaufbau.php'; // Artikel
$rootLink = "/shop/";

$navLinks = array(
	array( 
		"name" => "Home",
		"link" => $rootLink
	)
);

//Der untere Code kann durch SQL ersetzt werden.
//Da die Kategorien dort in einer eigenen Tabelle sind, wird dies einfacher gehen.
$categories = array();
foreach($products as $product){
	if($product['category']!=""){
		if(!(in_array($product['category'],$categories))){
			array_push($categories,$product['category']);
		}
	}
}


foreach($categories as $category){
	array_push($navLinks,
		array( 
			"name" => $category,
			"link" => $rootLink."category.php?cat=".$category
		)
	);
}
?>