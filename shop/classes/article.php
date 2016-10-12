<?php

class Article
{	
	private $database;
	
	public function __construct(Database $dataB, Category $categoryC){
		$this->database = $dataB;
		$this->categoryClass = $categoryC;
	}

    public function getArticleProduct($ordernumber) { // Finde die Kategorie zum Artikel
		$database = $this->database;
		$products = $database->query("SELECT * FROM article WHERE ordernumber LIKE '$ordernumber' OR father IN (SELECT article_id FROM article WHERE ordernumber LIKE '$ordernumber')"); // Finde alle Artikel
		for ($i=0;$i<count($products);$i++){
			$products[$i]["attributes"] = $this->getArticleAttributes($products[$i]["article_id"]);
			$products[$i]["options"] = $this->getArticleOptions($products[$i]["article_id"]);
		}
		return $products;
	}

    public function getArticleList($catUrl) {
		$database = $this->database;
		$categoryClass = $this->categoryClass;
        return $database->query("SELECT * FROM article WHERE id_category IN (".$categoryClass->getCategoryList($catUrl).")"); // Nur Vaterartikel und Einzelartikel von allen Kategorien werden gesucht.
    }
	
	public function getArticleListDetail($product) {
		$database = $this->database;
		if(!$product["father"] && !$product["isAlone"]){ // Wenn Vaterartikel...
			$prices = $database->query("SELECT MIN(price) as minPrice, COUNT(pseudoprice) as pseudopriceCount FROM article WHERE father = $product[article_id]"); // Suche Childartikel
			$product["price"] = "Ab ".$prices[0]["minPrice"]; // Setze den "ab-" Preis
			$product["pseudoprice"] = 0; // Definiere, ob mindestens ein Childartikel ein Pseudopreis hat => Er bekommt ein %-Zeichen!
			if($prices[0]["pseudopriceCount"] > 0) $product["pseudoprice"] = $prices[0]["pseudopriceCount"];
		}
		return $product;
	}
	
	public function getArticleAttributes($productId){
		$database = $this->database;
		return $database->query("SELECT attr.name AS name, a2a.value AS value FROM attributes2article AS a2a INNER JOIN attributes AS attr ON a2a.id_attributes=attr.attributes_id WHERE a2a.id_article = $productId");
	}
	
	public function getArticleOptions($productId){
		$database = $this->database;
		return $database->query("SELECT opt.name AS name, o2a.value AS value FROM options2article AS o2a INNER JOIN options AS opt ON o2a.id_option=opt.options_id WHERE o2a.id_article = $productId");

	}
}