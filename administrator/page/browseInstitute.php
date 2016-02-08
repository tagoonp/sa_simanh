<div style="width:100%; position:; overflow:scroll; width:800px; overflow-y:auto; min-height:300px; ">
                  <table  border="0" cellspacing="0" cellpadding="0" style="width:1300px;">
                    <tr style="color:#FFF;" >
                      <td height="30" width="50" style="background-color:#066; padding-left:10px;" align="left">No</td>
                      <td width="150" style="background-color:#066; padding-left:10px;" align="left">Institute's name</td>
                      <td width="300" style="background-color:#066; padding-left:10px;" align="left">Description</td>
                      <td width="200" style="background-color:#066; padding-left:10px;" align="left">Phone number</td>
                      <td  width="250" style="background-color:#066; padding-left:10px;" align="left">Location</td>
                      <td  width="100" style="background-color:#066; padding-left:10px;" align="left">Confirm status</td>
                      <td  width="200" style="background-color:#066; padding-left:10px;" align="left">&nbsp;</td>
                    </tr>
                    <tr>
                    	<td colspan="11" height="1" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tbody class="tbd">
                    <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE institute_type = %s",mysql_real_escape_string("institute"),mysql_real_escape_string($group_id));
					$reultList = $db->select($strSQL,false,true);
					if($reultList){
						$c = 1;
						foreach($reultList as $v){
							?>
					<tr>
                      <td height="26" align="left" valign="top" style="padding-left:12px;">
                      <?php if($v['institute_status']==0){ ?>  <?php }else{ }?>
                      <?php print $c;?></td>
                      <td align="left" valign="top"  style="padding-left:10px;"><?php print $v['institute_name'];?></td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php print $v['institute_description'];?></td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php print $v['institute_phone'];?></td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php print $v['institute_latitute'].",".
					  $v['institute_longitude'];?></td>
                      <td align="left" valign="top" style="padding-left:10px;">
					  <?php 
					  if($v['institute_status']==0){ 
					  		print "No ";
							?><a href="Javascript:confirmDel('active.php?part=institute&to=1&an=<?php print $v['institute_id'];?>','active')" class="b">[ Active ]</a><?php
					  }else{
						  	print "yes ";
							?><a href="Javascript:confirmDel('active.php?part=institute&to=0&an=<?php print $v['institute_id'];?>','de-active')" class="b">[ Disable ]</a><?php
					  }
					  ?></td>
                      <td align="center" valign="top" style="padding-left:10px; padding-right:10px;">
                      <a href="main.php?id=3&an=<?php print $v['institute_id'];?>&group_id=0&tab_id=2&lat=<?php print $v['institute_latitute'];?>&lng=<?php print $v['institute_longitude']?>">
                          <img src="./../images/view_icon.png" width="20" height="20" title="View" />
                          </a>
                          <a href="main.php?id=3&an=<?php print $v['institute_id'];?>&group_id=0&tab_id=1&lat=<?php print $v['institute_latitute'];?>&lng=<?php print $v['institute_longitude']?>">
                          <img src="./../images/edit.png" width="20" height="20" title="Edit" />
                          </a>
                          <a href="Javascript:confirmDel('delete.php?an=<?php print $v['institute_id'];?>&part=institute','delete')">
                          <img src="./../images/delete.png" width="20" height="20" title="Delete" />
                          </a>
                      </td>
                    </tr>
                    <tr>
                    	<td colspan="11" height="1" bgcolor="#CCCCCC"></td>
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
                </div>
