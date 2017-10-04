<?php
date_default_timezone_set('Asia/Manila');
$name = $_POST['cmbuser'];
$amount = $_POST['cmbamount'];
$date = date("m/d/Y h:i:sa");
$ref = rand(000000,100000);

require_once('config.php');
@mysql_connect(DB_SERVER, DB_USER, "") or die("not connected to database!");
mysql_select_db(DB_NAME);
$sql = mysql_query("INSERT into tbl_load(refNum, recepient, load_amount, date) values ('$ref', '$name', '$amount', '$date')");

if($sql){
	echo "successfully added";
	$message = "Successfully loaded";
	header("Location: loadup.php?message=".urlencode($message));
}
else{
	$message = "Load Error, try again";
	header("Location: loadup.php?message=".urlencode($message));
	echo mysql_error();
}

?>