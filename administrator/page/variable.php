<?php
					$sid = '';
					if(isset($_GET['sub_id'])){
						$sid = "and pi_subgroup = '".$_GET['sub_id']."'";
					}
					?>
					<script>
		$(function() {
			$('#setting_type').change(function(){
				if($('#setting_type').val()==0){
					$('.ct1').show();
					$('.ct2').hide();
					$('.ct3').hide();
				}else{
					$('.ct1').hide();
					$('.ct2').show();
				}
			});
			
			$('#req_status').change(function(){
				if($('#req_status').val()==1){
					$('.rq1').show();
				}else{
					$('.rq1').hide();
				}
			});
			
			$('#input_type').change(function(){
				if(($('#input_type').val()==7) || ($('#input_type').val()==8)){
					$('.ct3').show();
				}else{
					$('.ct3').hide();
				}
			});
			
			$("#checkboxStat").click(function () {
				if ($("#checkboxStat").is(':checked')) {
					$(".ckb").prop("checked", true);
				} else {
					$(".ckb").prop("checked", false);
				}
			});
			
		});
</script>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="50" align="left" bgcolor="#E5E5E5" style="padding:0px 15px 0 15px; color:#999; font-size:1.0em;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50">&nbsp;</td>
            <td align="left"><span style="font-size:0.8em;">Welcome to SIMANH administrator panel + Admin theme</span></td>
            <td align="right" valign="bottom" style="font-size:0.8em;">&nbsp;</td>
            <td width="100">&nbsp;</td>
            <td width="100" align="right"><strong><a href="signout.php" class="b">Log out</a></strong></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="5" bgcolor="#DFDFDF"></td>
      </tr>
      <tr>
        <td height="300" align="left" valign="top" bgcolor="#FFFFFF" class="paddingTable"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="200" style="color:#666;" valign="top">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-size:0.9em;">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left" style="font-size:1.3em; padding:5px 0 5px 0;">Management variable</td>
              </tr>
              <tr>
                <td align="left" style="color:#099;">List of entry part.</td>
              </tr>
              <tr>
                <td align="left">&nbsp;</td>
              </tr>
			  <?php
               	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."parameter_group WHERE 1";
				$resultInstituteType = $db->select($strSQL,false,true);
				
				if($resultInstituteType){
					foreach($resultInstituteType as $v){
					?>
					<tr>
                        <td align="left" style="padding:5px 0 5px 0;">
                        	<a href="main.php?id=1&group_id=<?php print $v['pg_id'];?>&tab_id=1" class="d"><?php print $v['pg_title'];?></a> 
                        </td>
                    </tr>
                    <tr>
					  <td height="1" align="left" bgcolor="#EBEBEB" style="padding:0;"></td>
			  		</tr>
                      	<?php 
						$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."parameter_subgroup WHERE sg_group = '".$v['pg_id']."'";
						$resultSubgroup = $db->select($strSQL,false,true);
						if($resultSubgroup){
							$j = 1;
							foreach($resultSubgroup as $sg){
								?>
								<tr>
                                  <td align="left" valign="top" style="padding-left:20px; padding-right:5px; padding-top:3px; padding-bottom:3px; color:#999">
                                  <a href="main.php?id=1&group_id=<?php print $v['pg_id'];?>&tab_id=1&sub_id=<?php print $sg['sg_id'];?>" class="b"><?php print $j.") "; print $sg['sg_name'];?></a>
                                  </td>
                                </tr>
                                <tr>
                                  <td height="1" align="left" bgcolor="#EBEBEB" style="padding:0;"></td>
                                </tr>
								<?php
								$j++;
							}
						}
						?>
                      
					
					<?php	
					}	
				} 
     		  ?>
              
            </table></td>
            <td  align="left" valign="top" style="padding-left:20px;"><table width="100%" border="0" cellspacing="0" cellpadding="0"  style="font-size:0.9em; color:#333">
              <tr>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td align="left"  style="font-size:1.3em; padding:5px 0 5px 0; color:#333;"><strong>
                <?php
                $strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."parameter_group WHERE pg_id = '".$_GET['group_id']."'";
				$resultGroupDesc = $db->select($strSQL,false,true);
				
				if($resultGroupDesc){
					print $resultGroupDesc[0][1];	
				}
				?></strong>
                </td>
              </tr>
              <tr>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" >
                <ul class="css_simple_tab">
                    <li class="<?php if($_GET['tab_id']==1){ print "css_simple_tab_li";}else{print ""; }?>"><a href="main.php?id=<?php print $_GET['id'];?>&group_id=<?php print $_GET['group_id'];?>&tab_id=1<?php if(isset($_GET['sub_id'])){ ?>&sub_id=<?php print $_GET['sub_id']; } ?>" rel="nofollow" hidefocus="">Browse</a></li>
                    <li class="<?php if($_GET['tab_id']==2){ print "css_simple_tab_li";}else{print ""; }?>"><a href="main.php?id=<?php print $_GET['id'];?>&group_id=<?php print $_GET['group_id'];?>&tab_id=2<?php if(isset($_GET['sub_id'])){ ?>&sub_id=<?php print $_GET['sub_id']; } ?>" rel="nofollow" hidefocus="">Structure</a></li>
                    <?php 
					if(!isset($_GET['sub_id'])){
						?>
						<li class="<?php if($_GET['tab_id']==3){ print "css_simple_tab_li";}else{print ""; }?>"><a href="main.php?id=<?php print $_GET['id'];?>&group_id=<?php print $_GET['group_id'];?>&tab_id=3<?php if(isset($_GET['sub_id'])){ ?>&sub_id=<?php print $_GET['sub_id']; } ?>" rel="nofollow" hidefocus="">Add subgroup</a></li>
						<?php
					}?>
                    
                    <li class="<?php if($_GET['tab_id']==4){ print "css_simple_tab_li";}else{print ""; }?>"><a href="main.php?id=<?php print $_GET['id'];?>&group_id=<?php print $_GET['group_id'];?>&tab_id=4<?php if(isset($_GET['sub_id'])){ ?>&sub_id=<?php print $_GET['sub_id']; } ?>" rel="nofollow" hidefocus="">Insert new parameter</a></li>
               </ul>
               <?php
               if($_GET['tab_id']==5){
				   if($_GET['com']=='view'){
					   require_once "./page/view_parameter.php";
				   }else if($_GET['com']=='edit'){
					   require_once "./page/edit_parameter.php";
				   }else if($_GET['com']=='ac'){
					    require_once "./page/createChoice.php";
				   }else if($_GET['com']=='ec'){
					    require_once "./page/editChoice.php";
				   } 
			   }else{
				   ?>
				   <div class="css_simple_tab_detailed" style="display: <?php if($_GET['tab_id']==1){ print "block";}else{print "none"; }?>;">
                    <?php require_once "./page/browse.php"; ?>
                    </div>
                  <div class="css_simple_tab_detailed" style="display: <?php if($_GET['tab_id']==2){ print "block";}else{print "none"; }?>;">
                    <?php require_once "./page/structure.php"; ?>
                    </div> 
                    <?php 
					if(!isset($_GET['sub_id'])){
						?>
						<div class="css_simple_tab_detailed" style="display: <?php if($_GET['tab_id']==3){ print "block";}else{print "none"; }?>;">
                    <?php require_once "./page/add_subgroup.php"; ?>
                  </div> 
				   <?php
			   }
               ?>
                  
						<?php 
					}?>
                    
                  <div class="css_simple_tab_detailed" style="display: <?php if($_GET['tab_id']==4){ print "block";}else{print "none"; }?>;">
                    <?php require_once "./page/add_new_parameter.php"; ?>
                    </div>      
                  <script type="text/javascript">
                    $(".css_simple_tab").find("li").bind("click",function(){	// เมื่อเคลิกที่ แท็บ ใดๆ
                        var indexObj=$(".css_simple_tab").find("li").index(this);	// หาค่า ตำแหน่งแท็บนั้นๆ ที่คลิก เริ่มที่ 0
                        $(".css_simple_tab").find("li").attr("class","");	// กำหนด class ให้ว่าง สำหรับทุกๆ แท็บ	
                        $(this).attr("class","css_simple_tab_li");	 // กำหนด class สำหรับแท็บที่ถูกเลือก
                        $(".css_simple_tab_detailed").hide().eq(indexObj).show(); // แสดงแท็บที่เลือก และซ่อนแท็บอื่นๆ		
                    });
                </script>
                </td>
              </tr>
              <tr>
                <td>
                </td>
              </tr>
              <tr>
                <td align="left">
                
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center"><?php require "../lib/footer.php"; ?></td>
  </tr>
      <tr>
        <td align="center">&nbsp;</td>
      </tr>
    </table>
