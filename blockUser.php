<?php
session_start();
if(!$_SESSION['username'] && !$_SESSION['password']){
	header("Location: error.php");
}
else{
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
}

require_once('config.php');
@mysql_connect(DB_SERVER, DB_USER, "") or die("not connected to database!");
mysql_select_db(DB_NAME);

$id = $_GET['id'];

$sql = mysql_query("UPDATE tbl_user set blockctr = '3' where id = '$id'");

if($sql){
	echo '<script language="javascript">';
	echo 'alert("User Blocked"); location.href="userProfilesForm.php"';
	echo '</script>';
}
else{
	echo '<script language="javascript">';
	echo 'alert("Error blocking!"); location.href="userProfilesForm.php"';
	echo '</script>';
}
?>