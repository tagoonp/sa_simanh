<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

$order = $_POST['txtUsertype'];
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
				window.location = './main.php?id=2&group_id=<?php print $order;?>&tab_id=1';
			</script>
			<?php
			exit();	
}	  

//Query institute's name for check duplicate
$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE username = '%s'",mysql_real_escape_string("useraccount")
,mysql_real_escape_string($_POST['txtUsername']));

$resultInstitute = $db->select($strSQL,false,true);


if(!$resultInstitute){
			//Data not found
			$db->disconnect();
			?>
			<script>
				alert('Username not found!');
				window.location = './main.php?id=2&group_id=<?php print $order;?>&tab_id=1';
			</script>
			<?php
			exit();
}else{
	//Old record found.
	//Update account
	$strSQL = sprintf("UPDATE ".substr(strtolower($tbf),0,-2)."%s SET 
			   user_type_id = '%s' WHERE username = '%s'",
			   mysql_real_escape_string("useraccount"),
			   mysql_real_escape_string($_POST['txtUsertype']),
			   mysql_real_escape_string($_POST['txtUsername'])
			   );
	$update = $db->update($strSQL);
	
	//Update Info
	$strSQL = sprintf("UPDATE ".substr(strtolower($tbf),0,-2)."%s SET 
			   fname = '%s',
			   lname = '%s',
			   email = '%s',
			   phone = '%s',
			   address = '%s',
			   institute_id = '%s'
			   WHERE username = '%s'",
			   mysql_real_escape_string("userdescription"),
			   mysql_real_escape_string($_POST['txtFname']),
			   mysql_real_escape_string($_POST['txtLname']),
			   mysql_real_escape_string($_POST['txtEmail']),
			   mysql_real_escape_string($_POST['txtPhone']),
			   mysql_real_escape_string($_POST['txtAddress']),
			   mysql_real_escape_string($_POST['txtInstitutename']),
			   mysql_real_escape_string($_POST['txtUsername'])
			   );
			   
	$update = $db->update($strSQL);
	
	$db->disconnect();
	?>
	<script>
    	alert('Update success!');
		window.location = './main.php?id=2&group_id=<?php print $order;?>&tab_id=1';
    </script>
	<?php
	exit();
}


?>