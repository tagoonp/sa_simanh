<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

//Checking parameter
if((isset($_GET['an'])) && (isset($_GET['part'])) && (isset($_GET['to']))){
	
	if($_GET['part']=='account'){
		$strSQL = "UPDATE ".substr(strtolower($tbf),0,-2)."useraccount SET status = '".$_GET['to']."' WHERE username = '".$_GET['an']."'";
		$resultUpdate = $db->update($strSQL);
	
		$db->disconnect();
		?>
			<script>
				alert('Activate success!');
				window.history.back();
			</script>
		<?php
		exit();
	}else if($_GET['part']=='institute'){
		$strSQL = "UPDATE ".substr(strtolower($tbf),0,-2)."institute SET institute_status = '".$_GET['to']."' WHERE institute_id = '".$_GET['an']."'";
		$resultUpdate = $db->update($strSQL);
	
		$db->disconnect();
		?>
			<script>
				alert('Activate success!');
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