<?php
 require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('Questionnaire');
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
$pdf->SetXY(90,$pdf->GetY()+10);$pdf->Cell(100,5,'Le directeur de la santé et de la population de la wilaya de Djelfa',0,1,'C');
$pdf->SetXY(90,$pdf->GetY()+2.5);$pdf->Cell(100,5,'A',0,1,'C');
//***//
$pdf-> mysqlconnect(); 
$query_listey = "SELECT * FROM insp WHERE id  ='$id' ";
$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbry=mysql_num_rows($requetey);
while($rowy=mysql_fetch_object($requetey))
{
$pdf->SetXY(90,$pdf->GetY());$pdf->Cell(100,5,' Madame / Monsieur : '.strtoupper($pdf->nbrtostring('mvc','structure','id',$rowy->ids,'NOM'))."_".ucfirst($pdf->nbrtostring('mvc','structure','id',$rowy->ids,'PRENOM')),0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(100,5,'OBJET : A/S  Questionnaire ( avec accusé de réception )',0,1,'L');
$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(100,5,'REF : Inspection du '.$pdf->dateUS2FR($rowy->DATE).' : local de Mr '.strtoupper($pdf->nbrtostring('mvc','structure','id',$rowy->ids,'NOM'))."_".ucfirst($pdf->nbrtostring('mvc','structure','id',$rowy->ids,'PRENOM')),0,1,'L');
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->Cell(100,5,'Madame, Monsieur, ',0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(100,5,"Nous constatons avec regret les anomalies suivantes lors de l'inspection du  ".$pdf->dateUS2FR($rowy->DATE),0,1,'L');
$pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5,'au niveau de votre local : '.$pdf->nbrtostring('mvc','structurebis','id',$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'STRUCTURE'),'structure')." Commune de ".$pdf->nbrtostring('mvc','com','IDCOM',$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'COMMUNE'),'COMMUNE'),0,1,'L');
}
//***//
$query_listex = "SELECT * FROM inspection  WHERE idinsp  ='$id'  LIMIT 0,11";//
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbr2=mysql_num_rows($requetex);
$pdf->SetXY(30,$pdf->GetY()+5);
while($row=mysql_fetch_object($requetex))
{
$pdf->Cell(168,5,"- ".$row->ANOMALIE,0,1,'L',1,0); 
$pdf->SetXY(30,$pdf->GetY()+3);
}
//***//
$pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5,"C'est pourquoi, nous vous demandons de bien vouloir vous expliquer par écrit",0,1,'L');
$pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5," sur les faits mentionnés ci-dessus qui vous sont reprochés.",0,1,'L');


// $pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5,"En conséquence, nous vous mettons en demeure par la présente lettre de régler les anomalies ",0,1,'L');
// $pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5,"sus cites dans un délai de huit jours (08 jours) à compter de ce jour : ".$id2,0,1,'L');
// $pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5,"A défaut, nous serions contraints d'engager une sanction administrative à votre encontre, ",0,1,'L');
// $pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5,"Conformément à la législation et la réglementation en vigueur qui peut aller jusqu'a la fermeture définitive",0,1,'L');
// $pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5,"de votre local .",0,1,'L');
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->Cell(100,5,"Veuillez agréer, Madame, Monsieur, l'expression de nos salutations distinguées.",0,1,'L');
//***//
$pdf->SetXY(140,$pdf->GetY()+5);$pdf->Cell(50,5,'A Djelfa le : '.$id2,0,1,'L');
$pdf->SetXY(140,$pdf->GetY());$pdf->Cell(50,5," le Directeur  ",0,1,'C');
$pdf->SetXY(10,$pdf->GetY()-15);$pdf->Cell(100,5,'CT :',0,1,'L');
$pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5,'- Archives',0,1,'L');
$pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5,'- Section ordinale régionale blida ',0,1,'L');
$pdf->Output();
?>
