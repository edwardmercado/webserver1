<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'mailing';

$con = @mysql_connect ($host, $user, $pass, $db);

// Check connection
if (mysql_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysql_connect_error();
}
?>