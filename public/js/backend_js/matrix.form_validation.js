
$(document).ready(function(){
	$("#current_pwd").keyup(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type: 'get',
			url: '/admin/check-pwd',
			data: {current_pwd:current_pwd},
			success: function(response){
				// alert(response);
				if (response == "false") {
					$("#pwdChk").html('<font style="color:red; font-weight:bold;" >Current Password is Incorrect</font>');
				} else {
					$("#pwdChk").html('<font style="color:green; font-weight:bold;">Current Password is Correct</font>');
				}
			}, 
			error: function(){
				alert("Error");
			}
		});
	});
	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#add_category").validate({
			rules:{
				category_name:{
					required:true,
				},
				description:{
					required:true,
				},
				slug:{
					required:true,
				},
			},
			errorClass: "help-inline",
			errorElement: "span",
			highlight:function(element, errorClass, validClass) {
				$(element).parents('.control-group').addClass('error');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).parents('.control-group').removeClass('error');
				$(element).parents('.control-group').addClass('success');
			}
		});
	
	$("#add_product").validate({
		rules:{
			product_name:{
				required:true,
			},
			product_slug:{
				required:true,
			},
			product_code:{
				required:true,
			},
			product_details:{
				required:true,
			},
			product_price:{
				required:true,
				number:true,
			},
			operating_system:{
				required:true,
			},
			product_quantity:{
				required:true,
				number:true
			},
			image:{
				required:true,
			},
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#edit_product").validate({
		rules:{
			product_name:{
				required:true,
			},
			product_slug:{
				required:true,
			},
			product_code:{
				required:true,
			},
			product_details:{
				required:true,
			},
			product_price:{
				required:true,
				number:true,
			},
			operating_system:{
				required:true,
			},
			product_quantity:{
				required:true,
				number:true
			},
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			current_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_pwd:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_pwd:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_pwd"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$('.delCat').click(function(){
		if (confirm('Are you sure you want delete this category?')) {
			return true;
		}
		return false;
	});

	
	// $('.delProduct').click(function(){
	// 	if (confirm('Are you sure you want delete this product?')) {
	// 		return true;
	// 	}
	// 	return false;
	// })


	$(document).on('click', '.deleteRecord', function(e){
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
          title: "Are you sure?",
		  text: "Your will not be able to recover this Record Again!",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!',
		  cancelButtonText: 'No, cancel!',
		  confirmButtonColor: 'btn btn-success',
		  cancelButtonColor: 'btn btn-danger',
		  buttonsStyling: false,
		  reverseButtons: true
        },
        function(){
            window.location.href="/admin/"+deleteFunction+"/"+id;
        });
    });
});
