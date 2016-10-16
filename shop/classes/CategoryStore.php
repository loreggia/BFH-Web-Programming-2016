<?php

class CategoryStore extends BaseStore
{
    function __construct(Database $database)
    {
        parent::__construct($database);
    }

    /*
     * Finde die Kategorie zum Artikel
     */
    public function getCategoryOfArticle($articleId)
    {
        $database = $this->database;
        $catArr = $database->queryAssoc("SELECT * FROM category WHERE category_id = (SELECT category_id FROM article WHERE article_id = :articleId)", ["articleId" => $articleId]);
        return $catArr[0];
    }

    /*
     * Hole alle IDs der angegebenen Kategorie und deren Unterkategorien
     */
    public function getCategoryIdList($catUrl)
    {
        $database = $this->database;

        // Finde aktuelle ID
        $category = $database->queryAssoc("SELECT category_id as id FROM category WHERE url = :catUrl", ["catUrl" => $catUrl]);
        $categoryId = $category[0]["id"];

        $categoryIds = $this->getCategoryIdArray($categoryId);
        // add root
        array_push($categoryIds, $categoryId);

        return join(",", $categoryIds);
    }

    public function getCategoryIdArray($parentId = null)
    {
        $tree = $this->getCategoryTree($parentId);
        return $this->getCategoryIdsFromTree($tree);
    }

    public function getCategoryTree($parentId = null)
    {
        $database = $this->database;
        $categories = $database->queryAssoc("SELECT * FROM category ORDER BY category_id_parent, category_id");
        return createTree($categories, $parentId, "category_id", "category_id_parent");
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