$(document).ready(function(){

  $.ajax({
    url:"server.php?action=images",
    type:"post",
    data:{},
    success: function(data){
          $("#publishedImages").carousel("pause").removeData();
          var content_indicator = "";
          var content_inner = "";
          data = JSON.parse(data);
          $.each(data, function (i, obj) {
            var img_name = obj.image_name.split(".");
            content_indicator += '<li data-target="#publishedImages" data-slide-to="' + i + '"></li>';
            content_inner += '<div class="item"><img src="../tmpmedia/'+img_name[0]+'_teaser.'+img_name[1]+'" style="width:460px;height:400px"></div>';
          });
          $('#carousel_id').html(content_indicator);
          $('#carousel_inner').html(content_inner);
          $('#carousel_inner .item').first().addClass('active');
          $('#carousel_indicator > li').first().addClass('active');
          $('#publishedImages').carousel();
    },
    error: function(data){console.log("Error");}
  });
});
