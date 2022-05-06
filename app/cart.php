<?php

namespace App;

class cart{
	public $items = null;
	public $totalQty = 0;
	public $totalPrice = 0;

	public function __construct($oldCart){
		if ($oldCart) {
			# code...
			$this->items = $oldCart->items;
			$this->totalQty = $oldCart->totalQty;
			$this->totalPrice = $oldCart->totalPrice; 
		}
	}

	public function add($item,$id){
		$price = 0;
       if($item->promotion_price==0){
              $price = $item->price;
       }else{
              $price = $item->promotion_price;
       }
		$giohang = ['qty'=>0,'price'=>$item->price,'item'=>$item];
		if ($this->items) {
			# code...
			if (array_key_exists($id, $this->items)) {
				# code...
				$giohang = $this->items[$id];
			} 
		}
		$giohang['qty']++;
		$giohang['price'] = $price*$giohang['qty'];
		$this->items[$id] = $giohang;
		$this->totalQty++;
		$this->totalPrice += $price;
	}
	public function reduceByOne($id){
		$this->items[$id]['qty']--;
		$this->items[$id]['price'] -= $this->$items[$id]['item']['price'];
		$this->totalQty--;
		$this->totalPrice -=$this->$items[$id]['item']['price'];
		if ($this->items[$id]['qty']<=0) {
			# code...
			unset($this->items[$id]);
		}
	}
	public function removeItem($id){
		$this->totalQty -= $this->items[$id]['qty'];
		$this->totalPrice -= $this->items[$id]['price'];
		unset($this->items[$id]);
	}

}
?>