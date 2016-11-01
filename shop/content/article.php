<?php
$ordernumber = $_GET["ordernumber"];

$article = $articleStore->getArticle($ordernumber);
//print_r("<pre>") . print_r($article) . print_r("</pre><br />");

$category = $categoryStore->getCategoryOfArticle($article["article_id"]);
//print_r("<pre>") . print_r($category) . print_r("</pre><br />");

?>

<aside>article aside</aside>

<section>
    <h1>Produktübersicht</h1>

    <div class="article-top">
        <div class="article-image">
            <?php
            if ($article["image"]) {
                echo '<img src="' . $article["image"]["url"] . '" alt="' . $article["image"]["alt"] . '" />';
            }
            ?>
        </div>
        <div class="article-overview">
            <p>
                <?php
                if (!empty($article["pseudoprice"])) {
                    ?><span class="article-pseudoprice">CHF <?= $article["pseudoprice"] ?></span><br/><?php
                }
                ?>
                <span class="article-price">CHF <?= $article["price"] ?></span>
            </p>
            <p>
                <span class="article-name"><?= getRowText($article, "name") ?></span>
            </p>
            <p>
                <span class="article-description"><?= getRowText($article, "description") ?></span>
            </p>
        </div>
    </div>
    <div class="article-details">
        <p>
            <span class="article-description-long"><?= getRowText($article, "description_long") ?></span>
        </p>
    </div>
</section>
