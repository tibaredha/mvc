<?php
require('DNR.php');
$pdf = new DNR( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$ordre=$_POST['ordre'];
$ascdesc=$_POST['ascdesc'];
$groupage=$_POST['groupage'];
$rhesus=$_POST['rhesus'];
$nbrlimit=$_POST['nbrlimit'];
$PSL=$_POST['PSL'];
$SERVICE=$_POST['SERVICE'];
$date=date("d-m-y");
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 11);
$pdf->entetepage1('LISTE NOMINATIVE DES DISTRIBUTION DE PSLs');
$h=40;
$pdf->SetXY(5,$h);$pdf->cell(15,5,"ID",1,0,'C',1,0);
$pdf->SetXY(20,$h);$pdf->cell(25,5,"DATEDIS",1,0,'C',1,0);
$pdf->SetXY(45,$h);$pdf->cell(60,5,"NOM_PRENOM",1,0,'C',1,0);
$pdf->SetXY(105,$h);$pdf->cell(25,5,"AGE",1,0,'C',1,0);
$pdf->SetXY(130,$h);$pdf->cell(15,5,"SEXE",1,0,'C',1,0);
$pdf->SetXY(145,$h);$pdf->cell(30,5,"ABO_RH",1,0,'C',1,0);
$pdf->SetXY(175,$h);$pdf->cell(15,5,"PSL",1,0,'C',1,0);
$pdf->SetXY(190,$h);$pdf->cell(20,5,"IDP",1,0,'C',1,0);
$pdf->SetXY(210,$h);$pdf->cell(50,5,"SERVICE",1,0,'C',1,0);
$pdf->SetXY(260,$h);$pdf->cell(25,5,"MEDECIN",1,0,'C',1,0);
$pdf->SetXY(5,45); // marge sup 13
//********************************************************************************************//
function nbrtostring($db_name,$tb_name,$colonename,$colonevalue,$resultatstring) 
{
if (is_numeric($colonevalue) and $colonevalue!=='0') 
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
return $resultat='??????';
}
$db_host="localhost";
$db_name="mvc"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");
$query="select * from dis where  GROUPAGE $groupage AND  RHESUS $rhesus  AND PSL $PSL   AND SERVICE $SERVICE  order by $ordre $ascdesc limit $nbrlimit "; //    % %will search form 0-9,a-z            
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
//***********************************************************************//
$pdf->SetFont('Times', '', 12);
while($row=mysql_fetch_object($resultat))
  {
  $pdf->cell(15,8,trim($row->id),1,0,'C',0);
  $pdf->cell(25,8,trim($row->DATEDIS),1,0,'C',0);
  $pdf->SetFont('Times', '', 11);
   $pdf->cell(60,8,trim(nbrtostring('mvc','rec','id',$row->IDREC,'NOM'))."_".trim(nbrtostring('mvc','rec','id',$row->IDREC,'PRENOM')),1,0,'L',0);
  $pdf->SetFont('Times', '', 12);
  $pdf->cell(25,8,trim($row->AGE),1,0,'C',0); 
  $pdf->cell(15,8,trim($row->SEX),1,0,'C',0); 
  $pdf->cell(30,8,trim($row->GROUPAGE.'_'.$row->RHESUS),1,0,'C',0);
  $pdf->cell(15,8,trim($row->PSL),1,0,'C',0);
  $pdf->cell(20,8,trim($row->IDP),1,0,'C',0);
  $pdf->cell(50,8,trim(nbrtostring('mvc','ser','id',$row->SERVICE,'service')),1,0,'l',0);
  $pdf->cell(25,8,$row->MED,1,0,'C',0); 
  // $pdf->cell(25,8,trim(nbrtostring('mvc','grh','idp',$row->MED,'Nomlatin')),1,0,'C',0); 
  $pdf->SetXY(5,$pdf->GetY()+8); 
  }
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(15,5,"Total",1,0,'C',1,0);	  
$pdf->SetXY(20,$pdf->GetY());$pdf->cell(270,5,$totalmbr1."  "."Distributions",1,0,'C',1,0);				 
$pdf->SetXY(130,$pdf->GetY()+20);$pdf->cell(60,5,"DR TIBA PTS AIN OUSSERA ",0,0,'C',0);		
$pdf->Output();