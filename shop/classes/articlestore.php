<?php

class ArticleStore
{
    private $database;
    private $categoryStore;

    public function __construct(Database $database, CategoryStore $categoryStore)
    {
        $this->database = $database;
        $this->categoryStore = $categoryStore;
    }

    /*
     * Finde die Kategorie zum Artikel
     */
    public function getArticleProduct($ordernumber)
    {
        $database = $this->database;
        $products = $database->queryAssoc("SELECT * FROM article WHERE ordernumber = :orderNumber OR article_id_parent IN (SELECT article_id FROM article WHERE ordernumber = :orderNumber)", ["orderNumber" => $ordernumber]); // Finde alle Artikel
        for ($i = 0; $i < count($products); $i++) {
            $products[$i]["attributes"] = $this->getArticleAttributes($products[$i]["article_id"]);
            $products[$i]["options"] = $this->getArticleOptions($products[$i]["article_id"]);
        }
        return $products;
    }

    public function getArticleAttributes($articleId)
    {
        $database = $this->database;
        return $database->queryAssoc("SELECT attr.name AS name, a2a.value AS value FROM attribute_article AS a2a INNER JOIN attribute AS attr ON a2a.attribute_id = attr.attribute_id WHERE a2a.article_id = :articleId", ["articleId" => $articleId]);
    }

    public function getArticleOptions($articleId)
    {
        $database = $this->database;
        return $database->queryAssoc("SELECT opt.name AS name, o2a.value AS value FROM option_article AS o2a INNER JOIN option AS opt ON o2a.option_id = opt.option_id WHERE o2a.article_id = :articleId", ["articleId" => $articleId]);
    }

    public function getArticleList($catUrl)
    {
        $database = $this->database;
        $categoryStore = $this->categoryStore;
        $categoryIds = $categoryStore->getCategoryList($catUrl);
        return $database->queryAssoc("SELECT * FROM article WHERE category_id IN (:categoryIds)", ["categoryIds" => $categoryIds]); // Nur Vaterartikel und Einzelartikel von allen Kategorien werden gesucht.
    }

    public function getArticleListDetail($product)
    {
        $database = $this->database;
        if (!$product["article_id_parent"] && !$product["isAlone"]) { // Wenn Vaterartikel...
            $prices = $database->queryAssoc("SELECT MIN(price) as minPrice, COUNT(pseudoprice) as pseudopriceCount FROM article WHERE article_id_parent = :articleId", ["articleId" => $product["article_id"]]); // Suche Childartikel
            $product["price"] = "Ab " . $prices[0]["minPrice"]; // Setze den "ab-" Preis
            $product["pseudoprice"] = 0; // Definiere, ob mindestens ein Childartikel ein Pseudopreis hat => Er bekommt ein %-Zeichen!
            if ($prices[0]["pseudopriceCount"] > 0) {
                $product["pseudoprice"] = $prices[0]["pseudopriceCount"];
            }
        }
        return $product;
    }

    public function getParentArticle($ordernumber)
    {
        $database = $this->database;
        return $database->queryAssoc("SELECT art.* FROM article art INNER JOIN article chi ON chi.article_id_parent = art.article_id WHERE chi.ordernumber = :ordernumber", ["ordernumber" => $ordernumber]);
    }
}
