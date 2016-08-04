<?php


function doneUpload(){
	echo "SUCCESS";
	exit();
}

function  doneError(){
	echo "ERROR";
	exit();
}

require ('site_connect.php');
require_once ("cookies.php");
checkTimeOut();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$action = $_GET['action'];

		if ($action=="delete"){ 
			$artwork_id = $_POST['artwork_id'];
			$query = "DELETE FROM artworks WHERE artwork_id = ".$artwork_id;
			$success = dbInsertUpdate($query);

			if($success) {
				echo '<script language="javascript">';
				echo 'alert("Artwork deleted successfully");';
				echo 'window.location = ".?pageId=7";';
				echo '</script>';
				exit();
			}
			else {
				echo '<script language="javascript">';
				echo 'alert("Artwork deleted successfully");';
				echo 'window.location = ".?pageId=7";';
				echo '</script>';
				exit();
			}
		}
		else {
			$title = $_POST['title']; 
			$genre = $_POST['genre']; 
			$description = $_POST['description']; 
			$image_name = basename($_FILES["fileToUpload"]["name"]);
			$price = 0;
			$publish_check = null;
			$thumbnail_size = $_POST['thumbnail']; 
			$teaser_text = $_POST['teaser_text'];
			$position = $_POST	['position'];
			$process_action = $_POST['process_action'];
			$author = $_POST['author'];


			if($_SESSION['level'] > ARTIST){
				$price = $_POST['price'];
				$publish_check = isset($_POST['publish'])? $_POST['publish']: 'unchecked'; 
			}

			if($action=="edit"){
				$artist_id = $_POST['artist_id'];
				$artwork_id = $_POST['artwork_id'];
				$existing_image = $_POST['existing_img'];
			}
			$page_title = 'Artwork Upload';
			$publish = ($publish_check == 'checked') ? "Published" : "Not Published";

			if(!$price){
				$price = 0;
			}
				
			if($action == 'add') {
				$query = "INSERT INTO artworks VALUES (NULL,'".$title."','".$genre."','".
					$description."','".$image_name."',".$price.",'".$publish."',".$_SESSION['user_id'].",0,".$thumbnail_size.",'".$teaser_text."','".$position."','".$process_action."','".$author."')";
				// if(uploadImage($_FILES["fileToUpload"]["tmp_name"],$image_name)){
					$success = dbInsertUpdate($query);
					if($success){
						doneUpload();
					}
					else{
						doneError();
					}
				// }
				// else{
				// 	doneError("Sorry the image couldnot be uploaded. Try again");
				// }
			}
			else {
				// $dontUpload = false;
				if(empty($image_name)){
					$image_name = $existing_image;
					// $dontUpload = true;
				}
				
					$query = "UPDATE artworks SET title='".$title."',genre='".$genre."',description='".$description."',image_name='"
							.$image_name."',price=".$price.",status='".$publish."',artist_id=".$artist_id.",best_seller=0,thumbnail_size="
							.$thumbnail_size.",teaser_text='".$teaser_text."',text_position='".$position."', process_action='".$process_action."', teaser_text='"
							.$teaser_text."',author_name='".$author."' WHERE artwork_id= $artwork_id";

					// if($dontUpload || uploadImage($_FILES["fileToUpload"]["tmp_name"],$image_name)){
						$success = dbInsertUpdate($query);
						if($success){
							doneUpload();
						}
						else{
							doneError();
						}
					// }
					// else{
					// 	doneError("Sorry the image could not be uploaded. Try again");
					// }
			}
		}
	}
?>