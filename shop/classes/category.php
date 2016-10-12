<?php

class Category
{	
	private $database;
	
	public function __construct(Database $dataB){
		$this->database = $dataB;
	}

    public function getCategoryProduct($ordernumber) { // Finde die Kategorie zum Artikel
		$database = $this->database;
		return $database->query("SELECT * FROM category WHERE category_id = (SELECT id_category FROM article WHERE ordernumber LIKE '$ordernumber')");
    }

    public function getCategoryList($catUrl) {
		$database = $this->database;
        $currCategoryId = $database->query("SELECT category_id as id FROM category WHERE url LIKE '$catUrl'");
		$currCategoryId = $currCategoryId[0]["id"]; // Finde aktuelle ID
		$currCategoryIds = $database->query("SELECT category_id as id FROM category WHERE tree LIKE '%$currCategoryId%'"); // Finde alle Kategorien, die "unterwürfig" sind

		$currCatIds = array($currCategoryId);
		foreach($currCategoryIds as $currCategoryId){
			array_push($currCatIds, $currCategoryId["id"]); // Alle Kategorien-IDs in eine Liste
		}

		return join(",",$currCatIds);
    }
}