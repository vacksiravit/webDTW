<?php
	require_once('connect.php');
	require_once('header.php');
	require_once('login.php');
	@ini_set('display_errors', '0');
?>

<!DOCTYPE html>
<html>
<head>  
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<link rel="icon" type="image/png" href="logo.png" />
	<title>DuangTawan | Wifi Managment</title>
</head>
<body>
	<div class = "container">
		<div class="wrapper">
			<form action="" method="post" class="form-signin">
				<h3 class="form-signin-heading">Duangtawan Hotel<br>Wifi Managment</h3>
				<hr class="colorgraph"><br>
					<?php
						if(isset($errMsg)){
							echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
						}
					?>
					<br>
					<div style="margin: 15px">
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon" style="width: 50px;"><i class="fa fa-user"></i></span>
							<input type="text" name="username" value="<?php if(isset($_POST['username'])) echo $_POST['username'] ?>" autocomplete="off" class="form-control" placeholder="Username" required/>
						</div>
					<div style="margin-bottom: 25px" class="input-group">
						<span class="input-group-addon" style="width: 50px;"><i class="fa fa-key"></i></span>
						<input type="password" name="password" autocomplete="off" class="form-control" placeholder="Password" required/>
					</div>
					<input type="submit" name='login' value="Login" class='btn btn-lg btn-primary btn-block submit'/>
					</div>
				<div class="login-powerby">Development by AskMe Solutions and Consultants</div>
				</hr>
			</form>
		</div>
	</div>
</body>
</html>