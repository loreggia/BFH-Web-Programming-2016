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

function beginLink($title, $action, $params = null)
{
	global $rootLink;
	$paramString = "";

	if ($params && count($params) > 0) {
		while ($param = current($params)) {
			$paramString .= "&" . key($params) . "=" . $param;
			next($params);
		}

	}
	$url = $rootLink . "index.php?action=" . $action . $paramString;
	return '<a href="' . $url . '" title="' . $title . '">';
}

function createLink($name, $title, $action, $params = null)
{
	return beginLink($title, $action, $params) . $name . '</a>';
}

function saveUploadedImage(ImageStore $imageStore, $fileInputName = "file", $altInputName = "alt")
{
    if (!isset($_POST[$altInputName]) || !isset($_FILES[$fileInputName])) {
        return false;
    }

    $file = $_FILES[$fileInputName];
    $targetDir = "resources/images/uploaded";
    $fileInfo = pathinfo($file["name"]);
    $targetFileName = $targetDir . $fileInfo["basename"];

    $i = 2;
    while (file_exists($targetFileName)) {
        $targetFileName = $targetDir . $fileInfo["filename"] . $i . $fileInfo["extension"];
    }

    if (move_uploaded_file($file["tmp_name"], $targetFileName)) {
        return $imageStore->saveImage($targetFileName, $_POST[$altInputName]);
    } else {
        return false;
    }
}
