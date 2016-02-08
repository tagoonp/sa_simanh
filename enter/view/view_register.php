<style type="text/css">
.ccolo {
	color: #069;
}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" bgcolor="#666666" style="padding-left:10px; color:#fff;">Home / View birth registration</td>
  </tr>
  <tr>
    <td style="padding-left:10px; padding-right:10px;"><br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-color:#CCC; border-width:1px;">
      <tr>
        <td height="40" style="font-size:1.0em; padding-left:10px;">Main admission data</td>
        <td style="font-size:1.0em; padding-left:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>&nbsp;</td>
            <td width="50">
            <?php
            if($resultRegister[0]['confirm_status']==0){
				?>
				<table width="100%" border="0" cellspacing="0" cellpadding="0" 
            style="border:solid; border-color:#CCC; border-width:0px 1px 0px 1px;">
              <tr>
                <td height="40" align="center"><a href="main.php?com=edit"><img src="../images/edit.png" width="30" height="30" /></a></td>
              </tr>
            </table>
				<?php	
			}
			?>
            </td>
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
            <td width="250" height="30" bgcolor="#FFFFFF" class="ccolo" style="padding:5px 10px 0px 10px; color:#333;">
              <input type="date" name="ent_date" id="ent_date"  class="ip" value="<?php print date('Y-m-d');?>" style="background-color:#FDCEDB;" readonly />&nbsp;&nbsp;<input type="time" name="ent_time" id="ent_time" class="ip" value="<?php print date('H:m'); ?>" style="background-color:#FDCEDB;" readonly />
              </td>
          </tr>
          <tr>
            <td width="350" height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time of admission :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php print $resultRegister[0]['date_adm'];?>&nbsp;&nbsp;<?php print $resultRegister[0]['time_adm'];?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Folder number :</td>
            <td height="30" bgcolor="#FFFFFF"  style="padding:5px 10px 0px 10px; color:#333;"><?php print $resultRegister[0]['folder_no'];?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Point of delivery folder no. :</td>
            <td height="30" bgcolor="#FFFFFF"  style="padding:5px 10px 0px 10px; color:#333;"><?php print $resultRegister[0]['point_no'];?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Refer status :</td>
            <td height="30" bgcolor="#FFFFFF"  style="padding:5px 10px 0px 10px; color:#333;">
              <?php if($resultRegister[0]['refer_in_status']==1){print "Yes";} else {print "No";}?>
                
              </td>
          </tr>
          <tr class="refer" style="display:<?php if($resultRegister[0]['refer_in_status']!=1) print "none";?>;">
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Refer from facility :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php print $resultRegister[0]['refer_in_facility'];?>
              </td>
          </tr>
          <tr class="refer" style="display:<?php if($resultRegister[0]['refer_in_status']!=1) print "none";?>;">
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Stage of patient :</td>
            <td height="30" bgcolor="#FFFFFF"  style="padding: 5px 10px 0px 10px; color: #069;">
              <?php if($resultRegister[0]['stage_of_patient']==1) print "Stable";?>
               <?php if($resultRegister[0]['stage_of_patient']==2) print "Unstable";?>
              <?php if($resultRegister[0]['stage_of_patient']==3) print "Coma";?>
              </td>
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
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">ID No, / Passport ID / Date of bitrh [YYMMDD] :</td>
            <td height="30" bgcolor="#FFFFFF" class="ccolo" style="padding:5px 10px 5px 10px; color:#333;">
            <?php print $resultRegister[0]['pid'];?>
            </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Patient's Name, Midname, Surname :</td>
            <td height="30" bgcolor="#FFFFFF" class="ccolo" style="padding:5px 10px 5px 10px; color:#333;">
              <?php 
			$mname = '';
			if($resultRegister[0]['p_mname']!=''){
				$mname = $resultRegister[0]['p_mname']." ";
			}
			print $resultRegister[0]['p_fname']." ".$mname.$resultRegister[0]['p_lname'];?></td>
          </tr>
          <tr>
            <td height="30" valign="top" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Address :</td>
            <td height="30" valign="top" bgcolor="#FFFFFF" class="ccolo" style="padding:5px 10px 5px 10px; color:#333;">
            <?php print $resultRegister[0]['p_address'];?>
            </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Phone number : </td>
            <td height="30" bgcolor="#FFFFFF" class="ccolo" style="padding:5px 10px 5px 10px; color:#333;">
            <?php print $resultRegister[0]['p_phone'];?>
            </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Date of birth : </td>
            <td height="30" bgcolor="#FFFFFF" class="ccolo" style="padding:5px 10px 5px 10px; color:#333;">
            <?php print $resultRegister[0]['p_dob'];?>
            </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Age :</td>
            <td height="30" bgcolor="#FFFFFF" class="ccolo" style="padding:5px 10px 5px 10px; color:#333;">
            <?php print $resultRegister[0]['p_cage'];?></td>
          </tr>
          <tr>
            <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">&nbsp;</td>
          </tr>
          </table></td>
      </tr>
    </table></td>
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