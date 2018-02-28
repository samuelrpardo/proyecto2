<?php 
interface iItem{
	public function all_items();
	public function get_item($item_id);
	public function add_item($iName, $iPrice,$iPricePurchase, $type_id, $brand, $grams);
	public function edit_item($item_id, $iName, $iPrice, $iPricePurchase, $type_id,$brand, $grams);
}//end iItem