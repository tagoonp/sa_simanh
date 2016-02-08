<?php

$noOfDelivery = 0;
$hivMom = 0;
function calAdm($inst,$db,$tbf){
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$inst."') and confirm_status = 1";
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}

}

function calSumAdm($db,$tbf){
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1";
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}

}

function calDel($inst,$db,$tbf){
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a inner join ".substr(strtolower($tbf),0,-2)."delivery b on a.record_id = b.record_id WHERE a.username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$inst."') and a.confirm_status = 1";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumDel($db,$tbf){
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a inner join ".substr(strtolower($tbf),0,-2)."delivery b on a.record_id = b.record_id WHERE a.confirm_status = 1";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calBirth($inst,$db,$tbf){
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE record_id in
		(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE username in (SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$inst."') and confirm_status = 1)
		";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumBirth($db,$tbf){
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE record_id in
		(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1)
		";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumBirthReport($db,$tbf,$case){
	global $sdate,$edate,$hos;

	$dateFilter = " and date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!= 0 ){
		$buff = " and username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."' )";
	}

	$condition = '';
		switch($case){
			case 1:	$condition = " and birth_wieght between '500' and '999'"; break;
			case 2:	$condition = " and birth_wieght between '1000' and '1499'"; break;
			case 3:	$condition = " and birth_wieght between '1500' and '1999'"; break;
			case 4:	$condition = " and birth_wieght between '2000' and '2499'"; break;
			case 5:	$condition = " and birth_wieght > '2500'"; break;
			case 0 : $condition = " and (( birth_wieght between '500' and '999') or (birth_wieght between '1000' and '1499') or (birth_wieght between '1500' and '1999') or (birth_wieght between '2000' and '2499') or (birth_wieght > '2500')) "; break;
			default : $condition = " ";
		}
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE record_id in
		(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1 $dateFilter $buff) $condition
		";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumLBirthReport($db,$tbf,$case){

	global $sdate,$edate,$hos;

	$dateFilter = " and date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!= 0 ){
		$buff = " and username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."' )";
	}

	$condition = '';
		switch($case){
			case 1:	$condition = " and birth_wieght between '500' and '999'"; break;
			case 2:	$condition = " and birth_wieght between '1000' and '1499'"; break;
			case 3:	$condition = " and birth_wieght between '1500' and '1999'"; break;
			case 4:	$condition = " and birth_wieght between '2000' and '2499'"; break;
			case 5:	$condition = " and birth_wieght > '2500'"; break;
			case 0 : $condition = " and (( birth_wieght between '500' and '999') or (birth_wieght between '1000' and '1499') or (birth_wieght between '1500' and '1999') or (birth_wieght between '2000' and '2499') or (birth_wieght > '2500')) "; break;
			default : $condition = " ";
		}
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE alive = 1 and record_id in
		(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1 $dateFilter $buff) $condition
		";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumStillbornReport($db,$tbf,$case,$stil){
	global $sdate,$edate,$hos;

	$dateFilter = " and date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!= 0 ){
		$buff = " and username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."' )";
	}

	$condition = '';
	$condition2 = '';
		switch($case){
			case 1:	$condition = " and birth_wieght between '500' and '999'"; break;
			case 2:	$condition = " and birth_wieght between '1000' and '1499'"; break;
			case 3:	$condition = " and birth_wieght between '1500' and '1999'"; break;
			case 4:	$condition = " and birth_wieght between '2000' and '2499'"; break;
			case 5:	$condition = " and birth_wieght > '2500'"; break;
			case 0: 	$condition = " and (( birth_wieght between '500' and '999') or (birth_wieght between '1000' and '1499') or (birth_wieght between '1500' and '1999') or (birth_wieght between '2000' and '2499') or (birth_wieght > '2500')) "; break;
			default : $condition = " ";
		}

		switch($stil){
			case 0: 	$condition2 = " and alive = 0 and stillbirth in ( 1, 2)"; break;
			case 1: 	$condition2 = " and alive = 0 and stillbirth = 1"; break;
			case 2: 	$condition2 = " and alive = 0 and stillbirth = 2"; break;
		}
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE record_id in
		(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1 $dateFilter $buff) $condition $condition2
		";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumNeonatalReport($db,$tbf,$case){

	global $sdate,$edate,$hos;

	$dateFilter = " and date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!= 0 ){
		$buff = " and username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."' )";
	}

	$condition = '';
	$condition2 = '';
		switch($case){
			case 1:	$condition = " birth_wieght between '500' and '999'"; break;
			case 2:	$condition = " birth_wieght between '1000' and '1499'"; break;
			case 3:	$condition = " birth_wieght between '1500' and '1999'"; break;
			case 4:	$condition = " birth_wieght between '2000' and '2499'"; break;
			case 5:	$condition = " birth_wieght > '2500'"; break;
			default : $condition = " 1";
		}

		//$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE record_id in
		//(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1) $condition $condition2
		//";

		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."complication_delivery WHERE neo = '1' and record_id in (SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE $condition) and record_id in
		(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1 $dateFilter $buff)
		";

		//print $strSQL;

		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumBOAReport($db,$tbf){
	global $sdate,$edate,$hos;

	$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!= 0 ){
		$buff = " and a.username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."' )";
	}

	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a inner join ".substr(strtolower($tbf),0,-2)."obstetric b
			   on a.record_id = b.record_id
			   WHERE a.confirm_status = 1 and b.bba = 1 $buff $dateFilter";

		//print $strSQL;

		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumMODReport($db,$tbf,$case){
	global $sdate,$edate,$hos;

	$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!= 0 ){
		$buff = " and a.username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."' )";
	}

	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a inner join ".substr(strtolower($tbf),0,-2)."delivery b
			   on a.record_id = b.record_id
			   WHERE a.confirm_status = 1 and b.mode_del = '".$case."' $dateFilter $buff";

		//print $strSQL;

		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

//Multiple pregnancies
function calSumPregReport($db,$tbf,$case){
	global $sdate,$edate,$hos;

	$dateFilter = " and date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!= 0 ){
		$buff = " and username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."' )";
	}

	switch($case){
		//Pregnancies
		case 1: $strSQL = "SELECT record_id, count(*) FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE record_id in
		(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1 $dateFilter $buff) GROUP BY record_id HAVING COUNT(*) > 1";

			   ;break;
		//Neonates
		case 2: $strSQL = "SELECT record_id, count(*) FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE record_id in
		(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1  $dateFilter $buff) GROUP BY record_id HAVING COUNT(*) > 1";
		break;
	}



		//print $strSQL;

		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			if($case==1){
				print sizeof($resultSum);
			}else{
				$val = 0;
				foreach($resultSum as $v){
					$val += $v['count(*)'];
				}
				print $val;
			}

		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumAODReport($db,$tbf,$case){
	global $sdate,$edate,$hos;

	$dateFilter = " and date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!= 0 ){
		$buff = " and username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."' )";
	}

	$condition = '';
	$condition2 = '';
		switch($case){
			case 1:	$condition = " birth_wieght between '500' and '999'"; break;
			case 2:	$condition = " birth_wieght between '1000' and '1499'"; break;
			case 3:	$condition = " birth_wieght between '1500' and '1999'"; break;
			case 4:	$condition = " birth_wieght between '2000' and '2499'"; break;
			case 5:	$condition = " birth_wieght > '2500'"; break;	
			
			default : $condition = " 1";
		}

		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."other_postnatal WHERE death = '1' and record_id in (SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE $condition) and record_id in
		(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1 $dateFilter $buff)
		";

		//print $strSQL;

		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function callBirth($inst,$db,$tbf){
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE alive = 1 and record_id in
		(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE username in (SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$inst."') and confirm_status = 1)
		";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumlBirth($db,$tbf){
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE alive = 1 and record_id in
		(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1)
		";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calRefer($inst,$db,$tbf){
		$strSQL = "SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE username in (SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$inst."') and confirm_status = 1 and refer_in_status = 1
		";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumRefer($db,$tbf){
		$strSQL = "SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1 and refer_in_status = 1
		";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calComplication($inst,$db,$tbf,$com){
	$c = '';
	switch($com){
		case 1: $c = 'il';break;
		case 2: $c = 'ah';break;
		case 3: $c = 'ph';break;
		case 4: $c = 'spe';break;
		case 5: $c = 'ecl';break;
		case 6: $c = 'prl';break;
		case 7: $c = 'rup';break;
		case 8: $c = 'sep';break;
		case 9: $c = 'opl';break;
		case 10: $c = 'ret';break;
		case 11: $c = 'mrp';break;
		case 12: $c = 'md';break;
		case 13: $c = 'stil';break;
		case 14: $c = 'neo';break;
		case 15: $c = 'pret';break;
		case 16: $c = 'lbw';break;
	}
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."complication_delivery WHERE $c = '1' and record_id in (SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE username in (SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$inst."') and confirm_status = 1 )
		";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

//Morbidity marker
function calSumComplication($db,$tbf,$com){

	global $sdate,$edate,$hos;

	$dateFilter = " and date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!= 0 ){
		$buff = " and username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."' )";
	}

	//print $hos;
	$c = '';
	switch($com){
		case 1: $c = 'il';break;
		case 2: $c = 'ah';break;
		case 3: $c = 'ph';break;
		case 4: $c = 'spe';break;
		case 5: $c = 'ecl';break;
		case 6: $c = 'prl';break;
		case 7: $c = 'rup';break;
		case 8: $c = 'sep';break;
		case 9: $c = 'opl';break;
		case 10: $c = 'ret';break;
		case 11: $c = 'mrp';break;
		case 12: $c = 'md';break;
		case 13: $c = 'stil';break;
		case 14: $c = 'neo';break;
		case 15: $c = 'pret';break;
		case 16: $c = 'lbw';break;
	}
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."complication_delivery WHERE $c = '1' and record_id in
		(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1 $dateFilter $buff )
		";

		if($com == 17){
			$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE rbm = '1' and record_id in
			(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1 $dateFilter $buff )
		";
		}
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumComplication2($db,$tbf,$com){

	$c = '';
	switch($com){
		case 1: $c = 'il';break;
		case 2: $c = 'ah';break;
		case 3: $c = 'ph';break;
		case 4: $c = 'spe';break;
		case 5: $c = 'ecl';break;
		case 6: $c = 'prl';break;
		case 7: $c = 'rup';break;
		case 8: $c = 'sep';break;
		case 9: $c = 'opl';break;
		case 10: $c = 'ret';break;
		case 11: $c = 'mrp';break;
		case 12: $c = 'md';break;
		case 13: $c = 'stil';break;
		case 14: $c = 'neo';break;
		case 15: $c = 'pret';break;
		case 16: $c = 'lbw';break;
	}
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."complication_delivery WHERE $c = '1' and record_id in
		(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1  )
		";

		if($com == 17){
			$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."outcome WHERE rbm = '1' and record_id in
			(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1  )
		";
		}
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calComplicationPost($inst,$db,$tbf,$com){
	$c = '';
	switch($com){
		case 1: $c = 'pos_com1';break;
		case 2: $c = 'pos_com2';break;
		case 3: $c = 'pos_com3';break;
		case 4: $c = 'pos_com4';break;
	}
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."postnatal WHERE $c = '1' and record_id in (SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE username in (SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$inst."') and confirm_status = 1 )
		";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumComplicationPost($db,$tbf,$com){

	$c = '';
	switch($com){
		case 1: $c = 'pos_com1';break;
		case 2: $c = 'pos_com2';break;
		case 3: $c = 'pos_com3';break;
		case 4: $c = 'pos_com4';break;
	}
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."postnatal WHERE $c = '1' and record_id in
		(SELECT record_id FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1)
		";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

//Parity
function calSumParityReport($db,$tbf,$case){
	global $sdate,$edate,$hos;

	$dateFilter = " and b.date_adm between '$sdate' and '$edate'";

	$buff = '';
	if($hos!=0){
		$buff = " b.username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and ";
	}

	$condition = '';
	switch($case){
		//Primiparae
		case 1: $condition  = " and a.parity <= 1";break;
		//Multiparae
		case 2: $condition  = " and a.parity between 2 and 4";break;
		//Grand multiparae
		case 3: $condition  = " and a.parity > 4";break;
	}

	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."obstetric a inner join ".substr(strtolower($tbf),0,-2)."registerrecord b
				on a.record_id = b.record_id WHERE $buff b.confirm_status = 1 $condition $dateFilter";

		//print $strSQL;

		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

//Marternal age
function calSumMaternalAgeReport($db,$tbf,$case){
	global $sdate,$edate,$hos;

	$dateFilter = " and date_adm between '$sdate' and '$edate'";
	$buff = '';

	if($hos!=0){
		$buff = " and username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."')";
	}

	$condition = '';
	switch($case){
		//Primiparae
		case 1: $condition  = " and p_cage < 18";break;
		//Multiparae
		case 2: $condition  = " and p_cage between 18 and 19";break;
		//Grand multiparae
		case 3: $condition  = " and p_cage between 20 and 34";break;
		//Grand multiparae
		case 4: $condition  = " and p_cage > 34";break;
	}

	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord WHERE confirm_status = 1 $condition $dateFilter $buff";

		//print $strSQL;

		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumHIVReport($db,$tbf,$col,$val){
	global $sdate,$edate,$hos;

	$dateFilter = " and b.date_adm between '$sdate' and '$edate'";

	$buff = '';
	if($hos!=0){
		$buff = "b.username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
	}


	// $strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."obstetric a inner join ".substr(strtolower($tbf),0,-2)."registerrecord b
	// 			on a.record_id = b.record_id inner join ".substr(strtolower($tbf),0,-2)."userdescription c on b.username=c.username WHERE c.institute_id = '".$hos."' and b.confirm_status = 1 and $col = $val $dateFilter";

	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."obstetric a inner join ".substr(strtolower($tbf),0,-2)."registerrecord b
				on a.record_id = b.record_id inner join ".substr(strtolower($tbf),0,-2)."userdescription c on b.username=c.username WHERE c.institute_id = '".$hos."' and b.confirm_status = 1 and $col = $val $dateFilter";


	$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			//print $strSQL;
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

// institute_id = '".$hos."'

function calSumTherapy($db,$tbf,$col,$table){
	global $sdate,$edate,$hos;

	$dateFilter = " and b.date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!=0){
		$buff = "b.username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
	}

	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."$table a inner join ".substr(strtolower($tbf),0,-2)."registerrecord b
				on a.record_id = b.record_id WHERE $buff
				 b.confirm_status = 1 and a.$col = 1 $dateFilter ";
	$resultSum = $db->select($strSQL,false,true);

	//print $strSQL;
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calBBAstatus($db,$tbf,$table,$col,$tab,$val){
	global $sdate,$edate,$hos;

	$dateFilter = " and b.date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!=0){
		$buff = "b.username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
	}

	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."$table a inner join ".substr(strtolower($tbf),0,-2)."registerrecord b
			   on a.record_id = b.record_id
			   inner join ".substr(strtolower($tbf),0,-2)."complication_delivery c
			   on a.record_id = c.record_id
			   WHERE $buff a.$col = 1 and c.$tab = $val and
			   b.confirm_status = 1 and a.$col = 1 $dateFilter ";
	$resultSum = $db->select($strSQL,false,true);

	//print $strSQL;
	if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumDelivery($db,$tbf){
		global $sdate,$edate,$hos,$noOfDelivery;

		$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
		$buff = '';
		if($hos!=0){
			$buff = "a.username in
			(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
		}

		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a inner join ".substr(strtolower($tbf),0,-2)."delivery b on a.record_id = b.record_id WHERE $buff a.confirm_status = 1 $dateFilter ";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
			$noOfDelivery = sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumDeliverySub($db,$tbf,$col,$val){
	global $sdate,$edate,$hos,$noOfDelivery;

		$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
		$buff = '';
		if($hos!=0){
			$buff = "a.username in
			(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
		}

		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a inner join ".substr(strtolower($tbf),0,-2)."delivery b on a.record_id = b.record_id WHERE $buff a.confirm_status = 1 $dateFilter and b.$col = $val";
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumDeliverySubPercent($db,$tbf,$col,$val){
		global $sdate,$edate,$hos,$noOfDelivery;

		$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
		$buff = '';
		if($hos!=0){
			$buff = "a.username in
			(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
		}

		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a inner join ".substr(strtolower($tbf),0,-2)."delivery b on a.record_id = b.record_id WHERE $buff a.confirm_status = 1 $dateFilter and b.$col = $val";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			$np = round((sizeof($resultSum) / $noOfDelivery) * 100,2);
			print $np;
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumHIVTEst($db,$tbf,$table,$col,$val){
		global $sdate,$edate,$hos,$hivMom;
		$N = 0;
		$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
		$buff = '';
		if($hos!=0){
			$buff = "a.username in
			(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
		}

		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a
		inner join ".substr(strtolower($tbf),0,-2)."$table b on a.record_id = b.record_id
		WHERE $buff a.confirm_status = 1 $dateFilter";

		$resultSum = $db->select($strSQL,false,true);
		if($resultSum){
			$N = sizeof($resultSum);
		}

		//print $N." ";
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a
		inner join ".substr(strtolower($tbf),0,-2)."$table b on a.record_id = b.record_id
		WHERE $buff a.confirm_status = 1 $dateFilter and b.$col = $val";
		$resultSum = $db->select($strSQL,false,true);

		if($resultSum){
			print sizeof($resultSum)." (".round((sizeof($resultSum) / $N) * 100,2)."%)";
			if($val==3){
				$hivMom += sizeof($resultSum);
			}

		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calSumRPRTest($db,$tbf,$table,$col,$val,$crosstabVal){
		global $sdate,$edate,$hos;
		$N = 0;
		$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
		$buff = '';
		if($hos!=0){
			$buff = "a.username in
			(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
		}

		$anc = " and b.no_anc = ''";
		if($crosstabVal==1){
			$anc = " and b.no_anc <> ''";
		}

		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a
		inner join ".substr(strtolower($tbf),0,-2)."$table b on a.record_id = b.record_id
		WHERE $buff a.confirm_status = 1 $dateFilter and b.$col = $val $anc ";
		$resultSum = $db->select($strSQL,false,true);

		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calBDF($db,$tbf,$case,$val){
		global $sdate,$edate,$hos;
		$N = 0;
		$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
		$buff = '';
		if($hos!=0){
			$buff = "a.username in
			(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
		}

		$caseBuff = '';
		switch($case){
				case 1: $caseBuff = " and a.p_cage < 18 ";break;
				case 2: $caseBuff = " and a.p_cage between 18 and 19 ";break;
				case 3: $caseBuff = " and a.p_cage between 20 and 34 ";break;
				case 4: $caseBuff = " and a.p_cage > 34 ";break;

		}

		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a
		inner join ".substr(strtolower($tbf),0,-2)."outcome b on a.record_id = b.record_id
		WHERE $buff a.confirm_status = 1 $dateFilter $caseBuff and b.bdf = '$val' ";
		//print $strSQL;
		$resultSum = $db->select($strSQL,false,true);

		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calMA($db,$tbf,$case){
		global $sdate,$edate,$hos;
		$N = 0;
		$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
		$buff = '';
		if($hos!=0){
			$buff = "a.username in
			(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
		}

		$caseBuff = '';
		switch($case){
				case 1: $caseBuff = " and a.p_cage < 18 ";break;
				case 2: $caseBuff = " and a.p_cage between 18 and 19 ";break;
				case 3: $caseBuff = " and a.p_cage between 20 and 34 ";break;
				case 4: $caseBuff = " and a.p_cage > 34 ";break;

		}

		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a
		WHERE $buff a.confirm_status = 1 $dateFilter $caseBuff ";

		$resultSum = $db->select($strSQL,false,true);

		if($resultSum){
			print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calMAPercent($db,$tbf,$case){
		global $sdate,$edate,$hos;

		$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
		$buff = '';
		if($hos!=0){
			$buff = "a.username in
			(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
		}

		$N = 0;
		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a
		WHERE $buff a.confirm_status = 1 $dateFilter  ";
		$resultSumN = $db->select($strSQL,false,true);
		if($resultSumN){
				$N = sizeof($resultSumN);
		}

		$caseBuff = '';
		switch($case){
				case 1: $caseBuff = " and a.p_cage < 18 ";break;
				case 2: $caseBuff = " and a.p_cage between 18 and 19 ";break;
				case 3: $caseBuff = " and a.p_cage between 20 and 34 ";break;
				case 4: $caseBuff = " and a.p_cage > 34 ";break;

		}

		$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a
		WHERE $buff a.confirm_status = 1 $dateFilter $caseBuff ";

		$resultSum = $db->select($strSQL,false,true);

		if($resultSum){
			print round((sizeof($resultSum) / $N) * 100,2,2);
		//	print sizeof($resultSum);
		}else{
			print "<font color=\"#CCCCCC\">0</font>";
		}
}

function calComStat($db,$tbf,$table,$col,$val){
	global $sdate,$edate,$hos;

	$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!=0){
		$buff = "a.username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
	}

	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a
	inner join ".substr(strtolower($tbf),0,-2)."$table b on a.record_id = b.record_id
	WHERE $buff a.confirm_status = 1 $dateFilter and b.$col = '$val' ";
	//print $strSQL;
	$resultSum = $db->select($strSQL,false,true);

	if($resultSum){
		print sizeof($resultSum);
	}else{
		print "<font color=\"#CCCCCC\">0</font>";
	}

}

function calComStat2($db,$tbf,$col,$val){
	global $sdate,$edate,$hos;

	$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!=0){
		$buff = "a.username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
	}

	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a
	WHERE $buff a.confirm_status = 1 $dateFilter and a.$col = '$val' ";
	//print $strSQL;
	$resultSum = $db->select($strSQL,false,true);

	if($resultSum){
		print sizeof($resultSum);
	}else{
		print "<font color=\"#CCCCCC\">0</font>";
	}

}

function calDateDuration1($db,$tbf){
	global $sdate,$edate,$hos;

	$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!=0){
		$buff = "a.username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
	}

	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a
						inner join ".substr(strtolower($tbf),0,-2)."postnatal b on a.record_id = b.record_id
						WHERE $buff a.confirm_status = 1 $dateFilter and b.mot_dis_date <> '0000-00-00' ";

	//Get date adm
	$resultSum = $db->select($strSQL,false,true);

	if($resultSum){
		$mins = 0;
		foreach($resultSum as $v){
				$sdateTime = new DateTime($v['date_adm']." ".$v['time_adm']);
				$edateTime = new DateTime($v['mot_dis_date']." 00:00:00");

				    $interval = $sdateTime->diff($edateTime);
			    	$day   = $interval->format('%a');
				    $hours   = $interval->format('%h');
				    $minutes = $interval->format('%i');

					  $min = $day * 1440;
			      $min = $min + ($hours * 60);
						$min = $min + $minutes;
						$mins += $min;

		}

		 //print $mins."<br>";
		$buffs = array();
		$buffs = explode(' ',gmdate("d H:i:s",$mins * 60));
		print $buffs[0]." day(s) ";

		$buffm = array();
		$buffm = explode(':',$buffs[1]);
		print $buffm[0]." hr. ".$buffm[01]." min. ";

	}else{
		print "<font color=\"#CCCCCC\">0 day(s) 00 hr. 00 min.</font>";
	}

}

function calDateDuration2($db,$tbf){
	global $sdate,$edate,$hos;

	$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!=0){
		$buff = "a.username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
	}

	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a
						inner join ".substr(strtolower($tbf),0,-2)."outcome b on a.record_id = b.record_id
						inner join ".substr(strtolower($tbf),0,-2)."other_postnatal c on a.record_id = c.record_id
						WHERE $buff a.confirm_status = 1 $dateFilter and b.nb_date_adm <> '0000-00-00' and c.discharge_date <> '0000-00-00' ";

	//Get date adm\

	//print $strSQL;
	$resultSum = $db->select($strSQL,false,true);

	if($resultSum){
		$mins = 0;
		foreach($resultSum as $v){
				$sdateTime = new DateTime($v['date_adm']." ".$v['time_adm']);
				$edateTime = new DateTime($v['mot_dis_date']." 00:00:00");

						$interval = $sdateTime->diff($edateTime);
						$day   = $interval->format('%a');
						$hours   = $interval->format('%h');
						$minutes = $interval->format('%i');

						$min = $day * 1440;
						$min = $min + ($hours * 60);
						$min = $min + $minutes;
						$mins += $min;

		}

		//print $mins."<br>";
		$buffs = array();
		$buffs = explode(' ',gmdate("d H:i:s",$mins * 60));
		print $buffs[0]." day(s) ";

		$buffm = array();
		$buffm = explode(':',$buffs[1]);
		print $buffm[0]." hr. ".$buffm[01]." m. ";

	}else{
		print "<font color=\"#CCCCCC\">0 day(s) 00 hr. 00 min.</font>";
	}

}

function calSumImmune($db,$tbf,$table,$col){
	global $sdate,$edate,$hos;

	$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!=0){
		$buff = "a.username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
	}

	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a
						inner join ".substr(strtolower($tbf),0,-2)."$table b on a.record_id = b.record_id
						WHERE $buff a.confirm_status = 1 $dateFilter and b.$col = '1' ";

	//Get date adm\
	$resultSum = $db->select($strSQL,false,true);

	if($resultSum){
		print sizeof($resultSum);
	}else{
		print "<font color=\"#CCCCCC\">0</font>";
	}
}

function calSumImmune2($db,$tbf,$table,$col){
	global $sdate,$edate,$hos,$hivMom;

	$dateFilter = " and a.date_adm between '$sdate' and '$edate'";
	$buff = '';
	if($hos!=0){
		$buff = "a.username in
		(SELECT username FROM ".substr(strtolower($tbf),0,-2)."userdescription WHERE institute_id = '".$hos."') and";
	}

	$N = 0;
	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a
	inner join ".substr(strtolower($tbf),0,-2)."$table b on a.record_id = b.record_id
	inner join  ".substr(strtolower($tbf),0,-2)."obstetric c on a.record_id = c.record_id
	WHERE $buff a.confirm_status = 1 and c.hiv_status = 'Pos' $dateFilter ";
	$resultSumN = $db->select($strSQL,false,true);
	if($resultSumN){
			$N = sizeof($resultSumN);
	}

	//print $N." ".$hivMom." ";

	$strSQL = "SELECT * FROM ".substr(strtolower($tbf),0,-2)."registerrecord a
						inner join ".substr(strtolower($tbf),0,-2)."$table b on a.record_id = b.record_id
						inner join  ".substr(strtolower($tbf),0,-2)."obstetric c on a.record_id = c.record_id
						WHERE $buff a.confirm_status = 1 and c.hiv_status = 'Pos' $dateFilter and b.$col = '1' ";

	//Get date adm\
	$resultSum = $db->select($strSQL,false,true);

	if($resultSum){
		print sizeof($resultSum)." (".round((sizeof($resultSum) / $hivMom) * 100,2)."%)";
	}else{
		print "<font color=\"#CCCCCC\">0</font>";
	}
}
?>
