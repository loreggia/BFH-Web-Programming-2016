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
<h3>Rechnungsadresse</h3>
(Rechnungsadresse)<br />
<?=createLink("Rechnungsadresse ändern", "account&mode=address"); ?>
</div>
<div>
<h3>Lieferadresse</h3>
(Lieferadresse)<br />
<?=createLink("Lieferadresse ändern", "account&mode=address"); ?>
</div>
<div>
<h3>Letzte Bestellung</h3>
(Letzte Bestellung)<br />
<?=createLink("Alle Bestellungen sehen", "account&mode=address"); ?>
</div>