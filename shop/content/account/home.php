<h1><?=getLangText("welcome")." ".$_SESSION["user"]["firstname"]." ".$_SESSION["user"]["lastname"] ?></h1>

<div>
<h3><?= getLangText("ac_personal")?></h3>
<?php print_r($_SESSION); echo "<br />"; ?>
<?=createLink(getLangText("ac_personal_change"), getLangText("ac_personal_change"), "account&mode=personal"); ?>
</div>
<div>
<h3><?= getLangText("ac_payment_select")?></h3>
<?php $payment = $paymentStore->getById($_SESSION["user"]["payment_id"]);
 ?>
<?= getRowText($payment, "name") ?><br />
<?=createLink(getLangText("ac_payment_change"), getLangText("ac_payment_change"), getLangText("ac_payment_change"), "account&mode=payment"); ?>
</div>
<div>
<?php
$userAddresses = $addressStore->getUserAddresses($userStore->getUserId($_SESSION["user"]["email"]));

foreach ($userAddresses as $userAddress){
	if($userAddress["address_mode"] == 0){echo "<h3>".getLangText("ac_address_bill")."</h3>";}
	else{echo "<h3>".getLangText("ac_address_ship")."</h3>";}
	
	echo(
	getLangText("salutation").": ".$userAddress["salutation"]."<br />".
	getLangText("company").": ".$userAddress["company"]."<br />".
	getLangText("department").": ".$userAddress["department"]."<br />".
	getLangText("firstname").": ".$userAddress["firstname"]."<br />".
	getLangText("lastname").": ".$userAddress["lastname"]."<br />".
	getLangText("street").": ".$userAddress["street"]."<br />".
	getLangText("zip").": ".$userAddress["zipcode"]."<br />".
	getLangText("city").": ".$userAddress["city"]."<br />".
	getLangText("country").": ".getRowText($userAddress, "name")."<br />".
	getLangText("additional1").": ".$userAddress["additional_address_line1"]."<br />".
	getLangText("additional2").": ".$userAddress["additional_address_line2"]."<br />"
	);
	
	if($userAddress["address_mode"] == 0){echo(createLink(getLangText("ac_address_bill_change"), getLangText("ac_address_bill_change"), "account&mode=address"));}
	else{echo(createLink(getLangText("ac_address_ship_change"), getLangText("ac_address_ship_change"), "account&mode=address"));}
}
?>
</div>
<div>
<h3><?= getLangText("ac_orders_last")?></h3>
(Letzte Bestellung)<br />
<?=createLink(getLangText("ac_orders_see"), getLangText("ac_orders_see"), "account&mode=address"); ?>
</div>