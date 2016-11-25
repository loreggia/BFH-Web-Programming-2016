<?php
class Cart {
	private $items = [];

	private $articleStore;

    function __construct(ArticleStore $articleStore)
    {
        $this->articleStore = $articleStore;
		$this->checkCart();
    }
	
	public function checkCart(){
		if (!isset($_SESSION["cart"])) $_SESSION["cart"] = array();
	}
	
	public function addItem($item, $num) {
		$this->checkCart();
		if (!isset($_SESSION["cart"][$item])) $_SESSION["cart"][$item] = 0;
		$_SESSION["cart"][$item] += $num;
	}

	public function removeItem($item, $num) {
		$this->checkCart();
		if (!isset($_SESSION["cart"][$item])) return;
		
		$_SESSION["cart"][$item] -= $num;
		if ($_SESSION["cart"][$item] <= 0) unset($_SESSION["cart"][$item]);
	}
	
	public function getItems() {
		$this->checkCart();
		return $_SESSION["cart"];
	}

	public function isEmpty() {
		$this->checkCart();
		return count($_SESSION["cart"]) == 0;
	}
	
	public function generateMiniCart(){
		$this->checkCart();
		$result = "<div class='nav-basket-content'>";
		$total = 0;
		foreach($_SESSION["cart"] as $key => $item){
			$currentArticle = $this->articleStore->getArticle($key);
			$subtotal = $currentArticle['price']*$item;
			$total += $subtotal;
			$result .= beginLink("article", ["ordernumber" => $currentArticle["ordernumber"]]).getRowText($currentArticle, "name")."</a>".$currentArticle['price'].", $item, $subtotal<br />";
		}
		
		if($total != 0){
			$result .= "<br /><br />Total: $total";
		}
		else{
			$result .= getLangText("noArticlesCart");
		}
		return "$result</div>";
	}
}