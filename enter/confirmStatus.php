<?php
session_start();
include "./../lib/server-config.php";

require("./../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

//Check user priviledge
$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE username = '%s' and status = 1 and user_type_id = '%s'",
		  mysql_real_escape_string("useraccount"),
		  mysql_real_escape_string($_SESSION['userSIMANHusername']),
		  mysql_real_escape_string(3)
		  );
$resultUser = $db->select($strSQL,false,true);

if($resultUser){
	$strSQL = sprintf("UPDATE ".substr(strtolower($tbf),0,-2)."%s
				SET
				confirm_status = '1'
				WHERE record_id = '".$_GET['id']."'",
		  		mysql_real_escape_string("registerrecord")
		  );
	$resultUpdate = $db->update($strSQL);

	$db->disconnect();
	?>
	<script>
			alert('Confirm success!');
			window.location = 'summary/confirm_list.php';
	</script>
	<?php
	exit();
}else{
	$db->disconnect();
	?>
	<script>
			alert('Permission deny!');
			window.location = './../index.php';
	</script>
	<?php
	exit();
}
?>
