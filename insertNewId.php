<?php

require_once './includes/db_operations.php';

$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(
		isset($_POST['transactionId'])){
		
		$db = new DbOperations();
		
		$result = $db->insertNewId($_POST['transactionId']);
		if($result == 1){
			$response['error'] = false;
			$response['message'] = "New ID Registered";
		}else if ($result == 2){
			$response['error'] = true;
			$response['message'] = "Some error occured please try again";
		}else if ($result == 0){
			$response['error'] = true;
			$response['message'] = "ID Already Exists";
		}
	}else{
		$response['error'] = true;
		$response['message'] = "Required fields are missing";
	}
}else{
	$response['error'] = true;
	$response['message'] = "Invalid Request";
}

echo json_encode($response);