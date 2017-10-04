<?php
session_start();
if(!$_SESSION['username']){
	header("Location: error.php");
}
else{
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
}


require_once('config.php');
@mysql_connect(DB_SERVER, DB_USER, "") or die("not connected to database!");
mysql_select_db(DB_NAME);

$prodCat = $_POST['cmbCategory'];
$prodPrice = $_POST['txtprodPrice'];
$prodName = $_POST['txtprodName'];


$myfile = $_FILES["addrss"]["name"];
$location = "Menu/$myfile";
$imagepath = $_FILES["addrss"]["tmp_name"];
move_uploaded_file($imagepath,$location);

if($prodCat=="Drinks"){
	$sqlend = mysql_query("SELECT count(prodId) as 'Num', prodCategory from tbl_products group by prodCategory");
	while($rows = mysql_fetch_array($sqlend)){
		
		//echo $rows['Num'].' '.$rows['prodCategory'].'<br>';
		if($rows['prodCategory'] == 'Drinks'){
			$newID = $rows['Num']+1;
			if(strlen($newID) == 1){
				$id = 'D00'.$newID;
			}else if(strlen($newID) == 2){
				$id = 'D0'.$newID;
			}else if(strlen($newID) == 3){
				$id = 'D'.$newID;
			}
		}
	}
}

else if($prodCat=="Burgers"){
	$sqlend = mysql_query("SELECT count(prodId) as 'Num', prodCategory from tbl_products group by prodCategory");
	while($rows = mysql_fetch_array($sqlend)){
		
		//echo $rows['Num'].' '.$rows['prodCategory'].'<br>';
		if($rows['prodCategory'] == 'Burgers'){
			$newID = $rows['Num']+1;
			if(strlen($newID) == 1){
				$id = 'B00'.$newID;
			}else if(strlen($newID) == 2){
				$id = 'B0'.$newID;
			}else if(strlen($newID) == 3){
				$id = 'B'.$newID;
			}
		}
	}
}


$sql = mysql_query("INSERT into tbl_products(prodCategory, prodId, prodDesc, prodPrice, prodImgPath) values ('$prodCat', '$id', '$prodName', '$prodPrice', '$location')");

if($sql){
	echo '<script language="javascript">';
    echo 'alert("Successfully Added!"); location.href="productsForm.php"';
    echo '</script>';
}
else{
	echo '<script language="javascript">';
    echo 'alert("Adding Error");';
    echo '</script>';
	echo mysql_error();
}

?>