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

$pi = 0;
$ep = 0;
if($_POST['pi']==1){
	$ep = 1;
	$pi = 0;
}else{
	$pi = 1;
	$ep = 0;
}

$ind = $_POST['indication2'];
if($_POST['ind_other2']!=''){
	$ind = 0;
}
//If privilegde available
if($resultUser){
	$strSQL = sprintf("UPDATE ".substr(strtolower($tbf),0,-2)."%s 
				SET 
				ga_del = '%s',
				date_del = '%s',
				time_del = '%s',
				mode_del = '%s',
				indication = '%s',
				type_ba = '%s',
				intact = '%s',
				episiotomy = '%s',
				degree_tear = '%s',
				m_art1 = '%s',
				m_art2 = '%s',
				m_art3 = '%s',
				ind_other = '%s'
				WHERE record_id = '%s'",
			  	mysql_real_escape_string("delivery"),
				mysql_real_escape_string($_POST['ga_del']),
				mysql_real_escape_string($_POST['date_del']),
				mysql_real_escape_string($_POST['time_del']),
				mysql_real_escape_string($_POST['mode_del']),
				mysql_real_escape_string($ind),
				mysql_real_escape_string($_POST['type_ba']),
				mysql_real_escape_string($pi),
				mysql_real_escape_string($ep),
				mysql_real_escape_string($_POST['dt']),
				mysql_real_escape_string($_POST['art1']),
				mysql_real_escape_string($_POST['art2']),
				mysql_real_escape_string($_POST['art3']),
				mysql_real_escape_string($_POST['ind_other2']),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
			  
	$resultInsert = $db->update($strSQL);
	
	//print $strSQL;
	//exit();
	if($resultInsert){
		$strSQL = sprintf("SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s' ",
			  	mysql_real_escape_string("delivery"),
				mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
		
		
		$resultCheck = $db->select($strSQL,false,true);
		//print $strSQL;
		//exit();
		if($resultCheck){
			$db->disconnect();
			?>
			<script>
					alert('Update delivery information complete!');
					window.location = '../enter/main.php?id=2';
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