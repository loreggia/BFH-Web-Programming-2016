<?php
$countries = $countryStore->getCountries();
$userId = $userStore->getUserId($_SESSION["user"]["email"]);
$userAdress = $addressStore->getUserAddresses($userId);
foreach($userAdress as $address){
	$prefix = "shipping";
	if($address["address_mode"] == 0){$prefix = "billing";}
	$isMale = ($address['salutation'] == 'mr') ? "selected" : "";
	$isFemale = ($address['salutation'] == 'ms') ? "selected" : "";
	if($address["address_mode"] == 0){echo "<h3>Rechnungsadresse</h3>";}
	else{echo "<h3>Lieferadresse</h3>";}
	?>

	<form method="post" action="./process/account/address.php">
		<input type="hidden" name="address_mode" value="<?=$address["address_mode"]?>"/>
		<ul>
			<li>
				<label for="<?=$prefix?>-salutation">Anrede*</label>
				<select name="salutation" id="<?=$prefix?>-salutation">
					<option value="mr" <?=$isMale?>>Herr</option>
					<option value="ms" <?=$isFemale?>>Frau</option>
				</select>
			</li>
			<li>
				<label for="<?=$prefix?>-company">Firma</label>
				<input type="text" name="company" id="<?=$prefix?>-company" value="<?=$address["company"]?>" />
			</li>
			<li>
				<label for="<?=$prefix?>-department">Abteilung</label>
				<input type="text" name="department" id="<?=$prefix?>-department" value="<?=$address["department"]?>" />
			</li>
			<li id="<?=$prefix?>-name">
				<label for="<?=$prefix?>-name">Vorname*</label>
				<input type="text" name="name" id="<?=$prefix?>-name" value="<?=$address["firstname"]?>" />
				<mark>Bitte Vorname angeben</mark>
			</li>
			<li id="<?=$prefix?>-lastname">
				<label for="<?=$prefix?>-lastname">Nachname*</label>
				<input type="text" name="lastname" id="<?=$prefix?>-lastname" value="<?=$address["lastname"]?>" />
				<mark>Bitte Nachname angeben</mark>
			</li>
			<li id="<?=$prefix?>-street">
				<label for="<?=$prefix?>-street">Strasse*</label>
				<input type="text" name="street" id="<?=$prefix?>-street" value="<?=$address["street"]?>" />
				<mark>Bitte Strasse angeben</mark>
			</li>
			<li id="<?=$prefix?>-zip">
				<label for="<?=$prefix?>-zip">PLZ*</label>
				<input type="text" name="zip" id="<?=$prefix?>-zip" value="<?=$address["zipcode"]?>" />
				<mark>Bitte Postleitzahl angeben</mark>
			</li>
			<li id="<?=$prefix?>-city">
				<label for="<?=$prefix?>-city">Ort*</label>
				<input type="text" name="city" id="<?=$prefix?>-city" value="<?=$address["city"]?>" />
				<mark>Bitte Ort angeben</mark>
			</li>
			<li id="<?=$prefix?>-country">
				<label for="<?=$prefix?>-country">Land*</label>
				<select name="country" id="<?=$prefix?>-country">
				<?php
					foreach($countries as $country){
						$selected = ($address['country_id'] == $country['country_id']) ? "selected" : "";
						echo('<option value="'.$country['country_id'].'" '.$selected.'>'.$country['name_de'].'</option>');
					}
				?>
				</select>
			</li>
			<li>
				<label for="<?=$prefix?>-additional1">Adresszusatz 1</label>
				<input type="text" name="additional1" id="<?=$prefix?>-additional1" value="<?=$address["additional_address_line1"]?>" />
			</li>
			<li>
				<label for="<?=$prefix?>-additional2">Adresszusatz 2</label>
				<input type="text" name="additional2" id="<?=$prefix?>-additional2" value="<?=$address["additional_address_line2"]?>" />
			</li>
			<li id="<?=$prefix?>-submit">
				<input type="submit" value="Senden" />
			</li>
		</ul>
	</form>
	<?php
}
?>