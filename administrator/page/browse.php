<script>
$(function(){

	$('#confirmBtn').click(function(){
		$.post( "confirmStatusParameter.php", function( data ) {
			  $("#checkbox" ).html( data );
		});
	});
	
}); 
</script>
<form name="listForm" id="listForm" method="post" action="confirmStatusParameter.php">
<input type="checkbox" name="checkboxStat" id="checkboxStat" /> Check all&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="button" id="button" value="Confirm selected item" />
<div style="width:100%; position:; overflow:scroll; width:800px; overflow-y:auto; padding-top:10px; ">
                  <table  border="0" cellspacing="0" cellpadding="0" style="width:1300px;">
                    <tr style="color:#FFF;" >
                      <td height="30" width="30" style="background-color:#066; padding-left:10px;" align="left">No</td>
                      <td  width="60" style="background-color:#066; padding-left:10px;" align="left">&nbsp;</td>
                     
                      <td width="80" style="background-color:#066; padding-left:10px;" align="left">Var</td> 
                      <td  width="50" style="background-color:#066; padding-left:10px;" align="left">Status</td>
                      <td  width="50" style="background-color:#066; padding-left:10px;" align="left">Confirm?</td>
                      <td width="200" style="background-color:#066; padding-left:10px;" align="left">Title</td>
                      <td width="50" style="background-color:#066; padding-left:10px;" align="left">Required</td>
                      <td  width="200" style="background-color:#066; padding-left:10px;" align="left">Input type</td>
                       <td width="50" style="background-color:#066; padding-left:10px;" align="left">Ordering</td>
                      <td width="150" style="background-color:#066; padding-left:10px;" align="left">Dafault value</td>
                      
                      
                      
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
                      <td height="26" align="right" valign="top" style="padding-right:10px;">
                      <?php if($v['pi_confirm']==0){ ?> 
                      <input type="checkbox" name="checkbox[]" id="checkbox[]" value="<?php print $v['pi_id'];?>" class="ckb" /> 
					  <?php }else{ }?>
                      <?php print $c;?></td>
                      <td align="left" valign="top" style="padding-left:10px;">
                      <a href="main.php?id=1&an=<?php print $v['pi_id'];?>&group_id=<?php print $_GET['group_id'];?>&tab_id=5&com=view">
                          <img src="./../images/view_icon.png" width="20" height="20" title="View" />
                        </a>
                          <a href="main.php?id=1&an=<?php print $v['pi_id'];?>&group_id=<?php print $_GET['group_id'];?>&tab_id=5&com=edit">
                          <img src="./../images/edit.png" width="20" height="20" title="Edit" />
                          </a>
                          <a href="Javascript:confirmDel('delete.php?an=<?php print $v['0'];?>&part=parameter','delete')">
                          <img src="./../images/delete.png" width="20" height="20" title="Delete" />
                          </a>
                      </td>
                      
                      <td align="left" valign="top"  style="padding-left:10px;"><?php print $v['pi_var'];?></td>
                      <td align="left" valign="middle" style="padding-left:10px;"><?php if($v['pi_status']==0){ ?> <img src="./../images/nonActive.jpg" width="11" height="11" title="non-active" />  <?php }else{ ?> <img src="./../images/Active.jpg" width="11" height="11" title="active" />  
					  <?php }?></td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php if($v['pi_confirm']==0){ print "No";}else{ print "Yes";}?></td>
                      <td align="left" valign="top" style="padding-left:10px;"><span title="<?php print $v['pi_description'];?>" style="cursor:pointer;"><?php print $v['pi_title'];?></span></td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php if($v['pi_req_status']==0){ print "No";}else{ print "Yes";}?></td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php if($v['pi_input_type']==0){ print "Manual";}else{ print "Complete choice";}?></td>
                      <td align="left" valign="top" style="padding-left:10px;"><?php //print $v['pi_ordering'];?>
                      <a href="upscore.php?vid=<?php print $v['pi_id'];?>&follow=up" class="b">[U]</a>
                      <a href="upscore.php?vid=<?php print $v['pi_id'];?>&follow=down" class="b">[D]</a></td>
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
                  
  </div>
</form>