<?php
require_once('../database/Database.php');
require_once('../interface/iSales.php');
class Sales extends Database implements iSales {
	public function new_sales($code,$generic,$brand,$gram,$type,$qty,$price)
	{
		$sql = "INSERT INTO sales(item_code,generic_name,brand,gram,type,qty,price)
				VALUES(?,?,?,?,?,?,?);";
		
		return $this->insertRow($sql, [$code,$generic,$brand,$gram,$type,$qty,$price]);
	}//end new_sales

	public function daily_sales($date)
	{
		$sql = "SELECT *
				FROM sales
				WHERE DATE(`date_sold`) = ? order by 1 desc";
		
		return $this->getRows($sql, [$date]);
	}
	
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
$sales = new Sales();

/* End of file Sales.php */
/* Location: .//D/xampp/htdocs/regis/class/Sales.php */