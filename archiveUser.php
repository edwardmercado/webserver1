<?php
session_start();
if(!$_SESSION['username'] && !$_SESSION['password']){
	header("Location: error.php");
}
else{
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
}	
require_once("class.database.inc");
$db = User::getInstance();
$id = $_GET['id'];

$sql = $db -> query("UPDATE tbl_user SET archived = 'yes' WHERE id = '$id'");

if($sql){
	echo '<script language="javascript">';
	echo 'alert("User Archived!"); location.href="userProfilesForm.php"';
	echo '</script>';
}
else{
	echo '<script language="javascript">';
	echo 'alert("Error Archiving!"); location.href="userProfilesForm.php"';
	echo '</script>';
}



?>