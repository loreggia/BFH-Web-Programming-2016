<?php
$ordernumber = $_GET["art"];

$currCategory = $categoryStore->getCategoryProduct($ordernumber); // Finde die Kategorie zum Artikel
$parentArticle = $articleStore->getParentArticle($ordernumber);
if (count($currCategory) > 0) {
    print_r("<pre>") . print_r($currCategory[0]) . print_r("</pre><br />");
} else if (count($parentArticle) > 0) {
    print_r("<pre>") . print_r($parentArticle[0]) . print_r("</pre><br />");
}

$products = $articleStore->getArticleProduct($ordernumber);
foreach($products as $product){
	print_r("<pre>").print_r($product).print_r("</pre><br />");
}

?>