<?php
 require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('Convocation');
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
$pdf->entete($id2);
//***//
$pdf-> mysqlconnect(); 
$query_listey = "SELECT * FROM insp WHERE id  ='$id' ";
$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbry=mysql_num_rows($requetey);
while($rowy=mysql_fetch_object($requetey))
{
$nom=strtoupper($pdf->nbrtostring('mvc','structure','id',$rowy->ids,'NOM'));
$prenom=ucfirst(strtolower($pdf->nbrtostring('mvc','structure','id',$rowy->ids,'PRENOM')));
$sexe=trim($pdf->nbrtostring('mvc','structure','id',$rowy->ids,'SEX'));
$dateinsp=substr($pdf->dateUS2FR($rowy->DATE), 0, 2);
$NATURE=$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'NATURE');
if($NATURE==1)
{
$pdf->SetXY(90,$pdf->GetY());$pdf->Cell(100,5,' Monsieur le directeur de : '.$nom."_".$prenom,0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(100,5,"OBJET :  Convocation ( avec accusé de réception )",0,1,'L');
$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(100,5,'REF : Inspection du '.$pdf->dateUS2FR($rowy->DATE).' : '.$nom."_".$prenom,0,1,'L');
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->Cell(100,5,'Monsieur, ',0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(100,5,"Nous constatons avec regret les anomalies suivantes lors de l'inspection du  ".$pdf->dateUS2FR($rowy->DATE),0,1,'L');
$pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5,'au niveau de votre  : '.$pdf->nbrtostring('mvc','structurebis','id',$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'STRUCTURE'),'structure')." Commune de ".$pdf->nbrtostring('mvc','com','IDCOM',$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'COMMUNE'),'COMMUNE'),0,1,'L');
}
else
{
$pdf->SetXY(90,$pdf->GetY());$pdf->Cell(100,5,' Madame / Monsieur : '.$nom."_".$prenom,0,1,'L');
$pdf->SetXY(10,$pdf->GetY()+5);$pdf->Cell(100,5,"OBJET :  Convocation ( avec accusé de réception )",0,1,'L');
$pdf->SetXY(10,$pdf->GetY());$pdf->Cell(100,5,'REF : Inspection du '.$pdf->dateUS2FR($rowy->DATE).' : local de Mme/Mr '.$nom."_".$prenom,0,1,'L');
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->Cell(100,5,'Madame, Monsieur, ',0,1,'L');
$pdf->SetXY(20,$pdf->GetY()+5);$pdf->Cell(100,5,"Nous constatons avec regret les anomalies suivantes lors de l'inspection du  ".$pdf->dateUS2FR($rowy->DATE),0,1,'L');
$pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5,'au niveau de votre local : '.$pdf->nbrtostring('mvc','structurebis','id',$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'STRUCTURE'),'structure')." Commune de ".$pdf->nbrtostring('mvc','com','IDCOM',$pdf->nbrtostring('mvc','structure','id',$rowy->ids,'COMMUNE'),'COMMUNE'),0,1,'L');
}
}
//***//
$query_listex = "SELECT * FROM inspection  WHERE idinsp  ='$id'  LIMIT 0,11";//
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
$totalmbr2=mysql_num_rows($requetex);
$pdf->SetXY(30,$pdf->GetY()+5);
$x=0;
while($row=mysql_fetch_object($requetex))
{
$x=$x+1;
$pdf->Cell(168,5,$x."- ".$row->ANOMALIE,0,1,'L',1,0); 
$pdf->SetXY(30,$pdf->GetY()+3);
}
//***//
$pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5,"Avant de prononcer une sanction administrative et afin d'entendre vos explications",0,1,'L');
$pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5,"et en application de la reglementation en vigueur,nous vous convoquons à un entretien préalable",0,1,'L');
$pdf->SetXY(20,$pdf->GetY());$pdf->Cell(100,5,"qui aura lieu le ............................. a 09:00 au siege de la Direction de la sante et de la population.",0,1,'L');
$pdf->SetXY(40,$pdf->GetY()+5);$pdf->Cell(100,5,"Veuillez agréer, Madame, Monsieur, l'expression de nos salutations distinguées.",0,1,'L');
//***//
$pdf->pied();
$pdf->Output($dateinsp.'_'.$nom.'_'.$prenom.'.PDF','I');
?>
