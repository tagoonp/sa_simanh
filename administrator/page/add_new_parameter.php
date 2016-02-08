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
      <td width="170" height="30" align="left" class="paddingTable2">Variable label <span style="color:#900;">*</span> : </td>
      <td width="300" align="left" class="paddingTable2"><input type="text" name="var_label" id="var_label" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" /></td>
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
      <td align="left" class="paddingTable2"><textarea name="var_title" rows="3" id="var_title" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:80px; width:300px; padding-left:5px;"></textarea></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" valign="top" class="paddingTable2">Variable description <span style="color:#900;">*</span> :</td>
      <td align="left" class="paddingTable2"><textarea name="var_description" rows="3" id="var_description" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:80px; width:300px; padding-left:5px;"></textarea></td>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Required status? :</td>
      <td align="left" class="paddingTable2"><select name="req_status" id="req_status"  style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;">
        <option value="0" selected="selected">No</option>
        <option value="1">Yes</option>
      </select></td>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr class="rq1">
      <td height="30" align="left" class="paddingTable2">Alert message :</td>
      <td align="left" class="paddingTable2"><input type="text" name="alt_msg" id="alt_msg" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" /></td>
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
        <option value="<?php print $v[0];?>"><?php print $v[1];?></option>
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
        <option value="1">Complete choice</option>
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
				?><option value="<?php print $v[0];?>"><?php print $v[1];?></option><?php	
			}	
		}
		?>
        
        </select></td>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr class="ct2">
      <td height="30" align="left" class="paddingTable2">Input type <span style="color:#900;">*</span> :</td>
      <td align="left"><span class="paddingTable2">
        <select name="input_type2" id="input_type2"  style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;">
          <?php 
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."input_field WHERE input_type_id in (7,8)";
		$resultField = $db->select($strSQL,false,true);
		
		if($resultField){
			foreach($resultField as $v){
				?>
          <option value="<?php print $v[0];?>"><?php print $v[1];?></option>
          <?php	
			}	
		}
		?>
        </select>
      </span></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" >&nbsp;</td>
      <td align="left" style="padding-left:5px;"><input type="submit" name="button" id="button" value="+ Add" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:200px; padding-left:5px; cursor:pointer; color:#FFF;" /></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
  </table>
</form>
</div>