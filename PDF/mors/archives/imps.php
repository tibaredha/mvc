<?php
require('hemod.php');
$pdf = new hemod( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$ordre=$_POST['ordre'];$ascdesc=$_POST['ascdesc'];$nbrlimit=$_POST['nbrlimit'];


$TYPEDIA=$_POST['TYPEDIA'];
$ACCSANG=$_POST['ACCSANG'];
// $SEXE=$_POST['SEXE'];
$date=date("d-m-y");
$pdf->entete($date,$date);
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration'LISTE NOMINATIVE DES MALADES HEMODIALYSES'
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 11);
$h=70;
$pdf->SetXY(05,$h);$pdf->cell(20,5,"ID",1,0,'C',1,0);
$pdf->cell(25,5,"Date Seance",1,0,'C',1,0);
$pdf->cell(20,5,"Ref id",1,0,'C',1,0);
$pdf->cell(40,5,"Type Dialyse",1,0,'C',1,0);
$pdf->cell(30,5,"ACCSANG",1,0,'C',1,0);
$pdf->cell(20,5,"NAPP",1,0,'C',1,0);
$pdf->cell(25,5,"Heure Debut",1,0,'C',1,0);
$pdf->cell(25,5,"Heure Fin",1,0,'C',1,0);
$pdf->cell(25,5,"Poids Debut",1,0,'C',1,0);
$pdf->cell(25,5,"Poids Fin",1,0,'C',1,0);
$pdf->cell(30,5,"Diff Poids",1,0,'C',1,0);


$pdf->SetXY(5,75); // marge sup 13
//$query="select * from hemoseance where GRABO $groupage  AND  GRRH $rhesus AND SEX $SEXE order by $ordre $ascdesc limit $nbrlimit "; //% %will search form 0-9,a-z  order by $ordre $ascdesc limit $nbrlimit
$query="select * from hemoseance  where  TYPEDIA $TYPEDIA and  ACCSANG $ACCSANG order by $ordre $ascdesc limit $nbrlimit"; //% %will search form 0-9,a-z  order by $ordre $ascdesc limit $nbrlimit




$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
$pdf->SetFont('Times', '', 9);
while($row=mysql_fetch_object($resultat))
{
$pdf->cell(20,8,trim($row->ids),1,0,'C',0);
$pdf->cell(25,8,trim($row->dateseance),1,0,'C',0);
$pdf->cell(20,8,trim($row->id),1,0,'C',0);
$pdf->cell(40,8,trim($row->TYPEDIA),1,0,'L',0);
$pdf->cell(30,8,trim($row->ACCSANG),1,0,'L',0);
$pdf->cell(20,8,trim($row->NAPP),1,0,'C',0);
$pdf->cell(25,8,trim($row->HEUREDD),1,0,'C',0);
$pdf->cell(25,8,trim($row->HEUREFD),1,0,'C',0);
$pdf->cell(25,8,trim($row->POIDSD),1,0,'C',0);
$pdf->cell(25,8,trim($row->POIDSF),1,0,'C',0);
$pdf->cell(30,8,trim($row->POIDSD-$row->POIDSF),1,0,'C',0);
$pdf->SetXY(5,$pdf->GetY()+8); 
}
$pdf->SetFont('Times', 'B', 11);  
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(20,5,"total",1,0,'C',1,0);	  
$pdf->SetXY(25,$pdf->GetY());$pdf->cell(265,5,$totalmbr1."  "."malades",1,0,'C',1,0);				 
$pdf->SetXY(130,$pdf->GetY()+20);$pdf->cell(60,5,"DR TIBA AIN OUSSERA ",0,0,'C',0);		
$pdf->Output();