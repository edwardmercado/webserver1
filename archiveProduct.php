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

$sql = $db->query("UPDATE tbl_products SET archived = 'yes' WHERE prodId = '$id'");

if($sql){
	echo '<script language="javascript">';
	echo 'alert("Product Archived!"); location.href="productsForm.php"';
	echo '</script>';
}
else{
	echo '<script language="javascript">';
	echo 'alert("Error Archiving!"); location.href="productsForm.php"';
	echo '</script>';
}

?>