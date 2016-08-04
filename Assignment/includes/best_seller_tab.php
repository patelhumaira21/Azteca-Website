  <div class="row">
    <?php
      $result = dbSelect('SELECT * FROM artworks ORDER BY best_seller DESC');
      $size = sizeof($result);
      foreach ($result as $row)  : 
      ?>

    <div class = "col-sm-6 col-md-3 thumbnail">
      <div class = "caption text-center">
        <p><b><?php echo $row["title"] ?> </b><br/></p>
        <input type =hidden id="img_id" value='<?php echo $row["artwork_id"] ?>' >
        <img src = "../tmpmedia/<?php echo $row['image_name'] ?>" class="img-circle" style="width:200px;height:150px">

        <p>
          <?php
          if($row['best_seller'] == 1) {
            $showRemove = 'visible';
            $showAdd = 'hidden';
          }else{
            $showRemove = 'hidden';
            $showAdd = 'visible';
          }
          ?>

          <br/>

          <button type="button" class="btn btn-info" id='remove<?php echo $row["artwork_id"] ?>' 
                  onCLick='goToAddRemove(<?php echo $row["artwork_id"] ?>,0)'
                  name="remove" style='visibility:<?php echo $showRemove ?>'>Remove From Best Seller</button>

          <br/>
          <button type="button" class="btn btn-info" id='add<?php echo $row["artwork_id"] ?>' 
                  onCLick='goToAddRemove(<?php echo $row["artwork_id"] ?>,1)'
                  name="add" style='visibility:<?php echo $showAdd ?>'>Add To Best Seller</button>
        </p>
      </div>
    </div>
    <?php endforeach; ?>
  </div>