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
        $result = $this->database->queryAssoc("SELECT * FROM user WHERE email LIKE :email AND password LIKE :password", ["email" => $user["email"], "password" => md5($user["password"])]);
        if (count($result) > 0) {
            return "Login mit folgendem User: ".$result[0];
        }
        return "Der Benutzername mit dem gegebenen Passwort konnte nicht gefunden werden"; //false
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
				return "User wurde angelegt mit folgender ID: ".$userId;
			} else {
				return "User konnte leider nicht gespeichert werden"; //false
			}
		}
		else{
			return "User existiert bereits!"; //false
		}
    }
}