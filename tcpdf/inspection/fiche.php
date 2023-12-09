<?php
$id=$_GET["uc"]; 
require_once('inspection.php');
$pdf = new inspection();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('DECISION');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->AddPage();
$pdf->SetLineWidth(0.4);$pdf->setRTL(false);
$pdf-> mysqlconnect(); 
$query_listex = "SELECT * FROM structure WHERE id  ='$id' ";//
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$y=3;
$pdf->Rect(5, 5, 200, 285 ,'D');$pdf->Rect(5-1, 5-1, 200+2, 285+2 ,'D');
$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->repar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->mspar,0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$y=10;$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(200,5,'Fiche de renseignements',0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Nom : ".$rowx->NOM,0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Prénom : ".$rowx->PRENOM,0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Sexe :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Fils de :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Et De :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"NEC :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Date De Naissance : ",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Commune  :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Wilaya :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Commune  : ".$pdf->nbrtostring('mvc','comar','IDCOM',$rowx->COMMUNE,'COMMUNE'),0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"wilaya  :".$rowx->WILAYA,0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Adresse  : ".$rowx->ADRESSE,0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Tel   Fixe  :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Tel Portable  :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"E-mail  :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Situation familial  :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"NBR enfant   :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Situation vis-à-vis le Service national   :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Diplôme :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Date Obtention  :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Spécialité :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Numéro  d'inscription au tableau de l'ordre   :",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y+5);$pdf->Cell(50,5,"Bail de location ou acte de propriété",0,0,'L');
$pdf->SetXY(5,$pdf->GetY()+$y);$pdf->Cell(50,5,"Propriétaire :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Début contrat :",0,0,'L');$pdf->SetXY($pdf->GetX()+25,$pdf->GetY());$pdf->Cell(50,5,"Fin contrat :",0,0,'L');
}
$pdf->Output();
?>
