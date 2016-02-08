<?php
$lat = $_GET['lat'];
$lng = $_GET['lng'];
if(isset($_GET['an'])){
	$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."institute  WHERE institute_id = '%s'",
					mysql_real_escape_string($_GET['an']));
	$reultInstitute = $db->select($strSQL,false,true);
	
	if($reultInstitute){
		
	}else{
	?>
	<script>
    	alert('Institute information not found!');
		window.location = 'main.php?id=2&group_id=0&tab_id=1';
    </script>
	<?php
	exit();	
	}
}else{
	?>
	<script>
    	alert('Parameter error!');
		window.location = 'main.php?id=2&group_id=0&tab_id=1';
    </script>
	<?php
	exit();	
}
?>
<style type="text/css">
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
	width:100%;
	height:400px;
	margin:auto;
/*	margin-top:100px;*/
}
</style>
<script>
$(function(){
	// Bypass global value to google map api v=3.2&sensor=false&language=th&callback=initialize
	//	callback for initialize function
	$("<script/>", {
	  "type": "text/javascript",
	  src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=en&callback=initialize"
	}).appendTo("body");
	
	//Form submit validate function
	$('#addInstitute').submit(function(){
		var stat = 0;
		if($('#inst_name').val()==''){
			$('#req1').text("** Please enter institute's name");
			stat++;
		}else{
			$('#req1').text("");
		}
		
		if($('#inst_desc').val()==''){
			$('#req2').text("** Please enter institute's description");
			stat++;
		}else{
			$('#req2').text("");
		}
		
		if(stat!=0){
			alert('Please enter some required filed!');
			$('#inst_name').focus();
			return false;	
		}
	});
	
	$('#cancelbutton').click(function(){
		window.history.back();
	});
}); 
</script>
<div style="width:100%; position:; width:800px; overflow-y:hidden; ">
<form name="addInstitute" id="addInstitute" action="./addInstitute.php" method="POST">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="170" height="30" align="left" class="paddingTable2">Institute name : </td>
      <td width="300" align="left" class="paddingTable2"><?php print $reultInstitute[0]['institute_name'];?></td>
      <td colspan="2" align="left" id="req1"  style="font-size:0.8em; color:#900;">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" valign="middle" class="paddingTable2">Description :</td>
      <td colspan="3" align="left" valign="middle" class="paddingTable2" ><?php print $reultInstitute[0]['institute_description'];?></td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Phone number :</td>
      <td align="left" class="paddingTable2"><?php print $reultInstitute[0]['institute_phone'];?></td>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Institute type  :</td>
      <td align="left"><?php
      $strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."institute_type WHERE institute_type_id = '".$reultInstitute[0]['institute_type']."'";
	  $resultType = $db->select($strSQL,false,true);
	  
	  print $resultType[0][1];
	  ?></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Lattitude :</td>
      <td align="left"><?php print $reultInstitute[0]['institute_latitute'];?></td>
      <td colspan="2" align="left" style="font-size:0.8em; color:#900;">&nbsp;</td>
      </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Longtitude :</td>
      <td align="left"><?php print $reultInstitute[0]['institute_longitude'];?></td>
      <td colspan="2" align="left" style="font-size:0.8em; color:#900;">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" colspan="4" align="left" style="padding:10px 0 10px 0;" >
        <div id="map_canvas"></div>
        </td>
    </tr>
    <tr>
      <td height="30" align="left" >&nbsp;</td>
      <td align="left" style="padding-left:5px;">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" colspan="2" align="left" ><input type="button" name="cancelbutton" id="cancelbutton" value="Back" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:100px; padding-left:5px; cursor:pointer; color:#FFF;" /></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
  </table>
</form>
</div>
<script type="text/javascript" src="./../js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้  
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น  
var my_Marker;  // กำหนดตัวแปรเก็บ marker ตำแหน่งปัจจุบัน หรือที่ระบุ  
function initialize() { // ฟังก์ชันแสดงแผนที่
	GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
	
	// กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas  
    var my_DivObj=$("#map_canvas")[0];   
	var my_Latlng  = new GGM.LatLng(<?php print $lat;?>,<?php print $lng;?>);
	// กำหนดจุดเริ่มต้นของแผนที่
	
		// เรียกใช้งานข้อมูล Geocoder ของ Google Map
		geocoder = new GGM.Geocoder();
		
		var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
		// กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
		var my_DivObj=$("#map_canvas")[0]; 
		// กำหนด Option ของแผนที่
		var myOptions = {
			zoom: 10, // กำหนดขนาดการ zoom
			center: my_Latlng , // กำหนดจุดกึ่งกลาง
			mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่
		};
		map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
		
		var my_Marker = new GGM.Marker({ // สร้างตัว marker
			position: my_Latlng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
			map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
			icon:"http://www.ninenik.com/demo/google_map/images/male-2.png",
			draggable:true, // กำหนดให้สามารถลากตัว marker นี้ได้
			title:"Drag for search location info.!" // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
		});
		
		// กำหนด event ให้กับตัว marker เมื่อสิ้นสุดการลากตัว marker ให้ทำงานอะไร
		GGM.event.addListener(my_Marker, 'dragend', function() {
			var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
			map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker		
			
			// เรียกขอข้อมูลสถานที่จาก Google Map
			geocoder.geocode({'latLng': my_Point}, function(results, status) {
			  if (status == GGM.GeocoderStatus.OK) {
				if (results[1]) {
					// แสดงข้อมูลสถานที่ใน textarea ที่มี id เท่ากับ place_value
				  $("#place_value").val(results[1].formatted_address); // 
				}
			  } else {
				  // กรณีไม่มีข้อมูล
				alert("Geocoder failed due to: " + status);
			  }
			});		
			
			$("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
			$("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
			$("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value
		});		
	
		// กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
		GGM.event.addListener(map, 'zoom_changed', function() {
			$("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value 	
		});
	}


</script>  
