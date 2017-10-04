<?php
session_start();

if(!$_SESSION['username'] && !$_SESSION['password']){
	header("Location: error.php");
}
else{
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
}	

header('Content-Type: application/json');

require_once("class.database.inc");
$db = User::getInstance();
$db -> setUsername($_SESSION['username']);
$db -> setPassword($_SESSION['password']);
$db -> login();

$profile = $db -> getProfile();
$fname = $db -> getFirstname();
$lname = $db -> getLastname();

$year = date("Y");

//$sql2 = $db->query("Select totalPrice,month from tbl_graph where year = '$year'");
$sql2 = $db->query("SELECT sum(totalPrice) as totalPrice, year from tbl_graph group by year");

/* $stamon = $_POST['cmbMonthSta'];
$staday = $_POST['cmbDaySta'];
$stayear = $_POST['cmbYearSta'];

$finmon = $_POST['cmbMonthFin'];
$finday = $_POST['cmbDayFin'];
$finyear = $_POST['cmbYearFin'];

$start = $stamon."-".$staday."-".$stayear;
$fin = $finmon."-".$finday."-".$finyear;

$sql2 = $db->query("Select totalPrice,month from tbl_transaction where date between '$start' and '$fin' and year = '2017'"); */


	
$data = array();

foreach($sql2 as $row){
	$data[] = $row;
}

$sql2->close();

//close connection


print json_encode($data);

?>