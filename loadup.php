<?php
session_start();
require_once('config.php');

if(!$_SESSION['username']){
	header("Location: error.php");
}
else{
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
}	

@mysql_connect(DB_SERVER, DB_USER, "") or die("not connected to database!");
mysql_select_db(DB_NAME);
	
$sql = mysql_query("SELECT * from tbl_user where username = '$username'");
	
if($sql){
	$rows = mysql_fetch_array($sql);
	$fname = $rows['firstname'];
	$lname = $rows['lastname'];
	$dbpassword = $rows['password'];
	if($password == $dbpassword){
		}
	else{
		header("Location: invalid.php");
	}
}
else{
	echo mysql_error();
}

if (isset($_GET['message'])) {
	echo '<script language="javascript">';
	echo "alert('$_GET[message]')";
	echo '</script>';
}


?>

<!DOCTYPE html>
<html>
<title>Karts Burger - Loadup</title>
<head>


<script src="jquery/jquery-1.3.2.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="jquery/jquery-ui-1.7.3.custom.min.js"></script>


<link rel="stylesheet" href="jquery/jquery-ui-1.8.16.custom.css" type="text/css" media="screen" charset="utf-8"/>
<link rel="stylesheet" href="dialog.css" type="text/css" media="screen" charset="utf-8"/>
<script src="jquery/jquery-1.3.2.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="jquery/jquery-ui-1.7.3.custom.min.js"></script>

<link rel = "stylesheet" rev = "stylesheet" href = "loadupCss.css">


<script type = "text/javascript" src = "naviBarScript.js"></script>
<script type = "text/javascript" src = "loadUpScript.js"></script>

</head>
<body>

<div class = "topBar">	
	<a href = "#"> pop </a>
	<img src = "images/drawer.png"></img>
	<div id = "title">
	Karts Burger and Restobar
	</div>
</div>

<div class = "dim">
</div>

<div class = "naviBar">
	<div class = "image">
		<img src = "images/user.png"></img>
	</div>
	<div id = "name"><?php echo $fname." ".$lname ?></div>
	<form action = "#" method = "post">
		<input type = "submit" value = "Profile" class = "profile"/>
	</form>
	<div class = "line1">
	</div>
	<form action = "orders.php" method = "post">
		<input type = "submit" value = "Orders" class = "orders"/>
	</form>
	<form action = "loadup.php" method = "post">
		<input type = "submit" value = "Load Up" class = "load"/>
	</form>
	<div class = "line2">
	</div>
	<form action = "sessiondestroy.php" method = "post">
		<input type = "submit" value = "Logout" class = "logout"/>
	</form>
	<div id = "footer">
		Karts Burger and Restobar<br>
		All Rights Reserved 2017
	</div>
</div>

<div class = "menuBar">
	<form action = "#" method = "post">
		<input type = "submit" value = "Add Funds" class = "add"/>
	</form>
	<form action = "#">
		<input type = "submit" value = "Load Up!" class = "load"/>
	</form>
</div>


<div id="dialog" title="Load Up!">
	<form id="loadValues" method="POST" action="processLoad.php">
	<p>Select User:</p>
	<select name = "cmbuser" id = "cmbuser">
	<?php 
		require_once('config.php');
		@mysql_connect(DB_SERVER, DB_USER, "") or die("not connected to database!");
		mysql_select_db(DB_NAME);
		$sql = mysql_query("SELECT * from tbl_user");
		while($rows = mysql_fetch_array($sql)){
		?><option><?php echo $rows['username'] ?></option><?php
		}
		?>
		</select>
		<?php
	
	?>
	<p>Enter Denomination:</p>
	<select name = "cmbamount" id = "cmbamount">
	<option> 50 </option>
	<option> 100 </option>
	<option> 300 </option>
	<option> 500 </option>
	</select>
	
	</form>
</div>



<div class = "loadHistory">
	<?php
		require_once('config.php');
		@mysql_connect(DB_SERVER, DB_USER, "") or die("not connected to database!");
		mysql_select_db(DB_NAME);
		
		$sql = mysql_query("SELECT * from tbl_load");
		
		if($sql){
			while($rows = mysql_fetch_array($sql)){
			$refnum = $rows['refNum'];
			$recepient = $rows['recepient'];
			$amount = $rows['load_amount'];
			$date = $rows['date'];
			?>
			<div class = "loadTable">
				<table>
					<tr><td>Reference Number: <?php echo $refnum ?>. <?php echo $recepient ?> has been loaded in a amount of Php<?php echo $amount ?>.00. Date: <?php echo $date ?></td></tr>
				</table>
			</div>
			<?php
			}
		}
	?>
</div>

<div class = "titleBar">
	<div id = "title">
	Load History
	</div>
</div>



</body>
</html>