<?php
require('MDOC1.php');
$pdf = new MDOC( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$ordre=$_POST['ordre'];
$ascdesc=$_POST['ascdesc'];
$MDO=$_POST['MDO'];
$COMMUNEN=$_POST['COMMUNEN'];
$nbrlimit=$_POST['nbrlimit'];
$sexe=$_POST['sexe'];
$date=date("d-m-y");

$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->SetXY(05,5); $pdf->cell(285,5,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE",0,0,'C',0,0);
$pdf->SetXY(05,10);$pdf->cell(285,5,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE",0,0,'C',0,0);
$pdf->SetXY(05,15);$pdf->cell(285,5,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA",0,0,'C',0,0);
$pdf->SetXY(05,20);$pdf->cell(142,5,"SERVICE PREVENTION",0,0,'L',0,0);$pdf->cell(142,5," LE : ".date ('d-m-Y'),0,0,'R',0,0);
$pdf->SetXY(60,30);$pdf->cell(100,5,"Maladie A Declaration Obligatoire",0,0,'L',0,0);
$h=50;
$pdf->SetXY(005,$h);$pdf->cell(20,10,html_entity_decode(utf8_decode("N°")),1,0,'C',1,0);
$pdf->cell(20,10,"DATE",1,0,'C',1,0);
$pdf->cell(60,10,"NOM ET PRENOM",1,0,'C',1,0);
$pdf->cell(20,10,"AGE",1,0,'C',1,0);
$pdf->cell(10,5,"SEXE",1,0,'C',1,0);
$pdf->SetXY(125,$h+5);$pdf->cell(5,5,"M",1,0,'C',1,0);
$pdf->SetXY(130,$h+5);$pdf->cell(5,5,"F",1,0,'C',1,0);
$pdf->SetXY(135,$h);$pdf->cell(50,10,"ADRESSE",1,0,'C',1,0);
$pdf->cell(80,10,"MALADIE",1,0,'C',1,0);
$pdf->cell(30,10,"OBSERVATION",1,0,'C',1,0);
$pdf->SetXY(05,60); 
$db_host="localhost";
$db_name="MVC"; 
$db_user="root";
$db_pass="";
$cnx = mysql_connect($db_host,$db_user,$db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
$db  = mysql_select_db($db_name,$cnx) ;
mysql_query("SET NAMES 'UTF8' ");                         
$query="select * from MDO1 where COMMUNE $COMMUNEN    AND SEXE $sexe AND MDO $MDO order by $ordre $ascdesc limit $nbrlimit  "; //% %will search form 0-9,a-z  order by $ordre $ascdesc limit $nbrlimit
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
$pdf->SetFont('Times', '', 9);
while($row=mysql_fetch_object($resultat))
{
$pdf->cell(20,5,$row->id,1,0,'C',0);
$pdf->cell(20,5,$pdf->dateUS2FR($row->DATEMDO),1,0,'C',0);
$pdf->cell(60,5,$row->NOMPRENOM,1,0,'L',0,0);
$pdf->cell(20,5,$row->AGE,1,0,'C',0,0);
if (Trim($row->SEXE)=='M'){$pdf->cell(5,5,'X',1,0,'L',0);$pdf->cell(5,5,'',1,0,'L',0);}
if (Trim($row->SEXE)=='F'){$pdf->cell(5,5,'',1,0,'L',0);$pdf->cell(5,5,'X',1,0,'L',0);}
$pdf->cell(50,5,$pdf->nbrtostring('com','IDCOM',$row->COMMUNE,'COMMUNE') ,1,0,'L',0,0);
$pdf->cell(80,5,$pdf->nbrtostring('mdo','id',$row->MDO,'mdo'),1,0,'L',0,0);
$pdf->cell(30,5,$row->OBSERVATION,1,0,'C',0,0);
$pdf->SetXY(05,$pdf->GetY()+5);   
}
$pdf->SetFont('Times', 'B', 11);  
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(20,5,"total",1,0,'C',1,0);	  
$pdf->SetXY(25,$pdf->GetY());$pdf->cell(270,5,$totalmbr1."  "."Bordereaux",1,0,'C',1,0);				 
$pdf->SetXY(220,$pdf->GetY()+15);$pdf->cell(35,5,"Service prevention ",0,0,'C',0,0);
$pdf->SetXY(220,$pdf->GetY()+5);$pdf->cell(35,5,"Dr redha TIBA ",0,0,'C',0,0);	
$pdf->Output();