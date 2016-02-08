<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SIMANH Administrator login panel</title>
<style type="text/css">
body {
	background-color: #E4E4E4;
	color:#999;
	font-family:Arial, Helvetica, sans-serif;
}

.a {
  width:100%; height:33px; border:none; border-radius:5px; background-color:#099; color:#FFF; cursor:pointer; font-family:Verdana, Geneva, sans-serif; font-size:1.0em;
}
.a:hover{
     background:#01C288; 
}

.b:link { color:#09C; text-decoration:none}
.b:visited {color: #09C; text-decoration: none}
.b:hover {color:#666;}
</style>
</head>
<script src="../js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

	$("#loginBtn").click(function(){

			$.post("../lib/checkuseraccount.php", { 
			data1: $("#txtUsername").val(), 
			data2: $("#txtPassword").val()}, 
				function(result){
					if(result=='Y'){
						$('#resultSpan').text('');
						window.location = 'main.php';
					}else{
						//$('#resultSpan').text("Invalid user account!");
						$('#resultSpan').text(result);
					}
					
				}
			);

		});
	});
</script>
<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center"><table width="500" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="200">&nbsp;</td>
      </tr>
      <tr>
        <td align="center" style="padding:5px 0 5px 0;"><strong>Welcome to SIMANH Admin panel+</strong></td>
      </tr>
      <tr>
        <td align="center" style="padding:5px 0 5px 0; font-size:0.8em;">Improving Health System Response through Epidemiological Surveillance 
          in Improving Maternal and Newborn Health and Survival.</td>
      </tr>
      <tr>
        <td align="center" style="padding:5px 0 10px 0;"></td>
      </tr>
      <tr>
        <td align="center"><table width="250" border="0" cellspacing="0" cellpadding="0">
          <tr align="center">
            <td style="padding:5px 0 5px 0;">
              <input type="text" name="txtUsername" id="txtUsername" style="width:250px; height:30px;padding:0 5px 0 5px; " placeholder="Username" /></td>
            </tr>
          <tr>
            <td align="center" style="padding:5px 0 5px 0;"><input type="password" name="txtPassword" id="txtPassword" style="width:250px; height:30px; padding:0 5px 0 5px;" placeholder="Password" /></td>
            </tr>
          <tr align="center">
            <td align="center" style="padding:5px 0 5px 0;">
              <input type="button" name="loginBtn" id="loginBtn" value="Login" class="a"  /></td>
            </tr>
          <tr align="center">
            <td height="10" align="center" style="padding:5px 0 5px 0;"></td>
            </tr>
          <tr align="center">
            <td align="center" style="padding:5px 0 5px 0; font-size:0.8em;"><a href="#" class="b">Forgot password?</a></td>
            </tr>
          <tr align="center">
            <td align="center" style="padding:5px 0 5px 0; color:#C00;"><span id="resultSpan"></span></td>
            </tr>
          </table></td>
      </tr>
      <tr>
        <td align="center" style="font-size:0.8em;">SIMANH Webbase-application framework.</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>