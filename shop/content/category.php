<?php
include 'artikelaufbau.php'; // Artikel

//Wird durch SQL ersetzt!
$currProducts = array();
foreach($products as $product){
	if($product['category']==$_GET['cat']){
		if(!(in_array($product,$currProducts))){
			array_push($currProducts,$product);
		}
	}
}

//Durch Ersetzung von SQL können die Kinderartikel direkt hinzugefügt werden.
//Momentan werden nur Vaterartikel ausgegeben.
foreach($currProducts as $product){
	print_r("<pre>").print_r($product).print_r("</pre><br />");
}

?>