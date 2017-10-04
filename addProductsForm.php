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
<link rel = "stylesheet" rev = "stylesheet" href = "addProductsForm.css">
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
		<p>Add Product</p>
	</div>
	<form id="addProducts" method = "POST" enctype="multipart/form-data" action = "addProducts.php">
	<div class = "category">
	Select Category:<br>
	<select name = "cmbCategory" id = "cmbCategory">
	<?php
	$cat = array("Burgers","Drinks");
	?>
	<option><?php echo $cat[0] ?></option>
	<option><?php echo $cat[1] ?></option>
	</select>
	</div>
	<div class = "prodName">
	Product Name:<br>
	<input type = "text" id = "txtprodName" name = "txtprodName"/>
	</div>
	<div class = "prodPrice">
	Product Price:<br>
	<input type = "text" id = "txtprodPrice" name = "txtprodPrice"/>
	</div>
	<div class = "uploadPic">
	Upload Picture:<br>
		<div class="pic">
				<img id="output" style="height: 100%; width: 100%;"/>
		</div><p>
		</div>
		<input type='file' name="addrss" id="imgInput" onchange="loadFile(event)" class = "upload"/>
	
		<input type = "submit" value = "Confirm" class = "add"/>
		
	</form>
		<form action = "productsForm.php">
		<input type = "submit" value = "Cancel" class = "back"/>
		</form>
</div>

</body>
</html>