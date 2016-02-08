<?php
$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE institute_type in ('2','3') and institute_id in (SELECT institute_id FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE username = '".$_SESSION['userSIMANHusername']."')",
		  mysql_real_escape_string("institute")
    );
// print $strSQL;
$resultInstitute = $db->select($strSQL,false,true);
?>
<table width="<?php
if($resultInstitute){
	print 280 + (100 * sizeof($resultInstitute));
}else{
	print "100%";
}
?>" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" style="font-size:1.2em;">Table of summary</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:0.9em; color:#666;">
      <tr>
        <td width="480" height="25" align="left" valign="top"><strong>Indicator</strong></td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left" valign="top" style="color:#069;"><?php print $v['institute_name'];?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left" valign="top"><strong><?php print "Total";?></strong></td> -->
      </tr>
      <tr>
        <td height="25">1. Total admitted</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calAdm($v['institute_id'],$db,$tbf);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php print calSumAdm($db,$tbf);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">2. Total delivery</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calDel($v['institute_id'],$db,$tbf);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php print calSumDel($db,$tbf);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">3. Total birth</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calBirth($v['institute_id'],$db,$tbf);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php print calSumBirth($db,$tbf);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">4. Total livebirth</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print callBirth($v['institute_id'],$db,$tbf);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php print calSumlBirth($db,$tbf);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">5. Refer in</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calRefer($v['institute_id'],$db,$tbf);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php print calSumRefer($db,$tbf);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="100">&nbsp;</td>
      </tr>
      <tr>
        <td height="25"><strong>Complications at labour</strong></td>
        <td width="100">&nbsp;</td>
        <td width="100">&nbsp;</td>
      </tr>
      <tr>
        <td height="25">1. Induction of labour</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,1);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,1);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">2. Antepartum haemorrhage</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,2);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,2);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">3. Postpartum haemorrhage</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,3);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,3);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">4. Severe pre eclampsia</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,4);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,4);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">5. Eclampsia</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,5);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,5);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">6. Prolonged rupture of membranes</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,6);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,6);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">7. Ruptured uterus</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,7);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,7);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">8. Sepsis</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,8);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,8);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">9. Obstructed or prolonged labour</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,9);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,8);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">10. Retained placenta</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,10);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,10);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">11. Manual removal of placenta</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,11);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,11);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">12. Maternal death</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,12);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,12);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">13. Stillbirth</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,13);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,13);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">14. Neonatal death</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,14);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,14);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">15. Preterm birth</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,15);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,15);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">16. Low birth weight</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplication($v['institute_id'],$db,$tbf,16);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplication2($db,$tbf,16);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td width="100">&nbsp;</td>
      </tr>
      <tr>
        <td height="25"><strong>Complications at postnatal</strong></td>
        <td width="100">&nbsp;</td><td width="100">&nbsp;</td>
      </tr>
      <tr>
        <td height="25">1. Postpartum haemorrhage</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplicationPost($v['institute_id'],$db,$tbf,1);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplicationPost($db,$tbf,1);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">2. Postpartum eclampsia</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplicationPost($v['institute_id'],$db,$tbf,2);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplicationPost($db,$tbf,2);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
        <tr>
        <td height="25">3. Postpartum sepsis</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplicationPost($v['institute_id'],$db,$tbf,3);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplicationPost($db,$tbf,3);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
      <tr>
        <td height="25">4. Postpartum maternal death</td>
        <?php
        if($resultInstitute){
			foreach($resultInstitute as $v){
				?><td width="100" align="left"><?php print calComplicationPost($v['institute_id'],$db,$tbf,4);?></td><?php
			}
		}
		?>
        <!-- <td width="100" align="left"><?php calSumComplicationPost($db,$tbf,4);?></td> -->
      </tr>
      <tr>
        <td height="1" colspan="<?php print (3 + sizeof($resultInstitute));?>" bgcolor="#CCCCCC"></td>
        </tr>
    </table></td>
  </tr>
</table>
