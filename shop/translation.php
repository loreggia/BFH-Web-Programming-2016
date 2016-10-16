<?php
require_once "resources/i8n/en.php";
require_once "resources/i8n/de.php";
require_once "resources/i8n/fr.php";

/*
 * Gets a static localized text from a resources file.
 */
function getLangText($key)
{
    global $LANG;

    $code = getLanguageCode();
    $result = "";

    if (isset($LANG[$code]) && isset($LANG[$code][$key])) {
        $result = $LANG[$code][$key];
    }

    if (empty($result)) {
        $code = getDefaultLanguageCode();
        if (isset($LANG[$code]) && isset($LANG[$code][$key])) {
            $result = $LANG[$code][$key];
        }
    }

    // for easier debugging
    return empty($result) ? "__" . $key . "__" : $result;
}

/*
 * Gets a localized text from a DB row.
 */
function getRowText($row, $column)
{
    $code = getLanguageCode();
    $colLang = $column . "_" . $code;
    $result = "";

    if (isset($row[$colLang])) {
        $result = $row[$colLang];
    }

    if (empty($result)) {
        $code = getDefaultLanguageCode();
        $colLang = $column . "_" . $code;
        if (isset($row[$colLang])) {
            $result = $row[$colLang];
        }
    }

    // for easier debugging
    return empty($result) ? "__" . $column . "__" : $result;
}

function getDefaultLanguageCode()
{
    // TODO von DB laden (Konfiguration)
    return "en";
}

function getLanguageCode()
{
    // TODO von DB laden (Konfiguration oder Benutzerprofil)
    if (isset($_GET["lang"])) {
        $l = $_GET["lang"];
    } else {
        $l = "en";
    }
    return $l;
}