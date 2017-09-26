var ang_getroom = angular.module('dtw_getwifi', []);//ทำงานในส่วนของกรอบของ app ที่เรากำหนด
ang_getroom.controller('ShowRoom', 
	function($scope,$http,$timeout){
		//แสดงข้อมูลสินค้าใน controller ชื่อ showdatacontroller
		getData();//ทำงานเมื่อเพจโหลด เรียกใช้ฟังก์ชั่น getData
		setInterval(function(){getData();},10000);
		$scope.sData='';
		function getData(){
			$http.get("connect_db.php").success(function(data){ $scope.showData = data; });
		}
	}
);
ang_getroom.controller('ClickEdit',
	function($scope){
		$scope.onClicked = function() {
			//alert($scope.c.username);
			//alert($scope.c.value);
			var m_id = $scope.c.id;
			var m_username = $scope.c.username;
			var m_password = $scope.c.value;
			$("#id").val(m_id);
			$("#uname").val(m_username);
			$("#pword").val(m_password);
			$('#formEditCustomer').modal('show');
		}
	}
);
/*
function timeout() {
    setTimeout(function () {
        // Do Something Here
        // Then recall the parent function to
        // create a recursive loop.
        timeout();
    }, 1000);
}
*/