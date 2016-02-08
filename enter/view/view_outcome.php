<style>
.tdh{
	background-color:#069;	
}
.tdh td{
	padding-left:5px;
	color:#fff;
	font-weight:bold;
}

</style>
<form id="birthRegForm" name="birthRegForm" method="post" action="../lib/updateOutcome.php?id=<?php print $resultOutcome[0]['ocm_id'];?>"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" bgcolor="#666666" style="padding-left:10px; color:#FFF;">Home / 
    <?php 
	print "No. ".$resultRecord[0]['record_id']." - ";
	print "PID. ".$resultRecord[0]['pid']." / ";
	print "Newborn information";
	?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:10px; padding-right:10px;"><br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-color:#CCC; border-width:1px;">
      <tr>
        <td height="40" style="font-size:1.0em; padding-left:10px;"><?php if($com=='view2'){ print "View";}else{ print "Edit";}?> outcome information :<font color="#006699"> Newbord ID. <?php print $resultOutcome[0]['nb_no'];?></font></td>
        <td width="300" style="font-size:1.0em; padding-left:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="40">&nbsp;</td>
            <td width="50" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0" 
            style="border:solid; border-color:#CCC; border-width:0px 0px 0px 1px;">
              <tr>
                <td width="50" height="40" align="right"><a href="main.php?id=3&amp;com=view" class="d"><img src="../images/view_icon.png" width="30" height="30" /></a></td>
              </tr>
            </table></td>
            <td width="60" align="left" style="padding-left:10px;"><a href="main.php?id=3&amp;com=view" class="d">
              <div>View </div>
            </a></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
      </tr>
      <tr>
        <td height="30" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
          </tr>
        <tr>
          <td width="350" height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Gender : <font color="#FF0000">*</font></td>
          <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"> 
		  <select name="gender" id="gender" class="ip" style="width:250px; height:37px;"  required="required">
		    <option value="" selected="selected">-- Please select gender --</option>
		    <option value="Male" <?php if($resultOutcome){ if($resultOutcome[0]['gender']=='Male') print "selected";}?>>Male</option>
		    <option value="Female" <?php if($resultOutcome){ if($resultOutcome[0]['gender']=='Female') print "selected";}?>>Female</option>
		    </select></td>
        </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Alive :<font color="#FF0000">&nbsp;</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="alive" id="alive" class="ip" style="width:250px; height:37px;">
              <option value="0" <?php if($resultOutcome[0]['alive']=='0') print "selected";?>>No</option>
              <option value="1"  <?php if($resultOutcome[0]['alive']=='1') print "selected";?>>Yes</option>
            </select></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Stillbirth :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <select name="stillbirth" id="stillbirth" class="ip" style="width:250px; height:37px;">
              <option value="0" selected="selected">Not stillbirth</option>
              <option value="1" <?php if($resultOutcome[0]['stillbirth']=='1') print "selected";?>>Fresh</option>
              <option value="2" <?php if($resultOutcome[0]['stillbirth']=='2') print "selected";?>>Macerated</option>
            </select>
              </td>
          </tr>
          <tr>
            <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Apgar score 5 min :</td>
          </tr>
          <tr>
            <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">
            <div class="radioset">
              <input type="radio" id="ag5_0" name="ag5"  value="0" checked="checked" />
              <label for="ag5_0">0</label>
              <input type="radio" id="ag5_1" name="ag5"  value="1" <?php if($resultOutcome[0]['ag5']==1){ print "checked";}?> />
              <label for="ag5_1">1</label>
              <input type="radio" id="ag5_2" name="ag5"  value="2" <?php if($resultOutcome[0]['ag5']==2){ print "checked";}?> />
              <label for="ag5_2">2</label>
              <input type="radio" id="ag5_3" name="ag5"  value="3" <?php if($resultOutcome[0]['ag5']==3){ print "checked";}?> />
              <label for="ag5_3">3</label>
              <input type="radio" id="ag5_4" name="ag5"  value="4" <?php if($resultOutcome[0]['ag5']==4){ print "checked";}?> />
              <label for="ag5_4">4</label>
              <input type="radio" id="ag5_5" name="ag5"  value="5" <?php if($resultOutcome[0]['ag5']==5){ print "checked";}?> />
              <label for="ag5_5">5</label>
              <input type="radio" id="ag5_6" name="ag5"  value="6" <?php if($resultOutcome[0]['ag5']==6){ print "checked";}?> />
              <label for="ag5_6">6</label>
              <input type="radio" id="ag5_7" name="ag5"  value="7" <?php if($resultOutcome[0]['ag5']==7){ print "checked";}?> />
              <label for="ag5_7">7</label>
              <input type="radio" id="ag5_8" name="ag5"  value="8" <?php if($resultOutcome[0]['ag5']==8){ print "checked";}?> />
              <label for="ag5_8">8</label>
              <input type="radio" id="ag5_9" name="ag5"  value="9" <?php if($resultOutcome[0]['ag5']==9){ print "checked";}?> />
              <label for="ag5_9">9</label>
              <input type="radio" id="ag5_10" name="ag5"  value="10" <?php if($resultOutcome[0]['ag5']==10){ print "checked";}?> />
              <label for="ag5_10">10</label>
            </div></td>
          </tr>
          <tr>
            <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Apgar score 10 min <font color="#FF0000">:</font></td>
          </tr>
          <tr>
            <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="ag10_0" name="ag10"  value="0" checked="checked" />
              <label for="ag10_0">0</label>
              <input type="radio" id="ag10_1" name="ag10"  value="1" <?php if($resultOutcome[0]['ag10']==1){ print "checked";}?> />
              <label for="ag10_1">1</label>
              <input type="radio" id="ag10_2" name="ag10"  value="2" <?php if($resultOutcome[0]['ag10']==2){ print "checked";}?> />
              <label for="ag10_2">2</label>
              <input type="radio" id="ag10_3" name="ag10"  value="3" <?php if($resultOutcome[0]['ag10']==3){ print "checked";}?> />
              <label for="ag10_3">3</label>
              <input type="radio" id="ag10_4" name="ag10"  value="4" <?php if($resultOutcome[0]['ag10']==4){ print "checked";}?> />
              <label for="ag10_4">4</label>
              <input type="radio" id="ag10_5" name="ag10"  value="5" <?php if($resultOutcome[0]['ag10']==5){ print "checked";}?> />
              <label for="ag10_5">5</label>
              <input type="radio" id="ag10_6" name="ag10"  value="6" <?php if($resultOutcome[0]['ag10']==6){ print "checked";}?> />
              <label for="ag10_6">6</label>
              <input type="radio" id="ag10_7" name="ag10"  value="7" <?php if($resultOutcome[0]['ag10']==7){ print "checked";}?> />
              <label for="ag10_7">7</label>
              <input type="radio" id="ag10_8" name="ag10"  value="8" <?php if($resultOutcome[0]['ag10']==8){ print "checked";}?> />
              <label for="ag10_8">8</label>
              <input type="radio" id="ag10_9" name="ag10"  value="9"  <?php if($resultOutcome[0]['ag10']==9){ print "checked";}?>/>
              <label for="ag10_9">9</label>
              <input type="radio" id="ag10_10" name="ag10"  value="10" <?php if($resultOutcome[0]['ag10']==10){ print "checked";}?> />
              <label for="ag10_10">10</label>
            </div></td>
          </tr>
          
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Resuscitate bag and mask :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rbm1" name="rbm"  value="0" checked="checked" />
              <label for="rbm1">No</label>
              <input type="radio" id="rbm2" name="rbm"  value="1" <?php if($resultOutcome[0]['rbm']==1){ print "checked";}?> />
              <label for="rbm2">Yes</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Birth weight : <font color="#FF0000">*</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <input type="text" name="birth_wieght" class="ip" id="number" size="40" placeholder="Enter birth weight (g.)" 
              required="required"  value="<?php print $resultOutcome[0]['birth_wieght'];?>" ></td>
          </tr>
          <tr>
            <td width="350" height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Head circumference (cm) : <font color="#FF0000">*</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <input type="text" name="hc" class="ip" id="number2" size="40"
               placeholder="Enter head circumference (cm), If no data enter 0"   value="<?php print $resultOutcome[0]['hc'];?>" ></td>
          </tr>
          <tr>
            <td width="350" height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Fetal length (cm) : <font color="#FF0000">*</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <input type="text" name="fetal_length" class="ip" id="number3" size="40" placeholder="Enter fetal length (cm), If no data enter 0"   value="<?php print $resultOutcome[0]['fetal_length'];?>"  ></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Birth defects found :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rbm25" name="bdf"  value="0" checked="checked" />
              <label for="rbm25">No</label>
              <input type="radio" id="rbm26" name="bdf" value="1"  <?php if($resultOutcome[0]['bdf']==1){ print "checked";}?> />
              <label for="rbm26">Yes</label>
              </div></td>
          </tr>
          <tr class="bfd" style="display:<?php if($resultOutcome[0]['bdf']!=1){ print "none"; }?>;">
            <td height="30" align="left" valign="top" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Identify :</td>
            <td height="30" align="left" valign="top" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><textarea name="bdf_identify" cols="45" rows="5" class="ip" id="bdf_identify" style="height:100px;"><?php print $resultOutcome[0]['bdf_identify'];?></textarea></td>
          </tr>
          <tr class="bfd" style="display:<?php if($resultOutcome[0]['bdf']!=1){ print "none"; }?>;;">
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Birth defects notified :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rbm3" name="bdn"  value="0" checked="checked" />
              <label for="rbm3">No</label>
              <input type="radio" id="rbm4" name="bdn" value="1" <?php if($resultOutcome[0]['bdn']==1){ print "checked";}?>  />
              <label for="rbm4">Yes</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Live birth to HIV positive woman :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rbm5" name="pmctv_lb"  value="0" checked="checked" />
              <label for="rbm5">No</label>
              <input type="radio" id="rbm6" name="pmctv_lb" value="1" <?php if($resultOutcome[0]['pmctv_lb']==1){ print "checked";}?>  />
              <label for="rbm6">Yes</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Exclusive breast feeding within 
              1 hour :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rbm13" name="ebf"  value="0" checked="checked" />
              <label for="rbm13">No</label>
              <input type="radio" id="rbm14" name="ebf" value="1" <?php if($resultOutcome[0]['ebf']==1){ print "checked";}?> />
              <label for="rbm14">Yes</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Breast feeding :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rbm15" name="bf"  value="0" checked="checked" />
              <label for="rbm15">No</label>
              <input type="radio" id="rbm16" name="bf" value="1" <?php if($resultOutcome[0]['bf']==1){ print "checked";}?> />
              <label for="rbm16">Yes</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Formular feeding :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rbm17" name="ff"  value="0" checked="checked" />
              <label for="rbm17">No</label>
              <input type="radio" id="rbm18" name="ff" value="1" <?php if($resultOutcome[0]['ff']==1){ print "checked";}?> />
              <label for="rbm18">Yes</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Skin to Skin contact :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rbm21" name="skin2skin"  value="0" checked="checked" />
              <label for="rbm21">No</label>
              <input type="radio" id="rbm22" name="skin2skin" value="1" <?php if($resultOutcome[0]['skin2skin']==1){ print "checked";}?> />
              <label for="rbm22">Yes</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
          </tr>
          <tr>
            <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
          </tr>
          <tr>
            <td height="30" colspan="2" style="padding:5px 10px 5px 10px; color:#333;"><strong>Infant separation</strong></td>
          </tr>
          <tr>
            <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
            </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Newborn admitted :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rbm19" name="nb_adm"  value="0" checked="checked" />
              <label for="rbm19">No</label>
              <input type="radio" id="rbm20" name="nb_adm" value="1" <?php if($resultOutcome[0]['nb_adm']==1){ print "checked";}?> />
              <label for="rbm20">Yes</label>
              </div></td>
          </tr>
          <tr id="nbAdm" style="display:<?php if($resultOutcome[0]['nb_adm']!=1){ print "none"; }?>;;">
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time of admitted :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input type="date" name="nb_date_adm" id="nb_date_adm"  class="ip"  value="<?php print $resultOutcome[0]['nb_date_adm'];?>" >
  &nbsp;&nbsp;
  <input type="time" name="nb_time_adm" id="nb_time_adm" class="ip"  value="<?php print $resultOutcome[0]['nb_time_adm'];?>" ></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Early neonatal death &lt;7days :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rbm29" name="nb_neonatal"  value="0" checked="checked" />
              <label for="rbm29">No</label>
              <input type="radio" id="rbm30" name="nb_neonatal" value="1" <?php if($resultOutcome[0]['nb_neonatal']==1){ print "checked";}?> />
              <label for="rbm30">Yes</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Transfer out? :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rbm23" name="nb_refer"  value="0" checked="checked" />
              <label for="rbm23">No</label>
              <input type="radio" id="rbm24" name="nb_refer" value="1" <?php if($resultOutcome[0]['nb_refer']==1){ print "checked";}?> />
              <label for="rbm24">Yes</label>
              </div></td>
          </tr>
          <tr id="nbro" style="display:<?php if($resultOutcome[0]['nb_refer']!=1){ print "none"; }?>;;">
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Transfer out facility's name :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input name="nb_refer_facility" class="ip" id="nb_refer_facility" size="40" placeholder="Enter facility's name" value="<?php print $resultOutcome[0]['nb_refer_facility'];?>" ></td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">&nbsp;</td>
          </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50" align="left" style="padding-left:10px; padding-top:10px;">
    <?php
    if($com=='edit'){
		?>
		<input type="submit" name="button" id="button" value="Update" style="background-color:#06C; color:#FFF; height:40px; width:100px; border-radius:5px; border:none; cursor:pointer;">
		<?php
	}
	?>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table></form>