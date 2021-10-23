<?php
$ids=$_GET["ids"]; 
$idh=$_GET["idh"];  
require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('tiba redha');
$pdf->SetTitle('ouverture_medecin');
$pdf->SetSubject('PROTOCOLE');
$pdf->SetFillColor(230);    //fond gris il faut ajouter au cell un autre parametre pour qui accepte la coloration
$pdf->SetTextColor(0,0,0);  //text noire 0   //text BLEU 180 
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('aefurat', 'B', 16);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->AddPage();
$pdf->SetLineWidth(0.4);
$pdf-> mysqlconnect(); 
$query_listex = "SELECT * FROM structure WHERE id  ='$ids' ";$requetex = mysql_query( $query_listex ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );//
while($rowx=mysql_fetch_object($requetex))
{
$num=$rowx->NREALISATION;$date=$rowx->REALISATION;
$num1=$rowx->NOUVERTURE;$date1=$rowx->OUVERTURE;
$nomar=$rowx->NOMAR;$prenomar=$rowx->PRENOMAR;$nomfr=$rowx->NOM;$prenomfr=$rowx->PRENOM;
$adresse=$rowx->ADRESSEAR;$commune=$pdf->nbrtostring('mvc','comar','IDCOM',$rowx->COMMUNE,'communear');$wilaya=$rowx->WILAYA;
$DIPLOME=$rowx->DIPLOME;$UNIV=$rowx->UNIV;
$NUMORDER=$rowx->NUMORDER;$DATEORDER=$rowx->DATEORDER;
$NUMDEM=$rowx->NUMDEM;$DATEDEM=$rowx->DATEDEM;
}
$query_listey = "SELECT * FROM home WHERE id  ='$idh' ";$requetey = mysql_query( $query_listey ) or die( "ERREUR MYSQL numéro: ".mysql_errno()."<br>Type de cette erreur: ".mysql_error()."<br>\n" );//
while($rowy=mysql_fetch_object($requetey))
{
$NUMD=$rowy->NUMD;
$DATED=$rowy->DATED;
$DATEP=$rowy->DATEP;
$adressen=$rowy->ADRESSEAR;$communen=$pdf->nbrtostring('mvc','comar','IDCOM',$rowy->COMMUNE,'communear');$wilayan=$rowy->WILAYA;
}
//*************************************************************************************************************************//
$pdf->entetedecision("مقررة ترخيص بفتح عيادة طبية عامة ",$DATEP);
//*************************************************************************************************************************//
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->loi18_11,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->decret92_276,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->decret97_261,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->instruction112_87_m,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,$pdf->instruction06_98,0,1,'R');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"- بمقتضى التعليمة الوزارية رقم 01 المؤرخة في 1999/01/20 المتعلقة بالممارسة في القطاع الخاص لمهنيي الصحة ",0,1,'R');$pdf->SetFont('aefurat', '', 12);
$pdf->u_diplome ($pdf->diplome17,$DIPLOME,$UNIV,$nomar,$prenomar);
$pdf->c_order($pdf->ordre17,$NUMORDER,$DATEORDER);
$pdf->demande($NUMD,$DATED,"بفتح","العامة",1,$adressen,$communen);
$pdf->conformite($DATEP);
//*************************************************************************************************************************//
$pdf->propositiondecision();
//*************************************************************************************************************************//
$pdf->decision_a_o($nomar,$prenomar,$adressen,$communen);
$pdf->n_transfert($pdf->article_2);
$pdf->date_effet($pdf->article_3);
$pdf->execution($pdf->article_4);
$pdf->ctdecision($nomfr,$prenomfr,$DATEP);
$pdf->Output($nomfr.'_'.$prenomfr.'.pdf','I');
?>