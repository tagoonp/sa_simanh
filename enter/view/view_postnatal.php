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
          <td height="40" style="font-size:1.0em; padding-left:10px;">Postnatal information</td>
          <td width="50" style="font-size:1.0em; padding-left:10px;">
          <?php
          if($resultPostnatal){
			if($resultPostnatal[0]['status']==0){
			?>
			<table width="100%" border="0" cellspacing="0" cellpadding="0" 
            style="border:solid; border-color:#CCC; border-width:0px 1px 0px 1px;">
              <tr>
                <td height="40" align="center"><a href="main.php?id=5&amp;com=edit"><img src="../images/edit.png" width="30" height="30" /></a></td>
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
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">
              <?php
            switch($resultPostnatal[0][1]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?>
              </td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Postpartum eclampsia :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><?php
            switch($resultPostnatal[0][2]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Postpartum sepsis  :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><?php
            switch($resultPostnatal[0][3]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Postpartum maternal death :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><?php
            switch($resultPostnatal[0][4]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
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
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><?php
            switch($resultPostnatal[0][5]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Oral contraception :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><?php
            switch($resultPostnatal[0][6]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Medroxyprogesterone :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><?php
            switch($resultPostnatal[0][7]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Norethisterone enanthate :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><?php
            switch($resultPostnatal[0][8]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Condoms :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><?php
            switch($resultPostnatal[0][9]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">IUCD inserted :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><?php
            switch($resultPostnatal[0][10]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">Subdermal implant :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;"><?php
            switch($resultPostnatal[0][11]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
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
				
				if(isset($_GET['id'])){
					
				}else{
				
				}
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
                    <td width="300" height="30" style="padding:5px 10px 5px 10px;">PMTCT Visit (Nevirapine to mother and baby) :</td>
                    <?php
                       for($v = 0; $v<$size; $v++){
						   ?>
                    <td align="left" width="120">
                      <?php
					  if($resultOPostnatal){
						switch($resultOPostnatal[$v][1]){
							case 1: print "Yes"; break;
							default:print "No";	
						}}
						?>
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
                      <?php
					  if($resultOPostnatal){
						switch($resultOPostnatal[$v][2]){
							case 1: print "Yes"; break;
							default:print "No";	
						}}
						?>
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
                      <?php
					  if($resultOPostnatal){
						switch($resultOPostnatal[$v][3]){
							case 1: print "Yes"; break;
							default:print "No";	
						}
					  }
						?>
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
                      <?php
					  if($resultOPostnatal){
						switch($resultOPostnatal[$v][4]){
							case 1: print "Yes"; break;
							default:print "No";	
						}
					  }
						?>
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
                      <?php
					  if($resultOPostnatal){
						switch($resultOPostnatal[$v][5]){
							case 1: print "Yes"; break;
							default:print "No";	
						}
					  }
						?>
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
                    <?php
					if($resultOPostnatal){
						switch($resultOPostnatal[$v][6]){
							case 1: print "EBF"; break;
							case 2: print "EFF"; break;
							case 3: print "Unsure"; break;
							default:print "No";	
						}
					}
						?>
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
                      <?php
					  if($resultOPostnatal){
						switch($resultOPostnatal[$v][7]){
							case 1: print "Yes"; break;
							default:print "No";	
						}}
						?>
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
                      <?php
					  if($resultOPostnatal){
						switch($resultOPostnatal[$v][8]){
							case 1: print "Yes"; break;
							default:print "No";	
						}}
						?>
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
                      <?php
					  if($resultOPostnatal){
						switch($resultOPostnatal[$v][9]){
							case 1: print "Yes"; break;
							default:print "No";	
						}}
						?>
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
                      <?php
					  if($resultOPostnatal){
						switch($resultOPostnatal[$v][10]){
							case 1: print "Yes"; break;
							default:print "No";	
						}
					  }
						?>
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
                      <?php
					  if($resultOPostnatal){
						switch($resultOPostnatal[$v][11]){
							case 1: print "Yes"; break;
							default:print "No";	
						}
					}
						?>
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
                    <td align="left" width="120">
                    <?php 
					if($resultOPostnatal){
					print $resultOPostnatal[$v][12];}?>
                      </td>
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
                      <?php
					  if($resultOPostnatal){
						switch($resultOPostnatal[$v][13]){
							case 1: print "Yes"; break;
							default:print "No";	
						}}
						?>
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
                    <?php if($resultOPostnatal){print $resultOPostnatal[$v][14];}?>
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
                    <?php if($resultOPostnatal){print $resultOPostnatal[$v][15];}?>
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
                      <?php
					  if($resultOPostnatal){
						switch($resultOPostnatal[$v][16]){
							case 1: print "Yes"; break;
							default:print "No";	
						}}
						?>
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
                    <?php if($resultOPostnatal){print $resultOPostnatal[$v][17];}?>
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
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultPostnatal[0][12]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
              </tr>
            <tr id="dod" >
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date of discharge :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <?php print $resultPostnatal[0][13]; ?>
              </td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Refer status :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultPostnatal[0][14]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
              </tr>
            <tr class="refer_s" >
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Refer date :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php print $resultPostnatal[0][15]; ?></td>
              </tr>
            <tr class="refer_s" >
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Refer to :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php print $resultPostnatal[0][16]; ?></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Death :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultPostnatal[0][17]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
              </tr>
            <tr id="death" >
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date of death :</td>
              <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php print $resultPostnatal[0][18]; ?></td>
              </tr>
            <tr>
              <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table>
</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

