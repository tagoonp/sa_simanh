<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),trim($p),trim($dbn));

if(!isset($_SESSION['userSIMANHusername'])){
	?>
	<script>
    	alert('Session timeout!');
		window.location = '../index.php';
    </script>
	<?php
}

$id = 0;
if(isset($_GET['id']))
	$id = $_GET['id'];
	
$tab = 1;
if(isset($_GET['tab']))
	$tab = $_GET['tab'];
	
$com_id = 0;
if(isset($_GET['com_id']))
	$com_id = $_GET['com_id'];

if($id!=0){
	if(!isset($_SESSION['userSIMANHmother_record'])){
		header('Location: ./main.php');	
		exit();
	}
}

$resultRecord3 = false;

if(isset($_SESSION['userSIMANHmother_record'])){
	$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
		  mysql_real_escape_string("registerrecord"),
		  mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
    );
	
	$resultRegister = $db->select($strSQL,false,true);
}

if(isset($_SESSION['userSIMANHmother_record'])){
	$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
			  mysql_real_escape_string("obstetric"),
			  mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
			  );
	$resultRecord3 = $db->select($strSQL,false,true);
}



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SIMANH Administrator panel</title>

<link href="../css/jquery-ui.css" rel="stylesheet">
<style>
body{
	padding:0;
	margin:0;
	font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
	
}

.radioset{
	font-size:0.8em;
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

.tbd td{
	padding-left:5px;
	font-size:0.9em;
	text-align:left;
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
}

	.demoHeaders {
		margin-top: 2em;
	}
	#dialog-link {
		padding: .4em 1em .4em 20px;
		text-decoration: none;
		position: relative;
	}
	#dialog-link span.ui-icon {
		margin: 0 5px 0 0;
		position: absolute;
		left: .2em;
		top: 50%;
		margin-top: -8px;
	}
	#icons {
		margin: 0;
		padding: 0;
	}
	#icons li {
		margin: 2px;
		position: relative;
		padding: 4px 0;
		cursor: pointer;
		float: left;
		list-style: none;
	}
	#icons span.ui-icon {
		float: left;
		margin: 0 4px;
	}
	.fakewindowcontain .ui-widget-overlay {
		position: absolute;
	}
	select {
		width: 200px;
	}
	
	#button{
		cursor:pointer;
	}
</style>
</head>
<body onLoad="callFacility();<?php if($resultRecord3){?>setHIVAlive('<?php print $resultRecord3[0]['hiv_status'];?>')<?php }?>">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="60" colspan="2"  align="left" valign="top" bgcolor="#F3F3F3" style="background-image:url(../images/tb_bg1.gif); background-size:contain;">&nbsp;</td>
  </tr>
  <tr>
    <td height="1" colspan="2"  align="left" valign="top" bgcolor="#999999"></td>
  </tr>
  <tr>
    <td width="230"  align="left" valign="top" bgcolor="#333333"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="35" bgcolor="#333333"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="40" bgcolor="#111111" class="paddingTable"><a href="main.php" class="c">
              <div>Birth registry</div></a></td>
            </tr>
          <?php
          if(isset($_SESSION['userSIMANHmother_record'])){
				?>
          <tr>
            <td height="30" class="paddingTable"><a href="main.php?id=1" class="c">
              <div>Obstetric information</div></a></td>
            </tr>
          <tr>
            <td height="30" class="paddingTable"><a href="main.php?id=2" class="c">
              <div>Delivery information</div></a></td>
            </tr>
          <tr>
            <td height="30" class="paddingTable"><a href="main.php?id=3" class="c">
              <div>Newborn charecteristics</div></a></td>
            </tr>
          <tr>
            <td height="35" class="paddingTable"><a href="main.php?id=4" class="c">
              <div>Complication</div>
              </a></td>
            </tr>
          <tr>
            <td height="35" class="paddingTable"><a href="main.php?id=5" class="c">
              <div>Postnatal information</div>
              </a></td>
            </tr>
          <tr>
            <td height="35" class="paddingTable"><a href="close_session.php" class="c">
              <div>Close session</div>
            </a></td>
          </tr>
          <tr>
            <td height="35" class="paddingTable">&nbsp;</td>
          </tr>
          <tr>
            <td height="35" class="paddingTable">&nbsp;</td>
          </tr>
          <?php	  
		  }else{
			?>
			<tr>
            <td height="35" class="paddingTable"><a href="./index.php" class="c">
              <div>Main menu</div>
            </a></td>
          </tr>
          <tr>
            <td height="35" class="paddingTable">&nbsp;</td>
          </tr>
			<?php  
		  }
		  ?>
          
          <tr>
            <td height="200" class="paddingTable">&nbsp;</td>
            </tr>
          
          </table></td>
      </tr>
    </table></td>
    <td align="left" valign="top" bgcolor="#F3F3F3"><?php
    switch($id){
			case 0:	require_once "add_new.php";break;
			case 1:	require_once "obstetric.php";break;
			case 2:	require_once "delivery.php";break;
			case 3:	
					if($tab==1)
						require_once "outcome.php";
					else if($tab==2)
						require_once "outcome_view.php";
					break;
			case 4: 	require_once "complication.php";break;
			case 5: 	require_once "postnatal.php";break;
	}
	?></td>
  </tr>
</table>
<script src="../external/jquery/jquery.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/jscript.js"></script>

<script>

$( "#accordion" ).accordion();

$( "#refer_facility, #anc_attend, .refer" ).autocomplete({
	source: facility
});

$( ".button" ).button();
$( ".radioset" ).buttonset();

$( "#tabs" ).tabs();



$( "#datepicker" ).datepicker({
	inline: true
});

$( "#menu" ).menu();

$( "#selectmenu" ).selectmenu();


// Hover states on the static widgets
$( "#dialog-link, #icons li" ).hover(
	function() {
		$( this ).addClass( "ui-state-hover" );
	},
	function() {
		$( this ).removeClass( "ui-state-hover" );
	}
);
</script>
<script>
function confirmDel(url,str){
	if(confirm("Confirm to " + str +" this record?")){
		window.location = url;
	}	
}
</script>
</body>
</html>