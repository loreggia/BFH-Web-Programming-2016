<?php

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
        echo createLink(getRowText($category, "name"), "category", ["categoryUrl" => $category["url"]]);
        echoNavigationItems($category["children"], $depth + 1);
        echo "</li>";
    }
    echo "</ul>";
}

echoNavigationItems($categoryTree, 0);
