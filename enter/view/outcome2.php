<style>
.tdh{
	background-color:#069;	
}
.tdh td{
	padding-left:5px;
	color:#fff;
	font-weight:bold;
}

</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="35" bgcolor="#666666" style="padding-left:10px; color:#FFF;">Home / 
    <?php 
	print "No. ".$resultRecord[0]['record_id']." - ";
	print "PID. ".$resultRecord[0]['pid']." / ";
	print "Newborn information";
	?>
    </td>
  </tr>
  <tr>
    <td style="padding-left:0px; padding-right:0px;"><br />
      <table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:solid; border-color:#CCC; border-width:1px;">
      <tr>
        <td height="40" style="font-size:1.0em; padding-left:10px;"><strong>View outcome information</strong></td>
        <td width="50" style="font-size:1.0em; padding-left:10px;" >
        <?php
            if($resultRegister[0]['confirm_status']==0){
				?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" 
            style="border:solid; border-color:#CCC; border-width:0px 1px 0px 1px;">
              <tr>
                <td height="40" align="center"><a href="createSession.php?id=<?php print $_GET['id']; ?>&amp;mid=3&amp;com=view"><img src="../images/edit.png" width="30" height="30" /></a></td>
              </tr>
            </table>
            <?php } ?>
       </td>
      </tr>
      <tr>
        <td height="1" colspan="2" bgcolor="#CCCCCC"></td>
      </tr>
      <tr>
        <td height="30" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="700" height="30" colspan="2" bgcolor="#FFFFFF" style="padding:10px 0px 0px 0px; color:#333;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <thead class="tdh">
              <tr>
                <td width="30" height="30" align="center">No</td>
                <td width="200">Newborn ID</td>
                <td width="100">Gender </td>
                <td width="100">Alive</td>
                <td width="100">Birth weight</td>
                <td>Apgar score 5 / 10</td>
                
                </tr>
              </thead>
            <tbody class="tbd">
              <?php
			$c = 1;
            foreach($resultOutcome as $v){
				?>
              <tr>
                <td height="30" align="center"><?php print $c;?></td>
                <td><?php print $v['nb_no'];?></td>
                <td><?php if($v['gender']==1){print "male";}else{print "female";}?></td>
                <td><?php if($v['alive']==1){
					  	print "Yes";
					  }else{
						print "No - "; switch($v['stillbirth']){ 
							case 1: print "Fresh"; 
				  			break; 
							case 2 : print "Macerated"; break;}}?></td>
                <td><?php print $v['birth_wieght'];?></td>
                <td><?php print $v['ag5']." / ".$v['ag10'];?></td>
                
              </tr>
              <?php
                $c++;
			}
			?>
              </tbody>
            </table></td>
        </tr>
          <tr>
            <td colspan="2" bgcolor="#FFFFFF" style="padding:5px 10px 5px 10px; color:#333;">&nbsp;</td>
          </tr>
          </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="50" align="left" style="padding-left:10px; padding-top:10px;">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>