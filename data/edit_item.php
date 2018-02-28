<?php 
require_once('../class/Item.php');
if(isset($_POST['item_id'])){
	$item_id = $_POST['item_id'];
	$iName = $_POST['iName'];
	$iPrice = $_POST['iPrice'];
	$iPricePurchase = $_POST['iPricePurchase'];
	$iType = $_POST['iType'];
	//$code = $_POST['code'];
	$brand = $_POST['brand'];
	$grams = $_POST['grams'];
	$saveEdit = $item->edit_item($item_id, $iName, $iPrice,$iPricePurchase, $iType, $brand, $grams);
	$return['valid'] = false;
	if($saveEdit){
		$return['valid'] = true;
		$return['msg'] = "Editado correctamente!";
	}
	echo json_encode($return);
}//end isset
$item->Disconnect();
