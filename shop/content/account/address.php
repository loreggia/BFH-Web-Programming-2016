<?php
$countries = $countryStore->getCountries();
$userId = $userStore->getUserId($_SESSION["user"]["email"]);
$userAdress = $addressStore->getUserAddresses($userId);
foreach($userAdress as $address){
	$prefix = "shipping";
	if($address["address_mode"] == 0){$prefix = "billing";}
	$isMale = ($address['salutation'] == 'mr') ? "selected" : "";
	$isFemale = ($address['salutation'] == 'ms') ? "selected" : "";
	if($address["address_mode"] == 0){echo "<h3>".getLangText("ac_address_bill")."</h3>";}
	else{echo "<h3>".getLangText("ac_address_ship")."</h3>";}
	?>

	<form method="post" action="./process/account/address.php">
		<input type="hidden" name="address_mode" value="<?=$address["address_mode"]?>"/>
		<ul>
			<li>
				<label for="<?=$prefix?>-salutation"><?= getLangText("salutation")?>*</label>
				<select name="salutation" id="<?=$prefix?>-salutation">
					<option value="mr" <?=$isMale?>><?= getLangText("mr")?></option>
					<option value="ms" <?=$isFemale?>><?= getLangText("ms")?></option>
				</select>
			</li>
			<li>
				<label for="<?=$prefix?>-company"><?= getLangText("company")?></label>
				<input type="text" name="company" id="<?=$prefix?>-company" value="<?=$address["company"]?>" />
			</li>
			<li>
				<label for="<?=$prefix?>-department"><?= getLangText("department")?></label>
				<input type="text" name="department" id="<?=$prefix?>-department" value="<?=$address["department"]?>" />
			</li>
			<li id="<?=$prefix?>-name">
				<label for="<?=$prefix?>-name"><?= getLangText("firstname")?>*</label>
				<input type="text" name="name" id="<?=$prefix?>-name" value="<?=$address["firstname"]?>" />
				<mark><?= pleaseEnter("firstname")?></mark>
			</li>
			<li id="<?=$prefix?>-lastname">
				<label for="<?=$prefix?>-lastname"><?= getLangText("lastname")?>*</label>
				<input type="text" name="lastname" id="<?=$prefix?>-lastname" value="<?=$address["lastname"]?>" />
				<mark><?= pleaseEnter("lastname")?></mark>
			</li>
			<li id="<?=$prefix?>-street">
				<label for="<?=$prefix?>-street"><?= getLangText("street")?>*</label>
				<input type="text" name="street" id="<?=$prefix?>-street" value="<?=$address["street"]?>" />
				<mark><?= pleaseEnter("street")?></mark>
			</li>
			<li id="<?=$prefix?>-zip">
				<label for="<?=$prefix?>-zip"><?= getLangText("zip")?>*</label>
				<input type="text" name="zip" id="<?=$prefix?>-zip" value="<?=$address["zipcode"]?>" />
				<mark><?= pleaseEnter("zip")?></mark>
			</li>
			<li id="<?=$prefix?>-city">
				<label for="<?=$prefix?>-city"><?= getLangText("city")?>*</label>
				<input type="text" name="city" id="<?=$prefix?>-city" value="<?=$address["city"]?>" />
				<mark><?= pleaseEnter("city")?></mark>
			</li>
			<li id="<?=$prefix?>-country">
				<label for="<?=$prefix?>-country"><?= getLangText("country")?>*</label>
				<select name="country" id="<?=$prefix?>-country">
				<?php
					foreach($countries as $country){
						$selected = ($address['country_id'] == $country['country_id']) ? "selected" : "";
						echo('<option value="'.$country['country_id'].'" '.$selected.'>'.getRowText($country, "name").'</option>');
					}
				?>
				</select>
			</li>
			<li>
				<label for="<?=$prefix?>-additional1"><?= getLangText("additional1")?></label>
				<input type="text" name="additional1" id="<?=$prefix?>-additional1" value="<?=$address["additional_address_line1"]?>" />
			</li>
			<li>
				<label for="<?=$prefix?>-additional2"><?= getLangText("additional2")?></label>
				<input type="text" name="additional2" id="<?=$prefix?>-additional2" value="<?=$address["additional_address_line2"]?>" />
			</li>
			<li id="<?=$prefix?>-submit">
				<input type="submit" value="<?= getLangText("send")?>" />
			</li>
		</ul>
	</form>
	<?php
}
?>