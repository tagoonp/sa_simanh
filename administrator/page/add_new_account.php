<style type="text/css">
/* css กำหนดความกว้าง ความสูงของแผนที่ */
#map_canvas { 
	width:100%;
	height:400px;
	margin:auto;
/*	margin-top:100px;*/
}
</style>
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
}); 
</script>
<div style="width:100%; position:; width:800px; overflow-y:hidden; ">
<form name="addAccount" id="addAccount" action="./addAccount.php" method="POST">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="170" height="30" align="left" class="paddingTable2">Username <span style="color:#900;">*</span> : </td>
      <td width="300" align="left" class="paddingTable2"><input type="text" name="txtUsername" id="txtUsername" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" required="required" /></td>
      <td colspan="2" align="left" id="req1"  style="font-size:0.8em; color:#900;">&nbsp;</td>
      </tr>
    <tr>
      <td height="30" align="left" valign="middle" class="paddingTable2">Password <span style="color:#900;">*</span> :</td>
      <td align="left" class="paddingTable2" ><input name="txtPasswd" type="text" id="txtPasswd" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px; background-color:#F3F3F3;" required="required" 
	  <?php
      	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < 10; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		print "value=".$randomString;
	  ?>
       /></td>
      <td colspan="2" align="left" valign="top"  style="font-size:0.8em; color:#900;" id="req2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" valign="top" class="paddingTable2" style="font-size:0.9em; color:#900;">System generates automatically.</td>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" class="paddingTable2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Firstname <span style="color:#900;">*</span> :</td> 
      <td align="left" class="paddingTable2"><input type="text" name="txtFname" id="txtFname" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" required="required" /></td>
      <td colspan="2" align="left" class="paddingTable2" id="req3">&nbsp;</td>
      </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Surname <span style="color:#900;">*</span> :</td>
      <td align="left" class="paddingTable2"><input type="text" name="txtLname" id="txtLname" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" required="required" /></td>
      <td colspan="2" align="left" class="paddingTable2" id="req4">&nbsp;</td>
      </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">E-mail <span style="color:#900;">*</span> :</td>
      <td align="left" class="paddingTable2"><input type="text" name="txtEmail" id="txtEmail" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" required="required" /></td>
      <td colspan="2" align="left" class="paddingTable2" id="req5">&nbsp;</td>
      </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2">Phone number <span style="color:#900;">*</span> :</td>
      <td align="left" class="paddingTable2"><input type="text" name="txtPhone" id="txtPhone" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" required="required" /></td>
      <td colspan="2" align="left" class="paddingTable2" id="req6">&nbsp;</td>
      </tr>
    <tr>
      <td height="30" align="left" valign="top" class="paddingTable2">Address :</td>
      <td align="left"><span class="paddingTable2">
        <textarea name="txtAddress" rows="3" id="txtAddress" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:80px; width:260px; padding-left:5px;"></textarea>
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
          <option value="<?php print $v[0];?>"><?php print $v[1];?></option>
          <?php	
			}	
		}
		?>
          </select>
        </span></td>
      <td colspan="2" align="left" id="req7">&nbsp;</td>
      </tr>
    <tr>
      <td height="30" align="left"  class="paddingTable2">User type <span style="color:#900;">*</span> :</td>
      <td align="left" style="padding-left:5px;">
        <select name="txtUsertype" id="txtUsertype"  style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:95%; padding-left:5px;" required="required">
          <option value="" selected="selected">----- Please type of user ------</option>
          <?php 
			$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."%s WHERE 1",mysql_real_escape_string("usertype"));
			$resultInstituteType = $db->select($strSQL,false,true);
			
			if($resultInstituteType){
				foreach($resultInstituteType as $v){
					?>
			  <option value="<?php print $v[0];?>" ><?php print $v[1];?></option>
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
      <td height="30" align="left" >&nbsp;</td>
      <td align="left" style="padding-left:5px;"><input type="submit" name="button" id="button" value="+ Add" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:200px; padding-left:5px; cursor:pointer; color:#FFF;" /></td>
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
