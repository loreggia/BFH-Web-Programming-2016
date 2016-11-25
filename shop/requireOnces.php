<?php
require_once "configuration.php";
$configuration = new Configuration();

require_once "utilities.php";

require_once "classes/Database.php";
$database = new Database($configuration);

require_once "classes/BaseStore.php";

require_once "classes/ConfigurationStore.php";
$configurationStore = new ConfigurationStore($database);

require_once "classes/CategoryStore.php";
$categoryStore = new CategoryStore($database);

require_once "classes/ImageStore.php";
$imageStore = new ImageStore($database);

require_once "classes/ArticleStore.php";
$articleStore = new ArticleStore($database, $categoryStore, $imageStore);

require_once "classes/CountryStore.php";
$countryStore = new CountryStore($database);

require_once "classes/AddressStore.php";
$addressStore = new AddressStore($database, $countryStore);

require_once "classes/OrdersStore.php";
$ordersStore = new OrdersStore($database);

require_once "classes/PaymentStore.php";
$paymentStore = new PaymentStore($database);

require_once "classes/UserStore.php";
$userStore = new UserStore($database, $addressStore);

require_once "translation.php";

require_once "classes/Cart.php";
$cart = new Cart($articleStore);

require_once "classes/Form.php";

session_start();
$rootLink = "/shop/";
