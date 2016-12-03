<aside>category aside</aside>

<section>
    <div class="article-list">
        <?php
        $articles = $articleStore->getArticleList($_GET["categoryUrl"]);

        foreach ($articles as $article) {
            ?>
            <div class="article-list-item-border">
                <?= beginLink(getRowText($article, "name"), "article", ["ordernumber" => $article["ordernumber"]]) ?>
                <div class="article-list-item">
                    <span class="article-list-item-name"><?= getRowText($article, "name") ?></span>

                    <?php

                    if ($article["image"]) {
                        ?>

                        <div class="article-list-item-image">
                            <img src="<?= $article["image"]["url"] ?>"/>
                        </div>

                        <?php
                    }
                    ?>
                </div>
                </a>
            </div>

            <?php
        }
        ?>
    </div>
</section>
