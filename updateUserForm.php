<?php
session_start();
require_once('config.php');
if(!$_SESSION['username'] && !$_SESSION['password']){
	header("Location: error.php");
}
else{
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
}	
@mysql_connect(DB_SERVER, DB_USER, "") or die("not connected to database!");
mysql_select_db(DB_NAME);
?>
<html>
<head>
<link rel = "stylesheet" rev = "stylesheet" href = "addUserForm.css">
<script>
	var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>

</head>
<body>
<div class ="dialog">
	<div class = "dialogTitle">
		<p>Update User</p>
	</div>
	<?php
	$ctr = 0;
	$id = $_GET['id'];
	$sqlCmb = mysql_query("SELECT * from tbl_user where id = '$id'");
	while($rows = mysql_fetch_array($sqlCmb)){
		$first = $rows['firstname'];
		$last = $rows['lastname'];
		$mid = $rows['midname'];
		$sex = $rows['sex'];
		$town = $rows['town'];
		$city = $rows['city'];
		$prov = $rows['province'];
		$con = $rows['contactNum'];
		$user = $rows['username'];
		$password = $rows['password'];
		$img = $rows['userImg'];
	
	?>
	<form id="addProducts" method = "POST" enctype="multipart/form-data" action = "updateUser.php?id=<?php echo $id ?>">
	<div class = "firstname">
	First Name:<br>
	<input type = "text" id = "txtfirstname" name = "txtfirstname" value = "<?php echo $first ?>"/>
	</div>
	<div class = "lastname">
	Last Name:<br>
	<input type = "text" id = "txtlastname" name = "txtlastname" value = "<?php echo $last ?>"/>
	</div>
	<div class = "midname">
	Middle Name:<br>
	<input type = "text" id = "txtmid" name = "txtmid" value = "<?php echo $mid ?>"/>
	</div>
	
	<div class = "addressTown">
		Town:
		<input type = "text" id = "txtTown" name = "txtTown" value = "<?php echo $town ?>"/>
	</div>
	<div class = "addressCity">
		City:
		<input type = "text" id = "txtCity" name = "txtCity" value = "<?php echo $city ?>"/>
	</div>
	<div class = "addressProv">
		Province:
		<input type = "text" id = "txtProv" name = "txtProv" value = "<?php echo $prov ?>"/>
	</div>
	<div class = "username">
	Username:<br>
	<input type = "text" id = "txtusername" name = "txtusername" value = "<?php echo $user ?>"/>
	</div>
	<div class = "password">
	Password:<br>
	<input type = "password" id = "txtpassword" name = "txtpassword" value = "<?php echo $password ?>"/>
	</div>
	<div class = "number">
	Contact Number:
	<input type = "text" id = "txtnum" name = "txtnum" value = "<?php echo $con ?>"/>
	</div>
	<div class = "sex">
	Select Sex:<br>
	<select name = "cmbSex" id = "cmbSex">
	<option selected>
	<?php echo $sex ?>
	</option>
	<option>Male</option>
	<option>Female</option>
	</select>
	</div>
	<div class = "uploadPic">
		<div class="pic">
				<img id="output" style="height: 100%; width: 100%; border-radius:50%;" src = "<?php echo $img ?>"/>
		</div><p>
		</div>
		<input type='file' name="addrss" id="imgInput" onchange="loadFile(event)" class = "upload"/>
		<input type = "text" id = "txtpath" name = "txtpath" value = "<?php echo $img ?>" style = "display:none"/>
		<input type = "submit" value = "Confirm" class = "add"/>
		
	</form>
		<form action = "userProfilesForm.php">
		<input type = "submit" value = "Cancel" class = "back"/>
		</form>
	<?php
	}
	?>
</div>

</body>
</html>