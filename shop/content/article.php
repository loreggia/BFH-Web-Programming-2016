<aside>article aside</aside>

<section>
    <?php
    $ordernumber = $_GET["ordernumber"];

    $article = $articleStore->getArticle($ordernumber);
    print_r("<pre>") . print_r($article) . print_r("</pre><br />");

    $category = $categoryStore->getCategoryOfArticle($article["article_id"]);
    print_r("<pre>") . print_r($category) . print_r("</pre><br />");

    ?>
</section>
