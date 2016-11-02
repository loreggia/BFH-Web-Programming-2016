<?php

class AddressStore extends BaseStore
{
    /**
     * @var CountryStore
     */
    private $countryStore;

    public function __construct(Database $database, CountryStore $countryStore)
    {
        parent::__construct($database);
        $this->countryStore = $countryStore;
    }

    public function getById($id)
    {
        $result = $this->database->queryAssoc("SELECT * FROM address WHERE address_id = :id", ["id" => $id]);
        if (count($result) > 0) {
            return $result[0];
        }
        return false;
    }

    public function createUserAddresses($user, $userId)
    {
        //Billing-Address => AddresMode = 0
		$insertBilling = $this->database->execute("
		INSERT INTO address (user_id, address_mode, company, department, firstname, lastname, salutation) VALUES (:user_id, :address_mode, :company, :department, :firstname, :lastname, :salutation);",
		["user_id" => $userId, "address_mode" => 0, "company" => $user["company"], "department" => $user["department"], "firstname" => $user["firstname"], "lastname" => $user["lastname"], "salutation" => $user["salutation"]]);
		
		//Shipping-Address => AddresMode = 1
		$insertShipping = $this->database->execute("
		INSERT INTO address (user_id, address_mode, company, department, firstname, lastname, salutation) VALUES (:user_id, :address_mode, :company, :department, :firstname, :lastname, :salutation);",
		["user_id" => $userId, "address_mode" => 1, "company" => $user["company"], "department" => $user["department"], "firstname" => $user["firstname"], "lastname" => $user["lastname"], "salutation" => $user["salutation"]]);
		
		if ($insertBilling && $insertShipping) {
            return true;
        } else {
            return false;
        }
    }
}