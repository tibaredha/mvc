<?php
$ids=$_GET["ids"]; 
$idh=$_GET["idh"]; 
require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('dossier_medecin');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 12);$pdf->SetAutoPageBreak(TRUE, 0);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetLineWidth(0.4);
$pdf-> mysqlconnect(); 
$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";
$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );
while($rowx=mysql_fetch_object($requetex))
{
$num=$rowx->NREALISATION;
$date=$rowx->REALISATION;
$num1=$rowx->NOUVERTURE;
$date1=$rowx->OUVERTURE;
$nom=$rowx->NOM;
$prenom=$rowx->PRENOM;
$nomar=$rowx->NOMAR;$prenomar=$rowx->PRENOMAR;
$nomfr=$rowx->NOM;$prenomfr=$rowx->PRENOM;
$sexe=$rowx->SEX;
$DNS=$rowx->DNS;
$Mobile=$rowx->Mobile;
$DIPLOME=$rowx->DIPLOME;
$UNIV=$rowx->UNIV;
$NUMORDER=$rowx->NUMORDER;
$DATEORDER=$rowx->DATEORDER;
$NUMDEM=$rowx->NUMDEM;
$DATEDEM=$rowx->DATEDEM;

}

$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );//
while($rowy=mysql_fetch_object($requetey))
{
$NUMD=$rowy->NUMD;
$DATED=$rowy->DATED;
$DATEP=$rowy->DATEP;
$NAT=$rowy->NAT;
$PHA1=$rowy->PHA1;
$PHA2=$rowy->PHA2;
$PHA3=$rowy->PHA3;
$DIST1=$rowy->DIST1;
$DIST2=$rowy->DIST2;
$DIST3=$rowy->DIST3;
$CDS0=$rowy->CDS0;
$SDS0=$rowy->SDS0;
$SAH0=$rowy->SAH0;
$SAF0=$rowy->SAF0;
$SAN0=$rowy->SAN0;
$STL=$rowy->STL;
$adresse=$rowy->ADRESSE;
$adressear=$rowy->ADRESSEAR;
$idcommune=$rowy->COMMUNE;
$commune=$pdf->nbrtostring('mvc','comar','IDCOM',$rowy->COMMUNE,'COMMUNE');
$communear=$pdf->nbrtostring('mvc','comar','IDCOM',$rowy->COMMUNE,'communear');
$wilaya=$pdf->nbrtostring('mvc','wil','IDWIL',$rowy->WILAYA,'WILAYAS');;
}
//$pdf->dossierehp0($DATEP);
$pdf->AddPage();$pdf->SetFont('aefurat', '', 12);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->repfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->mspfr,0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspar,0,1,'C');$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->dspfr,0,1,'C');
$pdf->setRTL($enable=true, $resetx=true);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(140,5,'مصلحة الهياكل و النشاط الصحي',0,0,'R');$pdf->cell(50,5,"",0,1,'L',0,0);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(140,5,'الرقم : .........../ م ص س / '.date('Y'),0,0,'R');
$pdf->SetXY(85,$pdf->GetY()+5);$pdf->Cell(120,5,'السيد مدير الصحة و الســـــــــكان',0,1,'C');
$pdf->SetXY(85,$pdf->GetY()+2);$pdf->Cell(120,5,'الى',0,1,'C');
$pdf->SetXY(85,$pdf->GetY()+2);$pdf->Cell(120,5,' السيـــــــــد ( ة ) : '.$nomar.' - '.$prenomar,0,1,'C');
$pdf->SetXY(85,$pdf->GetY()+2);$pdf->Cell(120,5,$adressear. ' بلدية : '.$communear ,0,1,'C');
$pdf->SetXY(85,$pdf->GetY()+2);$pdf->Cell(120,5,'Tel : '.$Mobile ,0,1,'C');
$pdf->dossierehp1($NUMD,$DATED,$NAT,$communear,$sexe,"مؤسسة إستشفائية خاصة ");
$pdf->Output($nomfr.'_'.$prenomfr.'.pdf','I');
?>
