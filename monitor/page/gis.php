<?php
$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE institute_type in ('2','3')",
		  mysql_real_escape_string("institute")
    );
$resultInstitute = $db->select($strSQL,false,true);

$sdate = date('Y-m')."-01";
$sdate = '2014-09-01';
if(isset($_GET['sdate'])){
	$sdate = $_GET['sdate'];
}
$edate = date('Y-m-d');
if(isset($_GET['edate'])){
	$edate = $_GET['edate'];
}

$case = 0;
if(isset($_GET['case']))
	$case = $_GET['case'];

$dateFilter = " and date_adm between '$sdate' and '$edate'";


?>
<style>
#map-canvas { 
	height: 400px;
	width: 100%;
	background-color:#666;
	border:solid;
	border-color:#FFF;
	border-width:3px;
	-moz-box-shadow: 0 0 5px #888;
	-webkit-box-shadow: 0 0 5px#888;
	box-shadow: 0 0 5px #888;
}
</style>
<script>
var HttPRequest = false;
var atmittedArr = [];
var deliveryArr = [];
var birthArr = [];
var livebirthArr = [];
var bounds = bounds = new google.maps.LatLngBounds();
var markers = [];
var beachMarker;
var GGM;
var infowindow=[]; 
var infowindowTmp;
var s;
var a;
var next;
var count = 0;
var first;
var rounds = 0;
var marker;
var toggle = 0;
//var atmittedArr = [];
var atmittedCluster;
function callCoordination(con,sdate,edate){
	var coor = "";
	$.post("php/callCoordination.php",{condition:con, con2:sdate, con3:edate},function(data){
			//alert(sdate);
			for(var i=0;i<data.length;i++){				
				var latLng = new google.maps.LatLng(data[i].institute_latitute,data[i].institute_longitude);
				var marker = new google.maps.Marker({
				   	position: latLng,
					map: window.map,
				   	icon: coor
				  });
				atmittedArr.push(marker);  	
			}
			atmittedCluster = new MarkerClusterer(map, atmittedArr);
	},'json');
}
</script>
<script>
var initialLocation;
var map ;
function initialize() {
    var myLatlng = new google.maps.LatLng(-25.743498, 28.148958);
  	var myOptions = {
    	zoom: 10,
		center: myLatlng,
		mapTypeControl: false,
    	mapTypeId: google.maps.MapTypeId.ROADMAP
  	};
 	
	window.map = new google.maps.Map(document.getElementById("map-canvas"), myOptions);
  	callCoordination(<?php print $case;?>,'<?php print $sdate;?>','<?php print $edate?>');
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="300" height="30" align="left" style="font-size:1.2em;">GIS Overlay via google map</td>
    <td height="30" style="font-size:1.2em;" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="color:#063;">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="left" style="color:#063;"><table width="100%" border="0" cellspacing="0" cellpadding="0"
    style="font-size:0.9em;">
      <tr>
        <td width="50" align="left" style="padding-right:10px;">Start :</td>
        <td width="150"><input type="date" name="sdate" id="sdate" style="height:30px; width:150px; border:solid; border-color:#CCC; border-width:1px; border-radius:5px;" value="<?php print $sdate; ?>" ></td>
        <td width="50" align="right" style="padding-right:10px;">End : </td>
        <td width="150"><input type="date" name="edate" id="edate" style="height:30px; width:150px; border:solid; border-color:#CCC; border-width:1px; border-radius:5px;" value="<?php print $edate; ?>"></td>
        <td width="120" align="right" style="padding-right:10px;">Complication :</td>
        <td><select name="insts" id="insts" style="height:30px; width:200px; border:solid; border-color:#CCC; border-width:1px; border-radius:5px;">
          <option value="0" selected="selected">Total admitted</option>
          <option value="1" <?php if($case==1){ print "selected";}?>>Total delivery</option>
          <option value="2" <?php if($case==2){ print "selected";}?>>Total birth</option>
          <option value="3" <?php if($case==3){ print "selected";}?>>Total livebirth</option>
          <optgroup label="Complication in labour">
          <option value="4" <?php if($case==4){ print "selected";}?>>Induction of labour</option>
          <option value="5" <?php if($case==5){ print "selected";}?>>Antepartum haemorrhage</option>
          <option value="6" <?php if($case==6){ print "selected";}?>>Postpartum haemorrhage</option>
          <option value="7" <?php if($case==7){ print "selected";}?>>Severe pre eclampsia</option>
          <option value="8" <?php if($case==8){ print "selected";}?>>Eclampsia</option>
          <option value="9" <?php if($case==9){ print "selected";}?>>Prolonged rupture of membranes</option>
          <option value="10" <?php if($case==10){ print "selected";}?>>Ruptured uterus</option>
          <option value="11" <?php if($case==11){ print "selected";}?>>Sepsis</option>
          <option value="12" <?php if($case==12){ print "selected";}?>>Obstructed or prolonged labour</option>
          <option value="13" <?php if($case==13){ print "selected";}?>>Retained placenta</option>
          <option value="14" <?php if($case==14){ print "selected";}?>>Manual removal of placenta</option>
          <option value="15" <?php if($case==15){ print "selected";}?>>Maternal death</option>
          <option value="16" <?php if($case==16){ print "selected";}?>>Stillbirth</option>
          <option value="17" <?php if($case==17){ print "selected";}?>>Neonatal death</option>
          <option value="18" <?php if($case==18){ print "selected";}?>>Preterm birth</option>
          <option value="19" <?php if($case==19){ print "selected";}?>>Low birth weight</option>
          </optgroup>
          <optgroup label="Complication at postnatal">
          <option value="20" <?php if($case==20){ print "selected";}?>>Postpartum haemorrhage</option>
          <option value="21" <?php if($case==21){ print "selected";}?>>Postpartum eclampsia</option>
          <option value="22" <?php if($case==22){ print "selected";}?>>Postpartum sepsis</option>
          <option value="23" <?php if($case==23){ print "selected";}?>>Postpartum maternal death</option>
          </optgroup>
        </select>
          <input type="button" name="view_btn2" id="view_btn2" value="View" style="background-color:#3C9; color:#FFF; border:none; border-radius:3px; cursor:pointer; width:60px; height:28px; font-weight:bold;" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" style="padding-right:10px;">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" valign="top" style="padding-right:10px;"><div id="map-canvas"/></td>
  </tr>
  <tr>
    <td valign="top" style="padding-right:10px;">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="1" colspan="2" valign="top" bgcolor="#CCCCCC" style="padding-right:10px;"></td>
  </tr>
  <tr>
    <td valign="top" style="padding-right:10px;">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
