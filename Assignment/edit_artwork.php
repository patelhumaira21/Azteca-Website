<!DOCTYPE html>
<html lang="en">
  <head>  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <title>Edit Artwork</title>
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
      <script src="javascripts/my_account.js"></script>
    </header>            
    <main>
      <div id="container">
        <form class="form-horizontal" id="artwork_upload_form" method="post" role="form" 
                  action="" enctype="multipart/form-data">

            <h4><center>The following artwork will be modified <center></h4>
            <br/>
            <div class="form-group">
              <label class="control-label col-sm-2" for="edit_title">Enter Title: </label>
              <div class="col-sm-4">
                <input type="text" id="edit_title" name="title" class="form-control" value="<?php echo $result[0]["title"] ?>" />
                <input type="hidden" id="edit_artwork_id" name="artwork_id" value="<?php echo $result[0]['artwork_id'] ?>" />
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="edit_genre">Select Genre: </label>
              <div class="col-sm-4">
                <select class="form-control" id="edit_genre" name="genre">
                  <option value="Abstract" <?php if($result[0]['genre']=='Abstract') echo 'selected="selected"'; ?> >Abstract</option>
                  <option value="Advertisement" <?php if($result[0]['genre']=='Advertisement') echo 'selected="selected"'; ?> >Advertisement</option>
                  <option value="Animal Painting" <?php if($result[0]['genre']=='Animal Painting') echo 'selected="selected"'; ?> >Animal Painting</option>
                  <option value="Architecture" <?php if($result[0]['genre']=='Architecture') echo 'selected="selected"'; ?> >Architecture</option>
                  <option value="Flower Painting" <?php if($result[0]['genre']=='Flower Painting') echo 'selected="selected"'; ?> >Flower Painting</option>
                  <option value="History Painting" <?php if($result[0]['genre']=='History Painting') echo 'selected="selected"'; ?> >History Painting</option>
                  <option value="Landscape" <?php if($result[0]['genre']=='Landscape') echo 'selected="selected"'; ?> >Landscape</option>
                  <option value="Mosaic" <?php if($result[0]['genre']=='Mosaic') echo 'selected="selected"'; ?> >Mosaic</option>
                  <option value="Panaroma" <?php if($result[0]['genre']=='Panaroma') echo 'selected="selected"'; ?> >Panaroma</option>
                  <option value="Poster" <?php if($result[0]['genre']=='Poster') echo 'selected="selected"'; ?> >Poster</option>
                  <option value="Potrait" <?php if($result[0]['genre']=='Potrait') echo 'selected="selected"'; ?> >Potrait</option>
                  <option value="Sketch" <?php if($result[0]['genre']=='Sketch') echo 'selected="selected"'; ?> >Sketch</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="edit_description">Enter Description: </label>
              <div class="col-sm-4">  
                <input type="text" id="edit_description" name="description" class="form-control" 
                        value="<?php echo $result[0]["description"] ?>" />
              </div>
            </div>

             <div class="form-group" >
              <label class="control-label col-sm-2" for="existing_img">Existing Image: </label>
              <input type="hidden" id="existing_img" name="existing_img" value="<?php echo $result[0]['image_name'] ?>" />
              <input type="hidden" id="artist_id" name="artist_id" value="<?php echo $result[0]['artist_id'] ?>" />
              <div class="col-sm-4">
                <img src= "../tmpmedia/<?php echo $result[0]['image_name']?>" width=170 height=170/></td>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="edit_fileToUpload">Select Artwork: </label>
              <div class="col-sm-4">
                <input type="file" id="edit_fileToUpload" name="fileToUpload" class="file" />
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="thumbnail">Select Thumbnail Size: </label>
              <div class="col-sm-4">
                <div class="radio">
                  <label><input type="radio" name="thumbnail" id="edit_thumnail_32" value="32" 
                          <?php if($result[0]['thumbnail_size']== 32 ) echo 'checked="checked"'; ?> />32 x 32</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="thumbnail" id="edit_thumnail_64" value="64" 
                          <?php if($result[0]['thumbnail_size']== 64 ) echo 'checked="checked"'; ?> />64 x 64<label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="thumbnail" id="edit_thumnail_128" value="128" 
                          <?php if($result[0]['thumbnail_size']== 128 ) echo 'checked="checked"'; ?> />128 x 128</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="thumbnail" id="edit_thumnail_256" value="256" 
                          <?php if($result[0]['thumbnail_size']== 256 ) echo 'checked="checked"'; ?> />256 x 256</label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="teaser">Text on Teaser: </label>
              <div class="col-sm-4">
                <input type="text" id="add_teaser_text" name="teaser_text" class="form-control" value="<?php echo $result[0]["teaser_text"] ?>" />
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="position">Position of text on Teaser: </label>
              <div class="col-sm-4">
                <div class="radio">
                  <label><input type="radio" name="position" id="edit_position_top" value="top" 
                           <?php if($result[0]['text_position']== "top" ) echo 'checked="checked"'; ?> />Top</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="position" id="edit_position_middle" value="middle" 
                          <?php if($result[0]['text_position']== "middle" ) echo 'checked="checked"'; ?> />Middle<label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="position" id="edit_position_bottom" value="bottom" 
                          <?php if($result[0]['text_position']== "bottom" ) echo 'checked="checked"'; ?> />Bottom</label>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="action">Select an Action: </label>
              <div class="col-sm-4">
                <div class="radio">
                  <label><input type="radio" name="process_action" id="edit_action_default" value="default"
                          <?php if($result[0]['process_action']== "default" ) echo 'checked="checked"'; ?> />Default</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="process_action" id="edit_action_blur" value="blur" 
                        <?php if($result[0]['process_action']== "blur" ) echo 'checked="checked"'; ?> />Blur Effect</label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="process_action" id="edit_action_emboss" value="emboss" 
                          <?php if($result[0]['process_action']== "emboss" ) echo 'checked="checked"'; ?> />Embossing Effect<label>
                </div>
                <div class="radio">
                  <label><input type="radio" name="process_action" id="edit_action_edge" value="edge" 
                          <?php if($result[0]['process_action']== "edge" ) echo 'checked="checked"'; ?> />Edge Detection</label>
                </div>

                <div class="radio">
                  <label><input type="radio" name="process_action" id="edit_action_mirror" value="mirror" 
                          <?php if($result[0]['process_action']== "mirror" ) echo 'checked="checked"'; ?> />Mirror Image</label>
                </div>

              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-sm-2" for="author_text">Author Name for Book Cover:</label>
              <div class="col-sm-4">
                <input type="text" id="add_author_text" name="author" class="form-control" value="<?php echo $result[0]["author_name"] ?>" />
              </div>
            </div>



            <?php if (session_status() != PHP_SESSION_ACTIVE) {
                  session_start();
                }
              if($_SESSION["level"] >= PUBLISHER) :?>
                <div class="form-group" >
                  <label class="control-label col-sm-2" for="edit_price">Enter Price: $</label>
                  <div class="col-sm-4">
                    <input type="number" id="edit_price" name="price" class="form-control"  
                    value="<?php echo $result[0]["price"] ?>" />
                  </div>
                </div>

                <div class="form-group" >
                  <label class="control-label col-sm-2" for="edit_publish">Publish Artwork: </label>
                  <div class="checkbox col-sm-4">
                  <label><input type="checkbox" id="edit_publish" name="publish" value="checked" 
                        <?php if ($result[0]["status"] == 'Published') echo "checked='checked'"; ?>>Publish </label>
                  </div>
                </div>

            <?php endif; ?>


         <div class="form-group">
          <div class="col-sm-offset-3 col-sm-2">
            <button type="submit" name="edit_submit" id="edit_submit" class="btn btn-default has-spinner">
              <span class="spinner"><i class="icon-spin icon-refresh"></i></span>
              Upload
            </button>
          </div>
          <div class="col-sm-6">
            <label id="edit_upload_status"></label>
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