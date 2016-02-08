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
      <td width="170" height="30" align="left" class="paddingTable2">Username <span style="color:#900;">*</span> : </td>
      <td width="300" align="left" class="paddingTable2"><input type="text" name="txtUsername" id="txtUsername" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px; background-color:#F0F0F0;" readonly="readonly" value="<?php print $_GET['an'];?>" /></td>
      <td colspan="2" align="left" id="req1"  style="font-size:0.8em; color:#900;">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" valign="top" class="paddingTable2" style="font-size:0.9em; color:#900;">** Read only field</td>
      <td colspan="2" align="left" class="paddingTable2" id="req2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Firstname <span style="color:#900;">*</span> :</td>
      <td align="left" class="paddingTable2"><input type="text" name="txtFname" id="txtFname" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" required="required" <?php print "value=".$reultAccount[0]['fname'];?> /></td>
      <td colspan="2" align="left" class="paddingTable2" id="req3">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Surname <span style="color:#900;">*</span> :</td>
      <td align="left" class="paddingTable2"><input type="text" name="txtLname" id="txtLname" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" required="required" <?php print "value=".$reultAccount[0]['lname'];?> /></td>
      <td colspan="2" align="left" class="paddingTable2" id="req4">&nbsp;</td>
      </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">E-mail <span style="color:#900;">*</span> :</td>
      <td align="left" class="paddingTable2"><input type="email" name="txtEmail" id="txtEmail" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" required="required"  <?php print "value=".$reultAccount[0]['email'];?> /></td>
      <td colspan="2" align="left" class="paddingTable2" id="req5">&nbsp;</td>
      </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Phone number <span style="color:#900;">*</span> :</td>
      <td align="left" class="paddingTable2"><input type="text" name="txtPhone" id="txtPhone" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" required="required"  <?php print "value=".$reultAccount[0]['phone'];?> ></td>
      <td colspan="2" align="left" class="paddingTable2" id="req6">&nbsp;</td>
      </tr>
    <tr>
      <td height="30" align="left" valign="top" class="paddingTable2">Address :</td>
      <td align="left"><span class="paddingTable2">
        <textarea name="txtAddress" rows="3" id="txtAddress" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:80px; width:260px; padding-left:5px;"><?php print $reultAccount[0]['address'];?></textarea>
      </span></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Institute's name <span style="color:#900;">*</span> :</td>
      <td align="left"><span class="paddingTable2">
        <select name="txtInstitutename" id="txtInstitutename"  style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:95%; padding-left:5px;" required>
          <option value="" selected="selected">----- Please select institute ------</option>
          <?php 
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."institute WHERE 1";
		$resultInstituteType = $db->select($strSQL,false,true);
		
		if($resultInstituteType){
			foreach($resultInstituteType as $v){
				?>
          <option value="<?php print $v[0];?>" 
		  <?php
          if($reultAccount[0]['institute_id']==$v[0]){
			  print "selected";
		  }
		  ?>><?php print $v[1];?></option>
          <?php	
			}	
		}
		?>
          </select>
      </span></td>
      <td colspan="2" align="left" id="req7">&nbsp;</td>
      </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2" >User type <span style="color:#900;">*</span> :</td>
      <td align="left" style="padding-left:5px;">
        <select name="txtUsertype" id="txtUsertype"  style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:95%; padding-left:5px;" required="required">
          <option value="" selected="selected">----- Please type of user ------</option>
          <?php 
			$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE 1",mysql_real_escape_string("usertype"));
			$resultInstituteType = $db->select($strSQL,false,true);
			
			if($resultInstituteType){
				foreach($resultInstituteType as $v){
					?>
          <option value="<?php print $v[0];?>" 
          <?php
          if($reultAccount[0]['user_type_id']==$v[0]){
			  print "selected";
		  }
		  ?>
          ><?php print $v[1];?></option>
          <?php	
				}	
			}
		  ?>
          </select>
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
      <td height="30" align="left" >Admin password<span class="paddingTable2"> <span style="color:#900;">*</span> :</span></td>
      <td align="left" style="padding-left:5px;"><span class="paddingTable2">
        <input type="password" name="txtPasswd" id="txtPasswd" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" required="required"  />
      </span></td>
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
      <td align="left" style="padding-left:5px;"><input type="submit" name="button" id="button" value="Update" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:100px; padding-left:5px; cursor:pointer; color:#FFF;" />
      <input type="button" name="cancelbutton" id="cancelbutton" value="Cancel" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:100px; padding-left:5px; cursor:pointer; color:#FFF;" />
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