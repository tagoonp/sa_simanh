<?php
	//Check record information
    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
		  mysql_real_escape_string("registerrecord"),
		  mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
		  );
	$resultRecord = $db->select($strSQL,false,true);
	
	//If no record found
	if(!$resultRecord){
		
	}
	
	$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
		  mysql_real_escape_string("obstetric"),
		  mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
		  );
	$resultRecord2 = $db->select($strSQL,false,true);
	
	$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
		  mysql_real_escape_string("delivery"),
		  mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
    );
	
	$resultDelivery = $db->select($strSQL,false,true);
	
	$com = 'view';
	if(isset($_GET['com']))
		$com = $_GET['com'];
	
	if($resultDelivery){
		if($com=='edit'){
			require_once './edit_delivery.php';
		}else{
			require_once './view/view_delivery.php';	
		}
	}else{
		//print "a";
		?>
<form id="birthRegForm" name="birthRegForm" method="post" action="../lib/saveDelivery.php"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
        <td style="font-size:1.0em; padding-left:10px;">&nbsp;</td>
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
            <td width="350" height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Gestational age at delivery : <font color="#FF0000">*</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <input type="text" name="ga_del" class="ip" id="number3" size="40" placeholder="Enter GA at delivery" required="required" value="<?php if($resultRecord2){ print $resultRecord2[0]['ga_adm'];}?>" />
              </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time of delivery : <font color="#FF0000">*</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <input type="date" name="date_del" id="date_del"  class="ip" required="required"  />
  &nbsp;&nbsp;
  <input type="time" name="time_del" id="time_del" class="ip" />
              </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Mode of delivery :<font color="#FF0000">&nbsp;</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <select name="mode_del" id="mode_del" class="ip" style="width:250px; height:37px;">
                <option value="1" selected="selected">Normal delivery</option>
                <option value="2">V/E</option>
                <option value="3">F/E</option>
                <option value="4">Caesarean section</option>
                <option value="5">Vaginal breach</option>
                </select>
              </td>
          </tr>
          <tr id="modq" style="display:none;">
            <td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Indication : </td>
            <td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="indication" id="indication"  class="ip" style="width:250px; height:37px;">
            </select></td>
          </tr>
          <tr id="modq2" style="display:none;">
            <td height="30" align="right" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              Other : 
                <input type="text" name="ind_other" id="ind_other" class="ip" /></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Type of birth attendant <font color="#FF0000">:</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <select name="type_ba" id="type_ba" class="ip" style="width:250px; height:37px;">
                <option value="99" selected="selected">No data</option>
                <option value="1">Midwife</option>
                <option value="2">Professional Nurse</option>
                <option value="3">Medical student</option>
                <option value="4">Medical officer</option>
                <option value="5">Registrar</option>
                <option value="6">Obstetrician</option>
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
              <input type="radio" id="rdg1" name="pi"  value="0" checked="checked" />
              <label for="rdg1">Infact</label>
              <input type="radio" id="rdg2" name="pi"  value="1" />
              <label for="rdg2">Episiotomy</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Degree tear :<font color="#FF0000">&nbsp;</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rdg5" name="dt" value="0" checked="checked" />
              <label for="rdg5">No</label>
              <input type="radio" id="rdg6" name="dt" value="1"  />
              <label for="rdg6">1</label>
              <input type="radio" id="rdg7" name="dt" value="2"  />
              <label for="rdg7">2</label>
              <input type="radio" id="rdg8" name="dt" value="3" />
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
              <input type="radio" id="rdg14" name="art1"  value="1" />
              <label for="rdg14">Yes</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Antenatal client Nevirapine taken during labour :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rdg15" name="art2"  value="0" checked="checked" />
              <label for="rdg15">No</label>
              <input type="radio" id="rdg16" name="art2"  value="1" />
              <label for="rdg16">Yes</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Truvada given to woman after delivery</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
              <input type="radio" id="rdg9" name="art3"  value="0" checked="checked" />
              <label for="rdg9">No</label>
              <input type="radio" id="rdg10" name="art3"  value="1" />
              <label for="rdg10">Yes</label>
              </div></td>
          </tr>
          <tr>
            <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
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
    <td height="50" align="left" style="padding-left:10px; padding-top:10px;"><input type="submit" name="button" id="button" value="Save" style="background-color:#06C; color:#FFF; height:40px; width:100px; border-radius:5px; border:none;">
    <input type="reset" name="button2" id="button2" value="Reset" style="background-color:#06C; color:#FFF; height:40px; width:100px; border-radius:5px; border:none;"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table></form>
		<?php
	}

?>

