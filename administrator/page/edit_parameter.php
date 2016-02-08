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
<form name="updateParameter" action="./updateParameter.php?group_id=<?php print $_GET['group_id'];?>&var=<?php print $resultAN[0]['pi_var']?>" method="POST">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="170" height="30" align="left" class="paddingTable2">Variable label <span style="color:#900;">*</span> : </td>
      <td width="300" align="left" class="paddingTable2"><input type="text" name="var_label" id="var_label" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" 
      value="<?php print $resultAN[0]['pi_var'];?>"></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" valign="top" class="paddingTable2">&nbsp;</td>
      <td align="left" valign="top" class="paddingTable2" style="color:#900;">** Ex. age, phone_num, etc </td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" valign="top" class="paddingTable2">Variable title <span style="color:#900;">*</span> :</td>
      <td align="left" class="paddingTable2"><textarea name="var_title" rows="3" id="var_title" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:80px; width:300px; padding-left:5px;"><?php print $resultAN[0]['pi_title'];?></textarea></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" valign="top" class="paddingTable2">Variable description <span style="color:#900;">*</span> :</td>
      <td align="left" class="paddingTable2"><textarea name="var_description" rows="3" id="var_description" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:80px; width:300px; padding-left:5px;"><?php print $resultAN[0]['pi_description'];?></textarea></td>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Required status? :</td>
      <td align="left" class="paddingTable2"><select name="req_status" id="req_status"  style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;">
        <option value="0" selected="selected">No</option>
        <option value="1" <?php if($resultAN[0]['pi_req_status']==1){ print "selected"; }?>>Yes</option>
      </select></td>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Alert message :</td>
      <td align="left" class="paddingTable2"><input type="text" name="alt_msg" id="alt_msg" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" <?php print $resultAN[0]['pi_alt_msg'];?> /></td>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Subgroup :</td>
      <td align="left" class="paddingTable2"><select name="input_subgroup" id="input_subgroup"  style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:250px; padding-left:5px;">
      	<option value="0" selected="selected"><?php print "Non-grouping variable";?></option>
        <?php 
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."parameter_subgroup WHERE sg_group = '".$_GET['group_id']."'";
		$resultField = $db->select($strSQL,false,true);
		
		if($resultField){
			foreach($resultField as $v){
				?>
        <option value="<?php print $v[0];?>" <?php if($resultAN[0]['pi_subgroup']==$v[0]){ print "selected"; }?>><?php print $v[1];?></option>
        <?php	
			}	
		}
		?>
      </select></td>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Input setting type <span style="color:#900;">*</span> :</td>
      <td align="left" class="paddingTable2"><select name="setting_type" id="setting_type"  style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;">
        <option value="0" selected="selected">Manual</option>
        <option value="1" <?php if($resultAN[0]['pi_input_type']==1){ print "selected"; }?>>Complete choice</option>
      </select></td>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr class="ct1">
      <td height="30" align="left" class="paddingTable2">Input type <span style="color:#900;">*</span> :</td>
      <td align="left" class="paddingTable2"><select name="input_type" id="input_type"  style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;">
        <?php 
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."input_field WHERE 1";
		$resultField = $db->select($strSQL,false,true);
		
		if($resultField){
			foreach($resultField as $v){
				?><option value="<?php print $v[0];?>" <?php if($resultAN[0]['pi_input_type_id']==$v[0]){ print "selected"; }?>><?php print $v[1];?></option><?php	
			}	
		}
		?>
        
        </select></td>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" >&nbsp;</td>
      <td align="left" style="padding-left:5px;"><input type="submit" name="button" id="button" value="Update" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:100px; padding-left:5px; cursor:pointer; color:#FFF;" />
        <input type="button" name="cancelbutton" id="cancelbutton" value="Back" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:100px; padding-left:5px; cursor:pointer; color:#FFF;" /></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
  </table>
</form>
</div>