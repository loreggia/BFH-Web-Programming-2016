<?php

class ConfigurationStore extends BaseStore
{
    const CAT_GENERAL = "general";
    private $cache;

    function __construct(Database $database)
    {
        parent::__construct($database);

        $this->cache = $this->database->queryAssoc("SELECT * FROM configuration");
    }

    public function getValue($key, $defaultValue = null, $category = ConfigurationStore::CAT_GENERAL)
    {
        foreach ($this->cache as $item) {
            if ($item["key"] == $key) {
                return $item["value"];
            }
        }
        $this->setValue($key, $defaultValue, $category);
        return $defaultValue;
    }

    public function setValue($key, $value, $category = ConfigurationStore::CAT_GENERAL)
    {
        array_push($this->cache, ["key" => $key, "category" => $category, "value" => $value]);
    }

    public function save()
    {
        foreach ($this->cache as $item) {
            $id = $item["configuration_id"];
            if ($id > 0) {
                $this->database->execute(
                    "UPDATE configuration SET value = :value WHERE configuration_id = :id",
                    ["id" => $id, "value" => $item["value"]]
                );
            } else {
                $this->database->execute(
                    "INSERT INTO configuration (key,category,value) VALUES (:key, :category, :value)",
                    ["key" => $item["key"], "category" => $item["category"], "value" => $item["value"]]
                );
            }
        }
    }
}