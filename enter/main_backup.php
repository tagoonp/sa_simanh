<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),$p,trim($dbn));

if(!isset($_SESSION['userSIMANHusername'])){
		header('Location: ../index.php');	
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
	}
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
</style>
</head>
<body>
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

<script>

$( "#accordion" ).accordion();



var availableTags = [
	"ActionScript",
	"AppleScript",
	"Asp",
	"BASIC",
	"C",
	"C++",
	"Clojure",
	"COBOL",
	"ColdFusion",
	"Erlang",
	"Fortran",
	"Groovy",
	"Haskell",
	"Java",
	"JavaScript",
	"Lisp",
	"Perl",
	"PHP",
	"Python",
	"Ruby",
	"Scala",
	"Scheme"
];
$( "#autocomplete" ).autocomplete({
	source: availableTags
});



$( ".button" ).button();
$( ".radioset" ).buttonset();



$( "#tabs" ).tabs();



$( "#datepicker" ).datepicker({
	inline: true
});

$( "#menu" ).menu();



$( "#tooltip" ).tooltip();



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

$(function(){
	$('#com1').change(function(){
		var value = $('#com1').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=1&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
		}
	});
	
	$('#com2').change(function(){
		var value = $('#com2').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=2&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
				
		}
	});
	
	$('#com3').change(function(){
		var value = $('#com3').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=3&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');	
		}
	});
	
	$('#com4').change(function(){
		var value = $('#com4').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=4&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
		}
	});
	
	$('#com5').change(function(){
		var value = $('#com5').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=5&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
		}
	});
	
	$('#com6').change(function(){
		var value = $('#com6').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=6&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
		}
	});
	
	$('#com7').change(function(){
		var value = $('#com7').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=7&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
		}
	});
	
	$('#com8').change(function(){
		var value = $('#com8').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=8&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
		}
	});
	
	$('#com9').change(function(){
		var value = $('#com9').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=9&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
		}
	});
	
	$('#com10').change(function(){
		var value = $('#com10').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=10&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
		}
	});
	
	$('#com11').change(function(){
		var value = $('#com11').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=11&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
		}
	});
	
	$('#com12').change(function(){
		var value = $('#com12').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=12&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
		}
	});
	
	$('#com13').change(function(){
		var value = $('#com13').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=13&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
		}
	});
	
	$('#com14').change(function(){
		var value = $('#com14').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=14&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
		}
	});
	
	$('#com15').change(function(){
		var value = $('#com15').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=15&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
		}
	});
	
	$('#com16').change(function(){
		var value = $('#com16').val();
		if(confirm("Confirm to change Induction of labour status?")){
				window.location = '../lib/updateComplicationStatus.php?comp=16&to=' + value;
		}else{
			$("#complicationForm").trigger('reset');
		}
	});
	
	$('#ga1st').blur(function(){
		if($('#ga1st').val()<20){
			$('#ga20w').val(1);
		}else{
			$('#ga20w').val(0);	
		}
	});
	
	$('#rh').change(function(){
		if($('#rh').val()=='Neg'){
			$('#rhq').show();
		}else{
			$('#rhq').hide();
		}
	});
	
	$('#cd4').change(function(){
		if($('#cd4').val()==1){
			$('#cd4q').show();
		}else{
			$('#cd4q').hide();
			$('#cd4_count').val(0);
		}
	});
	
	$('#stage_of_labour').change(function(){
		if($('#stage_of_labour').val()!=0){
			$('.solq').show();
		}else{
			$('.solq').hide();	
		}
	});
	
	$('#mode_del').change(function(){
		if(($('#mode_del').val()>=2) && ($('#mode_del').val()<=4)){
			$('#modq').show();
		}else{
			$('#modq').hide();
			$('#indication').val('');	
		}
	});
	
});
</script>
</body>
</html>