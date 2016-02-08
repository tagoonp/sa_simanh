<?php
$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."parameter_index a 
		  inner join ".substr(strtolower($tbf),0,-2)."parameter_subgroup b 
		  on a.pi_subgroup=b.sg_id WHERE a.pi_id = '%s'",mysql_real_escape_string($_GET['an']));
		  
$resultAN = $db->select($strSQL,false,true);

if(!$resultAN){
	?>
	<script>
    	alert('Parameter passing error!');
		window.history.back();
    </script>
	<?php
	exit();
}
?>
<script>
$(function(){
	// Bypass global value to google map api v=3.2&sensor=false&language=th&callback=initialize
	//	callback for initialize function
	$("<script/>", {
	  "type": "text/javascript",
	  src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=en&callback=initialize"
	}).appendTo("body");
	
	//Form submit validate function
	
	
	$('#cancelbutton').click(function(){
		window.location = 'main.php?id=1&group_id=1&tab_id=1';
	});
	
}); 

function redirect(url){
	window.location = url;	
}
</script>
<div style="width:100%; position:; width:800px; overflow-y:hidden; ">
<form name="addParameter" action="./addParameter.php?group_id=<?php print $_GET['group_id'];?>" method="POST">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" colspan="2" align="left" class="paddingTable2" style="font-size:1.4em;"><strong>View parameter</strong></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="1" colspan="4" align="left" bgcolor="#CCCCCC"></td>
      </tr>
    <tr>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="170" height="30" align="left" valign="top" class="paddingTable2">Variable label<span style="color: #900"> </span> : </td>
      <td width="300" align="left" valign="top" class="paddingTable2"><?php print $resultAN[0]['pi_var'];?></td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" valign="top" class="paddingTable2">Variable title :</td>
      <td align="left" valign="top" class="paddingTable2"><?php print $resultAN[0]['pi_title'];?></td>
      <td align="left" valign="top">&nbsp;</td>
      <td align="left" valign="top">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" valign="top" class="paddingTable2">Variable description<span style="color: #900"> </span>:</td>
      <td align="left" valign="top" class="paddingTable2"><?php print $resultAN[0]['pi_description'];?></td>
      <td align="left" valign="top" class="paddingTable2">&nbsp;</td>
      <td align="left" valign="top" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" valign="top" class="paddingTable2">Required status? :</td>
      <td align="left" valign="top" class="paddingTable2"><?php
      	if($resultAN[0]['pi_req_status']==1){
			print "Required";	
		}else{
			print "None";	
		}
	  ?></td>
      <td align="left" valign="top" class="paddingTable2">&nbsp;</td>
      <td align="left" valign="top" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" valign="top" class="paddingTable2">Alert message :</td>
      <td colspan="2" align="left" valign="top" class="paddingTable2" style="color:#900;"><?php print $resultAN[0]['pi_alt_msg'];?></td>
      <td align="left" valign="top" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" valign="top" class="paddingTable2">Subgroup :</td>
      <td align="left" valign="top" class="paddingTable2"><?php
      $strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."parameter_subgroup WHERE sg_id = '".$resultAN[0]['pi_subgroup']."'";
	  $resultSG = $db->select($strSQL,false,true);
	  if($resultSG){
		 print $resultSG[0]['sg_name']; 
	  }else{
		print "No subgroup";	  
	  }
	  ?></td>
      <td align="left" valign="top" class="paddingTable2">&nbsp;</td>
      <td align="left" valign="top" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" valign="top" class="paddingTable2">Input :</td>
      <td align="left" valign="top" class="paddingTable2"><?php
      $strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."input_type WHERE input_type_id = '".$resultAN[0]['pi_input_type']."'";
	  $resultSG = $db->select($strSQL,false,true);
	  if($resultSG){
		 print $resultSG[0][1]." >> "; 
	  }else{
		print "NA";	  
	  }
	  ?>
        <?php
      $strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."input_field WHERE input_type_id = '".$resultAN[0]['pi_input_type_id']."'";
	  $resultSGC = $db->select($strSQL,false,true);
	  if($resultSGC){
		 print $resultSGC[0][1]; 
	  }else{
		print "NA";	  
	  }
	  ?></td>
      <td align="left" valign="top" class="paddingTable2">&nbsp;</td>
      <td align="left" valign="top" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" valign="top" class="paddingTable2">Choice collection : </td>
      <td colspan="3" align="left" valign="top"><?php
      if($resultSGC){
		  if(($resultSGC[0][0]=='7') || ($resultSGC[0][0]=='8')){
			  //if($resultAN[0]['pi_input_type']==1){
				  $strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."choice_collection WHERE pi_id = '".$resultAN[0]['pi_id']."'";
				  $resutlChoice = $db->select($strSQL,false,true);
				  if($resutlChoice){
					  $g = 0;
					  foreach($resutlChoice as $c){
							print "value = ".$c[1]." : label = ".$c[2]." : status = ";
							if($c['col_status']==1){
								print "enabled";	
							}else{
								print "disabled";	
						 	}
							print "<br>";
							
							if($c['col_confirm']!=0){
								$g++;
							}
					  }
					  
					  
					 // if($g==0){
						   print " <a href=\"main.php?id=1&an=".$resultAN[0]['pi_id']."&group_id=1&tab_id=5&com=ac\" class=d>[ Add item set ]</a>";
					  //}
				  }else{
					  print "No item set : no data collection!";
					  print " <a href=\"main.php?id=1&an=".$resultAN[0]['pi_id']."&group_id=1&tab_id=5&com=ac\" class=d>[ Add item set ]</a>";
				  }
			  //}
			  print "<br>";
			  print "<br>";
		  }else{
			  print "No item set : not support input type!";
		  }
	  }else{
			print "No item set";	  
	  }
	  ?></td>
      </tr>
    <tr>
      <td height="30" align="left" >&nbsp;</td>
      <td align="left" style="padding-left:5px;"><input type="button" name="editbutton" id="editbutton" value="Edit" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:100px; padding-left:5px; cursor:pointer; color:#FFF;" onclick="Javascript:redirect('main.php?id=1&an=<?php print $resultAN[0]['pi_id']; ?>&group_id=<?php print $_GET['group_id'];?>&tab_id=5&com=edit')" />
        <input type="button" name="cancelbutton" id="cancelbutton" value="Back" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:100px; padding-left:5px; cursor:pointer; color:#FFF;" /></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
  </table>
</form>
</div>