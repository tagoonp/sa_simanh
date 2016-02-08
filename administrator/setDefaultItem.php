<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),$p,trim($dbn));

//Checking parameter
if((!isset($_GET['col_id'])) || (!isset($_GET['an']))){
	//Parameter not receive
	$db->disconnect();
			?>
			<script>
				alert('Parametor error!');
				window.history.back();
			</script>
			<?php
			exit();
	
	
}else{
	$strSQL = "UPDATE ".substr(strtolower($tbf),0,-2)."choice_collection SET
			  col_confirm = '1' WHERE col_id = '".$_GET['col_id']."'";	
	$resultUpdate1 = $db->update($strSQL);
	
	$strSQL = "UPDATE ".substr(strtolower($tbf),0,-2)."choice_collection SET
			  col_confirm = '0' WHERE col_id <> '".$_GET['col_id']."' and pi_id = '".$_GET['an']."'";
	$resultUpdate2 = $db->update($strSQL);
	
	$strSQL = "UPDATE ".substr(strtolower($tbf),0,-2)."parameter_index SET
			  pi_input_value_default = '".$_GET['col_id']."' WHERE pi_id = '".$_GET['an']."'";
	$resultUpdate3 = $db->update($strSQL);
	
	//print $strSQL;
	//exit();
	
	?>
			<script>
				alert('Set default item success!');
				window.history.back();
			</script>
			<?php
			exit();
	
}
?>