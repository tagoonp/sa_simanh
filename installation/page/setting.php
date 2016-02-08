<script>
		$(function() {
			$('#step1').submit(function(){
				
				var stat = 0;
				if($('#txtUsername').val()==""){
					stat++;
					$('#req1').text('** Please enter username!');
				}else{
					$('#req1').text('');
				}
				
				if($('#txtPassword').val()==""){
					stat++;
					$('#req2').text('** Please enter password!');
				}else{
					if($('#txtPassword2').val()!=$('#txtPassword').val()){
						stat++;
						$('#req2').text('');
						$('#req3').text('** Password not match!');
					}else{
						$('#req2').text('');
						$('#req3').text('');
					}
					
				}
				
				if($('#txtEmail').val()==""){
					stat++;
					$('#req4').text('** Please enter e-mail!');
				}else{
					$('#req4').text('');
				}
				
				if(stat!=0){
					return false;
				}
				
			});
			
			$('#txtUsername').keyup(function(){
				if($('#txtUsername').val()==""){
					$('#req1').text('** Please enter username!');
				}else{
					$('#req1').text('');
				}
			});
			
			$('#txtPassword').keyup(function(){
				if($('#txtPassword').val()==""){
					$('#req2').text('** Please enter password!');
				}else{
					$('#req2').text('');
				}
			});
			
			$('#txtEmail').keyup(function(){
				if($('#txtEmail').val()==""){
					$('#req4').text('** Please enter e-mail!');
				}else{
					$('#req4').text('');
				}
			});
		});
</script>
<form name="step1" id="step1" method="post" action="index.php?id=2">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" style="font-size:2.2em;">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="left" style="font-size:1.5em; padding-bottom:10px;"><strong>Main website setting</strong></td>
    <td align="right" style="font-size:1.5em; padding-bottom:10px;"><input type="submit" name="btStep1" id="btStep1" value="Next >" style="border:solid;
	border-color:#CCC;
	border-width:0px;
	border-radius:5px;
	height:30px;
	padding-left:5px;
    background-color:#09C;
    color:#FFF;
    width:70px;
    cursor:pointer;
    outline:none;"></td>
  </tr>
  <tr>
    <td height="1" colspan="2" align="left" bgcolor="#E9E9E9"></td>
  </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="250" align="left" style="padding:3px 0 3px 0;">Admin username : *</td>
        <td align="left" style="padding:3px 0 3px 0;"><input name="txtUsername" type="text" class="border-r" id="txtUsername" size="30" ></td>
        <td align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;" id="req1">
		<?php
        if(isset($_SESSION["buffUsername"])){
			if($_SESSION["buffUsername"]==""){
				print "** Please enter username!";
			}else{
				print "";	
			}
		}else{
			print "** Please enter username!";
		}
		?>
        </td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">&nbsp;</td>
        <td colspan="2" align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#CCC;">Administrator username, use for access to the system.</td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">Admin password : *</td>
        <td align="left" style="padding:3px 0 3px 0;"><input name="txtPassword" type="password" class="border-r" id="txtPassword" size="30" ></td>
        <td align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;" id="req2">
        <?php
        if(isset($_SESSION["buffPassword"])){
			if($_SESSION["buffPassword"]==""){
				print "** Please enter password!";
			}else{
				print "";	
			}
		}else{
			print "** Please enter password!";
		}
		?>
        </td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">&nbsp;</td>
        <td colspan="2" align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#CCC;">Setting password for admininstrator account.</td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">Confirm admin password : *</td>
        <td align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;"><input name="txtPassword2" type="password" class="border-r" id="txtPassword2" size="30" ></td>
        <td align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;" id="req3">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">&nbsp;</td>
        <td colspan="2" align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#CCC;">Confirmation password for admininstrator account.</td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">Admin e-mail : *</td>
        <td width="400" align="left" style="padding:3px 0 3px 0;"><input name="txtEmail" type="email" class="border-r" id="txtEmail" size="50" ></td>
        <td align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;" id="req4">
        <?php
        if(isset($_SESSION["buffEmail"])){
			if($_SESSION["buffEmail"]==""){
				print "** Please enter e-mail!";
			}else{
				print "";	
			}
		}else{
			print "** Please enter e-mail!";
		}
		?>
        </td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">&nbsp;</td>
        <td colspan="2" align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#CCC;">This e-mail use for administor.</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
</table>
</form>
