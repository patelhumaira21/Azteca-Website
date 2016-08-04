<?php

function didTimeout(){
	if(isset($_SESSION["Authenticated"])){

		if(isset($_SESSION['last_active_time'])) {
	        $duration = time() - (int)$_SESSION['last_active_time'];
	        if ($duration > TIME_OUT) {
	          session_destroy();
	          session_start();
	          return true;
	        }
	        else{
	        	$_SESSION["last_active_time"] = time();
	        	return false;
	        }
		}
		else{
		    	$_SESSION["last_active_time"] = time();
		    	return false;
		}  
	}
	return false;
}

    require_once ('site_connect.php');
    if(didTimeout()){
    	echo "TIMEOUT";
    }
    else{

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$action = $_GET['action'];
			
				switch($action) {
					case 'register':
						$last_name = $_POST['last_name']; 
						$first_name = $_POST['first_name'];
						$dob = $_POST['dob'] ;
						$username = $_POST['user_name']; 
						$email = $_POST['email'];
						$password = $_POST['password']; 
						$hashPass = hashPassword($password);
						$page_title = 'Register User';
						$select_query_result = dbSelect("SELECT * from logins where username = '".$username."'");
		 				$size = sizeof($select_query_result);
		 				$select_query_result_email = dbSelect("SELECT * from logins where email = '".$email."'");
		 				$size_email = sizeof($select_query_result_email);
						if($size != 0) {
							echo "DUPLICATE_USERNAME";
						}
						else if($size_email != 0) {
							echo "DUPLICATE_EMAIL";
						}
						else {
							$query = "INSERT INTO logins VALUES (NULL,'".$username."','".$email."','".$hashPass."','".$first_name."','".$last_name."',STR_TO_DATE('".$dob."','%m/%d/%Y'),now(),'MEMBER','MD5')";
							echo dbInsertUpdate($query) ?'SUCCESS': 'ERROR';	
						}
						break;
					case 'user':
						$artist_id = $_POST["artist_id"];
						$new_level = $_POST["new_level"];
						$query = "UPDATE logins SET role = '".$new_level."' WHERE id = $artist_id";
						echo dbInsertUpdate($query) ?'SUCCESS': 'ERROR';		
						break;
					case 'best-seller':
						$artwork_id = $_POST["artwork_id"];
						$best_seller = $_POST["best_seller"];
						$query = "UPDATE artworks SET best_seller = ".$best_seller." WHERE artwork_id = ".$artwork_id;
						echo dbInsertUpdate($query) ?'SUCCESS': 'ERROR';		
						break;
					case 'time':
						echo (didTimeout()) ? "TIMEOUT" : "SUCCESS";
		    			break;
		    		case 'images':	
		    			$result = dbSelect('SELECT artwork_id,image_name FROM artworks WHERE status="Published"');
						echo json_encode($result);
						break;
					default:
						echo "DEFAULT";
						break;
				}
			}

    }	
    
 ?>