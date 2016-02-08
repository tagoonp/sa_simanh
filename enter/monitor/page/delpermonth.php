<?php
$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE institute_type in ('2','3')  and institute_id in (SELECT institute_id FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE username = '".$_SESSION['userSIMANHusername']."')",
		  mysql_real_escape_string("institute")
    );
$resultInstitute = $db->select($strSQL,false,true);

//$sdate = date('Y-m')."-01";
$sdate = '2014-09-01';
if(isset($_GET['sdate'])){
	$sdate = $_GET['sdate'];
}
$edate = date('Y-m-d');
if(isset($_GET['edate'])){
	$edate = $_GET['edate'];
}

$dateFilter = " and date_adm between '$sdate' and '$edate'";

$hos = '';
$hos = $resultInstitute[0]['institute_id'];
// if(isset($_GET['hos'])){
// 	if($_GET['hos']!=0){
// 		//$hos = " and institute_id = '".$_GET['hos']."'";
// 		$hos = $_GET['hos'];
// 	}
// }

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="300" height="30" align="left" style="font-size:1.2em;">Delivery data for one month</td>
    <td height="30" style="font-size:1.2em;" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="color:#063;">&nbsp;</td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="left" style="color:#063;"><table width="100%" border="0" cellspacing="0" cellpadding="0"
    style="font-size:0.9em;">
      <tr>
        <td width="50" align="left" style="padding-right:10px;">Start :</td>
        <td width="150"><input type="date" name="sdate" id="sdate" style="height:30px; width:150px; border:solid; border-color:#CCC; border-width:1px; border-radius:5px;" value="<?php print $sdate; ?>" ></td>
        <td width="50" align="right" style="padding-right:10px;">End : </td>
        <td width="150"><input type="date" name="edate" id="edate" style="height:30px; width:150px; border:solid; border-color:#CCC; border-width:1px; border-radius:5px;" value="<?php print $edate; ?>"></td>
        <td width="80" align="right" style="padding-right:10px;">Hospital :</td>
        <td><select name="insts" id="insts" style="height:30px; width:200px; border:solid; border-color:#CCC; border-width:1px; border-radius:5px;">
          <option value="0" selected="selected">All</option>
          <?php
          if($resultInstitute){
			foreach($resultInstitute as $v){
				?>
          <option value="<?php print $v['institute_id'];?>"
					<?php
						if($hos==$v['institute_id']){
							print "selected";
						}
					?>><?php print $v['institute_name'];?></option>
          <?php
			}
		  }
		  ?>
        </select>
          <input type="button" name="view_btn" id="view_btn" value="View" style="background-color:#3C9; color:#FFF; border:none; border-radius:3px; cursor:pointer; width:60px; height:28px; font-weight:bold;" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="30" colspan="2" align="left" style="color:#063;">Delivery during this period</td>
  </tr>
  <tr>
    <td colspan="2" style="padding-top:5px; padding-bottom:5px;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
      <tr>
        <td height="35" align="left" bgcolor="#F7F7F7">&nbsp;</td>
        <td width="100" rowspan="2" align="center" bgcolor="#F7F7F7"><strong>Total birth</strong></td>
        <td width="100" rowspan="2" align="center" bgcolor="#F7F7F7"><strong>Livebirth</strong></td>
        <td colspan="3" align="center" bgcolor="#C0DFEF"><strong>Stillborn</strong></td>
        <td width="100" rowspan="2" align="center" bgcolor="#F7F7F7"><strong>Neonatal death</strong></td>
        <td width="100" rowspan="2" align="center" bgcolor="#F7F7F7"><strong>Alive on discharge</strong></td>
        </tr>
      <tr>
        <td width="100" height="35" align="left" bgcolor="#F7F7F7">&nbsp;</td>
        <td width="80" align="center" bgcolor="#E8F3F9">Fresh</td>
        <td width="80" align="center" bgcolor="#E8F3F9">Macerated</td>
        <td width="100" align="center" bgcolor="#E8F3F9">Total stillborn</td>
        </tr>
      <tr>
        <td height="1" colspan="8" align="left" bgcolor="#999999" style="padding-left:10px;"></td>
        </tr>
      <tr>
        <td align="left" style="padding-left:10px;">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
      <tr>
        <td height="25" align="left" style="padding-left:10px;">500 - 999g</td>
        <td align="center"><?php calSumBirthReport($db,$tbf,1);?></td>
        <td align="center"><?php calSumLBirthReport($db,$tbf,1);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,1,1);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,1,2);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,1,0);?></td>
        <td align="center"><?php calSumNeonatalReport($db,$tbf,1);?></td>
        <td align="center"><?php calSumAODReport($db,$tbf,1);?></td>
        </tr>
      <tr>
        <td height="25" align="left" style="padding-left:10px;">1,000 - 1,499g</td>
        <td align="center"><?php calSumBirthReport($db,$tbf,2);?></td>
        <td align="center"><?php calSumLBirthReport($db,$tbf,2);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,2,1);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,2,2);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,2,0);?></td>
        <td align="center"><?php calSumNeonatalReport($db,$tbf,2);?></td>
        <td align="center"><?php calSumAODReport($db,$tbf,2);?></td>
        </tr>
      <tr>
        <td height="25" align="left" style="padding-left:10px;">1,500 - 1,999g</td>
        <td align="center"><?php calSumBirthReport($db,$tbf,3);?></td>
        <td align="center"><?php calSumLBirthReport($db,$tbf,3);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,3,1);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,3,2);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,3,0);?></td>
        <td align="center"><?php calSumNeonatalReport($db,$tbf,3);?></td>
        <td align="center"><?php calSumAODReport($db,$tbf,3);?></td>
        </tr>
      <tr>
        <td height="25" align="left" style="padding-left:10px;">2,000 - 2,490g</td>
        <td align="center"><?php calSumBirthReport($db,$tbf,4);?></td>
        <td align="center"><?php calSumLBirthReport($db,$tbf,4);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,4,1);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,4,2);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,4,0);?></td>
        <td align="center"><?php calSumNeonatalReport($db,$tbf,4);?></td>
        <td align="center"><?php calSumAODReport($db,$tbf,4);?></td>
        </tr>
      <tr>
        <td height="25" align="left" style="padding-left:10px;">2,500g+</td>
        <td align="center"><?php calSumBirthReport($db,$tbf,5);?></td>
        <td align="center"><?php calSumLBirthReport($db,$tbf,5);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,5,1);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,5,2);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,5,0);?></td>
        <td align="center"><?php calSumNeonatalReport($db,$tbf,5);?></td>
        <td align="center"><?php calSumAODReport($db,$tbf,5);?></td>
        </tr>
      <tr>
        <td height="25" align="left" style="padding-left:10px;"><strong>Total :</strong></td>
        <td align="center"><?php calSumBirthReport($db,$tbf,0);?></td>
        <td align="center"><?php calSumLBirthReport($db,$tbf,0);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,0,1);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,0,2);?></td>
        <td align="center"><?php calSumStillbornReport($db,$tbf,0,0);?></td>
        <td align="center"><?php calSumNeonatalReport($db,$tbf,0);?></td>
        <td align="center"><?php calSumAODReport($db,$tbf,0);?></td>
        </tr>
      <tr>
        <td align="left" style="padding-left:10px;">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td width="300" rowspan="2" valign="top" style="padding-right:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" align="left" style="color:#063;">Multiple pregnancies</td>
        </tr>
        <tr>
          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
            <tr>
              <td width="200" height="25" style="padding-left:10px; padding-right:10px;">Pregnancies :</td>
              <td width="50"><?php calSumPregReport($db,$tbf,1);?></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Neonates :</td>
              <td><?php calSumPregReport($db,$tbf,2);?></td>
              </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" align="left" style="color:#063;">Antenatal care</td>
        </tr>
        <tr>
          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td width="50">&nbsp;</td>
              </tr>
              <?php
				//lobal $sdate,$edate,$hos;
				$dateFilter = " and date_adm between '$sdate' and '$edate'";
				$buff = '';
				if($hos!= 0 ){
					$buff = " and username in
							(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."' )";
				}

             	//$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."institute WHERE institute_type in ('2','3')";
				$strSQL = "SELECT count(*),`refer_in_facility` FROM `fmn1_registerrecord` WHERE confirm_status = 1 $buff group by `refer_in_facility`";

			  	$resultInsti2 = $db->select($strSQL,false,true);
			  	if($resultInsti2){
					$c = 1;
					foreach($resultInsti2 as $v){
										?>
										<tr>
											<td width="200" height="25" style="padding-left:10px; padding-right:10px;"
					  ><?php
					  print $c.". ";
					  if($v[1]==''){
						  print "Unknown";
					  }else{
							print $v[1];
					  }?></td>
					  <td align="left"><?php
							print $v[0];
					  ?></td>
					  </tr>
					<?php
					$c++;
				  }
				}else{
					print "<td colspan=\"2\">&nbsp;&nbsp;No ANC data</td>";
				}

			  ?>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" align="left" style="color:#063;">Born before arrival</td>
        </tr>
        <tr>
          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td width="50">&nbsp;</td>
              </tr>
            <tr>
              <td width="200" height="30" style="padding-left:10px; padding-right:10px;">Total :</td>
              <td align="left"><?php calSumBOAReport($db,$tbf);?></td>
              </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" align="left" style="color:#063;">Delivery method</td>
        </tr>
        <tr>
          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
            <tr>
              <td width="200" height="25" style="padding-left:10px; padding-right:10px;">Normal vaginal :</td>
              <td width="50" align="left"><?php calSumMODReport($db,$tbf,1);?></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Ventouse :</td>
              <td align="left"><?php calSumMODReport($db,$tbf,2);?></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Forceps :</td>
              <td align="left"><?php calSumMODReport($db,$tbf,3);?></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Vaginal breech :</td>
              <td align="left"><?php calSumMODReport($db,$tbf,5);?></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Caesarean section :</td>
              <td align="left"><?php calSumMODReport($db,$tbf,4);?></td>
              </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" align="left" style="color:#063;">Parity</td>
        </tr>
        <tr>
          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td width="50">&nbsp;</td>
              </tr>
            <tr>
              <td width="200" height="25" style="padding-left:10px; padding-right:10px;">Primiparae :</td>
              <td width="50"><?php calSumParityReport($db,$tbf,1);?></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Multiparae :</td>
              <td><?php calSumParityReport($db,$tbf,2);?></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Grand multiparae :</td>
              <td><?php calSumParityReport($db,$tbf,3);?></td>
              </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
          </table></td>
        </tr>
      </table>
    <br />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30" align="left" style="color:#063;">Syphilis serology</td>
        </tr>
      <tr>
        <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
          <tr>
            <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
            <td width="50">&nbsp;</td>
            </tr>
          <tr>
            <td width="200" height="25" style="padding-left:10px; padding-right:10px;">Postive :</td>
            <td><?php calSumHIVReport($db,$tbf,'rpr',3);?></td>
            </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">Negative :</td>
            <td><?php calSumHIVReport($db,$tbf,'rpr',2);?></td>
            </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">Done but no result :</td>
            <td><?php calSumHIVReport($db,$tbf,'rpr',1);?></td>
            </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">Not done :</td>
            <td><?php calSumHIVReport($db,$tbf,'rpr',0);?></td>
            </tr>
          <tr>
            <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
          </table></td>
        </tr>
    </table>
    <br /></td>
    <td height="30" align="left" style="color:#063;">Morbidity marker</td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
      <tr>
        <td width="250" style="padding-left:10px; padding-right:10px;">&nbsp;</td>
        <td align="center">&nbsp;</td>
        </tr>
      <tr>
        <td height="25" style="padding-left:10px; padding-right:10px;">Anterpartum haemorrhage :</td>
        <td><?php calSumComplication($db,$tbf,2);?></td>
        </tr>
      <tr>
        <td height="25" style="padding-left:10px; padding-right:10px;">Postpartum haemorrhage :</td>
        <td><?php calSumComplication($db,$tbf,3);?></td>
        </tr>
      <tr>
        <td height="25" style="padding-left:10px; padding-right:10px;">Severe pre-eclampsia :</td>
        <td><?php calSumComplication($db,$tbf,4);?></td>
        </tr>
      <tr>
        <td height="25" style="padding-left:10px; padding-right:10px;">Eclampsia :</td>
        <td><?php calSumComplication($db,$tbf,5);?></td>
        </tr>
      <tr>
        <td height="25" style="padding-left:10px; padding-right:10px;">Induction of labour :</td>
        <td><?php calSumComplication($db,$tbf,1);?></td>
        </tr>
      <tr>
        <td height="25" style="padding-left:10px; padding-right:10px;">Prolonged rupture of membranes :</td>
        <td><?php calSumComplication($db,$tbf,6);?></td>
        </tr>
      <tr>
        <td height="25" style="padding-left:10px; padding-right:10px;">Ruptured uterus :</td>
        <td><?php calSumComplication($db,$tbf,7);?></td>
        </tr>
      <tr>
        <td height="25" style="padding-left:10px; padding-right:10px;">Sepsis :</td>
        <td><?php calSumComplication($db,$tbf,8);?></td>
        </tr>
      <tr>
        <td height="25" style="padding-left:10px; padding-right:10px;">Obstructed / prolonged labour :</td>
        <td><?php calSumComplication($db,$tbf,9);?></td>
        </tr>
      <tr>
        <td height="25" style="padding-left:10px; padding-right:10px;">Retained placenta :</td>
        <td><?php calSumComplication($db,$tbf,10);?></td>
        </tr>
      <tr>
        <td height="25" style="padding-left:10px; padding-right:10px;">Bag / mark neonatal resuscutation :</td>
        <td><?php calSumComplication($db,$tbf,17);?></td>
        </tr>
      <tr>
        <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      </table>
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" align="left" style="color:#063;">Maternal age </td>
        </tr>
        <tr>
          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
            <tr>
              <td width="250" height="25" style="padding-left:10px; padding-right:10px;">Younger than 18 yr. :</td>
              <td><?php calSumMaternalAgeReport($db,$tbf,1);?></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">18 - 19 yr :</td>
              <td><?php calSumMaternalAgeReport($db,$tbf,2);?></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">20 - 34 yr :</td>
              <td><?php calSumMaternalAgeReport($db,$tbf,3);?></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">35 yr and older :</td>
              <td><?php calSumMaternalAgeReport($db,$tbf,4);?></td>
              </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td>&nbsp;</td>
              </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" align="left" style="color:#063;">HIV serology</td>
        </tr>
        <tr>
          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
            <tr>
              <td align="center" bgcolor="#009966" style="padding-left:10px; padding-right:10px; color:#FFF;">HIV results</td>
              <td width="100" align="center" bgcolor="#33CC66" style="padding-left:10px; padding-right:10px; color:#FFF;"><strong>1st</strong></td>
              <td width="100" height="30" align="center" bgcolor="#33CC66" style="color:#fff;"><strong>Retest</strong></td>
              <td width="100" align="center" bgcolor="#33CC66" style="color:#fff;"><strong>Labour</strong></td>
            </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td width="50">&nbsp;</td>
              <td width="50">&nbsp;</td>
            </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Not done :</td>
              <td height="25" align="center" style="padding-left:10px; padding-right:10px;"><?php calSumHIVTEst($db,$tbf,'obstetric','hiv_1st','0');?></td>
              <td width="50" align="center"><?php calSumHIVTEst($db,$tbf,'obstetric','hiv_retest','0');?></td>
              <td width="50" align="center"><?php calSumHIVTEst($db,$tbf,'obstetric','hiv_labour','0');?></td>
            </tr>
            <tr>
              <td height="1" colspan="4" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
            </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Done but no result :</td>
              <td height="25" align="center" style="padding-left:10px; padding-right:10px;"><?php calSumHIVTEst($db,$tbf,'obstetric','hiv_1st','1');?></td>
              <td align="center"><?php calSumHIVTEst($db,$tbf,'obstetric','hiv_retest','1');?></td>
              <td align="center"><?php calSumHIVTEst($db,$tbf,'obstetric','hiv_labour','1');?></td>
            </tr>
            <tr>
              <td height="1" colspan="4" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
            </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Result negative :</td>
              <td height="25" align="center" style="padding-left:10px; padding-right:10px;"><?php calSumHIVTEst($db,$tbf,'obstetric','hiv_1st','2');?></td>
              <td align="center"><?php calSumHIVTEst($db,$tbf,'obstetric','hiv_retest','2');?></td>
              <td align="center"><?php calSumHIVTEst($db,$tbf,'obstetric','hiv_labour','2');?></td>
            </tr>
            <tr>
              <td height="1" colspan="4" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
            </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Result positive :</td>
              <td height="25" align="center" style="padding-left:10px; padding-right:10px;"><?php calSumHIVTEst($db,$tbf,'obstetric','hiv_1st','3');?></td>
              <td align="center"><?php calSumHIVTEst($db,$tbf,'obstetric','hiv_retest','3');?></td>
              <td align="center"><?php calSumHIVTEst($db,$tbf,'obstetric','hiv_labour','3');?></td>
            </tr>
            <tr>
              <td height="15" colspan="2" style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
    </table>
    <br />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30" align="left" style="color:#063;">Anti - retroviral therapy</td>
      </tr>
      <tr>
        <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
          <tr>
            <td width="200" height="30" bgcolor="#009966" style="padding-left:10px; padding-right:10px; color:#FFF;"><strong>HIV positive mother</strong></td>
            <td bgcolor="#009966">&nbsp;</td>
          </tr>
          <tr>
            <td height="1" colspan="2" bgcolor="#CCCCCC" style="padding-left:10px; padding-right:10px;"></td>
            </tr>
          <tr>
            <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="250" height="25" style="padding-left:10px; padding-right:10px;">Prophykactic ART :</td>
            <td><?php calSumTherapy($db,$tbf,'m_art1','delivery');?></td>
          </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">Long-term ART :</td>
            <td><?php calSumTherapy($db,$tbf,'m_art3','delivery');?></td>
          </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">Intrapartum ART only :</td>
            <td><?php calSumTherapy($db,$tbf,'m_art2','delivery');?></td>
          </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">Received no ART :</td>
            <td><?php calSumTherapy($db,$tbf,'initiate_art','obstetric');?></td>
          </tr>
          <tr>
            <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="25" bgcolor="#009966" style="padding-left:10px; padding-right:10px; color:#FFF;"><strong>Neonatal of HIV positive mother</strong></td>
            <td bgcolor="#009966">&nbsp;</td>
          </tr>
          <tr>
            <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">Received drug :</td>
            <td><?php calSumTherapy($db,$tbf,'given_nevirapine','other_postnatal');?></td>
          </tr>
          <tr>
            <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top" style="padding-right:10px;">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td height="1" colspan="2" valign="top" bgcolor="#CCCCCC" style="padding-right:10px;"></td>
  </tr>
  <tr>
    <td valign="top" style="padding-right:10px;">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
