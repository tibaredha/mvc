<?php
require('INSPECTION1.php');
$pdf = new INSPECTION1( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$idt=$_GET['uc'];

$date=date("d-m-y");
$pdf->SetFillColor(230);//fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);//text noire
$pdf->SetFont('Times', 'B', 10);
$pdf->AddPage('L','A4');
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('Arial','B',10);
$pdf->Text(90,10,"REPUBLIQUE ALGERIENNE DEMOCRATIQUE ET POPULAIRE");
$pdf->Text(70,15,"MINISTERE DE LA SANTE ");
$pdf->Text(75,20,"DIRECTION DE LA SANTE ET DE LA POPULATION DE LA WILAYA DE DJELFA");

$pdf->Text(240,25," LE : ".date('d-m-Y'));
$pdf->Text(05,30,"INSPECTION SANTE PUBLIQUE");
$pdf->Text(05,35,"N ... /".date('Y'));
$pdf->Text(60,35,"Fiche personnels : ".$pdf->nbrtostring('structure','id',$idt,'NOM').'_'.$pdf->nbrtostring('structure','id',$idt,'PRENOM') );
$pdf->Text(60,40,"Du  ".date("d-m-Y"));

$h=50;
$pdf->SetFillColor(200 );
$pdf->SetXY(05,$h);
$pdf->cell(10,10,"N°",1,0,1,'C',0);
$pdf->cell(45,10,"NOMFR",1,0,'C',1,0);
$pdf->cell(45,10,"PRENOMFR",1,0,'C',1,0);
$pdf->cell(30,10,"Categorie",1,0,'C',1,0);
$pdf->cell(45,10,"SPECIALITE",1,0,'C',1,0);
$pdf->cell(30,10,"CASNOS",1,0,'C',1,0);
$pdf->cell(35,10,"DEBUTCONTRAT",1,0,'C',1,0);
$pdf->cell(35,10,"FINCONTRAT",1,0,'C',1,0);
$pdf->cell(10,10,"ETAT",1,0,'C',1,0);
$pdf->SetXY(05,$h+10); 
$pdf->mysqlconnect();
$pdf->SetFont('Arial', '',9, '', true);
mysql_query("SET NAMES 'UTF8' ");
$query = "SELECT * FROM pers where idt=$idt ORDER BY NOMFR ";//      
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
$x=0;
while($row=mysql_fetch_object($resultat))
{
$pdf->SetFillColor(200 );
$pdf->cell(10,5,$x=$x+1,1,0,'C',0);
$pdf->cell(45,5,$row->NOMFR,1,0,'L',0);
$pdf->cell(45,5,$row->PRENOMFR,1,0,'L',0);
$pdf->cell(30,5,$row->Categorie,1,0,'C',0);
$pdf->cell(45,5,$pdf->nbrtostring("specialite","idspecialite",$row->SPECIALITE,"specialitefr"),1,0,'L',0);
$pdf->cell(30,5,$row->CASNOS,1,0,'C',0);
$pdf->cell(35,5,$pdf->dateUS2FR($row->DEBUTCONTRAT),1,0,'C',0);
$pdf->cell(35,5,$pdf->dateUS2FR($row->FINCONTRAT),1,0,'C',0);
if($row->ETAT==0){
$pdf->cell(10,5,"ok",1,0,'C',0); 	
}
else{
$pdf->SetFillColor(200 );	
$pdf->cell(10,5,"***",1,0,'C',1,0); 	
}
$pdf->SetXY(5,$pdf->GetY()+5); 
}
$pdf->SetFillColor(200);
$pdf->SetFont('Arial', '',10, '', true);  
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(40,05,"TOTAL",1,0,1,'C',0);	  
$pdf->SetXY(45,$pdf->GetY());$pdf->cell(245,05,$totalmbr1." personnels",1,1,1,'C',0);				 
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"LE PRATICIEN INSPECTEUR RESPONSABLE ",0,0,'L',0);
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);
$pdf->Output();
?>