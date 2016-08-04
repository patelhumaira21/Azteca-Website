$(document).ready(function(){

	$('#member_submit').on('click',function(e) {  
		e.preventDefault();
		var items = [];

		$("input:checkbox[name=buy]:checked").each(function(){
    		items.push($(this).val());
		}); 

        $.ajax({
            url:'cart_display.php',
            type: 'post',
            data: {items:JSON.stringify(items)},
            success: onSuccess,
            error: onError
        });

        // Show appropriate message to user
        function onSuccess(result){
        	$('#member_cart').html(result);

        	$('#confirm_buy').on('click',function(e) {
				alert("Your order has been confirmed");
				window.location.href = "index.php";
        	});
        	

		}

        function onError(error){
            alert("Error occured... Try again!");
        }

	});

    $('#back').on("click", function(e){
        window.location.href = ".?pageId=8";
    });


});

