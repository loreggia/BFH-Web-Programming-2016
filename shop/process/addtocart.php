<?php
require_once "../requireOnces.php";
if (isset ( $_POST ["count"] ) && isset ( $_POST ["article"] )) {
	$cart->addItem ( $_POST ["article"], $_POST ["count"] );
}

if ($_POST ["js"] == "yes") {
	echo $cart->generateMiniCart ();
} else {
	header ( 'Location: ' . $_SERVER ['HTTP_REFERER'] );
	die ();
}


