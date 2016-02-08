<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

//Checking parameter
if((isset($_GET['an'])) && (isset($_GET['part']))){
	
	if($_GET['part']=='account'){
			$strSQL = "DELETE FROM ".substr(strtolower($tbf),0,-2)."useraccount WHERE username = '".$_GET['an']."'";
			$resultDel = $db->delete($strSQL);
	
			$strSQL = "DELETE FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE username = '".$_GET['an']."'";
			$resultDel = $db->delete($strSQL);
	
			$db->disconnect();
			?>
			<script>
				alert('Delete success!');
				window.history.back();
			</script>
			<?php
			exit();
	}else if($_GET['part']=='institute'){
			$strSQL = "DELETE FROM ".substr(strtolower($tbf),0,-2)."institute WHERE institute_id = '".$_GET['an']."'";
			$resultDel = $db->delete($strSQL);
		
			$db->disconnect();
			?>
			<script>
				alert('Delete success!');
				window.history.back();
			</script>
			<?php
			exit();
	}else if($_GET['part']=='parameter'){
			$strSQL = "DELETE FROM ".substr(strtolower($tbf),0,-2)."parameter_index WHERE pi_id = '".$_GET['an']."'";
			$resultDel = $db->delete($strSQL);
			
			$strSQL = "DELETE FROM ".substr(strtolower($tbf),0,-2)."choice_collection WHERE pi_id = '".$_GET['an']."'";
			$resultDel = $db->delete($strSQL);
		
			$db->disconnect();
			?>
			<script>
				alert('Delete success!');
				window.history.back();
			</script>
			<?php
			exit();
	}else if($_GET['part']=='item'){
			$strSQL = "DELETE FROM ".substr(strtolower($tbf),0,-2)."choice_collection WHERE col_id = '".$_GET['an']."'";
			$resultDel = $db->delete($strSQL);
		
			$db->disconnect();
			?>
			<script>
				alert('Delete success!');
				window.history.back();
			</script>
			<?php
			exit();
	}else{
			$db->disconnect();
			?>
			<script>
				alert('Invalid part name!');
				window.history.back();
			</script>
			<?php
			exit();
	}
	
}else{
	//Parameter not receive
	$db->disconnect();
			?>
			<script>
				alert('Parametor error!');
				window.history.back();
			</script>
			<?php
			exit();	
}
?>