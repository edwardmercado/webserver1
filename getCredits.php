<?php

require_once './includes/db_connect.php';

if($_SERVER['REQUEST_METHOD']=='GET'){

$db = new DbConnect();

$conn = $db->connect();

$id  = $_GET['id'];

$sql = "SELECT KartsCredits FROM tbl_users WHERE id='".$id."'";

$r = mysqli_query($conn,$sql);

$res = mysqli_fetch_array($r);

$result = array();

array_push($result,array(
"KartsCredits"=>$res['KartsCredits']));

echo json_encode(array("result"=>$result));

mysqli_close($conn);

}
?>