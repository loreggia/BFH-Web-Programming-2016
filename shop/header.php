<!DOCTYPE html>
<?php include 'navigation.php'; ?>
<html>
	<head>
		<title>Tester</title>
		<link rel="stylesheet" type="text/css" media="screen" href="css.css" />
	</head>
	<body>
		<div class="wrapper">
			<header>
				<a href="/shop" class="logo">Logo</a>
				<input type="text" class="searchbox"></input>
				<a href="/shop/login.php" class="login">Login</a>
			</header>
			<nav>
				<ul>
				<?php
					foreach($navLinks as $navigation){
						echo "<li><a href='$navigation[link]'>$navigation[name]</a></li>";
					}
				
				?>
				</ul>
			</nav>