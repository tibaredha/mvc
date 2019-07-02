<?php
require('INSPECTION1.php');
$pdf = new INSPECTION1( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',10);
$pdf->Text(90,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(70,15,"MINISTERE DE LA SANTE DE LA POPULATION ET DE LA REFORME HOSPITALIERE ");
$pdf->Text(75,20,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA");

$pdf->Text(240,25," LE : ".date('d-m-Y'));
$pdf->Text(05,30,"INSPECTION");
$pdf->Text(05,35,"N ... /".date('Y'));
$pdf->Text(60,35,"RELEVE DES STRUCTURES SANTAIRES");
$pdf->Text(60,40,"Du  ".date("d-m-Y"));

$h=50;
$pdf->SetFillColor(200 );
$pdf->SetXY(05,$h);
$pdf->cell(20,10,"Date Instal",1,0,1,'C',0);$pdf->cell(10,10,"Nbr",1,0,1,'C',0);
$pdf->cell(50,10,"Nom_Prenom",1,0,1,'C',0);
$pdf->cell(10,10,"Sexe",1,0,1,'C',0);
$pdf->cell(20,10,"Nee le",1,0,1,'C',0);
$pdf->cell(10,10,"Age",1,0,1,'C',0);
$pdf->cell(30,10,"Commune",1,0,1,'C',0);
$pdf->cell(70,10,"Adresse",1,0,1,'C',0);
$pdf->cell(66,10,"Type Structure ",1,0,1,'C',0);

$pdf->SetXY(05,$h+10); 
$pdf->mysqlconnect();
$pdf->SetFont('Arial', '',9, '', true);
$ordre=$_POST['ordre'];
$ascdesc=$_POST['ascdesc'];
$STRUCTURED=$_POST['STRUCTURED'];
$nbrlimit=$_POST['nbrlimit'];
$SEXE=$_POST['SEXE'];
$date=date("d-m-y");
if (isset($_POST['COMMUNE']) and $_POST['COMMUNE']!='') 
{
$commune="=".$_POST['COMMUNE'];
}
else
{
$commune="IS NOT NULL";
}
mysql_query("SET NAMES 'UTF8' ");
$query = "SELECT val,STRUCTURE,DATE,SEX,COMMUNE,UPPER(NOM) as NOM,PRENOM,ADRESSE,DNS,SPECIALITEX,round((DATEDIFF(CURDATE(),DNS )/365),1) AS years FROM structure where STRUCTURE $STRUCTURED AND SEX $SEXE  and commune $commune order by TRIM($ordre) $ascdesc limit $nbrlimit  ";  
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
$pdf->SetFillColor(200 );

if ($row->val==0) {
$pdf->cell(20,5,$pdf->dateUS2FR($row->DATE),1,0,'C',1,0);
} else {
$pdf->cell(20,5,$pdf->dateUS2FR($row->DATE),1,0,'C',0);
} 

$pdf->cell(10,5,date('Y')- substr($row->DATE,0,4),1,0,'C',0);
$pdf->cell(50,5,trim($row->NOM).'_'.strtolower (trim($row->PRENOM)),1,0,'L',0);
$pdf->cell(10,5,$row->SEX,1,0,'C',0);
$pdf->cell(20,5,$pdf->dateUS2FR($row->DNS),1,0,'C',0);
//$pdf->cell(10,5,date('Y')- substr($row->DNS,0,4),1,0,'C',0);
$pdf->cell(10,5,$row->years,1,0,'C',0);


$pdf->cell(30,5,$pdf->nbrtostring("com","IDCOM",$row->COMMUNE,"COMMUNE") 	,1,0,'L',0);
$pdf->cell(70,5,html_entity_decode(utf8_decode($row->ADRESSE)),1,0,'L',0);
if ($row->STRUCTURE==16) {
$pdf->cell(66,5,$pdf->nbrtostring("specialite","idspecialite",$row->SPECIALITEX,"specialitefr"),1,0,'L',0);
} else {
$pdf->cell(66,5,$pdf->nbrtostring("structurebis","id",$row->STRUCTURE,"structure"),1,0,'L',0);
}
$pdf->SetXY(5,$pdf->GetY()+5); 
}
$pdf->SetFillColor(200 );
$pdf->SetFont('Arial', '',10, '', true);  
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(40,05,"TOTAL",1,0,1,'C',0);	  
$pdf->SetXY(45,$pdf->GetY());$pdf->cell(246,05,$totalmbr1." STRUCTURES",1,1,1,'C',0);				 
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"LE PRATICIEN RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);	
$pdf->Output();
?>