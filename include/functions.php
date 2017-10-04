<?php
require_once ('connect.php');
//general functions

function logInUser ($con, $un, $pw) {
	
	$user = "select * from registered_members where name = '$un' and password = '$pw'";
	$user = mysql_query ($con, $user);
	if (mysql_num_rows($user) ==1 ){
		
		return true;
		
	} else{
		return false;
	}
}
?>