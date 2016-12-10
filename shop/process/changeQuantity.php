<?php
require_once "../requireOnces.php";
if (isset ( $_POST ["quantity"] ) && isset ( $_POST ["article"] )) {
	$cart->setItem ( $_POST ["article"], $_POST ["quantity"] );
}

if ($_POST ["js"] == "yes") {
	echo $cart->generateMiniCart () . "XXXXXX" . $cart->generateBasket ();
} else {
	header ( 'Location: ' . $_SERVER ['HTTP_REFERER'] );
	die ();
}