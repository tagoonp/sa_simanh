<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),$p,trim($dbn));

if(!isset($_GET['group_id'])){
	?>
	<script>
    	alert('Parameter error!');
		window.location = './main.php?id=1&group_id=<?php print $_GET['group_id'];?>&tab_id=4';
    </script>
	<?php
	exit();	
}

$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."parameter_subgroup WHERE sg_name = '".$_POST['var_subgroup']."'";
$resultParametor = $db->select($strSQL,false,true);

$order = 1;
//No any duplicate
if(!$resultParametor){
	$strSQL = "INSERT INTO `db_simanh`.`".substr(strtolower($tbf),0,-2)."parameter_subgroup` VALUES ('NULL','".$_POST['var_subgroup']."','1','".$_GET['group_id']."')";
	$resultInsert = $db->insert($strSQL,false,true);
	
	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."parameter_subgroup WHERE sg_name = '".$_POST['var_subgroup']."'";
	$resultselect = $db->select($strSQL,false,true);
	
	if($resultselect){
		?>
	<script>
    	alert('Add parameter success!');
		window.location = './main.php?id=1&group_id=<?php print $_GET['group_id'];?>&tab_id=4';
    </script>
	<?php
	}else{
	?>
	<script>
    	alert('Add parameter fail!');
		window.location = './main.php?id=1&group_id=<?php print $_GET['group_id'];?>&tab_id=4';
    </script>
	<?php		
	}
}else{
	?>
	<script>
    	alert('Duplicate subgroup title!');
		window.location = './main.php?id=1&group_id=<?php print $_GET['group_id'];?>&tab_id=4';
    </script>
	<?php			
}


?>