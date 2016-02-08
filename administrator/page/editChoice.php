<?php
if((!isset($_GET['an'])) || (!isset($_GET['group_id'])) || (!isset($_GET['com'])) || (!isset($_GET['col_id']))) {
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
	  if($_GET['com']=='ec'){
		    //choice by manual
			$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."choice_collection WHERE pi_id = '".$resultAN[0]['pi_id']."' and col_id
					  = '".$_GET['col_id']."'";
			$resultCol = $db->select($strSQL,false,true);
			
			if(!$resultCol){
					
			}
					  
			?>
			<form name="editChoice" id="editChoice" action="./updateChoice.php?group_id=<?php print $_GET['group_id'];?>&var=<?php print $resultAN[0]['pi_id']?>&col_id=<?php print $_GET['col_id'];?>" method="POST">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr style="color:#FFF;">
			  <td width="130" height="30" align="left" bgcolor="#006699" style="padding-left:10px;">Value selected</td>
			  <td width="200" align="left" bgcolor="#006699">Label</td>
			  <td width="140" align="left" bgcolor="#006699">Available status</td>
			  <td align="left" bgcolor="#006699">&nbsp;</td>
			  </tr>
			<tr>
			  <td height="30" align="left" class="paddingTable2"><input type="text" name="it_val" id="it_val" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:50px; padding-left:5px;" 
              value="<?php print $resultCol[0]['col_value'];?>" /></td>
			  <td align="left" class="paddingTable2"><input type="text" name="is_label" id="is_label" style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:150px; padding-left:5px;" 
			   value="<?php print $resultCol[0]['col_label'];?>"
               /></td>
			  <td align="left" class="paddingTable2"><select name="it_avai" id="it_avai"  style="border-radius:5px; border:solid; border-width:1px; border-color:#CCC; outline:none; height:25px; width:100px; padding-left:5px;">
				<option value="0">No</option>
				<option value="1" selected="selected" <?php if($resultCol[0]['col_status']==1){ print "selected"; }?>>Yes</option>
				</select></td>
			  <td align="left" class="paddingTable2"><input type="submit" name="button" id="button" value="Update" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:150px; padding-left:5px; cursor:pointer; color:#FFF;" /></td>
			  </tr>
			<tr>
			  <td height="1" colspan="4" bgcolor="#CCCCCC"></td>
			  </tr>
			</table>
			</form>
			<?php
	  }else{
		  
	  }
      
	  ?>
      </td>
    </tr>
  </table>
<br />

<p>
  <br />
  <input type="button" name="cancelbutton" id="cancelbutton" value="Back" style="border-radius:5px; border:solid; border-width:1px; background-color:#069; height:35px; width:100px; padding-left:5px; cursor:pointer; color:#FFF;" />
</p>
</div>