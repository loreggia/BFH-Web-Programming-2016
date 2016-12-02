<?php

$navLinks = [];

$categoryTree = $categoryStore->getCategoryTree();

function echoNavigationItems($categoryTree, $depth, $cart)
{
    if ($depth == 0) {
        echo "<ul class='main-navigation'><li>" . createLink(getLangText("home"), "home") . "</li>";
		//Admin-Account
		if(isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"]){
			echo "<li class='nav-item nav-item-0 nav-basket'>" . createLink(getLangText("admin"), "admin") . "</li>";
		}
		
		//Basket
		echo "<li class='nav-item nav-item-0 nav-basket'>" . createLink(getLangText("basket"), "basket");
		echo "<ul class='nav-category-1'><li class='nav-item nav-item-1'>";
		echo $cart->generateMiniCart();
		
		echo "</li></li></ul>";
    } else {
        echo "<ul class='nav-category-$depth'>";
    }

    if ($categoryTree && count($categoryTree) != 0) {
        foreach ($categoryTree as $category) {
            echo "<li class='nav-item nav-item-$depth'>";
            $linkText = getRowText($category, "name");

            if ($depth > 0 && $category["children"] && count($category["children"]) > 0) {
                $linkText .= " &rArr;";
            }

            echo createLink($linkText, "category", ["categoryUrl" => $category["url"]]);
            echoNavigationItems($category["children"], $depth + 1, $cart);
            echo "</li>";
        }
    }
	
    echo "</ul>";
}

?>

    <section class="navigation">
        <?php echoNavigationItems($categoryTree, 0, $cart); ?>
    </section>

<?php
// todo
$breadCrumbs = "Breadcrumbs > asdf";

if (!empty($breadCrumbs)) {
    ?>
    <section class="breadcrumbs">
        <?= $breadCrumbs ?>
		<?php 
			echo "<br />Session-Variablen: ";
			print_r($_SESSION);
		?>
    </section>
    <?php
}