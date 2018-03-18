<?php
require('DNR.php');
$pdf = new DNR( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$ordre=$_POST['ordre'];
$ascdesc=$_POST['ascdesc'];
$groupage=$_POST['groupage'];
$rhesus=$_POST['rhesus'];
$nbrlimit=$_POST['nbrlimit'];
$IND=$_POST['IND'];
$fixemobile=$_POST['fixemobile'];
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 11);
$pdf->entetepage1('LISTE NOMINATIVE DES DONS');
$h=40;
$pdf->SetXY(5,$h);$pdf->cell(15,5,"NDP",1,0,'C',1,0);
$pdf->SetXY(20,$h);$pdf->cell(25,5,"DATEDON",1,0,'C',1,0);
$pdf->SetXY(45,$h);$pdf->cell(15,5,"IDDNR",1,0,'C',1,0);
$pdf->SetXY(60,$h);$pdf->cell(60,5,"NOM_PRENOM",1,0,'C',1,0);
$pdf->SetXY(120,$h);$pdf->cell(40,5,"TDNR",1,0,'C',1,0);
$pdf->SetXY(160,$h);$pdf->cell(20,5,"STR",1,0,'C',1,0);
$pdf->SetXY(180,$h);$pdf->cell(25,5,"IND",1,0,'C',1,0);
$pdf->SetXY(205,$h);$pdf->cell(25,5,"POIDS",1,0,'C',1,0);
$pdf->SetXY(230,$h);$pdf->cell(25,5,"TA",1,0,'C',1,0);
$pdf->SetXY(255,$h);$pdf->cell(35,5,"ABO_RH",1,0,'C',1,0);
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
$query="select * from don  where  GROUPAGE $groupage AND  RHESUS $rhesus  AND IND $IND   AND STR $fixemobile  order by $ordre $ascdesc limit $nbrlimit "; //    % %will search form 0-9,a-z            
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$pdf->SetFont('Times', '', 11);
$pdf->cell(15,8,trim($row->IDP),1,0,'C',0);
$pdf->cell(25,8,trim($row->DATEDON),1,0,'C',0);
$pdf->cell(15,8,trim($row->IDDNR),1,0,'C',0);
$pdf->SetFont('Times', '', 10);
$pdf->cell(60,8,trim(nbrtostring('mvc','dnr','id',$row->IDDNR,'NOM'))."_".trim(nbrtostring('mvc','dnr','id',$row->IDDNR,'PRENOM')),1,0,'L',0);
$pdf->SetFont('Times', '', 12);
$pdf->cell(40,8,trim($row->TDNR),1,0,'C',0);
$pdf->cell(20,8,trim($row->STR),1,0,'C',0);
$pdf->cell(25,8,trim($row->IND),1,0,'C',0); 
$pdf->cell(25,8,trim($row->POIDS),1,0,'C',0);
$pdf->cell(25,8,trim($row->TAS.'_'.$row->TAS),1,0,'C',0);
$pdf->cell(35,8,trim($row->GROUPAGE.'_'.$row->RHESUS),1,0,'C',0);
$pdf->SetXY(5,$pdf->GetY()+8); 
}
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(15,5,"Total",1,0,'C',1,0);	  
$pdf->SetXY(20,$pdf->GetY());$pdf->cell(270,5,$totalmbr1."  "."Dons",1,0,'C',1,0);				 
$pdf->SetXY(130,$pdf->GetY()+20);$pdf->cell(60,5,"DR TIBA PTS AIN OUSSERA ",0,0,'C',0);		
$pdf->Output();