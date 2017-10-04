<?php

require_once("class.database.inc");
$db = User::getInstance();

$sql = $db->query("SELECT * FROM tbl_transaction ORDER BY transid DESC LIMIT 1");
$rows = $db->fetch_array($sql);
$send1 = $rows['send'];
$cashier1 = $rows['cashier'];
$transid1 = $rows['transid'];

?>
<html>
<link rel="stylesheet" href="Jquery/jquery-ui-1.8.16.custom.css" type="text/css" />
<script src="Jquery/jquery-1.3.2.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="Jquery/jquery-ui-1.7.3.custom.min.js"></script>
<script src="Jquery/jquery.notify.min" type="text/javascript" ></script>



<input type = "text" id = "txtaffect1" name = "txtaffect1" value = "<?php echo $send1 ?>"/>
<input type = "text" id = "txtaffect2" name = "txtaffect2" value = "<?php echo $cashier1 ?>"/>
<input type = "text" id = "txtaffect3" name = "txtaffect3" value = "<?php echo $transid1 ?>"/>

<script type = "text/javascript" src = "growl.js"></script>

</html>


<?php
$sqlres = $db->query("UPDATE tbl_transaction set send = 'yes'");
?>

