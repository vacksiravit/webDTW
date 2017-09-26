<?php
	/*
	// $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name};port=3308",$DB_user,$DB_pass);
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name};port={$DB_port}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select = $DB_con->query('SELECT * FROM '.$TB_name.'');// display on while loop
	$customer = $select->fetchAll();
	//json_encode($customer);
	//$select = closeCursor();
	//$DB_con = null;
	//print_r($customer);
	//return json_encode($customer);
	*/

function phpGetData()
{
	// $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name};port=3308",$DB_user,$DB_pass);
	$DB_con = new PDO("mysql:host={$GLOBALS["DB_host"]};dbname={$GLOBALS["DB_name"]};port={$GLOBALS["DB_port"]}",$GLOBALS["DB_user"],$GLOBALS["DB_pass"]);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select = $DB_con->query('SELECT * FROM '.$GLOBALS["TB_name"].'');// display on while loop
	$customer = $select->fetchAll();
	//json_encode($customer);
	//$select = closeCursor();
	//$DB_con = null;
	//print_r($customer);
	//return json_encode($customer);

	return $customer;
}
?>