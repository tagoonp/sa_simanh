<script>
$(function(){
	$('#dob').change(function(){
		if($('#dob').val()!=''){

		}
	});

	$('#refer_status').change(function(){
		if($('#refer_status').val()!=0){
			//alert('a');
			$('.rf').show();
		}else{
			//alert('b');
			$('.rf').hide();
		}
	});
});
</script>
<style>
.rf{
	display:none;
}
</style>
<?php

$com = "view";
if(isset($_GET['com'])){
	$com = $_GET['com'];
}


if(isset($_SESSION['userSIMANHmother_record'])){
	$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
		  mysql_real_escape_string("registerrecord"),
		  mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
    );

	$resultRegister = $db->select($strSQL,false,true);

	if($resultRegister){
		//Edit
		if($com=='edit'){
			require "./edit_register.php";

		}else{
			//View
			require_once "./view/view_register.php";
		}
	}else{
		print "d";
	}
}else{
?>
<form id="birthRegForm" name="birthRegForm" method="post" action="../lib/saveRecord.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" bgcolor="#666666" style="padding-left:10px; color:#fff;">Home / Birth registration</td>
  </tr>
  <tr>
    <td style="padding-left:10px; padding-right:10px;"><br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-color:#CCC; border-width:1px;">
      <tr>
        <td height="40" style="font-size:1.0em; padding-left:10px;">Main admission data</td>
        <td style="font-size:1.0em; padding-left:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
            <td width="50"><table width="100%" border="0" cellspacing="0" cellpadding="0"
            style="border:solid; border-color:#CCC; border-width:0px 1px 0px 1px;">
              <tr>
                <td height="40" align="center"><a href="main.php?id=3&amp;tab=1"><img src="../images/view_icon.png" width="30" height="30" /></a></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
      </tr>
      <tr>
        <td height="30" colspan="2">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
            <td bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
          </tr>
          <tr style="display:none;">
            <td width="350" height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time of enter :</td>
            <td width="250" height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <input type="date" name="ent_date" id="ent_date"  class="ip" value="<?php print date('Y-m-d');?>" style="background-color:#FDCEDB;" readonly />&nbsp;&nbsp;<input type="time" name="ent_time" id="ent_time" class="ip" value="<?php print date('H:m'); ?>" style="background-color:#FDCEDB;" readonly />
              </td>
          </tr>
          <tr>
            <td width="350" height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time of admission : <font color="#FF0000">*</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input type="date" name="adm_date" id="adm_date"  class="ip" value="<?php print date('Y-m-d');?>" />&nbsp;&nbsp;<input type="time" name="adm_time" id="adm_time" class="ip" value="<?php print date('H:m'); ?>" /></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Folder number :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input name="folder_no" class="ip" id="textfield2" size="40" placeholder="Antenatal folder no." /></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Point of delivery folder no.</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input name="point_no" class="ip" id="textfield6" size="40" placeholder="Point of delivery folder no." /></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Refer status :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <select name="refer_status" id="refer_status" class="ip" style="width:250px; height:37px;">
                <option value="0" selected="selected">No</option>
                <option value="1">Yes</option>
                </select>
              </td>
          </tr>
          <tr class="refer" style="display:none;">
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Refer from facility :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input name="refer_facility" class="ip" id="refer_facility" size="40" placeholder="Facility's name" />
              </td>
          </tr>
          <tr class="refer" style="display:none;">
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Stage of patient :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="stage_of_patient" id="stage_of_patient" class="ip" style="width:250px; height:37px;">
              <option value="1" selected="selected">Stable</option>
              <option value="2">Unstable</option>
              <option value="3">Coma</option>
              </select></td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#FFFFFF" >&nbsp;</td>
          </tr>
          <tr>
            <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
          </tr>
          <tr>
            <td height="30" colspan="2" style="padding:5px 10px 5px 10px; color:#333;"><strong>Demographic information</strong></td>
          </tr>
          <tr>
            <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
          </tr>
          <tr>
            <td bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">&nbsp;</td>
            <td bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">&nbsp;</td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">ID No, / Passport ID / Date of bitrh [YYMMDD] : <font color="#FF0000">*</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><input type="text" name="pid" class="ip" id="textfield3" size="40" required="required" /></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Patient's Name, Midname, Surname : <font color="#FF0000">*</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><input name="fname" class="ip" id="textfield7" size="20" placeholder="Firstname" type="text" required="required" /></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">&nbsp;</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><input name="mname" class="ip" id="textfield8" size="20" placeholder="Midname" /></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">&nbsp;</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><input name="lname" class="ip" id="textfield" size="20" placeholder="Surname" /></td>
          </tr>
          <tr>
            <td height="30" valign="top" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Address :</td>
            <td height="30" valign="top" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><textarea name="address" cols="60" rows="5" class="ip" id="address" style="height:70px;"></textarea></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Phone number : </td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><input name="phonenumber" class="ip" id="textfield4" size="40" placeholder="Phone number" type="text" /></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Date of birth : </td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><input type="date" name="dob" id="dob"  class="ip"  /></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Age : <font color="#FF0000">*</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><input type="number" name="c_age" class="ip" id="c_age" size="40" placeholder="Current age" required="required" /></td>
          </tr>
          <tr>
            <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">&nbsp;</td>
          </tr>
          </table></td>
      </tr>
    </table>
      <p><br />
        <span style="padding-left:10px; padding-top:10px;">
          <input type="submit" name="button" id="button" value="Save" style="background-color:#06C; color:#FFF; height:40px; width:100px; border-radius:5px; border:none; cursor:pointer;" />
          <input type="reset" name="button2" id="button2" value="Reset" style="background-color:#06C; color:#FFF; height:40px; width:100px; border-radius:5px; border:none; cursor:pointer;" />
      </span></p>
      <p>&nbsp;</p></td>
  </tr>
  <tr>
    <td height="50" align="left" style="padding-left:10px; padding-top:10px;">&nbsp;</td>
  </tr>
  <tr>
    <td height="50" align="left" style="padding-left:10px; padding-top:10px;">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
<?php
}
?>
