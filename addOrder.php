<?php

if($_SERVER['REQUEST_METHOD']=='POST'){

$tableNo = $_POST['tableNo'];
$foodName = $_POST['foodName'];
$foodQty = $_POST['foodQty'];
$foodPrice = $_POST['foodPrice'];
$orderTotal = $_POST['orderTotal'];

//importing database connection script
require_once './includes/db_connect.php';
$db = new DbConnect();

$conn = $db->connect();
//Creating sql query
$sql = "INSERT INTO tbl_orders (id,TableNo,FoodName,FoodQty,FoodPrice,OrderTotal) VALUES ('0',$tableNo,$foodName,$foodQty,$foodPrice,$orderTotal)";

 //Updating database table
if (mysqli_query($conn,$sql)) {
echo 'Values Inserted';
}
else {
echo 'Status Not Inserted';
echo mysqli_errno;
}

//closing connection
mysqli_close($conn);
}

{ print_r($_POST); return; }