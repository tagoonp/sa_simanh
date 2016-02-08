<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."useraccount WHERE username = '%s' and status = '1'",mysql_real_escape_string($_SESSION['userSIMANHusername']));

$resultDb = $db->select($strSQL,false,true);

if($resultDb){
	switch($resultDb[0]['user_type_id']){
		case 1: //Super admin
				header('Location: ../administrator/main.php'); break;
		case 2: //Admin
				header('Location: ../monitor/'); break;	
		case 3: //enter
				header('Location: ../enter/'); break;	
		case 4: //Admin
				header('Location: '); break;	
	}	
}
$db->disconnect();
?>