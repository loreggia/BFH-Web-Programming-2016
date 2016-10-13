<?php

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
