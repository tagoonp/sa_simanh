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
		  mysql_real_escape_string("complication_delivery"),
		  mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
		  );
	$resultCom = $db->select($strSQL,false,true);


?>
<style>
#rec1 tr:nth-child(even) {background:#F9F9F9}
#rec1 tr:nth-child(odd) {background: #F0F7FB}
#rec1 td{
	padding-top:5px;
	padding-bottom:5px;
	min-height:40px;
}
</style>
<script>

</script>
<form name="complicationForm"  id="complicationForm" method="post" action="../lib/saveComplication.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" bgcolor="#666666" style="padding-left:10px; color:#FFF;">Home / 
    <?php 
	print "No. ".$resultRecord[0]['record_id']." - ";
	print "PID. ".$resultRecord[0]['pid']." / ";
	print "Complication";
	?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:10px; padding-right:10px;"><br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-color:#CCC; border-width:1px;">
        <tr>
          <td height="40" style="font-size:1.0em; padding-left:10px;">Complications in labour / delivery</td>
          </tr>
        <tr>
          <td height="1" bgcolor="#CCCCCC"></td>
          </tr>
        <tr>
          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="1000" height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">List of complication happend :
                
                </td>
              </tr>
            <tr>
              <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:0.9em;">
                <tr>
                  <td width="50" height="30" style="background-image:url(../images/tb_bg1.gif); background-size:contain; padding-left:5px;" ><strong>No</strong></td>
                  <td width="250" align="left" style="background-image:url(../images/tb_bg1.gif); background-size:contain; padding-left:5px;"><strong>Complication</strong></td>
                  <td width="170" align="left" style="background-image:url(../images/tb_bg1.gif); background-size:contain; padding-left:5px;">&nbsp;</td>
                  <td align="left" style="background-image:url(../images/tb_bg1.gif); background-size:contain; padding-left:5px;"><strong>Remark</strong></td>
                  </tr>
				  <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s 
								WHERE record_id = '%s'",
								mysql_real_escape_string("complication_delivery"),
								mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
								);
					$resultCom1 = $db->select($strSQL,false,true);
					?>
                <tbody id="rec1">
                  <tr>
                    <td height="25" align="left" valign="middle" style="  padding-left:5px;" >1</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Induction of labour</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="cp1" name="cp1" value="0"  checked="checked" />
                      <label for="cp1">No</label>
                      <input type="radio" id="cp2" name="cp1"  value="1" <?php if($resultCom){if($resultCom[0][1]==1){print "checked";}}?> />
                      <label for="cp2">Yes</label>
                    </div></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="middle" style="  padding-left:5px;" >2</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Antepartum haemorrhage</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="cp3" name="cp2" value="0"  checked="checked" />
                      <label for="cp3">No</label>
                      <input type="radio" id="cp4" name="cp2"  value="1" <?php if($resultCom){if($resultCom[0][2]==1){print "checked";}}?>>
                      <label for="cp4">Yes</label>
                    </div></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr id="anter" style="display:<?php if($resultCom){if($resultCom[0][2]!=1){print "none";}}else{print "none";}?>;">
                    <td height="25" align="left" valign="middle" bgcolor="#F9F9F9" style="  padding-left:5px;" >&nbsp;</td>
                    <td align="left" valign="middle" bgcolor="#F9F9F9" style="padding-left:5px;">&nbsp;</td>
                    <td align="left" valign="middle" bgcolor="#F9F9F9" style="  padding-left:5px;">
                    <input type="checkbox" name="checkbox" id="checkbox" value="1" <?php if($resultCom){if($resultCom[0][3]==1){print "checked";}}?> /><label for="checkbox">AP : Abruptio placenta</label><br />
                    <input type="checkbox" name="checkbox2" id="checkbox2" value="1" <?php if($resultCom){if($resultCom[0][4]==1){print "checked";}}?> /><label for="checkbox2">PP : Placenta previa</label></td>
                    <td align="left" valign="middle" bgcolor="#F9F9F9" style="  padding-left:5px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >3</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Postpartum haemorrhage </td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="cp5" name="cp3" value="0"  checked="checked" />
                      <label for="cp5">No</label>
                      <input type="radio" id="cp6" name="cp3"  value="1"  <?php if($resultCom){if($resultCom[0][5]==1){print "checked";}}?>>
                      <label for="cp6">Yes</label>
                    </div></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >4</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Severe pre eclampsia</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="cp7" name="cp4" value="0"  checked="checked" />
                      <label for="cp7">No</label>
                      <input type="radio" id="cp8" name="cp4"  value="1"  <?php if($resultCom){if($resultCom[0][6]==1){print "checked";}}?>>
                      <label for="cp8">Yes</label>
                    </div></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >5</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Eclampsia</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="cp9" name="cp5" value="0"  checked="checked" />
                      <label for="cp9">No</label>
                      <input type="radio" id="cp10" name="cp5"  value="1" <?php if($resultCom){if($resultCom[0][7]==1){print "checked";}}?>>
                      <label for="cp10">Yes</label>
                    </div></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >6</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Prolonged rupture of membranes</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><div class="radioset">
                    <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s 
								WHERE record_id = '%s' and duration_active_phase > 24",
								mysql_real_escape_string("obstetric"),
								mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
								);
					$resultoBS = $db->select($strSQL,false,true);

						?>
                      <input type="radio" id="cp11" name="cp6" value="0"  checked="checked" />
                      <label for="cp11">No</label>
                      <input type="radio" id="cp12" name="cp6"  value="1" <?php if($resultoBS){ print "checked=\"checked\""; }?>  <?php if($resultCom){if($resultCom[0][8]==1){print "checked";}}?>>
                      <label for="cp12">Yes</label>
                    </div></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">
					<?php
                    if($resultoBS){
						print "<strong>Duration of Active phase</strong>. ".$resultoBS[0]['duration_active_phase']." hours.";
					}
					?></td>
                  </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >7</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Ruptured uterus</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="cp13" name="cp7" value="0"  checked="checked" />
                      <label for="cp13">No</label>
                      <input type="radio" id="cp14" name="cp7"  value="1"  <?php if($resultCom){if($resultCom[0][9]==1){print "checked";}}?>>
                      <label for="cp14">Yes</label>
                    </div></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >8</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Sepsis </td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="cp15" name="cp8" value="0"  checked="checked" />
                      <label for="cp15">No</label>
                      <input type="radio" id="cp16" name="cp8"  value="1"  <?php if($resultCom){if($resultCom[0][10]==1){print "checked";}}?>>
                      <label for="cp16">Yes</label>
                    </div></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >9</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Obstructed or prolonged labour</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="cp17" name="cp9" value="0"  checked="checked" />
                      <label for="cp17">No</label>
                      <input type="radio" id="cp18" name="cp9"  value="1"  <?php if($resultCom){if($resultCom[0][11]==1){print "checked";}}?>>
                      <label for="cp18">Yes</label>
                    </div></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >10</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Retained placenta</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="cp19" name="cp10" value="0"  checked="checked" />
                      <label for="cp19">No</label>
                      <input type="radio" id="cp20" name="cp10"  value="1"  <?php if($resultCom){if($resultCom[0][12]==1){print "checked";}}?>>
                      <label for="cp20">Yes</label>
                    </div></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >11</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Manual removal of placenta</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="cp21" name="cp11" value="0"  checked="checked" />
                      <label for="cp21">No</label>
                      <input type="radio" id="cp22" name="cp11"  value="1"  <?php if($resultCom){if($resultCom[0][13]==1){print "checked";}}?>>
                      <label for="cp22">Yes</label>
                    </div></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >12</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Maternal death</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="cp23" name="cp12" value="0"  checked="checked" />
                      <label for="cp23">No</label>
                      <input type="radio" id="cp24" name="cp12"  value="1"  <?php if($resultCom){if($resultCom[0][14]==1){print "checked";}}?>>
                      <label for="cp24">Yes</label>
                    </div></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >13</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Stillbirth</td>
                    <td align="center" valign="middle" style="  padding-left:5px;">
                    <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s 
								WHERE record_id = '%s' and alive = 0",
								mysql_real_escape_string("outcome"),
								mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
								);
					$resultStill = $db->select($strSQL,false,true);
					?>
                    <div class="radioset">
                      <input type="radio" id="cp25" name="cp13" value="0"  checked="checked" />
                      <label for="cp25">No</label>
                      <input type="radio" id="cp26" name="cp13"  value="1" <?php if($resultStill){ print "checked=\"checked\""; }?>  <?php if($resultCom){if($resultCom[0][15]==1){print "checked";}}?>>
                      <label for="cp26"  >Yes</label>
                    </div>                    <?php	

					?>
                    </td>
                    <td align="left" valign="middle" style="  padding-left:5px;">
                    <?php
                    if($resultStill){
						print "<strong>Newborn id</strong>. ".$resultStill[0]['nb_no']." => <strong>Alive</strong> : No<br>";
						print "<strong>Stillbirth type</strong>. ";
						switch($resultStill[0]['stillbirth']){
							case 1: print "Fresh"; break;
							case 2: print "Macerated";break;
							default: print "NA";	
						}
					}
					?>
                    </td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >14</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Neonatal death</td>
                    <td align="center" valign="middle" style="  padding-left:5px;">
                    <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s 
								WHERE record_id = '%s' and nb_neonatal = 1",
								mysql_real_escape_string("outcome"),
								mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
								);
					$resultNeo = $db->select($strSQL,false,true);
					
						?>
                    <div class="radioset">
                      <input type="radio" id="cp27" name="cp14" value="0"  checked="checked" />
                      <label for="cp27">No</label>
                      <input type="radio" id="cp28" name="cp14"  value="1" <?php if($resultNeo){ print "checked=\"checked\""; }?> <?php if($resultCom){if($resultCom[0][16]==1){print "checked";}}?>/>
                      <label for="cp28">Yes</label>
                    </div>                    
					<?php	

					?>
                    </td>
                    <td align="left" valign="middle" style="  padding-left:5px;">
                    <?php
                    if($resultNeo){
						print "<strong>Newborn id</strong>. ".$resultNeo[0]['nb_no']."<br><strong>Early neonatal death <7days</strong> : Yes";
					}
					?>
                    </td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >15</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Preterm birth</td>
                    <td align="center" valign="middle" style="  padding-left:5px;">
                    <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s 
								WHERE record_id = '%s' and ga_del < '37'",
								mysql_real_escape_string("delivery"),
								mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
								);
					$resultPreterm = $db->select($strSQL,false,true);
					
						?>
                    <div class="radioset">
                      <input type="radio" id="cp31" name="cp15" value="0"  checked="checked" />
                      <label for="cp31">No</label>
                      <input type="radio" id="cp32" name="cp15"  value="1" <?php if($resultPreterm){ print "checked=\"checked\""; }?> <?php if($resultCom){if($resultCom[0][17]==1){print "checked";}}?>/>
                      <label for="cp32">Yes</label>
                    </div>                    
					<?php	
				
					?>
                    </td>
                    <td align="left" valign="middle" style="  padding-left:5px;">
                    <?php
                    if($resultPreterm){
						print "<strong>Gestational age at delivery :</strong> ".$resultPreterm[0]['ga_del']." weeks";
					}
					?>
                    </td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >16</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Low birth weight</td>
                    <td align="center" valign="middle" style="  padding-left:5px;">
                    <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s 
								WHERE record_id = '%s' and birth_wieght < '2500'",
								mysql_real_escape_string("outcome"),
								mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
								);
					$resultSelectOutcome = $db->select($strSQL,false,true);

						?>
                    <div class="radioset">
                      <input type="radio" id="cp29" name="cp16" value="0"  checked="checked" />
                      <label for="cp29">No</label>
                      <input type="radio" id="cp30" name="cp16"  value="1" <?php if($resultSelectOutcome){ print "checked=\"checked\""; }?> <?php if($resultCom){if($resultCom[0][18]==1){print "checked";}}?>/>
                      <label for="cp30">Yes</label>
                    </div>                    <?php	
					
					?>
                    </td>
                    <td align="left" valign="middle" style="  padding-left:5px;">
                    <?php
                    if($resultSelectOutcome){
						print "<strong>Newborn id</strong>. ".$resultSelectOutcome[0]['nb_no']."<br><strong>BW</strong> : ".$resultSelectOutcome[0]['birth_wieght']." g.";
						
					}
					?>
                    </td>
                    </tr>
                  <tr>
                    <td height="25" align="left" valign="middle" style="  padding-left:5px;" >&nbsp;</td>
                    <td align="left" valign="middle" style="padding-left:5px;">&nbsp;</td>
                    <td align="center" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                  </tr>
                  </tbody>
                </table></td>
              </tr>
            <tr>
              <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">&nbsp;</td>
            </tr>
            </table></td>
          </tr>
        </table>
      <br />
      <span style="padding-left:10px; padding-top:10px;">
      <input type="submit" name="button" id="button" value="Save" style="background-color:#06C; color:#FFF; height:40px; width:100px; border-radius:5px; border:none; cursor:pointer;" />
      <input type="reset" name="button2" id="button2" value="Reset" style="background-color:#06C; color:#FFF; height:40px; width:100px; border-radius:5px; border:none; cursor:pointer;" />
      </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
