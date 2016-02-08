<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),$p,trim($dbn));

//Checking parameter
if((!isset($_GET['group_id'])) || (!isset($_GET['var'])) || (!isset($_GET['col_id']))){
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
	$vid = $_GET['var'];
	$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."parameter_index a 
		  inner join ".substr(strtolower($tbf),0,-2)."parameter_subgroup b 
		  on a.pi_subgroup=b.sg_id WHERE a.pi_id = '%s'",mysql_real_escape_string($_GET['var']));
		  
	$resultAN = $db->select($strSQL,false,true);
	if(!$resultAN){
			//Parameter not receive
			$db->disconnect();
			?>
			<script>
				alert('Parameter not found!');
				window.history.back();
			</script>
			<?php
			exit();
	}
	
	$strSQL = "UPDATE ".substr(strtolower($tbf),0,-2)."choice_collection SET 
				col_value = '".$_POST['it_val']."',
				col_label = '".$_POST['is_label']."',
				col_status = '".$_POST['it_avai']."'
				WHERE pi_id = '".$resultAN[0]['pi_id']."' and col_id = '".$_GET['col_id']."'";
	$resultUpdate = $db->update($strSQL);
	
	if($resultUpdate){
		//Parameter not receive
			$db->disconnect();
			?>
			<script>
				alert('Update success!');
				window.location = 'main.php?id=1&an=<?php print $vid; ?>&group_id=1&tab_id=5&com=ac'
			</script>
			<?php
			exit();
	}else{
		//Parameter not receive
			$db->disconnect();
			?>
			<script>
				alert('Update item fail!');
				window.history.back();
			</script>
			<?php
			exit();
	}
}
?>