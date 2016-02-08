<?php
session_start();
include "./../lib/server-config.php";

require("./../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

$key = $_POST["key"];

//Check user priviledge
$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE username = '%s' and status = 1 and user_type_id = '%s'",
		  mysql_real_escape_string("useraccount"),
		  mysql_real_escape_string($_SESSION['userSIMANHusername']),
		  mysql_real_escape_string(3)
		  );
$resultUser = $db->select($strSQL,false,true);

if($resultUser){
	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord
				WHERE (pid like '".$key."%' or p_fname like '%".$key."%'  or p_lname like '%".$key."%'  or point_no = '%".$key."%'
				 or folder_no = '%".$key."%') and confirm_status = '0' and username in (SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id in (SELECT institute_id FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE username = '".$_SESSION['userSIMANHusername']."'))";


	$resultSearch = $db->select($strSQL,false,true);

	if($resultSearch){
		?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0" >
          <tr>
            <td height="25" width="40" align="left"  style="padding-left:5px; color:#FFF; font-size:0.8em;" bgcolor="#669999"><strong>No
            </th>
            </strong>
            <td  align="left"  style="padding-left:5px; color:#FFF; font-size:0.8em;" bgcolor="#669999"><strong>Full name
            </th>
            </strong>
            <td  align="left" width="120"   style="padding-left:5px; color:#FFF; font-size:0.8em;" bgcolor="#669999"><strong>Admission date
            </th>
            </strong>
            <td  align="left" width="80"   style="padding-left:5px; color:#FFF; font-size:0.8em;" bgcolor="#669999"><strong>Status
            </strong>
            <td  align="left" width="150"   style="padding-left:5px; color:#FFF; font-size:0.8em;" bgcolor="#669999"><strong>Labour</strong>            </tr>
		<?php
		$c = 1;
		foreach($resultSearch as $v){
			?>
			<tr style="font-size:0.9em;">
            <td  height="35" align="left"  style="padding-left:5px;"><?php print $c; ?></td>
            <td  align="left" style="padding-left:5px;"> <a href="JavaScript:doCallAjax('Name')" class="b"><?php print $v['p_fname']." ".$v['p_lname'];?></a> </td>
            <td  align="left" style="padding-left:5px;" ><a href="JavaScript:doCallAjax('Email')" class="b"><?php print $v['date_adm'];?></a></th>
            <td  align="left" style="padding-left:5px;"> <?php if($v['confirm_status']==1){print "Confirmed";}else{ print "Un-confirm";}?>
            <td  align="left" style="padding-left:5px;">
            <!-- <strong><a href="summary.php?id=<?php print $v['record_id'];?>" class="d">View</a></strong> -->
						<button type="button" name="button" class="primary" onclick="redirect('./summary/index.php?pid=<?php print $v['record_id'];?>')">View</button>
          <strong><a href="confirmStatus.php?id=<?php print $v['record_id'];?>" class="d">Confirm</a></strong>            </tr>
			<tr>
			  <td  height="1" colspan="5" align="left" bgcolor="#999999"  style="padding-left:5px;">
		  </tr>
			<?php
			$c++;
		}
		?>
		</table>
		<?php
	}else{
		print "** No record found **" ;
	}
}

?>
