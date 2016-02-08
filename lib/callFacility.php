<?php
session_start();
include "./../lib/server-config.php";

require("./../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

$condition = $_POST['condition'];
$strSQL = sprintf("SELECT institute_name FROM ".substr(strtolower($tbf),0,-2)."%s WHERE 1",
		  mysql_real_escape_string("institute")
		  );

$result = $db->select($strSQL,false,true);

if($result){
	foreach($result as $v){
		$return[]["institute_name"] = $v['institute_name'];
	}	
}

$strSQL = sprintf("SELECT distinct refer_in_facility FROM ".substr(strtolower($tbf),0,-2)."%s WHERE 1",
		  mysql_real_escape_string("registerrecord")
		  );

$result2 = $db->select($strSQL,false,true);

if($result2){
	foreach($result2 as $v){
		//foreach($return as $d){
			//if($d["institute_name"]!=$v[0]){
				$return[]["institute_name"] = $v[0];
			//}	
		//}
	}	
}
	
echo json_encode($return);
$db->disconnect();
?>