<?php

session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),$p,trim($dbn));


$var = $_POST['checkbox'];
//print sizeof($var);
foreach($var as $v){
	$strSQL = "UPDATE ".substr(strtolower($tbf),0,-2)."parameter_index SET 
			  pi_confirm = '1' WHERE pi_id = '".$v."'";
	$resultUpdate = $db->update($strSQL);
	
	?>
	<script>
		alert('Update confirm status success!');
    	window.history.back();
    </script>
	<?php
}
?>