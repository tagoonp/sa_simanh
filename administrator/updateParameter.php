<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),$p,trim($dbn));

if((!isset($_GET['group_id'])) || (!isset($_GET['var']))){
	?>
	<script>
    	alert('Parameter passing error!');
		window.location = './main.php?id=1&group_id=<?php print $_GET['group_id'];?>&tab_id=1';
    </script>
	<?php
	exit();	
}

$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."parameter_index WHERE pi_var = '".$_GET['var']."'";
$resultParametor = $db->select($strSQL,false,true);

if(!$resultParametor){
	?>
	<script>
    	alert('Parameter not found!');
		window.location = './main.php?id=1&group_id=<?php print $_GET['group_id'];?>&tab_id=1';
    </script>
	<?php
	exit();	
}

$strSQL = "UPDATE ".substr(strtolower($tbf),0,-2)."parameter_index SET 
		  pi_var = '".$_POST['var_label']."',
		  pi_title = '".$_POST['var_title']."',
		  pi_description = '".$_POST['var_description']."',
		  pi_req_status = '".$_POST['req_status']."',
		  pi_alt_msg = '".$_POST['alt_msg']."',
		  pi_subgroup = '".$_POST['input_subgroup']."',
		  pi_input_type = '".$_POST['setting_type']."',
		  pi_input_type_id = '".$_POST['input_type']."',
		  pi_confirm = '0'
		  WHERE pi_id = '".$resultParametor[0]['pi_id']."'";
	$resultUpdate = $db->update($strSQL);	
	
	//print $strSQL;
	//exit();  	
	?>
	<script>
    	alert('Update parameter success!');
		window.location = './main.php?id=1&group_id=<?php print $_GET['group_id'];?>&tab_id=1';
    </script>
	<?php
?>