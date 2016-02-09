<?php
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");
header("Content-Type: text/plain");
header("Content-Disposition: attachment;filename=export_data_".date('Y-m-d H-i-s').".txt");

set_time_limit(0);
ini_set('memory_limit', '-1');
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

$colname = array('record_id','date_ent','time_ent','date_adm','time_adm','refer_in_status','refer_in_facility','stage_of_patient','folder_no','point_no','pid','firstname','midname','lastname','address','phone','dob','age','username','institute_name','gravidity','parity','anc_attend','ga1st','ga20w','no_anc','rh','anti_d','rpr','rpr_treated','hiv_status','on_art_delivery','hiv_1st','hiv_retest','hiv_labour','cd4','cd4_count','initiate_art','bba','ga_adm','stage_of_labour','date_lbs','time_lbs','date_rm','time_rm','date_3cm','time_3cm','date_fully','time_fully','duration_active_phase','c.ga_del','date_del','time_del','mode_del','indication','type_ba','intact','episiotomy','degree_tear','m_art1','m_art2','m_art3','ind_other','d.il','ah','AP','PP','ph','spe','ecl','prl','rup','sep','opl','ret','mrp','md','stil','neo','pret','lbw','e.pos_com1','pos_com2','pos_com3','pos_com4','sterilisation','oral_con','Medroxyprogesterone','Norethisterone','Condoms','IUCD','Subdermal','mot_dis','mot_dis_date','mot_ref_status','mot_ref_date','mot_ref_to','mot_death','mot_date_death');

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
WHERE a.confirm_status = 1 and f.institute_id in $hoslist and a.date_adm between '$sdate' and '$edate' ";



$resultPart1 = $db->select($strSQL,false,true);

$out = "";
$out .= implode('|', $colname);

$strSQL = "SELECT count(*) FROM fmn1_outcome WHERE record_id in (SELECT record_id FROM fmn1_registerrecord WHERE confirm_status = 1) group by record_id order by count(*) desc";
$resultCheckMax = $db->select($strSQL,false,true);
$max = 1;
if($resultCheckMax){
	if(sizeof($resultCheckMax)>0)
		$max = $resultCheckMax[0][0];
}

$arr = array();
for($i = 1; $i <= $max; $i++){
	$arr[] = "ocm_id_no".$i;
	$arr[] = "gender_no".$i;
	$arr[] = "alive_no".$i;
	$arr[] = "stillbirth_no".$i;
	$arr[] = "ag5_no".$i;
	$arr[] = "ag10_no".$i;
	$arr[] = "rbm_no".$i;
	$arr[] = "birth_wieght_no".$i;
	$arr[] = "hc_no".$i;
	$arr[] = "fetal_length_no".$i;
	$arr[] = "bdf_no".$i;
	$arr[] = "bdf_identify_no".$i;
	$arr[] = "bdn_no".$i;
	$arr[] = "ebf_no".$i;
	$arr[] = "bf_no".$i;
	$arr[] = "ff_no".$i;
	$arr[] = "skin2skin_no".$i;
	$arr[] = "pmctv_lb_no".$i;
	$arr[] = "nb_adm_no".$i;
	$arr[] = "nb_date_adm_no".$i;
	$arr[] = "nb_time_adm_no".$i;
	$arr[] = "nb_neonatal_no".$i;
	$arr[] = "nb_refer_no".$i;
	$arr[] = "nb_refer_facility_no".$i;
}

$out .= implode('|', $arr);

$arr = array();
for($i = 1; $i <= $max; $i++){
	$arr[] = "post_pmtct_no".$i;
	$arr[] = "post_ini_azt_no".$i;
	$arr[] = "post_nev_no".$i;
	$arr[] = "post_nev72_no".$i;
	$arr[] = "post_nev6_no".$i;
	$arr[] = "post_ifm_no".$i;
	$arr[] = "post_vitk_no".$i;
	$arr[] = "post_polio_no".$i;
	$arr[] = "post_bcg_no".$i;
	$arr[] = "post_admitted_no".$i;
	$arr[] = "post_disch_no".$i;
	$arr[] = "post_disch_date_no".$i;
	$arr[] = "post_refer_no".$i;
	$arr[] = "post_ref_to_facility_no".$i;
	$arr[] = "post_ref_date_no".$i;
	$arr[] = "post_death_no".$i;
	$arr[] = "post_deathdate_no".$i;
}
$out .= implode('|', $arr);
$out .= "\r\n";


foreach($resultPart1 as $v){
	$arr2 = array();
	for($i = 0; $i < sizeof($v)/2; $i++){
		$arr2[] = str_replace('\r\n', ' ', mysql_real_escape_string($v[$i]));
	}


	$strSQL = "SELECT ocm_id,gender,alive,stillbirth,ag5,ag10,rbm,birth_wieght,hc,fetal_length,bdf,bdf_identify,bdn,ebf,bf,ff,skin2skin,pmctv_lb, nb_adm, nb_date_adm, nb_time_adm, nb_neonatal, nb_refer,nb_refer_facility FROM fmn1_outcome  WHERE record_id = '".$v[0]."' ";
	$resultNB = $db->select($strSQL,false,true);

	$arr3 = array();

	if($resultNB){
		foreach($resultNB as $nb){
			for($i = 0; $i < sizeof($nb)/2; $i++){
				if(isset($nb[$i])){
					$arr3[] = str_replace('\r\n', ' ', mysql_real_escape_string($nb[$i]));
					// $arr3[] = $nb[$i];
				}
			}
		}

		if((sizeof($resultNB)*24) < ($max*24)){
			//Calculate blank td
			$avai = ($max*24) - (sizeof($resultNB)*24);
			for($j = 0; $j < $avai ; $j++){
				$arr3[] = ' ';
			}
		}
	} //End if $resultNB
	else{
		$avai = ($max*24);
			for($j = 0; $j < $avai ; $j++){
				$arr3[] = ' ';
			}
	}

	$arr4 = array();

	$strSQL = "SELECT pmtct_visit,initiated_azt,given_nevirapine,given_nevirapine72,nevirapine6,ifm,vitk,polio,bcg,admitted,discharge,discharge_date,refer,refer_to_facility,refer_date,death,deathdate FROM fmn1_other_postnatal WHERE record_id = '".$v[0]."' ";
	$resultNB = $db->select($strSQL,false,true);

	if($resultNB){
		foreach($resultNB as $nb){
			for($i = 0; $i < sizeof($nb)/2; $i++){
				if(isset($nb[$i])){
					$arr4[] = str_replace('\r\n', ' ', mysql_real_escape_string($nb[$i]));
				}
			}
		}

		if((sizeof($resultNB)*18) < ($max*18)){
			//Calculate blank td
			$avai = ($max*18) - (sizeof($resultNB)*18);
			for($j = 0; $j < $avai ; $j++){
				$arr4[] = ' ';
			}
		}
	}else{
		$avai = ($max*18);
			for($j = 0; $j < $avai ; $j++){
				$arr4[] = ' ';
			}
	}

	$out .= implode('|', $arr2);
	$out .= implode('|', $arr3);
	$out .= implode('|', $arr4)."\r\n";


}


print $out;
?>
