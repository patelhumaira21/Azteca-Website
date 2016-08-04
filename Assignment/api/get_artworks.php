<?php

require_once '../../constants.php';

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
function dbSelect($query){
 	$conn = dbConnect();
 	$stmt = $conn->query($query);
   	return  $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getData(){
	if (isset($_GET['list'])){
		$list = $_GET['list'];
		if($list == "all") {
			$query = "SELECT * FROM artworks WHERE best_seller = 1 AND status='Published'";
			$result = dbSelect($query);
			echo json_encode($result);

		}
		else{
			echo json_encode([]);
		}
	}
	else if(isset($_GET['ID'])){
		$id = $_GET['ID'];
		if($id) {
			$query = "SELECT * FROM artworks WHERE best_seller = 1 AND status='Published' AND artwork_id = ".$id;
			$result_id = dbSelect($query);
			if(isset($result_id[0]))
				echo json_encode($result_id[0]);
			else
				echo json_encode([]);

		}
	}
	else if(isset($_GET['TOP'])){
		$top = $_GET['TOP'];
		if((int)$top>0) {
			$query = "SELECT DISTINCT * FROM artworks WHERE best_seller = 1  AND status ='Published' ORDER BY number_sold DESC LIMIT ".$top;
			$result = dbSelect($query);
			echo json_encode($result);
		}
		else{
			echo json_encode([]);
		}
	}
	else{
		echo json_encode([]);
	}
}



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	getData();
}
else if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_SERVER['HTTP_AUTHORIZATION'])){
		$headerStringValue = $_SERVER['HTTP_AUTHORIZATION'];
		if($headerStringValue == "LETMEINPLEASE123"){
			getData();
		}
		else{
			echo "401: UNAUTHORIZED ACCESS";
			echo json_encode([]);
		}
	}
	else{
		echo "401: UNAUTHORIZED ACCESS - HEADER NOT FOUND";
		echo json_encode([]);
	}
}

?>