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

.ip{
	border:solid;
	border-color:#CCC;
	border-width:1px;
	border-radius:3px;
	height:30px;
	padding-left:5px;
	width:100%;
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
	
	$('#bt4').click(function(){
			window.location = './index.php';
	});
	
	$('#bt6').click(function(){
		if(confirm('Add new record?')){
			window.location = './main.php';
		}
			
	});
	
	$('#txtSearch').keyup(function(){
		if($('#txtSearch').val()==''){
			//alert('Please enter keyword!');
			$('#resultField').text('');
		}else{
			doCallAjax($('#txtSearch').val());
		}
	});
});
</script>
<script language="JavaScript">
	   var HttPRequest = false;

	   function doCallAjax(key) {
		  HttPRequest = false;
		  if (window.XMLHttpRequest) { // Mozilla, Safari,...
			 HttPRequest = new XMLHttpRequest();
			 if (HttPRequest.overrideMimeType) {
				HttPRequest.overrideMimeType('text/html');
			 }
		  } else if (window.ActiveXObject) { // IE
			 try {
				HttPRequest = new ActiveXObject("Msxml2.XMLHTTP");
			 } catch (e) {
				try {
				   HttPRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e) {}
			 }
		  } 
		  
		  if (!HttPRequest) {
			 alert('Cannot create XMLHTTP instance');
			 return false;
		  }
	
			var url = '../lib/rearchRecord.php';
			var pmeters = 'key='+key;
			HttPRequest.open('POST',url,true);

			HttPRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			HttPRequest.setRequestHeader("Content-length", pmeters.length);
			HttPRequest.setRequestHeader("Connection", "close");
			HttPRequest.send(pmeters);
			
			
			HttPRequest.onreadystatechange = function()
			{

				 if(HttPRequest.readyState == 3)  // Loading Request
				  {
				   document.getElementById("resultField").innerHTML = "Now is Loading...";
				  }

				 if(HttPRequest.readyState == 4) // Return Request
				  {
				   document.getElementById("resultField").innerHTML = HttPRequest.responseText;
				  }
				
			}

	   }
</script>
<body >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="40" colspan="2" align="center" bgcolor="#000000" style="padding-left:20px; padding-right:20px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="right"><a href="#" class="b">Change password?</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#0D323E"><img src="../images/logo1.gif" width="215" height="116" /></td>
  </tr>
  <tr>
    <td width="450" align="center">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" style="padding-left:20px; padding-right:20px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" style="padding:3px; color:#099; font-size:1.2em;" height="30"><strong>Search</strong></td>
        </tr>
      <tr>
        <td height="1" align="center" bgcolor="#666666" style="padding:1px;"></td>
        </tr>
      <tr>
        <td align="left" style="padding:3px;">
          
          </td>
        </tr>
      <tr>
        <td align="left" style="padding:3px;">Keyword :</td>
        </tr>
      <tr>
        <td align="left" style="padding:3px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="450"><input name="txtSearch" class="ip" id="txtSearch" size="40" placeholder="ID number / Passport ID / Name / Surname / Birthdate : YYMMDD " style="background-color:#FFF; width:95%;" /></td>

            
            <td width="150"><input type="button" name="bt6" id="bt6" value=" + Add new record" style="width:97%; height:35px; background-color:#699; color:#FFF; border:none; border-radius:5px; cursor:pointer; font-weight:bold;" /></td>
            <td width="150"><input type="button" name="bt4" id="bt4" value="Main menu" style="width:97%; height:35px; background-color:#699; color:#FFF; border:none; border-radius:5px; cursor:pointer;" /></td>
            <td width="150"><input type="button" name="bt5" id="bt5" value="Signout" style="width:100%; height:35px; background-color:#699; color:#FFF; border:none; border-radius:5px; cursor:pointer;" /></td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" style="padding:3px;">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" style="padding:0px; padding-left:0px; padding-right:0px; padding-top:5px; padding-bottom:5px;"><span id="resultField" style="font-family:Verdana, Geneva, sans-serif; font-size:0.9em; color:#333;"></span></td>
      </tr>
      <tr>
        <td align="left" style="padding:3px;">&nbsp;</td>
      </tr>
	  <tr>
        <td align="center" style="font-size:0.8em;">Copyright &copy; 2013 powered by <a href="http://simanh.psu.ac.th/simanh" target="_blank" class="d">Maternal Surveillance Project</a><br /> 6th Floor Administrative Building, Faculty of Medicine, Prince of Songkla University.<br>For help or assistance, contact <a href="mailto:simanh@mgitsol.com?Subject=Help with the Simanh SA website" class="d">MG IT Solutions</a></td>
  </tr>
    </table></td>
  </tr>
</table>
</body>
</html>