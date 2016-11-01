<?php

$navLinks = [];

$categoryTree = $categoryStore->getCategoryTree();

function echoNavigationItems($categoryTree, $depth)
{
    if ($depth == 0) {
        echo "<ul class='main-navigation'><li>" . createLink(getLangText("home"), "home") . "</li>";
    } else {
        echo "<ul class='nav-category-$depth'>";
    }

    if ($categoryTree && count($categoryTree) != 0) {
        foreach ($categoryTree as $category) {
            echo "<li class='nav-item nav-item-$depth'>";
            $linkText = getRowText($category, "name");

            if ($depth > 0 && $category["children"] && count($category["children"]) > 0) {
                $linkText .= " &rArr;";
            }

            echo createLink($linkText, "category", ["categoryUrl" => $category["url"]]);
            echoNavigationItems($category["children"], $depth + 1);
            echo "</li>";
        }
    }

    echo "</ul>";
}

?>

    <section class="navigation">
        <?php echoNavigationItems($categoryTree, 0); ?>
    </section>

<?php
// todo
$breadCrumbs = "Breadcrumbs > asdf";

if (!empty($breadCrumbs)) {
    ?>
    <section class="breadcrumbs">
        <?= $breadCrumbs ?>
    </section>
    <?php
}