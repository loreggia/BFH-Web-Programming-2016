<!DOCTYPE html>
<?php include 'navigation.php'; ?>
<html>
<head>
    <title>Tester</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" media="screen" href="resources/css.css"/>
</head>
<body>
<div class="wrapper">
    <header>
        <div id="logo">
            <a href="/shop" class="logo-link">
                <img src="resources/images/logo.png" />
            </a>
        </div>

        <div id="user-info">
            <a href="/shop/login.php" class="login">Login</a>
        </div>

        <div id="search-panel">
            <form name="search-form" action="/shop/search.php" method="get">
                <input type="text" class="searchbox" name="q" placeholder="Suche" />
            </form>
        </div>
    </header>
    <nav class="main-navigation">
        <?php echoNavigationItems($categoryTree, 0); ?>
    </nav>