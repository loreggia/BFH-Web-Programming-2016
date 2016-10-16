<?php

class ArticleStore extends BaseStore
{
    private $categoryStore;

    public function __construct(Database $database, CategoryStore $categoryStore)
    {
        parent::__construct($database);
        $this->database = $database;
        $this->categoryStore = $categoryStore;
    }

    /*
     * Ladet einen Artikel inkl. attributes und options
     */
    public function getArticleDetails($article)
    {
        $article["attributes"] = $this->getArticleAttributes($article["article_id"]);
        $article["options"] = $this->getArticleOptions($article["article_id"]);
        return $article;
    }

    public function getArticleAttributes($articleId)
    {
        $database = $this->database;
        return $database->queryAssoc("
          SELECT
            attr.name_de,
            attr.name_en,
            attr.name_fr,
            a2a.value_de,
            a2a.value_en,
            a2a.value_fr
          FROM attribute_article a2a
            INNER JOIN attribute attr ON a2a.attribute_id = attr.attribute_id
          WHERE a2a.article_id = :articleId", ["articleId" => $articleId]);
    }

    public function getArticleOptions($articleId)
    {
        $database = $this->database;
        return $database->queryAssoc("
          SELECT
            ogr.name_de AS groupname_de,
            ogr.name_en AS groupname_en,
            ogr.name_fr AS groupname_fr,
            opt.name_de,
            opt.name_en,
            opt.name_fr,
            o2a.price,
            o2a.pseudoprice,
            o2a.isDefault
          FROM option_article o2a
            INNER JOIN option opt ON o2a.option_id = opt.option_id
            INNER JOIN option_group ogr ON ogr.option_group_id = opt.option_group_id
          WHERE o2a.article_id = :articleId", ["articleId" => $articleId]);
    }

    public function getArticle($ordernumber)
    {
        $articleArr = $this->database->queryAssoc("SELECT * FROM article WHERE ordernumber = :ordernumber", ["ordernumber" => $ordernumber]);
        return $articleArr[0];
    }

    public function getArticleList($catUrl)
    {
        $database = $this->database;
        $categoryStore = $this->categoryStore;
        $categoryIds = $categoryStore->getCategoryIdList($catUrl);
        return $database->queryAssoc("SELECT * FROM article WHERE category_id IN ($categoryIds)");
    }
}
