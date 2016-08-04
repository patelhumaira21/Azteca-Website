function showModal(image_name){
	var img = image_name.split(".");
	$("#modal_thumbnail").attr("src", "../tmpmedia/"+img[0]+"_thumb."+img[1]);
	$("#modal_teaser").attr("src", "../tmpmedia/"+img[0]+"_teaser."+img[1]);
	$("#modal_cover").attr("src", "../tmpmedia/"+img[0]+"_cover."+img[1]);
	$("#modal_watermark").attr("src", "../tmpmedia/"+img[0]+"_watermark."+img[1]);

	var form_data = new FormData();
	form_data.append('image_name',image_name);

	$.ajax({
        url:'../PythonDemo/exif.py',
        type: 'post',
        data: form_data,
        processData: false,
        contentType: false,
        success: function(response){
        	response = response.trim();
        	if(response == "EMPTY" || response=="EXCEPTION") {
        		$("#exif_status").text("No Exif Data found for this image");
        		$("#exif_table tr:gt(0)").remove(); 
        	}
        	else {
        		// alert(response);
        		$("#exif_status").text("Exif Data is given below:");
        		var details = response.split("\n");
        		for (x in details) { 
    				$("#exif_table").append('<tr class="info"><td>'+details[x]+'</td></tr>');
				}
        	}
        },
        error: function(error){
            alert(error)
        }
    });
}

