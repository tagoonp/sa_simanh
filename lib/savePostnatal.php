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
				VALUE ('','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
			  	mysql_real_escape_string("postnatal"),
				mysql_real_escape_string($_POST['cp1']),
				mysql_real_escape_string($_POST['cp2']),
				mysql_real_escape_string($_POST['cp3']),
				mysql_real_escape_string($_POST['cp4']),
				mysql_real_escape_string($_POST['fp1']),
				mysql_real_escape_string($_POST['fp2']),
				mysql_real_escape_string($_POST['fp3']),
				mysql_real_escape_string($_POST['fp4']),
				mysql_real_escape_string($_POST['fp5']),
				mysql_real_escape_string($_POST['fp6']),
				mysql_real_escape_string($_POST['fp7']),
				mysql_real_escape_string($_POST['mds']),
				mysql_real_escape_string($_POST['date_od_dis']),
				mysql_real_escape_string($_POST['rs']),
				mysql_real_escape_string($_POST['mrefer_date']),
			  	mysql_real_escape_string($_POST['mrefer_to']),
				mysql_real_escape_string($_POST['mdl']),
				mysql_real_escape_string($_POST['date_death']),
				mysql_real_escape_string(0),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
			  
	$resultInsert = $db->insert($strSQL,false,true);
	
	
	//print $strSQL;exit();
	if($resultInsert){
		$strSQL = sprintf("SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s' ",
			  	mysql_real_escape_string("postnatal"),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
		
		
		$resultCheck = $db->select($strSQL,false,true);
		//print $strSQL;
		//exit();
		if($resultCheck){
			
			$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
						  mysql_real_escape_string("outcome"),
						  mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
						  );
			$resultNB = $db->select($strSQL,false,true);
			
			if($resultNB){
				for($v=0; $v < sizeof($resultNB); $v++){
					$strSQL = sprintf("INSERT INTO ".substr(strtolower($tbf),0,-2)."%s 
								VALUE ('','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
								mysql_real_escape_string("other_postnatal"),
								mysql_real_escape_string($_POST['art1_'.$v]),
								mysql_real_escape_string($_POST['art2_'.$v]),
								mysql_real_escape_string($_POST['art3_'.$v]),
								mysql_real_escape_string($_POST['art4_'.$v]),
								mysql_real_escape_string($_POST['art5_'.$v]),
								mysql_real_escape_string($_POST['ifm'][$v]),
								mysql_real_escape_string($_POST['art6_'.$v]),
								mysql_real_escape_string($_POST['art7_'.$v]),
								mysql_real_escape_string($_POST['art8_'.$v]),
								mysql_real_escape_string($_POST['art9_'.$v]),
								mysql_real_escape_string($_POST['art11_'.$v]),
								mysql_real_escape_string($_POST['ndis_date'][$v]),
								mysql_real_escape_string($_POST['art12_'.$v]),
								mysql_real_escape_string($_POST['nrefer_to'][$v]),
								mysql_real_escape_string($_POST['nrefer_date'][$v]),
								mysql_real_escape_string($_POST['art13_'.$v]),
								mysql_real_escape_string($_POST['ndeath_date'][$v]),
								mysql_real_escape_string($_SESSION['userSIMANHmother_record']),
								mysql_real_escape_string($_POST['nb_id'][$v])
							  );
							  
							  $resultInsert = $db->insert($strSQL,false,true);
				}	
			}
			
			
			
			
			$db->disconnect();
			?>
			<script>
					alert('Postnatal information complete!');
					window.location = '../enter/main.php?id=5';
			</script>
			<?php
			exit();
		}else{
			print $strSQL;
			exit();
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