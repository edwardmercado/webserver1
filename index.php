<?php
session_start();
if($_SESSION){
	header("Location: orders.php");
}
?>

<!DOCTYPE html>
<html>
<title>Karts Burger - Home</title>
<head>

<link rel = "stylesheet" rev = "stylesheet" href = "indexCss.css">

</head>
<body>

<div class = "logo">
	<img style = "height:100%; width:100%;" src = "Images/karts_logo.png"></img>
</div>

<div class = "logincon">
	<div id = "loginWord">
	Log in
	</div>
</div>

<div class = "login">
	<form method = "post" action = "loginsession.php" autocomplete = "off">
	<tr>
	<td><input type = "text" name = "txtuser" id = "txtuser" placeholder = "Username..." required></td>
	<td><input type = "password" name = "txtpass" id = "txtpass" placeholder = "Password..." required></td>
	<tr><td><input type = "submit" value = "Confirm" class = "sign"></td></td>
	</tr>
	</form>
</div>

<div class = "logborder">

</div>
 



</body>
</html>