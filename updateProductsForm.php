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
<link rel = "stylesheet" rev = "stylesheet" href = "updateProductsForm.css">
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
		<p>Update Product</p>
	</div>
	<?php
	$ctr = 0;
	$id = $_GET['id'];
	$sqlCmb = mysql_query("SELECT * from tbl_products where prodId = '$id'");
	while($rows = mysql_fetch_array($sqlCmb)){
		$prodCad = $rows['prodCategory'];
		$prodName = $rows['prodDesc'];
		$prodPrice = $rows['prodPrice'];
		$prodImg = $rows['prodImgPath'];
	
	?>
	<form id="addProducts" method = "POST" enctype="multipart/form-data" action = "updateProducts.php?id=<?php echo $id ?>">
	<div class = "category">
	Select Category:<br>
	<select name = "cmbCategory" id = "cmbCategory">
	<option selected>
	<?php echo $prodCad ?>
	</option>
	<option>Drinks</option>
	<option>Burgers</option>
	</select>
	</div>
	<div class = "prodName">
	Product Name:<br>
	<input type = "text" id = "txtprodName" name = "txtprodName" value = "<?php echo $prodName ?>"/>
	</div>
	<div class = "prodPrice">
	Product Price:<br>
	<input type = "text" id = "txtprodPrice" name = "txtprodPrice" value = "<?php echo $prodPrice ?>"/>
	</div>
	<div class = "uploadPic">
	Upload Picture:<br>
		<div class="pic">
				<img id="output" style="height: 100%; width: 100%;" src = "<?php echo $prodImg ?>"/>
		</div><p>
		</div>
		<input type = "text" id = "txtpath" name = "txtpath" value = "<?php echo $prodImg ?>" style = "display:none"/>
		<input type="file" name="addrss" id="imgInput" onchange="loadFile(event)" class = "upload"/>
		
		<input type = "submit" value = "Confirm" class = "add"/>
		
	</form>
		<form action = "productsForm.php">
			<input type = "submit" value = "Cancel" class = "back"/>
		</form>
	<?php
	}
	?>
</div>

</body>
</html>