<div style="width:100%; position:; width:800px; overflow-y:hidden; ">
<form name="addParameter" action="./addSubgroup.php?group_id=<?php print $_GET['group_id'];?>" method="POST">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="170" height="30" align="left" class="paddingTable2">Subgroup title <span style="color:#900;">*</span> : </td>
      <td width="300" align="left" class="paddingTable2"><input type="text" name="var_subgroup" id="var_subgroup" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:200px; padding-left:5px;" required="required" /></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" valign="top" class="paddingTable2">&nbsp;</td>
      <td align="left" valign="top" class="paddingTable2" style="color:#900;">** Ex. Medical underlying diseases</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" >&nbsp;</td>
      <td align="left" style="padding-left:5px;"><input type="submit" name="button" id="button" value="+ Add" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:200px; padding-left:5px; cursor:pointer; color:#FFF;" /></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
  </table>
</form>
</div>