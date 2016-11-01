<?php

class ImageStore extends BaseStore
{
    function __construct(Database $database)
    {
        parent::__construct($database);
    }

    public function getById($id)
    {
        $result = $this->database->queryAssoc("SELECT * FROM image WHERE image_id = :id", ["id" => $id]);
        if (count($result) > 0) {
            return $result[0];
        }
        return false;
    }

    public function saveImage($url, $alt)
    {
        $result = $this->database->execute("
            INSERT INTO image (url, alt) VALUES (:url, :alt);",
            ["url" => $url, "alt" => $alt]);
        if ($result) {
            return $this->database->getLastInsertId();
        } else {
            return false;
        }
    }
}