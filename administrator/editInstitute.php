<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

$order = $_POST['inst_type'];

if(!isset($_GET['in'])){
		$db->disconnect();
			?>
			<script>
				alert('Parameter error!');
				window.location = './main.php?id=3&group_id=<?php print $order;?>&tab_id=1';
			</script>
			<?php
			exit();
}

//Check superadmin priviledge
$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE username = '%s' and password = '%s' and status = 1",
		  mysql_real_escape_string("useraccount"),
		  mysql_real_escape_string($_SESSION['userSIMANHusername']),
		  mysql_real_escape_string(md5($_POST['txtPasswd']))
		  );
$resultSuper = $db->select($strSQL,false,true);

//No plivilledge, dinind
if(!$resultSuper){
//Data not found
			$db->disconnect();
			?>
			<script>
				alert('Permission deny!');
				window.location = './main.php?id=3&group_id=<?php print $order;?>&tab_id=1';
			</script>
			<?php
			exit();	
}	  

//Query institute's name for check duplicate
$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE institute_id = '%s'",
					mysql_real_escape_string("institute"),
					mysql_real_escape_string($_GET['in']));

$resultInstitute = $db->select($strSQL,false,true);

if(!$resultInstitute){
			//Data not found
			$db->disconnect();
			?>
			<script>
				alert('Institute not found!');
				window.location = './main.php?id=3&group_id=<?php print $order;?>&tab_id=1';
			</script>
			<?php
			exit();
}else{
	//Old record found.
	//Update account
	$strSQL = sprintf("UPDATE ".substr(strtolower($tbf),0,-2)."%s SET 
			   institute_name = '%s',
			   institute_description = '%s',
			   institute_phone = '%s',
			   institute_latitute = '%s',
			   institute_longitude = '%s',
			   institute_type = '%s'
			   WHERE institute_id = '%s'",
			   mysql_real_escape_string("institute"),
			   mysql_real_escape_string($_POST['inst_name']),
			   mysql_real_escape_string($_POST['inst_desc']),
			   mysql_real_escape_string($_POST['inst_phone']),
			   mysql_real_escape_string($_POST['lat_value']),
			   mysql_real_escape_string($_POST['lon_value']),
			   mysql_real_escape_string($_POST['inst_type']),
			   mysql_real_escape_string($_GET['in'])
			   );
	$update = $db->update($strSQL);
	
	$db->disconnect();
	?>
	<script>
    	alert('Update success!');
		window.location = './main.php?id=3&group_id=<?php print $order;?>&tab_id=1';
    </script>
	<?php
	exit();
}


?>