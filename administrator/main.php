<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

$id = 0;
if(isset($_GET['id']))
	$id = $_GET['id'];
	

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

.d:link { color:#999; text-decoration:none}
.d:visited {color: #999; text-decoration: none}
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

.tbd tr:nth-child(even) {background: #DEE8F8}
.tbd tr:nth-child(odd) {background: #FFF}
</style>
<script src="./../js/jquery.min.js"></script>
<script>
function confirmDel(url,str){
	if(confirm("Confirm to " + str +" this record?")){
		window.location = url;
	}	
}
</script>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="230"  align="left" valign="top" bgcolor="#0D323E"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="130" align="center"><img src="../images/logo1.gif" width="215" height="116" /></td>
      </tr>
      <tr>
        <td height="35" bgcolor="#114353"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="40" bgcolor="#009999" class="paddingTable"><a href="main.php" class="c"><div>Dashboard</div></a></td>
          </tr>
          <tr style="display:none;">
            <td height="30" class="paddingTable"><a href="main.php?id=1&amp;group_id=1&amp;tab_id=1" class="c"><div>Variable management</div></a></td>
          </tr>
          <tr>
            <td height="30" class="paddingTable"><a href="main.php?id=2&amp;group_id=0&amp;tab_id=1" class="c"><div>User account</div></a></td>
          </tr>
          <tr>
            <td height="30" class="paddingTable"><a href="main.php?id=3&amp;group_id=0&amp;tab_id=1" class="c"><div>Institute/Hospital</div></a></td>
          </tr>
          <tr>
            <td height="35" class="paddingTable">&nbsp;</td>
          </tr>
          
        </table></td>
      </tr>
    </table></td>
    <td align="left" valign="top" bgcolor="#F3F3F3"><?php
    switch($id){
		case 1: require "./page/variable.php"; break;
		case 2: require "./page/account.php"; break;
		case 3: require "./page/institute.php"; break;
		default: require "./page/dashboard.php";	
	}
	?></td>
  </tr>
</table>
</body>
</html>
