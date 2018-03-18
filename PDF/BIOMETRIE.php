<?php
function mysqlconnect()
{
$nomprenom ="tibaredha";
$db_host="localhost";
$db_name="mvc"; //probleme avec base de donnes  il faut change  gpts avec mvc   
$db_user="root";
$db_pass="";
$utf8 = "" ;
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
return $db;
}
require('fpdf.php');
require('fpdi.php');
$pdf = new FPDI();$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$pdf->AddPage();
$IDDNR=$_GET["uc"];
// $CIN="";//$_POST["CIN"];
// $DL="";//$_POST["DL"];
// $DLE="";//$_POST["DLE"];
mysqlconnect();
$query1 = "select * from DNR WHERE  id = '$IDDNR'";
$resultat1=mysql_query($query1);
$row = mysql_fetch_array($resultat1); 
$pdf->setSourceFile('Bio1.pdf');
$tplIdx = $pdf->importPage(1);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);

$arr1 = str_split($row['NOM']);

if(isset($arr1[0])){$pdf->SetXY(36,94);$pdf->Write(0,trim($arr1[0]));}
if(isset($arr1[1])){$pdf->SetXY(44,94);$pdf->Write(0,trim($arr1[1]));}
if(isset($arr1[2])){$pdf->SetXY(51,94);$pdf->Write(0,trim($arr1[2]));}
if(isset($arr1[3])){$pdf->SetXY(58,94);$pdf->Write(0,trim($arr1[3]));}
if(isset($arr1[4])){$pdf->SetXY(65,94);$pdf->Write(0,trim($arr1[4]));}
if(isset($arr1[5])){$pdf->SetXY(65+7,94);$pdf->Write(0,trim($arr1[5]));}
if(isset($arr1[6])){$pdf->SetXY(65+14,94);$pdf->Write(0,trim($arr1[6]));}
if(isset($arr1[7])){$pdf->SetXY(65+22,94);$pdf->Write(0,trim($arr1[7]));}
if(isset($arr1[8])){$pdf->SetXY(65+29,94);$pdf->Write(0,trim($arr1[8]));}
if(isset($arr1[9])){$pdf->SetXY(65+36,94);$pdf->Write(0,trim($arr1[9]));}
if(isset($arr1[10])){$pdf->SetXY(65+43,94);$pdf->Write(0,trim($arr1[10]));}
if(isset($arr1[11])){$pdf->SetXY(65+43+7,94);$pdf->Write(0,trim($arr1[11]));}
if(isset($arr1[12])){$pdf->SetXY(65+44+14,94);$pdf->Write(0,trim($arr1[12]));}
if(isset($arr1[13])){$pdf->SetXY(65+44+21,94);$pdf->Write(0,trim($arr1[13]));}
if(isset($arr1[14])){$pdf->SetXY(65+44+28,94);$pdf->Write(0,trim($arr1[14]));}
if(isset($arr1[15])){$pdf->SetXY(65+44+35,94);$pdf->Write(0,trim($arr1[15]));}


$pdf->SetXY(35,104);$pdf->Write(0,trim($row['PRENOM']));




// $pieces = explode(" ", $pizza);
 // $pieces[0]; // piece1
 // $pieces[1]; // piece2


// $d1=substr($row['DATENAISSANCE'],6,4);
// $d2=substr(date('d/m/Y'),6,4);
// $d3=$d2-$d1;
// $pdf->SetXY(35,138);
// $pdf->Write(0,trim($row['DATENAISSANCE']).'    Age : '.$d3.'  Ans');
// $pdf->SetXY(40,148);
// $pdf->Write(0, $row['ADRESSE']);
// $pdf->SetXY(35,158);
//$pdf->Write(0, $_POST["NUMCARTE"]);
// $pdf->SetXY(88,158);
//$pdf->Write(0, $_POST["DELIVREEA"]);
// $pdf->SetXY(135,158);
//$pdf->Write(0, $_POST["LE"]);
// $pdf->SetXY(68,182);
// $pdf->Write(0, $row['GRABO']."  ".'( '.trim($row['GRRH']).' )');
// $pdf->SetXY(148,255);
// $pdf->Write(0, date('d/m/Y'));
// $pdf->SetXY(116,255);
// $pdf->Write(0, 'Ain oussera');

$pdf->AddPage();
$pdf->setSourceFile('Bio1.pdf');
$tplIdx = $pdf->importPage(2);
$pdf->useTemplate($tplIdx, 5, 5, 200);
$pdf->SetFont('Arial','B',10);
$pdf->SetTextColor(255,0,0);

















$pdf->Output();
?>