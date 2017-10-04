<?php
require_once('config.php');
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
$id = $db-> getId();

/* $result1 = $db -> count();
$result = 16;
json_encode($result); */


/* $con = @mysql_connect(DB_SERVER, DB_USER, DB_PASS);
$affect = mysql_affected_rows($con);
$affect1 = $db -> query("SELECT COUNT(transid) as 'Num' from tbl_transaction");
$rows1 = $db -> fetch_array($affect1);
$affect3 = $rows1['Num']; */


//$affect3 = $db->query("SELECT transid
//FROM information_schema.table_statistics
//WHERE table_schema = 'kartsserver' AND table_name='tbl_transaction'");
//echo $affect3;

$sql = $db->query("SELECT * FROM tbl_transaction ORDER BY transid DESC LIMIT 1");
$rows = $db->fetch_array($sql);
$send1 = $rows['send'];
$cashier1 = $rows['cashier'];
$transid1 = $rows['transid'];



?>

<html>
<title>Karts Burger - Orders</title>
<head>
<link rel="stylesheet" href="Jquery/jquery-ui-1.8.16.custom.css" type="text/css" />
<script src="Jquery/jquery-1.3.2.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="Jquery/jquery-ui-1.7.3.custom.min.js"></script>
<script src="Jquery/jquery.notify.min.js" type="text/javascript" ></script>
<link rel = "stylesheet" rev = "stylesheet" href = "ordersCss.css">

<script type = "text/javascript" src = "growl.js"></script>

<script>
$(document).ready(function(){
	notify();
	setInterval(function(){
	$('#labas').load("testOrders.php");
	$('#display').load("fetchOrders.php");
	notify();
	},3000);
});
</script>


</head>


<body>
<div id = "labas">
<?php
$sql = $db->query("SELECT * FROM tbl_transaction ORDER BY transid DESC LIMIT 1");
$rows = $db->fetch_array($sql);
$send1 = $rows['send'];
$cashier1 = $rows['cashier'];
$transid1 = $rows['transid'];
?>
<input type = "text" id = "txtaffect1" name = "txtaffect1" value = "<?php echo $send1 ?>"/>
<input type = "text" id = "txtaffect2" name = "txtaffect2" value = "<?php echo $cashier1 ?>"/>
<input type = "text" id = "txtaffect3" name = "txtaffect3" value = "<?php echo $transid1 ?>"/>
</div>

<div id = "growlNotif"></div>





<div class = "topBar">	
	<div id = "title">
	Administrative Panel
	</div>
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
	<form action = "productsForm.php?" method = "post">
		<img src = "Images/list.png" style = "height:4%; width:10%" class = "porders">
		<input type = "submit" value = "Products" class = "orders"/>
	</form>
	<form action = "archiveProductsForm.php?" method = "post">
		<img src = "Images/file.png" style = "height:3%; width:7%" class = "parcProd">
		<input type = "submit" value = "Product Archives" class = "arcProd"/>
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
	<form action = "addProductsForm.php">
		<input type = "submit" value = "Add Products" class = "add"/>
	</form>
</div>

<div class = "titleBar">
	<div id = "title">
	Pending Orders
	</div>	
</div>

<div class = "salesTrans" id = "display">
	<?php
		$topdiv = 15;
		$leftdiv = 10;
		$ctr = 0;
		$prodctr = 0;
			
		$sql = $db->query("SELECT * from tbl_transaction ORDER BY transid ASC");
		
		?>
		<div class = "menuTable">
		<table border = "1"><tr>
		<th>Transaction ID</th>
		<th>Orders</th>
		<th></th>
		<th>Total Price</th>
		<th>Date</th>
		<th>Cashier</th></tr>	
		<?php
			
			
		if($sql){
			while($rows = $db->fetch_array($sql)){
				$id = $rows['transid'];
				$orders = $rows['orders'];
				$price = $rows['totalPrice'];
				$date = $rows['date'];
				$cashier = $rows['cashier'];
				$qty = $rows['orderQty'];
				
				$order1 = explode(",",$orders);
				$quan = explode(",", $qty);
				//echo $quan[0];
				
				$countquan=count($quan);
				
				?>
				
				
				<tr><td><?php echo $id ?></td>
				<td><?php 
				for($j=0;$j<count($order1);$j++){
					echo $order1[$j];?><br/><?php
				}
				?></td>
				<td><?php 
				for($i=0;$i<count($quan);$i++){
					echo $quan[$i];?><br/><?php
				}
				?></td>
				<td><?php echo $price ?></td>
				<td><?php echo $date ?></td>
				<td><?php echo $cashier ?></td>
				<!--<td><a href = "updateProductsForm.php?id=<?php echo $id ?>"><img src="Images/update.png" style = "width:70px; height:24px;"></a></td>
				<td><a href = "archiveProduct.php?id=<?php echo $id ?>"><img src="Images/archive1.png" style = "width:70px; height:24px;"></a></td>-->
				</tr>
				
				<?php 
			}
		}
		
		
	?>
		</table>
		</div>
	
	
</div>







</body>
</html>