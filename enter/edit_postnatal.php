<form id="birthRegForm" name="birthRegForm" method="post" action="../lib/updatePostnatal.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" bgcolor="#666666" style="padding-left:10px; color:#FFF;">Home / 
    <?php 
	print "No. ".$resultRecord[0]['record_id']." - ";
	print "PID. ".$resultRecord[0]['pid']." / ";
	print "Postnatal";
	?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:10px; padding-right:10px;"><br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-color:#CCC; border-width:1px;">
        <tr>
          <td height="40" style="font-size:1.0em; padding-left:10px;">Edit postnatal information</td>
          <td width="50" style="font-size:1.0em; padding-left:10px;">
          
          </td>
          </tr>
        <tr>
          <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
          </tr>
        <tr>
          <td height="30" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
              </tr>
            <tr>
              <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><strong>Complications in postpartum</strong></td>
              </tr>
            <tr>
              <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
              </tr>
            <tr>
              <td width="350" height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Postpartum haemorrhage :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><div class="radioset">
                <input type="radio" id="cp1" name="cp1" value="0"  checked="checked" />
                <label for="cp1">No</label>
                <input type="radio" id="cp2" name="cp1"  value="1" <?php if($resultPostnatal[0][1]==1){print "checked";}?> />
                <label for="cp2">Yes</label>
                </div></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Postpartum eclampsia :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><div class="radioset">
                <input type="radio" id="cp3" name="cp2" value="0"  checked="checked" />
                <label for="cp3">No</label>
                <input type="radio" id="cp4" name="cp2"  value="1" <?php if($resultPostnatal[0][2]==1){print "checked";}?> />
                <label for="cp4">Yes</label>
                </div></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Postpartum sepsis  :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><div class="radioset">
                <input type="radio" id="cp5" name="cp3" value="0"  checked="checked" />
                <label for="cp5">No</label>
                <input type="radio" id="cp6" name="cp3"  value="1" <?php if($resultPostnatal[0][3]==1){print "checked";}?> />
                <label for="cp6">Yes</label>
                </div></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Postpartum maternal death :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><div class="radioset">
                <input type="radio" id="cp7" name="cp4" value="0"  checked="checked" />
                <label for="cp7">No</label>
                <input type="radio" id="cp8" name="cp4"  value="1" <?php if($resultPostnatal[0][4]==1){print "checked";}?> />
                <label for="cp8">Yes</label>
                </div></td>
              </tr>
            <tr>
              <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
              </tr>
            <tr>
              <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><strong>Family planning</strong></td>
              </tr>
            <tr>
              <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
              </tr>
            <tr>
              <td width="350" height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Sterilisation :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><div class="radioset">
                <input type="radio" id="fp1" name="fp1" value="0"  checked="checked" />
                <label for="fp1">No</label>
                <input type="radio" id="fp2" name="fp1"  value="1" <?php if($resultPostnatal[0][5]==1){print "checked";}?> />
                <label for="fp2">Yes</label>
                </div></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Oral contraception :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><div class="radioset">
                <input type="radio" id="fp3" name="fp2" value="0"  checked="checked" />
                <label for="fp3">No</label>
                <input type="radio" id="fp4" name="fp2"  value="1" <?php if($resultPostnatal[0][6]==1){print "checked";}?> />
                <label for="fp4">Yes</label>
                </div></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Medroxyprogesterone :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><div class="radioset">
                <input type="radio" id="fp5" name="fp3" value="0"  checked="checked" />
                <label for="fp5">No</label>
                <input type="radio" id="fp6" name="fp3"  value="1" <?php if($resultPostnatal[0][7]==1){print "checked";}?> />
                <label for="fp6">Yes</label>
                </div></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Norethisterone enanthate :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><div class="radioset">
                <input type="radio" id="fp7" name="fp4" value="0"  checked="checked" />
                <label for="fp7">No</label>
                <input type="radio" id="fp8" name="fp4"  value="1" <?php if($resultPostnatal[0][8]==1){print "checked";}?> />
                <label for="fp8">Yes</label>
                </div></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Condoms :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><div class="radioset">
                <input type="radio" id="fp9" name="fp5" value="0"  checked="checked" />
                <label for="fp9">No</label>
                <input type="radio" id="fp10" name="fp5"  value="1" <?php if($resultPostnatal[0][9]==1){print "checked";}?> />
                <label for="fp10">Yes</label>
                </div></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">IUCD inserted :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><div class="radioset">
                <input type="radio" id="fp11" name="fp6" value="0"  checked="checked" />
                <label for="fp11">No</label>
                <input type="radio" id="fp12" name="fp6"  value="1" <?php if($resultPostnatal[0][10]==1){print "checked";}?> />
                <label for="fp12">Yes</label>
                </div></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Subdermal implant :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><div class="radioset">
                <input type="radio" id="fp13" name="fp7" value="0"  checked="checked" />
                <label for="fp13">No</label>
                <input type="radio" id="fp14" name="fp7"  value="1" <?php if($resultPostnatal[0][11]==1){print "checked";}?> />
                <label for="fp14">Yes</label>
                </div></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">&nbsp;</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">&nbsp;</td>
              </tr>
            <tr>
              <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
              </tr>
            <tr>
              <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 0px 5px 0px; color:#333;">
                <?php
              $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
						  mysql_real_escape_string("other_postnatal"),
						  mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
						  );
				$resultNB = $db->select($strSQL,false,true);
				
				$size = 0;
				if($resultNB){
					$size = sizeof($resultNB);	
				}
				
				if($size>0){
					?>
                <table border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="345" height="30" bgcolor="#CCCCCC" style="padding:5px 10px 5px 10px;"><strong>PMTCT and ART</strong></td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120" bgcolor="#CCCCCC" style="padding:5px 10px 5px 10px;"><?php print "Newborn.".($v+1);?></td>
                    <?php
					   }
					   ?>
                    </tr>
                  
                  <tr>
                    <td height="30" style="padding:5px 10px 5px 10px;">&nbsp;</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <input type="text" name="nb_id[]" id="nb_id[]" class="ip" style="width:100px;" placeholder="Newborn ID"
                    value="<?php print $resultNB[$v]['nb_no'];?>" readonly="readonly" />
                      </td>
                    <?php
					   }
					   ?>
                  </tr>
                  <tr>
                    <td width="300" height="30" style="padding:5px 10px 5px 10px;">PMTCT Visit (Nevirapine to mother and baby) :</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <div class="radioset">
                        <input type="radio" id="art1_<?php print $v;?>" name="art1_<?php print $v;?>" value="0"  checked="checked" />
                        <label for="art1_<?php print $v;?>">No</label>
                        <input type="radio" id="art2_<?php print $v;?>" name="art1_<?php print $v;?>"  value="1" <?php if($resultNB[$v][1]==1){print "checked";}?> />
                        <label for="art2_<?php print $v;?>">Yes</label>
                        </div>
                      </td>
                    <?php
					   }
					   ?>
                    </tr>
                  
                  <tr>
                    <td height="30" style="padding:5px 10px 5px 10px;">Baby initiated on AZT within 72 hours after birth :</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <div class="radioset">
                        <input type="radio" id="art3_<?php print $v;?>" name="art2_<?php print $v;?>" value="0"  checked="checked" />
                        <label for="art3_<?php print $v;?>">No</label>
                        <input type="radio" id="art4_<?php print $v;?>" name="art2_<?php print $v;?>"  value="1" <?php if($resultNB[$v][2]==1){print "checked";}?>/>
                        <label for="art4_<?php print $v;?>">Yes</label>
                        </div>
                      </td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 10px 5px 10px;">Baby given Nevirapine :</td> 
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <div class="radioset">
                        <input type="radio" id="art5_<?php print $v;?>" name="art3_<?php print $v;?>" value="0"  checked="checked" />
                        <label for="art5_<?php print $v;?>">No</label>
                        <input type="radio" id="art6_<?php print $v;?>" name="art3_<?php print $v;?>"  value="1" <?php if($resultNB[$v][3]==1){print "checked";}?>>
                        <label for="art6_<?php print $v;?>">Yes</label>
                        </div>
                      </td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 10px 5px 10px;">Baby given Nevirapine within 72 hours after birth :</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <div class="radioset">
                        <input type="radio" id="art7_<?php print $v;?>" name="art4_<?php print $v;?>" value="0"  checked="checked" />
                        <label for="art7_<?php print $v;?>">No</label>
                        <input type="radio" id="art8_<?php print $v;?>" name="art4_<?php print $v;?>"  value="1" <?php if($resultNB[$v][4]==1){print "checked";}?>>
                        <label for="art8_<?php print $v;?>">Yes</label>
                        </div>
                      </td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 10px 5px 10px;">Nevirapine 6 weeks dose given to baby on dicharge :</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <div class="radioset">
                        <input type="radio" id="art9_<?php print $v;?>" name="art5_<?php print $v;?>" value="0"  checked="checked" />
                        <label for="art9_<?php print $v;?>">No</label>
                        <input type="radio" id="art10_<?php print $v;?>" name="art5_<?php print $v;?>"  value="1" <?php if($resultNB[$v][5]==1){print "checked";}?>>
                        <label for="art10_<?php print $v;?>">Yes</label>
                        </div>
                      </td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" bgcolor="#CCCCCC" style="padding:5px 10px 5px 10px;"><strong>Newborn management</strong></td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120" bgcolor="#CCCCCC" style="padding:5px 10px 5px 10px;">&nbsp;</td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 5px 5px 10px;">Infant feeding method </td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <select name="ifm[]" id="ifm[]" class="ip" style="width:150px;">
                        <option value="1" <?php if($resultNB[$v][6]==1){print "checked";}?>>EBF </option>
                        <option value="2" <?php if($resultNB[$v][6]==2){print "checked";}?>>EFF</option>
                        <option value="3" <?php if($resultNB[$v][6]==3){print "checked";}?>>Unsure</option>
                        </select>
                      </td>
                    <?php
					   }
					   ?>
                    
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 5px 5px 10px;">Vitamin K to infant</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <div class="radioset">
                        <input type="radio" id="art11_<?php print $v;?>" name="art6_<?php print $v;?>" value="0"  checked="checked" />
                        <label for="art11_<?php print $v;?>">No</label>
                        <input type="radio" id="art12_<?php print $v;?>" name="art6_<?php print $v;?>"  value="1" <?php if($resultNB[$v][7]==1){print "checked";}?>>
                        <label for="art12_<?php print $v;?>">Yes</label>
                        </div>
                      </td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 5px 5px 10px;">Polio dose :</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <div class="radioset">
                        <input type="radio" id="art13_<?php print $v;?>" name="art7_<?php print $v;?>" value="0"  checked="checked" />
                        <label for="art13_<?php print $v;?>">No</label>
                        <input type="radio" id="art14_<?php print $v;?>" name="art7_<?php print $v;?>"  value="1" <?php if($resultNB[$v][8]==1){print "checked";}?>>
                        <label for="art14_<?php print $v;?>">Yes</label>
                        </div>
                      </td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 5px 5px 10px;">BCG dose :</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <div class="radioset">
                        <input type="radio" id="art15_<?php print $v;?>" name="art8_<?php print $v;?>" value="0"  checked="checked" />
                        <label for="art15_<?php print $v;?>">No</label>
                        <input type="radio" id="art16_<?php print $v;?>" name="art8_<?php print $v;?>"  value="1" <?php if($resultNB[$v][9]==1){print "checked";}?>>
                        <label for="art16_<?php print $v;?>">Yes</label>
                        </div>
                      </td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 5px 5px 10px;">Admitted :</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <div class="radioset">
                        <input type="radio" id="art17_<?php print $v;?>" name="art9_<?php print $v;?>" value="0"  checked="checked" />
                        <label for="art17_<?php print $v;?>">No</label>
                        <input type="radio" id="art18_<?php print $v;?>" name="art9_<?php print $v;?>"  value="1" <?php if($resultNB[$v][10]==1){print "checked";}?>>
                        <label for="art18_<?php print $v;?>">Yes</label>
                        </div>
                      </td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 5px 5px 10px;"><strong>Final newborn status </strong></td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">&nbsp;</td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 5px 5px 10px;">Discharge :</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <div class="radioset">
                        <input type="radio" id="art21_<?php print $v;?>" name="art11_<?php print $v;?>" value="0"  checked="checked" />
                        <label for="art21_<?php print $v;?>">No</label>
                        <input type="radio" id="art22_<?php print $v;?>" name="art11_<?php print $v;?>"  value="1" <?php if($resultNB[$v][11]==1){print "checked";}?>>
                        <label for="art22_<?php print $v;?>">Yes</label>
                        </div>
                      </td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 5px 5px 10px;">Discharge date:</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120"><input type="date" name="ndis_date[]" id="textfield2" class="ip"  style="width:150px;
                           " value="<?php print $resultNB[0]['12'];?>"></td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 5px 5px 10px;">Refer :</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <div class="radioset">
                        <input type="radio" id="art23_<?php print $v;?>" name="art12_<?php print $v;?>" value="0"  checked="checked" />
                        <label for="art23_<?php print $v;?>">No</label>
                        <input type="radio" id="art24_<?php print $v;?>" name="art12_<?php print $v;?>"  value="1" <?php if($resultNB[$v][13]==1){print "checked";}?>>
                        <label for="art24_<?php print $v;?>">Yes</label>
                        </div>
                      </td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 5px 5px 10px;">Refer to :</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <input type="text" name="nrefer_to[]" id="refer_to[]" class="refer" style="width:150px;border:solid;
	border-color:#CCC;
	border-width:1px;
	border-radius:3px;
	height:30px;
	padding-left:5px;" placeholder="Facility's name" value="<?php print $resultNB[0]['14'];?>">
                      </td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 5px 5px 10px;">Refer date :</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <input type="date" name="nrefer_date[]" id="nrefer_date[]" class="ip"  style="width:150px; " 
                      value="<?php print $resultNB[0]['15'];?>">
                      </td>
                    <?php
					   }
					   ?>
                    
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 5px 5px 10px;">Death :</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <div class="radioset">
                        <input type="radio" id="art25_<?php print $v;?>" name="art13_<?php print $v;?>" value="0"  checked="checked" />
                        <label for="art25_<?php print $v;?>">No</label>
                        <input type="radio" id="art26_<?php print $v;?>" name="art13_<?php print $v;?>"  value="1" <?php if($resultNB[$v][16]==1){print "checked";}?>>
                        <label for="art26_<?php print $v;?>">Yes</label>
                        </div>
                      </td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td height="30" style="padding:5px 5px 5px 10px;">Death date :</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <input type="date" name="ndeath_date[]" id="ndeath_date[]" class="ip"  style="width:150px; " value="<?php print $resultNB[0]['17'];?>">
                      </td>
                    <?php
					   }
					   ?>
                    </tr>
                  <tr>
                    <td style="padding:5px 5px 5px 10px;">&nbsp;</td>
                    <td align="left">&nbsp;</td>
                    </tr>
                  </table>
                <?php	
				}else{
					$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
							  mysql_real_escape_string("outcome"),
							  mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
							  );
					$resultNB = $db->select($strSQL,false,true);
					
					$size = 0;
					if($resultNB){
						$size = sizeof($resultNB);	
					}
					
					if($size>0){
						?>
					<table border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td width="345" height="30" bgcolor="#CCCCCC" style="padding:5px 10px 5px 10px;"><strong>PMTCT and ART</strong></td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120" bgcolor="#CCCCCC" style="padding:5px 10px 5px 10px;"><?php print "Newborn.".($v+1);?></td>
						<?php
						   }
						   ?>
						</tr>
					  
					  <tr>
						<td height="30" style="padding:5px 10px 5px 10px;">&nbsp;</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <input type="text" name="nb_id[]" id="nb_id[]" class="ip" style="width:100px;" placeholder="Newborn ID"
						value="<?php print $resultNB[$v]['ocm_id'];?>" readonly="readonly" />
						  </td>
						<?php
						   }
						   ?>
					  </tr>
					  <tr>
						<td width="300" height="30" style="padding:5px 10px 5px 10px;">PMTCT Visit (Nevirapine to mother and baby) :</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <div class="radioset">
							<input type="radio" id="art1_<?php print $v;?>" name="art1_<?php print $v;?>" value="0"  checked="checked" />
							<label for="art1_<?php print $v;?>">No</label>
							<input type="radio" id="art2_<?php print $v;?>" name="art1_<?php print $v;?>"  value="1" />
							<label for="art2_<?php print $v;?>">Yes</label>
							</div>
						  </td>
						<?php
						   }
						   ?>
						</tr>
					  
					  <tr>
						<td height="30" style="padding:5px 10px 5px 10px;">Baby initiated on AZT within 72 hours after birth :</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <div class="radioset">
							<input type="radio" id="art3_<?php print $v;?>" name="art2_<?php print $v;?>" value="0"  checked="checked" />
							<label for="art3_<?php print $v;?>">No</label>
							<input type="radio" id="art4_<?php print $v;?>" name="art2_<?php print $v;?>"  value="1" />
							<label for="art4_<?php print $v;?>">Yes</label>
							</div>
						  </td>
						<?php
						   }
						   ?>
						</tr>
					  <tr>
						<td height="30" style="padding:5px 10px 5px 10px;">Baby given Nevirapine :</td> 
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <div class="radioset">
							<input type="radio" id="art5_<?php print $v;?>" name="art3_<?php print $v;?>" value="0"  checked="checked" />
							<label for="art5_<?php print $v;?>">No</label>
							<input type="radio" id="art6_<?php print $v;?>" name="art3_<?php print $v;?>"  value="1" />
							<label for="art6_<?php print $v;?>">Yes</label>
							</div>
						  </td>
						<?php
						   }
						   ?>
						</tr>
					  <tr>
						<td height="30" style="padding:5px 10px 5px 10px;">Baby given Nevirapine within 72 hours after birth :</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <div class="radioset">
							<input type="radio" id="art7_<?php print $v;?>" name="art4_<?php print $v;?>" value="0"  checked="checked" />
							<label for="art7_<?php print $v;?>">No</label>
							<input type="radio" id="art8_<?php print $v;?>" name="art4_<?php print $v;?>"  value="1" />
							<label for="art8_<?php print $v;?>">Yes</label>
							</div>
						  </td>
						<?php
						   }
						   ?>
						</tr>
					  <tr>
						<td height="30" style="padding:5px 10px 5px 10px;">Nevirapine 6 weeks dose given to baby on dicharge :</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <div class="radioset">
							<input type="radio" id="art9_<?php print $v;?>" name="art5_<?php print $v;?>" value="0"  checked="checked" />
							<label for="art9_<?php print $v;?>">No</label>
							<input type="radio" id="art10_<?php print $v;?>" name="art5_<?php print $v;?>"  value="1" />
							<label for="art10_<?php print $v;?>">Yes</label>
							</div>
						  </td>
						<?php
						   }
						   ?>
						</tr>
					  <tr>
						<td height="30" bgcolor="#CCCCCC" style="padding:5px 10px 5px 10px;"><strong>Newborn management</strong></td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120" bgcolor="#CCCCCC" style="padding:5px 10px 5px 10px;">&nbsp;</td>
						<?php
						   }
						   ?>
						</tr>
					  <tr>
						<td height="30" style="padding:5px 5px 5px 10px;">Infant feeding method </td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <select name="ifm[]" id="ifm[]" class="ip" style="width:150px;">
							<option value="1">EBF </option>
							<option value="2">EFF</option>
							<option value="3" selected="selected">Unsure</option>
							</select>
						  </td>
						<?php
						   }
						   ?>
						
						</tr>
					  <tr>
						<td height="30" style="padding:5px 5px 5px 10px;">Vitamin K to infant</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <div class="radioset">
							<input type="radio" id="art11_<?php print $v;?>" name="art6_<?php print $v;?>" value="0"  checked="checked" />
							<label for="art11_<?php print $v;?>">No</label>
							<input type="radio" id="art12_<?php print $v;?>" name="art6_<?php print $v;?>"  value="1" />
							<label for="art12_<?php print $v;?>">Yes</label>
							</div>
						  </td>
						<?php
						   }
						   ?>
						</tr>
					  <tr>
						<td height="30" style="padding:5px 5px 5px 10px;">Polio dose :</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <div class="radioset">
							<input type="radio" id="art13_<?php print $v;?>" name="art7_<?php print $v;?>" value="0"  checked="checked" />
							<label for="art13_<?php print $v;?>">No</label>
							<input type="radio" id="art14_<?php print $v;?>" name="art7_<?php print $v;?>"  value="1" />
							<label for="art14_<?php print $v;?>">Yes</label>
							</div>
						  </td>
						<?php
						   }
						   ?>
						</tr>
					  <tr>
						<td height="30" style="padding:5px 5px 5px 10px;">BCG dose :</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <div class="radioset">
							<input type="radio" id="art15_<?php print $v;?>" name="art8_<?php print $v;?>" value="0"  checked="checked" />
							<label for="art15_<?php print $v;?>">No</label>
							<input type="radio" id="art16_<?php print $v;?>" name="art8_<?php print $v;?>"  value="1" />
							<label for="art16_<?php print $v;?>">Yes</label>
							</div>
						  </td>
						<?php
						   }
						   ?>
						</tr>
					  <tr>
						<td height="30" style="padding:5px 5px 5px 10px;">Admitted :</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <div class="radioset">
							<input type="radio" id="art17_<?php print $v;?>" name="art9_<?php print $v;?>" value="0"  checked="checked" />
							<label for="art17_<?php print $v;?>">No</label>
							<input type="radio" id="art18_<?php print $v;?>" name="art9_<?php print $v;?>"  value="1" />
							<label for="art18_<?php print $v;?>">Yes</label>
							</div>
						  </td>
						<?php
						   }
						   ?>
						</tr>
					  <tr>
						<td height="30" style="padding:5px 5px 5px 10px;"><strong>Final newborn status </strong></td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">&nbsp;</td>
						<?php
						   }
						   ?>
						</tr>
					  <tr>
						<td height="30" style="padding:5px 5px 5px 10px;">Discharge :</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <div class="radioset">
							<input type="radio" id="art21_<?php print $v;?>" name="art11_<?php print $v;?>" value="0"  checked="checked" />
							<label for="art21_<?php print $v;?>">No</label>
							<input type="radio" id="art22_<?php print $v;?>" name="art11_<?php print $v;?>"  value="1" />
							<label for="art22_<?php print $v;?>">Yes</label>
							</div>
						  </td>
						<?php
						   }
						   ?>
						</tr>
					  <tr>
						<td height="30" style="padding:5px 5px 5px 10px;">Discharge date:</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120"><input type="date" name="ndis_date[]" id="textfield2" class="ip"  style="width:150px;
							   " /></td>
						<?php
						   }
						   ?>
					  </tr>
					  <tr>
						<td height="30" style="padding:5px 5px 5px 10px;">Refer :</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <div class="radioset">
							<input type="radio" id="art23_<?php print $v;?>" name="art12_<?php print $v;?>" value="0"  checked="checked" />
							<label for="art23_<?php print $v;?>">No</label>
							<input type="radio" id="art24_<?php print $v;?>" name="art12_<?php print $v;?>"  value="1" />
							<label for="art24_<?php print $v;?>">Yes</label>
							</div>
						  </td>
						<?php
						   }
						   ?>
						</tr>
					  <tr>
						<td height="30" style="padding:5px 5px 5px 10px;">Refer to :</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <input type="text" name="nrefer_to[]" id="refer_to<?php print $v;?>" class="refer" style="width:150px;border:solid;
	border-color:#CCC;
	border-width:1px;
	border-radius:3px;
	height:30px;
	padding-left:5px;" placeholder="Facility's name" />
						  </td>
						<?php
						   }
						   ?>
						</tr>
					  <tr>
						<td height="30" style="padding:5px 5px 5px 10px;">Refer date :</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <input type="date" name="nrefer_date[]" id="nrefer_date[]" class="ip"  style="width:150px; " />
						  </td>
						<?php
						   }
						   ?>
						
					  </tr>
					  <tr>
						<td height="30" style="padding:5px 5px 5px 10px;">Death :</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <div class="radioset">
							<input type="radio" id="art25_<?php print $v;?>" name="art13_<?php print $v;?>" value="0"  checked="checked" />
							<label for="art25_<?php print $v;?>">No</label>
							<input type="radio" id="art26_<?php print $v;?>" name="art13_<?php print $v;?>"  value="1" />
							<label for="art26_<?php print $v;?>">Yes</label>
							</div>
						  </td>
						<?php
						   }
						   ?>
						</tr>
					  <tr>
						<td height="30" style="padding:5px 5px 5px 10px;">Death date :</td>
						<?php
						   for($v = 0; $v<$size; $v++){
							   ?>
						<td align="left" width="120">
						  <input type="date" name="ndeath_date[]" id="ndeath_date[]" class="ip"  style="width:150px; " />
						  </td>
						<?php
						   }
						   ?>
					  </tr>
					  <tr>
						<td style="padding:5px 5px 5px 10px;">&nbsp;</td>
						<td align="left">&nbsp;</td>
						</tr>
					  </table>
					<?php	
					}
				}
			?>
                </td>
              </tr>
            <tr>
              <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
              </tr>
            <tr>
              <td height="30" colspan="2" style="padding:5px 10px 5px 10px; color:#333;"><strong>Final maternal status</strong></td>
              </tr>
            <tr>
              <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Discharge :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
                <input type="radio" id="rdg9" name="mds"  value="0" checked="checked" />
                <label for="rdg9">No</label>
                <input type="radio" id="rdg10" name="mds"  value="1"  <?php if($resultPostnatal[0][12]==1){print "checked";}?> />
                <label for="rdg10">Yes</label>
                </div></td>
              </tr>
            <tr id="dod" style="display:<?php if($resultPostnatal[0][12]!=1){print "none";}?>;">
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date of discharge :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input type="date" name="date_od_dis" id="date_od_dis"  class="ip" value="<?php print $resultPostnatal[0][13]; ?>"  /></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Refer status :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
                <input type="radio" id="rbm" name="rs" value="0"  checked="checked" />
                <label for="rbm">No</label>
                <input type="radio" id="rbm2" name="rs"  value="1" <?php if($resultPostnatal[0][14]==1){print "checked";}?> />
                <label for="rbm2">Yes</label>
                </div></td>
              </tr>
            <tr class="refer_s" style="display:<?php if($resultPostnatal[0][14]!=1){print "none";}?>;">
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Refer date :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input type="date" name="refer_date" id="refer_date"  class="ip" value="<?php print $resultPostnatal[0][15]; ?>" /></td>
              </tr>
            <tr class="refer_s" style="display:<?php if($resultPostnatal[0][14]!=1){print "none";}?>;">
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Refer to :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <input name="mrefer_to" class="refer" id="refer_to" size="40" placeholder="Facility's name" style="width:150px;border:solid;
	border-color:#CCC;
	border-width:1px;
	border-radius:3px;
	height:30px;
	padding-left:5px;"  value="<?php print $resultPostnatal[0][16]; ?>"></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Death :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><div class="radioset">
                <input type="radio" id="rdg11" name="mdl"  value="0" checked="checked" />
                <label for="rdg11">No</label>
                <input type="radio" id="rdg12" name="mdl"  value="1" <?php if($resultPostnatal[0][17]==1){print "checked";}?> />
                <label for="rdg12">Yes</label>
                </div></td>
              </tr>
            <tr id="death" style="display:<?php if($resultPostnatal[0][17]!=1){print "none";}?>;">
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date of death :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><input type="date" name="date_death" id="date_death"  class="ip"  value="<?php print $resultPostnatal[0][18]; ?>" /></td>
              </tr>
            <tr>
              <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table>
      <br />
      <span style="padding-left:10px; padding-top:10px;">
      <input type="submit" name="button" id="button" value="Update" style="background-color:#06C; color:#FFF; height:40px; width:100px; border-radius:5px; border:none; cursor:pointer;" />
      </span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table></form>

