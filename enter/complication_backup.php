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
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" bgcolor="#666666" style="padding-left:10px; color:#CCC;">Home / Complication</td>
  </tr>
  <tr>
    <td style="padding-left:10px; padding-right:10px;"><br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-color:#CCC; border-width:1px;">
        <tr>
          <td height="40" style="font-size:1.0em; padding-left:10px;">Complication</td>
          <td width="300" style="font-size:1.0em; padding-left:10px;">&nbsp;</td>
          </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
          </tr>
        <tr>
          <td height="30" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
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
                <tbody id="rec1">
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >1</td>
                    <td align="left" valign="top" style="padding-left:5px;">Induction of labour</td>
                    <td align="center" valign="top" style="  padding-left:5px;">
                    <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s 
								WHERE record_id = '%s' and Induction_of_labour = 1",
								mysql_real_escape_string("complication"),
								mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
								);
					$resultCom1 = $db->select($strSQL,false,true);
					?>
                      <div class="radioset">
                        <input type="radio" id="comp1" name="comp1" class="comp1"  value="0" 
                        <?php 
						if($resultCom1){ 
							if($resultCom1[0]['Induction_of_labour']==0){
								print "checked";
							} 
						}else{ print "checked=checked"; }?> />
                        <label for="comp1">No</label>
                        <input type="radio" id="comp2" name="comp1" class="comp1" value="1" 
						<?php 
						if($resultCom1){ 
							if($resultCom1[0]['Induction_of_labour']==1){
								print "checked";
							} 
						}?>  />
                        <label for="comp2">Yes</label>
                        </div></td>
                    <td align="left" valign="top" style="  padding-left:5px;">
                    <?php
                    if($resultCom1){ 
						if(($resultCom1[0]['Induction_of_labour']==0) && ($resultCom1[0]['user_add1']!='')){
							print "<strong>Update by</strong> : ".$resultCom1[0]['user_add1'];
						}else{
							print "<strong>Enter by</strong> : ".$resultCom1[0]['user_add1'];
						}
							
					}
					?>
                    </td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >2</td>
                    <td align="left" valign="top" style="padding-left:5px;">Antepartum haemorrhage</td>
                    <td align="center" valign="top" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="comp3" name="comp2"  class="comp2"  value="0" checked="checked" />
                      <label for="comp3">No</label>
                      <input type="radio" id="comp4" name="comp2"  class="comp2" value="1"  />
                      <label for="comp4">AP</label>
                      <input type="radio" id="comp33" name="comp2"  class="comp2" value="2"  />
                      <label for="comp33">PP</label>
                      </div></td>
                    <td align="left" valign="top" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >3</td>
                    <td align="left" valign="top" style="padding-left:5px;">Postpartum haemorrhage <img src="./../images/info-256.png" width="20" height="20" title="This complication can happend both labour and postpatum." style="cursor:pointer;" /></td>
                    <td align="center" valign="top" style="  padding-left:5px;"><span style="padding:5px 10px 5px 10px; color:#333;">
                      <select name="com3" id="com3" class="ip" style="width:100px; height:37px;">
                        <option value="0" selected="selected">No</option>
                        <option value="1">Yes</option>
                      </select>
                    </span></td>
                    <td align="left" valign="top" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="comp5" name="comp3"  value="0" class="comp3"  checked="checked" />
                      <label for="comp5">No</label>
                      <input type="radio" id="comp6" name="comp3" value="1"  class="comp3"  />
                      <label for="comp6">Yes</label>
                    </div></td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >4</td>
                    <td align="left" valign="top" style="padding-left:5px;">Severe pre eclampsia</td>
                    <td align="center" valign="top" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="comp7" name="comp4"  value="0"  class="comp4" checked="checked" />
                      <label for="comp7">No</label>
                      <input type="radio" id="comp8" name="comp4" value="1"   class="comp4" />
                      <label for="comp8">Yes</label>
                      </div></td>
                    <td align="left" valign="top" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >5</td>
                    <td align="left" valign="top" style="padding-left:5px;">Eclampsia</td>
                    <td align="center" valign="top" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="comp9" name="comp5"  value="0"  class="comp5" checked="checked" />
                      <label for="comp9">No</label>
                      <input type="radio" id="comp10" name="comp5" value="1"  class="comp5"  />
                      <label for="comp10">Yes</label>
                      </div></td>
                    <td align="left" valign="top" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >6</td>
                    <td align="left" valign="top" style="padding-left:5px;">Postpartum eclampsia </td>
                    <td align="center" valign="top" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="comp11" name="comp6"  value="0"  class="comp6" checked="checked" />
                      <label for="comp11">No</label>
                      <input type="radio" id="comp12" name="comp6" value="1"   class="comp6" />
                      <label for="comp12">Yes</label>
                      </div></td>
                    <td align="left" valign="top" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >7</td>
                    <td align="left" valign="top" style="padding-left:5px;">Prolonged rupture of membranes</td>
                    <td align="center" valign="top" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="comp13" name="comp7"  value="0"  class="comp7" checked="checked" />
                      <label for="comp13">No</label>
                      <input type="radio" id="comp14" name="comp7" value="1"  class="comp7"  />
                      <label for="comp14">Yes</label>
                      </div></td>
                    <td align="left" valign="top" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >8</td>
                    <td align="left" valign="top" style="padding-left:5px;">Ruptured uterus</td>
                    <td align="center" valign="top" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="comp15" name="comp8"  value="0"  class="comp8" checked="checked" />
                      <label for="comp15">No</label>
                      <input type="radio" id="comp16" name="comp8" value="1"  class="comp8"  />
                      <label for="comp16">Yes</label>
                      </div></td>
                    <td align="left" valign="top" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >9</td>
                    <td align="left" valign="top" style="padding-left:5px;">Sepsis <img src="./../images/info-256.png" width="20" height="20"  title="This complication can happend both labour and postpatum." style="cursor:pointer;"/></td>
                    <td align="center" valign="top" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="comp17" name="comp9"  value="0"  class="comp9" checked="checked" />
                      <label for="comp17">No</label>
                      <input type="radio" id="comp18" name="comp9" value="1"   class="comp9" />
                      <label for="comp18">Yes</label>
                      </div></td>
                    <td align="left" valign="top" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >10</td>
                    <td align="left" valign="top" style="padding-left:5px;">Obstructed or prolonged labour</td>
                    <td align="center" valign="top" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="comp19" name="comp10"  value="0"  class="comp10" checked="checked" />
                      <label for="comp19">No</label>
                      <input type="radio" id="comp20" name="comp10" value="1"  class="comp10"  />
                      <label for="comp20">Yes</label>
                      </div></td>
                    <td align="left" valign="top" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >11</td>
                    <td align="left" valign="top" style="padding-left:5px;">Retained placenta</td>
                    <td align="center" valign="top" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="comp21" name="comp11"  value="0"  class="comp11" checked="checked" />
                      <label for="comp21">No</label>
                      <input type="radio" id="comp22" name="comp11" value="1"   class="comp11" />
                      <label for="comp22">Yes</label>
                      </div></td>
                    <td align="left" valign="top" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >12</td>
                    <td align="left" valign="top" style="padding-left:5px;">Manual removal of placenta</td>
                    <td align="center" valign="top" style="  padding-left:5px;"><div class="radioset">
                      <input type="radio" id="comp23" name="comp12"  value="0"  class="comp12" checked="checked" />
                      <label for="comp23">No</label>
                      <input type="radio" id="comp24" name="comp12" value="1"  class="comp12"  />
                      <label for="comp24">Yes</label>
                      </div></td>
                    <td align="left" valign="top" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >13</td>
                    <td align="left" valign="top" style="padding-left:5px;">Stillbirth</td>
                    <td align="center" valign="top" style="  padding-left:5px;">
                    <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s 
								WHERE record_id = '%s' and alive = 0",
								mysql_real_escape_string("outcome"),
								mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
								);
					$resultStill = $db->select($strSQL,false,true);
					
					if($resultStill){
						print "<strong>Yes</strong>";
					}else{
						?>
						<div class="radioset">
                      <input type="radio" id="comp25" name="comp13"  value="0"  class="comp13" checked="checked" />
                      <label for="comp25">No</label>
                      <input type="radio" id="comp26" name="comp13" value="1"   class="comp13" />
                      <label for="comp26">Yes</label>
                      </div>
						<?php	
					}
					?>
                    </td>
                    <td align="left" valign="top" style="  padding-left:5px;">
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
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >14</td>
                    <td align="left" valign="top" style="padding-left:5px;">Neonatal death</td>
                    <td align="center" valign="top" style="  padding-left:5px;">
                    <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s 
								WHERE record_id = '%s' and nb_neonatal = 1",
								mysql_real_escape_string("outcome"),
								mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
								);
					$resultNeo = $db->select($strSQL,false,true);
					
					if($resultNeo){
						print "<strong>Yes</strong>";
					}else{
						?>
						<div class="radioset">
                      <input type="radio" id="comp27" name="comp14"  value="0" class="comp14"  checked="checked" />
                      <label for="comp27">No</label>
                      <input type="radio" id="comp28" name="comp14" value="1"   class="comp14" />
                      <label for="comp28">Yes</label>
                      </div>
						<?php	
					}
					?>
                    </td>
                    <td align="left" valign="top" style="  padding-left:5px;">
                    <?php
                    if($resultNeo){
						print "<strong>Newborn id</strong>. ".$resultNeo[0]['nb_no']."<br><strong>Early neonatal death <7days</strong> : Yes";
					}
					?>
                    </td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >15</td>
                    <td align="left" valign="top" style="padding-left:5px;">Preterm birth</td>
                    <td align="center" valign="top" style="  padding-left:5px;">
                    <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s 
								WHERE record_id = '%s' and ga_del < '37'",
								mysql_real_escape_string("delivery"),
								mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
								);
					$resultPreterm = $db->select($strSQL,false,true);
					
					if($resultPreterm){
						print "<strong>Yes</strong>";
					}else{
						?>
						<div class="radioset">
                          <input type="radio" id="comp29" name="comp15"  value="0"  class="comp15" checked="checked" />
                          <label for="comp29">No</label>
                          <input type="radio" id="comp30" name="comp15" value="1"  class="comp15"  />
                          <label for="comp30">Yes</label>
                          </div>
						<?php	
					}
					?>
                    </td>
                    <td align="left" valign="top" style="  padding-left:5px;">
                    <?php
                    if($resultPreterm){
						print "<strong>Gestational age at delivery :</strong> ".$resultPreterm[0]['ga_del']." weeks";
					}
					?>
                    </td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="top" style="  padding-left:5px;" >16</td>
                    <td align="left" valign="top" style="padding-left:5px;">Low birth weight</td>
                    <td align="center" valign="top" style="  padding-left:5px;">
                    <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s 
								WHERE record_id = '%s' and birth_wieght < '2500'",
								mysql_real_escape_string("outcome"),
								mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
								);
					$resultSelectOutcome = $db->select($strSQL,false,true);
					
					if($resultSelectOutcome){
						print "<strong>Yes</strong>";
					}else{
						?>
						<div class="radioset">
                          <input type="radio" id="comp31" name="comp16"  value="0"  class="comp16" checked="checked" />
                          <label for="comp31">No</label>
                          <input type="radio" id="comp32" name="comp16" value="1"  class="comp16"  />
                          <label for="comp32">Yes</label>
                          </div>
						<?php	
					}
					?>
                    </td>
                    <td align="left" valign="top" style="  padding-left:5px;">
                    <?php
                    if($resultSelectOutcome){
						print "<strong>Newborn id</strong>. ".$resultSelectOutcome[0]['nb_no']."<br><strong>BW</strong> : ".$resultSelectOutcome[0]['birth_wieght']." g.";
						
					}
					?>
                    </td>
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
      <br /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
