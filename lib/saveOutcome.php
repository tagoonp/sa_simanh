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
				WHERE record_id = '%s'",
			  	mysql_real_escape_string("outcome"),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
				);
	$resultSelectOutcome = $db->select($strSQL,false,true);
	
	$no = 1;
	if($resultSelectOutcome){
		$no = sizeof($resultSelectOutcome);	
	}
	
	$strSQL = sprintf("INSERT INTO ".substr(strtolower($tbf),0,-2)."%s 
				VALUE ('','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'
				,'%s','%s','%s')",
			  	mysql_real_escape_string("outcome"),
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
				mysql_real_escape_string($_POST['nb_refer_facility']),
				mysql_real_escape_string("nb.".$_SESSION['userSIMANHmother_record']."-".$no),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
			  
	$resultInsert = $db->insert($strSQL,false,true);
	
	if($resultInsert){
		$strSQL = sprintf("SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s' ",
			  	mysql_real_escape_string("outcome"),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
		
		
		$resultCheck = $db->select($strSQL,false,true);
		if($resultCheck){
			$db->disconnect();
			?>
			<script>
					alert('Delivery information complete!');
					window.location = '../enter/main.php?id=4';
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