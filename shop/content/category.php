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

//Durch Ersetzung von SQL k�nnen die Kinderartikel direkt hinzugef�gt werden.
//Momentan werden nur Vaterartikel ausgegeben.
foreach($currProducts as $product){
	print_r("<pre>").print_r($product).print_r("</pre><br />");
}

?>