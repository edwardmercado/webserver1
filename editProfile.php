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
$firstname = $_POST['txtfirstname'];
$lastname = $_POST['txtlastname'];
$username = $_POST['txtusername'];
$mid = $_POST['txtmid'];
$password = $_POST['txtpassword'];
$num = $_POST['txtnum'];
$sex = $_POST['cmbSex'];
$town = $_POST['txtTown'];
$city = $_POST['txtCity'];
$prov = $_POST['txtProv'];

//$sqlpath = mysql_query("Select * from tbl_products where prodId = '$id'");
//$rows = mysql_fetch_array($sqlpath);
//$path1 = $rows['prodImgPath'];

$path1 = $_POST['txtpath'];

$myfile = $_FILES["addrss"]["name"];
$location = "Menu/$myfile";
$imagepath = $_FILES["addrss"]["tmp_name"];
move_uploaded_file($imagepath,$location);


if($myfile==null){
	$sql = mysql_query("UPDATE tbl_admin set firstname = '$firstname', lastname = '$lastname', midname = '$mid', sex = '$sex' , town = '$town' , city = '$city', province = '$prov', contactNum = '$num', username = '$username', password = '$password', userImg = '$path1' where id = '$id'");
	
	if($sql){ 
		echo '<script language="javascript">';
		echo 'alert("Successfully Updated!"); location.href="userProfilesForm.php"';
		echo '</script>';
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Update Error!");';
		echo '</script>';
		echo mysql_error();
	}
}
elseif($myfile){
	$sql = mysql_query("UPDATE tbl_admin set firstname = '$firstname', lastname = '$lastname', midname = '$mid', sex = '$sex' , town = '$town' , city = '$city', province = '$prov', contactNum = '$num', username = '$username', password = '$password', userImg = '$location' where id = '$id'");
	if($sql){ 
		echo '<script language="javascript">';
		echo 'alert("Successfully Updated!"); location.href="userProfilesForm.php"';
		echo '</script>';
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Successfully Updated!");';
		echo '</script>';
		echo mysql_error();
	}
}
else{
	echo mysql_error();
}





?>