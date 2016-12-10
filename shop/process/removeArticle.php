<?php
require_once "../requireOnces.php";
if (isset ( $_POST ["article"] )) {
	$cart->removeItem ( $_POST ["article"] );
}

if ($_POST ["js"] == "yes") {
	echo $cart->generateMiniCart () . "XXXXXX" . $cart->generateBasket ();
} else {
	header ( 'Location: ' . $_SERVER ['HTTP_REFERER'] );
	die ();
}
