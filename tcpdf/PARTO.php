<?php
if ($_GET['MODESORTI'] =='') {
require('PDF0.php');
$pdf = new PDF0( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->SetTextColor(0,0,255);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();
//$pdf->setRTL(true); 
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('aefurat', '', 10);
$pdf->Text(90,0,"PARTOGRAMME "); 
$id=$_GET["id"];
$iddnr=$_GET["iddnr"];
$pdf->mysqlconnect();
$query = "select * from pat WHERE  id = '$iddnr'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{

$pdf->Text(5,5+2,"Nom,Prénom : ".trim($result->NOM).'_'.trim($result->PRENOM)); 
}


$pdf->Text(80,5+2,"Geste : "); $pdf->Text(110,5+2,"Parité : ");                
$pdf->Text(140,5+2,"Hopital N° : AIN OUSSERA");
$i=9+2;
$pdf->Line(5 ,$i,200 ,$i );
$pdf->Text(5,10+2,"Date D'admission : ");            $pdf->Text(80,10+2,"Heure D'admission : "." heures");                            $pdf->Text(140,10+2,"Rupture Des Membranes");
$i=14+2;
$pdf->Line(5 ,$i,200 ,$i );
$pdf->SetFont('aefurat', '', 8);
//********************************************************//
$pdf->Text(22,57-(5*8),"180_");
$pdf->Text(22,57-(5*7),"170_");
$pdf->Text(22,57-(5*6),"160_");
$pdf->Text(22,57-(5*5),"150_");$pdf->Text(10,57-(5*5),"Rythme");
$pdf->Text(22,57-(5*4),"140_");$pdf->Text(10,57-(5*4),"Cardiaque");
$pdf->Text(22,57-(5*3),"130_");$pdf->Text(10,57-(5*3),"Foetal");
$pdf->Text(22,57-(5*2),"120_");
$pdf->Text(22,57-(5*1),"110_");
$pdf->Text(22,57-(5*0),"100_");
$x1=20; $y1=10;  //xy tableau
$x=7; $y=5;     //xy cellule
$l=8;$c=24;    //ligne collone
for($i1=10; $i1<=5*($l+1) ; $i1 += $y) 
{
	for($i=10; $i<=$x*($c+1); $i += $x) 
	{
	$pdf->SetXY($i+$x1,$y1+($i1)); //  
	$pdf->cell($x,$y,"",1,0,'C',0);
	}
}
//********************************************************//
$pdf->Text(2,63,"Liquide amniotique");
$pdf->Text(2,67,"Déformation Cranienne");
$x1=20; $y1=52;  //xy tableau
$x=7; $y=5;     //xy cellule
$l=2;$c=24;    //ligne collone
for($i1=10; $i1<=5*($l+1) ; $i1 += $y) 
{
	for($i=10; $i<=$x*($c+1); $i += $x) 
	{
	$pdf->SetXY($i+$x1,$y1+($i1)); //  
	$pdf->cell($x,$y,"",1,0,'C',0);
	}
}
//********************************************************//
$pdf->Text(23,71+(5*0),"10_");
$pdf->Text(23,71+(5*1),"09_");
$pdf->Text(23,71+(5*2),"08_");
$pdf->Text(23,71+(5*3),"07_");
$pdf->Text(23,71+(5*4),"06_");
$pdf->Text(23,71+(5*5),"05_");
$pdf->Text(23,71+(5*6),"04_");
$pdf->Text(23,71+(5*7),"03_");
$pdf->Text(23,71+(5*8),"02_");
$pdf->Text(23,71+(5*9),"01_");
$pdf->Text(23,71+(5*10),"00_");
$pdf->Text(20,71+(5*11),"Heure_");
$pdf->Text(32+(7*0),120,"1");
$pdf->Text(32+(7*1),120,"2");
$pdf->Text(32+(7*2),120,"3");
$pdf->Text(32+(7*3),120,"4");
$pdf->Text(32+(7*4),120,"5");
$pdf->Text(32+(7*5),120,"6");
$pdf->Text(32+(7*6),120,"7");
$pdf->Text(32+(7*7),120,"8");
$pdf->Text(32+(7*8),120,"9");
$pdf->Text(32+(7*9),120,"10");
$pdf->Text(32+(7*10),120,"11");
$pdf->Text(32+(7*11),120,"12");
$pdf->Text(32+(7*12),120,"13");
$pdf->Text(32+(7*13),120,"14");
$pdf->Text(32+(7*14),120,"15");
$pdf->Text(32+(7*15),120,"16");
$pdf->Text(32+(7*16),120,"17");
$pdf->Text(32+(7*17),120,"18");
$pdf->Text(32+(7*18),120,"19");
$pdf->Text(32+(7*19),120,"20");
$pdf->Text(32+(7*20),120,"21");
$pdf->Text(32+(7*21),120,"22");
$pdf->Text(32+(7*22),120,"23");
$pdf->Text(32+(7*23),120,"24");
$x1=20; $y1=64;  //xy tableau
$x=7; $y=5;     //xy cellule
$l=11;$c=24;    //ligne collone
for($i1=10; $i1<=5*($l+1) ; $i1 += $y) 
{
	for($i=10; $i<=$x*($c+1); $i += $x) 
	{
	$pdf->SetXY($i+$x1,$y1+($i1)); //  
	$pdf->cell($x,$y,"",1,0,'C',0);
	}
}
//********************************************************//
$pdf->Text(25,132+(5*0),"5_");
$pdf->Text(25,132+(5*1),"4_");$pdf->Text(10,132+(5*1),"Nombre de");
$pdf->Text(25,132+(5*2),"3_");$pdf->Text(10,132+(5*2),"Contraction");
$pdf->Text(25,132+(5*3),"2_");$pdf->Text(10,132+(5*3),"en 10 mn");
$pdf->Text(25,132+(5*4),"1_");
$x1=20; $y1=122;   //xy tableau
$x=7; $y=5;        //xy cellule
$l=5;$c=24;         //ligne collone
for($i1=10; $i1<=5*($l+1) ; $i1 += $y) 
{
	for($i=10; $i<=$x*($c+1); $i += $x) 
	{
	$pdf->SetXY($i+$x1,$y1+($i1)); //  
	$pdf->cell($x,$y,"",1,0,'C',0);
	}
}
//********************************************************//
$pdf->Text(10,153+(5*1),"Oxytocine U/L");
$pdf->Text(10,153+(5*2),"Gouttes/mn");
$x1=20; $y1=148;  //xy tableau
$x=7; $y=5;     //xy cellule
$l=2;$c=24;    //ligne collone
for($i1=10; $i1<=5*($l+1) ; $i1 += $y) 
{
	for($i=10; $i<=$x*($c+1); $i += $x) 
	{
	$pdf->SetXY($i+$x1,$y1+($i1)); //  
	$pdf->cell($x,$y,"",1,0,'C',0);
	}
}



//********************************************************//
$pdf->Text(10,175,"Medicaments");
$pdf->Text(10,180,"Prescrits en IV");
$x1=20; $y1=169;  //xy tableau
$x=7; $y=21;     //xy cellule
$c=24;    //ligne collone

	for($i=10; $i<=$x*($c+1); $i += $x) 
	{
	$pdf->SetXY($i+$x1,$y1); //  
	$pdf->cell($x,$y,"",1,0,'C',0);
	}
//********************************************************//

$x1=20; $y1=181;  //xy tableau
$x=7; $y=5;     //xy cellule
$l=12;$c=24;    //ligne collone
for($i1=10; $i1<=5*($l+1) ; $i1 += $y) 
{
	for($i=10; $i<=$x*($c+1); $i += $x) 
	{
	$pdf->SetXY($i+$x1,$y1+($i1)); //  
	$pdf->cell($x,$y,"",1,0,'C',0);
	}
}
$pdf->Text(23,248,"060_");
$pdf->Text(23,248-(5*1),"070_");
$pdf->Text(23,248-(5*2),"080_");
$pdf->Text(23,248-(5*3),"090_");
$pdf->Text(23,248-(5*4),"100_");$pdf->Text(10,248-(5*4),"TA");
$pdf->Text(23,248-(5*5),"110_");
$pdf->Text(23,248-(5*6),"120_");
$pdf->Text(23,248-(5*7),"130_");$pdf->Text(10,248-(5*7),"ET");
$pdf->Text(23,248-(5*8),"140_");
$pdf->Text(23,248-(5*9),"150_");$pdf->Text(10,248-(5*9),"POOLS");
$pdf->Text(23,248-(5*10),"160_");
$pdf->Text(23,248-(5*11),"170_");
$pdf->Text(23,248-(5*12),"180_");




//********************************************************//
$x1=20; $y1=242;  //xy tableau
$x=7; $y=5;     //xy cellule
$l=1;$c=24;    //ligne collone
for($i1=10; $i1<=5*($l+1) ; $i1 += $y) 
{
	for($i=10; $i<=$x*($c+1); $i += $x) 
	{
	$pdf->SetXY($i+$x1,$y1+($i1)); //  
	$pdf->cell($x,$y,"",1,0,'C',0);
	}
}
$pdf->Text(7,248+5,"Temperature en C°");
//********************************************************//
$x1=20; $y1=248;  //xy tableau
$x=7; $y=5;     //xy cellule
$l=3;$c=24;    //ligne collone
for($i1=10; $i1<=5*($l+1) ; $i1 += $y) 
{
	for($i=10; $i<=$x*($c+1); $i += $x) 
	{
	$pdf->SetXY($i+$x1,$y1+($i1)); //  
	$pdf->cell($x,$y,"",1,0,'C',0);
	}
}
$pdf->Text(15,248+10,"Proteinurie");
$pdf->Text(15,248+15,"Cetone");
$pdf->Text(15,248+20,"Volume");



$i=30;
$pdf-> SetDrawColor(225,0,0);
$pdf->SetLineWidth(1);
$pdf->Line(30 ,$i,198,$i );
$pdf->SetDrawColor(0,0,255);

$i=50;
$pdf-> SetDrawColor(225,0,0);
$pdf->SetLineWidth(1);
$pdf->Line(30 ,$i,198,$i );
$pdf->SetDrawColor(0,0,255);

$i=109;
$pdf->SetDrawColor(225,0,0);
$pdf->SetLineWidth(1);
$pdf->Line(30 ,$i,86,$i );
$pdf->Line(86 ,$i,135,$i-35 );
$pdf->Line(86+28 ,$i,163,$i-35 );
$pdf->Line($i-23,109,$i-23,129 );
$pdf->SetDrawColor(0,0,255);


$i=211;
$pdf-> SetDrawColor(225,0,0);
$pdf->SetLineWidth(1);
$pdf->Line(30 ,$i,198,$i );
$pdf->SetDrawColor(0,0,255);
$i=241;
$pdf-> SetDrawColor(225,0,0);
$pdf->SetLineWidth(1);
$pdf->Line(30 ,$i,198,$i );
$pdf->SetDrawColor(0,0,255);

// $pdf->SetXY(10,$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);
// $pdf->SetXY($pdf->GetX(),$pdf->GetY()); 	  
// $pdf->cell(8,4,"",1,0,'C',0);







// $pdf->Rect(15,70,10,125,"d");//$pdf->Rect(x,y,l,hauteur,"d");
// $pdf->Text(10,63,"la date :"); 
// $pdf->Text(7,70,"TE");
// $pdf->Text(17,70,"TA");
// $pdf->Text(27,70,"DU");
// $pdf->Text(7,105,"37");
//temperature
// $i=150;
// $pdf-> SetDrawColor(225,0,0);
// $pdf->SetLineWidth(1);
// $pdf->Line(15 ,$i,294 ,$i );
// $pdf->Text(7,$i-3,"37");
// $pdf->SetDrawColor(0,0,255);
//ta
// $i=130;
// $pdf->Line(25,$i,294,$i);
// $pdf->Text(17,$i-5,"110");
// $pdf->Text(17,$i-10,"120");
// $pdf->Text(17,$i-15,"130");
// $pdf->Text(17,$i-20,"140");
// $pdf->Text(17,$i-25,"150");
// $pdf->Text(17,$i-30,"160");
// $pdf->Text(17,$i-35,"170");
// $pdf->Text(17,$i-40,"180");
// $pdf->Text(17,$i-45,"190");
// $pdf->Text(17,$i-50,"200");
// $pdf->Text(17,$i-55,"210");
// $pdf->Text(17,$i,"100");
// $pdf->Text(17,$i+5,"090");
// $pdf->Text(17,$i+10,"080");
// $pdf->Text(17,$i+15,"070");
// $pdf->Text(17,$i+20,"060");
// $pdf->Text(17,$i+25,"050");
// $pdf->Text(17,$i+30,"040");
// $pdf->Text(17,$i+35,"030");
// $pdf->Text(17,$i+40,"020");
// $pdf->Text(17,$i+45,"010");
// $pdf->Text(17,$i+50,"000");
// $pdf->Text(17,$i+55,"000");
//variables
// $pdf->SetTextColor(225,0,0);
// $pdf->Text(15,30,$NOM);
// $pdf->Text(65,30,$PRENOM);
//$pdf->Text(130,30,$DATENAISSANCE);
//$pdf->Text(179,30,$AGE);
// $pdf->Text(218,30,$dateeuro);
// $pdf->Text(275,30,$dateeuro1);
// $pdf->SetTextColor(0,0,255);

$pdf->Output();
}
else
{
header('location: ../Pat/view/'.$_GET['iddnr']);
}
?>


