<?php
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");;
header("Content-Disposition: attachment;filename=export_data_".date('Y-m-d H-i-s').".xls");

set_time_limit(0);
require("./../../lib/connect.class.php");

$db = new database();
$db->connect();

$sdate = date('Y-m-')."01";
if(isset($_GET['sdate'])){
	$sdate = $_GET['sdate'];
}

$edate = date('Y-m-d');
if(isset($_GET['edate'])){
	$edate = $_GET['edate'];
}

$hoslist = "(";
if(isset($_GET['hospital'])){
	if($_GET['hospital']!='0'){
		$hoslist .= "'".$_GET['hospital']."')";
	}else{
		$strSQL = "SELECT institute_id FROM fmn1_institute WHERE 1";
		$resultInst = $db->select($strSQL,false,true);
		if($resultInst){
			foreach($resultInst as $h){
				if($h!=''){
					$hoslist .= "'".$h[0]."',";
					$hos[] = $h[0];
				}else{
					$hoslist .= "'0000')";
				}
			}
			$hoslist .= "'0000')";
		}
	}

}else{
	$strSQL = "SELECT institute_id FROM fmn1_institute WHERE 1";
	$resultInst = $db->select($strSQL,false,true);
	if($resultInst){
		foreach($resultInst as $h){
			if($h!=''){
				$hoslist .= "'".$h[0]."',";
				$hos[] = $h[0];
			}else{
				$hoslist .= "'0000')";
			}
		}
		$hoslist .= "'0000')";
	}
}

$colname = array('a.record_id','a.date_ent','a.time_ent','a.date_adm','a.time_adm','a.refer_in_status','a.refer_in_facility','a.stage_of_patient',' a.folder_no',' a.point_no',' a.pid',' a.p_fname',' a.p_mname',' a.p_lname',' a.p_address',' a.p_phone',' a.p_dob',' a.p_cage','a.username','
g.institute_name ','
b.gravidity',' parity',' anc_attend',' ga1st',' ga20w',' no_anc',' rh',' anti_d',' rpr',' rpr_treated',' hiv_status',' on_art_delivery','hiv_1st','hiv_retest','hiv_labour','cd4','cd4_count','initiate_art','bba','ga_adm','stage_of_labour','date_lbs','time_lbs','date_rm','time_rm','date_3cm','time_3cm','date_fully','time_fully','duration_active_phase','
c.ga_del','date_del','time_del','mode_del',' indication',' type_ba',' intact',' episiotomy',' degree_tear',' m_art1',' m_art2','m_art3',' ind_other','
d.il',' ah',' AP ',' PP ',' ph',' spe',' ecl',' prl',' rup',' sep',' opl',' ret',' mrp',' md',' stil',' neo',' pret',' lbw','
e.pos_com1',' pos_com2',' pos_com3',' pos_com4',' sterilisation',' oral_con',' Medroxyprogesterone',' Norethisterone',' Condoms',' IUCD',' Subdermal',' mot_dis',' mot_dis_date',' mot_ref_status',' mot_ref_date',' mot_ref_to',' mot_death',' mot_date_death');

$strSQL = "SELECT a.record_id,a.date_ent,a.time_ent,a.date_adm,a.time_adm,a.refer_in_status,a.refer_in_facility,a.stage_of_patient, a.folder_no, a.point_no, a.pid, a.p_fname, a.p_mname, a.p_lname, a.p_address, a.p_phone, a.p_dob, a.p_cage,a.username,
g.institute_name ,
b.gravidity, parity, anc_attend, ga1st, ga20w, no_anc, rh, anti_d, rpr, rpr_treated, hiv_status, on_art_delivery,hiv_1st,hiv_retest,hiv_labour,cd4,cd4_count,initiate_art,bba,ga_adm,stage_of_labour,date_lbs,time_lbs,date_rm,time_rm,date_3cm,time_3cm,date_fully,time_fully,duration_active_phase,
c.ga_del,date_del,time_del,mode_del, indication, type_ba, intact, episiotomy, degree_tear, m_art1, m_art2,m_art3, ind_other,
d.il, ah, AP , PP , ph, spe, ecl, prl, rup, sep, opl, ret, mrp, md, stil, neo, pret, lbw,
e.pos_com1, pos_com2, pos_com3, pos_com4, sterilisation, oral_con, Medroxyprogesterone, Norethisterone, Condoms, IUCD, Subdermal, mot_dis, mot_dis_date, mot_ref_status, mot_ref_date, mot_ref_to, mot_death, mot_date_death
FROM `fmn1_registerrecord` a
inner join fmn1_userdescription f on a.username = f.username
inner join fmn1_institute g on f.institute_id = g.institute_id
inner join fmn1_obstetric b on a.record_id = b.record_id
inner join fmn1_delivery c on a.record_id = c.record_id
inner join fmn1_complication_delivery d on a.record_id = d.record_id
inner join fmn1_postnatal e on a.record_id = e.record_id
WHERE a.confirm_status = 1 and f.institute_id in $hoslist and a.date_adm between '$sdate' and '$edate'";

//print $strSQL;
$resultPart1 = $db->select($strSQL,false,true);

?>
<table border="1" bordercolor="#999999" cellpadding="0" cellspacing="0">
<?php
print "<tr>";
foreach($colname as $v){
	?>
			<td style="white-space: nowrap"><?php print $v;?></td>
	<?php

}


$strSQL = "SELECT count(*) FROM fmn1_outcome WHERE record_id in (SELECT record_id FROM fmn1_registerrecord WHERE confirm_status = 1) group by record_id order by count(*) desc";
$resultCheckMax = $db->select($strSQL,false,true);
$max = 1;
if($resultCheckMax){
	if(sizeof($resultCheckMax)>0)
		$max = $resultCheckMax[0][0];
}

for($i = 1; $i <= $max; $i++){
	?>
			<td style="white-space: nowrap">ocm_id<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">gender<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">alive<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">stillbirth<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">ag5<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">ag10<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">rbm<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">birth_wieght<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">hc<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">fetal_length<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">bdf<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">bdf_identify<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">bdn<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">ebf<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">bf<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">ff<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">skin2skin<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">pmctv_lb<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">nb_adm<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">nb_date_adm<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">nb_time_adm<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">nb_neonatal<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">nb_refer<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">nb_refer_facility<?php print "_no.".$i;?></td>
	<?php
}
for($i = 1; $i <= $max; $i++){
?>
<td style="white-space: nowrap">post_pmtct_visit<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_initiated_azt<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_given_nevirapine<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_given_nevirapine72<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_nevirapine6<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_ifm<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_vitk<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_polio<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_bcg<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_admitted<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_discharge<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_discharge_date<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_refer<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_refer_to_facility<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_refer_date<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_death<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_deathdate<?php print "_no.".$i;?></td>
            <td style="white-space: nowrap">post_record_id<?php print "_no.".$i;?></td>
<?php
}


print "</tr>";
?>
<?php
	foreach($resultPart1 as $v){
		?>
		<tr>
		<?php
		for($i = 0; $i < sizeof($v)/2; $i++){
			?>
			<td style="white-space: nowrap;"><?php print $v[$i];?></td>
			<?php
		}

		$strSQL = "SELECT ocm_id,gender,alive,stillbirth,ag5,ag10,rbm,birth_wieght,hc,fetal_length,bdf,bdf_identify,bdn,ebf,bf,ff,skin2skin,pmctv_lb, nb_adm, nb_date_adm, nb_time_adm, nb_neonatal, nb_refer,nb_refer_facility FROM fmn1_outcome  WHERE record_id = '".$v[0]."' ";
		$resultNB = $db->select($strSQL,false,true);

		if($resultNB){
			foreach($resultNB as $nb){
				for($i = 0; $i < sizeof($nb)/2; $i++){
					if(isset($nb[$i])){
						?>
						<td style="white-space: nowrap;"><?php print $nb[$i];?></td>
						<?php
					}
				}
			}

			if((sizeof($resultNB)*24) < ($max*24)){
				//Calculate blank td
				$avai = ($max*24) - (sizeof($resultNB)*24);
				for($j = 0; $j < $avai ; $j++){
					?>
						<td style="white-space: nowrap;">&nbsp;</td>
					<?php
				}
			}
		}else{
			$avai = ($max*24);
				for($j = 0; $j < $avai ; $j++){
					?>
						<td style="white-space: nowrap;">&nbsp;</td>
					<?php
				}
		}

		//Select from post natal
		$strSQL = "SELECT pmtct_visit,initiated_azt,given_nevirapine,given_nevirapine72,nevirapine6,ifm,vitk,polio,bcg,admitted,discharge,discharge_date,refer,refer_to_facility,refer_date,death,deathdate,record_id FROM fmn1_other_postnatal WHERE record_id = '".$v[0]."' ";
		$resultNB = $db->select($strSQL,false,true);

		if($resultNB){
			foreach($resultNB as $nb){
				for($i = 0; $i < sizeof($nb)/2; $i++){
					if(isset($nb[$i])){
						?>
						<td style="white-space: nowrap;"><?php print $nb[$i];?></td>
						<?php
					}
				}
			}

			if((sizeof($resultNB)*18) < ($max*18)){
				//Calculate blank td
				$avai = ($max*18) - (sizeof($resultNB)*18);
				for($j = 0; $j < $avai ; $j++){
					?>
						<td style="white-space: nowrap;">&nbsp;</td>
					<?php
				}
			}
		}else{
			$avai = ($max*18);
				for($j = 0; $j < $avai ; $j++){
					?>
						<td style="white-space: nowrap;">&nbsp;</td>
					<?php
				}
		}
		//End select from postnatal

		?>
		</tr>
		<?php
	}



?>
</table>
