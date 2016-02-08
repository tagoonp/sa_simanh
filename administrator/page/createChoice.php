<?php
if((!isset($_GET['an'])) || (!isset($_GET['group_id']))) {
	?>
	<script>
    	alert('Parameter passing error!');
		window.history.back();
    </script>
	<?php
	exit();
}

$strSQL = sprintf("SELECT * FROM ".substr(strtolower($tbf),0,-2)."parameter_index a 
		  inner join ".substr(strtolower($tbf),0,-2)."parameter_subgroup b 
		  on a.pi_subgroup=b.sg_id WHERE a.pi_id = '%s'",mysql_real_escape_string($_GET['an']));
		  
$resultAN = $db->select($strSQL,false,true);

if(!$resultAN){
	?>
	<script>
    	alert('Parameter passing error!');
		window.history.back();
    </script>
	<?php
	exit();
}else{
	 if(($resultAN[0]['pi_input_type_id']=='7') || ($resultAN[0]['pi_input_type_id']=='8')){
		
     }else{
		 ?>
		<script>
            alert('This parametor not support choice seletection method!');
            window.history.back();
        </script>
        <?php
        exit(); 
     }
}
?>
<script>
$(function(){
	// Bypass global value to google map api v=3.2&sensor=false&language=th&callback=initialize
	//	callback for initialize function
	$("<script/>", {
	  "type": "text/javascript",
	  src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=en&callback=initialize"
	}).appendTo("body");
	
	//Form submit validate function
	
	
	$('#cancelbutton').click(function(){
		window.location = 'main.php?id=1&group_id=1&tab_id=1';
	});
	
}); 

function redirect(url){
	window.location = url;	
}
</script>
<div style="width:100%; position:; width:800px; overflow-y:hidden; ">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td width="170" height="30" align="left" class="paddingTable2"><strong>Variable label<span style="color: #900"> </span></strong>: </td>
      <td width="300" align="left" class="paddingTable2"><?php print $resultAN[0]['pi_var'];?></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" align="left" class="paddingTable2"><strong>Require status</strong> :</td>
      <td align="left" class="paddingTable2"><?php
      	if($resultAN[0]['pi_req_status']==1){
			print "Required";	
		}else{
			print "None";	
		}
	  ?></td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left" class="paddingTable2">&nbsp;</td>
      <td align="left">&nbsp;</td>
      <td align="left">&nbsp;</td>
    </tr>
    <tr>
      <td height="30" colspan="4" align="left" class="paddingTable2">
      <?php
      if($resultAN[0]['pi_input_type']==1){
		  //Complete choice
		 ?>
         <form name="addChoice2" id="addChoice2" action="./addChoice2.php?group_id=<?php print $_GET['group_id'];?>&var=<?php print $resultAN[0]['pi_id']?>" method="POST">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="color:#FFF;">
          <td height="30" align="left" bgcolor="#006699" style="padding-left:10px;">Please select choice</td>
          </tr>
        <tr>
          <td height="30" align="left" class="paddingTable2"><select name="it_choice" id="it_choice"  style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; padding-left:5px;">
            <?php
            $strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."completechoide WHERE 1";
			$resultSelectCC = $db->select($strSQL,false,true);
			
			if($resultSelectCC){
				foreach($resultSelectCC as $cc){
					?><option value="<?php print $cc['cc_id']; ?>"><?php print $cc['cc_description'];?></option><?php	
				}	
			}
			?>
        </select></td>
          </tr>
        <tr>
          <td height="1" bgcolor="#CCCCCC"></td>
          </tr>
        </table>
        
		<input type="submit" name="button2" id="button2" value="Create" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:150px; padding-left:5px; cursor:pointer; color:#FFF;" />
        </form>
		<?php 
	  }else{
		  //choice by manual
		?>
        <form name="addChoice" id="addChoice" action="./addChoice.php?group_id=<?php print $_GET['group_id'];?>&var=<?php print $resultAN[0]['pi_id']?>" method="POST">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr style="color:#FFF;">
          <td width="70" height="30" align="left" bgcolor="#006699" style="padding-left:10px;">Value</td>
          <td width="200" align="left" bgcolor="#006699">Label</td>
          <td width="140" align="left" bgcolor="#006699">Available status</td>
          <td align="left" bgcolor="#006699">&nbsp;</td>
          </tr>
        <tr>
          <td height="30" align="left" class="paddingTable2"><input type="text" name="it_val" id="it_val" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:50px; padding-left:5px;"  /></td>
          <td align="left" class="paddingTable2"><input type="text" name="is_label" id="is_label" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:150px; padding-left:5px;"  /></td>
          <td align="left" class="paddingTable2"><select name="it_avai" id="it_avai"  style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:100px; padding-left:5px;">
            <option value="0">No</option>
            <option value="1" selected="selected" >Yes</option>
            </select></td>
          <td align="left" class="paddingTable2"><input type="submit" name="button" id="button" value="+ Add item" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:150px; padding-left:5px; cursor:pointer; color:#FFF;" /></td>
          </tr>
        <tr>
          <td height="1" colspan="4" bgcolor="#CCCCCC"></td>
          </tr>
        </table>
        </form>
		<?php
			  
	  }
	  ?>
      </td>
    </tr>
  </table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr style="color:#FFF;">
    <td width="40" height="30" align="left" bgcolor="#666666" style="padding-left:10px;">No</td>
    <td width="100" align="left" bgcolor="#666666">Value</td>
    <td width="200" align="left" bgcolor="#666666">Label</td>
    <td width="150" align="left" bgcolor="#666666">Available status</td>
    <td align="left" bgcolor="#666666">Set default value</td>
    <td align="left" bgcolor="#666666">&nbsp;</td>
  </tr>
  <?php
  $strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."choice_collection WHERE pi_id = '".$resultAN['0']['pi_id']."'";
  $resultChoice = $db->select($strSQL,false,true);
  if($resultChoice){
	  $c = 1;
	  foreach($resultChoice as $co){
		?>
		<tr>
          <td height="25" align="left" class="paddingTable2"><?php print $c;?></td>
          <td align="left" class="paddingTable2"><?php print $co['col_value'];?></td>
          <td align="left" class="paddingTable2"><?php print $co['col_label'];?></td>
          <td align="left" class="paddingTable2"><?php if($co['col_status']==1){
			  ?><img src="./../images/Active.jpg" width="11" height="11" title="Available" /><?php
			 }else{
				?><img src="./../images/nonActive.jpg" width="11" height="11" title="Not available" /><?php 
		     } 
			 ?>
          </td>
            <td align="left" class="paddingTable2"><?php
            if($co['col_confirm']==0){
				?>
				<input type="button" name="button3" id="button3" value="Set this to default" onclick="redirect('setDefaultItem.php?col_id=<?php print $co['col_id'];?>&an=<?php print $resultAN['0']['pi_id'];?>')" />
				<?php	
			}else{
				print "Default";	
			}
			?></td>
            <td align="left" class="paddingTable2">
                          <a href="main.php?id=1&an=<?php print $resultAN['0']['pi_id']; ?>&group_id=<?php print $_GET['group_id']?>&tab_id=5&com=ec&col_id=<?php print $co['col_id'];?>">
                          <img src="./../images/edit.png" width="20" height="20" title="Edit" />
                          </a>
                          <a href="Javascript:confirmDel('delete.php?an=<?php print $co['col_id'];?>&part=item','delete')">
                          <img src="./../images/delete.png" width="20" height="20" title="Delete" />
                          </a>
          </td>
    </tr>
          <tr>
          <td height="1" bgcolor="#CCCCCC" colspan="6"></td>
          </tr>
		<?php	  
		$c++;
	  }	  
  }else{
	?>
	<tr>
    <td height="30" align="left" class="paddingTable2" colspan="5">No item set.</td>
  </tr>
	<?php	  
  }
  ?>
</table>
<p>
  <br />
  <input type="button" name="cancelbutton" id="cancelbutton" value="Back" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:100px; padding-left:5px; cursor:pointer; color:#FFF;" />
</p>
</div>