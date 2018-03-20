<?php
require('INSPECTION1.php');
$pdf = new INSPECTION1( 'L', 'mm', 'A4' );$pdf->AliasNbPages();//importatant pour metre en fonction  le totale nombre de page avec "/{nb}" 
$ids=$_GET['uc'];
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
$pdf->Text(05,30,"INSPECTION SANTE PUBLIQUE");
$pdf->Text(05,35,"N ... /".date('Y'));
$pdf->Text(60,35,"Fiche inspection : ".$pdf->nbrtostring('structure','id',$ids,'NOM').'_'.$pdf->nbrtostring('structure','id',$ids,'PRENOM') );
$pdf->Text(60,40,"Du  ".date("d-m-Y"));
$h=50;
$pdf->SetFillColor(200);
$pdf->SetXY(05,$h);
$pdf->cell(40,10,"Date inspection ",1,0,1,'C',0);
$pdf->cell(206,10,"Anomalies constatés",1,0,'C',1,0);
$pdf->cell(40,10,"Corrigées",1,0,'C',1,0);
$pdf->SetXY(05,$h+15); 
$pdf->mysqlconnect();
$pdf->SetFont('Arial', '',9, '', true);
mysql_query("SET NAMES 'UTF8' ");
$query = "SELECT * FROM insp where ids=$ids ORDER BY DATE ";//      
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{

        mysql_query("SET NAMES 'UTF8' ");
		$query1 = "SELECT * FROM inspection where DATE='$row->DATE' and ids ='$row->ids' ORDER BY id"; 
		$resultat1=mysql_query($query1);
		$totalmbr11=mysql_num_rows($resultat1);

		$pdf->SetFillColor(250);
		$pdf->cell(40,(5*$totalmbr11)+10,$pdf->dateUS2FR($row->DATE),1,0,'C',1,0);
		$pdf->cell(206,5,"Anomalies",1,0,1,'L',0);
		$pdf->cell(40,5,"Corrigées",1,0,1,'L',0);
		
		$pdf->SetXY(45,$pdf->GetY()+5); 
		
		while($row1=mysql_fetch_object($resultat1))
		{
		$pdf->SetFillColor(250);
		$pdf->cell(206,5,$row1->ANOMALIE,1,0,'L',0);
		
		if ($row1->ETAT==0) 
		{
		$pdf->cell(40,5,"Non",1,0,'C',0);
		}
		else
		{
		$pdf->cell(40,5,"Oui",1,0,'C',0);
		}
		$pdf->SetXY(45,$pdf->GetY()+5); 
		}
		$pdf->SetFillColor(250);
		$pdf->SetFont('Arial', '',10, '', true);  
		$pdf->SetXY(45,$pdf->GetY());$pdf->cell(246,05,"total : ".$totalmbr11." anomalie(s)",1,1,1,'C',0);

$pdf->SetXY(5,$pdf->GetY()+5); 

$query2 = "SELECT * FROM inspection where ids='$row->ids' "; 
$resultat2=mysql_query($query2);
$totalmbr2=mysql_num_rows($resultat2);
}
if (isset($totalmbr2)){
$totalmbrx=$totalmbr2;
} else {
$totalmbrx='';
}

$pdf->SetFillColor(200);
$pdf->SetFont('Arial', '',10, '', true);  
$pdf->SetXY(5,$pdf->GetY());$pdf->cell(40,05,"TOTAL",1,0,1,'C',0);	  
$pdf->SetXY(45,$pdf->GetY());$pdf->cell(123,05,$totalmbr1." inspection(s)",1,1,1,'C',0);
$pdf->SetXY(45+123,$pdf->GetY()-5);$pdf->cell(123,05,$totalmbrx." anomalie(s)",1,1,1,'C',0);	
			 
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"Le Praticien Inspecteur Responsable ",0,0,'L',0);
$pdf->SetXY(190,$pdf->GetY()+5); $pdf->cell(90,10,"DR R.TIBA ",0,0,'L',0);
$pdf->Output();
?>