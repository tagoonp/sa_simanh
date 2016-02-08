<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),$p,trim($dbn));

//Checking parameter
if((!isset($_GET['group_id'])) || (!isset($_GET['var']))){
	//Parameter not receive
	$db->disconnect();
			?>
			<script>
				alert('Parametor error!');
				window.history.back();
			</script>
			<?php
			exit();
}else{
	
	$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."parameter_index a 
		  inner join ".substr(strtolower($tbf),0,-2)."parameter_subgroup b 
		  on a.pi_subgroup=b.sg_id WHERE a.pi_id = '%s'",mysql_real_escape_string($_GET['var']));
		  
	$resultAN = $db->select($strSQL,false,true);
	if(!$resultAN){
			//Parameter not receive
			$db->disconnect();
			?>
			<script>
				alert('Parameter not found!');
				window.history.back();
			</script>
			<?php
			exit();
	}
	
	$strSQL = array();
	
	switch($_POST['it_choice']){
		case 1: 
		$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
		VALUE ('','0','No','1','".$_GET['var']."','0')";
		$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
		VALUE ('','1','Yes','1','".$_GET['var']."','0')";		
		break;
		
		case 2: 
		$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
		VALUE ('','0','No','1','".$_GET['var']."','0')";
		$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
		VALUE ('','1','Yes','1','".$_GET['var']."','0')";
		$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
		VALUE ('','99','Not applicable','1','".$_GET['var']."','0')";		
		break;
		
		case 3: 
		$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
		VALUE ('','0','No','1','".$_GET['var']."','0')";
		$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
		VALUE ('','1','Yes','1','".$_GET['var']."','0')";
		$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
		VALUE ('','99','No data','1','".$_GET['var']."','0')";		
		break;
		
		case 4: 
		$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
		VALUE ('','0','No data','1','".$_GET['var']."','0')";
		$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
		VALUE ('','1','Male','1','".$_GET['var']."','0')";
		$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
		VALUE ('','2','Female','1','".$_GET['var']."','0')";		
		break;
		
		case 5: 
		for($v = 0; $v <= 5 ;$v++){
			$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
					   VALUE ('','$v','$v','1','".$_GET['var']."','0')";
		}
		break;
		
		case 6: 
		for($v = 0; $v <= 10 ;$v++){
			$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
					   VALUE ('','$v','$v','1','".$_GET['var']."','0')";
		}
		break;
		
		case 7: 
		for($v = 1; $v <= 5 ;$v++){
			$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
					   VALUE ('','$v','$v','1','".$_GET['var']."','0')";
		}
		break;
		
		case 8: 
		for($v = 1; $v <= 10 ;$v++){
			$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
					   VALUE ('','$v','$v','1','".$_GET['var']."','0')";
		}
		break;
		
		case 9: 
		for($v = 0; $v <= 100 ;$v++){
			$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
					   VALUE ('','$v','$v','1','".$_GET['var']."','0')";
		}
		break;
		
		case 10: 
		//for($v = 0; $v <= 5 ;$v++){
			$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
					   VALUE ('','curr_date','current date','1','".$_GET['var']."','0')";
		//}
		break;
		
		case 11: 
		//for($v = 0; $v <= 5 ;$v++){
			$strSQL[] = "INSERT INTO ".substr(strtolower($tbf),0,-2)."choice_collection 
					   VALUE ('','curr_time','current time','1','".$_GET['var']."','0')";
		//}
		break;
			
	}
	
	foreach($strSQL as $v){
		$resultInsert = $db->insert($v,false,true);
	}
	
	
	//exit();
	if($resultInsert){
		//Parameter not receive
			$db->disconnect();
			?>
			<script>
				window.history.back();
			</script>
			<?php
			exit();
	}else{
		//Parameter not receive
			$db->disconnect();
			?>
			<script>
				alert('Add item fail!');
				window.history.back();
			</script>
			<?php
			exit();
	}
}
?>