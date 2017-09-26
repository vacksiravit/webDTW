<!DOCTYPE html>
<?php 
	include('connect.php');
	require_once('header.php');
	require_once('login.php');
	
	@ini_set('display_errors', '0');
  
	$limit = $WEB_timeout*60;
	if($_SESSION['pass'] == null)
	{
		header('Location:index.php');
	}
	elseif (time() - $_SESSION['time'] > $limit)
	{
		unset($_SESSION['pass'],$_SESSION['time']);
		header('Location:index.php');
	}
?>
<html ng-app="dtw_getwifi">
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8  col-md-offset-2">
				<div ng-controller="ShowRoom">
				
				
				<nav class="headerbox" role="navigation">
					<div class="headerbox-left">
					<div class="Logout" style="text-overflow:clip;">
						<a href="logout.php">Duang Tawan Hotel WIFI Management.&nbsp;&nbsp; >> Logout <<</a>
					</div>
					</div>
					<div class="headerbox-right">
					<span style="float:left; padding-top:20px;" class="glyphicon glyphicon-search"></span>
					<form class="navbar-form" role="search">
						<!--<div class="form-group">-->
							<input ng-model="sData"  class="form-control"  placeholder="ค้นหา"/> 
						<!--</div>-->
					</form>
					</div>
				</nav>
				
				<table class="table table-striped" >
				<thead>
					<tr>
						<th style="width:40%;text-align:left">Room Number</th>
						<th >Password</th>
						<th  style="width:10%;text-align:center">จัดการ</th>
					</tr>
				</thead>
				<tbody>
					<tr ng-repeat="c in showData| filter : sData">
						<td >{{c.username}}</td>
						<td >{{c.value}}</td>
						<td ng-controller="ClickEdit">
							<button id="myBtn" class='btn btn-info edit' ng-click="onClicked()" >
								<span class="glyphicon glyphicon-cog"></span>
							</button>
						</td>
				</table>
				</div>
			</div>
		</div>
	</div>
	
<!-- Modal Zone -->
	<div class="modal fade" id="formEditCustomer">
		<div class="modal-dialog">
			<form action="save.php" method="post" class="form-horizontal">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" style="font-size:25px; color:#333">แก้ไขข้อมูล</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- Hidden Zone -->
						<input type="hidden" name="id" id="id" value=""/>
							<div class="form-group-user">
								<label for="firstname" >Username</label>
								<input type="text" id="uname" name="username" readonly value="#uname" class="form-control"/>
							</div>
							<div class="form-group-user">
								<label for="lastname">Password</label>
									<input type="text" id="pword" name="value" class="form-control" onkeypress='return chThai()' oninvalid="this.setCustomValidity('กรุณากรอกรหัสผ่าน')" required/>
							</div>
					</div><!--/.modal-body-->
					<div class="modal-footer">
						<input type="submit" class="btn btn-primary" value="แก้ไข"/>
					</div><!--/.modal-footer-->
				</div><!-- /.modal-content -->
			</form>
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
		
</body>
</html>