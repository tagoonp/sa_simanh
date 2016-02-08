<?php
$group_id = 0;
if(isset($_GET['group_id'])){
	$group_id = $_GET['group_id'];	
}else{
	//if($group_id!=1){
	?>
	<script>
    	alert('Parametor error!');
		window.location = './main.php?id=3&group_id=0';
    </script>
	<?php	
	//}	
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
                <td align="left" style="font-size:1.3em; padding:5px 0 5px 0;">Institute management</td>
              </tr>
              <tr>
                <td align="left" style="color:#099;">List of institute type.</td>
              </tr>
              <tr>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                        <td align="left" style="padding:5px 0 5px 0;">
                        	<a href="main.php?id=3&group_id=0&tab_id=1" class="b">Add institute</a>
                        </td>
                      </tr>
					<tr>
					  <td height="1" align="left" bgcolor="#EBEBEB" style="padding:0;"></td>
			  </tr>
			  <?php
			  
				//Select institute record
				$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE 1",mysql_real_escape_string("institute_type"));
				$resultInstituteType = $db->select($strSQL,false,true);
				
				if($resultInstituteType){
					foreach($resultInstituteType as $v){
					?>
					<tr>
                        <td align="left" style="padding:5px 0 5px 0;">
                        	<a href="main.php?id=3&group_id=<?php print $v['institute_type_id'];?>&tab_id=1" class="b"><?php print $v['institute_type_description'];?></a>
                        </td>
                      </tr>
					<tr>
					  <td height="1" align="left" bgcolor="#EBEBEB" style="padding:0;"></td>
			  </tr>
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
				
				if($group_id==0){
					
					if(isset($_GET['an'])){
						if($_GET['tab_id']==2){
							print "View institute information";
						}else{
							print "Edit institute information";
						}
							
					}else{
						print "Add new institute";	
					}	
				}
				
				$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE institute_type_id = '%s'",mysql_real_escape_string("institute_type"),mysql_real_escape_string($group_id));
				$resultGroupDesc = $db->select($strSQL,false,true);
				
				if($resultGroupDesc){
					print "Institute : ".$resultGroupDesc[0][1];	
				}
				?></strong>
                </td>
              </tr>
              <tr>
                <td align="left">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" height="350" valign="top">
                <?php
                if($group_id==0){
					if(isset($_GET['an'])){
						if($_GET['tab_id']==2){
							require "./page/view_institute.php";
						}else{
							require "./page/edit_institute.php";
						}
						
					 }else{
						 require "./page/add_new_institute.php";
					 }
                 
                    	
				}else{
					?>
                    <ul class="css_simple_tab">
                    <li class="<?php if($_GET['tab_id']==1){ print "css_simple_tab_li";}else{print ""; }?>"><a href="main.php?id=<?php print $_GET['id'];?>&group_id=<?php print $_GET['group_id'];?>&tab_id=1" rel="nofollow" hidefocus="">Browse</a></li>
                  <div class="css_simple_tab_detailed" style="display: <?php if($_GET['tab_id']==1){ print "block";}else{print "none"; }?>;">
                    <?php require "./page/browseInstitute.php"; ?>
                    </div>
					<script type="text/javascript">
                    $(".css_simple_tab").find("li").bind("click",function(){	// เมื่อเคลิกที่ แท็บ ใดๆ
                        var indexObj=$(".css_simple_tab").find("li").index(this);	// หาค่า ตำแหน่งแท็บนั้นๆ ที่คลิก เริ่มที่ 0
                        $(".css_simple_tab").find("li").attr("class","");	// กำหนด class ให้ว่าง สำหรับทุกๆ แท็บ	
                        $(this).attr("class","css_simple_tab_li");	 // กำหนด class สำหรับแท็บที่ถูกเลือก
                        $(".css_simple_tab_detailed").hide().eq(indexObj).show(); // แสดงแท็บที่เลือก และซ่อนแท็บอื่นๆ		
                    });
                </script>         
                  <?php
				}
				?>
                
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
