<?php
	$val = $_GET['q'];
	require_once("class.database.inc");
	$db = User::getInstance();
	$sql = $db->query("select * from tbl_user where lastname like '$val%' and archived = 'yes'");
	
	?>
	<div class = "menuTable">
	<table border = "1"><tr>
	<th>Profile</th>
	<th>User ID</th>
	<th>User Full Name</th>
	<th>User Address</th>
	<th>Restore User</th>
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
				<td><a href = "archiveProduct.php?id=<?php echo $id ?>"><img src="Images/restore.png" style = "width:70px; height:24px;"></a></td></tr>
				<?php 
			}
		}

?>