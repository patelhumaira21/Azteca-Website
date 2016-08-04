    <form class="form-horizontal" id="artwork_upload_form" method="post" role="form" 
          action="" enctype="multipart/form-data">
    <h5>Please enter the following information to upload an Artwork:</h5>

    <div class="form-group">
      <label class="control-label col-sm-2" for="add_title">Title: </label>
      <div class="col-sm-4">
        <input type="text" id="add_title" name="title" class="form-control" placeholder="Enter Title"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="add_genre">Select Genre: </label>
      <div class="col-sm-4">
        <select class="form-control" id="add_genre" name="genre">
          <option>Abstract</option>
          <option>Advertisement</option>
          <option>Animal Painting</option>
          <option>Architecture</option>
          <option>Flower Painting</option>
          <option>History Painting</option>
          <option>Landscape</option>
          <option>Mosaic</option>
          <option>Panaroma</option>
          <option>Poster</option>
          <option>Potrait</option>
          <option>Sketch</option>
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="add_description">Description: </label>
      <div class="col-sm-4">
        <input type="text" id="add_description" name="description" class="form-control" placeholder="Enter Description"/>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="add_fileToUpload">Select Artwork: </label>
      <div class="col-sm-4">
        <input type="file" id="add_fileToUpload" name="fileToUpload" class="file" />
      </div>
    </div>

     <div class="form-group">
      <label class="control-label col-sm-2" for="thumbnail">Select Thumbnail Size: </label>
      <div class="col-sm-4">
        <div class="radio">
          <label><input type="radio" name="thumbnail" id="add_thumnail_32" value="32" checked="checked"/>32 x 32</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="thumbnail" id="add_thumnail_64" value="64" />64 x 64<label>
        </div>
        <div class="radio">
          <label><input type="radio" name="thumbnail" id="add_thumnail_128" value="128" />128 x 128</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="thumbnail" id="add_thumnail_256" value="256" />256 x 256</label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="teaser">Text on Teaser: </label>
      <div class="col-sm-4">
        <input type="text" id="add_teaser_text" name="teaser_text" value="" class="form-control" />
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="position">Position of text on Teaser: </label>
      <div class="col-sm-4">
        <div class="radio">
          <label><input type="radio" name="position" id="add_position_top" value="top" checked="checked"/>Top</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="position" id="add_position_middle" value="middle" />Middle<label>
        </div>
        <div class="radio">
          <label><input type="radio" name="position" id="add_position_bottom" value="bottom" />Bottom</label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="action">Select an Action: </label>
      <div class="col-sm-4">
        <div class="radio">
          <label><input type="radio" name="process_action" id="add_action_default" value="default" checked="checked"/>Default</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="process_action" id="add_action_blur" value="blur" />Blur Effect</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="process_action" id="add_action_emboss" value="emboss" />Embossing Effect<label>
        </div>
        <div class="radio">
          <label><input type="radio" name="process_action" id="add_action_edge" value="edge" />Edge Detection</label>
        </div>
        <div class="radio">
          <label><input type="radio" name="process_action" id="add_action_mirror" value="mirror" />Mirror Image</label>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2" for="author_text">Author Name for Book Cover:</label>
      <div class="col-sm-4">
        <input type="text" id="add_author_text" name="author" value="" class="form-control" />
      </div>
    </div>


    <?php if (session_status() != PHP_SESSION_ACTIVE) {
          session_start();
        }
    if($_SESSION["level"] >= PUBLISHER) :?>

      <div class="form-group" >
        <label class="control-label col-sm-2" for="add_price">Enter Price: </label>
        <div class="col-sm-4">
          <input type="number" id="add_price" name="price" class="form-control"  />
        </div>
      </div>

      <div class="form-group" >
        <label class="control-label col-sm-2" for="add_publish">Publish Artwork: </label>
        <div class="checkbox col-sm-4">
          <label><input type="checkbox" id="add_publish" name="publish" value="checked">Publish</label>
        </div>
      </div>
    <?php endif; ?>


    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-2">
        <button type="submit" name="add_submit" id="add_submit" class="btn btn-default has-spinner">
          <span class="spinner"><i class="icon-spin icon-refresh"></i></span>
          Upload
        </button>
      </div>
      <div class="col-sm-6">
        <label id="add_upload_status"></label>
      </div>
    </div>

  </form>