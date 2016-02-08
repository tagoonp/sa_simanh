<?php
if(isset($_GET['an'])){
	$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."useraccount a 
					inner join ".substr(strtolower($tbf),0,-2)."userdescription b
					on a.username = b.username WHERE a.username = '%s'",
					mysql_real_escape_string($_GET['an']));
	$reultAccount = $db->select($strSQL,false,true);
	
	if($reultAccount){
		
	}else{
	?>
	<script>
    	alert('User information not found!');
		window.location = 'main.php?id=2&group_id=0&tab_id=1';
    </script>
	<?php
	exit();	
	}
}else{
	?>
	<script>
    	alert('Parameter error!');
		window.location = 'main.php?id=2&group_id=0&tab_id=1';
    </script>
	<?php
	exit();	
}
?>
<script>
$(function(){
	//Form submit validate function
	$('#addInstitute').submit(function(){
		var stat = 0;
		if($('#inst_name').val()==''){
			$('#req1').text("** Please enter institute's name");
			stat++;
		}else{
			$('#req1').text("");
		}
		
		if($('#inst_desc').val()==''){
			$('#req2').text("** Please enter institute's description");
			stat++;
		}else{
			$('#req2').text("");
		}
		
		if(stat!=0){
			alert('Please enter some required filed!');
			$('#inst_name').focus();
			return false;	
		}
	});
	
	$('#cancelbutton').click(function(){
		window.history.back();
	});
}); 
</script>
<div style="width:100%; position:; width:800px; overflow-y:hidden; ">
<form name="addAccount" id="addAccount" action="./editAccount.php" method="POST">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="170" height="30" align="left" class="paddingTable2">Username<span style="color: #900"> </span>: </td>
      <td width="300" align="left" class="paddingTable2"><?php print $_GET['an'];?></td>
      <td colspan="2" align="left" id="req1"  style="font-size:0.8em; color:#900;">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Full name<span style="color: #900"> </span> :</td>
      <td align="left" class="paddingTable2"><?php print $reultAccount[0]['fname']." ".$reultAccount[0]['lname'];?></td>
      <td colspan="2" align="left" class="paddingTable2" id="req3">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">E-mail :</td>
      <td align="left" class="paddingTable2"><?php print $reultAccount[0]['email'];?></td>
      <td colspan="2" align="left" class="paddingTable2" id="req5">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Phone number :</td>
      <td align="left" class="paddingTable2"><?php print $reultAccount[0]['phone'];?></td>
      <td colspan="2" align="left" class="paddingTable2" id="req6">&nbsp;</td>
      </tr>
    <tr>
      <td height="30" align="left" valign="middle" class="paddingTable2">Address :</td>
      <td colspan="2" align="left" valign="middle"><?php print $reultAccount[0]['address'];?></td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Institute's name<span style="color: #900"> </span>:</td>
      <td align="left"><span class="paddingTable2">
          <?php 
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."institute WHERE institute_id = '".$reultAccount[0]['institute_id']."'";
		$resultInstituteType = $db->select($strSQL,false,true);
		
		if($resultInstituteType){
          print $resultInstituteType[0]['institute_name'];
		}
		?>
      </span></td>
      <td colspan="2" align="left" id="req7">&nbsp;</td>
      </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2" >User type<span style="color: #900"> </span>:</td>
      <td align="left" style="padding-left:5px;">
          <?php 
			$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE user_type_id = '".$reultAccount[0]['user_type_id']."'",mysql_real_escape_string("usertype"));
			$resultInstituteType = $db->select($strSQL,false,true);
			
			if($resultInstituteType){
				print 	$resultInstituteType[0][1];
			}
		  ?>
      </td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" >&nbsp;</td>
      <td align="left" style="padding-left:5px;">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" >&nbsp;</td>
      <td align="left" style="padding-left:5px;"><input type="button" name="cancelbutton" id="cancelbutton" value="Back" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:100px; padding-left:5px; cursor:pointer; color:#FFF;" />
        </td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" colspan="2" align="left" >&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
  </table>
</form>
</div>
<script type="text/javascript" src="./../js/jquery-1.9.1.min.js"></script>