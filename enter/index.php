<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

$id = 0;
if(isset($_GET['id']))
	$id = $_GET['id'];

if(!isset($_SESSION['userSIMANHusername'])){
	?>
	<script>
    	alert('Session timeout!');
		window.location = '../index.php';
    </script>
	<?php
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SIMANH Administrator panel</title>
</head>
<style>
body{
	padding:0;
	margin:0;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
}

a:link { color:#fff; text-decoration:none}
a:visited {color: #fff; text-decoration: none}
a:hover {color:#FC0;}

.b:link { color:#999; text-decoration:none}
.b:visited {color: #999; text-decoration: none}
.b:hover {color:#666;}

.c:link { color:#fff; text-decoration:none}
.c:visited {color: #fff; text-decoration: none}
.c:hover {color:#F90;}

.d:link { color:#069; text-decoration:none}
.d:visited {color: #069; text-decoration: none}
.d:hover {color:#F90;}

.paddingTable{
	padding:5px 10px 5px 10px;
	color:#FFF;
}

.paddingTable2{
	padding:5px 5px 5px 5px;
}

ul,li,p{margin:0;padding:0;list-style:none}

.css_simple_tab{float:left;width:100%;border-bottom:1px solid #333;height:29px; font-size:0.9em; color:#069;}
/* css แท็บทั้งหมด */
.css_simple_tab li{float:left;height:29px;margin-right:3px;
 	border:1px solid #CCCCCC;
	border-bottom:0px;
}
.css_simple_tab li i{float:left;width:3px;overflow:hidden;height:29px;}
.css_simple_tab li a{float:left;line-height:25px;padding-top:4px;text-align:center;outline:none;padding:0px 20px;}
.css_simple_tab li a:link{color:#069;}
.css_simple_tab li a:visited{color:#069;}
.css_simple_tab li a:hover{color:#333;}
/* css แท็บที่ถูกเลือก */
.css_simple_tab_li{height:30px;
	border:1px solid #333 !important;
	border-bottom:0px !important;
	background-color:#069

}
.css_simple_tab_li a{font-weight:bold !important;color:#fff !important;}
.css_simple_tab_detailed{float:left;width:96%;line-height:23px;padding-top:10px;padding-left:0px;display:none;overflow:hidden;}

.border-r{
	border:solid;
	border-color:#CCC;
	border-width:1px;
	border-radius:5px;
	height:30px;
	padding-left:5px;
}

.ct2, .rq1, .ct3{
	display:none;
}

.tbd tr:nth-child(even) {
	background: #DEE8F8;
}

.tbd tr:nth-child(odd) {
	background: #FFF;
}
</style>
<script src="../js/jquery.min.js"></script>
<script>
function confirmDel(url,str){
	if(confirm("Confirm to " + str +" this record?")){
		window.location = url;
	}
}

$(function(){
	$('#bt5').click(function(){
		if(confirm("Confirm to sigout?")){
			window.location = '../signout.php';
		}
	});

	$('#bt3').click(function(){
			window.location = './main.php';
	});

	$('#bt1').click(function(){
			window.location = './search.php';
	});

	$('#bt2').click(function(){
			window.location = './monitor/'
	});

	$('#bt4').click(function(){
			// window.location = './confirm.php';
			window.location = './summary/confirm_list.php';
	});
});
</script>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" align="center" bgcolor="#000000" style="padding-left:20px; padding-right:20px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right"><a href="#" class="b">Change password?</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#0D323E"><img src="../images/logo.png" width="215" height="116" /></td>
  </tr>
  <tr>
    <td align="center"><table width="450" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" style="padding:3px;"><h5>Improving Health System Response through Epidemiological Surveillance 
          in Improving Maternal and Newborn Health and Survival</h5></td>
      </tr>
      <tr>
        <td align="center" style="padding:3px;"><strong>For Labour / Delivery ward</strong></td>
      </tr>
      <tr>
        <td align="center" style="padding:3px;"><input type="button" name="bt2" id="bt2" value="Statistics" style="width:100%; height:35px; background-color:#06C; color:#FFF; border:none; border-radius:5px; cursor:pointer;" /></td>
      </tr>
      <tr>
        <td align="left" style="padding:3px;"><input type="button" name="bt3" id="bt3" value="Enter individual data" style="width:100%; height:35px; background-color:#06C; color:#FFF; border:none; border-radius:5px; cursor:pointer;" /></td>
      </tr>
      <tr>
        <td align="left" style="padding:3px;"><input type="button" name="bt4" id="bt4"
        value="Confirm information <?php
        $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s
				WHERE confirm_status = '0' and username in
				(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id in
				(SELECT institute_id FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE username = '%s') )",
			  	mysql_real_escape_string("registerrecord"),
				mysql_real_escape_string($_SESSION['userSIMANHusername'])
				);

		$resultUnconfirm = $db->select($strSQL,false,true);

		if($resultUnconfirm){
			print " - ".sizeof($resultUnconfirm)." record(s)";
		}
		?>" style="width:100%; height:35px; background-color:#06C; color:#FFF; border:none; border-radius:5px; cursor:pointer;" /></td>
      </tr>
      <tr>
        <td align="left" style="padding:3px;">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" style="padding:3px;"><strong>For postpartum ward</strong></td>
      </tr>
      <tr>
        <td align="left" style="padding:3px;"><input type="button" name="bt1" id="bt1" value="Search record" style="width:100%; height:35px; background-color:#06C; color:#FFF; border:none; border-radius:5px; cursor:pointer;" /></td>
      </tr>
      <tr>
        <td align="left" style="padding:3px;"><input type="button" name="bt5" id="bt5" value="Signout" style="width:100%; height:35px; background-color:#06C; color:#FFF; border:none; border-radius:5px; cursor:pointer;" /></td>
      </tr>
      <tr>
        <td align="left" style="padding:3px;">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
        <td align="center" style="font-size:0.8em;">Copyright &copy; 2013 powered by <a href="http://simanh.psu.ac.th/simanh" target="_blank" class="d">Maternal Surveillance Project</a><br /> 6th Floor Administrative Building, Faculty of Medicine, Prince of Songkla University.<br>For help or assistance, contact <a href="mailto:simanh@mgitsol.com?Subject=Help with the Simanh SA website" class="d">MG IT Solutions</a></td>
  </tr>
</table>
</body>
</html>
