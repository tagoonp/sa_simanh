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
	
	$resultObstetric = $db->select($strSQL,false,true);
	
	$com = 'view';
	if(isset($_GET['com']))
		$com = $_GET['com'];
	
	if($resultObstetric){
		
		if($com=="edit"){
			require_once './edit_obstetric.php';
		}else{
			require_once './view/view_obstetric.php';	
		}
	}else{
		//print "a";
		?>
		<form id="birthRegForm" name="birthRegForm" method="post" action="../lib/saveObstetric.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" bgcolor="#666666" style="padding-left:10px; color:#FFF;">Home / 
    <?php 
	print "No. ".$resultRecord[0]['record_id']." - ";
	print "PID. ".$resultRecord[0]['pid']." / ";
	print "Obstetric information";
	?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:10px; padding-right:10px;"><br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-color:#CCC; border-width:1px;">
      <tr>
        <td height="40" style="font-size:1.0em; padding-left:10px;">Obstetric information</td>
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
            <td width="350" height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Gravidity :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <select name="gravidity" id="gravidity" class="ip" style="width:250px; height:37px;">
                <option value="1" selected="selected">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                </select>
              </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Parity :<font color="#FF0000">&nbsp;</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="parity" id="parity" class="ip" style="width:250px; height:37px;">
                <option value="0" selected="selected">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                </select>
              </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Antenatal care attendance :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input name="anc_attend" class="ip" id="anc_attend" size="40" placeholder="Facility's name / Private / Unknown" />
            </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Gestational age at 1st ANC :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <input type="text" name="ga1st" class="ip" id="ga1st" size="40" placeholder="Enter GA at 1st ANC or Unknown" />
              <input type="button" name="ga1unknown" id="ga1unknown" value="Unknown" style="height:30px; cursor:pointer;" />
             </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Antenatal booking before 20 weeks gestation :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <select name="ga20w" id="ga20w" class="ip" style="width:250px; height:37px;">
              <option value="0" selected="selected">No</option>
              <option value="1">Yes</option>
              </select></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Number of antenatal visits :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input type="text" name="no_anc" class="ip" id="no_anc" size="40" placeholder="Enter number of ANC or Unknown" />
              <input type="button" name="noanc1unknown" id="noanc1unknown" value="Unknown" style="height:30px; cursor:pointer;" /></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Rh :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <select name="rh" id="rh" class="ip" style="width:250px; height:37px;">
              <option value="Unknow" selected="selected">Unknown</option>
              <option value="Neg">Negative</option>
              <option value="Pos">Positive</option>
              </select></td>
          </tr>
          <tr id="rhq" style="display:none;">
            <td height="30" bgcolor="#E8E8E8" style="padding:5px 10px 5px 10px; color:#333;">Anti D Immunoglobulin to mother if Rh neg :</td>
            <td height="30" bgcolor="#E8E8E8" style="padding:5px 10px 5px 10px; color:#333;"><select name="anti_d" id="anti_d" class="ip" style="width:250px; height:37px;">
              <option value="No" selected="selected">No</option>
              <option value="Yes">Yes</option>
              </select></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">RPR :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="rpr" id="rpr" class="ip" style="width:250px; height:37px;">
              <option value="0" selected="selected">Not done</option>
              <option value="1">Done but no result</option>
              <option value="2">Result negative</option>
              <option value="3">Result positive</option>
              </select></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">RPR treated :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="rpr_treated" id="rpr_treated" class="ip" style="width:250px; height:37px;">
              <option value="No" selected="selected">No</option>
              <option value="Yes">Yes</option>
              <option value="Not applicable">Not applicable</option>
              </select></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">HIV 1st test :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="hiv_1st" id="hiv_1st" class="ip" style="width:250px; height:37px;">
              <option value="0" selected="selected">Not done</option>
              <option value="1">Done but no result</option>
              <option value="2">Result negative</option>
              <option value="3">Result positive</option>
              </select></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">HIV retest after 12 weeks :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="hiv_retest" id="hiv_retest" class="ip" style="width:250px; height:37px;">
              <option value="0" selected="selected">Not done</option>
              <option value="1">Done but no result</option>
              <option value="2">Result negative</option>
              <option value="3">Result positive</option>
              </select></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">HIV in labour :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="hiv_labour" id="hiv_labour" class="ip" style="width:250px; height:37px;">
              <option value="0" selected="selected">Not done</option>
              <option value="1">Done but no result</option>
              <option value="2">Result negative</option>
              <option value="3">Result positive</option>
              </select></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">HIV Status :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="hiv_status" id="hiv_status" class="ip" style="width:250px; height:37px;">
              <option value="Unknow" selected="selected">Unknown</option>
              <option value="Neg">Negative</option>
              <option value="Pos">Positive</option>
              <option value="Uncertained">Uncertained retest</option>
              </select></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">On ART at delivery :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="on_art_delivery" id="on_art_delivery" class="ip" style="width:250px; height:37px;">
              <option value="No" selected="selected">No</option>
              <option value="Dual">Dual</option>
              <option value="Triple">Triple</option>
              </select></td>
          </tr>
          
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">CD4 labour/postpartum :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="cd4" id="cd4" class="ip" style="width:250px; height:37px;">
              <option value="0" selected="selected">No</option>
              <option value="1">Yes</option>
              </select></td>
          </tr>
          <tr  id="cd4q" style="display:none;">
            <td height="30" bgcolor="#E8E8E8" style="padding:5px 10px 5px 10px; color:#333;">CD4 count :</td>
            <td height="30" bgcolor="#E8E8E8" style="padding:5px 10px 5px 10px; color:#333;">
            <input name="cd4_count" class="ip" id="cd4_count" type="text" size="40" placeholder="Enter number 10 - 9999 or Unknown or Not Applicable"  /></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Initiate ART at delivery :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="initiate_art" id="initiate_art" class="ip" style="width:250px; height:37px;">
              <option value="0" selected="selected">No</option>
              <option value="1">Yes</option>
              </select></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Birth before arrival (BBA) :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><select name="bba" id="bba" class="ip" style="width:250px; height:37px;">
              <option value="0" selected="selected">No</option>
              <option value="1">Yes</option>
              </select></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Gestational age at admission :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input type="text" name="ga_adm" class="ip" id="ga_adm" size="40" placeholder="Enter GA or Unknown" />
              <input type="button" name="gaadm1unknown" id="gaadm1unknown" value="Unknown" style="height:30px; cursor:pointer;" /></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Stage of labor at admission :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <select name="stage_of_labour" id="stage_of_labour" class="ip" style="width:250px; height:37px;">
              <option value="0" selected="selected">No labor</option>
              <optgroup label="1st stage, which phase">
                <option value="1">Latent phase</option>
                <option value="2">Active phase 3 - 4 cm</option>
                </optgroup>
              <option value="3">2nd stage of labor</option>
              <option value="4">Head out periniun</option>
              <option value="5">3rd stage of labor</option>
              </select></td>
          </tr>
          <tr class="solq" style="display:none;">
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time of labor start :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input type="date" name="date_lbs" id="textfield3"  class="ip"  />
  &nbsp;&nbsp;
  <input type="time" name="time_lbs" id="textfield3" class="ip"  /></td>
          </tr>
          <tr class="solq" style="display:none;">
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time of ruptured membranes :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input type="date" name="date_rm" id="textfield2"  class="ip"   />
  &nbsp;&nbsp;
  <input type="time" name="time_rm" id="time_rm" class="ip"  /></td>
          </tr>
          <tr class="solq" style="display:none;">
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time at 3-4 cm.</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <input type="date" name="date_3cm" id="date_3cm"  class="ip"   />
  &nbsp;&nbsp;
  <input type="time" name="time_3cm" id="time_3cm" class="ip"  /></td>
          </tr>
          <tr class="solq" style="display:none;">
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time at fully dilated.</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <input type="date" name="date_fully" id="date_fully"  class="ip"   />
  &nbsp;&nbsp;
  <input type="time" name="time_fully" id="time_fully" class="ip"  /></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Duration of active phase of labour :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input name="duration_active_phase" class="ip" id="duration_active_phase" size="40" placeholder="Enter hour.min or Unknown" />
              <input type="button" name="dupunknown" id="dupunknown" value="Unknown" style="height:30px; cursor:pointer;" /></td>
          </tr>
          <tr>
            <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">&nbsp;</td>
          </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50" align="left" style="padding-left:10px; padding-top:10px;"><input type="submit" name="button" id="button" value="Save" style="background-color:#06C; color:#FFF; height:40px; width:100px; border-radius:5px; border:none; cursor:pointer;">
    <input type="reset" name="button2" id="button2" value="Reset" style="background-color:#06C; color:#FFF; height:40px; width:100px; border-radius:5px; border:none;cursor:pointer;"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table></form>
		<?php
	}

?>

