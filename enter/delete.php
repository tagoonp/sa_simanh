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
	$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
			  mysql_real_escape_string("registerrecord"),
			  mysql_real_escape_string($_GET['id'])
			  );
	$resultRecord = $db->select($strSQL,false,true);

	if($resultRecord){
		$strSQL = sprintf("DELETE FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
				  mysql_real_escape_string("delivery"),
				  mysql_real_escape_string($resultRecord[0]['record_id'])
				  );
		$resultDelete = $db->delete($strSQL);

		$strSQL = sprintf("DELETE FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
				  mysql_real_escape_string("obstetric"),
				  mysql_real_escape_string($resultRecord[0]['record_id'])
				  );
		$resultDelete = $db->delete($strSQL);

		$strSQL = sprintf("DELETE FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
				  mysql_real_escape_string("other_postnatal"),
				  mysql_real_escape_string($resultRecord[0]['record_id'])
				  );
		$resultDelete = $db->delete($strSQL);

		$strSQL = sprintf("DELETE FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
				  mysql_real_escape_string("outcome"),
				  mysql_real_escape_string($resultRecord[0]['record_id'])
				  );
		$resultDelete = $db->delete($strSQL);

		$strSQL = sprintf("DELETE FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
				  mysql_real_escape_string("postnatal"),
				  mysql_real_escape_string($resultRecord[0]['record_id'])
				  );
		$resultDelete = $db->delete($strSQL);

		$strSQL = sprintf("DELETE FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
				  mysql_real_escape_string("registerrecord"),
				  mysql_real_escape_string($resultRecord[0]['record_id'])
				  );
		$resultDelete = $db->delete($strSQL);

		$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
				  mysql_real_escape_string("registerrecord"),
				  mysql_real_escape_string($_GET['id'])
				  );
		$resultRecord = $db->select($strSQL,false,true);

		if($resultRecord){
			// Delete fail
			$db->disconnect();
			?>
			<script>
					alert('Delete fail!');
					window.location = 'summary/confirm_list.php';
			</script>
			<?php
			exit();
		}else{
			// delete success
			$db->disconnect();
			?>
			<script>
					alert('Delete success!');
					window.location = 'summary/confirm_list.php';
			</script>
			<?php
			exit();
		}
	}else{
		// delete success
		$db->disconnect();
		?>
		<script>
				alert('Record id not available!');
				window.location = 'summary/confirm_list.php';
		</script>
		<?php
		exit();
	}

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
