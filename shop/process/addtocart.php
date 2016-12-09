<?php
require_once "../requireOnces.php";
// TODO options, etc
if (isset($_POST["count"]) && isset($_POST["ordernumber"])) {
    $cart->addItem($_POST["ordernumber"], $_POST["count"]);
}

echo $cart->generateMiniCart();
