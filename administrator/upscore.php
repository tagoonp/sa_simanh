<?php
session_start();
include "../lib/server-config.php";

require("../lib/connect.class.php");
$db = new database();
$db->connect2(trim($u),$p,trim($dbn));

//Checking parameter
if((isset($_GET['vid'])) && (isset($_GET['follow']))){
	
	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."parameter_index WHERE pi_subgroup in 
			  (SELECT pi_subgroup FROM ".substr(strtolower($tbf),0,-2)."parameter_index WHERE pi_id = '".$_GET['vid']."') order by pi_ordering";
	$resultSelect = $db->select($strSQL,false,true);
	
	$pid = ''; $p_vid = '';
	$cid = ''; $c_vid = '';
	if($resultSelect){
		//If move up
		if($_GET['follow']=='up'){
			foreach($resultSelect as $v){
				if($_GET['vid']==$v['pi_id']){
					print "This ordering : ".$v['pi_ordering'];
					$cid = $v['pi_ordering'];
					$c_vid = $v['pi_id'];
					break;
				}else{
					$pid = $v['pi_ordering'];
					$p_vid = $v['pi_id'];
				}
			}
			
			//print "Prev ordering : ".$pid;
		}else{
		//If move down
			$stat = 0;
			foreach($resultSelect as $v){
				if($_GET['vid']==$v['pi_id']){
					print "This ordering : ".$v['pi_ordering']." ";
					$cid = $v['pi_ordering'];
					$c_vid = $v['pi_id'];
					if($stat!=0){
						$pid = $v['pi_ordering'];
						$p_vid = $v['pi_id'];
						//break;
						//print "asd";
						$stat = 0;
					}else{
						$stat = $stat+1;
					}
					
					//print "-".$stat."-";
				}else{
					if($stat!=0){
						$pid = $v['pi_ordering'];
						$p_vid = $v['pi_id'];
						break;
						//print "asd";
						$stat = 0;
					}
				}
			}
			
			//print "Next ordering : ".$pid;
			
			//exit();
		}
		
	}
	
	$strSQL = "UPDATE ".substr(strtolower($tbf),0,-2)."parameter_index SET 
			  pi_ordering = '".$pid."'
			  WHERE pi_id = '".$c_vid."'";
	$resultUpdate = $db->update($strSQL);
	
	$strSQL = "UPDATE ".substr(strtolower($tbf),0,-2)."parameter_index SET 
			  pi_ordering = '".$cid."'
			  WHERE pi_id = '".$p_vid."'";
	$resultUpdate = $db->update($strSQL);
	
	//Parameter not receive
	$db->disconnect();
			?>
			<script>
				//alert('Parametor error!');
				window.history.back();
			</script>
			<?php
	exit();
	
}else{
	//Parameter not receive
	$db->disconnect();
			?>
			<script>
				alert('Parametor error!');
				window.history.back();
			</script>
			<?php
			exit();	
}
?>