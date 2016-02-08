<?php
if(fopen("../bin/server-config.txt", "r")){
	
}else{
	print "Can not open confugusation file!";
	exit();	
}
//exit();
$myfile = fopen("../bin/server-config.txt", "r") or die("Unable to open file!");
$c = 1;

$u = '';$p = ''; $dbn = '';$tbf = '';
while(!feof($myfile)) {	
	$buff = fgets($myfile);
	if($c==4){		//username
		$u = $buff;
	}else if($c==5){	//password
		$p = $buff;
	}else if($c==6){	//db name
		$dbn = $buff;
	}else if($c==7){	//db name
		$tbf = $buff;
	}
	$c++;
	//echo $c.$buff."<br>";
}
fclose($myfile);
?>