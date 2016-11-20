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
			<label for="salutation"><?= getLangText("salutation")?>*</label>
			<select name="salutation" id="salutation">
				<option value="mr" <?=$isMale?>><?= getLangText("mr")?></option>
				<option value="ms" <?=$isFemale?>><?= getLangText("ms")?></option>
			</select>
		</li>
		<li>
			<label for="company"><?= getLangText("company")?></label>
			<input type="text" name="company" id="company" value="<?=$user["company"]?>" />
		</li>
		<li>
			<label for="department"><?= getLangText("department")?></label>
			<input type="text" name="department" id="department" value="<?=$user["department"]?>" />
		</li>
		<li id="user-name">
			<label for="name"><?= getLangText("firstname")?>*</label>
			<input type="text" name="name" id="name" value="<?=$user["firstname"]?>" />
			<mark><?= pleaseEnter("firstname")?></mark>
		</li>
		<li id="user-lastname">
			<label for="lastname"><?= getLangText("lastname")?>*</label>
			<input type="text" name="lastname" id="lastname" value="<?=$user["lastname"]?>" />
			<mark><?= pleaseEnter("lastname")?></mark>
		</li>
		<li id="user-password">
			<label for="password"><?= getLangText("password")?>*</label>
			<input type="password" name="password" id="password" value="" />
			<mark><?= pleaseEnter("password")?></mark>
		</li>
		<li id="user-submit">
			<input type="submit" value="<?= getLangText("send")?>" />
		</li>
	</ul>
</form>
<form method="post" action="./process/account/personal.php">
	<input type="hidden" name="change" value="newsletter"/>
	<ul>
		<li id="news-news">
			<label><?= getLangText("newsletter1")?></label>
			<input type="checkbox" name="newsletter" id="newsletter" value="1" <?=$isNewsletter?> /><label for="newsletter"><?= getLangText("newsletter2")?></label>
		</li>
		<li id="news-submit">
			<input type="submit" value="<?= getLangText("send")?>" />
		</li>
	</ul>
</form>
<form method="post" action="./process/account/personal.php">
	<input type="hidden" name="change" value="email"/>
	<ul>
		<li id="mail-email">
			<label for="email"><?= getLangText("email")?>*</label>
			<input type="text" name="email" id="email" value="<?=$user["email"]?>" />
			<mark><?= pleaseEnter("email")?></mark>
		</li>
		<li id="mail-password">
			<label for="password"><?= getLangText("password")?>*</label>
			<input type="password" name="password" id="password" value="" />
			<mark><?= pleaseEnter("password")?></mark>
		</li>
		<li id="mail-submit">
			<input type="submit" value="<?= getLangText("send")?>" />
		</li>
	</ul>
</form>
<form method="post" action="./process/account/personal.php">
	<input type="hidden" name="change" value="password"/>
	<ul>
		<li id="pw-passwordOld">
			<label for="email"><?= getLangText("password_old")?>*</label>
			<input type="password" name="password" id="password" value="" />
			<mark><?= pleaseEnter("password")?></mark>
		</li>
		<li id="pw-password">
			<label for="password"><?= getLangText("password_new")?>*</label>
			<input type="password" name="password-new" id="password-new" value="" />
			<mark><?= pleaseEnter("password")?></mark>
		</li>
		<li id="pw-submit">
			<input type="submit" value="<?= getLangText("send")?>" />
		</li>
	</ul>
</form>