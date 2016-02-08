<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

$id = 0;
if(isset($_GET['id']))
	$id = $_GET['id'];
	
$sub = 1;
if(isset($_GET['sub']))
	$sub = $_GET['sub'];

if(!isset($_SESSION['userSIMANHusername'])){
	?>
	<script>
    	alert('Session timeout!');
		window.location = '../index.php';
    </script>
	<?php
}


require("../lib/function.inc.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SIMANH : Monitoring</title>
</head>
<style>
body{
	padding:0;
	margin:0;
	font-family:Arial, Helvetica, sans-serif;
	font-size:0.9em;
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

.tbd tr:nth-child(even) {background: #DEE8F8}
.tbd tr:nth-child(odd) {background: #FFF}
</style>
<script src="../external/jquery/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/jscript.js"></script>
<script src="../js/jquery-1.9.1.min.js"></script>
<?php
if($id==4){
	?>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-SZAM-RXhUZwzGuo2dX15s8UYZX-kUtw&sensor=true"></script>
	<?php	
}
?>

<script src="./../js/markerclusterer.js" language="javascript"></script>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="250" height="700" align="left" valign="top" bgcolor="#000000"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td align="left"><img src="../images/logo.png" width="194" height="103" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="30" height="35" align="left"  <?php if($id==0){print "bgcolor=\"#2C412E\"";}?> style="padding-left:10px; color:#fff;">&nbsp;</td>
            <td  <?php if($id==0){print "bgcolor=\"#2C412E\"";}?> align="left" style="padding-left:10px; color:#fff; <?php if($id==0){print "font-weight:bold;";}?>"><a href="./index.php" title="Summary table">Dashboard</a></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="30" height="35" align="left" <?php if($id==1){print "bgcolor=\"#2C412E\"";}?> style="padding-left:10px; color:#fff;">&nbsp;</td>
            <td align="left" style="padding-left:10px; color:#fff; <?php if($id==1){print "font-weight:bold;";}?>" <?php if($id==1){print "bgcolor=\"#2C412E\"";}?>><a href="./index.php?id=1" title="Delivery data for selected period">Delivery data report</a></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="30" height="35" align="left" <?php if($id==2){print "bgcolor=\"#2C412E\"";}?> style="padding-left:10px; color:#fff;">&nbsp;</td>
            <td align="left" style="padding-left:10px; color:#fff; <?php if($id==2){print "font-weight:bold;";}?>" <?php if($id==2){print "bgcolor=\"#2C412E\"";}?>><a href="./index.php?id=2" title="Delivery data for selected period">DHIS data report</a></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td style="display:;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="30" height="35" align="left" <?php if($id==3){print "bgcolor=\"#2C412E\"";}?> style="padding-left:10px; color:#fff;">&nbsp;</td>
            <td align="left" style="padding-left:10px; color:#fff; <?php if($id==3){print "font-weight:bold;";}?>" <?php if($id==3){print "bgcolor=\"#2C412E\"";}?>>Graph</td>
          </tr>
          <tr>
            <td height="35" colspan="2" align="left" style="padding-left:50px; padding-right:30px; color:#fff;" <?php if($id==3){print "bgcolor=\"#2C412E\"";}?>><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td bgcolor="#336633" height="1"></td>
                </tr>
              <tr>
                <td height="30" align="left" style="color:#FFF; font-size:0.9em; padding-left:10px;"><a href="index.php?id=3&amp;sub=1">Simple graph</a></td>
                </tr>
              <tr>
                <td bgcolor="#336633" height="1"></td>
                </tr>
                <tr>
                <td height="30" align="left" style="color:#FFF; font-size:0.9em; padding-left:10px;"><a href="index.php?id=3&amp;sub=2">Advance graph</a></td>
                </tr>
              <tr>
                <td bgcolor="#336633" height="1"></td>
              </tr>
                </table></td>
          </tr>
          </table></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="30" height="35" align="left" <?php if($id==4){print "bgcolor=\"#2C412E\"";}?> style="padding-left:10px; color:#fff;">&nbsp;</td>
            <td align="left" style="padding-left:10px; color:#fff; <?php if($id==4){print "font-weight:bold;";}?>" <?php if($id==4){print "bgcolor=\"#2C412E\"";}?>><a href="./index.php?id=4" title="Delivery data for selected period">GIS</a></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td  style="display:;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="30" height="35" align="left" <?php if($id==5){print "bgcolor=\"#2C412E\"";}?> style="padding-left:10px; color:#fff;">&nbsp;</td>
            <td align="left" style="padding-left:10px; color:#fff; <?php if($id==5){print "font-weight:bold;";}?>" <?php if($id==5){print "bgcolor=\"#2C412E\"";}?>><a href="./index.php?id=5" title="Delivery data for selected period">Export</a></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="50" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td align="left" style="color:#666;">Welcome to SIMANH Admin monitoring panel.</td>
            <td>&nbsp;</td>
            <td width="150" align="right">
            <input type="button" name="button" id="signout" value="Signout" style="background-color:#C00; color:#FFF; border:none; border-radius:3px; cursor:pointer; width:100px; height:30px; font-weight:bold;" />
            </td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td bgcolor="#E2E2E2" height="4"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="300" align="left" valign="top" style="padding-left:10px; padding-right:5px;">
		<?php 
		if($id==0){
			require_once "./page/summ.php";
		}else if($id==1){
			require_once "./page/delpermonth.php";	
		}else if($id==2){
			require_once "./page/dhis.php";	
		}else if($id==3){
			if(isset($_GET['sub'])){
				if($_GET['sub']==1){
					require_once "./page/graph_simple.php";	
				}else{
					require_once "./page/graph_advance.php";	
				}	
			}
			
		}else if($id==4){
			require_once "./page/gis.php";	
		}else if($id==5){
			require_once "./page/export.php";	
		}
		?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="1" bgcolor="#CCCCCC"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center" style="font-size:0.8em;">Copyright &copy; 2013 powered by <a href="http://simanh.psu.ac.th/simanh" target="_blank">Maternal Surveillance Project</a><br /> 6th Floor Administrative Building, Faculty of Medicine, Prince of Songkla University.<br>For help or assistance, contact <a href="mailto:simanh@mgitsol.com?Subject=Help with the Simanh SA website">MG IT Solutions</a></td>
      </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
