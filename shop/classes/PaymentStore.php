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
	
	public function getPayment(){
        $result = $this->database->queryAssoc("SELECT * FROM payment WHERE active = 1");
        if (count($result) > 0) {
            return $result;
        }
        return false;
	}
	
	public function saveUserPayment($payment, $email){
        $result = $this->database->execute("UPDATE user SET payment_id = :payment WHERE email = :email;", ["payment" => $payment, "email" => $email]);
        if ($result) {
            return true;
        }
        return false;
	}
	
	
}