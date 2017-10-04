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
$address = $town.", ".$city.", ".$prov;


$myfile = $_FILES["addrss"]["name"];
$location = "Profile/$myfile";
$imagepath = $_FILES["addrss"]["tmp_name"];
move_uploaded_file($imagepath,$location);


$sqlend = mysql_query("SELECT count(id) as 'Num' from tbl_user");
	while($rows = mysql_fetch_array($sqlend)){
	
		$newID = $rows['Num']+1;
		if(strlen($newID) == 1){
			$id = 'U1000'.$newID;
		}else if(strlen($newID) == 2){
			$id = 'U100'.$newID;
		}else if(strlen($newID) == 3){
			$id = 'U10'.$newID;
		}else if(strlen($newID) == 4){
			$id = 'U10'.$newID;
		}
	}



$sql = mysql_query("INSERT into tbl_user(id,firstname, lastname, midname, sex, town, city, province, contactNum, username, password, userImg) values ('$id','$firstname', '$lastname', '$mid', '$sex', '$town', '$city', '$prov', '$num', '$username', '$password', '$location')");

if($sql){
	echo '<script language="javascript">';
    echo 'alert("Successfully Added!"); location.href="userProfilesForm.php"';
    echo '</script>';
}
else{
	echo '<script language="javascript">';
    echo 'alert("Adding Error!");';
    echo '</script>';
	echo mysql_error();
}

?>