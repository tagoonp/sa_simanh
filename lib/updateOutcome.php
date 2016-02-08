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
	$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s 
				WHERE ocm_id = '%s' and record_id = '%s'",
			  	mysql_real_escape_string("outcome"),
				mysql_real_escape_string($_GET['id']),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
				);
	$resultSelectOutcome = $db->select($strSQL,false,true);
	
	if($resultSelectOutcome){
		$strSQL = sprintf("UPDATE ".substr(strtolower($tbf),0,-2)."outcome SET 
				  gender = '%s',
				  alive = '%s',
				  stillbirth = '%s',
				  ag5 = '%s',
				  ag10 = '%s',
				  rbm = '%s',
				  birth_wieght = '%s',
				  hc = '%s',
				  fetal_length = '%s',
				  bdf = '%s',
				 bdf_identify= '%s',
				 bdn = '%s',
				 ebf = '%s',
				  bf = '%s',
				  ff = '%s',
				skin2skin = '%s',
				  pmctv_lb = '%s',
				  nb_adm = '%s',
				  nb_date_adm = '%s',
				  nb_time_adm= '%s',
				  nb_neonatal = '%s',
				  nb_refer = '%s',
				  nb_refer_facility = '%s'
				  WHERE ocm_id = '".$resultSelectOutcome[0]['ocm_id']."'",
				  mysql_real_escape_string($_POST['gender']),
				mysql_real_escape_string($_POST['alive']),
				mysql_real_escape_string($_POST['stillbirth']),
				mysql_real_escape_string($_POST['ag5']),
				mysql_real_escape_string($_POST['ag10']),
				mysql_real_escape_string($_POST['rbm']),
				mysql_real_escape_string($_POST['birth_wieght']),
				mysql_real_escape_string($_POST['hc']),
				mysql_real_escape_string($_POST['fetal_length']),
				mysql_real_escape_string($_POST['bdf']),
				mysql_real_escape_string($_POST['bdf_identify']),
				mysql_real_escape_string($_POST['bdn']),
				mysql_real_escape_string($_POST['ebf']),
				mysql_real_escape_string($_POST['bf']),
				mysql_real_escape_string($_POST['ff']),
				mysql_real_escape_string($_POST['skin2skin']),
				mysql_real_escape_string($_POST['pmctv_lb']),
				mysql_real_escape_string($_POST['nb_adm']),
				mysql_real_escape_string($_POST['nb_date_adm']),
				mysql_real_escape_string($_POST['nb_time_adm']),
				mysql_real_escape_string($_POST['nb_neonatal']),
				mysql_real_escape_string($_POST['nb_refer']),
				mysql_real_escape_string($_POST['nb_refer_facility']));
	}
	
	
			  
	$resultUpdate = $db->update($strSQL);
	
	//print $strSQL;
	//exit();
	if($resultUpdate){
		$strSQL = sprintf("SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s' ",
			  	mysql_real_escape_string("outcome"),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
		
		
		$resultCheck = $db->select($strSQL,false,true);
		if($resultCheck){
			$db->disconnect();
			?>
			<script>
					alert('Update outcome information complete!');
					window.location = '../enter/main.php?id=3&com=view';
			</script>
			<?php
			exit();
		}else{
			$db->disconnect();
			?>
			<script>
					alert('Can not update record! - err1');
					window.history.back();
			</script>
			<?php
			exit();
		}
	}else{
		$db->disconnect();
		?>
		<script>
				alert('Can not update record! - err2');
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