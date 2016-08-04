<!DOCTYPE html>
<html lang="en">
  <head>  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <title>Delete Artwork</title>
  </head>

  <body> 
    <header>  
      <?php 
        require_once ("site_connect.php");
        //get the name of current page to make that page active in navbar.
        $activePage = basename($_SERVER['REQUEST_URI'], ".php");
        include('includes/header.php'); 
        $image_id = $_GET['img'] ;
        $result = dbSelect('SELECT * FROM artworks WHERE artwork_id='.$image_id);
      ?> 
    </header>            
    <main>
      <div id="container">
        <form class="form-horizontal" id="artwork_delete_form" method="post" role="form" 
                  action="artwork_upload.php?action=delete">

            <h4>The following artwork will be deleted :</h4>

            <br/>
              <div class="form-group">
                <label class="control-label col-sm-2">Title:</label>
                <label class="control-label col-sm-0"> <?php echo $result[0]["title"] ?> </label> 
                <input type="hidden" id="artwork_id" name="artwork_id" value="<?php echo $result[0]['artwork_id'] ?>" />
                </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="genre">Genre: </label>
                <label class="control-label col-sm-0" for="genre"><?php echo $result[0]['genre'] ?></label>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-2" for="description">Description: </label>
                <label class="control-label col-sm-0"> <?php echo $result[0]["description"] ?> </label>
              </div>

               <div class="form-group" >
                <label class="control-label col-sm-2" for="existing_img">Image: </label>
                <div class="col-sm-0">
                  <img src= "../tmpmedia/<?php echo $result[0]['image_name']?>" width=170 height=170/></td>
                </div>
              </div>

              <?php if (session_status() != PHP_SESSION_ACTIVE) {
                    session_start();
                  }
                if($_SESSION["level"] >= PUBLISHER) :?>
                  <div class="form-group" >
                    <label class="control-label col-sm-2" for="price">Price: $</label>
                    <label class="control-label col-sm-0"> <?php echo $result[0]["price"] ?> </label>
                  </div>
               
                  <div class="form-group">
                    <label class="control-label col-sm-2" for="status">Status: </label>
                    <label class="control-label col-sm-0"><?php echo $result[0]['status'] ?></label>
                  </div>

              <?php endif; ?>


              <div class="form-group">
                <div class="col-sm-offset-2">
                  <input type="submit" name="submit" id="submit" value="Delete" class="btn btn-default"/>
                </div>
              </div>
        </form> 
      </div> 
    </main>

    <footer>
      <?php 
        //includes the footer 
        include_once ('includes/footer.php'); 
      ?>
    </footer>
  </body>
</html> 