function goToUpgrade(artist_id){

	var elem = document.getElementById("upgrade_level_"+artist_id);
  var new_level = elem.options[elem.selectedIndex].text;

	$.ajax({
            url:'server.php?action=user',
            type: 'post',
            data: {
              artist_id : artist_id,
            	new_level : new_level 
            },
            success: onSuccess,
            error: onError
        });

        // Show appropriate message to user
        function onSuccess(result){

        	if(result == "SUCCESS"){
            alert("Role is modified to "+new_level);
            $("#label_role_"+artist_id).text(new_level);
  			   }
           else if(result == "TIMEOUT"){
              alert("Session timed out due to in-activity. Please login again");
              window.location.href = ".?pageId=6";
           }
  			   else{ 
  				    alert("Role could not be modified\nTry again.");
  			   }
		}

        function onError(error){
           alert("Role could not be modified\nTry again.");
        }


}