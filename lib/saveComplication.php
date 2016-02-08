<?php
session_start();
include "./../lib/server-config.php";

require("./../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p) ,trim($dbn));

//Check user priviledge
$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE username = '%s' and status = 1 and user_type_id = '%s'",
		  mysql_real_escape_string("useraccount"),
		  mysql_real_escape_string($_SESSION['userSIMANHusername']),
		  mysql_real_escape_string(3)
		  );
$resultUser = $db->select($strSQL,false,true);

$cb1 = 0;
if(isset($_POST['checkbox'])){
	$cb1 = 1;
}

$cb2 = 0;
if(isset($_POST['checkbox2'])){
	$cb1 = 1;
}
//If privilegde available
if($resultUser){
	$strSQL = "DELETE FROM ".substr(strtolower($tbf),0,-2)."complication_delivery WHERE record_id = '".$_SESSION['userSIMANHmother_record']."'";
	$resultDel = $db->delete($strSQL);
	
	$strSQL = sprintf("INSERT INTO ".substr(strtolower($tbf),0,-2)."%s 
				VALUE ('','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",
			  	mysql_real_escape_string("complication_delivery"),
				mysql_real_escape_string($_POST['cp1']),
				mysql_real_escape_string($_POST['cp2']),
				mysql_real_escape_string($cb1),
				mysql_real_escape_string($cb2),
				mysql_real_escape_string($_POST['cp3']),
				mysql_real_escape_string($_POST['cp4']),
				mysql_real_escape_string($_POST['cp5']),
				mysql_real_escape_string($_POST['cp6']),
				mysql_real_escape_string($_POST['cp7']),
				mysql_real_escape_string($_POST['cp8']),
				mysql_real_escape_string($_POST['cp9']),
				mysql_real_escape_string($_POST['cp10']),
				mysql_real_escape_string($_POST['cp11']),
				mysql_real_escape_string($_POST['cp12']),
				mysql_real_escape_string($_POST['cp13']),
				mysql_real_escape_string($_POST['cp14']),
				mysql_real_escape_string($_POST['cp15']),
				mysql_real_escape_string($_POST['cp16']),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
			  
	$resultInsert = $db->insert($strSQL,false,true);
	
	if($resultInsert){
		$strSQL = sprintf("SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s' ",
			  	mysql_real_escape_string("complication_delivery"),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
		
		
		$resultCheck = $db->select($strSQL,false,true);
		//print $strSQL;
		//exit();
		if($resultCheck){
			$db->disconnect();
			?>
			<script>
					alert('Complications information complete!');
					if(confirm('Start new session?')){
						window.location = '../enter/close_session.php';
					}else{
						window.location = '../enter/main.php';
					}
					
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