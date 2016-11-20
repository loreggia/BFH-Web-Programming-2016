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
		INSERT INTO address (user_id, address_mode, company, department, firstname, lastname, salutation, country_id) VALUES (:user_id, :address_mode, :company, :department, :firstname, :lastname, :salutation, 1);",
		["user_id" => $userId, "address_mode" => 0, "company" => $user["company"], "department" => $user["department"], "firstname" => $user["firstname"], "lastname" => $user["lastname"], "salutation" => $user["salutation"]]);
		
		//Shipping-Address => AddresMode = 1
		$insertShipping = $this->database->execute("
		INSERT INTO address (user_id, address_mode, company, department, firstname, lastname, salutation, country_id) VALUES (:user_id, :address_mode, :company, :department, :firstname, :lastname, :salutation, 1);",
		["user_id" => $userId, "address_mode" => 1, "company" => $user["company"], "department" => $user["department"], "firstname" => $user["firstname"], "lastname" => $user["lastname"], "salutation" => $user["salutation"]]);
		
		if ($insertBilling && $insertShipping) {
            return true;
        } else {
            return false;
        }
    }
	
	public function getUserAddresses($userId)
    {
        $result = $this->database->queryAssoc("SELECT * FROM address
												JOIN country ON address.country_id = country.country_id 
												WHERE user_id = :id ORDER BY address_mode", ["id" => $userId]);
        if (count($result) > 0) {
            return $result;
        }
        return false;
    }
	
	public function saveAddress($address, $userId){
		$insertShipping = $this->database->execute("
			UPDATE address SET 
				company = :company, 
				department = :department, 
				firstname = :firstname, 
				lastname = :lastname, 
				salutation = :salutation, 
				street = :street, 
				zipcode = :zip, 
				city = :city, 
				country_id = :country, 
				additional_address_line1 = :additional1, 
				additional_address_line2 = :additional2 
				WHERE user_id = :user_id 
				AND address_mode = :address_mode;",
			[
			"company" => $address["company"], 
			"department" => $address["department"], 
			"firstname" => $address["firstname"], 
			"lastname" => $address["lastname"], 
			"salutation" => $address["salutation"], 
			"street" => $address['street'], 
			"zip" => $address['zip'], 
			"city" => $address['city'], 
			"country" => $address['country'], 
			"additional1" => $address['additional1'], 
			"additional2" => $address['additional2'], 
			"user_id" => $userId, 
			"address_mode" => $address["address_mode"]
			]);
		if ($result) {
            return true;
        }
        return false;
	}
}