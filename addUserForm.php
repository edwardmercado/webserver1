<?php
session_start();
if(!$_SESSION['username'] && !$_SESSION['password']){
	header("Location: error.php");
}
else{
	$username = $_SESSION['username'];
	$password = $_SESSION['password'];
}	
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
		<p>Add User</p>
	</div>
	<form id="addProducts" method = "POST" enctype="multipart/form-data" action = "addUser.php">
	<div class = "firstname">
	First Name:<br>
	<input type = "text" id = "txtfirstname" name = "txtfirstname" />
	</div>
	<div class = "lastname">
	Last Name:<br>
	<input type = "text" id = "txtlastname" name = "txtlastname"/>
	</div>
	<div class = "midname">
	Middle Name:<br>
	<input type = "text" id = "txtmid" name = "txtmid"/>
	</div>
	
	<div class = "addressTown">
		Town:
		<input type = "text" id = "txtTown" name = "txtTown"/>
	</div>
	<div class = "addressCity">
		City:
		<input type = "text" id = "txtCity" name = "txtCity"/>
	</div>
	<div class = "addressProv">
		Province:
		<input type = "text" id = "txtProv" name = "txtProv"/>
	</div>
	<div class = "username">
	Username:<br>
	<input type = "text" id = "txtusername" name = "txtusername"/>
	</div>
	<div class = "password">
	Password:<br>
	<input type = "password" id = "txtpassword" name = "txtpassword"/>
	</div>
	<div class = "number">
	Contact Number:
	<input type = "text" id = "txtnum" name = "txtnum"/>
	</div>
	<div class = "sex">
	Select Sex:<br>
	<select name = "cmbSex" id = "cmbSex">
	<option>Male</option>
	<option>Female</option>
	</select>
	</div>
	<div class = "uploadPic">
		<div class="pic">
				<img id="output" style="height: 100%; width: 100%; border-radius:50%;"/>
		</div><p>
		</div>
		<input type='file' name="addrss" id="imgInput" onchange="loadFile(event)" class = "upload"/>
	
		<input type = "submit" value = "Confirm" class = "add"/>
		
	</form>
		<form action = "userProfilesForm.php">
		<input type = "submit" value = "Cancel" class = "back"/>
		</form>
</div>

</body>
</html>