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

$art = $_POST['initiate_art'];
if(($_POST['on_art_delivery']=='Dual') || ($_POST['on_art_delivery']=='Triple')){
	$art = 0;	
}
if($resultUser){
	$strSQL = sprintf("UPDATE ".substr(strtolower($tbf),0,-2)."%s SET
			  gravidity = '%s',
			  parity= '%s',
			  anc_attend = '%s',
			  ga1st = '%s',
			  ga20w = '%s',
			  no_anc = '%s',
			  rh = '%s',
			  anti_d = '%s',
			  rpr = '%s',
			  rpr_treated = '%s',
			  hiv_status = '%s',
			  on_art_delivery = '%s',
			  hiv_1st = '%s',
			  hiv_retest = '%s',
			  hiv_labour = '%s',
			  cd4 = '%s',
			  cd4_count = '%s',
			  initiate_art = '%s',
			  bba = '%s',
			  ga_adm = '%s',
			  stage_of_labour = '%s',
			  date_lbs = '%s',
			  time_lbs = '%s',
			  date_rm = '%s',
			  time_rm = '%s',
			  date_3cm = '%s',
			  time_3cm	 = '%s',
			  date_fully = '%s',
			  time_fully = '%s',
			  duration_active_phase = '%s'
			  WHERE record_id = '%s'
				",
			  	mysql_real_escape_string("obstetric"),
				mysql_real_escape_string($_POST['gravidity']),
				mysql_real_escape_string($_POST['parity']),
				mysql_real_escape_string($_POST['anc_attend']),
				mysql_real_escape_string($_POST['ga1st']),
				mysql_real_escape_string($_POST['ga20w']),
				mysql_real_escape_string($_POST['no_anc']),
				mysql_real_escape_string($_POST['rh']),
				mysql_real_escape_string($_POST['anti_d']),
				mysql_real_escape_string($_POST['rpr']),
				mysql_real_escape_string($_POST['rpr_treated']),
				mysql_real_escape_string($_POST['hiv_status']),
				mysql_real_escape_string($_POST['on_art_delivery']),
				mysql_real_escape_string($_POST['hiv_1st']),
				mysql_real_escape_string($_POST['hiv_retest']),
				mysql_real_escape_string($_POST['hiv_labour']),
			  	mysql_real_escape_string($_POST['cd4']),
				mysql_real_escape_string($_POST['cd4_count']),
				mysql_real_escape_string($art),
				mysql_real_escape_string($_POST['bba']),
				mysql_real_escape_string($_POST['ga_adm']),
				mysql_real_escape_string($_POST['stage_of_labour']),
				mysql_real_escape_string($_POST['date_lbs']),
				mysql_real_escape_string($_POST['time_lbs']),
				mysql_real_escape_string($_POST['date_rm']),
				mysql_real_escape_string($_POST['time_rm']),
				mysql_real_escape_string($_POST['date_3cm']),
				mysql_real_escape_string($_POST['time_3cm']),
				mysql_real_escape_string($_POST['date_fully']),
				mysql_real_escape_string($_POST['time_fully']),
			  	mysql_real_escape_string($_POST['duration_active_phase']),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
			  
	$resultInsert = $db->update($strSQL);
	
	//print $strSQL;
	//exit();
	
	if($resultInsert){
		$strSQL = sprintf("SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s' ",
			  	mysql_real_escape_string("obstetric"),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
		
		
		$resultCheck = $db->select($strSQL,false,true);
		//print $strSQL;
		//exit();
		if($resultCheck){
			$db->disconnect();
			?>
			<script>
					alert('Update obstetric information complete!');
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