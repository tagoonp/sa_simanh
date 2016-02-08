<table width="100%" border="0" cellspacing="0" cellpadding="0">
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
    <td style="padding-left:0px; padding-right:0px;"><br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-color:#CCC; border-width:1px;">
      <tr>
        <td height="40" style="font-size:1.0em; padding-left:10px;"><strong>View delivery information</strong></td>
        <td style="font-size:1.0em; padding-left:0px;" width="50">
        <?php
            if($resultRegister[0]['confirm_status']==0){
				?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" 
            style="border:solid; border-color:#CCC; border-width:0px 1px 0px 1px;">
              <tr>
                <td height="40" align="center"><a href="createSession.php?id=<?php print $_GET['id']; ?>&amp;mid=2&amp;com=edit"><img src="../images/edit.png" width="30" height="30" /></a></td>
              </tr>
            </table>
            <?php } ?>
            </td>
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
              <?php
            print $resultDelivery[0][1];?>
              </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time of delivery : <font color="#FF0000">*</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
             <?php
            print $resultDelivery[0][2];?>
  &nbsp;&nbsp;<?php
            print $resultDelivery[0][3];?>
              </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Mode of delivery :<font color="#FF0000">&nbsp;</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
              <?php
            switch($resultDelivery[0][4]){
				case 1: print "Normal delivery"; break;
				case 2: print "V/E"; break;
				case 3: print "F/E"; break;
				case 4: print "Caesarean section"; break;
				case 5: print "Vaginal breach"; break;	
			}
			?>
              </td>
          </tr>
          <tr >
            <td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Indication : </td>
            <td height="30" align="left" valign="middle" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
			<?php
            if($resultDelivery[0]['ind_other']!=''){
				print 	$resultDelivery[0]['ind_other'];
			}else{
				$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."indication where ind_id = '".$resultDelivery[0]['indication']."' ";
				$resultInd = $db->select($strSQL,false,true);
				if($resultInd){
					print $resultInd[0][1];
				}else{
					print "No data";
				}	
			}
			
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Type of birth attendant <font color="#FF0000">:</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <?php
            switch($resultDelivery[0][6]){
				case 1: print "Midwife"; break;
				case 2: print "Nurse"; break;
				case 3: print "Medical student"; break;
				case 4: print "Doctor"; break;
				case 5: print "Resident"; break;
				case 6: print "Obstetrician"; break;	
				default: print "No data";
			}
			?>
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
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Intact :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultDelivery[0][7]){
				case 1: print "Yes"; break;	
				default: print "No";
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Episiotomy :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultDelivery[0][8]){
				case 1: print "Yes"; break;	
				default: print "No";
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Degree tear :<font color="#FF0000">&nbsp;</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultDelivery[0][9]){
				case 1: print "1"; break;
				case 2: print "2"; break;
				case 3: print "3"; break;	
				default: print "No data";
			}
			?></td>
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
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultDelivery[0][10]){
				case 1: print "Yes"; break;	
				default: print "No";
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Antenatal client Nevirapine taken during labour :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultDelivery[0][11]){
				case 1: print "Yes"; break;	
				default: print "No";
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Truvada given to woman after delivery</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultDelivery[0][12]){
				case 1: print "Yes"; break;	
				default: print "No";
			}
			?></td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">&nbsp;</td>
          </tr>
          <tr>
            <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
          </tr>
          
          <tr>
            <td height="30" colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">&nbsp;</td>
          </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
