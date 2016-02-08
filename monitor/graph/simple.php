<?php // content="text/plain; charset=utf-8"
require_once ('../../jpgraph/src/jpgraph.php');
require_once ('../../jpgraph/src/jpgraph_bar.php');

require("../../lib/connect.class.php");

$db = new database();
$db->connect();

$color = array("blue","lightgray","wheat","red","green","yellow","black","orange");

/********* Setting up hospital list ***********/
$hos = array();
$hoslist = "(";
//Splite hospital
if(isset($_GET['hospital'])){
	$hos = explode('|',$_GET['hospital']);
	foreach($hos as $h){
		if($h!=''){
			$hoslist .= "'".$h."',";
		}else{
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

foreach($hos as $v){
	//print $v."<br>";	
}

/******************************************/


//Start date
$sdate = date('Y-m-')."01";
if(isset($_GET['sdate']))
	$sdate = $_GET['sdate'];

//End date
$edate = date('Y-m-d');
if(isset($_GET['edate']))
	$edate = $_GET['edate'];
	
//Graph summarize category
$case = 1;
if(isset($_GET['case']))
	$case = $_GET['case'];
	
$query = 0;
if(isset($_GET['graphType']))
	$query = $_GET['graphType'];

$view = 0;
if(isset($_GET['view']))
	$view = $_GET['view'];	

//Each date between 2 date	
$dateRa = array();
$dateRaValue = array();

$datePeriod = returnDates($sdate, $edate);

$a = sizeof($datePeriod);
//print $a."<br>";
$b = 1;
foreach($datePeriod as $date) {
	
    //echo $date->format('Y-m-d'), PHP_EOL;
	//$dateRa[] = $date->format('Y-m-d');
	if($b!=($a)){
		
		//echo $b.", ".$date;
		$dateRa[] = $date;
	}
	//echo "<br>";
	$b++;
}

//print sizeof($dateRa)."<br>";
foreach($dateRa as $eachDate){
	//print $eachDate."<br>";
	$dateRaValue[] = substr($eachDate,5);
}

$strSQL = '';
//Daily
$xbarValue = array();
if($query==0){
	//View = all hospital
	foreach($dateRa as $eachDate){
		if($case==1){
			$strSQL = "SELECT count(*) FROM fmn1_registerrecord WHERE username in (SELECT username FROM fmn1_userdescription WHERE institute_id in $hoslist) and date_adm = '".$eachDate."' and confirm_status = 1";
		}else if($case==2){
			$strSQL = "SELECT count(*) FROM fmn1_registerrecord a inner join fmn1_delivery b on a.record_id = b.record_id
			 		   WHERE a.username in (SELECT username FROM fmn1_userdescription WHERE institute_id in $hoslist) and a.date_adm = '".$eachDate."' and a.confirm_status = 1";
		}else if($case==3){
			$strSQL = "SELECT count(*) FROM fmn1_registerrecord a inner join fmn1_delivery b on a.record_id = b.record_id
						inner join fmn1_outcome c on a.record_id = c.record_id 
			 		   WHERE a.username in (SELECT username FROM fmn1_userdescription WHERE institute_id in $hoslist) and a.date_adm = '".$eachDate."' and a.confirm_status = 1";
		}else if($case==4){
			$strSQL = "SELECT count(*) FROM fmn1_registerrecord a inner join fmn1_delivery b on a.record_id = b.record_id
						inner join fmn1_outcome c on a.record_id = c.record_id 
			 		   WHERE a.username in (SELECT username FROM fmn1_userdescription WHERE institute_id in $hoslist) and a.date_adm = '".$eachDate."' and a.confirm_status = 1 and c.alive = 1";
		}else if(($case>4) and ($case<=20)){
			//$com = $case-4;
			switch($case){
				case 5: $c = 'il';break;
				case 6: $c = 'ah';break;
				case 7: $c = 'ph';break;
				case 8: $c = 'spe';break;
				case 9: $c = 'ecl';break;
				case 10: $c = 'prl';break;
				case 11: $c = 'rup';break;
				case 12: $c = 'sep';break;
				case 13: $c = 'opl';break;
				case 14: $c = 'ret';break;
				case 15: $c = 'mrp';break;
				case 16: $c = 'md';break;
				case 17: $c = 'stil';break;
				case 18: $c = 'neo';break;
				case 19: $c = 'pret';break;
				case 20: $c = 'lbw';break;
			}
			$strSQL = "SELECT count(*) FROM fmn1_registerrecord a inner join fmn1_complication_delivery b 
					   on a.record_id = b.record_id
			 		   WHERE a.username in (SELECT username FROM fmn1_userdescription WHERE institute_id in $hoslist) 
					   and a.date_adm = '".$eachDate."' and a.confirm_status = 1 
					   and b.$c = 1";
			//print $strSQL."<br>";
		}else if(($case>=21) and ($case<=24)){
			switch($case){
				case 21: $c = 'pos_com1';break;
				case 22: $c = 'pos_com2';break;
				case 23: $c = 'pos_com3';break;
				case 24: $c = 'pos_com4';break;
			}
			
			$strSQL = "SELECT count(*) FROM fmn1_registerrecord a inner join fmn1_postnatal b 
					   on a.record_id = b.record_id
			 		   WHERE a.username in (SELECT username FROM fmn1_userdescription WHERE institute_id in $hoslist) 
					   and a.date_adm = '".$eachDate."' and a.confirm_status = 1 
					   and b.$c = 1";
		}
		
		
		
		$resultValue = $db->select($strSQL,false,true);
		if($resultValue){
			$xbarValue[] = $resultValue[0][0];
		}else{
			$xbarValue[] = 0;
		}
	}
}else{	//Query = 1 : monthly
	foreach($dateRa as $eachDate){
		if($case==1){
			$strSQL = "SELECT count(*) FROM fmn1_registerrecord WHERE username in (SELECT username FROM fmn1_userdescription WHERE institute_id in $hoslist) and date_adm = '".$eachDate."' and confirm_status = 1";
		}else if($case==2){
			$strSQL = "SELECT count(*) FROM fmn1_registerrecord a inner join fmn1_delivery b on a.record_id = b.record_id
			 		   WHERE a.username in (SELECT username FROM fmn1_userdescription WHERE institute_id in $hoslist) and a.date_adm = '".$eachDate."' and a.confirm_status = 1";
		}else if($case==3){
			$strSQL = "SELECT count(*) FROM fmn1_registerrecord a inner join fmn1_delivery b on a.record_id = b.record_id
						inner join fmn1_outcome c on a.record_id = c.record_id 
			 		   WHERE a.username in (SELECT username FROM fmn1_userdescription WHERE institute_id in $hoslist) and a.date_adm = '".$eachDate."' and a.confirm_status = 1";
		}else if($case==4){
			$strSQL = "SELECT count(*) FROM fmn1_registerrecord a inner join fmn1_delivery b on a.record_id = b.record_id
						inner join fmn1_outcome c on a.record_id = c.record_id 
			 		   WHERE a.username in (SELECT username FROM fmn1_userdescription WHERE institute_id in $hoslist) and a.date_adm = '".$eachDate."' and a.confirm_status = 1 and c.alive = 1";
		}else if(($case>4) and ($case<=20)){
			//$com = $case-4;
			switch($case){
				case 5: $c = 'il';break;
				case 6: $c = 'ah';break;
				case 7: $c = 'ph';break;
				case 8: $c = 'spe';break;
				case 9: $c = 'ecl';break;
				case 10: $c = 'prl';break;
				case 11: $c = 'rup';break;
				case 12: $c = 'sep';break;
				case 13: $c = 'opl';break;
				case 14: $c = 'ret';break;
				case 15: $c = 'mrp';break;
				case 16: $c = 'md';break;
				case 17: $c = 'stil';break;
				case 18: $c = 'neo';break;
				case 19: $c = 'pret';break;
				case 20: $c = 'lbw';break;
			}
			$strSQL = "SELECT count(*) FROM fmn1_registerrecord a inner join fmn1_complication_delivery b 
					   on a.record_id = b.record_id
			 		   WHERE a.username in (SELECT username FROM fmn1_userdescription WHERE institute_id in $hoslist) 
					   and a.date_adm = '".$eachDate."' and a.confirm_status = 1 
					   and b.$c = 1";
			//print $strSQL."<br>";
		}else if(($case>=21) and ($case<=24)){
			switch($case){
				case 21: $c = 'pos_com1';break;
				case 22: $c = 'pos_com2';break;
				case 23: $c = 'pos_com3';break;
				case 24: $c = 'pos_com4';break;
			}
			
			$strSQL = "SELECT count(*) FROM fmn1_registerrecord a inner join fmn1_postnatal b 
					   on a.record_id = b.record_id
			 		   WHERE a.username in (SELECT username FROM fmn1_userdescription WHERE institute_id in $hoslist) 
					   and a.date_adm = '".$eachDate."' and a.confirm_status = 1 
					   and b.$c = 1";
		}
		
		
		
		$resultValue = $db->select($strSQL,false,true);
		if($resultValue){
			$xbarValue[] = $resultValue[0][0];
		}else{
			$xbarValue[] = 0;
		}
	}//End for
}//End if qurty
$max = 1;
//print "xbarValue size : ".sizeof($xbarValue)."<br>";
foreach($xbarValue as $v){
	//print $v."<br>";	
	if($v > $max){
		$max = $v;	
	}
}



// Create the graph. These two calls are always required
$graph = new Graph($_GET['gtd'],300,'auto');
$graph->SetScale("textlin",0,($max + (0.1 * $max)*10));

//$theme_class=new UniversalTheme;
//$graph->SetTheme($theme_class);

//$graph->yaxis->SetTickPositions('auto');
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels($dateRaValue);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);
$graph->xaxis->SetLabelAngle(90);
$graph->xaxis->title->Set("Date");
$graph->yaxis->title->Set("No. of cases");

// Create the bar plots
$b1plot = new BarPlot($xbarValue);
if($_GET['dis']==1){
	$b1plot->value->Show();
}

// Create the grouped bar plot
//$gbplot = new GroupBarPlot(array($b1plot));
// ...and add it to the graPH
//$graph->Add($gbplot);
$graph->Add($b1plot);


$b1plot->SetColor("white");
$b1plot->SetFillColor("blue");


$sTitle = '';
switch($case){
	case 1: $sTitle = 'Admitted'; break;
	case 2: $sTitle = 'Delivery'; break;
	case 3: $sTitle = 'Birth'; break;
	case 4: $sTitle = 'Livebirth'; break;
	case 5: $sTitle = 'Induction of labour'; break;
	case 6: $sTitle = 'Antepartum haemorrhage'; break;
	case 7: $sTitle = 'Postpartum haemorrhage'; break;
	case 8: $sTitle = 'Severe pre eclampsia'; break;
	case 9: $sTitle = 'Eclampsia'; break;
	case 10: $sTitle = 'Prolonged rupture of membranes'; break;
	case 11: $sTitle = 'Ruptured uterus'; break;
	case 12: $sTitle = 'Sepsis'; break;
	case 13: $sTitle = 'Obstructed or prolonged labour'; break;
	case 14: $sTitle = 'Retained placenta'; break;
	case 15: $sTitle = 'Manual removal of placenta'; break;
	case 16: $sTitle = 'Maternal death'; break;
	case 17: $sTitle = 'Stillbirth'; break;
	case 18: $sTitle = 'Neonatal death'; break;
	case 19: $sTitle = 'Preterm birth'; break;
	case 20: $sTitle = 'Low birth weight'; break;
	case 21: $sTitle = 'Postpartum haemorrhage'; break;
	case 22: $sTitle = 'Postpartum eclampsia'; break;
	case 23: $sTitle = 'Postpartum sepsis'; break;
	case 24: $sTitle = 'Postpartum maternal death'; break;
}
$graph->title->Set("\nTotal ". $sTitle."\n                From : ".$sdate." to ".$edate."\n");

// Display the graph
$graph->Stroke();
?>
<?php
function returnDates($fromdate, $todate) {
    /*$fromdate = \DateTime::createFromFormat('Y-m-d', $fromdate);
    $todate = \DateTime::createFromFormat('Y-m-d', $todate);
    return new \DatePeriod(
        $fromdate,   new \DateInterval('P1D'), $todate->modify('+1 day')
    );*/
	$dates = array($fromdate);
    while(end($dates) < $todate){
        $dates[] = date('Y-m-d', strtotime(end($dates).' +1 day'));
    }
    return $dates;
}
?>
