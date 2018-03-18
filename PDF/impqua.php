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
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 11);
$pdf->entetepage1('LISTE QUALIFICATION DES DONS');
$h=40;
$pdf->SetXY(5,$h);$pdf->cell(30,5,"NDP",1,0,'C',1,0);
$pdf->SetXY(35,$h);$pdf->cell(30,5,"DATEDON",1,0,'C',1,0);
$pdf->SetXY(65,$h);$pdf->cell(30,5,"IDDNR",1,0,'C',1,0);
$pdf->SetXY(95,$h);$pdf->cell(30,5,"ABO",1,0,'C',1,0);
$pdf->SetXY(125,$h);$pdf->cell(30,5,"RH",1,0,'C',1,0);
$pdf->SetXY(155,$h);$pdf->cell(25,5,"HVB",1,0,'C',1,0);
$pdf->SetXY(180,$h);$pdf->cell(25,5,"HVC",1,0,'C',1,0);
$pdf->SetXY(205,$h);$pdf->cell(25,5,"HIV",1,0,'C',1,0);
$pdf->SetXY(230,$h);$pdf->cell(25,5,"TPHA",1,0,'C',1,0);
$pdf->SetXY(255,$h);$pdf->cell(35,5,"DATEQUA",1,0,'C',1,0);
$pdf->SetXY(5,45); // marge sup 13
//********************************************************************************************//
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
//***********************************************************************//
while($row=mysql_fetch_object($resultat))
  {
  $pdf->cell(30,8,trim($row->IDP),1,0,'C',0);
  $pdf->cell(30,8,trim($row->DATEDON),1,0,'C',0);
  $pdf->cell(30,8,trim($row->IDDNR),1,0,'C',0);
  
  if (trim($row->GROUPAGE) == 'A') 
  {
  $pdf->SetFillColor(135,206,235);//r+v+b
  $pdf->cell(30,8,$row->GROUPAGE,1,0,'C',1,0);
  $pdf->SetFillColor(230);
  }
  if (trim($row->GROUPAGE) == 'B') 
  {
  $pdf->SetFillColor(250,250,0);//r+v+b
  $pdf->cell(30,8,$row->GROUPAGE,1,0,'C',1,0);
  $pdf->SetFillColor(230);
  }
   if (trim($row->GROUPAGE) == 'O') 
  {
  $pdf->SetFillColor(250,250,0);//r+v+b
  $pdf->cell(30,8,$row->GROUPAGE,1,0,'C',0,0);
  $pdf->SetFillColor(230);
  }
  if (trim($row->GROUPAGE) == 'AB') 
  {
  $pdf->SetFillColor(250,0,0);//r+v+b
  $pdf->cell(30,8,$row->GROUPAGE,1,0,'C',1,0);
  $pdf->SetFillColor(230);
  }
   if (trim($row->GROUPAGE) == '') 
  {
  $pdf->SetFillColor(230);//r+v+b
  $pdf->cell(30,8,$row->GROUPAGE,1,0,'C',1,0);
  $pdf->SetFillColor(230);
  }
  $pdf->cell(30,8,trim($row->RHESUS),1,0,'C',0);
  $pdf->cell(25,8,trim($row->HVB),1,0,'C',0,0);
  $pdf->cell(25,8,trim($row->HVC),1,0,'C',0);
  $pdf->cell(25,8,trim($row->HIV),1,0,'C',0);
  $pdf->cell(25,8,trim($row->TPHA),1,0,'C',0);
  $pdf->cell(35,8,trim($row->DATEQUA),1,0,'C',0);
  $pdf->SetXY(5,$pdf->GetY()+8); 
  }
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(30,5,"Total",1,0,'C',1,0);	  
$pdf->SetXY(35,$pdf->GetY());$pdf->cell(255,5,$totalmbr1."  "."Dons",1,0,'C',1,0);				 
$pdf->SetXY(130,$pdf->GetY()+20); $pdf->cell(60,5,"DR TIBA PTS AIN OUSSERA ",0,0,'C',0);		
$pdf->Output();