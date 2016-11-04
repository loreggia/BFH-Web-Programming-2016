<aside>login aside</aside>

<section>
	<h1>Login bestehender User</h1>
	<form method="post" action="./process/login.php">
		<input type="hidden" name="loginUser" value="login"/>
		<ul>
			<li>
				<label for="login-email">E-Mail</label>
				<input type="text" name="email" id="login-email" value="" />
			</li>
			<li>
				<label for="login-password">Passwort</label>
				<input type="password" name="password" id="login-password" value="" />
			</li>
			<li>
				<input type="submit" value="Senden" />
			</li>
		</ul>
	</form>
	<p></p>
	<h1>Neuer Benutzer</h1>
	<form method="post" action="./process/login.php">
		<input type="hidden" name="loginUser" value="create"/>
		<ul>
			<li>
				<label for="salutation">Anrede*</label>
				<select name="salutation" id="salutation">
					<option value="mr">Herr</option>
					<option value="ms">Frau</option>
				</select>
			</li>
			<li>
				<label for="company">Firma</label>
				<input type="text" name="company" id="company" value="" />
			</li>
			<li>
				<label for="department">Abteilung</label>
				<input type="text" name="department" id="department" value="" />
			</li>
			<li>
				<label for="name">Vorname*</label>
				<input type="text" name="name" id="name" value="" />
			</li>
			<li>
				<label for="lastname">Nachname*</label>
				<input type="text" name="lastname" id="lastname" value="" />
			</li>
			<li>
				<label for="email">E-Mail*</label>
				<input type="text" name="email" id="email" value="" />
			</li>
			<li>
				<label for="password">Passwort*</label>
				<input type="password" name="password" id="password" value="" />
			</li>
			<li>
				<label>Newsletter abonnieren</label>
				<input type="checkbox" name="newsletter" id="newsletter" value="1" /><label for="newsletter">Ja, gerne</label>
			</li>
			<li>
				<input type="submit" value="Senden" />
			</li>
		</ul>
	</form>
</section>
