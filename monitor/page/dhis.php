<?php
$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE institute_type in ('2','3')",
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
if(isset($_GET['hos'])){
	if($_GET['hos']!=0){
		//$hos = " and institute_id = '".$_GET['hos']."'";
		$hos = $_GET['hos'];
	}
}

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="300" height="30" align="left" style="font-size:1.2em;">DHIS data report</td>
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
          <input type="button" name="view_btn3" id="view_btn3" value="View" style="background-color:#3C9; color:#FFF; border:none; border-radius:3px; cursor:pointer; width:60px; height:28px; font-weight:bold;" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" style="color:#063; padding-right:10px;">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" style="color:#063; padding-right:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30" align="left" style="color:#063;" colspan="3">Bed capacity </td>
      </tr>
      <tr>
        <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
          <tr style="color:#FFF;">
            <td bgcolor="#009966" style="padding-left:10px; padding-right:10px;">&nbsp;</td>
            <td width="50" height="30" align="center" bgcolor="#009966"><strong>Materity</strong></td>
            <td width="50" align="center" bgcolor="#009966"><strong>Newborn</strong></td>
          </tr>
          <tr>
            <td height="1" colspan="3" bgcolor="#CCCCCC" style="padding-left:10px; padding-right:10px;"></td>
          </tr>
          <tr>
            <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
            <td align="center">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td width="250" height="25" style="padding-left:10px; padding-right:10px;">Inpatient days :</td>
            <td align="center"><?php calDateDuration1($db,$tbf);?></td>
            <td align="center"><p>
              <?php calDateDuration2($db,$tbf);?>
            </p></td>
          </tr>
          <tr>
            <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
          </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">Transfer in daily labour :</td>
            <td align="center"><?php calComStat2($db,$tbf,'refer_in_status',1);?></td>
            <td align="center" bgcolor="#E5E5E5">&nbsp;</td>
          </tr>
          <tr>
            <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
          </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">Transfer out postpartum :</td>
            <td align="center"><?php calComStat($db,$tbf,'postnatal','mot_ref_status',1);?></td>
            <td align="center"><?php calComStat($db,$tbf,'other_postnatal','refer',1);?></td>
          </tr>
          <tr>
            <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
          </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">Maternal death during labour :</td>
            <td align="center"><?php calComStat($db,$tbf,'complication_delivery','md',1);?></td>
            <td align="center" bgcolor="#E5E5E5">&nbsp;</td>
          </tr>
          <tr>
            <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
          </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">Maternal death during postpartum :</td>
            <td align="center"><?php calComStat($db,$tbf,'postnatal','mot_death',1);?></td>
            <td align="center" bgcolor="#E5E5E5">&nbsp;</td>
          </tr>
          <tr>
            <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
          </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">Stillbirth :</td>
            <td align="center" bgcolor="#E5E5E5">&nbsp;</td>
            <td align="center"><?php calComStat($db,$tbf,'complication_delivery','stil',1);?></td>
          </tr>
          <tr>
            <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
          </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">Neonatal death :</td>
            <td align="center" bgcolor="#E5E5E5">&nbsp;</td>
            <td align="center"><?php calComStat($db,$tbf,'complication_delivery','neo',1);?></td>
          </tr>
          <tr>
            <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
            <td colspan="2">&nbsp;</td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" valign="top" style="color:#063; padding-right:10px;">&nbsp;</td>
    <td align="left" valign="top" style="color:#063;">&nbsp;</td>
  </tr>
  <tr>
    <td width="300" align="left" valign="top" style="color:#063; padding-right:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" align="left" style="color:#063;">Alive status of birth before arrival</td>
        </tr>
        <tr>
          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
            <tr>
              <td height="30" bgcolor="#009966" style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td colspan="2" align="center" bgcolor="#009966" style="color:#fff;"><strong>BBA</strong></td>
              </tr>
            <tr>
              <td height="30" bgcolor="#009966" style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td align="center" bgcolor="#33CC66" style="color:#fff;"><strong>Yes</strong></td>
              <td width="70" align="center" bgcolor="#33CC66" style="color:#fff;"><strong>No</strong></td>
            </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td width="70">&nbsp;</td>
              <td width="50">&nbsp;</td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Stillbirth :</td>
              <td width="50" align="center"><?php calBBAstatus($db,$tbf,'obstetric','bba','stil',1);?></td>
              <td width="50" align="center"><?php calBBAstatus($db,$tbf,'obstetric','bba','stil',0);?></td>
              </tr>
              <tr>
              <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Neonatal death :</td>
              <td align="center"><?php calBBAstatus($db,$tbf,'obstetric','bba','neo',1);?></td>
              <td align="center"><?php calBBAstatus($db,$tbf,'obstetric','bba','neo',0);?></td>
              </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
              </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" align="left" style="color:#063;">Syphilis status</td>
        </tr>
        <tr>
          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
            <tr>
              <td rowspan="2" align="center" bgcolor="#009966" style="padding-left:10px; padding-right:10px; color:#FFF;"><strong>RPR</strong></td>
              <td height="30" colspan="2" align="center" bgcolor="#009966" style="color:#fff;"><strong>ANC</strong></td>
            </tr>
            <tr>
              <td height="30" align="center" bgcolor="#33CC66" style="color:#fff;"><strong>Yes</strong></td>
              <td width="70" align="center" bgcolor="#33CC66" style="color:#fff;"><strong>No</strong></td>
            </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td width="50">&nbsp;</td>
              <td width="50">&nbsp;</td>
            </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Not done :</td>
              <td width="70" align="center">
                <?php calSumRPRTest($db,$tbf,'obstetric','rpr','0','1');?>
              </td>
              <td width="50" align="center"><?php calSumRPRTest($db,$tbf,'obstetric','rpr','0','1');?></td>
            </tr>
            <tr>
              <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Done but no result :</td>
              <td align="center"><?php calSumRPRTest($db,$tbf,'obstetric','rpr','1','1');?></td>
              <td align="center"><?php calSumRPRTest($db,$tbf,'obstetric','rpr','1',0);?></td>
            </tr>
            <tr>
              <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Result negative :</td>
              <td align="center"><?php calSumRPRTest($db,$tbf,'obstetric','rpr','2','1');?></td>
              <td align="center"><?php calSumRPRTest($db,$tbf,'obstetric','rpr','2',0);?></td>
            </tr>
            <tr>
              <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Result positive :</td>
              <td align="center"><?php calSumRPRTest($db,$tbf,'obstetric','rpr','3','1');?></td>
              <td align="center"><?php calSumRPRTest($db,$tbf,'obstetric','rpr','3',0);?></td>
            </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" align="left" style="color:#063;">Birth defects by maternal age</td>
        </tr>
        <tr>
          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
            <tr>
              <td rowspan="2" align="center" bgcolor="#009966" style="padding-left:10px; padding-right:10px; color:#FFF;"><strong>Age (yr.)</strong></td>
              <td height="30" colspan="2" align="center" bgcolor="#009966" style="color:#fff;"><strong>Birth defects</strong></td>
            </tr>
            <tr>
              <td height="30" align="center" bgcolor="#33CC66" style="color:#fff;"><strong>Yes</strong></td>
              <td width="70" align="center" bgcolor="#33CC66" style="color:#fff;"><strong>No</strong></td>
            </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td width="50">&nbsp;</td>
              <td width="50">&nbsp;</td>
            </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">&lt; 18 :</td>
              <td width="70" align="center"><?php calBDF($db,$tbf,1,1);?></td>
              <td width="50" align="center"><?php calBDF($db,$tbf,1,0);?></td>
            </tr>
            <tr>
              <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">18 - 19 :</td>
              <td align="center"><?php calBDF($db,$tbf,2,1);?></td>
              <td align="center"><?php calBDF($db,$tbf,2,0);?></td>
            </tr>
            <tr>
              <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">20 - 34 :</td>
              <td align="center"><?php calBDF($db,$tbf,3,1);?></td>
              <td align="center"><?php calBDF($db,$tbf,3,0);?></td>
            </tr>
            <tr>
              <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">&gt;= 35 :</td>
              <td align="center"><?php calBDF($db,$tbf,4,1);?></td>
              <td align="center"><?php calBDF($db,$tbf,4,0);?></td>
            </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" align="left" style="color:#063;">Immunisation &amp; Supplements</td>
        </tr>
        <tr>
          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
            <tr>
              <td align="center" bgcolor="#009966" style="padding-left:10px; padding-right:10px; color:#FFF;">&nbsp;</td>
              <td width="70" height="30" align="center" bgcolor="#009966" style="color:#fff;"><strong>n</strong></td>
              </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td width="70">&nbsp;</td>
              </tr>
            <tr>
              <td height="25" align="left" style="padding-left:10px; padding-right:10px;">BCG dose :</td>
              <td width="70" align="center"><?php calSumImmune($db,$tbf,'other_postnatal','bcg');?></td>
              </tr>
            <tr>
              <td height="1" colspan="2" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">OPV dose :</td>
              <td align="center"><?php calSumImmune($db,$tbf,'other_postnatal','polio');?></td>
              </tr>
            <tr>
              <td height="1" colspan="2" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
            </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
          </table></td>
        </tr>
      </table>
<br />
      <br />
    <br /></td>
    <td align="left" valign="top" style="color:#063;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" align="left" style="color:#063;">Maternal age </td>
        </tr>
        <tr>
          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
            
              <tr style="color:#FFF;">
        <td bgcolor="#009966" style="padding-left:10px; padding-right:10px;"><strong>Age group (yr.)</strong></td>
        <td width="50" height="30" align="center" bgcolor="#009966"><strong>n</strong></td>
        <td width="50" align="center" bgcolor="#009966"><strong>%</strong></td>
              </tr>
        <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              </tr>
            <tr>
              <td width="250" height="25" style="padding-left:10px; padding-right:10px;">Younger than 18 yr. :</td>
              <td align="center"><?php calMA($db,$tbf,1);?></td>
              <td align="center"><?php calMAPercent($db,$tbf,1);?></td>
              </tr>
              <tr>
              <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">18 - 19 yr :</td>
              <td align="center"><?php calMA($db,$tbf,2);?></td>
              <td align="center"><?php calMAPercent($db,$tbf,2);?></td>
              </tr>
              <tr>
              <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">20 - 34 yr :</td>
              <td align="center"><?php calMA($db,$tbf,3);?></td>
              <td align="center"><?php calMAPercent($db,$tbf,3);?></td>
              </tr>
              <tr>
              <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">35 yr and older :</td>
              <td align="center"><?php calMA($db,$tbf,4);?></td>
              <td align="center"><?php calMAPercent($db,$tbf,4);?></td>
              </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
              </tr>
          </table></td>
        </tr>
      </table>
      <br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" align="left" style="color:#063;">Delivery by mode of delivery (Total delivery n = 
		  <?php print calSumDelivery($db,$tbf);?>)</td>
        </tr>
        <tr>
          <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
            <tr style="color:#FFF;">
              <td bgcolor="#009966" style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td width="50" height="30" align="center" bgcolor="#009966"><strong>n</strong></td>
              <td width="50" align="center" bgcolor="#009966"><strong>%</strong></td>
              </tr>
            <tr>
              <td height="1" colspan="3" bgcolor="#CCCCCC" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td align="center">&nbsp;</td>
              <td align="center">&nbsp;</td>
              </tr>
            <tr>
              <td width="250" height="25" style="padding-left:10px; padding-right:10px;">Normal delivery :</td>
              <td align="center"><?php print calSumDeliverySub($db,$tbf,'mode_del',1);?></td>
              <td align="center"><?php print calSumDeliverySubPercent($db,$tbf,'mode_del',1);?></td>
              </tr>
              <tr>
              <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">V/E :</td>
              <td align="center"><?php print calSumDeliverySub($db,$tbf,'mode_del',2);?></td>
              <td align="center"><?php print calSumDeliverySubPercent($db,$tbf,'mode_del',2);?></td>
              </tr>
              <tr>
              <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">F/E :</td>
              <td align="center"><?php print calSumDeliverySub($db,$tbf,'mode_del',3);?></td>
              <td align="center"><?php print calSumDeliverySubPercent($db,$tbf,'mode_del',3);?></td>
              </tr>
              <tr>
              <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">C/S :</td>
              <td align="center"><?php print calSumDeliverySub($db,$tbf,'mode_del',4);?></td>
              <td align="center"><?php print calSumDeliverySubPercent($db,$tbf,'mode_del',4);?></td>
              </tr>
              <tr>
              <td height="1" colspan="3" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
            <tr>
              <td height="25" style="padding-left:10px; padding-right:10px;">Vaginal breech :</td>
              <td align="center"><?php print calSumDeliverySub($db,$tbf,'mode_del',5);?></td>
              <td align="center"><?php print calSumDeliverySubPercent($db,$tbf,'mode_del',5);?></td>
              </tr>
            <tr>
              <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
              <td colspan="2">&nbsp;</td>
              </tr>
          </table></td>
        </tr>
    </table>
    <br />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30" align="left" style="color:#063;">Alive status by fetal weight</td>
        </tr>
      <tr>
        <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
          <tr style="color:#FFF;">
            <td width="100" rowspan="2" align="center" bgcolor="#33CC66"><strong>Weight<br />
              category</strong></td>
            <td width="100" rowspan="2" align="center" bgcolor="#33CC66"><strong>Total birth</strong></td>
            <td width="100" rowspan="2" align="center" bgcolor="#33CC66"><strong>Livebirth</strong></td>
            <td height="35" colspan="3" align="center" bgcolor="#009966"><strong>Stillborn</strong></td>
            <td width="100" rowspan="2" align="center" bgcolor="#33CC66"><strong>Neonatal<br />
              death</strong></td>
            <td width="100" rowspan="2" align="center" bgcolor="#33CC66"><strong>Alive on <br />
              discharge</strong></td>
          </tr>
          <tr>
            <td width="80" height="35" align="center" bgcolor="#E8F3F9">Fresh</td>
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
            <td height="1" colspan="8" align="left" bgcolor="#F4F4F4" style="padding-left:10px;"></td>
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
            <td height="1" colspan="8" align="left" bgcolor="#F4F4F4" style="padding-left:10px;"></td>
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
            <td height="1" colspan="8" align="left" bgcolor="#F4F4F4" style="padding-left:10px;"></td>
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
            <td height="1" colspan="8" align="left" bgcolor="#F4F4F4" style="padding-left:10px;"></td>
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
            <td height="1" colspan="8" align="left" bgcolor="#F4F4F4" style="padding-left:10px;"></td>
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
    </table>
    <br />
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="30" align="left" style="color:#063;">HIV status</td>
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
            <td width="50" align="center">
              <?php calSumHIVTEst($db,$tbf,'obstetric','hiv_retest','0');?>
            </td>
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
        <td height="30" align="left" style="color:#063;">PMTCT</td>
      </tr>
      <tr>
        <td height="30"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.8em; color:#666; border:solid; border-color:#999; border-width:1px;">
          <tr style="color:#FFF;">
            <td height="30" bgcolor="#009966" style="padding-left:10px; padding-right:10px;">ART</td>
            <td width="50" align="center" bgcolor="#009966"><strong>n (%)</strong></td>
          </tr>
          <tr>
            <td height="1" colspan="2" bgcolor="#CCCCCC" style="padding-left:10px; padding-right:10px;"></td>
          </tr>
          <tr>
            <td style="padding-left:10px; padding-right:10px;">&nbsp;</td>
            <td align="center">&nbsp;</td>
          </tr>
          <tr>
            <td width="250" height="25" style="padding-left:10px; padding-right:10px;">AZT before labour :</td>
            <td align="center"><?php calSumImmune2($db,$tbf,'delivery','m_art1');?></td>
          </tr>
          <tr>
              <td height="1" colspan="2" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">NVP in labour :</td>
            <td align="center"><?php calSumImmune2($db,$tbf,'delivery','m_art2');?></td>
          </tr>
          <tr>
              <td height="1" colspan="2" bgcolor="#F3F3F3" style="padding-left:10px; padding-right:10px;"></td>
              </tr>
          <tr>
            <td height="25" style="padding-left:10px; padding-right:10px;">Travuda after delivery :</td>
            <td align="center"><?php calSumImmune2($db,$tbf,'delivery','m_art3');?></td>
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
