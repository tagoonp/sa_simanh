<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

//Query institute's name for check duplicate
$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE username = '%s'",mysql_real_escape_string("useraccount")
,mysql_real_escape_string($_POST['txtUsername']));

$resultInstitute = $db->select($strSQL,false,true);

$order = $_POST['txtUsertype'];
if(!$resultInstitute){
	if(sizeof($resultInstitute)>0){
	//Duplication institute's name
			$db->disconnect();
			?>
			<script>
				alert('Duplication username!');
				window.location = './main.php?id=2&group_id=<?php print $order;?>&tab_id=1';
			</script>
			<?php
			exit();
	}
	
	//Insert new institute
	$strSQL = sprintf("INSERT INTO ".substr(strtolower($tbf),0,-2)."%s 
					   VALUES ('%s','%s','%s','','%s','%s')",
					   mysql_real_escape_string("useraccount"),
					   mysql_real_escape_string($_POST['txtUsername']),
					   mysql_real_escape_string(md5($_POST['txtPasswd'])),
					   mysql_real_escape_string(date('Y-m-d')),
					   mysql_real_escape_string($_POST['txtUsertype']),
					   mysql_real_escape_string(0));
	$resultInsert = $db->insert($strSQL,false,true);
	
	$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE username = '%s'",mysql_real_escape_string("useraccount")
,mysql_real_escape_string($_POST['txtUsername']));
	$resultUser2 = $db->select($strSQL,false,true);
	
	if($resultUser2){
		print "a";
		//Add login accout success
		//Then add user information
		$strSQL = sprintf("INSERT INTO ".substr(strtolower($tbf),0,-2)."%s 
					   VALUES ('%s','%s','%s','%s','%s','%s','%s','%s')",
					   mysql_real_escape_string("userdescription"),
					   mysql_real_escape_string($resultUser2[0][0]),
					   mysql_real_escape_string($_POST['txtFname']),
					   mysql_real_escape_string($_POST['txtLname']),
					   mysql_real_escape_string($_POST['txtEmail']),
					   mysql_real_escape_string($_POST['txtPhone']),
					   mysql_real_escape_string($_POST['txtAddress']),
					   mysql_real_escape_string($_POST['txtInstitutename']),
					   mysql_real_escape_string($_POST['txtUsername']));
		$resultInsert2 = $db->insert($strSQL,false,true);

		if($resultInsert2){
			//Add info success	
			$db->disconnect();
			?>
			<script>
				alert('Add institute success!');
				window.location = './main.php?id=2&group_id=<?php print $order;?>&tab_id=1';
			</script>
			<?php
			exit();
		}else{
			//Add info fail	
			$db->disconnect();
			?>
			<script>
				alert('Add useraccount fail!');
				window.location = './main.php?id=2&group_id=<?php print $order; ?>&tab_id=1';
			</script>
			<?php
			exit();
		}
		
	}else{
		print "b";
		//Add fail
		$db->disconnect();
		?>
		<script>
			alert('Add institute fail!');
			window.location = './main.php?id=2&group_id=<?php print $order;?>&tab_id=1';
		</script>
		<?php
		exit();
	}

}else{
	//print "c";
	
	//Database connection error
	$db->disconnect();
	?>
	<script>
    	alert('Duplicate database\'s name!');
		window.location = './main.php?id=2&group_id=0';
    </script>
	<?php
    //header("Location: ./main.php?id=2&group_id=".$_POST['inst_type']);
	exit();
}


?>