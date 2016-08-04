
 
<?php 
  require_once ("site_connect.php");
  require_once ("cookies.php");
    checkTimeOut();
  //get the name of current page to make that page active in navbar.
  $activePage = basename($_SERVER['REQUEST_URI'], ".php");
  //include('includes/header.php'); 
  $image_ids = $_POST['items'] ;
  $image_ids   = json_decode("$image_ids", true);
  $img_ids_str = implode(",", $image_ids);
?>
<script src="javascripts/cart.js" ></script>
<?php if(empty($image_ids)) :?>
    <h1>Your cart is empty<h1>
    <button type="button" class="btn btn-info" id='back'>Go back</button>
<?php endif; ?>
<?php if(!empty($image_ids)) :?>
  <table class="table">
    <thead>
      <tr>
        <th colspan=2> <h2><center>The following Items are placed in your cart</center><h2> </th>
      </tr>
    </thead>
    <tbody>
       <?php
          $total_price = 0;
          $result = dbSelect('SELECT * FROM artworks WHERE artwork_id IN ('.$img_ids_str.')');
          foreach ($result as $row): ?>
          <tr class="danger">
            <td><?php echo "Title: ".$row["title"]."<br/>"."Description:".$row["description"]."<br/> Price: $".$row["price"] ; ?></td>
            <td><img src = "../tmpmedia/<?php echo $row['image_name']?>" class="img-rounded" style="width:100px;height:100px">
          </tr>
          <?php $total_price += $row["price"];  ?>
        <?php endforeach; ?>
      
    </tbody>
  </table>
  <center>
    <h2>Total price : $<?php echo $total_price; ?><h2>  
    <button type="button" class="btn btn-info" id='confirm_buy'>Confirm Order</button>
  </center>
<?php endif; ?>

