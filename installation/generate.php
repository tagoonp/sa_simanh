<?php
session_start();
/*print $_SESSION["buffUsername"]."<br>";
print $_SESSION["buffPassword"]."<br>";
print $_SESSION["buffEmail"]."<br>";
print $_POST['txtDbUsername']."<br>";
print $_POST['txtDbPassword']."<br>";
print $_POST['txtDbName']."<br>";
print $_POST['txtTbPrefix']."<br>";*/
$txp = $_POST['txtTbPrefix'];
if($myfile = fopen("../bin/server-config.txt", "w")){
$myfile = fopen("../bin/server-config.txt", "w") or die("Unable to open file!");
$txt = $_SESSION["buffUsername"]."\r\n";
fwrite($myfile, $txt);
$txt = $_SESSION["buffPassword"]."\r\n";
fwrite($myfile, $txt);
$txt = $_SESSION["buffEmail"]."\r\n";
fwrite($myfile, $txt);
$txt = $_POST['txtDbUsername']."\r\n";
fwrite($myfile, $txt);
$txt = $_POST['txtDbPassword']."\r\n";
fwrite($myfile, $txt);
$txt = $_POST['txtDbName']."\r\n";
fwrite($myfile, $txt);
$txt = $_POST['txtTbPrefix']."\r\n";
fwrite($myfile, $txt);
fclose($myfile);	
}else{
	print "Can not open server-config file";
}

$con=mysqli_connect("localhost",$_POST['txtDbUsername'],$_POST['txtDbPassword'],$_POST['txtDbName']);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}


$strSQL = array();

$strSQL[] = "CREATE TABLE IF NOT EXISTS `".$txp."useraccount` (
  `username` varchar(20) NOT NULL COMMENT 'username',
  `password` text NOT NULL COMMENT 'password',
  `reg_date` date NOT NULL COMMENT 'registration date',
  `SID` text NOT NULL COMMENT 'secret id for activate account',
  `user_type_id` int(11) NOT NULL COMMENT 'user type reference id',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT 'status for available account'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
// Create table

$strSQL[] = "CREATE TABLE IF NOT EXISTS `".$txp."userdescription` (
`udesc_id` int(4) unsigned zerofill NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `institute_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";



$strSQL[] = "CREATE TABLE IF NOT EXISTS `".$txp."usertype` (
`user_type_id` int(3) NOT NULL,
  `user_type_description` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;
";

$strSQL[] = "INSERT INTO `".$txp."usertype` (`user_type_id`, `user_type_description`) VALUES
(1, 'Super administrator'),
(2, 'Administrator'),
(3, 'Operational entry'),
(4, 'Actor');
";

$strSQL[] = "CREATE TABLE IF NOT EXISTS `".$txp."institute` (
`institute_id` int(4) unsigned zerofill NOT NULL COMMENT 'institute id',
  `institute_name` varchar(255) NOT NULL COMMENT 'institute name',
  `institute_description` text NOT NULL COMMENT 'institute description',
  `institute_phone` varchar(20) NOT NULL COMMENT 'institute phone number',
  `institute_latitute` varchar(255) NOT NULL COMMENT 'institute lat',
  `institute_longitude` varchar(255) NOT NULL COMMENT 'institute lng',
  `institute_type` int(11) NOT NULL COMMENT 'institute type id',
  `institute_status` int(11) NOT NULL DEFAULT '0' COMMENT 'institute available status'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";

$strSQL[] = "CREATE TABLE IF NOT EXISTS `".$txp."institute_type` (
`institute_type_id` int(11) NOT NULL,
  `institute_type_description` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;";

$strSQL[] = "ALTER TABLE `".$txp."institute`
 ADD PRIMARY KEY (`institute_id`);";
 
 $strSQL[] = "ALTER TABLE `".$txp."institute_type`
 ADD PRIMARY KEY (`institute_type_id`);";
 
 $strSQL[] = "ALTER TABLE `".$txp."useraccount`
 ADD PRIMARY KEY (`username`);";
 
 $strSQL[] = "ALTER TABLE `".$txp."userdescription`
 ADD PRIMARY KEY (`udesc_id`);";
 
 $strSQL[] = "ALTER TABLE `".$txp."usertype`
 ADD PRIMARY KEY (`user_type_id`);";
 
  $strSQL[] = "ALTER TABLE `".$txp."institute`
MODIFY `institute_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT 'institute id';";
 
  $strSQL[] = "ALTER TABLE `".$txp."institute_type`
MODIFY `institute_type_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;";
 
  $strSQL[] = "ALTER TABLE `".$txp."userdescription`
MODIFY `udesc_id` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT;";

  $strSQL[] = "ALTER TABLE `".$txp."usertype`
MODIFY `user_type_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;";

$strSQL[] = "INSERT INTO `".$txp."institute_type` (`institute_type_id`, `institute_type_description`) VALUES
(1, 'Monitoring Center'),
(2, 'Hospital'),
(3, 'Clinic');";

$strSQL[] = "INSERT INTO `".$txp."useraccount` (`username`, `password`, `reg_date`, `SID`, `user_type_id`, `status`) VALUES
('superadmininstrator', '828ab4683d1eee31df2208a3a3ddf5b3', '2014-10-12', '', 1, 1);
";

$strSQL[] = "INSERT INTO `".$txp."useraccount` (`username`, `password`, `reg_date`, `SID`, `user_type_id`, `status`) VALUES
('".$_SESSION["buffUsername"]."', '".md5($_SESSION["buffPassword"])."', '".date('Y-m-d')."', '', 1, 1);
";

$strSQL[] = "INSERT INTO `".$txp."userdescription` (`fname`, `lname`, `email`, `institute_id`, `username`) VALUES
('SuperAdmin', '-', 'admin@simanh@gmail.com', '1', 'superadmininstrator');
";

$strSQL[] = "INSERT INTO `".$txp."userdescription` (`fname`, `lname`, `email`, `institute_id`, `username`) VALUES
('SuperAdmin2', '-', '".$_SESSION["buffEmail"]."', '1', '".$_SESSION["buffUsername"]."');
";

// Execute query
$c = 0;
$status = 0;
foreach($strSQL as $sql){
	
	if (mysqli_query($con,$sql)) {
	  //echo "Table persons created successfully";
	} else {
	$status++;
	  echo "Error creating table $c: " . mysqli_error($con)."<br>";
	}
	
	$c++;
}

if($status==0){	//Create complete
	session_destroy();
	header('Location: ../administrator/index.php');
	exit();
}

//

?>