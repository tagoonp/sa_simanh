<?php
$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE institute_type in ('2','3')",
		  mysql_real_escape_string("institute")
);
$resultInstitute = $db->select($strSQL,false,true);

//$sdate = date('Y-m')."-01";
$sdate = "2014-09-01";
if(isset($_GET['sdate'])){
	$sdate = $_GET['sdate'];
	if($sdate==date('Y-m-d')){
		$sdate = date('Y-').(date('m')-1)."-01";	
	}
}

$edate = date('Y-m-d');
if(isset($_GET['edate'])){
	$edate = $_GET['edate'];
}

if($sdate==$edate){
		$sdate = date('Y-').(date('m')-1)."-01";	
}

$case = 0;
if(isset($_GET['case'])){
	if($_GET['case']!='')
		$case = $_GET['case'];	
}

$hospital = 0;
if(isset($_GET['hospital']))
	$hospital = $_GET['hospital'];

$query = 0;
if(isset($_GET['query']))
	$query = $_GET['query'];

$view = 0;
if(isset($_GET['view'])){
	$view = $_GET['view'];	
}
?>
<style>

</style>


<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="300" height="30" align="left" style="font-size:1.2em;">Simple graph</td>
        <td height="30" style="font-size:1.2em;" align="left">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" colspan="2" align="left" style="color:#666;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="30">Hospital / Institute :</td>
            </tr>
          <tr>
            <td>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <?php
				 
				if($resultInstitute){
					$d = 1;
					$c = 0;
						foreach($resultInstitute as $v){
							if($d==1){
								print "<tr>";
							}
							?>
                
                <?php
							print "<td>";
							?>
                <input type="checkbox" name="checkbox_<?php print $v['institute_id'];?>" id="checkbox_<?php print $c;?>" class="cb" 
                <?php
                if(isset($_GET['hospital'])){
					$vHos = explode('|',$_GET['hospital']);
					foreach($vHos as $vs){
						if($vs==$v['institute_id']){
							print "checked=checked";	
						}	
					}
				}else{
					print "checked=checked";	
				}
				?> value="<?php print $v['institute_id'];?>" />
                <?php print $v['institute_name']."</td>";
							
							$d++;
							if($d==4){
								print "</tr>";
								$d = 1;
							}
							$c++;
						}	
						
				}
				?>
                <tr>
                  <td></td>
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
        <td height="40" valign="middle" bgcolor="#006666" style="padding-right:10px; padding-left:10px; color:#fff;">Graph panel</td>
        <td align="left" valign="top" bgcolor="#006666">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2" valign="top" style="padding-right:0px;" id="gtd">
        <?php
		//Sum all value
		//Query -> query type daily / monthly
		//View -> all / splite by hospital
		//Case -> Complication summary
		//Hospital -> hospital list
        if(isset($_GET['view'])){		
			if($_GET['query']==0){//<------- daily
				if($_GET['view']==0){//<------- All
				?>
				<img src="./graph/simple.php?sdate=<?php print $_GET['sdate'];?>&edate=<?php print $edate;?>
                &graphType=<?php print $_GET['query'];?>&hospital=<?php print $hospital;?>&case=<?php print $_GET['case'];?>&view=<?php print $_GET['view'];?>&gtd=<?php print $_GET['gtd'];?>&dis=<?php print $_GET['dis'];?>" />
				<?php
				}else if($_GET['view']==1){	//<------- Splite by hospital
				?>
				<img src="./graph/simple_splite_hospital.php?sdate=<?php print $_GET['sdate'];?>&edate=<?php print $edate;?>
                &graphType=<?php print $_GET['query'];?>&hospital=<?php print $hospital;?>&case=<?php print $_GET['case'];?>&view=<?php print $_GET['view'];?>&gtd=<?php print $_GET['gtd'];?>&dis=<?php print $_GET['dis'];?>" />
				<?php
				}
			}else{//<- Monthly
				//if($_GET['view']==0){//<------- All hospital
				?>
				<img src="./graph/adv_age.php?sdate=<?php print $_GET['sdate'];?>&edate=<?php print $edate;?>
                &graphType=<?php print $_GET['query'];?>&hospital=<?php print $hospital;?>&case=<?php print $_GET['case'];?>&view=<?php print $_GET['view'];?>&gtd=<?php print $_GET['gtd'];?>&dis=<?php print $_GET['dis'];?>" />
				<?php
				//}
			}
				
		}
		?>
        </td>
        </tr>
    </table></td>
    <td width="250" align="left" valign="top" style="width:fixed; padding-left:20px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="35" align="left" valign="bottom"><span style="padding-right:10px;">Start :</span></td>
      </tr>
      <tr>
        <td height="35" align="left"><input type="date" name="sdate" id="sdate" style="height:30px; width:90%; padding-left:10px; border:solid; border-color:#CCC; border-width:1px; border-radius:5px;" value="<?php print $sdate; ?>" /></td>
      </tr>
      <tr>
        <td height="24" align="left" valign="bottom"><span style="padding-right:10px;">End :</span></td>
      </tr>
      <tr>
        <td height="35" align="left"><input type="date" name="edate" id="edate" style="height:30px; width:90%; padding-left:10px; border:solid; border-color:#CCC; border-width:1px; border-radius:5px;" value="<?php print $edate; ?>" /></td>
      </tr>
      <tr>
        <td height="24" align="left" valign="bottom">By :</td>
      </tr>
      <tr> 
        <td height="35" align="left"><select name="query" id="query" style="height:30px; width:90%; padding-left:10px; border:solid; border-color:#CCC; border-width:1px; border-radius:5px;">
          <option value="0">Age group</option>
          </select></td>
      </tr>
		<tr>
		  <td height="24" align="left" valign="bottom"><span style="padding-right:10px;">Graph category :</span></td>
	    </tr>
      <tr>
        <td height="35" align="left"><select name="insts" id="insts" style="height:30px; width:90%; padding-left:10px; border:solid; border-color:#CCC; border-width:1px; border-radius:5px;">
          <option value="" selected="selected">------ Select graph category ------</option>
          <option value="1" <?php if($case==1){ print "selected";}?>>Admitted</option>
          <option value="2" <?php if($case==2){ print "selected";}?>>Delivery</option>
          <option value="3" <?php if($case==3){ print "selected";}?>>Birth</option>
          <option value="4" <?php if($case==4){ print "selected";}?>>Livebirth</option>
          <optgroup label="Complication in labour">
            <option value="5" <?php if($case==5){ print "selected";}?>>Induction of labour</option>
            <option value="6" <?php if($case==6){ print "selected";}?>>Antepartum haemorrhage</option>
            <option value="7" <?php if($case==7){ print "selected";}?>>Postpartum haemorrhage</option>
            <option value="8" <?php if($case==8){ print "selected";}?>>Severe pre eclampsia</option>
            <option value="9" <?php if($case==9){ print "selected";}?>>Eclampsia</option>
            <option value="10" <?php if($case==10){ print "selected";}?>>Prolonged rupture of membranes</option>
            <option value="11" <?php if($case==11){ print "selected";}?>>Ruptured uterus</option>
            <option value="12" <?php if($case==12){ print "selected";}?>>Sepsis</option>
            <option value="13" <?php if($case==13){ print "selected";}?>>Obstructed or prolonged labour</option>
            <option value="14" <?php if($case==14){ print "selected";}?>>Retained placenta</option>
            <option value="15" <?php if($case==15){ print "selected";}?>>Manual removal of placenta</option>
            <option value="16" <?php if($case==16){ print "selected";}?>>Maternal death</option>
            <option value="17" <?php if($case==17){ print "selected";}?>>Stillbirth</option>
            <option value="18" <?php if($case==18){ print "selected";}?>>Neonatal death</option>
            <option value="19" <?php if($case==19){ print "selected";}?>>Preterm birth</option>
            <option value="20" <?php if($case==20){ print "selected";}?>>Low birth weight</option>
            </optgroup>
          <optgroup label="Complication at postnatal">
            <option value="21" <?php if($case==21){ print "selected";}?>>Postpartum haemorrhage</option>
            <option value="22" <?php if($case==22){ print "selected";}?>>Postpartum eclampsia</option>
            <option value="23" <?php if($case==23){ print "selected";}?>>Postpartum sepsis</option>
            <option value="24" <?php if($case==24){ print "selected";}?>>Postpartum maternal death</option>
            </optgroup>
        </select></td>
      </tr>
      <tr>
        <td height="35" align="left"><input name="showVal" type="checkbox" id="showVal" value="1" <?php
        if(isset($_GET['dis'])){
			if($_GET['dis']==1){
				?>checked="checked"<?php	
			}
		}else{
			?>checked="checked"<?php	
		}
		?> />
          Show bar value</td>
      </tr>
      
      <tr>
        <td height="35" align="left" valign="bottom"><input type="button" name="view_btn5" id="view_btn5" value="View" style="background-color:#3C9; color:#FFF; border:none; border-radius:3px; cursor:pointer; width:60px; height:28px; font-weight:bold;" /></td>
      </tr>
    </table></td>
  </tr>
</table>
<br />
