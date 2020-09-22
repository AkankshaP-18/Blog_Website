				 
				  $(document).on("hidden.bs.modal","#exampleModal", function(){
				    $(':input', this).val('');
					});

$(document).on('click', '.btnsignup', function(e){
	e.preventDefault();
	// alert(123);
	var data = $('.signup-form').serialize();
	// console.log(data);
	        $.ajax
                        ({
                            type: "POST",
                            url: "ajax_signup.php",
                            data: { type: "sign_up_data" ,data: data},
                            cache: false,
                            success: function(result)
                            {
								var valid_array = $.parseJSON(result);

								if(valid_array.validdetails == "validdetails")
								{
									swal({
                                        title: "User registered successfully!",
                                        text: "Proceed to Login..",
                                        icon: "success",
                                        button: "Ok"
                                    }).then(function() {
                                            swal.close();
									 		$("#exampleModal").modal('show');
    										$('#login-tab-content').addClass("active");
    										$('#signup-tab-content').removeClass("active");
                                        });
 									
								}
								else if(valid_array.invalidmobno == "invalidmobno")
								{
									// alert("Mobile Number and Email already exists!");
									swal({
										  title: "User Already Exists",
										  // text: "This mobile number and email  already exist plsease use another or please login",
										  icon: "warning",
										  button: "Ok",
									});
								}
                            }
                        });
});

    // to send the data for logging in
    $(document).on("click", '.btnlogin', function(e)
    {
        e.preventDefault();
        var data = $('.login-form').serialize();
        // console.log(data);
        $.ajax
                        ({
                            type: "POST",
                            url: "ajax_signup.php",
                            data: { type: "login_data" ,data: data},
                            cache: false,
                            success: function(result)
                            {
                                // console.log(result);
                                // return false;
                                if(result == 'Author')
                                {
                                    // console.log(123);
                                    window.location.href = "index.php";
                                }
                                else if(result == 'Guest')
                                {
                                    window.location.href = "index.php";

                                }
                                else
                                {
                                    // console.log(111);
                                    swal({
                                        // title: "Something is wrong",
                                        text: "Enter valid details",
                                        icon: "warning",
                                        button: "Ok"
                                    }).then(function() {
                                            swal.close();
                                            if($("#user_pass").val() == '')
                                            {
                                                $("#user_pass").focus();
                                            }
                                            else if ($("#user_login").val() == '') {
                                                $("#user_login").focus();
                                            }
                                            else
                                            {
                                                $("#user_pass").focus();
                                            }
                                        });
 
                                }
                            }
                        });

    });