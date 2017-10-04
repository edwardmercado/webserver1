<?php

require_once './includes/db_connect.php';

if($_SERVER['REQUEST_METHOD']=='GET'){

$db = new DbConnect();

$conn = $db->connect();


$sql = "SELECT * FROM tbl_pastas";

$r = mysqli_query($conn,$sql);

$array = array();

if($r){
	while ($row = mysqli_fetch_assoc($r)) $array[] = $row;
}

//$res = mysqli_fetch_array($r);

//$result = array();

//array_push($result,array(
//"Title"=>$res['Title']));

/*array_push($result,array(
"Desc"=>$res['Desc']));

array_push($result,array(
"Price"=>$res['Price']));

array_push($result,array(
"ImagePath"=>$res['ImagePath']));*/



echo json_encode(array("pasta_result"=>$array));

mysqli_close($conn);

}
?>