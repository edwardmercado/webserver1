<?php

require_once './includes/db_connect.php';

if($_SERVER['REQUEST_METHOD']=='GET'){

$db = new DbConnect();

$conn = $db->connect();

$sql = "SELECT transactionId FROM tbl_customers ORDER BY id DESC LIMIT 1";

$r = mysqli_query($conn,$sql);

$res = mysqli_fetch_array($r);

$result = array();

array_push($result,array("transactionId"=>$res['transactionId']));

echo json_encode(array("result"=>$result));

mysqli_close($conn);

}
?>