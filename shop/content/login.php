<aside>login aside</aside>

<section>
	<h1><?= getLangText("old_user")?></h1>
	<form method="post" action="./process/login.php">
		<input type="hidden" name="loginUser" value="login"/>
		<ul>
			<li id="li-login-email">
				<label for="login-email"><?= getLangText("email")?></label>
				<input type="text" name="email" id="login-email" value="" />
				<mark><?= pleaseEnter("email")?></mark>
			</li>
			<li id="li-login-password">
				<label for="login-password"><?= getLangText("password")?></label>
				<input type="password" name="password" id="login-password" value="" />
				<mark><?= pleaseEnter("password")?></mark>
			</li>
			<li id="li-login-submit">
				<input type="submit" value="<?= getLangText("send")?>" />
			</li>
		</ul>
	</form>
	<p></p>
	<h1><?= getLangText("new_user")?></h1>
	<form method="post" action="./process/login.php">
		<input type="hidden" name="loginUser" value="create"/>
		<ul>
			<li>
				<label for="salutation"><?= getLangText("salutation")?>*</label>
				<select name="salutation" id="salutation">
					<option value="mr"><?= getLangText("mr")?></option>
					<option value="ms"><?= getLangText("ms")?></option>
				</select>
			</li>
			<li>
				<label for="company"><?= getLangText("company")?></label>
				<input type="text" name="company" id="company" value="" />
			</li>
			<li>
				<label for="department"><?= getLangText("department")?></label>
				<input type="text" name="department" id="department" value="" />
			</li>
			<li id="li-name">
				<label for="name"><?= getLangText("firstname")?>*</label>
				<input type="text" name="name" id="name" value="" />
				<mark><?= pleaseEnter("firstname")?></mark>
			</li>
			<li id="li-lastname">
				<label for="lastname"><?= getLangText("lastname")?>*</label>
				<input type="text" name="lastname" id="lastname" value="" />
				<mark><?= pleaseEnter("lastname")?></mark>
			</li>
			<li id="li-email">
				<label for="email"><?= getLangText("email")?>*</label>
				<input type="text" name="email" id="email" value="" />
				<mark><?= pleaseEnter("email")?></mark>
			</li>
			<li id="li-password">
				<label for="password"><?= getLangText("password")?>*</label>
				<input type="password" name="password" id="password" value="" />
				<mark><?= pleaseEnter("password")?></mark>
			</li>
			<li>
				<label><?= getLangText("newsletter1")?></label>
				<input type="checkbox" name="newsletter" id="newsletter" value="1" /><label for="newsletter"><?= getLangText("newsletter2")?></label>
			</li>
			<li id="li-submit">
				<input type="submit" value="<?= getLangText("send")?>" />
			</li>
		</ul>
	</form>
</section>