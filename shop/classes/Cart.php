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
	
	public function setItem($item, $num) {
		$this->checkCart();
		if (!isset($_SESSION["cart"][$item])) $_SESSION["cart"][$item] = $num;
		$_SESSION["cart"][$item] = $num;
	}

	public function removeItem($item) {
		$this->checkCart();
		if (!isset($_SESSION["cart"][$item])) return;
		unset($_SESSION["cart"][$item]);
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
			
			//Link hier manuell, da es sonst zu Problemen kommt...
			$result .= beginLink(getRowText($currentArticle, "name"), "article", ["ordernumber" => $currentArticle["ordernumber"]]).getRowText($currentArticle, "name")."</a>".$currentArticle['price'].", $item, $subtotal<br />";
		}
	
		if($total != 0){
			$result .= "<br /><br />Total: $total";
		}
		else{
			$result .= getLangText("noArticlesCart");
		}
		return "$result</div>";
	}
	
	public function generateBasket(){
		$this->checkCart();
		$result = '
				<div id="basket">
				<div class="table-div">
				<div class="table-tr table-header">
					<div class="table-td table-article-row">Artikel</div>
					<div class="table-td">Anzahl</div>
					<div class="table-td">Stückpreis</div>
					<div class="table-td">Summe</div>
					<div class="table-td">&nbsp;</div>
				</div>
				';
		$total = 0;
		foreach($_SESSION["cart"] as $key => $item){
			$currentArticle = $this->articleStore->getArticle($key);
			$subtotal = $currentArticle['price']*$item;
			$total += $subtotal;
			
			$fors = "";
			for($i=1; $i <= 100; $i++){
				$fors .= '<option value="'.$i.'"';
				if($i == $item){$fors .= ' selected="selected"';}
				$fors .= '>'.$i.'</option>';
			}
			
			$result .= '	<div class="table-tr">
			<div class="table-td table-article-row">';
			
			if ($currentArticle["image"]) {
				$result .= beginLink(getRowText($currentArticle, "name"), "article", ["ordernumber" => $currentArticle["ordernumber"]]).'<img src="' . $article["image"]["url"] . '" alt="' . $article["image"]["alt"] . '" /></a>';
			}			
			
			$result .= beginLink(getRowText($currentArticle, "name"), "article", ["ordernumber" => $currentArticle["ordernumber"]]).getRowText($currentArticle, "name").'</a>
				<p class="content--sku content">Artikel-Nr.: '.$currentArticle["ordernumber"].'</p>
			</div>
			<div class="table-td">
				<form action="process/changeQuantity.php" method="post" id="changeQuantity">
					<input type="hidden" name="js" value="no" />
					<select name="quantity">'.$fors.'</select>
					<input name="article" value="'.$currentArticle["ordernumber"].'" type="hidden">
					<button type="submit" title="Ändern">Ändern</button>
				</form>
			</div>
			<div class="table-td">'.$currentArticle['price'].'</div>
			<div class="table-td">'.$subtotal.'</div>
			<div class="table-td">
				<form action="process/removeArticle.php" method="post" id="removeArticle">
					<input type="hidden" name="js" value="no" />
					<button type="submit" title="Löschen">X</button>
					<input name="article" value="'.$currentArticle["ordernumber"].'" type="hidden">
				</form>
			</div>
		</div>';
		}
	
		if($total != 0){
			$result .= "</div><br /><br />Total: $total</div>";
		}
		else{
			$result = getLangText("noArticlesCart");
		}
		return "$result";
	}
}