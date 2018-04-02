<?php
 require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('rapport inspection');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(250);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 12);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$id=$_GET["uc"];
$id1=$_GET["uc1"];  
$id2=$pdf->dateUS2FR($_GET["date"]); 
// $pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(200,5,$pdf->mspar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(200,5,$pdf->dspar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+2);$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');
$pdf->SetXY(90,$pdf->GetY()+5);$pdf->Cell(100,5,'A',0,1,'C');
$pdf->SetXY(90,$pdf->GetY()+2.5);$pdf->Cell(100,5,'Mr Le directeur de la santé et de la population de la wilaya de Djelfa',0,1,'C');
$pdf-> mysqlconnect(); 

$query_listey = "SELECT * FROM insp WHERE id  ='$id' ";
$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbry=mysql_num_rows($requetey);

while($rowy=mysql_fetch_object($requetey))
{
	$sexe=trim($pdf->nbrtostring('mvc','structure','id',$rowy->ids,'SEX'));
	if ($sexe =='M') {
		$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(100,5,'OBJET : A/S inspection du local de Mr '.$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'NOM')."_".$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'PRENOM'),0,1,'L');
	} else {
	   $pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(100,5,'OBJET : A/S inspection du local de Mlle/Mme '.$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'NOM')."_".$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'PRENOM'),0,1,'L');
	}
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(100,5,'REF : '.$rowy->REF,0,1,'L');
	$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(100,5,'PJ : '.$rowy->PJ,0,1,'L');

	if ($rowy->STRUCTURE==3 or $rowy->STRUCTURE==4 or $rowy->STRUCTURE==5 or $rowy->STRUCTURE==6 or $rowy->STRUCTURE==7 or $rowy->STRUCTURE==8 or $rowy->STRUCTURE==9) {
		$pdf->SetXY(30,$pdf->GetY()+5);$pdf->Cell(100,5,"Suite à l'inspection effectuée  le  ".$pdf->dateUS2FR($rowy->DATE)."  au niveau de la ".$pdf->nbrtostring('mvc','structurebis','id',$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'STRUCTURE'),'structure'),0,1,'L');
	} 
	if ($rowy->STRUCTURE==12 or $rowy->STRUCTURE==13 or $rowy->STRUCTURE==14 or $rowy->STRUCTURE==15 or $rowy->STRUCTURE==16 or $rowy->STRUCTURE==17 or $rowy->STRUCTURE==18 or $rowy->STRUCTURE==19 or $rowy->STRUCTURE==20 or $rowy->STRUCTURE==21 or $rowy->STRUCTURE==23 or $rowy->STRUCTURE==24 ) {
		if ($sexe =='M') {
		 $pdf->SetXY(25,$pdf->GetY()+5);$pdf->Cell(100,5,"Suite à l'inspection effectuée  le  ".$pdf->dateUS2FR($rowy->DATE)."  au niveau  du local de Mr ".$pdf->nbrtostring('mvc','structure','id',$id1,'NOM')."_".$pdf->nbrtostring('mvc','structure','id',$id1,'PRENOM'),0,1,'L');
		}
		else {
		 $pdf->SetXY(25,$pdf->GetY()+5);$pdf->Cell(100,5,"Suite à l'inspection effectuée  le  ".$pdf->dateUS2FR($rowy->DATE)."  au niveau  du local de Mlle/Mme ".$pdf->nbrtostring('mvc','structure','id',$id1,'NOM')."_".$pdf->nbrtostring('mvc','structure','id',$id1,'PRENOM'),0,1,'L');
		}
		$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(100,5,$pdf->nbrtostring('mvc','structurebis','id',$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'STRUCTURE'),'structure'),0,1,'L');
	}
	$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(100,5,"Adresse : Commune de ".$pdf->nbrtostring('mvc','com','IDCOM',$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'COMMUNE'),'COMMUNE').' Wilaya de Djelfa ',0,1,'L');
	$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(100,5,'On a constaté ce qui suit :',0,1,'L');
}
$query_listex = "SELECT * FROM inspection  WHERE idinsp  ='$id'  LIMIT 0,11";//
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbr2=mysql_num_rows($requetex);
$pdf->SetXY(25,$pdf->GetY()+5);
while($row=mysql_fetch_object($requetex))
{
	$pdf->Cell(168,5,"- ".$row->ANOMALIE,0,1,'L',1,0); 
	$pdf->SetXY(25,$pdf->GetY()+3);
}

if ($totalmbr2==0) 
{
	$pdf->SetXY(30,$pdf->GetY()-5);$pdf->Cell(100,5,'- aucune anomalie constaté ce jour.',0,1,'L');
	$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(100,5,'Conclusion',0,1,'L');
	$pdf->SetXY(25,$pdf->GetY()+2);$pdf->Cell(100,5,'respect de la réglementation en vigueur.',0,1,'L');
} else {
	$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(100,5,'Conclusion',0,1,'L');
	$pdf->SetXY(25,$pdf->GetY()+2);$pdf->Cell(100,5,'Non respect de la réglementation en vigueur.',0,1,'L');
}
$pdf->SetXY(140,$pdf->GetY()+10);$pdf->Cell(50,5,'A Djelfa le : '.$id2,0,1,'L');
$pdf->SetXY(140,$pdf->GetY());$pdf->Cell(50,5," L'enquêteur ",0,1,'C');
$pdf->SetXY(140,$pdf->GetY());$pdf->Cell(50,5," Dr TIBA ",0,1,'C');
$pdf->SetXY(5,$pdf->GetY()-15);$pdf->Cell(100,5,'CT :',0,1,'L');
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(100,5,'- Archives',0,1,'L');

$pdf->Output();
?>
