<?php
session_start();

$_SESSION['username'] = $_POST['txtuser'];
$_SESSION['password'] = $_POST['txtpass'];

header("Location: orders.php");
?>