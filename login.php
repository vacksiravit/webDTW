<?php 
	if(isset($_POST['login'])) 
	{
		$errMsg = '';
		// Get data from FORM
		$username = $_POST['username'];
		$password = $_POST['password'];
		if($errMsg == '') 
		{
			try 
			{
				if($username != $WEB_user)
				{
					$errMsg = "Username Or Password not valid";
				}
				else 
				{
					if($username == $WEB_user && $password == $WEB_pass) 
					{
						$_SESSION['time'] = time();
						$_SESSION['pass'] = md5($WEB_pass);
						header('Location: home.php');
						exit;
					}
					else
						$errMsg = 'Username Or Password not valid';
				}
			}
			catch(PDOException $e) 
			{
				$errMsg = $e->getMessage();
			}
		}
	}
?>