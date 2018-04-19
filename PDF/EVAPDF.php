<?php

if (!ISSET($_POST['annee'])||!ISSET($_POST['mois'])||!ISSET($_POST['jour'])||!ISSET($_POST['annee1'])||!ISSET($_POST['mois1'])||!ISSET($_POST['jour1']))
{
$datejour1 =date("Y-m-d");
$datejour2 =date("Y-m-d");
}
else
{
 if(empty($_POST['annee'])||empty($_POST['mois'])||empty($_POST['jour'])||empty($_POST['annee1'])||empty($_POST['mois1'])||empty($_POST['jour1']))
 {
 $datejour1 =date("Y-m-d");
 $datejour2 =date("Y-m-d");
 }
 else
 {
 $datejour1 = $_POST['annee'] .'-'.$_POST['mois'] .'-'.$_POST['jour'];
 $datejour2 = $_POST['annee1'].'-'.$_POST['mois1'].'-'.$_POST['jour1'];
 }
}
$datejour11 = $_POST['jour'].'-'.$_POST['mois'] .'-'.$_POST['annee'];
$datejour22 = $_POST['jour1'].'-'.$_POST['mois1'].'-'.$_POST['annee1'];
if ($datejour1>$datejour2)
{
header("Location: ../eva/") ;
}

if ($_POST['PTS']=='ANS') 
{
    require('EVA.php');	
    $pdf = new EVA( 'P', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 	
	$pdf->SetAutoPagebreak(False);
	$pdf->SetMargins(0,0,0);
	$pdf->enteteeva($datejour1,$datejour2); 	
	$pdf->corpscollecte($datejour1,$datejour2);//1/UNITE COLLECTE 	
	$pdf->corpspreparation($datejour1,$datejour2);//2/ UNITE PREPARATION 	
	$pdf->Immuno($datejour1,$datejour2);//3/ UNITE QUALIFICATIONS BIOLOGIQUES//*******IMMUNOLOGIE*******//
	$pdf->enteteserologie($datejour1,$datejour2);//*******SEROLOGIE*******//	
	$pdf->enteteeva($datejour1,$datejour2);//4/ UNITE DISTRIBUTION
	$pdf->corpsdistribution1($datejour1,$datejour2);
	$pdf->piedeva();//$pdf->incidenttrans(232,'Nombre d accidents transfusionnels','Types d accidents transfusionnels');// $pdf->RAPPORT($datejour1,$datejour2); 
	$pdf->Output();
	
}
if ($_POST['PTS']=='EPH') 
{
    require('EVA.php');
	$pdf = new EVA( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" //
	$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
	$pdf->SetTextColor(0,0,0);//text noire
	$pdf->SetFont('Times', '', 13);
	$pdf->AddPage();
	$pdf->Text(80,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
	$pdf->Text(60,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE");
	$pdf->Text(60.5,20,"DIRECTION DE LA SANTE ET DE LA POPULAION DE LA WILAYA DE DJELFA");
	$pdf->Text(5,30,"ETABLISSEMENT PUBLIC HOSPITALIER AIN OUSSERA ");
	$pdf->Text(5,35,"POSTE DE TRANSFUSION SANGUINE ");
	$pdf->Text(4,40," N°:......./".date("Y"));
	$pdf->SetXY(5,50);
	$pdf->Cell(282,10,'ACTIVITE DU PTS  :   du  '.$datejour11."  au  ".$datejour22,0,1,'C');
	$h=70;
	$pdf->SetFont('Times', '', 7.5);
	$pdf->SetXY(05,$h); 	  
	$pdf->cell(30,15,"Type d'examen",1,0,'C',1,0);
	$pdf->SetXY(35,$h); 	  
	$pdf->cell(10,7.5,"",1,0,'C',1,0);
	$pdf->SetXY(35,$h+7.5); 	  
	$pdf->cell(10,7.5,"code",1,0,'C',1,0);
	$pdf->entete(45+(22*0),$h,"M.H","Nbr.Exam","Nbr.B");
	$pdf->entete(45+(22*1),$h,"M.F","Nbr.Exam","Nbr.B");
	$pdf->entete(45+(22*2),$h,"CH.H","Nbr.Exam","Nbr.B");
	$pdf->entete(45+(22*3),$h,"CH.F","Nbr.Exam","Nbr.B");
	$pdf->entete(45+(22*4),$h,"GYN","Nbr.Exam","Nbr.B");
	$pdf->entete(45+(22*5),$h,"MAT","Nbr.Exam","Nbr.B");
	$pdf->entete(45+(22*6),$h,"PED","Nbr.Exam","Nbr.B");
	$pdf->entete(45+(22*7),$h,"HD","Nbr.Exam","Nbr.B");
	$pdf->entete(45+(22*8),$h,"EXT","Nbr.Exam","Nbr.B");
	$pdf->entete(45+(22*9),$h,"U.BLOC","Nbr.Exam","Nbr.B");
	$x=45+(22*10);
	$pdf->SetXY($x,$h); 	  
	$pdf->cell(22,15,"Nbr.Don",1,0,'C',1,0);
	$pdf->ligne($h+20+(7.5*0),"Ac HIV","1630",45,45,45,45,45,45,45,45,45,45,"","HIV",$datejour1,$datejour2);
	$pdf->ligne($h+20+(7.5*1),"Ag HBS","1634",70,70,70,70,70,70,70,70,70,70,"","HVB",$datejour1,$datejour2);
	$pdf->ligne($h+20+(7.5*2),"Ac HCV","1630",40,40,40,40,40,40,40,40,40,40,"","HVC",$datejour1,$datejour2);
	$pdf->ligne($h+20+(7.5*3),"VDRL","1639",40,40,40,40,40,40,40,40,40,40,"","TPHA",$datejour1,$datejour2);
	$pdf->ligne($h+20+(7.5*4),"Groupage","1524",30,30,30,30,30,30,30,30,30,30,"","GRABO",$datejour1,$datejour2);
	$pdf->lignedis($h+20+(7.5*5),"Test de C","1531",40,40,40,40,40,40,40,40,40,40,"***",$datejour1,$datejour2);
	$pdf->SetFont('Times', '', 13);
	$pdf->SetXY(230,$pdf->GetY()+20); 	  
	$pdf->cell(6,0.5,"Ain oussera le  ".date("d-m-Y"),0,0,'C',0);
	$pdf->SetXY(230,$pdf->GetY()+10); 	  
	$pdf->cell(6,0.5,"Le chef de service ",0,0,'C',0);$pdf->Output();	
}

if ($_POST['PTS']=='SEM') 
{
    require('DNR.php');
    $pdf = new DNR( 'L', 'mm', 'A4' );
	$pdf->AliasNbPages();    //importatant pour metre en fonction  le totale nombre de page avec "/{nb}" //
	$pdf->SetFillColor(230); //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
	$pdf->SetTextColor(0,0,0);//text noire
	$pdf->SetFont('Times', '', 10);
	$t1=$datejour1;$t2=$datejour2;
    $pdf->entetepage1('ACTIVITE DU PTS  :   du  '.$t1."  au  ".$t2);
//I  Repartition des dons par tranche d'age 05
	$M1=$pdf->AGESEXE1(0,4,$t1,$t2,'M');  $F1=$pdf->AGESEXE1(0,4,$t1,$t2,'F');
	$M2=$pdf->AGESEXE1(5,9,$t1,$t2,'M');  $F2=$pdf->AGESEXE1(5,9,$t1,$t2,'F');
	$M3=$pdf->AGESEXE1(10,14,$t1,$t2,'M');$F3=$pdf->AGESEXE1(10,14,$t1,$t2,'F');
	$M4=$pdf->AGESEXE1(15,19,$t1,$t2,'M');$F4=$pdf->AGESEXE1(15,19,$t1,$t2,'F');
	$M5=$pdf->AGESEXE1(20,24,$t1,$t2,'M');$F5=$pdf->AGESEXE1(20,24,$t1,$t2,'F');
	$M6=$pdf->AGESEXE1(25,29,$t1,$t2,'M');$F6=$pdf->AGESEXE1(25,29,$t1,$t2,'F');
	$M7=$pdf->AGESEXE1(30,34,$t1,$t2,'M');$F7=$pdf->AGESEXE1(30,34,$t1,$t2,'F');
	$M8=$pdf->AGESEXE1(35,39,$t1,$t2,'M');$F8=$pdf->AGESEXE1(35,39,$t1,$t2,'F');
	$M9=$pdf->AGESEXE1(40,44,$t1,$t2,'M');$F9=$pdf->AGESEXE1(40,44,$t1,$t2,'F');
	$M10=$pdf->AGESEXE1(45,49,$t1,$t2,'M');$F10=$pdf->AGESEXE1(45,49,$t1,$t2,'F');
	$M11=$pdf->AGESEXE1(50,54,$t1,$t2,'M');$F11=$pdf->AGESEXE1(50,54,$t1,$t2,'F');
	$M12=$pdf->AGESEXE1(55,59,$t1,$t2,'M');$F12=$pdf->AGESEXE1(55,59,$t1,$t2,'F');
	$M13=$pdf->AGESEXE1(60,64,$t1,$t2,'M');$F13=$pdf->AGESEXE1(60,64,$t1,$t2,'F');
	$M14=$pdf->AGESEXE1(65,69,$t1,$t2,'M');$F14=$pdf->AGESEXE1(65,69,$t1,$t2,'F');
	$M15=$pdf->AGESEXE1(70,74,$t1,$t2,'M');$F15=$pdf->AGESEXE1(70,74,$t1,$t2,'F');
	$M16=$pdf->AGESEXE1(75,79,$t1,$t2,'M');$F16=$pdf->AGESEXE1(75,79,$t1,$t2,'F');
	$M17=$pdf->AGESEXE1(80,84,$t1,$t2,'M');$F17=$pdf->AGESEXE1(80,84,$t1,$t2,'F');
	$M18=$pdf->AGESEXE1(85,89,$t1,$t2,'M');$F18=$pdf->AGESEXE1(85,89,$t1,$t2,'F');
	$M19=$pdf->AGESEXE1(90,94,$t1,$t2,'M');$F19=$pdf->AGESEXE1(90,94,$t1,$t2,'F');
	$M20=$pdf->AGESEXE1(95,99,$t1,$t2,'M');$F20=$pdf->AGESEXE1(95,99,$t1,$t2,'F');

	$pyramide= array(
	"1M"  => $M1,   "1F"  => $F1,
	"2M"  => $M2,   "2F"  => $F2,
	"3M"  => $M3,   "3F"  => $F3,
	"4M"  => $M4,   "4F"  => $F4,
	"5M"  => $M5,   "5F"  => $F5,
	"6M"  => $M6,   "6F"  => $F6,
	"7M"  => $M7,   "7F"  => $F7,
	"8M"  => $M8,   "8F"  => $F8,
	"9M"  => $M9,   "9F"  => $F9,
	"10M" => $M10,  "10F" => $F10,
	"11M" => $M11,  "11F" => $F11,
	"12M" => $M12,  "12F" => $F12,
	"13M" => $M13,  "13F" => $F13,
	"14M" => $M14,  "14F" => $F14,
	"15M" => $M15,  "15F" => $F15,
	"16M" => $M16,  "16F" => $F16,
	"17M" => $M17,  "17F" => $F17,
	"18M" => $M18,  "18F" => $F18,
	"19M" => $M19,  "19F" => $F19,
	"20M" => $M20,  "20F" => $F20
	);
	$pdf->pyramide(200,150,utf8_decode('1 - Pyramide des âges de la population des donneurs'),$pyramide);
	$T2F20=array(
			"xt" => 5,
			"yt" => 42,
			"wc" => "",
			"hc" => "",
			"tt" => "I  Repartition des dons par tranche d'age ( 05 ans ) et sexe",
			"tc" => "Sexe",
			"tc1" =>"M",
			"tc3" =>"F",
			"tc5" =>"Total",
			"1M"  => $M1,   "1F"  => $F1,
			"2M"  => $M2,   "2F"  => $F2,
			"3M"  => $M3,   "3F"  => $F3,
			"4M"  => $M4,   "4F"  => $F4,
			"5M"  => $M5,   "5F"  => $F5,
			"6M"  => $M6,   "6F"  => $F6,
			"7M"  => $M7,   "7F"  => $F7,
			"8M"  => $M8,   "8F"  => $F8,
			"9M"  => $M9,   "9F"  => $F9,
			"10M" => $M10,  "10F" => $F10,
			"11M" => $M11,  "11F" => $F11,
			"12M" => $M12,  "12F" => $F12,
			"13M" => $M13,  "13F" => $F13,
			"14M" => $M14,  "14F" => $F14,
			"15M" => $M15,  "15F" => $F15,
			"16M" => $M16,  "16F" => $F16,
			"17M" => $M17,  "17F" => $F17,
			"18M" => $M18,  "18F" => $F18,
			"19M" => $M19,  "19F" => $F19,
			"20M" => $M20,  "20F" => $F20,
			"T" =>'1',
			"tl" =>"Age",
			"1MF"  => '00-04',  
			"2MF"  => '05-09',   
			"3MF"  => '10-14',  
			"4MF"  => '15-19',   
			"5MF"  => '20-24',  
			"6MF"  => '25-29',   
			"7MF"  => '30-34',  
			"8MF"  => '35-39',   
			"9MF"  => '40-44',   
			"10MF" => '45-49',  
			"11MF" => '50-54',  
			"12MF" => '55-59', 
			"13MF" => '60-64',  
			"14MF" => '65-69', 
			"15MF" => '70-74',  
			"16MF" => '75-79',  
			"17MF" => '80-84',  
			"18MF" => '85-89', 
			"19MF" => '90-94', 
			"20MF" => '95-99'  
			);
	$pdf-> T2F20($T2F20);


$pdf->entetepage1('ACTIVITE DU PTS  :   du  '.$t1."  au  ".$t2);
//II  Repartition des dons par tranche d'age 10

	$ta1M=$pdf->AGESEXE1(00,19,$t1,$t2,'M');$ta1F=$pdf->AGESEXE1(00,19,$t1,$t2,'F');
	$ta2M=$pdf->AGESEXE1(20,29,$t1,$t2,'M');$ta2F=$pdf->AGESEXE1(20,29,$t1,$t2,'F');
	$ta3M=$pdf->AGESEXE1(30,39,$t1,$t2,'M');$ta3F=$pdf->AGESEXE1(30,39,$t1,$t2,'F');
	$ta4M=$pdf->AGESEXE1(40,49,$t1,$t2,'M');$ta4F=$pdf->AGESEXE1(40,49,$t1,$t2,'F');
	$ta5M=$pdf->AGESEXE1(50,59,$t1,$t2,'M');$ta5F=$pdf->AGESEXE1(50,59,$t1,$t2,'F');
	$ta6M=$pdf->AGESEXE1(60,69,$t1,$t2,'M');$ta6F=$pdf->AGESEXE1(60,69,$t1,$t2,'F');
	$ta7M=$pdf->AGESEXE1(70,99,$t1,$t2,'M');$ta7F=$pdf->AGESEXE1(70,99,$t1,$t2,'F');
	$T2F7=array(
			"xt" => 5,
			"yt" => 42,
			"wc" => "",
			"hc" => "",
			"tt" => "II  Repartition des dons par tranche d'age ( 10 ans ) et sexe",
			"tc" => "Sexe",
			"tc1" =>"M",
			"tc3" =>"F",
			"tc5" =>"Total",
			"l1c1" =>$ta1M,
			"l1c3" =>$ta1F,
			"l1c5" =>$ta1M+$ta1F,
			"l2c1" =>$ta2M,
			"l2c3" =>$ta2F,
			"l2c5" =>$ta2M+$ta2F,
			"l3c1" =>$ta3M,
			"l3c3" =>$ta3F,
			"l3c5" =>$ta3M+$ta3F,
			"l4c1" =>$ta4M,
			"l4c3" =>$ta4F,
			"l4c5" =>$ta4M+$ta4F,
			"l5c1" =>$ta5M,
			"l5c3" =>$ta5F,
			"l5c5" =>$ta5M+$ta5F,
			"l6c1" =>$ta6M,
			"l6c3" =>$ta6F,
			"l6c5" =>$ta6M+$ta6F,
			"l7c1" =>$ta7M,
			"l7c3" =>$ta7F,
			"l7c5" =>$ta7M+$ta7F,
			"l8c1" =>$ta1M+$ta2M+$ta3M+$ta4M+$ta5M+$ta6M+$ta7M,
			"l8c3" =>$ta1F+$ta2F+$ta3F+$ta4F+$ta5F+$ta6F+$ta7F,
			"l8c5" =>$ta1M+$ta2M+$ta3M+$ta4M+$ta5M+$ta6M+$ta7M+$ta1F+$ta2F+$ta3F+$ta4F+$ta5F+$ta6F+$ta7F,
			"tl" =>"Age",
			"tl1" =>"18-19",
			"tl2" =>"20-29",
			"tl3" =>"30-39",
			"tl4" =>"40-49",
			"tl5" =>"50-59",
			"tl6" =>"60-69",
			"tl7" =>"70-79",
			"tl8" =>"Total"
			);
	$pdf-> T2F7($T2F7);
	$pdf->bar(200,150,$ta1M+$ta1F,$ta2M+$ta2F,$ta3M+$ta3F,$ta4M+$ta4F,$ta5M+$ta5F,$ta6M+$ta6F,$ta7M+$ta7F,utf8_decode('II - Dons par tranche d\'age ( 10 ans )  en année'));



$pdf->entetepage1('ACTIVITE DU PTS  :   du  '.$t1."  au  ".$t2);

//I  Repartition des dons par groupage rhesus
$ap=$pdf->compagne1('A','Positif',$t1,$t2);
$an=$pdf->compagne1('A','negatif',$t1,$t2);
$bp=$pdf->compagne1('B','Positif',$t1,$t2);
$bn=$pdf->compagne1('B','negatif',$t1,$t2);
$abp=$pdf->compagne1('AB','Positif',$t1,$t2);
$abn=$pdf->compagne1('AB','negatif',$t1,$t2);
$op=$pdf->compagne1('O','Positif',$t1,$t2);
$on=$pdf->compagne1('O','negatif',$t1,$t2);
$T4F2=array(
		"xt" => 5,
		"yt" => 50,
		"wc" => "",
		"hc" => "",
		"tt" => "I  Repartition des dons par groupage rhesus",
		"tc" => "Groupage",
		"tc1" =>"A",
		"tc2" =>"B",
		"tc3" =>"AB",
		"tc4" =>"O",
		"tc5" =>"Total",
		"l1c1" =>$ap,
		"l1c2" =>$bp,
		"l1c3" =>$abp,
		"l1c4" =>$op,
		"l1c5" =>$ap+$bp+$abp+$op,
		"l2c1" =>$an,
		"l2c2" =>$bn,
		"l2c3" =>$abn,
		"l2c4" =>$on,
		"l2c5" =>$an+$bn+$abn+$on,
		"l3c1" =>$ap+$an,
		"l3c2" =>$bp+$bn,
		"l3c3" =>$abp+$abn,
		"l3c4" =>$op+$on,
		"l3c5" =>$ap+$an+$bp+$bn+$abp+$abn+$op+$on,
		"tl" =>"Rhesus",
		"tl1" =>"Rh+",
		"tl2" =>"Rh-",
		"tl3" =>"Total"
		);
$pdf-> T4F2($T4F2);
$pie4 = array(
		"x" => 200, "y" => 75, 
		"r" => 17,
		"v1" => $ap+$an,
		"v2" => $bp+$bn,
		"v3" => $abp+$abn,
		"v4" => $op+$on,
		"t0" => "1 - Dons par groupage ABO ",
		"t1" => "A",
		"t2" => "B",
		"t3" => "AB",
		"t4" => "O"
		);
$pdf->pie4($pie4);
//II  Repartition des dons par  groupage sexe
// $am=$pdf->compagnesexe1('A','M',$t1,$t2);
// $af=$pdf->compagnesexe1('A','F',$t1,$t2);
// $bm=$pdf->compagnesexe1('B','M',$t1,$t2);
// $bf=$pdf->compagnesexe1('B','F',$t1,$t2);
// $abm=$pdf->compagnesexe1('AB','M',$t1,$t2);
// $abf=$pdf->compagnesexe1('AB','F',$t1,$t2);
// $om=$pdf->compagnesexe1('O','M',$t1,$t2);
// $of=$pdf->compagnesexe1('O','F',$t1,$t2);
// $T4F2=array(
		// "xt" => 5,
		// "yt" => 105,
		// "wc" => "",
		// "hc" => "",
		// "tt" => "II  Repartition des dons par  groupage sexe",
		// "tc" => "Groupage",
		// "tc1" =>"A",
		// "tc2" =>"B",
		// "tc3" =>"AB",
		// "tc4" =>"O",
		// "tc5" =>"Total",
		// "l1c1" =>$am,
		// "l1c2" =>$bm,
		// "l1c3" =>$abm,
		// "l1c4" =>$om,
		// "l1c5" =>$am+$bm+$abm+$om,
		// "l2c1" =>$af,
		// "l2c2" =>$bf,
		// "l2c3" =>$abf,
		// "l2c4" =>$of,
		// "l2c5" =>$af+$bf+$abf+$of,
		// "l3c1" =>$am+$af,
		// "l3c2" =>$bm+$bf,
		// "l3c3" =>$abm+$abf,
		// "l3c4" =>$om+$of,
		// "l3c5" =>$am+$af+$bm+$bf+$abm+$abf+$om+$of,
		// "tl" =>"Sexe",
		// "tl1" =>"M",
		// "tl2" =>"F",
		// "tl3" =>"Total"
		// );
// $pdf->SetFont('Times', '', 10);		
// $pdf-> T4F2($T4F2);
// $pie2 = array(
// "x" => 200, 
// "y" => 130, 
// "r" => 17,
// "v1" => $am+$bm+$abm+$om,
// "v2" => $af+$bf+$abf+$of,
// "t0" => "1 - Dons par sexe  MF  ",
// "t1" => "M",
// "t2" => "F");
// $pdf->pie2($pie2);	
	
//$pdf->entetepage1('ACTIVITE DU PTS  :   du  '.$t1."  au  ".$t2);	
//IV  Repartition des dons par tranche d'age
// $ta=$pdf->AGEDON11(0,19,$t1,$t2,'A')+$ttb1=$pdf->AGEDON11(0,19,$t1,$t2,'B')+$ttb1=$pdf->AGEDON11(0,19,$t1,$t2,'AB')+$ttb1=$pdf->AGEDON11(0,19,$t1,$t2,'O');
// $tb=$pdf->AGEDON11(20,29,$t1,$t2,'A')+$ttb1=$pdf->AGEDON11(20,29,$t1,$t2,'B')+$ttb1=$pdf->AGEDON11(20,29,$t1,$t2,'AB')+$ttb1=$pdf->AGEDON11(20,29,$t1,$t2,'O');
// $tc=$pdf->AGEDON11(30,39,$t1,$t2,'A')+$ttb1=$pdf->AGEDON11(30,39,$t1,$t2,'B')+$ttb1=$pdf->AGEDON11(30,39,$t1,$t2,'AB')+$ttb1=$pdf->AGEDON11(30,39,$t1,$t2,'O');
// $td=$pdf->AGEDON11(40,49,$t1,$t2,'A')+$ttb1=$pdf->AGEDON11(40,49,$t1,$t2,'B')+$ttb1=$pdf->AGEDON11(40,49,$t1,$t2,'AB')+$ttb1=$pdf->AGEDON11(40,49,$t1,$t2,'O');
// $te=$pdf->AGEDON11(50,59,$t1,$t2,'A')+$ttb1=$pdf->AGEDON11(50,59,$t1,$t2,'B')+$ttb1=$pdf->AGEDON11(50,59,$t1,$t2,'AB')+$ttb1=$pdf->AGEDON11(50,59,$t1,$t2,'O');
// $tf=$pdf->AGEDON11(60,69,$t1,$t2,'A')+$ttb1=$pdf->AGEDON11(60,69,$t1,$t2,'B')+$ttb1=$pdf->AGEDON11(60,69,$t1,$t2,'AB')+$ttb1=$pdf->AGEDON11(60,69,$t1,$t2,'O');
// $tg=$pdf->AGEDON11(70,100,$t1,$t2,'A')+$ttb1=$pdf->AGEDON11(70,100,$t1,$t2,'B')+$ttb1=$pdf->AGEDON11(70,100,$t1,$t2,'AB')+$ttb1=$pdf->AGEDON11(70,100,$t1,$t2,'O');
// $pdf->bar(200,150,$ta,$tb,$tc,$td,$te,$tf,$tg,utf8_decode('1 - Dons par tranche d\'age en année'));

// $tta1=$pdf->AGEDON11(0,19,$t1,$t2,'A');
// $tta2=$pdf->AGEDON11(20,29,$t1,$t2,'A');
// $tta3=$pdf->AGEDON11(30,39,$t1,$t2,'A');
// $tta4=$pdf->AGEDON11(40,49,$t1,$t2,'A');
// $tta5=$pdf->AGEDON11(50,59,$t1,$t2,'A');
// $tta6=$pdf->AGEDON11(60,69,$t1,$t2,'A');
// $tta7=$pdf->AGEDON11(70,100,$t1,$t2,'A');


// $ttb1=$pdf->AGEDON11(0,19,$t1,$t2,'B');
// $ttb2=$pdf->AGEDON11(20,29,$t1,$t2,'B');
// $ttb3=$pdf->AGEDON11(30,39,$t1,$t2,'B');
// $ttb4=$pdf->AGEDON11(40,49,$t1,$t2,'B');
// $ttb5=$pdf->AGEDON11(50,59,$t1,$t2,'B');
// $ttb6=$pdf->AGEDON11(60,69,$t1,$t2,'B');
// $ttb7=$pdf->AGEDON11(70,100,$t1,$t2,'B');


// $ttab1=$pdf->AGEDON11(0,19,$t1,$t2,'AB');
// $ttab2=$pdf->AGEDON11(20,29,$t1,$t2,'AB');
// $ttab3=$pdf->AGEDON11(30,39,$t1,$t2,'AB');
// $ttab4=$pdf->AGEDON11(40,49,$t1,$t2,'AB');
// $ttab5=$pdf->AGEDON11(50,59,$t1,$t2,'AB');
// $ttab6=$pdf->AGEDON11(60,69,$t1,$t2,'AB');
// $ttab7=$pdf->AGEDON11(70,100,$t1,$t2,'AB');


// $tto1=$pdf->AGEDON11(0,19,$t1,$t2,'O');
// $tto2=$pdf->AGEDON11(20,29,$t1,$t2,'O');
// $tto3=$pdf->AGEDON11(30,39,$t1,$t2,'O');
// $tto4=$pdf->AGEDON11(40,49,$t1,$t2,'O');
// $tto5=$pdf->AGEDON11(50,59,$t1,$t2,'O');
// $tto6=$pdf->AGEDON11(60,69,$t1,$t2,'O');
// $tto7=$pdf->AGEDON11(70,100,$t1,$t2,'O');

// $T4F7=array(
		// "xt" => 5,
		// "yt" => 42,
		// "wc" => "",
		// "hc" => "",
		// "tt" => "III  Repartition des dons par tranche d'age",
		// "tc" => "Groupage",
		// "tc1" =>"A",
		// "tc2" =>"B",
		// "tc3" =>"AB",
		// "tc4" =>"O",
		// "tc5" =>"Total",
		// "l1c1" =>$tta1,
		// "l1c2" =>$ttb1,
		// "l1c3" =>$ttab1,
		// "l1c4" =>$tto1,
		// "l1c5" =>$tta1+$ttb1+$ttab1+$tto1,
		// "l2c1" =>$tta2,
		// "l2c2" =>$ttb2,
		// "l2c3" =>$ttab2,
		// "l2c4" =>$tto2,
		// "l2c5" =>$tta2+$ttb2+$ttab2+$tto2,
		// "l3c1" =>$tta3,
		// "l3c2" =>$ttb3,
		// "l3c3" =>$ttab3,
		// "l3c4" =>$tto3,
		// "l3c5" =>$tta3+$ttb3+$ttab3+$tto3,
		// "l4c1" =>$tta4,
		// "l4c2" =>$ttb4,
		// "l4c3" =>$ttab4,
		// "l4c4" =>$tto4,
		// "l4c5" =>$tta4+$ttb4+$ttab4+$tto4,
		// "l5c1" =>$tta5,
		// "l5c2" =>$ttb5,
		// "l5c3" =>$ttab5,
		// "l5c4" =>$tto5,
		// "l5c5" =>$tta5+$ttb5+$ttab5+$tto5,
		// "l6c1" =>$tta6,
		// "l6c2" =>$ttb6,
		// "l6c3" =>$ttab6,
		// "l6c4" =>$tto6,
		// "l6c5" =>$tta6+$ttb6+$ttab6+$tto6,
		// "l7c1" =>$tta7,
		// "l7c2" =>$ttb7,
		// "l7c3" =>$ttab7,
		// "l7c4" =>$tto7,
		// "l7c5" =>$tta7+$ttb7+$ttab7+$tto7,
		// "l8c1" =>$tta1+$tta2+$tta3+$tta4+$tta5+$tta6+$tta7,
		// "l8c2" =>$ttb1+$ttb2+$ttb3+$ttb4+$ttb5+$ttb6+$ttb7,
		// "l8c3" =>$ttab1+$ttab2+$ttab3+$ttab4+$ttab5+$ttab6+$ttab7,
		// "l8c4" =>$tto1+$tto2+$tto3+$tto4+$tto5+$tto6+$tto7,
		// "l8c5" =>$tta1+$tta2+$tta3+$tta4+$tta5+$tta6+$tta7+$ttb1+$ttb2+$ttb3+$ttb4+$ttb5+$ttb6+$ttb7+$ttab1+$ttab2+$ttab3+$ttab4+$ttab5+$ttab6+$ttab7+$tto1+$tto2+$tto3+$tto4+$tto5+$tto6+$tto7,
		// "tl" =>"Age",
		// "tl1" =>"18-19",
		// "tl2" =>"20-29",
		// "tl3" =>"30-39",
		// "tl4" =>"40-49",
		// "tl5" =>"50-59",
		// "tl6" =>"60-69",
		// "tl7" =>"70-79",
		// "tl8" =>"Total"
		// );
// $pdf->SetFont('Times', '', 10);			
// $pdf-> T4F7($T4F7);


//repartition geographique 
$pdf->entetepage1('Reartition Geographique Des Donneurs Par Commune  ');
$pdf->RoundedRect(5,35,285,160, 2, $style = '');

$pdf->SetFont('Times', 'B', 10);
$h=35;
$pdf->SetXY(5+5,$h);$pdf->cell(15,5,"IDCOM",1,0,'C',1,0);
$pdf->SetXY(20+5,$h);$pdf->cell(30,5,"Commune",1,0,'C',1,0);
$pdf->SetXY(50+5,$h);$pdf->cell(20,5,"Superficie",1,0,'C',1,0);
$pdf->SetXY(70+5,$h);$pdf->cell(30,5,"Population",1,0,'C',1,0);
$pdf->SetXY(100+5,$h);$pdf->cell(20,5,"Donneur",1,0,'C',1,0);
$pdf->SetXY(120+5,$h);$pdf->cell(20,5,"Generosite",1,0,'C',1,0);
$pdf->SetXY(5+5,40);
$IDWIL=17000;
$pdf->mysqlconnect();
$query="SELECT * FROM com where IDWIL='$IDWIL' and yes='1' order by COMMUNE "; //    % %will search form 0-9,a-z            
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$pdf->SetFont('Times', '', 10);
$pdf->cell(15,4,trim($row->IDCOM),1,0,'C',0);
$pdf->cell(30,4,trim($row->COMMUNE),1,0,'L',0);
$pdf->cell(20,4,trim($row->SUPER),1,0,'L',0);
$pdf->cell(30,4,trim($row->POPULATION),1,0,'L',0);
$pdf->cell(20,4,$pdf->dnrparcommune('17000',trim($row->IDCOM)),1,0,'L',0);
$pdf->cell(20,4,round(($pdf->dnrparcommune('17000',trim($row->IDCOM))*100)/$row->POPULATION,2),1,0,'L',0);
$pdf->SetXY(5+5,$pdf->GetY()+4); 
}
$req="SELECT SUM(SUPER) AS total FROM com WHERE IDWIL='$IDWIL' and yes='1'";
$query1 = mysql_query($req);   
$rs = mysql_fetch_assoc($query1);
$req1="SELECT SUM(POPULATION) AS total1 FROM com WHERE IDWIL='$IDWIL' and yes='1'";
$query11 = mysql_query($req1);   
$rs1 = mysql_fetch_assoc($query11);
$pdf->SetXY(5+5,$pdf->GetY());$pdf->cell(15,5,"Total",1,0,'C',1,0);	  
$pdf->SetXY(20+5,$pdf->GetY());$pdf->cell(30,5,$totalmbr1."  Communes",1,0,'C',1,0);	  
$pdf->SetXY(50+5,$pdf->GetY());$pdf->cell(20,5,round($rs['total'],2),1,0,'C',1,0);	  
$pdf->SetXY(70+5,$pdf->GetY());$pdf->cell(30,5,round($rs1['total1'],2),1,0,'C',1,0);	  
$pdf->SetXY(100+5,$pdf->GetY());$pdf->cell(20,5,"----",1,0,'C',1,0);	  
$pdf->SetXY(120+5,$pdf->GetY());$pdf->cell(20,5,"----",1,0,'C',1,0);	  
//sig djelfa
$data = array(
"A"  => '00-00',
"B"  => '01-20',
"C"  => '20-40',
"D"  => '40-60',
"E"  => '60-100',
"1"  => 0,//daira  ainoussera
// "916"  => $pdf->donparcommune(916),//daira  Djelfa
"916"  => $pdf->dnrparcommune('17000',916),//daira  Djelfa
"917"  => $pdf->dnrparcommune('17000',917),// daira El Idrissia
"918"  => $pdf->dnrparcommune('17000',918),//Oum Cheggag
"919"  => $pdf->dnrparcommune('17000',919),//El Guedid
"920"  => $pdf->dnrparcommune('17000',920),//daira Charef
"921"  => $pdf->dnrparcommune('17000',921),//El Hammam
"922"  => $pdf->dnrparcommune('17000',922),//Touazi
"923"  => $pdf->dnrparcommune('17000',923),//Beni Yacoub
"924"  => $pdf->dnrparcommune('17000',924),//daira ainoussera
"925"  => $pdf->dnrparcommune('17000',925),//guernini
"926"  => $pdf->dnrparcommune('17000',926),//daira sidilaadjel
"927"  => $pdf->dnrparcommune('17000',927),//hassifdoul
"928"  => $pdf->dnrparcommune('17000',928),//elkhamis
"929"  => $pdf->dnrparcommune('17000',929),//daira birine
"930"  => $pdf->dnrparcommune('17000',930),//Dra Souary
"931"  => $pdf->dnrparcommune('17000',931),//benahar
"932"  => $pdf->dnrparcommune('17000',932),//daira hadshari
"933"  => $pdf->dnrparcommune('17000',933),//bouiratlahdab
"934"  => $pdf->dnrparcommune('17000',934),//ainfka
"935"  => $pdf->dnrparcommune('17000',935),//daira hassi bahbah
"936"  => $pdf->dnrparcommune('17000',936),//Mouilah
"937"  => $pdf->dnrparcommune('17000',937),//El Mesrane
"938"  => $pdf->dnrparcommune('17000',938),//Hassi el Mora
"939"  => $pdf->dnrparcommune('17000',939),//zaafrane
"940"  => $pdf->dnrparcommune('17000',940),//hassi el euche
"941"  => $pdf->dnrparcommune('17000',941),//ain maabed
"942"  => $pdf->dnrparcommune('17000',942),//daira darchioukh
"943"  => $pdf->dnrparcommune('17000',943),//Guendouza
"944"  => $pdf->dnrparcommune('17000',944),//El Oguila
"945"  => $pdf->dnrparcommune('17000',945),//El Merdja
"946"  => $pdf->dnrparcommune('17000',946),//mliliha
"947"  => $pdf->dnrparcommune('17000',947),//sidibayzid
"948"  => $pdf->dnrparcommune('17000',948),//daira Messad
"949"  => $pdf->dnrparcommune('17000',949),//Abdelmadjid
"950"  => $pdf->dnrparcommune('17000',950),//Haniet Ouled Salem
"951"  => $pdf->dnrparcommune('17000',951),//Guettara
"952"  => $pdf->dnrparcommune('17000',952),//Deldoul
"953"  => $pdf->dnrparcommune('17000',953),//Sed Rahal
"954"  => $pdf->dnrparcommune('17000',954),//Selmana
"955"  => $pdf->dnrparcommune('17000',955),//El Gahra
"956"  => $pdf->dnrparcommune('17000',956),//Oum Laadham
"957"  => $pdf->dnrparcommune('17000',957),//Mouadjebar
"958"  => $pdf->dnrparcommune('17000',958),//daira Ain el Ibel
"959"  => $pdf->dnrparcommune('17000',959),//Amera
"960"  => $pdf->dnrparcommune('17000',960),//N'thila
"961"  => $pdf->dnrparcommune('17000',961),//Oued Seddeur
"962"  => $pdf->dnrparcommune('17000',962),//Zaccar
"963"  => $pdf->dnrparcommune('17000',963),//Douis
"964"  => $pdf->dnrparcommune('17000',964),//Ain Chouhada
"965"  => $pdf->dnrparcommune('17000',965),//Tadmit
"966"  => $pdf->dnrparcommune('17000',966),//El Hiouhi
"967"  => $pdf->dnrparcommune('17000',967),//daira Faidh el Botma
"968"  => $pdf->dnrparcommune('17000',968) //Amourah
);
$pdf->djelfa($data,560,128,3.7,'c'); 



	
	
	// $h=70;
	// $pdf->SetFont('Times', '', 7.5);
	// $pdf->SetXY(05,$h); 	  
	// $pdf->cell(30,15,"Type d'examen",1,0,'C',1,0);
	// $pdf->SetXY(35,$h); 	  
	// $pdf->cell(10,7.5,"",1,0,'C',1,0);
	// $pdf->SetXY(35,$h+7.5); 	  
	// $pdf->cell(10,7.5,"code",1,0,'C',1,0);
	// $pdf->entete(45+(22*0),$h,"M.H","Nbr.Exam","Nbr.B");
	// $pdf->entete(45+(22*1),$h,"M.F","Nbr.Exam","Nbr.B");
	// $pdf->entete(45+(22*2),$h,"CH.H","Nbr.Exam","Nbr.B");
	// $pdf->entete(45+(22*3),$h,"CH.F","Nbr.Exam","Nbr.B");
	// $pdf->entete(45+(22*4),$h,"GYN","Nbr.Exam","Nbr.B");
	// $pdf->entete(45+(22*5),$h,"MAT","Nbr.Exam","Nbr.B");
	// $pdf->entete(45+(22*6),$h,"PED","Nbr.Exam","Nbr.B");
	// $pdf->entete(45+(22*7),$h,"HD","Nbr.Exam","Nbr.B");
	// $pdf->entete(45+(22*8),$h,"EXT","Nbr.Exam","Nbr.B");
	// $pdf->entete(45+(22*9),$h,"U.BLOC","Nbr.Exam","Nbr.B");
	// $x=45+(22*10);
	// $pdf->SetXY($x,$h); 	  
	// $pdf->cell(22,15,"Nbr.Don",1,0,'C',1,0);
	// $pdf->ligne($h+20+(7.5*0),"Ac HIV","1630",45,45,45,45,45,45,45,45,45,45,"","HIV",$datejour1,$datejour2);
	// $pdf->ligne($h+20+(7.5*1),"Ag HBS","1634",70,70,70,70,70,70,70,70,70,70,"","HVB",$datejour1,$datejour2);
	// $pdf->ligne($h+20+(7.5*2),"Ac HCV","1630",40,40,40,40,40,40,40,40,40,40,"","HVC",$datejour1,$datejour2);
	// $pdf->ligne($h+20+(7.5*3),"VDRL","1639",40,40,40,40,40,40,40,40,40,40,"","TPHA",$datejour1,$datejour2);
	// $pdf->ligne($h+20+(7.5*4),"Groupage","1524",30,30,30,30,30,30,30,30,30,30,"","GRABO",$datejour1,$datejour2);
	// $pdf->lignedis($h+20+(7.5*5),"Test de C","1531",40,40,40,40,40,40,40,40,40,40,"***",$datejour1,$datejour2);
	// $pdf->SetFont('Times', '', 13);
	// $pdf->SetXY(230,$pdf->GetY()+20); 	  
	// $pdf->cell(6,0.5,"Ain oussera le  ".date("d-m-Y"),0,0,'C',0);
	// $pdf->SetXY(230,$pdf->GetY()+10); 	  
	// $pdf->cell(6,0.5,"Le chef de service ",0,0,'C',0);
	
	
	
	//V  Liste nominative des donneurs par indication
// $pdf->entetepage1('  Collecte  du '.$t);//N:'.$id.'
$pdf->entetepage1('ACTIVITE DU PTS  :   du  '.$t1."  au  ".$t2);
$h=40;
$pdf->SetXY(5,$h);$pdf->cell(15,5,"IDP",1,0,'C',1,0);
$pdf->SetXY(20,$h);$pdf->cell(20,5,"DATEDON",1,0,'C',1,0);
$pdf->SetXY(40,$h);$pdf->cell(65,5,"NOM ET PRENOM ",1,0,'C',1,0);
$pdf->SetXY(105,$h);$pdf->cell(23,5,"SEXE",1,0,'C',1,0);
$pdf->SetXY(128,$h);$pdf->cell(30,5,"NAISSANCE",1,0,'C',1,0);
$pdf->SetXY(158,$h);$pdf->cell(15,5,"AGE",1,0,'C',1,0);
$pdf->SetXY(173,$h);$pdf->cell(35,5,"GROUPAGE",1,0,'C',1,0);
$pdf->SetXY(208,$h);$pdf->cell(32,5,"TELEPHONE",1,0,'C',1,0);
$pdf->SetXY(208+32,$h);$pdf->cell(50,5,"COMMUNE RESIDENCE",1,0,'C',1,0);
$pdf->SetXY(5,45); 
$pdf->mysqlconnect();
$query="SELECT * FROM don where  IDP >0  and (DATEDON >='$datejour1' and DATEDON <='$datejour2') order by IDP "; //    % %will search form 0-9,a-z            
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$pdf->SetFont('Times', '', 11);
$pdf->cell(15,8,trim($row->IDP),1,0,'C',0);
$pdf->cell(20,8,trim($pdf->dateUS2FR($row->DATEDON)),1,0,'C',0);
$pdf->cell(65,8,trim($pdf->nbrtostring('mvc','dnr','id',$row->IDDNR,'NOM'))."_".trim($pdf->nbrtostring('mvc','dnr','id',$row->IDDNR,'PRENOM')),1,0,'L',0);
$pdf->cell(23,8,trim($row->SEXEDNR),1,0,'C',0);
$pdf->cell(30,8,trim($pdf->nbrtostring('mvc','dnr','id',$row->IDDNR,'DATENAISSANCE')),1,0,'C',0);
$pdf->cell(15,8,$row->AGEDNR,1,0,'C',0);    
$pdf->cell(35,8,trim($row->GROUPAGE.'_'.$row->RHESUS),1,0,'C',0);
$pdf->cell(32,8,trim($pdf->nbrtostring('mvc','dnr','id',$row->IDDNR,'TELEPHONE')),1,0,'C',0);
//$pdf->cell(50,8,$pdf->nbrtostring('mvc','com','IDCOM',$row->IDDNRCOMRES,'COMMUNE'),1,0,'C',0);//a active lorsque la colone est renseigne
$pdf->cell(50,8,$pdf->nbrtostring('mvc','com','IDCOM',$pdf->iddnrcommune($row->IDDNR),'COMMUNE'),1,0,'C',0);
$pdf->SetXY(5,$pdf->GetY()+8); 
}
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(15,5,"Total",1,0,'C',1,0);	  
$pdf->SetXY(20,$pdf->GetY());$pdf->cell(270,5,$totalmbr1."  "."Dons ",1,0,'C',1,0);				 
$pdf->SetXY(130,$pdf->GetY()+20);$pdf->cell(60,5,'DR '.strtoupper($pdf->USER()).' : '.trim($pdf->nbrtostring('mvc','cts','IDCTS',$pdf->STRUCTURE(),'CTS')),0,0,'C',0);	
$pdf->Output();	
}



























?>
