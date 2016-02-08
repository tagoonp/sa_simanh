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

//If privilegde available
if($resultUser){
	$strSQL = sprintf("INSERT INTO ".substr(strtolower($tbf),0,-2)."%s 
				VALUE ('','".date('Y-m-d')."','".date('H:i:s')."','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'
				,'%s','%s','%s','%s','%s')",
			  	mysql_real_escape_string("registerrecord"),
				mysql_real_escape_string($_POST['adm_date']),
				mysql_real_escape_string($_POST['adm_time']),
				mysql_real_escape_string($_POST['refer_status']),
				mysql_real_escape_string($_POST['refer_facility']),
				mysql_real_escape_string($_POST['stage_of_patient']),
				mysql_real_escape_string($_POST['folder_no']),
				mysql_real_escape_string($_POST['point_no']),
				mysql_real_escape_string($_POST['pid']),
				mysql_real_escape_string($_POST['fname']),
				mysql_real_escape_string($_POST['mname']),
				mysql_real_escape_string($_POST['lname']),
				mysql_real_escape_string($_POST['address']),
				mysql_real_escape_string($_POST['phonenumber']),
				mysql_real_escape_string($_POST['dob']),
				mysql_real_escape_string($_POST['c_age']),
			  	mysql_real_escape_string($_SESSION['userSIMANHusername']),
			  	mysql_real_escape_string(0)
			  );
	$resultInsert = $db->insert($strSQL,false,true);
	
	if($resultInsert){
		$strSQL = sprintf("SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."%s WHERE pid = '%s' and username = '%s' and date_adm = '%s' and confirm_status = '%s'",
			  	mysql_real_escape_string("registerrecord"),
				mysql_real_escape_string($_POST['pid']),
			  	mysql_real_escape_string($_SESSION['userSIMANHusername']),
				mysql_real_escape_string($_POST['adm_date']),
			  	mysql_real_escape_string(0)
			  );
		
		
		$resultCheck = $db->select($strSQL,false,true);
		//print $strSQL;
		//exit();
		if($resultCheck){
			$_SESSION['userSIMANHmother_record'] = $resultCheck[0]['record_id'];
			session_write_close();
			$db->disconnect();
			?>
			<script>
					alert('Register complete!');
					window.location = '../enter/main.php?id=1';
			</script>
			<?php
			exit();
		}else{
			$db->disconnect();
			?>
			<script>
					alert('Can not insert record! - err1');
					window.history.back();
			</script>
			<?php
			exit();
		}
	}else{
		$db->disconnect();
		?>
		<script>
				alert('Can not insert record! - err2');
				window.history.back();
		</script>
		<?php
		exit();	
	}
}else{ //If not
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