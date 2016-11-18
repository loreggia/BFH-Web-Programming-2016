<?php

class UserStore extends BaseStore
{
    /**
     * @var AddressStore
     */
    private $addressStore;

    public function __construct(Database $database, AddressStore $addressStore)
    {
        parent::__construct($database);
        $this->addressStore = $addressStore;
    }

    public function getById($id)
    {
        $result = $this->database->queryAssoc("SELECT * FROM user WHERE user_id = :id", ["id" => $id]);
        if (count($result) > 0) {
            return $result[0];
        }
        return false;
    }
	
	public function getLogin($user)
    {
        $result = $this->database->queryAssoc("SELECT company, department, firstname, lastname, salutation, email, payment_id, newsletter FROM user WHERE email LIKE :email AND password LIKE :password", ["email" => $user["email"], "password" => $user["password"]]);
        if (count($result) > 0) {
            return $result[0];
        }
        return false;
    }
	
	public function isCorrectPassword($email, $password)
    {
        $result = $this->database->queryAssoc("SELECT email FROM user WHERE email LIKE :email AND password LIKE :password", ["email" => $email, "password" => $password]);
        if (count($result) > 0) {
            return true;
        }
        return false;
    }
	
	public function userExists($user)
    {
        $result = $this->database->queryAssoc("SELECT email FROM user WHERE email LIKE :email", ["email" => $user["email"]]);
        if (count($result) > 0) {
            return true;
        }
        return false;
    }

    public function createUser($user)
    {
		if(!$this->userExists($user)){
			$result = $this->database->execute("
				INSERT INTO user (password, encoder, company, department, firstname, lastname, salutation, email, active, payment_id, lastlogin, newsletter, failedlogins) VALUES (:password, :encoder, :company, :department, :firstname, :lastname, :salutation, :email, :active, :payment_id, :lastlogin, :newsletter, :failedlogins);",
				["password" => $user["password"], "encoder" => $user["encoder"], "company" => $user["company"], "department" => $user["department"], "firstname" => $user["firstname"], "lastname" => $user["lastname"], "salutation" => $user["salutation"], "email" => $user["email"], "active" => 1, "payment_id" => 1, "lastlogin" => date("Y-m-d h:i:s"), "newsletter" => $user["newsletter"], "failedlogins" => 0]);
			if ($result) {
				$userId = $this->database->getLastInsertId();
				$this->addressStore->createUserAddresses($user, $userId);
				return $this->getLogin($user);
			} else {
				return false;
			}
		}
		else{
			return false;
		}
    }
	
	public function savePersonal($user){
        $result = $this->database->execute("UPDATE user SET company = :company, department = :department, firstname = :firstname, lastname = :lastname, salutation = :salutation WHERE email = :email;", ["company" => $user["company"], "department" => $user["department"], "firstname" => $user["firstname"], "lastname" => $user["lastname"], "salutation" => $user["salutation"], "email" => $user["email"]]);
        if ($result) {
            return true;
        }
        return false;
	}
	
	public function saveNewsletter($newsletter, $email){
        $result = $this->database->execute("UPDATE user SET newsletter = :newsletter WHERE email = :email;", ["newsletter" => $newsletter, "email" => $email]);
        if ($result) {
            return true;
        }
        return false;
	}
	
	public function saveEmail($newEmail, $email){
        $result = $this->database->execute("UPDATE user SET email = :newEmail WHERE email = :email;", ["newEmail" => $newEmail, "email" => $email]);
        if ($result) {
            return true;
        }
        return false;
	}
	
	public function savePassword($password, $email){
        $result = $this->database->execute("UPDATE user SET password = :password WHERE email = :email;", ["password" => $password, "email" => $email]);
        if ($result) {
            return true;
        }
        return false;
	}
}