<?php
	date_default_timezone_set('Asia/Bangkok');
	session_start();
	$config_path = "/etc/askme.conf";
	$file = fopen($config_path, "r") or die("Unable to open file!");
	$input =  fread($file,filesize($config_path));

	$token = strtok($input, "\n\t");
	$line = 0;
	
	while ($token != false)
	{
		if(substr($token,0,1)!='#')
		{
			$keep_data[$line] = $token;
			$line++;
		}
		$token = strtok("\n\t");
	}
	fclose($file);
	
	$max_line = $line;
	$line = 0;$member=0;
	while($line<$max_line)
	{
		$token = strtok($keep_data[$line],"= ");
		$data[$line][0] = $token;
		$token = strtok("= ");
		$data[$line][1] = $token;
		$line++;
	}

	for($x =0;$x<$line;$x++) {
		if($data[$x][0] == "DB_SERVER"){
			$$DB_host = $data[$x][1];
			// echo $dbserver."\n";
		}
		if($data[$x][0] == "DB_USER"){
			$DB_user = $data[$x][1];
			// echo $dbuser."\n";
		}
		if($data[$x][0] == "DB_PASS"){
			$DB_pass = $data[$x][1];
			// echo $dbpass."\n";
		}
		if($data[$x][0] == "DB_NAME"){
			$DB_name = $data[$x][1];
			// echo $dbname."\n";
		}
		if($data[$x][0] == "TB_NAME"){
			$TB_name = $data[$x][1];
			// echo $tbname."\n";
		}
		if($data[$x][0] == "WEB_USER"){
			$WEB_user = $data[$x][1];
			// echo $tbname."\n";
		}
		if($data[$x][0] == "WEB_PASS"){
			$WEB_pass = $data[$x][1];
			// echo $tbname."\n";
		}
		if($data[$x][0] == "REFRESH"){
			$REFRESH = $data[$x][1];
			// echo $tbname."\n";
		}
		if($data[$x][0] == "WEB_TIMEOUT"){
			$WEB_timeout = $data[$x][1];
			// echo $tbname."\n";
		}
		if($data[$x][0] == "DB_PORT"){
			$DB_port = $data[$x][1];
		}
	}
/*

		try
		{
			// $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name};port=3308",$DB_user,$DB_pass);
			$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name};port=3306",$DB_user,$DB_pass);
			$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$select = $DB_con->query('SELECT * FROM radcheck');// display on while loop
			$customer = $select->fetchAll();
			
			//$select = closeCursor();
			//$DB_con = null;
			//print_r($customer);
		} catch (Exception $e) {
			echo "Can not connect to database";
			throw new Exception($e);
		}
*/
	?>