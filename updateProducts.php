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
$prodCat = $_POST['cmbCategory'];
$prodPrice = $_POST['txtprodPrice'];
$prodName = $_POST['txtprodName'];

//$sqlpath = mysql_query("Select * from tbl_products where prodId = '$id'");
//$rows = mysql_fetch_array($sqlpath);
//$path1 = $rows['prodImgPath'];

$path1 = $_POST['txtpath'];

$myfile = $_FILES["addrss"]["name"];
$location = "Menu/$myfile";
$imagepath = $_FILES["addrss"]["tmp_name"];
move_uploaded_file($imagepath,$location);


if($myfile==null){
	$sql = mysql_query("UPDATE tbl_products set prodCategory = '$prodCat', prodDesc = '$prodName', prodPrice = '$prodPrice' , prodImgPath = '$path1' where prodId = '$id'");
	
	if($sql){ 
		echo '<script language="javascript">';
		echo 'alert("Successfully Updated!"); location.href="productsForm.php"';
		echo '</script>';
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Update Error!"); location.href="index.php"';
		echo '</script>';
		echo mysql_error();
	}
}
elseif($myfile){
	$sql = mysql_query("UPDATE tbl_products set prodCategory = '$prodCat', prodDesc = '$prodName', prodPrice = '$prodPrice' , prodImgPath = '$location' where prodId = '$id'");
	if($sql){ 
		echo '<script language="javascript">';
		echo 'alert("Successfully Updated!"); location.href="productsForm.php"';
		echo '</script>';
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Successfully Updated!"); location.href="productsForm.php"';
		echo '</script>';
		echo mysql_error();
	}
}
else{
	echo mysql_error();
}





?>