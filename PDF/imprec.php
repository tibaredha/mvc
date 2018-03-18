<?php
require('DNR.php');
$pdf = new DNR( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$ordre=$_POST['ordre'];
$ascdesc=$_POST['ascdesc'];
$groupage=$_POST['groupage'];
$rhesus=$_POST['rhesus'];
$nbrlimit=$_POST['nbrlimit'];
$SEXE=$_POST['SEXE'];
$date=date("d-m-y");
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 11);
$pdf->entetepage1('LISTE NOMINATIVE DES RECEVEURS');
$h=40;
$pdf->SetXY(5,$h);$pdf->cell(20,5,"IREC",1,0,'C',1,0);
$pdf->SetXY(25,$h);$pdf->cell(40,5,"NOM",1,0,'C',1,0);
$pdf->SetXY(65,$h);$pdf->cell(40,5,"PRENOM",1,0,'C',1,0);
$pdf->SetXY(105,$h);$pdf->cell(20,5,"SEXE",1,0,'C',1,0);
$pdf->SetXY(125,$h);$pdf->cell(25,5,"DNS",1,0,'C',1,0);
$pdf->SetXY(150,$h);$pdf->cell(20,5,"ABO",1,0,'C',1,0);
$pdf->SetXY(170,$h);$pdf->cell(25,5,"RH",1,0,'C',1,0);
$pdf->SetXY(195,$h);$pdf->cell(25,5,"DDT",1,0,'C',1,0);
$pdf->SetXY(220,$h);$pdf->cell(25,5,"DINS",1,0,'C',1,0);
$pdf->SetXY(245,$h);$pdf->cell(45,5,"TEL",1,0,'C',1,0);
$pdf->SetXY(5,45); // marge sup 13
//********************************************************************************************//
$db_host="localhost";
$db_name="MVC"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query="select * from rec  where   GRABO $groupage  AND  GRRH $rhesus   AND    SEX $SEXE   order by $ordre $ascdesc limit $nbrlimit          "; //% %will search form 0-9,a-z  order by $ordre $ascdesc limit $nbrlimit
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
$pdf->SetFont('Times', '', 9);
//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
   $pdf->cell(20,8,trim($row->id),1,0,'C',0);//5  =hauteur de la cellule origine =7
   $pdf->cell(40,8,trim($row->NOM),1,0,'L',0);
   $pdf->cell(40,8,trim($row->PRENOM),1,0,'L',0);
   $pdf->cell(20,8,trim($row->SEX),1,0,'C',0);
   $pdf->cell(25,8,trim($row->DATENAISSANCE),1,0,'C',0);
   $pdf->cell(20,8,trim($row->GRABO),1,0,'C',0);
   $pdf->cell(25,8,trim($row->GRRH),1,0,'C',0);
   $pdf->cell(25,8,trim($row->DDT),1,0,'C',0);
   $pdf->cell(25,8,trim($row->DINS),1,0,'C',0);
   $pdf->cell(45,8,trim($row->TELEPHONE),1,0,'C',0);
   $pdf->SetXY(5,$pdf->GetY()+8); 
  }
$pdf->SetFont('Times', 'B', 11);
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(20,5,"Total",1,0,'C',1,0);	  
$pdf->SetXY(25,$pdf->GetY());$pdf->cell(265,5,$totalmbr1."  "."Receveurs",1,0,'C',1,0);				 
$pdf->SetXY(130,$pdf->GetY()+20);$pdf->cell(60,5,"DR TIBA PTS AIN OUSSERA ",0,0,'C',0);		
$pdf->Output();  
  
  
  
