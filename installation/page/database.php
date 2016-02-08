<script>
		$(function() {
			$('#btStep3').click(function(){
				window.location = 'signout.php';
			});
			
			$('#step2').submit(function(){
				
				var stat2 = 0;
				if($('#txtDbUsername').val()==""){
					stat2++;
					$('#req5').text('** Please enter database username!');
				}else{
					$('#req5').text('');
				}
				
				/*if($('#txtDbPassword').val()==""){
					stat2++;
					$('#req6').text('** Please enter database password!');
				}else{
					$('#req6').text('');
				}*/
				
				if($('#txtDbName').val()==""){
					stat2++;
					$('#req7').text('** Please enter database name!');
				}else{
					$('#req7').text('');
				}
				
				if($('#txtTbPrefix').val()==""){
					stat2++;
					$('#req8').text('** Please enter table prefix!');
				}else{
					$('#req8').text('');
				}
				
				if(stat2!=0){
					return false;
				}
				
			});
			
			$('#txtDbUsername').keyup(function(){
				if($('#txtDbUsername').val()==""){
					$('#req5').text('** Please enter database username!');
				}else{
					$('#req5').text('');
				}
			});
			
			$('#txtDbPassword').keyup(function(){
				if($('#txtDbPassword').val()==""){
					$('#req6').text('** Please enter database password!');
				}else{
					$('#req6').text('');
				}
			});
			
			$('#txtDbName').keyup(function(){
				if($('#txtDbName').val()==""){
					$('#req7').text('** Please enter database name!');
				}else{
					$('#req7').text('');
				}
			});
			
			$('#txtTbPrefix').keyup(function(){
				if($('#txtTbPrefix').val()==""){
					$('#req8').text('** Please enter table prefix!');
				}else{
					$('#req8').text('');
				}
			});
		});
</script>
<form name="step2" id="step2" method="post" action="generate.php">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2" style="font-size:2.2em;">&nbsp;</td>
  </tr>
  <tr>
    <td height="40" align="left" style="font-size:1.5em; padding-bottom:10px;"><strong>Database configuration</strong></td>
    <td align="right" style="font-size:1.5em; padding-bottom:10px;"><input type="button" name="btStep3" id="btStep3" value="Reset" style="border:solid;
	border-color:#CCC;
	border-width:0px;
	border-radius:5px;
	height:30px;
	padding-left:5px;
    background-color:#09C;
    color:#FFF;
    width:100px;
    cursor:pointer;
    outline:none;" />      <input type="submit" name="btStep2" id="btStep2" value="Create database &gt;" style="border:solid;
	border-color:#CCC;
	border-width:0px;
	border-radius:5px;
	height:30px;
	padding-left:5px;
    background-color:#09C;
    color:#FFF;
    width:140px;
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
        <td align="left" style="padding:3px 0 3px 0;">Admin username :</td>
        <td align="left" style="padding:3px 0 3px 0;"><span style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;">
          <?php
        if(isset($_SESSION["buffUsername"])){
			print $_SESSION["buffUsername"];
		}else{
			print "";
		}
		?>
        </span></td>
        <td align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;" >&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">Admin password :</td>
        <td align="left" style="padding:3px 0 3px 0;"><span style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;">
          <?php
        if(isset($_SESSION["buffPassword"])){
			print $_SESSION["buffPassword"];
		}else{
			print "";
		}
		?>
        </span></td>
        <td align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">Admin e-mail :</td>
        <td align="left" style="padding:3px 0 3px 0;"><span style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;">
          <?php
        if(isset($_SESSION["buffEmail"])){
			print $_SESSION["buffEmail"];
		}else{
			print "";
		}
		?>
          </span></td>
        <td align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">&nbsp;</td>
        <td align="left" style="padding:3px 0 3px 0;">&nbsp;</td>
        <td align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;">&nbsp;</td>
      </tr>
      <tr>
        <td width="250" align="left" style="padding:3px 0 3px 0;">Database username : *</td>
        <td align="left" style="padding:3px 0 3px 0;"><input name="txtDbUsername" type="text" class="border-r" id="txtDbUsername" size="30" ></td>
        <td align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;"  id="req5">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">&nbsp;</td>
        <td colspan="2" align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#CCC;">Either something as "root" or a username given by the host.</td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">Database password : *</td>
        <td align="left" style="padding:3px 0 3px 0;"><input name="txtDbPassword" type="password" class="border-r" id="txtDbPassword" size="30" ></td>
        <td align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;" id="req6">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">&nbsp;</td>
        <td colspan="2" align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#CCC;">For site security using a password for the database account is mandatory.</td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">Database name : *</td>
        <td align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;"><input name="txtDbName" type="text" class="border-r" id="txtDbName" size="30" ></td>
        <td align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;" id="req7">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">&nbsp;</td>
        <td colspan="2" align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#CCC;">Some hosts allow only a certain DB name per site. Use table prefix in this case for distinct SIMANH sites.<br />
          Please create database before generate the system.</td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">Table prefix : *</td>
        <td width="400" align="left" style="padding:3px 0 3px 0;"><span style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;">
          <input name="txtTbPrefix" type="text" class="border-r" id="txtTbPrefix" size="30" value="<?php generateRandomString(4);?>" />
        </span></td>
        <td align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#F00;" id="req8">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="padding:3px 0 3px 0;">&nbsp;</td>
        <td colspan="2" align="left" style="padding:3px 0 3px 0; font-size:0.8em; color:#CCC;">Choose a table prefix or use the randomly generated. Ideally, three or four characters long, contain only alphanumeric characters, and MUST end in an underscore. Make sure that the prefix chosen is not used by other tables.</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="left">&nbsp;</td>
  </tr>
</table>
</form>
<?php
function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    print $randomString."_";
}
?>