<?php
$products = $articleClass->getArticleList($_GET["cat"]);

foreach($products as $product){
	$articleClass->getArticleListDetail($product);
	print_r("<pre>").print_r($product).print_r("</pre><br />");
	echo ('<a href="'.$rootLink.'article.php?art='.$product["ordernumber"].'">'.$product["name"].'</a>');
}

?>