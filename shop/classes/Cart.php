<?php
class Cart {
	private $items = [];

	public function addItem($item, $num) {
		if (!isset($this->items[$item])) $this->items[$item] = 0;
		$this->items[$item] += $num;
	}

	public function removeItem($item, $num) {
		if (!isset($this->items[$item])) return;
		
		$this->items[$item] -= $num;
		if ($this->items[$item] <= 0) unset($this->items[$item]);
	}
	
	public function getItems() {
		return $this->items;
	}

	public function isEmpty() {
		return count($this->items) == 0;
	}
}