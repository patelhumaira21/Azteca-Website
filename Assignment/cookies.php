<?php

require_once '../constants.php';

if (session_status() != PHP_SESSION_ACTIVE) {
   session_start();
}

function setCookieValue($key , $value){
	setcookie($key, $value, time()+(86400*30),BASE_URL);	
}


function getCookie($key){
	return $_COOKIE[$key];
}


function incrVisitCookie($key){
	if(!isset($_SESSION["Authenticated"])){

		if(!isset($_COOKIE[$key])){
			setcookie($key, 1 , time()+(86400*30),BASE_URL);	
		}
		else{
			$cookie_visitCount = (int)($_COOKIE[$key]);
			setcookie($key, ++$_COOKIE[$key], time()+(86400*30),BASE_URL);	
		}
	}
}


function updateIPCookie(){
	setcookie(LAST_IP, $_SERVER['REMOTE_ADDR'] , time()+(86400*30),BASE_URL);	
}

function checkTimeOut() {
	if(isset($_SESSION["Authenticated"])){

		if(isset($_SESSION['last_active_time'])) {
	        $duration = time() - (int)$_SESSION['last_active_time'];
	        if ($duration > TIME_OUT) {
	          session_destroy();
	          session_start();
	          $_SESSION["errors"] = '<p class=errors> Session TImed Out.
	                    Please login again.</p>';
	          $url = ".?pageId=6";
	          echo '<script language="javascript">';
	          echo 'alert("Session timed out due to in-activity. Please login again");';
	          echo 'window.location = "'. $url .'";';            
	          echo '</script>';
	          exit();
	        }
	        else{
	        	$_SESSION["last_active_time"] = time();
	        }
		}
		else{
		    	$_SESSION["last_active_time"] = time();
		}  

	}
	
}

?>