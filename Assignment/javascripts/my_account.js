$(document).ready(function(){

	$('#add_tab').on('click', '#add_submit',function(e) {    
        e.preventDefault();
        upload_artwork("add"); 
    });

    $('#edit_submit').on('click',function(e) {   
        upload_artwork("edit");
    });

    //  $('#show_all_tab').on('click', '#edit_submit',function(e) {       
    //     upload_artwork("edit");
    // });

    $('.myAccountTab').on('click', function(e) {   
    
        $.ajax({
            url:"server.php?action=time",
            type:"post",
            data:{},
            success: function(data){
                if(data == "TIMEOUT"){
                    alert("Session timed out due to in-activity. Please login again");
                    window.location.href = ".?pageId=6";
                }    
            },
            error: function(error){console.log("Error");}
        });
    });
});


var validateForm = function(form){

    if( $("#"+form+"_title").val()==""){
    	alert("Enter Title");
        $("#"+form+"_title").focus();
        return false;
    }
    else if($("#"+form+"_description").val()==""){
    	alert("Enter Description");
        $("#"+form+"_description").focus();
        return false;
    }
	else if($("#"+form+"_fileToUpload").val()=="" && form=="add"){
		alert("Select Image");
        $("#"+form+"_fileToUpload").focus();
        return false;
	}
    else if($("#"+form+"_teaser_text").val()==""){
        alert("Enter Teaser Text");
        $("#"+form+"_teaser_text").focus();
        return false;
    }
    else if($("#"+form+"_author_text").val()==""){
        alert("Enter Author Name");
        $("#"+form+"_author_text").focus();
        return false;
    }
		return true;
};

var upload_artwork = function(form){
    if(validateForm(form)){
        var form_data = new FormData($("#artwork_upload_form")[0]);
        $("#"+form+"_submit").addClass('active');
        $("#"+form+"_submit").prop("disabled",true);
        $("#"+form+"_upload_status").text("Artwork upload is in progress. Kindly wait for some time...");
        // call cgi script to upload the image.
        $.ajax({
            url:'../PythonDemo/upload_images.py',
            type: 'post',
            data: form_data,
            processData: false,
            contentType: false,
            success: function(response){
                response = response.trim();
                if(response == "SUCCESS"){
                    console.log("Image uploaded successfully");
                    $.ajax({
                        url:'artwork_upload.php?action='+form,
                        type: 'post',
                        data: form_data,
                        processData: false,
                        contentType: false,
                        success: function(response){
                            $("#"+form+"_submit").removeClass('active');
                            $("#"+form+"_submit").prop("disabled",false);
                            $("#"+form+"_upload_status").text("");
                            if(response == "SUCCESS"){
                                alert("Artwork was uploaded successfully");
                                window.location = ".?pageId=7";
                            }
                            else{
                                alert("Artwork could not be uploaded. Try again!!!");
                            }
                          },
                        error: function(error){
                            $("#"+form+"_submit").removeClass('active');
                            $("#"+form+"_submit").prop("disabled",false);
                            $("#"+form+"_upload_status").text("");
                            alert("An error occurred while processing your request. Please try again!!!");
                            this.removeClass('active');
                        }
                    });
                }
                else if(response == "FORMAT_ERR") {
                    $("#"+form+"_submit").removeClass('active');
                    $("#"+form+"_submit").prop("disabled",false);
                    $("#"+form+"_upload_status").text("");
                    alert("Please upload a JPG image.");
                }
                else {
                    $("#"+form+"_submit").removeClass('active');
                    $("#"+form+"_submit").prop("disabled",false);
                    $("#"+form+"_upload_status").text("");
                    alert("Artwork could not be uploaded. Try again!!!");
                }
            },
            error: function(error){
                $("#"+form+"_submit").removeClass('active');
                $("#"+form+"_submit").prop("disabled",false);
                $("#"+form+"_upload_status").text("");
                alert("An error occurred while processing your request. Please try again!!!");
            }                    
        });
    }   

};


   
