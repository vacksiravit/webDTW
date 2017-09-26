function chThai(){
	if (event.keyCode<=161){
		return true;
	}
	else{
		alert("กรุณากรอกเฉพาะภาษาอังกฤษ");
		return false;
	}
}
function SplitData(){
	$('#show_data').DataTable({
		"lengthMenu": [ 10,30, 50, 75, 100, 500 ]
	});
	$('#show_data').on('click', 'a', function () {
		// var data = table.row( this ).data();
		// alert( 'You clicked on '+data[0]+'\'s row' );
		var id = $(this).attr('data-id');
		var uname = $(this).attr('data-username');
		var pword = $(this).attr('data-value');
		$("#id").val(id);
		$("#uname").val(uname);
		$("#pword").val(pword);
		$('#formEditCustomer').modal('show');
	});
}
