<?php

$rootLink = "/shop/";

$navLinks = [];

$categoryTree = $categoryStore->getCategoryTree();

function echoNavigationItems($categoryTree, $depth)
{
    if (!$categoryTree || count($categoryTree) == 0) {
        return;
    }

    echo "<ul class='nav-cat-$depth'>";
    foreach ($categoryTree as $category) {
        echo "<li class='nav-item-$depth'>";
        echo "<a href='category.php?cat=$category[url]'>$category[name]</a>";
        echoNavigationItems($category["children"], $depth + 1);
        echo "</li>";
    }
    echo "</ul>";
}

?>