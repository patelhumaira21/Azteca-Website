$(document).ready(function(){

	 $("#login_submit").click(function(e){

	 	var result = validateForm();

	        if (result.valid){
	        	/**
			     * Login user
			     */
		        // call the php script.
		        $.ajax({
		            url:'login.php',
		            type: 'post',
		            data: result.data,
		            success: function(data){
		        		if(data.trim() == "PASSWORD MISMATCH"){
		        			e.preventDefault();		
		  					$('#status').text("ERROR, incorrect username or password");
			            	$('#login_user_name').val("").focus();
			            	$('#login_password').val("");
		  				}
		  				else
		  				{ 
							window.location.href = data;
		  				}
					},
		            error: function (error){
		            	$('#status').text("Error occured... Try again!");
		        	}
		        });	        
		    }
		e.preventDefault();	
    });

});


var validateForm = function(){
    var data = {};
    var result = {valid:false, data:data};
    // check if username is valid
    var user_name = $("#login_user_name").val();
    var user_name_result = isValidField(user_name, "Username");
    if (!user_name_result.valid){
        alert (user_name_result.msg);
        $("#login_user_name").focus();
        return result;
    }
    else {
        data["username"]= user_name;
    }

    // check if password is valid
    var password = $("#login_password").val();
    var password_result = isValidField(password, "Password");
    if (!password_result.valid){
        alert (password_result.msg);
        $("#login_password").focus();
        return result;
    }
    else {
        data["password"]= password;
    }

    result.valid = true;
    result.data = data;
    return result;
}
