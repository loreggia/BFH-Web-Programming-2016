<?php
$currCategory = $categoryClass->getCategoryProduct($_GET["art"]); // Finde die Kategorie zum Artikel
print_r("<pre>").print_r($currCategory[0]).print_r("</pre><br />");

$products = $articleClass->getArticleProduct($_GET["art"]);
foreach($products as $product){
	print_r("<pre>").print_r($product).print_r("</pre><br />");
}

?>