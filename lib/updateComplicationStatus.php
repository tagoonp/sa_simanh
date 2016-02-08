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
$complication = 0;
$var_name = '';
$useradd = 'user_add';
if(isset($_GET['comp'])){
	$complication = $_GET['comp'];
	$useradd = $useradd.$_GET['comp'];	
}
	
$to = 0;
if(isset($_GET['to'])){
	$to = $_GET['to'];	
}
	
switch($complication){
	case 1: $var_name = 'Induction_of_labour';break;
	case 2: $var_name = 'Antepartum_haemorrhage';break;
	case 3: $var_name = 'Postpartum_haemorrhage';break;
	case 4: $var_name = 'Severe_pre_eclampsia';break;
	case 5: $var_name = 'Eclampsia';break;
	case 6: $var_name = 'Postpartum_eclampsia';break;
	case 7: $var_name = 'Prolonged_rupture_of_membranes';break;
	case 8: $var_name = 'Ruptured_uterus';break;
	case 9: $var_name = 'Sepsis';break;
	case 10: $var_name = 'Obstructed_or_prolonged_labour';break;
	case 11: $var_name = 'Retained_placenta';break;
	case 12: $var_name = 'Manual_removal_of_placenta';break;
	case 13: $var_name = 'Stillbirth';break;
	case 14: $var_name = 'Neonatal death';break;
	case 15: $var_name = 'Preterm birth';break;
	case 16: $var_name = 'Low birth weight';break;	
}

if($resultUser){
	$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s 
				WHERE record_id = '%s'",
			  	mysql_real_escape_string("complication"),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
				);
	$resultSelectOutcome = $db->select($strSQL,false,true);
	
	
	if($resultSelectOutcome){
		
		$strSQL = sprintf("UPDATE ".substr(strtolower($tbf),0,-2)."%s 
				SET $var_name = '".$to."',
					$useradd = '%s'
				WHERE record_id = '%s'",
			  	mysql_real_escape_string("complication"),
				mysql_real_escape_string($_SESSION['userSIMANHusername']),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
				);
				
		if($complication==2){
			$strSQL = sprintf("UPDATE ".substr(strtolower($tbf),0,-2)."%s 
				SET $var_name = '".$to."',
					Antepartum_haemorrhage_type = '%s',
					$useradd = '%s'
				WHERE record_id = '%s'",
			  	mysql_real_escape_string("complication"),
				mysql_real_escape_string($to),
				mysql_real_escape_string($_SESSION['userSIMANHusername']),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
				);
			
		}
		
				
		$resultUpdate = $db->update($strSQL);
		
		//print "p1";
		//exit();
		$db->disconnect();
			?>
			<script>
					window.location = '../enter/main.php?id=4';
			</script>
			<?php
			exit();
	}else{
		
		if($complication!=2){
			$strSQL = sprintf("INSERT INTO ".substr(strtolower($tbf),0,-2)."%s 
				(com_rid,$var_name,$useradd,record_id) 
				VALUES ('','%s','%s','%s')",
			  	mysql_real_escape_string("complication"),
				mysql_real_escape_string(1),
				mysql_real_escape_string($_SESSION['userSIMANHusername']),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
		}else{
			$strSQL = sprintf("INSERT INTO ".substr(strtolower($tbf),0,-2)."%s 
				(com_rid,$var_name,Antepartum_haemorrhage_type,$useradd,record_id) 
				VALUES ('','%s','%s','%s','%s')",
			  	mysql_real_escape_string("complication"),
				mysql_real_escape_string(1),
				mysql_real_escape_string($to),
				mysql_real_escape_string($_SESSION['userSIMANHusername']),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
		}
			  
		$resultInsert = $db->insert($strSQL,false,true);
		
		//print $strSQL;
		//exit();
		if($resultInsert){
			$db->disconnect();
			?>
			<script>
					window.location = '../enter/main.php?id=4';
			</script>
			<?php
			exit();
		}else{
			$db->disconnect();
			?>
			<script>
					alert('Edit status fail!');
					window.location = '../enter/main.php?id=4';
			</script>
			<?php
			exit();
		}
	}

}else{ //If not
	$db->disconnect();
	?>
	<script>
			alert('Permission deny!');
			window.location = '../../index.php';
	</script>
	<?php
	exit();
}

?>