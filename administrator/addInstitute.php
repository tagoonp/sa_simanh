<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

//Query institute's name for check duplicate
$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE institute_name = '%s'",mysql_real_escape_string("institute")
,mysql_real_escape_string($_POST['inst_name']));

$resultInstitute = $db->select($strSQL,false,true);

$order = 1;
if(!$resultInstitute){
	if(sizeof($resultInstitute)>0){
			//Duplication institute's name
			$db->disconnect();
			?>
			<script>
				alert('Duplication institute\'s name!');
				window.location = './main.php?id=3&group_id=<?php print $_POST['inst_type'];?>&tab_id=1';
			</script>
			<?php
			exit();
	}
	//Insert new institute
	$strSQL = sprintf("INSERT INTO ".substr(strtolower($tbf),0,-2)."%s 
					   VALUES ('NULL','%s','%s','%s','%s','%s','%s','%s')",
					   mysql_real_escape_string("institute"),
					   mysql_real_escape_string($_POST['inst_name']),
					   mysql_real_escape_string($_POST['inst_desc']),
					   mysql_real_escape_string($_POST['inst_phone']),
					   mysql_real_escape_string($_POST['lat_value']),
					   mysql_real_escape_string($_POST['lon_value']),
					   mysql_real_escape_string($_POST['inst_type']),
					   mysql_real_escape_string(0));
	$resultInsert = $db->insert($strSQL,false,true);
	
	$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE institute_name = '%s'",mysql_real_escape_string("institute")
,mysql_real_escape_string($_POST['inst_name']));
	$resultInstitute2 = $db->select($strSQL,false,true);
	
	if($resultInstitute2){
		//Add success
		$db->disconnect();
		?>
		<script>
			alert('Add institute success!');
			window.location = './main.php?id=3&group_id=<?php print $_POST['inst_type'];?>&tab_id=1';
		</script>
		<?php
		exit();
	}else{
		//Add fail
		$db->disconnect();
		?>
		<script>
			alert('Add institute fail!');
			window.location = './main.php?id=3&group_id=<?php print $_POST['inst_type'];?>&tab_id=1';
		</script>
		<?php
		exit();
	}

}else{
	//Database connection error
	$db->disconnect();
	?>
	<script>
    	alert('Duplicate database\'s name!');
		window.location = './main.php?id=3&group_id=<?php print $_POST['inst_type'];?>';
    </script>
	<?php
	exit();
}


?>