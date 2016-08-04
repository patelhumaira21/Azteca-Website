
<div class="row">
  <?php
    $result = dbSelect('SELECT * FROM artworks WHERE artist_id='.$_SESSION["user_id"]);
    $size = sizeof($result);
    foreach ($result as $row)  : ?>

    <div class = "col-sm-6 col-md-4 thumbnail">
        <img src = "../tmpmedia/<?php echo $row['image_name']?>" class="img-rounded" style="width:200px;height:150px">

      <div class = "caption text-center">
         <p><b><?php echo $row["title"] ?> </b><br/>
         Description: <?php echo $row["description"] ?> <br/>
         Price: $ <?php echo $row["price"] ?> <br/>
         Status: <?php echo $row["status"] ?> <br/></p>
         <input type =hidden id="img_id" value= <?php echo $row["status"] ?> >
         <p>
            <button type="button" class="btn btn-info" onClick='window.location="edit_artwork.php?img=<?php echo $row["artwork_id"] ?>";'>Edit</button>
            <button type="button" class="btn btn-info" onClick='window.location="delete_artwork.php?img=<?php echo $row["artwork_id"] ?>";'>Delete</button>
         </p>
      </div>
    </div>
    <?php endforeach; ?>
</div>