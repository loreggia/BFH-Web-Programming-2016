<section>
    <aside>category aside</aside>
    <?php
    $articles = $articleStore->getArticleList($_GET["categoryUrl"]);

    foreach ($articles as $article) {
        $articleStore->getArticleListDetail($article);
        //print_r("<pre>") . print_r($product) . print_r("</pre><br />");
        echo(createLink($article["name"], "article", ["ordernumber" => $article["ordernumber"]]));
    }

    ?>
</section>
