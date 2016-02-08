<?php
set_time_limit(0);
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
    <td width="300" height="30" align="left" style="font-size:1.2em;">Export data</td>
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
        </select></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" style="color:#063; padding-right:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0"
    style="font-size:0.9em;">
        <tr>
          <td width="50" align="left" style="padding-right:10px;">&nbsp;</td>
          <td height="50"><input type="button" name="view_btn6" id="view_btn6" value="Export" style="background-color:#3C9; color:#FFF; border:none; border-radius:3px; cursor:pointer; width:60px; height:28px; font-weight:bold; outline:none;" />
          <input type="button" name="view_btn7" id="view_btn7" value="Export data dictionary" style="background-color:#3C9; color:#FFF; border:none; border-radius:3px; cursor:pointer; width:160px; height:28px; font-weight:bold; outline:none;"  /></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" style="color:#063; padding-right:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="49%"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="30" align="left" style="color:#063;">&nbsp;</td>
          </tr>
          <tr>
            <td height="30">&nbsp;</td>
          </tr>
        </table></td>
        <td width="2%">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" style="color:#063; padding-right:10px;">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top" style="padding-right:10px;">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
