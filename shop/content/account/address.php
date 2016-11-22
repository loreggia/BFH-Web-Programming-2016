<?php
$countries = $countryStore->getCountries();
$userId = $userStore->getUserId($_SESSION["user"]["email"]);
$userAdress = $addressStore->getUserAddresses($userId);

echo "<h3>".getLangText("ac_address_bill")."</h3>";
$billing = new Form("post", "./process/account/address.php", "billing", array(array("address_mode", "0")), array("salutation", "company", "department", "firstname", "lastname", "street", "zip", "city", "country", "additional1", "additional2", "submit"),$userAdress[0],$countryStore);
echo $billing->generateForm();

echo "<h3>".getLangText("ac_address_ship")."</h3>";
$shipping = new Form("post", "./process/account/address.php", "shipping", array(array("address_mode", "1")), array("salutation", "company", "department", "firstname", "lastname", "street", "zip", "city", "country", "additional1", "additional2", "submit"),$userAdress[1],$countryStore);
echo $shipping->generateForm();