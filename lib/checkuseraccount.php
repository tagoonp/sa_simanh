<?php
session_start();

include "./server-config.php";

$strUsername = trim($_POST["data1"]);
$strPassword = trim($_POST["data2"]);

$strPassword = md5($strPassword);

require("connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."useraccount WHERE username = '%s' and password = '%s' and status = '1'",mysql_real_escape_string($strUsername),mysql_real_escape_string($strPassword));

$resultaccount = $db->select($strSQL,false,true);
if($resultaccount){
	print "Y";
	$_SESSION['userSIMANHsession'] = session_id();
	$_SESSION['userSIMANHusername'] = $resultaccount[0]['username'];
	session_write_close();
}else{
	//print $strSQL;
	print "N";	
}

$db->disconnect();
?>