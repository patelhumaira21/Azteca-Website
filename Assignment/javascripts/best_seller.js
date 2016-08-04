function goToAddRemove(artwork_id,value){
	var remove_el = document.getElementById("remove"+artwork_id);
	var add_el = document.getElementById("add"+artwork_id);

	$.ajax({
            url:'server.php?action=best-seller',
            type: 'post',
            data: {artwork_id : artwork_id,
            		best_seller : value },
            success: onSuccess,
            error: onError
        });

        // Show appropriate message to user
        function onSuccess(result){
        	if(result == "SUCCESS"){
  				  alert("Best Sellers List is modified");
  				  if(value == 0) {
					     add_el.style.visibility = 'visible';
  					   remove_el.style.visibility = 'hidden';
  				  }

  				  if(value == 1) {
  					   add_el.style.visibility = 'hidden';
  					   remove_el.style.visibility = 'visible';
  				  }
  			 }
          else if(result == "TIMEOUT"){
              alert("Session timed out due to in-activity. Please login again");
              window.location.href = ".?pageId=6";
          }
  			 else{ 
  				  alert("Best Sellers List could not be modified\nTry again.");
  			 }
		}

        function onError(error){
           alert("Best Sellers List could not be modified\nTry again.");
        }


}