<?php
$user = $_SESSION["user"];
$isMale = ($user['salutation'] == 'mr') ? "selected" : "";
$isFemale = ($user['salutation'] == 'ms') ? "selected" : "";
$isNewsletter = ($user['newsletter'] == 1) ? "checked" : "";
?>

<form method="post" action="./process/account/personal.php">
	<input type="hidden" name="change" value="user"/>
	<ul>
		<li>
			<label for="salutation">Anrede*</label>
			<select name="salutation" id="salutation">
				<option value="mr" <?=$isMale?>>Herr</option>
				<option value="ms" <?=$isFemale?>>Frau</option>
			</select>
		</li>
		<li>
			<label for="company">Firma</label>
			<input type="text" name="company" id="company" value="<?=$user["company"]?>" />
		</li>
		<li>
			<label for="department">Abteilung</label>
			<input type="text" name="department" id="department" value="<?=$user["department"]?>" />
		</li>
		<li id="user-name">
			<label for="name">Vorname*</label>
			<input type="text" name="name" id="name" value="<?=$user["firstname"]?>" />
			<mark>Bitte Vorname angeben</mark>
		</li>
		<li id="user-lastname">
			<label for="lastname">Nachname*</label>
			<input type="text" name="lastname" id="lastname" value="<?=$user["lastname"]?>" />
			<mark>Bitte Nachname angeben</mark>
		</li>
		<li id="user-password">
			<label for="password">Passwort*</label>
			<input type="password" name="password" id="password" value="" />
			<mark>Bitte Passwort angeben</mark>
		</li>
		<li id="user-submit">
			<input type="submit" value="Senden" />
		</li>
	</ul>
</form>
<form method="post" action="./process/account/personal.php">
	<input type="hidden" name="change" value="newsletter"/>
	<ul>
		<li id="news-news">
			<label>Newsletter abonnieren</label>
			<input type="checkbox" name="newsletter" id="newsletter" value="1" <?=$isNewsletter?> /><label for="newsletter">Ja, gerne</label>
		</li>
		<li id="news-submit">
			<input type="submit" value="Senden" />
		</li>
	</ul>
</form>
<form method="post" action="./process/account/personal.php">
	<input type="hidden" name="change" value="email"/>
	<ul>
		<li id="mail-email">
			<label for="email">E-Mail*</label>
			<input type="text" name="email" id="email" value="<?=$user["email"]?>" />
			<mark>Bitte E-Mail angeben</mark>
		</li>
		<li id="mail-password">
			<label for="password">Passwort*</label>
			<input type="password" name="password" id="password" value="" />
			<mark>Bitte Passwort angeben</mark>
		</li>
		<li id="mail-submit">
			<input type="submit" value="Senden" />
		</li>
	</ul>
</form>
<form method="post" action="./process/account/personal.php">
	<input type="hidden" name="change" value="password"/>
	<ul>
		<li id="pw-passwordOld">
			<label for="email">Altes Passwort*</label>
			<input type="password" name="password" id="password" value="" />
			<mark>Bitte altes Passwort angeben</mark>
		</li>
		<li id="pw-password">
			<label for="password">Neues Passwort*</label>
			<input type="password" name="password-new" id="password-new" value="" />
			<mark>Bitte Passwort angeben</mark>
		</li>
		<li id="pw-submit">
			<input type="submit" value="Senden" />
		</li>
	</ul>
</form>