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
	$strSQL = sprintf("UPDATE ".substr(strtolower($tbf),0,-2)."%s 
				SET 
				date_adm = '%s',
				time_adm= '%s',
				refer_in_status = '%s',
				refer_in_facility = '%s',
				stage_of_patient = '%s',
				folder_no = '%s',
				point_no = '%s',
				pid = '%s',
				p_fname = '%s',
				p_mname = '%s',
				p_lname = '%s',
				p_address = '%s',
				p_phone = '%s',
				p_dob = '%s',
				p_cage = '%s'
				WHERE record_id = '%s' ",
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
			  	mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
	$resultInsert = $db->update($strSQL);
	
	//print $strSQL;
	//exit();
	
	if($resultInsert){
		$strSQL = sprintf("SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."%s WHERE pid = '%s' and date_adm = '%s' and confirm_status = '%s'",
			  	mysql_real_escape_string("registerrecord"),
				mysql_real_escape_string($_POST['pid']),
				mysql_real_escape_string($_POST['adm_date']),
			  	mysql_real_escape_string(0)
			  );
		
		
		$resultCheck = $db->select($strSQL,false,true);
		//print $strSQL;
		//exit();
		if($resultCheck){
			$db->disconnect();
			?>
			<script>
					alert('Update register complete!');
					window.location = '../enter/main.php?com=view';
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
		//print $strSQL;
		//exit();
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