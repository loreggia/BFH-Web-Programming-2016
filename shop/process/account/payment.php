<?php
require_once "../../requireOnces.php";
$paymentId = $_POST['payment'];

$res = $paymentStore->saveUserPayment($paymentId, $_SESSION["user"]["email"]);
if($res) $_SESSION["user"]["payment_id"] = $paymentId;

header("Location: " . $_SERVER['HTTP_REFERER']);
die();