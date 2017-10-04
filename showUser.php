<?php
	$val = $_GET['q'];
	require_once("class.database.inc");
	$db = User::getInstance();
	$sql = $db->query("select * from tbl_user where lastname like '$val%' and archived = 'no'");
	
	?>
	<div class = "menuTable">
	<table border = "1"><tr>
	<th>Profile</th>
	<th>User ID</th>
	<th>User Full Name</th>
	<th>User Address</th>
	<th>Block Status</th>
	<th>Update User</th>
	<th>Archive User</th>
	</tr>
	<?php
	
	if($sql){
			while($rows = $db->fetch_array($sql)){
				$name = $rows['lastname'].", ".$rows['firstname']." ".$rows['midname'];
				$id = $rows['id'];
				$img = $rows['userImg'];
				$blk = $rows['blockctr'];
				$address = $rows['town'].", ".$rows['city'].", ".$rows['province'];
				?>
				
				
				<tr><td><img src = "<?php echo $img ?>" style = "width:24px; height:24px;"></td>
				<td><?php echo $id ?></td>
				<td><?php echo $name ?></td>
				<td><?php echo $address ?></td>
				<?php 
				if($blk<3){
					?><td><a href = "updateProductsForm.php?id=<?php echo $id ?>"><img src="Images/block.png" style = "width:70px; height:24px;"></a></td><?php
				}
				else{
					?><td><a href = "updateProductsForm.php?id=<?php echo $id ?>"><img src="Images/unblock.png" style = "width:70px; height:24px;"></a></td><?php
				}
				?>
				<td><a href = "updateProductsForm.php?id=<?php echo $id ?>"><img src="Images/update.png" style = "width:70px; height:24px;"></a></td>
				<td><a href = "archiveProduct.php?id=<?php echo $id ?>"><img src="Images/archive1.png" style = "width:70px; height:24px;"></a></td></tr>
				<?php 
			}
		}

?>