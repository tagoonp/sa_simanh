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
    <td style="padding-left:0px; padding-right:0px;"><br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-color:#CCC; border-width:1px;">
      <tr>
        <td height="40" style="font-size:1.0em; padding-left:10px;"><strong>View obstetric information</strong></td>
        <td style="font-size:1.0em; padding-left:0px;" width="50">
        <?php
            if($resultRegister[0]['confirm_status']==0){
				?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" 
            style="border:solid; border-color:#CCC; border-width:0px 1px 0px 1px;">
              <tr>
                <td height="40" align="center"><a href="createSession.php?id=<?php print $_GET['id']; ?>&amp;mid=1&amp;com=edit"><img src="../images/edit.png" width="30" height="30" /></a></td>
              </tr>
            </table>
            <?php } ?></td>
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
            <td width="350" height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Gravidity :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
			<?php
            print $resultObstetric[0][1];?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Parity :<font color="#FF0000">&nbsp;</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <?php
            print $resultObstetric[0][2];?>
              </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Antenatal care attendance :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <?php
            print $resultObstetric[0][3];?>
            </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Gestational age at 1st ANC : <font color="#FF0000">*</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            print $resultObstetric[0][4];?>
             </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Antenatal booking before 20 weeks gestation :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <?php
            switch($resultObstetric[0][5]){
				case 1: print "Yes"; break;
				case 0: print "No"; break;	
			}
			?>
            </td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Number of antenatal visits :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            print $resultObstetric[0][6];?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Rh :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <?php
            switch($resultObstetric[0][7]){
				case 'Unknow': print "Unknow"; break;
				case 'Neg': print "Negative"; break;
				case 'Pos': print "Positive"; break;	
			}
			?></td>
          </tr>
          <tr id="rhq" >
            <td height="30" bgcolor="#E8E8E8" style="padding:5px 10px 5px 10px; color:#333;">Anti D Immunoglobulin to mother if Rh neg :</td>
            <td height="30" bgcolor="#E8E8E8" style="padding:5px 10px 5px 10px; color:#333;"><?php
            switch($resultObstetric[0][8]){
				case 1: print "Yes"; break;
				case 0: print "No"; break;	
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">RPR :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <?php
            switch($resultObstetric[0][9]){
				case 1: print "Done but no result"; break;
				case 2: print "Result negative"; break;
				case 3: print "Result positive"; break;
				default: print "Not done";	
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">RPR treated :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultObstetric[0][10]){
				case 1: print "Yes"; break;
				case 0: print "No"; break;	
				case 99: print "Not applicable"; break;
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">HIV Status :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultObstetric[0][11]){
				case 'Unknow': print "Unknow"; break;
				case 'Neg': print "Negative"; break;
				case 'Pos': print "Positive"; break;	
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">On ART at delivery :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <?php
            switch($resultObstetric[0][12]){
				case 'No': print "No"; break;
				case 'Dual': print "Dual"; break;
				case 'Triple': print "Triple"; break;	
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">HIV 1st test :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultObstetric[0][13]){
				case 1: print "Done but no result"; break;
				case 2: print "Result negative"; break;
				case 3: print "Result positive"; break;
				default: print "Not done";	
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">HIV retest after 12 weeks :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultObstetric[0][14]){
				case 1: print "Done but no result"; break;
				case 2: print "Result negative"; break;
				case 3: print "Result positive"; break;
				default: print "Not done";	
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">HIV in labour :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultObstetric[0][15]){
				case 1: print "Done but no result"; break;
				case 2: print "Result negative"; break;
				case 3: print "Result positive"; break;
				default: print "Not done";	
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">CD4 labour/postpartum :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultObstetric[0][16]){
				case 1: print "Yes"; break;
				case 0: print "No"; break;	
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#E8E8E8" style="padding:5px 10px 5px 10px; color:#333;">CD4 count :</td>
            <td height="30" bgcolor="#E8E8E8" style="padding:5px 10px 5px 10px; color:#333;">
            <?php print $resultObstetric[0][17];?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Initiate ART at delivery :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultObstetric[0][18]){
				case 1: print "Yes"; break;
				case 0: print "No"; break;	
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Birth before arrival (BBA) :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php
            switch($resultObstetric[0][19]){
				case 1: print "Yes"; break;
				case 0: print "No"; break;	
			}
			?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Gestational age at admission : <font color="#FF0000">*</font></td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <?php print $resultObstetric[0][20];?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Stage of labor at admission :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">
            <?php
            switch($resultObstetric[0][21]){
				case 1: print "Latent phase"; break;
				case 2: print "Active phase 3 - 4 cm"; break;
				case 3: print "2nd stage of labor"; break;
				case 4: print "Head out periniun"; break;
				case 5: print "3rd stage of labor"; break;
				default: print "No labor";	
			}
			?></td>
          </tr>
          <tr >
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time of labor start :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php print $resultObstetric[0][22];?>
  &nbsp;&nbsp;<?php print $resultObstetric[0][23];?></td>
          </tr>
          <tr >
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time of ruptured membranes :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php print $resultObstetric[0][24];?>
  &nbsp;&nbsp;<?php print $resultObstetric[0][25];?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time at 3-4 cm.</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php print $resultObstetric[0][26];?>
  &nbsp;&nbsp;<?php print $resultObstetric[0][27];?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Date - Time at fully dilated.</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php print $resultObstetric[0][28];?>
  &nbsp;&nbsp;<?php print $resultObstetric[0][29];?></td>
          </tr>
          <tr>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;">Duration of active phase of labour :</td>
            <td height="30" bgcolor="#FFFFFF" style="padding:5px 10px 0px 10px; color:#333;"><?php print $resultObstetric[0][30];?></td>
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
