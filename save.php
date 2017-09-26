<?php 
	include('connect.php');
	
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name};port={$DB_port}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	try{
		$sql = "UPDATE ".$TB_name." SET 
				value = :value 
				WHERE username LIKE :username;";
		$stmt = $DB_con->prepare($sql);
		
		$stmt->bindParam(':value',$_POST['value']);
		$stmt->bindParam(':username',$_POST['username']);
		if($_SESSION['pass'] == md5($WEB_edit_pass))
		{
			$stmt->execute();
			header('Location: home.php');
		}
		else
		{
			echo "<script> 	
					alert('Sorry you account can not edit data');
					window.location.href='./home.php';		
				</script>";
		}
	}
	catch(PDOException $e){
		echo $sql . "<br>" . $e->getMessage();
    }
	
?>
