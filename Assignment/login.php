<?php

require ('site_connect.php');
require ('cookies.php');

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		$username = $_POST['username']; //get username
		$password = $_POST['password']; //get password    
		
		$page_title = 'Login page';
		$passmatch = false;

		$result = dbSelect("SELECT * FROM logins WHERE username = '".$username."'");
		//var_dump($result);
	 	if(sizeof($result) == 1) {
	 		//echo($result[0]["password"]);
	 		$dbhash = $result[0]["password"];
	 		//var_dump ($dbhash);
	 		$hashPass = hashPassword($password);
	 		//echo "PassHASH=".$hashPass;
	 		$passmatch = (strcmp($hashPass,$dbhash)==0);
	 		//echo "Password Match= ".$passmatch;
	 	}

 		if($passmatch) {
 			$role = $result[0]["role"];
 			if (session_status() != PHP_SESSION_ACTIVE) {
                  session_start();
            }
 			$_SESSION["last_active_time"] = time();
 			$_SESSION["role"] = $result[0]["role"];
 			$_SESSION["user_id"] = $result[0]["id"];
 			$_SESSION["username"] = $result[0]["username"];
 			$_SESSION["user_id"] = $result[0]["id"];
 			$_SESSION["first_name"] = $result[0]["first_name"];
 			
 			setCookieValue(LAST_IP,urldecode($_SERVER['REMOTE_ADDR']));
 			setCookieValue(LAST_ACTIVE_COOKIE,time());

 			switch($role) {
 				case 'ADMIN':
 					$url = "?pageId=7";
 					$_SESSION["Authenticated"] = true;
 					$_SESSION["level"] = ADMIN;
 					break;
 				case 'MEMBER':
					$url = "?pageId=8";
					$_SESSION["Authenticated"] = true;
					$_SESSION["level"] = MEMBER;
					break;
				case 'ARTIST':
					$url ="?pageId=7";
					$_SESSION["Authenticated"] = true;
					$_SESSION["level"] = ARTIST;
					break;
				case 'PUBLISHER':
					$url = "?pageId=7";
					$_SESSION["Authenticated"] = true;
					$_SESSION["level"] = PUBLISHER;
					break;
 				default:
 					$url = "?pageId=6";
 					if (isset($_SESSION["Authenticated"])) {
 						unset($_SESSION["Authenticated"]);
 					}
 					break;

 			}
			echo BASE_URL.$url;
		}
		else {
			echo "PASSWORD MISMATCH";
		}
	}

?>