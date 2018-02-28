<?php
require_once('../database/Database.php');
require_once('../interface/iUtility.php');
class Utility extends Database implements iUtility {

	public function daily_utility($date)
	{
				
		$sql= "select i.item_code as cod, i.item_name as product,sum( s.qty) as cant,  
		i.item_price_purchase as purchase, s.price, (sum( s.qty) *  s.price) as price_sale,
		(sum( s.qty) *  i.item_price_purchase) as price_purchase
		from item i  
		inner join sales s on i.item_code=s.item_code
		where DATE(s.date_sold)= ?
		GROUP BY i.item_code ";
		
		
		
		return $this->getRows($sql, [$date]);
	}
	
	//end daily_sales
}//end class


$utility= new Utility();

/* End of file Sales.php */
/* Location: .//D/xampp/htdocs/regis/class/Sales.php */