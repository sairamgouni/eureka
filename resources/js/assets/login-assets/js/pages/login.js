//------------- login.js -------------//
$(document).ready(function() {
	var lang = $("#lang").val();
	
	if (lang=="th") {
		var reqtxt1a = "กรุุณาใส่ Password";
		var reqtxt1b = "รหัสผ่านต้องมีมากกว่า 5 ตัวอักษร";
		var reqtxt2 = "กรุณาใส่ Username";
	} else {
		var reqtxt1a = "Please provide a password";
		var reqtxt1b = "Your password must be at least 5 characters long";
		var reqtxt2 = "Please type your email or username";
	}
	
	//validate login form 
	$("#login-form").validate({
		ignore: null,
		ignore: 'input[type="hidden"]',
		errorPlacement: function( error, element ) {
			var place = element.closest('.input-group');
			if (!place.get(0)) {
				place = element;
			}
			if (place.get(0).type === 'checkbox') {
				place = element.parent();
			}
			if (error.text() !== '') {
				place.after(error);
			}
		},
		errorClass: 'help-block',
		rules: {
			email: {
				/*required: true,
				email: true*/
				required: true
			},
			password: {
				required: true,
				minlength: 5
			}
		},
		messages: {
			password: {
				required: reqtxt1a,
				minlength: reqtxt1b
			},
			email: reqtxt2,
		},
		highlight: function( label ) {
			$(label).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		success: function( label ) {
			$(label).closest('.form-group').removeClass('has-error');
			label.remove();
		}
	});

});