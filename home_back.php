<?php
	require_once('connect.php');
	require_once('header.php');
	require_once('login.php');
	require_once('connect_db.php');
	
	@ini_set('display_errors', '0');
  
	$limit = $WEB_timeout*600;
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

<html>
	<body onload="SplitData()">
	
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<br>
				<h1>แก้ไขข้อมูลห้องพัก <a href="logout.php" style="float: right;" class="btn btn-danger">Logout</a></h1>
				<br>			
			</div>
		</div><!-- /.row -->

		<div class="row">
			<div class="col-md-8 offset-md-2 vm">
				<table class="table datatable" id="show_data">
					<thead>
						<tr>
							<th width="40%">เลขที่ห้องพัก</th>
							<th width="40%">รหัสผ่าน</th>
							<th width="20%">จัดการข้อมูล</th>
						</tr>
					</thead>
					<tbody id="ShowTable">
					<?php
					
						//$customer = json_decode(phpGetData(),true);
						$customer = phpGetData();
						//print_r($customer);
						
						foreach ($customer as $c) 
						{       
							echo "<tr>
									<td style='vertical-align: middle;'>".$c['username']."</td>
										<td style='vertical-align: middle;'>".$c['value']."</td>
										<td style='color: white;vertical-align: middle;text-align: center'>
											<a class='btn btn-info edit'    
												data-id='".$c['id']."' 
												data-username='".$c['username']."'  
												data-value='".$c['value']."'>
												<i class='fa fa-cog'></i>
											</a>
									</td>
								</tr>";
								
						}
					
					?>
					</tbody>
					<div id="Test"></div>
					<tfoot>
						<tr>
							<th width="40%">เลขที่ห้องพัก</th>
							<th width="40%">รหัสผ่าน</th>
							<th width="20%" >จัดการข้อมูล</th>
						</tr>
					</tfoot>
				</table>
			</div><!-- /.col-md-8 -->
		</div>
		
		<!-- Modal Zone -->
		<div class="modal fade" id="formEditCustomer">
			<div class="modal-dialog">
				<form action="save.php" method="post" class="form-horizontal">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">แก้ไขข้อมูล</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<!-- Hidden Zone -->
							<input type="hidden" name="id" id="id" value=""/>
								<div class="form-group">
									<label for="firstname">Username</label>
									<input type="text" id="uname" name="username" readonly value="#uname" class="form-control"/>
								</div>
								<div class="form-group">
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