<?php
session_start();
include "../../lib/server-config.php";

require("../../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),$p,trim($dbn));

if(!isset($_GET['group_id'])){
	?>
	<script>
    	alert('Parameter error!');
		window.location = './index.php';
    </script>
	<?php
	exit();	
}

$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."fmn1_parameter_index WHERE 1";
$resultParametor = $db->select($strSQL,false,true);

$order = 1;
if($resultParametor){
	if(sizeof($resultParametor)!=0){
		$strSQL = "SELECT pi_ordering FROM ".substr(strtolower($tbf),0,-2)."fmn1_parameter_index order by pi_ordering desc";
		$reultOrder = $db->select($strSQL,false,true);
		if($reultOrder){
			$order = $reultOrder[0]['pi_ordering'] + 1;	
		}
	}
}

print $order."<br>";

exit();

$strSQL = "INSERT INTO ".substr(strtolower($tbf),0,-2)."fmn1_parameter_index ('pi_id','pi_var','pi_title','pi_description','pi_req_status'
		  ,'pi_alt_msg','pi_input_type','pi_ordering','pi_adddate','pi_group') VALUES ('','".$_POST['var_label']."'
		  ,'".$_POST['var_title']."','".$_POST['var_description']."','".$_POST['req_status']."','".$_POST['alt_msg']."'
		  ,'".$_POST['setting_type']."','".$order."','".$order."','".date('Y-m-d')."','".$_GET['group_id']."')";
print $strSQL ;
$resultInsert = $db->insert($strSQL,false,true);

$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."fmn1_parameter_index WHERE pi_var = '".$_POST['var_label']."' and pi_ordering = '".$order."'";
$resultselect = $db->select($strSQL,false,true);

if($resultselect){
	$strSQL = "UPDATE ".substr(strtolower($tbf),0,-2)."fmn1_parameter_index 
			  SET pi_input_type_id = '".$_POST['input_type']."'";
	if($_POST['setting_type']==1){
		$strSQL = "UPDATE ".substr(strtolower($tbf),0,-2)."fmn1_parameter_index 
			  SET pi_input_type_id = '".$_POST['input_type2']."'";
	}
	$resultUpdate = $db->update($strSQL);
	
	?>
	<script>
    	alert('Add parameter success!');
		window.location = './index.php';
    </script>
	<?php
}else{
	
	?>
	<script>
    	alert('Add parameter fail!');
		window.location = './index.php';
    </script>
	<?php	
}

?>