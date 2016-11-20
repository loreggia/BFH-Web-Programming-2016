<?php

$payments = $paymentStore->getPayment();
//$_SESSION["user"]["payment_id"];
?>

Zahlungsart ändern<br />

<form method="post" action="./process/account/payment.php">
	<ul>
		<?php
			foreach($payments as $payment){
				$checked = ($payment["payment_id"]==$_SESSION["user"]["payment_id"]) ? " checked" : "";
				echo('<li>
					<input type="radio" name="payment" value="'.$payment["payment_id"].'" id="payment'.$payment["payment_id"].'"'.$checked.' />
					<label for="payment'.$payment["payment_id"].'">'.getRowText($payment, "name").'</label>
				</li>');
			}
		?>
		<li>
			<input type="submit" value="<?= getLangText("send")?>" />
		</li>
	</ul>
</form>