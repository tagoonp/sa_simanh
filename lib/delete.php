<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

//Checking parameter
if((isset($_GET['id'])) && (isset($_GET['part']))){
	
	if($_GET['part']=='nb'){
			$strSQL = "DELETE FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE ocm_id = '".$_GET['id']."' and record_id = '".$_SESSION['userSIMANHmother_record']."'";
			$resultDel = $db->delete($strSQL);
	
			$strSQL = "DELETE FROM ".substr(strtolower($tbf),0,-2)."other_postnatal WHERE nb_no = '".$_GET['id']."' and record_id = '".$_SESSION['userSIMANHmother_record']."'";
			//$strSQL = "DELETE FROM ".substr(strtolower($tbf),0,-2)."other_postnatal WHERE record_id = '".$_SESSION['userSIMANHmother_record']."'";
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