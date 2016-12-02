<?php

class ArticleStore extends BaseStore
{
    /**
     * @var CategoryStore
     */
    private $categoryStore;

    /**
     * @var ImageStore
     */
    private $imageStore;

    public function __construct(Database $database, CategoryStore $categoryStore, ImageStore $imageStore)
    {
        parent::__construct($database);
        $this->categoryStore = $categoryStore;
        $this->imageStore = $imageStore;
    }

    /*
     * Ladet einen Artikel inkl. attributes und options
     */
    public function getArticle($ordernumber)
    {
        $articleArr = $this->database->queryAssoc("SELECT * FROM article WHERE ordernumber = :ordernumber", ["ordernumber" => $ordernumber]);
        return $this->getArticleDetails($articleArr[0]);
    }

    public function getArticleDetails($article)
    {
        $article["attributes"] = $this->getArticleAttributes($article["article_id"]);
        $article["options"] = $this->getArticleOptions($article["article_id"]);
		$article["sets"] = $this->getArticleSets($article["article_id"]);
        $article["image"] = $this->imageStore->getById($article["image_id"]);
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
        $results = $database->queryAssoc("
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
		INNER JOIN `option` opt ON o2a.option_id = opt.option_id
		INNER JOIN option_group ogr ON ogr.option_group_id = opt.option_group_id
		WHERE o2a.article_id = :articleId", ["articleId" => $articleId]);

		$res = array();
		$resKeys = array();

		foreach ($results as $result){
			if(!in_array($result["groupname_de"], $resKeys)){
				$res[$result["groupname_de"]] = array();
				array_push($resKeys, $result["groupname_de"]);
			}
			array_push($res[$result["groupname_de"]], $result);
		}

        return $res;
    }

    public function getArticleSets($articleId)
    {
        $database = $this->database;
        $results = $database->queryAssoc("
		SELECT
		sets.name_de AS setname_de,
		sets.name_en AS setname_en,
		sets.name_fr AS setname_fr,
		sets.isDefault,
		ogr.name_de AS groupname_de,
		ogr.name_en AS groupname_en,
		ogr.name_fr AS groupname_fr,
		opt.name_de,
		opt.name_en,
		opt.name_fr,
		o2a.price,
		o2a.pseudoprice
		FROM sets
		INNER JOIN sets_option_article soa ON soa.sets_id = sets.sets_id
		INNER JOIN option_article o2a ON o2a.option_article_id = soa.option_article_id
		INNER JOIN `option` opt ON opt.option_id = o2a.option_id
		INNER JOIN option_group ogr ON ogr.option_group_id = opt.option_group_id
		WHERE sets.article_id = :articleId", ["articleId" => $articleId]);

        $res = array();
		$resKeys = array();

        foreach ($results as $result){
			if(!in_array($result["setname_de"], $resKeys)){
				$res[$result["setname_de"]] = array();
				array_push($resKeys, $result["setname_de"]);
			}
			array_push($res[$result["setname_de"]], $result);
		}

        return $res;
    }

    public function getArticleList($catUrl)
    {
        $database = $this->database;
        $categoryStore = $this->categoryStore;
        $categoryIds = $categoryStore->getCategoryIdList($catUrl);
        $result = $database->queryAssoc("SELECT * FROM article WHERE category_id IN ($categoryIds)");
        for ($i = 0; $i < count($result); $i++) {
            $result[$i]["image"] = $this->imageStore->getById($result[$i]["image_id"]);
        }
        return $result;
    }
	
	public function getArticleTitle($ordernumber){
        $res = $this->database->queryAssoc("SELECT name_".getLanguageCode()." as name FROM article WHERE ordernumber = :ordernumber", ["ordernumber" => $ordernumber]);
		return $res[0]["name"];
	}
}
