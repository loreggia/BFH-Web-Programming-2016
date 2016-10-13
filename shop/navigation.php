<?php
use Shop\DataAccess\Database;

require_once "artikelaufbau.php"; // Artikel
require_once "dataaccess/Database.php";

$rootLink = "/shop/";

$navLinks = array(
    array(
        "name" => "Home",
        "link" => $rootLink
    )
);

$database = new Database();
$categories = $database->query("SELECT * FROM category ORDER BY parentId, category_id");

$categoriesTree = createTree($categories, null, "category_id", "parentId");

var_dump($categoriesTree);

foreach($categories as $category) {
    array_push($navLinks,
        array(
            "name" => $category["name"],
            "link" => $rootLink . "category.php?cat=" . $category["url"]
        )
    );
}

function createTree($rows, $parentId, $idColumn, $parentIdColumn)
{
    $children = [];

    for ($i = 0; $i < count($rows); $i++) {
        if ($rows[$i][$parentIdColumn] == $parentId) {
            $children = array_merge($children, array_splice($rows, $i--, 1));
        }
    }

    $childrenCount = count($children);

    if ($childrenCount != 0) {
        for ($i = 0; $i < $childrenCount; $i++) {
            $children[$i]["children"] = createTree($rows, $children[$i][$idColumn], $idColumn, $parentIdColumn);
        }
    }

    return $children;
}

?>