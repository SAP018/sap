
$("#registro").click(function(){
	var dato1 = $("#name").val();
	var dato2 = $("#email").val();
	var dato3= $("#password").val();
	var dato4= $("#type").val();
	var route = "http://127.0.0.1:8000/admin/user";
	var token = $("#token").val();

	$.ajax({
		url: route,
		headers: {'X-CSRF-TOKEN': token},
		type: 'POST',
		dataType: 'json',
		data:{name: dato1,email:dato2,password:dato3,type:dato4},

		success:function(){
			$("#msj-success").fadeIn();
			$("#msj-success").hide(2000);
		},

		error:function(msj){
			$("#msj").html(msj.responseJSON.genre);
			$("#msj-error").fadeIn();
		}
		



	});
	$("#name").val("");
	$("#email").val("");
	$("#password").val("");
	$("#type").val("");

	

});

