<?php	
	//require "./../../lib/server-config.php";
	require("./../../lib/connect.class.php");
	
	$db = new database();
	$db->connect('si_simanh','ge#meiZ3','sa_simanh');

	$condition = $_POST['condition'];
	$condition1 = $_POST['con2'];
	$condition2 = $_POST['con3'];
	$conString = '';
	switch ($condition){
		case 0 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
WHERE a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 1 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_delivery d on a.record_id = d.record_id WHERE a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 2 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username inner join fmn1_institute c on b.institute_id = c.institute_id inner join fmn1_outcome d on a.record_id = d.record_id WHERE a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 3 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username inner join fmn1_institute c on b.institute_id = c.institute_id inner join fmn1_outcome d on a.record_id = d.record_id WHERE d.alive = 1 and  a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		//Complciation in labour ----------------------------
		case 4 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.il = 1 and a.confirm_status = 1  and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 5 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.ah = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 6 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.ph = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 7 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.spe = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 8 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.ecl = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 9 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.prl = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 10 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.sup = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 11 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.sep = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;	
		case 12 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.opl = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 13 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.ret = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 14 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.mrp = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 15 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.md = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 16 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.stil = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 17 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.neo = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 18 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.pret = 1 and a.confirm_status = 1";	break;
		case 19 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_complication_delivery d on a.record_id = d.record_id WHERE d.lbw = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		//Complication ar postnatal --------------------------------
		case 20 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_postnatal d on a.record_id = d.record_id WHERE d.pos_com1 = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 21 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_postnatal d on a.record_id = d.record_id WHERE d.pos_com2 = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 22 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_postnatal d on a.record_id = d.record_id WHERE d.pos_com3 = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		case 23 : $conString = "SELECT * FROM `fmn1_registerrecord` a inner join fmn1_userdescription b on a.username = b.username 
inner join fmn1_institute c on b.institute_id = c.institute_id 
inner join fmn1_postnatal d on a.record_id = d.record_id WHERE d.pos_com4 = 1 and a.confirm_status = 1 and a.date_adm between '".$_POST['con2']."' and '".$_POST['con3']."'";	break;
		
	}

	$result = $db->select($conString,false,true);

	for($i=0;$i<count($result);$i++){
		//$return[$i]["institute_latitute"] = $conString;
		$return[$i]["institute_latitute"] = $result[$i]['institute_latitute'];
		$return[$i]["institute_longitude"] = $result[$i]['institute_longitude'];
		$return[$i]["record_id"] = $result[$i]['record_id'];
	}
	
	echo json_encode($return);
	$db->disconnect();

?>