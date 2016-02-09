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

$listString = array("record_id",
"date_ent",
"time_ent",
"date_adm",
"time_adm",
"refer_in_status",
"refer_in_facility",
"stage_of_patient",
"folder_no",
"point_no",
"pid",
"p_fname",
"p_mname",
"p_lname",
"p_address",
"p_phone",
"p_dob",
"p_cage",
"username",
"confirm_status",
"gravidity",
"parity",
"anc_attend",
"ga1st",
"ga20w",
"no_anc",
"rh",
"anti_d",
"rpr",
"rpr_treated",
"hiv_status",
"on_art_delivery",
"hiv_1st",
"hiv_retest",
"hiv_labour",
"cd4",
"cd4_count",
"initiate_art",
"bba",
"ga_adm",
"stage_of_labour",
"date_lbs",
"time_lbs",
"date_rm",
"time_rm",
"date_3cm",
"time_3cm",
"date_fully",
"time_fully",
"duration_active_phase",
"ga_del",
"date_del",
"time_del",
"mode_del",
"indication",
"type_ba",
"intact",
"episiotomy",
"degree_tear",
"m_art1",
"m_art2",
"m_art3",
"ind_other",
"il",
"ah",
"AP",
"PP",
"ph",
"spe",
"ecl",
"prl",
"rup",
"sep",
"opl",
"ret",
"mrp",
"md",
"stil",
"neo",
"pret",
"lbw");

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

$strSQL = "SELECT
a.record_id,
a.date_ent,
a.time_ent,
a.date_adm,
a.time_adm,
a.refer_in_status,
a.refer_in_facility,
a.stage_of_patient,
a.folder_no,
a.point_no,
a.pid,
a.p_fname,
a.p_mname,
a.p_lname,
a.p_address,
a.p_phone,
a.p_dob,
a.p_cage,
a.username,
a.confirm_status,
b.gravidity,
b.parity,
b.anc_attend,
b.ga1st,
b.ga20w,
b.no_anc,
b.rh,
b.anti_d,
b.rpr,
b.rpr_treated,
b.hiv_status,
b.on_art_delivery,
b.hiv_1st,
b.hiv_retest,
b.hiv_labour,
b.cd4,
b.cd4_count,
b.initiate_art,
b.bba,
b.ga_adm,
b.stage_of_labour,
b.date_lbs,
b.time_lbs,
b.date_rm,
b.time_rm,
b.date_3cm,
b.time_3cm,
b.date_fully,
b.time_fully,
b.duration_active_phase,
c.ga_del,
c.date_del,
c.time_del,
c.mode_del,
c.indication,
c.type_ba,
c.intact,
c.episiotomy,
c.degree_tear,
c.m_art1,
c.m_art2,
c.m_art3,
c.ind_other,
d.il,
d.ah,
d.AP,
d.PP,
d.ph,
d.spe,
d.ecl,
d.prl,
d.rup,
d.sep,
d.opl,
d.ret,
d.mrp,
d.md,
d.stil,
d.neo,
d.pret,
d.lbw
FROM
fmn1_registerrecord AS a
INNER JOIN fmn1_userdescription f on a.username = f.username
LEFT JOIN fmn1_obstetric AS b ON a.record_id = b.record_id
LEFT JOIN fmn1_delivery AS c ON a.record_id = c.record_id
LEFT JOIN fmn1_complication_delivery AS d ON a.record_id = d.record_id
WHERE a.confirm_status = 1 and f.institute_id in $hoslist and a.date_adm between '$sdate' and '$edate'";

$resultPart1 = $db->select($strSQL,false,true);

$out = "";
$out .= implode('|', $listString);


$out .= "\r\n";


foreach($resultPart1 as $v){
	$arr2 = array();
	for($i = 0; $i < sizeof($v)/2; $i++){
		$arr2[] = str_replace('\r\n', ' ', mysql_real_escape_string($v[$i]));
	}
	$out .= implode('|', $arr2)."\r\n";
}

print $out;
?>
