<style>
#rec1 tr:nth-child(even) {background:#F9F9F9}
#rec1 tr:nth-child(odd) {background: #F0F7FB}
#rec1 td{
	padding-top:5px;
	padding-bottom:5px;
	min-height:40px;
}
</style>
<?php
/*$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE record_id = '%s'",
		  mysql_real_escape_string("complication_delivery"),
		  mysql_real_escape_string($_SESSION['userSIMANHmother_record'])
		  );
$resultCom = $db->select($strSQL,false,true);*/
?>
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
                  <td width="50" height="30" style="background-image:url(../../images/tb_bg1.gif); background-size:contain; padding-left:5px;" ><strong>No</strong></td>
                  <td width="250" align="left" style="background-image:url(../../images/tb_bg1.gif); background-size:contain; padding-left:5px;"><strong>Complication</strong></td>
                  <td width="170" align="left" style="background-image:url(../../images/tb_bg1.gif); background-size:contain; padding-left:5px;">&nbsp;</td>
                  <td align="left" style="background-image:url(../../images/tb_bg1.gif); background-size:contain; padding-left:5px;"><strong>Remark</strong></td>
                  </tr>
				  <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s 
								WHERE record_id = '%s'",
								mysql_real_escape_string("complication"),
								mysql_real_escape_string($_GET['id'])
								);
					$resultCom1 = $db->select($strSQL,false,true);
					?>
                <tbody id="rec1">
                  <tr>
                    <td height="25" align="left" valign="middle" style="  padding-left:5px;" >1</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Induction of labour</td>
                    <td align="center" valign="middle" style="  padding-left:5px;">
                    <?php
            switch($resultCom[0][1]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?>
                    </td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="25" align="left" valign="middle" style="  padding-left:5px;" >2</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Antepartum haemorrhage</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><?php
            switch($resultCom[0][2]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?>
                    </div></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr id="anter" style="display:none;">
                    <td height="25" align="left" valign="middle" bgcolor="#F9F9F9" style="  padding-left:5px;" >&nbsp;</td>
                    <td align="left" valign="middle" bgcolor="#F9F9F9" style="padding-left:5px;">&nbsp;</td>
                    <td align="left" valign="middle" bgcolor="#F9F9F9" style="  padding-left:5px;">
                    <?php
            switch($resultCom[0][3]){
				case 1: print "AP"; break;
				default:print "";	
			}
			?>
            <?php
            switch($resultCom[0][4]){
				case 1: print "PP"; break;
				default:print "";	
			}
			?></td>
                    <td align="left" valign="middle" bgcolor="#F9F9F9" style="  padding-left:5px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >3</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Postpartum haemorrhage </td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><?php
            switch($resultCom[0][5]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?>
                    </div></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >4</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Severe pre eclampsia</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><?php
            switch($resultCom[0][6]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >5</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Eclampsia</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><?php
            switch($resultCom[0][7]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                  </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >6</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Prolonged rupture of membranes</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><?php
            switch($resultCom[0][8]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">
					</td>
                  </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >7</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Ruptured uterus</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><?php
            switch($resultCom[0][9]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >8</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Sepsis </td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><?php
            switch($resultCom[0][10]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >9</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Obstructed or prolonged labour</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><?php
            switch($resultCom[0][11]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >10</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Retained placenta</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><?php
            switch($resultCom[0][12]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >11</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Manual removal of placenta</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><?php
            switch($resultCom[0][13]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >12</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Maternal death</td>
                    <td align="center" valign="middle" style="  padding-left:5px;"><?php
            switch($resultCom[0][14]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?></td>
                    <td align="left" valign="middle" style="  padding-left:5px;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >13</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Stillbirth</td>
                    <td align="center" valign="middle" style="  padding-left:5px;">
                    <?php
            switch($resultCom[0][15]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?>
                    </td>
                    <td align="left" valign="middle" style="  padding-left:5px;">
                    
                    </td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >14</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Neonatal death</td>
                    <td align="center" valign="middle" style="  padding-left:5px;">
                    <?php
            switch($resultCom[0][16]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?>
                    </td>
                    <td align="left" valign="middle" style="  padding-left:5px;">
                    
                    </td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >15</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Preterm birth</td>
                    <td align="center" valign="middle" style="  padding-left:5px;">
                   <?php
            switch($resultCom[0][17]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?>
                    </td>
                    <td align="left" valign="middle" style="  padding-left:5px;">
                    </td>
                    </tr>
                  
                  <tr>
                    <td height="35" align="left" valign="middle" style="  padding-left:5px;" >16</td>
                    <td align="left" valign="middle" style="padding-left:5px;">Low birth weight</td>
                    <td align="center" valign="middle" style="  padding-left:5px;">
                    <?php
            switch($resultCom[0][18]){
				case 1: print "Yes"; break;
				default:print "No";	
			}
			?>
                    </td>
                    <td align="left" valign="middle" style="  padding-left:5px;">
                    
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
        </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
