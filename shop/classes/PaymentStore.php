<?php

class PaymentStore extends BaseStore
{
    function __construct(Database $database)
    {
        parent::__construct($database);
    }

    public function getById($id)
    {
        $result = $this->database->queryAssoc("SELECT * FROM payment WHERE payment_id = :id", ["id" => $id]);
        if (count($result) > 0) {
            return $result[0];
        }
        return false;
    }
}