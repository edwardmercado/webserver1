<?php
require_once("class.database.inc");
$db = User::getInstance();
?>

<div class = "salesTrans" id = "display" style = "position:absolute; top:0%; left:0;width:100%;">
	<?php
		$topdiv = 15;
		$leftdiv = 10;
		$ctr = 0;
		$prodctr = 0;
			
		$sql = $db->query("SELECT * from tbl_transaction ORDER BY transid ASC");
		
		?>
		<div class = "menuTable">
		<table border = "1"><tr>
		<th>Transaction ID</th>
		<th>Orders</th>
		<th></th>
		<th>Total Price</th>
		<th>Date</th>
		<th>Cashier</th></tr>	
		<?php
			
			
		if($sql){
			while($rows = $db->fetch_array($sql)){
				$id = $rows['transid'];
				$orders = $rows['orders'];
				$price = $rows['totalPrice'];
				$date = $rows['date'];
				$cashier = $rows['cashier'];
				$qty = $rows['orderQty'];
				
				$order1 = explode(",",$orders);
				$quan = explode(",", $qty);
				//echo $quan[0];
				
				$countquan=count($quan);
				?>
				
				
				<tr><td><?php echo $id ?></td>
				<td><?php 
				for($j=0;$j<count($order1);$j++){
					echo $order1[$j];?><br/><?php
				}
				?></td>
				<td><?php 
				for($i=0;$i<count($quan);$i++){
					echo $quan[$i];?><br/><?php
				}
				?></td>
				<td><?php echo $price ?></td>
				<td><?php echo $date ?></td>
				
				<td><?php echo $cashier ?></td>
				<!--<td><a href = "updateProductsForm.php?id=<?php echo $id ?>"><img src="Images/update.png" style = "width:70px; height:24px;"></a></td>
				<td><a href = "archiveProduct.php?id=<?php echo $id ?>"><img src="Images/archive1.png" style = "width:70px; height:24px;"></a></td>-->
				</tr>
				
				<?php 
			}
		}
		
		
	?>
		</table>
		</div>
	
	
</div>
