<?php	
	$val = $_GET['q'];
	require_once("class.database.inc");
	$db = User::getInstance();
	$sqlSearch = $db->query("select * from tbl_products where prodDesc like '$val%' and archived = 'yes'");
	
	?>
	<div class = "menuTable">
	<table border = "1"><tr>
	<th>Product Image</th>
	<th>Product ID</th>
	<th>Product Name</th>
	<th>Product Price</th>
	<th>Restore Product</th></tr>	
	<?php
	
	if($sqlSearch){
			while($rows1 = $db->fetch_array($sqlSearch)){
				$imagesrc = $rows1['prodImgPath'];
				$name = $rows1['prodDesc'];
				$price = $rows1['prodPrice'];
				$id = $rows1['prodId'];
				?>
				
				
				<tr><td><img src = "<?php echo $imagesrc ?>" style = "width:24px; height:24px;"></img></td>
				<td><?php echo $id ?></td>
				<td><?php echo $name ?></td>
				<td><?php echo $price ?></td>
				<td><a href = "archiveProduct.php?id=<?php echo $id ?>"><img src="Images/restore.png" style = "width:70px; height:24px;"></a></td></tr>
				
				<?php 
			}
		}

?>