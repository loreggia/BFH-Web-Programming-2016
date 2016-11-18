<h1>Willkommen <?= $_SESSION["user"]["firstname"]." ".$_SESSION["user"]["lastname"] ?></h1>

<div>
<h3>Persönliche Daten</h3>
<?php print_r($_SESSION); echo "<br />"; ?>
<?=createLink("Persönliche Daten ändern", "account&mode=personal"); ?>
</div>
<div>
<h3>Gewählte Zahlungsart</h3>
<?php $payment = $paymentStore->getById($_SESSION["user"]["payment_id"]);
 ?>
<?= $payment["name_de"] ?><br />
<?=createLink("Zahlungsart ändern", "account&mode=payment"); ?>
</div>
<div>
<?php
$userAddresses = $addressStore->getUserAddresses($userStore->getUserId($_SESSION["user"]["email"]));

foreach ($userAddresses as $userAddress){
	if($userAddress["address_mode"] == 0){echo "<h3>Rechnungsadresse</h3>";}
	else{echo "<h3>Lieferadresse</h3>";}
	
	echo(
	"Anrede: ".$userAddress["salutation"]."<br />".
	"Firma: ".$userAddress["company"]."<br />".
	"Abteilung: ".$userAddress["department"]."<br />".
	"Vorname: ".$userAddress["firstname"]."<br />".
	"Nachname: ".$userAddress["lastname"]."<br />".
	"Strasse: ".$userAddress["street"]."<br />".
	"ZIP: ".$userAddress["zipcode"]."<br />".
	"Ort: ".$userAddress["city"]."<br />".
	"Land: ".$userAddress["name_de"]."<br />".
	"Adresszusatz 1: ".$userAddress["additional_address_line1"]."<br />".
	"Adresszusatz 2: ".$userAddress["additional_address_line2"]."<br />"
	);
	
	if($userAddress["address_mode"] == 0){echo(createLink("Rechnungsadresse ändern", "account&mode=address"));}
	else{echo(createLink("Lieferadresse ändern", "account&mode=address"));}
}
?>
</div>
<div>
<h3>Letzte Bestellung</h3>
(Letzte Bestellung)<br />
<?=createLink("Alle Bestellungen sehen", "account&mode=address"); ?>
</div>