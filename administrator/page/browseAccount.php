<div style="width:100%; position:; overflow:scroll; width:800px; overflow-y:auto; min-height:300px; ">
                  <table  border="0" cellspacing="0" cellpadding="0" style="width:1300px;">
                    <tr style="color:#FFF;" >
                      <td height="30" width="50" style="background-color:#066; padding-left:10px;" align="left">No</td>
                      <td width="100" style="background-color:#066; padding-left:10px;" align="left">Username</td>
                      <td width="200" style="background-color:#066; padding-left:10px;" align="left">Full name</td>
                      <td  width="150" style="background-color:#066; padding-left:10px;" align="left">Institute</td>
                      <td  width="200" style="background-color:#066; padding-left:10px;" align="left">Email</td>
                      <td  width="100" style="background-color:#066; padding-left:10px;" align="left">Phone number</td>
                      <td  width="100" style="background-color:#066; padding-left:10px;" align="left">Confirm status</td>
                      <td  width="100" style="background-color:#066; padding-left:10px;" align="left"></td>
                    </tr>
                    <tr>
                    	<td colspan="11" height="1" bgcolor="#CCCCCC"></td>
                    </tr>
                    <tbody class="tbd">
                    <?php
                    $strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."useraccount a 
					inner join ".substr(strtolower($tbf),0,-2)."userdescription b
					on a.username = b.username WHERE a.user_type_id = %s",
					mysql_real_escape_string($group_id));
					$reultList = $db->select($strSQL,false,true);
					if($reultList){
						$c = 1;
						foreach($reultList as $v){
							?>
					<tr>
                      <td height="26" align="left" valign="top" style="padding-left:12px;">
                      <?php print $c;?></td>
                      <td align="left" valign="top"  style="padding-left:10px;"><?php print $v['username'];?></td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php print $v['fname']." ".$v['lname'];?></td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php 
					  $strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."institute WHERE institute_id = '".$v['institute_id']."'";
					  $resultInst = $db->select($strSQL,false,true);
					  if($resultInst){
						print $resultInst[0][1];	  
					  }
					  ?></td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php print $v['email']?></td>
                          <td align="left" valign="top" style="padding-left:10px;"><?php print $v['phone']?></td>
                          <td align="left" valign="top" style="padding-left:10px;"><?php 
                          if($v['status']==0){ 
						  		print "No ";
								if($v['user_type_id']!=1){
									?><a href="Javascript:confirmDel('active.php?part=account&to=1&an=<?php print $v['username'];?>','active')" class="b">[ Active ]</a><?php
								}
								
						  }else{
							  	print "yes ";
								if($v['user_type_id']!=1){
									?><a href="Javascript:confirmDel('active.php?part=account&to=0&an=<?php print $v['username'];?>','de-active')" class="b">[ Disable ]</a><?php
								}
								
						  }
                          ?></td>
                          <td align="center" valign="top" style="padding-left:10px;">
                          <?php
                          if($v['user_type_id']!=1){
							?>
							<a href="main.php?id=2&an=<?php print $v['username'];?>&group_id=0&tab_id=2">
                          <img src="./../images/view_icon.png" width="20" height="20" title="View" />
                          </a>
                          <a href="main.php?id=2&an=<?php print $v['username'];?>&group_id=0&tab_id=1">
                          <img src="./../images/edit.png" width="20" height="20" title="Edit" />
                          </a>
                          <a href="Javascript:confirmDel('delete.php?an=<?php print $v['username'];?>&part=account','delete')">
                          <img src="./../images/delete.png" width="20" height="20" title="Delete" />
                          </a>
							<?php	  
						  }
						  ?>
                          
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
