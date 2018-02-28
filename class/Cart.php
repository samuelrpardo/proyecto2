<?php
require_once('../database/Database.php');
require_once('../interface/iCart.php');
class Cart extends Database implements iCart {

	public function add_toCart($item_id, $qty, $stock_id, $user_id, $uniqid)
	{
		$sql = "INSERT INTO cart(item_id, cart_qty, cart_stock_id, user_id, cart_uniqid)
				VALUES(?,?,?,?,?)";
		return $this->insertRow($sql, [$item_id, $qty, $stock_id, $user_id, $uniqid]);
	}//end add_toCart

	public function all_cartDatas($user_id)
	{
		$sql = "SELECT *
				FROM cart c
				INNER JOIN item i 
				ON c.item_id = i.item_id
				WHERE user_id = ? 
				ORDER BY cart_id ASC";
		return $this->getRows($sql, [$user_id]);
	}//end all_cartDatas

	public function delCart($cart_id)
	{
		$sql = "DELETE FROM cart
				WHERE cart_id = ?";
		return $this->deleteRow($sql, [$cart_id]);
	}//end delCart

	public function dellAllCart()
	{
		$sql = "DELETE FROM cart";
		return $this->deleteRow($sql);
	}//end dellAllCart

	public function allCart()
	{
		$sql = "SELECT *
				FROM cart c 
				INNER JOIN item i 
				ON c.item_id = i.item_id
				INNER JOIN stock s 
				ON s.item_id = i.item_id
				INNER JOIN item_type it 
				ON it.item_type_id = i.item_type_id
		";
		var_dump($sql); exit();
		return $this->getRows($sql);
	}//end allCart
	
	public function codeTransaction()
	{
		$maxcode = "select max(s.code_transaction) as code from sales s";
		$maxcode=$this->getRows($maxcode)[0];
		if($maxcode['code']!=""){
			$codebd=(int)$maxcode['code'];
			$codebd=$codebd+1;
		}else{
			$codebd=(int)$maxcode['code'];
		}
		$code=$maxcode['code']==""?str_pad(1, 8, "0", STR_PAD_LEFT):str_pad($codebd, 8, "0", STR_PAD_LEFT);		
	
		return $code;
	}
}//end class Cart


$cart = new Cart();

/* End of file Cart.php */
/* Location: .//D/xampp/htdocs/regis/class/Cart.php */