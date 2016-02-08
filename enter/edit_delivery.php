<form id="birthRegForm" name="birthRegForm" method="post" action="../lib/updateDelivery.php"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
   <td height="35" bgcolor="#666666" style="padding-left:10px; color:#FFF;">Home / 
    <?php 
	print "No. ".$resultRecord[0]['record_id']." - ";
	print "PID. ".$resultRecord[0]['pid']." / ";
	print "Delivery information";
	?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:10px; padding-right:10px;"><br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-color:#CCC; border-width:1px;">
      <tr>
        <td height="40" style="font-size:1.0em; padding-left:10px;">Delivery information</td>
      </tr>
      <tr>
        <td height="1" bgcolor="#CCCCCC"></td>
      </tr>
      <tr>
        <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
            </tr>
          <tr>
            <td width="350" height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Gestational age at delivery : <font color="#FF0000">*</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <input type="text" name="ga_del" class="ip" id="number3" size="40" placeholder="Enter GA at delivery" required="required" value=<?php if($resultRecord2){ print $resultRecord2[0]['ga_adm'];}?> />
              </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time of delivery : <font color="#FF0000">*</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <input type="date" name="date_del" id="date_del"  class="ip" required="required" value="<?php print $resultDelivery[0][2];?>" />
  &nbsp;&nbsp;
  <input type="time" name="time_del" id="time_del" class="ip" value="<?php print $resultDelivery[0][3];?>" />
              </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Mode of delivery :<font color="#FF0000">&nbsp;</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <select name="mode_del" id="mode_del" class="ip" style="width:250px; height:37px;">
                <option value="1" selected="selected">Normal delivery</option>
                <option value="2" <?php if($resultDelivery[0][4]==2){print "selected";}?>>V/E</option>
                <option value="3" <?php if($resultDelivery[0][4]==3){print "selected";}?>>F/E</option>
                <option value="4" <?php if($resultDelivery[0][4]==4){print "selected";}?>>Caesarean section</option>
                <option value="5" <?php if($resultDelivery[0][4]==5){print "selected";}?>>Vaginal breach</option>
                </select>
              </td>
          </tr>
          <tr id="modq" style="display:<?php if(($resultDelivery[0][4]==2) || ($resultDelivery[0][4]==3) || ($resultDelivery[0][4]==4)){
			  }else{ print "none"; }?>;">
            <td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Indication : </td>
            <td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="indication2" id="indication2"  class="ip" style="width:250px; height:37px;">
            <?php 
			$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."indication WHERE ind_part = 1";
			if(($resultDelivery[0][4]==2) || ($resultDelivery[0][4]==3)){
				$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."indication WHERE ind_part = 2";
			}
			
			$result = $db->select($strSQL,false,true);
			if($result){
				foreach($result as $v){
					if($resultDelivery[0][5]==$v[0]){
						print "<option value=".$v[0]." selected>".$v[1]."</option>";
					}else{
						print "<option value=".$v[0].">".$v[1]."</option>";
					}
						
				}	
			}
			?>
            </select></td>
          </tr>
          <tr id="modq2" style="display:<?php if(($resultDelivery[0][4]==2) || ($resultDelivery[0][4]==3) || ($resultDelivery[0][4]==4)){
			  }else{ print "none"; }?>;">
            <td height="30" align="right" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              Other : 
                <input type="text" name="ind_other2" id="ind_other2" class="ip" value=<?php print $resultDelivery[0][13];?> ></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Type of birth attendant <font color="#FF0000">:</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <select name="type_ba" id="type_ba" class="ip" style="width:250px; height:37px;">
                <option value="99" selected="selected">No data</option>
                <option value="1" <?php if($resultDelivery[0][6]==1){print "selected";}?>>Midwife</option>
                <option value="2" <?php if($resultDelivery[0][6]==2){print "selected";}?>>Professional Nurse</option>
                <option value="3" <?php if($resultDelivery[0][6]==3){print "selected";}?>>Medical student</option>
                <option value="4" <?php if($resultDelivery[0][6]==4){print "selected";}?>>Medical officer</option>
                <option value="5" <?php if($resultDelivery[0][6]==5){print "selected";}?>>Registrar</option>
                <option value="6" <?php if($resultDelivery[0][6]==6){print "selected";}?>>Obstetrician</option>
                </select>
              </td>
          </tr>
          <tr>
            <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
          </tr>
          <tr>
            <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
          </tr>
          <tr>
            <td height="30" colspan="2" style="padding:5px 10px 5px 10px; color:#333;"><strong>Perineum</strong></td>
          </tr>
          <tr>
            <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Perineum :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rdg1" name="pi"  value="0" <?php if($resultDelivery[0]['intact']==1){print "checked";}?> />
              <label for="rdg1">Infact</label>
              <input type="radio" id="rdg2" name="pi"  value="1" <?php if($resultDelivery[0]['episiotomy']==1){print "checked";}?> />
              <label for="rdg2">Episiotomy</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Degree tear :<font color="#FF0000">&nbsp;</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rdg5" name="dt" value="99" checked="checked" />
              <label for="rdg5">No data</label>
              <input type="radio" id="rdg6" name="dt" value="1" <?php if($resultDelivery[0][9]==1){print "checked";}?> />
              <label for="rdg6">1</label>
              <input type="radio" id="rdg7" name="dt" value="2" <?php if($resultDelivery[0][9]==2){print "checked";}?> />
              <label for="rdg7">2</label>
              <input type="radio" id="rdg8" name="dt" value="3" <?php if($resultDelivery[0][9]==3){print "checked";}?> />
              <label for="rdg8">3</label>
              </div></td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
          </tr>
          <tr>
            <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
          </tr>
          <tr>
            <td height="30" colspan="2" style="padding:5px 10px 5px 10px; color:#333;"><strong>ART</strong></td>
          </tr>
          <tr>
            <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Antenatal client on AZT before labour :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rdg13" name="art1"  value="0" checked="checked" />
              <label for="rdg13">No</label>
              <input type="radio" id="rdg14" name="art1"  value="1" <?php if($resultDelivery[0][10]==1){print "checked";}?> />
              <label for="rdg14">Yes</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Antenatal client Nevirapine taken during labour :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rdg15" name="art2"  value="0" checked="checked" />
              <label for="rdg15">No</label>
              <input type="radio" id="rdg16" name="art2"  value="1" <?php if($resultDelivery[0][11]==1){print "checked";}?> />
              <label for="rdg16">Yes</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Truvada given to woman after delivery</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rdg9" name="art3"  value="0" checked="checked" />
              <label for="rdg9">No</label>
              <input type="radio" id="rdg10" name="art3"  value="1" <?php if($resultDelivery[0][12]==1){print "checked";}?> />
              <label for="rdg10">Yes</label>
              </div></td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
          </tr>
          <tr>
            <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
          </tr>
          
          </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50" align="left" style="padding-left:10px; padding-top:10px;"><input type="submit" name="button" id="button" value="Update" style="background-color:#06C; color:#FFF; height:40px; width:100px; border-radius:5px; border:none;"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
