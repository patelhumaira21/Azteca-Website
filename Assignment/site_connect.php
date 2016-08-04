<?php

require_once '../constants.php';
if (session_status() != PHP_SESSION_ACTIVE) {
   session_start();
}


function dbConnect() {
	$database_source = 'mysql:host='.HOSTNAME.'; dbname='.DBNAME;

	try {
		$conn = new PDO($database_source, USERNAME,PASSWORD);
		$dbstatus = true;
	} catch (PDOException $e) {
		$_SESSION["errors"] = "Error : ".$e->getMessage();
		$dbstatus = false;
	}
	return $conn;
}


function hashPassword($str){
    return hash("md5", $str);
}

function dbInsertUpdate($query){
	$conn = dbConnect();
	$stmt = $conn->prepare($query);
	return $stmt->execute();
}

function dbSelect($query){
 	$conn = dbConnect();
 	$stmt = $conn->query($query);
   	return  $stmt->fetchAll(PDO::FETCH_ASSOC);
 	// $stmt = $conn->prepare($query);
 	// $stmt->execute();
 	// $result = $stmt->fetch(PDO::FETCH_BOTH);
 	// var_dump($stmt);
 	// echo $result;

}

function uploadImage($source,$image_name){
	$target_dir = "_uploads/";
	$target_file = $target_dir . $image_name;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	return (move_uploaded_file($source, $target_file)) ;
	}
?>