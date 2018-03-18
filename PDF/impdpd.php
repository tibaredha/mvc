<?php
require('DNR.php');
$pdf = new DNR( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 11);
$pdf->entetepage1('LISTE NOMINATIVE DES DONNEURS PAR NOMBRE DE DONS');
$h=40;
$pdf->SetXY(5,$h);$pdf->cell(15,5,"IDDNR",1,0,'C',1,0);
$pdf->SetXY(20,$h);$pdf->cell(130,5,"NOM ET PRENOM ",1,0,'C',1,0);
$pdf->SetXY(150,$h);$pdf->cell(30,5,"NAISSANCE",1,0,'C',1,0);
$pdf->SetXY(180,$h);$pdf->cell(15,5,"AGE",1,0,'C',1,0);
$pdf->SetXY(195,$h);$pdf->cell(35,5,"GROUPAGE",1,0,'C',1,0);
$pdf->SetXY(195+35,$h);$pdf->cell(32,5,"TELEPHONE",1,0,'C',1,0);
$pdf->SetXY(195+67,$h);$pdf->cell(28,5,"NBR DONS",1,0,'C',1,0);
$pdf->SetXY(5,45); 
function nbrtostring($db_name,$tb_name,$colonename,$colonevalue,$resultatstring) 
{
$db_host="localhost"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
$row=mysql_fetch_object($result);
$resultat=$row->$resultatstring;
return $resultat;
}
$db_host="localhost";
$db_name="mvc"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query="SELECT COUNT(IDDNR) as NBRDON,IDDNR,GROUPAGE,RHESUS,DATEDON   FROM don GROUP BY IDDNR HAVING COUNT( IDDNR ) >2 order by NBRDON desc   "; //    % %will search form 0-9,a-z            
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$pdf->SetFont('Times', '', 11);
$pdf->cell(15,8,trim($row->IDDNR),1,0,'C',0);
$pdf->cell(130,8,trim(nbrtostring('mvc','dnr','id',$row->IDDNR,'NOM'))."_".trim(nbrtostring('mvc','dnr','id',$row->IDDNR,'PRENOM')),1,0,'L',0);
$pdf->cell(30,8,trim(nbrtostring('mvc','dnr','id',$row->IDDNR,'DATENAISSANCE')),1,0,'C',0);
$pdf->cell(15,8,trim(substr(date('d-m-Y'),6,4)-substr(nbrtostring('mvc','dnr','id',$row->IDDNR,'DATENAISSANCE'),6,4)),1,0,'C',0);    
$pdf->cell(35,8,trim($row->GROUPAGE.'_'.$row->RHESUS),1,0,'C',0);
$pdf->cell(32,8,trim(nbrtostring('mvc','dnr','id',$row->IDDNR,'TELEPHONE')),1,0,'C',0);
$pdf->cell(28,8,trim($row->NBRDON),1,0,'C',0);
$pdf->SetXY(5,$pdf->GetY()+8); 
}
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(15,5,"Total",1,0,'C',1,0);	  
$pdf->SetXY(20,$pdf->GetY());$pdf->cell(270,5,$totalmbr1."  "."Donneurs avec + de 02 dons ",1,0,'C',1,0);				 
$pdf->SetXY(130,$pdf->GetY()+20);$pdf->cell(60,5,"DR TIBA PTS AIN OUSSERA ",0,0,'C',0);		
$pdf->Output();