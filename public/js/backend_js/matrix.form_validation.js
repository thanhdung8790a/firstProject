
$(document).ready(function(){

	// ajax check password
	$("#current_pwd").keyup(function(){
		var current_pwd = $("#current_pwd").val();
		$.ajax({
			type:'get',
			url:'/admin/check-pwd',
			data:{current_pwd:current_pwd},
			success:function(resp){
				if (resp=="false") {
					$("#chkPwd").html("<font color='red'>Mật khẩu hiện tại không đúng</font>");
				}else{
					$("#chkPwd").html("<font color='blue'>Mật khẩu hiện tại đúng</font>");
				}
			}, error:function(){
				alert("Error");
			}
		});
	});

	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();

	// Add Category Validation
    $("#add_category").validate({
		rules:{
			required:{
				required:true
			},
			cat_name:{
				required:true,
				minlength:2
			},
			cat_url:{
				required:true,
				minlength:2
			},
			product_name:{
				required: true
			},
			product_code:{
				required: true
			},
			product_color:{
				required: true
			},
			product_price:{
				required: true,
				number: true
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
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
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
				required:true,
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

	jQuery.extend(jQuery.validator.messages, {
	    required: "Trường này bắt buộc.",
	    remote: "Vui lòng sửa phạm vi này.",
	    email: "Vui lòng nhập một địa chỉ email hợp lệ.",
	    url: "Vui lòng nhập một URL hợp lệ.",
	    date: "Vui lòng nhập một ngày tháng hợp lệ.",
	    dateISO: "Please enter a valid date (ISO).",
	    number: "Vui lòng nhập một số hợp lệ.",
	    digits: "Vui lòng chỉ nhập các chữ số.",
	    creditcard: "Vui lòng nhập số thẻ tín dụng hợp lệ.",
	    equalTo: "Vui lòng nhập lại cùng một giá trị.",
	    accept: "Vui lòng nhập một giá trị với một phần mở rộng hợp lệ.",
	    maxlength: jQuery.validator.format("Vui lòng nhập không quá {0} ký tự."),
	    minlength: jQuery.validator.format("Vui lòng nhập ít nhất {0} ký tự."),
	    rangelength: jQuery.validator.format("Vui lòng nhập một giá trị trong khoảng từ {0} đến {1} ký tự."),
	    range: jQuery.validator.format("Vui lòng nhập một giá trị trong khoảng từ {0} đến {1}."),
	    max: jQuery.validator.format("Vui lòng nhập một giá trị nhỏ hơn hoặc bằng {0}."),
	    min: jQuery.validator.format("Vui lòng nhập giá trị lớn hơn hoặc bằng {0}.")
	});


	$(".deleteRecord").click(function(){
		var id = $(this).attr('rel1');
		var deleteFunction = $(this).attr('rel2');
		swal({   
		    title: 'Are you sure?',
			  text: "You won't be able to revert this!",
			  type: 'warning',
			  showCancelButton: true,
			  confirmButtonColor: '#3085d6',
			  cancelButtonColor: '#d33',
			  confirmButtonText: 'Yes, delete it!'
		}, 
	    function(){   
	    	window.location.href="/admin/"+deleteFunction+"/"+id;
	  	});
	});

	// Xoa product bang cach chon checkbox id
	$(".deleteChoceProduct").click(function(event){
	    event.preventDefault();
	    var productIDs = $("#tblProduct input:checkbox:checked").map(function(){
	      return $(this).val();
	    }).get();
	    alert(productIDs);
	    $.ajax({
	       type:'get',
	       url: '/admin/delete-products',
	       data: { productIDs: productIDs },
	       success:function(resp){
				if (resp=="false") {
					alert("Xóa không thành công");			
				}else{
					swal({   
					  title: 'Thong bao',
					  text: "Ban da xoa thanh cong cac san pham da chon",
					  type: 'warning',
					  confirmButtonColor: '#3085d6',
					  cancelButtonColor: '#d33',
					  confirmButtonText: 'Tro ve trang san pham'
					},
					function(){
						window.location.href = "/admin/product";
					});	
				}
			}, error:function(){
				alert("Error");
			}
	    });
	});


	// Add Remove Input Fields Dynamically using jQuery

    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div><input type="text" name="sku[]" id="sku" placeholder="SKU" value="" style="width: 120px; margin: 10px 3px 10px 0;" /><select name="size[]" style="width: 120px; margin: 10px 3px 10px 0;"><option selected>Small</option><option>Medium</option><option>Large</option></select><input type="text" name="price[]" id="price" placeholder="Price" value="" style="width: 120px; margin: 10px 3px 10px 0;" /><input type="text" name="stock[]" id="stock" placeholder="Stock" value="" style="width: 120px; margin: 10px 3px 10px 0;" /><a href="javascript:void(0);" class="remove_button btn btn-danger">Xóa</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

});

