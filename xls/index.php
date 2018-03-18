<?php

error_reporting(E_ALL);
set_time_limit(0);

date_default_timezone_set('Europe/London');

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>PHPExcel Reader Example #01</title>

</head>
<body>

<h1>PHPExcel Reader Example #01</h1>
<h2>Simple File Reader using PHPExcel_IOFactory::load()</h2>
<?php

/** Include path **/
set_include_path(get_include_path() . PATH_SEPARATOR . '../../../Classes/');

/** PHPExcel_IOFactory */
include 'PHPExcel/IOFactory.php';


$inputFileName = 'mdo_eph_ainoussera.xlsx';
echo 'Loading file ',pathinfo($inputFileName,PATHINFO_BASENAME),' using IOFactory to identify the format<br />';
$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);


echo '<hr />';

$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
// var_dump($sheetData);
// print_r($sheetData);
if (isset($sheetData)) {
    echo 'Cette variable existe, donc je peux l\'afficher.';
}
echo '<br/>';
echo $result = count($sheetData);
echo '<br/>';
echo $sheetData['2']['B'];
echo '<pre>';print_r ($sheetData);echo '<pre>';


for ($i = 2; $i <= $result ; $i++) {
$A=$sheetData[$i]['A'];    
$B0=explode("-",$sheetData[$i]['B']);    
$B=$B0[1].'-'.$B0[0].'-'.'20'.$B0[2];

$C0=explode(" ",$sheetData[$i]['C']);    
$C=$C0[0].'_'.$C0[1];

$D=$sheetData[$i]['D'];    
$E=$sheetData[$i]['E'];    
$F=$sheetData[$i]['F'];    
$G=$sheetData[$i]['G'];    
$H=$sheetData[$i]['H'];    
$I=$sheetData[$i]['I'];    
   
	
	echo $A.'_'.$B.'_'.$C.'_'.$D;
	echo '<br/>';// echo $i;
}





?>
<body>
</html>