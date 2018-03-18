<?php
require('hemod.php');
$pdf = new hemod( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$ordre=$_POST['ordre'];
$ascdesc=$_POST['ascdesc'];
$groupage=$_POST['groupage'];
$rhesus=$_POST['rhesus'];
$nbrlimit=$_POST['nbrlimit'];
$SEXE=$_POST['SEXE'];
$date=date("d-m-y");
$pdf->entete($date,$date);
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration'LISTE NOMINATIVE DES MALADES HEMODIALYSES'
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 11);
$h=70;
$pdf->SetXY(05,$h);$pdf->cell(20,5,"ID",1,0,'C',1,0);
$pdf->SetXY(25,$h);$pdf->cell(40,5,"NOM",1,0,'C',1,0);
$pdf->SetXY(65,$h);$pdf->cell(40,5,"PRENOM",1,0,'C',1,0);
$pdf->SetXY(105,$h);$pdf->cell(20,5,"SEXE",1,0,'C',1,0);
$pdf->SetXY(125,$h);$pdf->cell(25,5,"DNS",1,0,'C',1,0);
$pdf->SetXY(150,$h);$pdf->cell(20,5,"ABO",1,0,'C',1,0);
$pdf->SetXY(170,$h);$pdf->cell(25,5,"RH",1,0,'C',1,0);
$pdf->SetXY(195,$h); $pdf->cell(25,5,"DDD",1,0,'C',1,0);
$pdf->SetXY(220,$h); $pdf->cell(25,5,"DPD",1,0,'C',1,0);
$pdf->SetXY(245,$h);$pdf->cell(45,5,"TEL",1,0,'C',1,0);
$pdf->SetXY(5,75); // marge sup 13
$query="select * from hemo where GRABO $groupage  AND  GRRH $rhesus AND SEX $SEXE order by $ordre $ascdesc limit $nbrlimit "; //% %will search form 0-9,a-z  order by $ordre $ascdesc limit $nbrlimit
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
$pdf->SetFont('Times', '', 9);
while($row=mysql_fetch_object($resultat))
{
$pdf->cell(20,8,trim($row->id),1,0,'C',0);
$pdf->cell(40,8,trim($row->NOM),1,0,'L',0);
$pdf->cell(40,8,trim($row->PRENOM),1,0,'L',0);
$pdf->cell(20,8,trim($row->SEX),1,0,'C',0);
$pdf->cell(25,8,trim($row->DATENAISSA),1,0,'C',0);
$pdf->cell(20,8,trim($row->GRABO),1,0,'C',0);
$pdf->cell(25,8,trim($row->GRRH),1,0,'C',0);
$pdf->cell(25,8,trim($row->DDD),1,0,'C',0);
$pdf->cell(25,8,trim($row->DDD),1,0,'C',0);
$pdf->cell(45,8,trim($row->TELEPHONE),1,0,'C',0);
$pdf->SetXY(5,$pdf->GetY()+8); 
}
$pdf->SetFont('Times', 'B', 11);  
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(20,5,"total",1,0,'C',1,0);	  
$pdf->SetXY(25,$pdf->GetY());$pdf->cell(265,5,$totalmbr1."  "."malades",1,0,'C',1,0);				 
$pdf->SetXY(130,$pdf->GetY()+20);$pdf->cell(60,5,"DR TIBA AIN OUSSERA ",0,0,'C',0);		
$pdf->Output();