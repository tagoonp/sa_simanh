<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),$p,trim($dbn));

//Checking parameter
if((!isset($_GET['group_id'])) || (!isset($_GET['var']))){
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
	
	$strSQL = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection VALUE ('','".$_POST['it_val']."','".$_POST['is_label']."'
			  ,'".$_POST['it_avai']."','".$_GET['var']."','0')";
	$resultInsert = $db->insert($strSQL,false,true);
	
	if($resultInsert){
		//Parameter not receive
			$db->disconnect();
			?>
			<script>
				window.history.back();
			</script>
			<?php
			exit();
	}else{
		//Parameter not receive
			$db->disconnect();
			?>
			<script>
				alert('Add item fail!');
				window.history.back();
			</script>
			<?php
			exit();
	}
}
?>