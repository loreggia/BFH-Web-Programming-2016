<section>
    <aside>article aside</aside>
    <?php
    $ordernumber = $_GET["ordernumber"];

    $currCategory = $categoryStore->getCategoryProduct($ordernumber); // Finde die Kategorie zum Artikel
    if (count($currCategory) > 0) {
        print_r("<pre>") . print_r($currCategory[0]) . print_r("</pre><br />");
    }

    $products = $articleStore->getArticleProduct($ordernumber);
    foreach ($products as $product) {
        print_r("<pre>") . print_r($product) . print_r("</pre><br />");
    }

    ?>
</section>
