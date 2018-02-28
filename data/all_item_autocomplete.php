<?php
require_once('../class/Item.php');
$db = new Database();

if(!empty($_POST["keyword"])) {
$query ="SELECT *	FROM item where item_name like '" . $_POST["keyword"] . "%' ORDER BY item_name ASC LIMIT 0,6";
$items = $db->getRows($query);  
if(!empty($items)) {
?>
<ul id="country-list">
<?php
foreach($items as $product) {
?>
<li onClick="selectCountry('<?php echo $product["item_id"]; ?>','<?php echo $product["item_name"]; ?>' );"><?php echo $product["item_name"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>











<?php 
$item->Disconnect();
 ?>