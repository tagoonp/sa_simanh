
<input type="checkbox" name="checkboxStat" id="checkboxStat" /> Check all&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[ Confirm selected item ]
&nbsp;[ Toggle selected item status ]

<div style="width:100%; position:; overflow:scroll; width:800px; overflow-y:auto; padding-top:10px; ">
<form>
                  <table  border="0" cellspacing="0" cellpadding="0" style="width:1300px;">
                    <tr style="color:#FFF;" >
                      <td height="30" width="50" style="background-color:#066; padding-left:10px;" align="left">No</td>
                      <td width="80" style="background-color:#066; padding-left:10px;" align="left">Var</td>
                      <td width="200" style="background-color:#066; padding-left:10px;" align="left">Title</td>
                      <td width="50" style="background-color:#066; padding-left:10px;" align="left">Required</td>
                      <td  width="200" style="background-color:#066; padding-left:10px;" align="left">Input type</td>
                      
                      <?php
                      if(isset($_GET['sub_id'])){
						 ?>
                         <td width="50" style="background-color:#066; padding-left:10px;" align="left">Ordering</td>
                         <?php
                         }
					  ?>
                      <td width="150" style="background-color:#066; padding-left:10px;" align="left">Dafault value</td>
                      <td  width="50" style="background-color:#066; padding-left:10px;" align="left">Confirm?</td>
                      <td  width="50" style="background-color:#066; padding-left:10px;" align="left">Status</td>
                      <td  width="200" style="background-color:#066; padding-left:10px;" align="left">&nbsp;</td>
                    </tr>
                    <tr>
                    	<td colspan="11" height="1" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tbody class="tbd">
                    
                    <?php
                    $strSQL = "SELECT * FROM `db_simanh`.`".substr(strtolower($tbf),0,-2)."parameter_index` WHERE pi_group = '00".$_GET['group_id']."' $sid order by pi_ordering";
					$reultList = $db->select($strSQL,false,true);
					if($reultList){
						$c = 1;
						foreach($reultList as $v){
							?>
					<tr>
                      <td height="26" align="left" valign="top" style="padding-left:5px;">
                      <?php if($v['pi_confirm']==0){ ?> 
                      <input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?php print $v['pi_id'];?>" class="ckb" /> 
					  <?php }else{ }?>
                      <?php print $c;?></td>
                      <td align="left" valign="top"  style="padding-left:10px;"><?php print $v['pi_var'];?></td>
                      <td align="left" valign="top" style="padding-left:10px;"><span title="<?php print $v['pi_description'];?>" style="cursor:pointer;"><?php print $v['pi_title'];?></span></td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php if($v['pi_req_status']==0){ print "No";}else{ print "Yes";}?></td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php if($v['pi_input_type']==0){ print "Manual";}else{ print "Complete choice";}?></td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php //print $v['pi_ordering'];?>
                      <a href="upscore.php?vid=<?php print $v['pi_id'];?>&follow=up" class="b">[U]</a>
                      <a href="upscore.php?vid=<?php print $v['pi_id'];?>&follow=down" class="b">[D]</a></td>
                      <?php
                      if(isset($_GET['sub_id'])){
						 ?>
					  <td align="left" valign="top" style="padding-left:10px;"><?php //print $v['pi_ordering'];?>
                      <a href="upscore.php?vid=<?php print $v['pi_id'];?>&follow=up" class="b">[U]</a>
                      <a href="upscore.php?vid=<?php print $v['pi_id'];?>&follow=down" class="b">[D]</a></td>
						 <?php 
					  }else{
						 $strSQL = "SELECT * FROM parameter_index WHERE pi_group = '".$_GET['group_id']."' and pi_subgroup = '000'" ;
						 $resultSubg = $db->select($strSQL,false,true);
						 if(!$resultSubg){
							?>
							 <td align="left" valign="top" style="padding-left:10px;"><?php //print $v['pi_ordering'];?>
                      <a href="upscore.php?vid=<?php print $v['pi_id'];?>&follow=up" class="b">[U]</a>
                      <a href="upscore.php?vid=<?php print $v['pi_id'];?>&follow=down" class="b">[D]</a></td>
							<?php	 
						 }
					  }
					  ?>
                      <td align="left" valign="top" style="padding-left:10px;">&nbsp;</td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php if($v['pi_confirm']==0){ print "No";}else{ print "Yes";}?></td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php if($v['pi_status']==0){ print "Disabled";}else{ print "Active";}?></td>
                      <td align="left" valign="top" style="padding-left:10px;">&nbsp;</td>
                    </tr>
							<?php
							$c++;
						}	
					}
					?>
                    </tbody>
                    <tr>
                    	<td colspan="11" height="20"></td>
                    </tr>
                  </table>
                  </form>
                </div>
