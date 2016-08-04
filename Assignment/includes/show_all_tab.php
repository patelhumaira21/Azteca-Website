 <script src="javascripts/show_all_tab.js"></script>
<div class="row">
  <?php
    $result = dbSelect('SELECT artwork_id, title, genre, description, image_name, price, status, last_name, first_name, best_seller FROM artworks , logins WHERE artworks.artist_id = logins.id');
    $size = sizeof($result);
    foreach ($result as $row)  : 
    list($image_name, $ext) = explode('.', $row['image_name']); ?>

  <div class = "col-sm-6 col-md-4 thumbnail">
      <img src = "../tmpmedia/<?php echo $image_name.'_cover.'.$ext?>" class="img-rounded" style="width:300px;height:200px">

    <div class = "caption text-center">
      <p><b><?php echo $row["title"] ?> </b><br/>
      Description: <?php echo $row["description"] ?> <br/>
      Price: $ <?php echo $row["price"] ?> <br/>
      Status: <?php echo $row["status"] ?> <br/>
      Creator: <?php echo $row["first_name"]." ".$row["last_name"] ?> <br/></p>
      <input type =hidden id="img_id" value= <?php echo $row["status"] ?> >
      <p>
        <button type="button" class="btn btn-info" onClick='window.location="edit_artwork.php?img=<?php echo $row["artwork_id"] ?>";'>Edit</button>
        
        <button type="button" class="btn btn-info" onClick='window.location="delete_artwork.php?img=<?php echo $row["artwork_id"] ?>";'>Delete</button>

        <button type="button" class="btn btn-info btn-details" id="details_<?php echo $row['image_name'] ?>" 
          onClick='showModal("<?php echo $row['image_name'] ?>")' data-toggle="modal" data-target="#myModal">Show Details</button>
      </p>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Image and Exif Data Details</h4>
        </div>
        <div class="modal-body">
          <div class = "col-sm-4 col-md-4 thumbnail">
            <img id="modal_thumbnail" src="" >
            <div class = "caption text-center">
              <center>Thumbnail</center>
            </div>
          </div>
          <div class = "col-sm-4 col-md-4 thumbnail">
            <img src = "" style="width:300px;height:200px" id="modal_teaser" >
            <div class = "caption text-center">
              <center>Teaser</center>
            </div>
          </div>
          <div class = "col-sm-4 col-md-4 thumbnail">
            <img src = "" style="width:300px;height:200px" id="modal_watermark">
            <div class = "caption text-center">
              <center>Watermark</center>
            </div>
          </div>
          <center>
            <div class = "thumbnail">
              <img src = "" style="width:600px;height:250px" id="modal_cover" >
              <div class = "caption text-center">
                <center>Cover Page</center>
              </div>
            </div>
          </center><br/>


          <table class="table table-bordered" id="exif_table">
            <tr>
              <th class="danger"><label id="exif_status"></label></th>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
