$(document).ready(function(){

	 $("#register_submit").click(function(e){
	 	e.preventDefault();
	 	var result = validateForm();
                //alert (JSON.stringify(result.data));  
	        if (result.valid){
	        	/**
			     * Register user
			     */
			
		        // call the php script.
		        $.ajax({
		            url:'server.php?action=register',
		            type: 'post',
		            data: result.data,
		            success: onSuccess,
		            error: onError
		        });

		        // Show the confirmation on insert success
		        function onSuccess(result){
		        	if(result == "SUCCESS") {
			            alert("You have been registered successfully. Welcome to ArtztecA!!!");
			        	window.location.href = ".?pageId=6";
		        	}
                    else if(result == "TIMEOUT"){
                        alert("Session timed out due to in-activity. Please login again");
                        window.location.href = ".?pageId=6";
                    }
		  			else if(result == "DUPLICATE_USERNAME"){
		  				alert("Username already exists. Try with another username.");
		  				  $("#user_name").val("").focus();
		  			}
                    else if(result == "DUPLICATE_EMAIL"){
                        alert("Email Id already exists. Try with another email id.");
                          $("#email").val("").focus();
                    }
		  			else{
		  				alert("Error occured... Try again!");
		  			}
				}

		        // Logout on error from server.
		        function onError(error){
		            alert("Error occured... Try again!");
		        }
		    }
       
    });

});


var validateForm = function(){
    var data = {};
    var result = {valid:false, data:data};

    // check if last name is valid
    var last_name = $("#last_name").val();
    var last_name_result = isValidField(last_name, "Last_Name");
    if (!last_name_result.valid){
        alert (last_name_result.msg);
        $("#last_name").focus();
        return result;
    }
    else {
        data["last_name"]= last_name;
    }

    // check if first name is valid
    var first_name = $("#first_name").val();
    var first_name_result = isValidField(first_name, "First_Name");
    if (!first_name_result.valid){
        alert (first_name_result.msg);
        $("#first_name").focus();
        return result;
    }
    else {
        data["first_name"]= first_name;
    }

    // check if dob is valid
    var dob = $("#dob").val();
    var dob_result = isValidField(dob, "Date of Birth");
    if (!dob_result.valid){
        alert (dob_result.msg);
        $("#dob").focus();
        return result;
    }
    else {
        data["dob"]= dob;
    }

    // check if email id is valid
    var email = $("#email").val();
    if (!checkEmailFormat(email)){
        alert ("Enter a valid email id");
        $("#email").focus();
        return result;
    }
    else {
        data["email"]= email;
    }


    // check if username is valid
    var user_name = $("#user_name").val();
    var user_name_result = isValidField(user_name, "Username");
    if (!user_name_result.valid){
        alert (user_name_result.msg);
        $("#user_name").focus();
        return result;
    }
    else {
        data["user_name"]= user_name;
    }

    // check if password is valid
    var password = $("#password").val();
    var password_result = isValidField(password, "Password");
    if (!password_result.valid){
        alert (password_result.msg);
        $("#password").focus();
        return result;
    }
    else {
        data["password"]= password;
    }

    result.valid = true;
    result.data = data;
    return result;
};
