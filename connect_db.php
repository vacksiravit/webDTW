<?php
	include("connect.php");
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name};port={$DB_port}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select = $DB_con->query('SELECT * FROM '.$TB_name.'');// display on while loop
	$customer = $select->fetchAll();
	echo $json_response = json_encode($customer);
?>