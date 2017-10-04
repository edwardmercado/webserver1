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
$db -> setUsername($_SESSION['username']);
$db -> setPassword($_SESSION['password']);
$db -> login();

$profile = $db -> getProfile();
$fname = $db -> getFirstname();
$lname = $db -> getLastname();
$id = $db->getId();

$sqlreset = $db->query("UPDATE tbl_graph SET totalPrice = 0");

$months = array();
$monTotal = array();

$ctr1 = 0;
$sql = $db->query("Select totalPrice,month from tbl_transaction ORDER BY transid");
while($row = $db->fetch_array($sql)){
	$months[$ctr1] = $row['month'];
	$monTotal[$ctr1] = $row['totalPrice'];
	$ctr1++;
}

$sql1 = $db->query("Select totalPrice,month from tbl_graph");
$thismonths = array();
$i = 0;
while($row1 = $db->fetch_array($sql1)){
	$thismonths[$i] = $row1['month'];
	$thisprice[$i] = $row1['totalPrice'];
	$i++;
}

for($j=0; $j < count($thismonths); $j++){
	$newPrice = 0;
	for($k = 0; $k < count($months); $k++){
		if($thismonths[$j] == $months[$k]){
			$curPrice = $thisprice[$j] + $monTotal[$k];
			$newPrice = $newPrice + $curPrice;
		}
	}
	$sql3 = $db->query("Update tbl_graph set totalPrice = $newPrice where month = '$thismonths[$j]'");
}



?>
<html>
<title>Karts Burger - Reports</title>
<head>

<script src="jquery/jquery-1.3.2.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="jquery/jquery-ui-1.7.3.custom.min.js"></script>
<script type="text/javascript" src="jquery/morris.js"></script>
<script src="jquery/morris.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="jquery/raphael.min.js"></script>
<script type="text/javascript" src="jquery/chart.min.js"></script>
<script type="text/javascript" src="jquery/chartapp.js"></script>
<script type="text/javascript" src="jquery/chartappYear.js"></script>

<script type="text/javascript" src="nextDrinks.js"></script>
<link rel = "stylesheet" rev = "stylesheet" href = "generateReportsForm.css">

</head>
<body>
<div class = "topBar">	
	<div id = "title">
	Administrative Panel
	</div>
</div>

<div class = "dim">
</div>

<div class = "naviBar">
	<div class = "userProf">
		<div class = "naviBarpic">
			<img src = "<?php echo $profile ?>" style = "height:100%; width:100%; border-radius:33px;"></img>
		</div>
		<div id = "name"><?php echo $fname." ".$lname ?>
		</div>
		<div class = "editprof">
		<a href = "editProfileForm.php?id=<?php echo $id ?>">Edit Profile</a>
		</div>
	</div>
	<form action = "orders.php" method = "post">
		<img src = "Images/admin.png" style = "height:4%; width:10%" class = "padmin">
		<input type = "submit" value = "Administrator" class = "admin"/>
	</form>
	<form action = "userProfilesForm.php" method = "post">
		<img src = "Images/user1.png" style = "height:4%; width:10%" class = "pusers">
		<input type = "submit" value = "User Profiles" class = "profile"/>
	</form>
	<form action = "addUserForm.php" method = "post">
		<img src = "Images/add.png" style = "height:3%; width:7%" class = "paddUser">
		<input type = "submit" value = "Add User" class = "addUser"/>
	</form>
	<form action = "userArchiveForm.php?" method = "post">
		<img src = "Images/file.png" style = "height:3%; width:7%" class = "parcUser">
		<input type = "submit" value = "User Archives" class = "arcUser"/>
	</form>
	<!--<div class = "line1">
	</div>-->
	<form action = "addProductsForm.php?" method = "post">
		<img src = "Images/add.png" style = "height:3%; width:7%" class = "paddProd">
		<input type = "submit" value = "Add Products" class = "addProd"/>
	</form>
	<form action = "archiveProductsForm.php?" method = "post">
		<img src = "Images/file.png" style = "height:3%; width:7%" class = "parcProd">
		<input type = "submit" value = "Product Archives" class = "arcProd"/>
	</form>
	<form action = "ProductsForm.php?" method = "post">
		<img src = "Images/list.png" style = "height:4%; width:10%" class = "porders">
		<input type = "submit" value = "Products" class = "orders"/>
	</form>
	<form action = "generateReportsForm.php?" method = "post">
		<img src = "Images/report.png" style = "height:4%; width:10%" class = "preport">
		<input type = "submit" value = "Reports" class = "report"/>
	</form>
	<div class = "line2">
	</div>
	<form action = "sessiondestroy.php" method = "post">
		<img src = "Images/logout.png" style = "height:4%; width:10%" class = "plogout">
		<input type = "submit" value = "Logout" class = "logout"/>
	</form>
	<div id = "footer">
		Karts Burger and Restobar<br>
		All Rights Reserved 2017
	</div>
</div>

<div class = "menuBar">
	<form action = "#">
		<input type = "submit" value = "View Archive" class = "add"/>
	</form>
	<form action = "#">
		<input type = "submit" value = "Generate Reports" class = "gen"/>
	</form>
</div>


<div class = "menutitleBar">
	<div id = "title">
	Reports
	</div>
	<div class = "nextimg">
		<img src = "Images/arrow.png">
	</div>
	<div class = "previmg">
		<img src = "Images/arrow2.png">
	</div>
	<div class = "next">
		<a href = "#">next</a>
	</div>
	<div class = "prev">
		<a href = "#">prev</a>
	</div>
</div>

<div class = "menuList active" id = "display">
	<div id = "chart-container">
		<canvas id = "mycanvas"></canvas>
	</div>
</div>

<div class = "menuList" id = "display">
	<div id = "chart-container2">
		<canvas id = "mycanvas2"></canvas>
	</div>
</div>


</body>
</html>