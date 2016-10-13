<?php

class CategoryStore
{
    private $database;

    public function __construct(Database $dataB)
    {
        $this->database = $dataB;
    }

    public function getCategoryProduct($ordernumber)
    { // Finde die Kategorie zum Artikel
        $database = $this->database;
        return $database->queryAssoc("SELECT * FROM category WHERE category_id = (SELECT category_id FROM article WHERE ordernumber LIKE '$ordernumber')");
    }

    public function getCategoryList($catUrl)
    {
        $database = $this->database;
        $currCategoryId = $database->queryAssoc("SELECT category_id as id FROM category WHERE url = :catUrl", ["catUrl" => $catUrl]);
        $currCategoryId = $currCategoryId[0]["id"]; // Finde aktuelle ID

        $categoryIds = $this->getCategoryIds($currCategoryId);

        return join(",", $categoryIds);
    }

    public function getCategoryIds($rootId = null)
    {
        $tree = $this->getCategoryTree($rootId);
        return $this->getCategoryIdsFromTree($tree);
    }

    public function getCategoryTree($rootId = null)
    {
        $database = $this->database;
        $categories = $database->queryAssoc("SELECT * FROM category ORDER BY category_id_parent, category_id");
        return createTree($categories, $rootId, "category_id", "category_id_parent");
    }

    private function getCategoryIdsFromTree($tree)
    {
        if (!$tree || count($tree) == 0) {
            return [];
        }

        $result = [];
        foreach ($tree as $node) {
            array_push($result, $node["category_id"]);
            $result = array_merge($result, $this->getCategoryIdsFromTree($node["children"]));
        }

        return $result;
    }
}