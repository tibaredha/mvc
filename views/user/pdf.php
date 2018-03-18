<?php
$IDP=$_GET["uc"];
require_once('tcpdf/config/lang/eng.php');
require_once('tcpdf/tcpdf.php');
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();
$pdf->SetFont('aefurat','B',14);
$pdf->Text(60,13,"RESUME STANDARD DE SORTIE ".$IDP);
$pdf->SetFont('aefurat','B',10);
$pdf->Rect(4,45,135,46,"d");
$pdf->Rect(6,47,64,15,"d");                      
$pdf->Rect(73,47,64,15,"d");
$pdf->Text(10,56,"MATRICULE:");                  
$pdf->Text(80,52,"N DOSSIER DANS SERVICE: ");
$pdf->Text(5,68,"NOM   ET  PRENOM : ");   
$pdf->Text(100,68,"SEXE:");
$pdf->Text(5,73,"DATE DE NAISSANCE: ");  
$pdf->Text(100,73,"AGE:");
$pdf->Text(5,78,"COMMUNE DE NAISSANCE: "); 
$pdf->Text(5,83,"WILAYAS DE RESIDENCE: ");  
$pdf->Text(5,88,"DATE D ADMISSION A L'HOPITAL: ");
// $pdf->Rect(4,91,135,10,"d");
$pdf->Output();
?>