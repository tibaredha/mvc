<?php
require('PDF0.php');
$pdf = new PDF0( 'P', 'mm', 'A4',true,'UTF-8',false );
// $pdf->ENTETETCPDF();$_GET["uc"]
//$pdf->PROSDNRARA('2');
?>
<?php 
//echo URL.'TCPDF/PDF.php?uc='.$value['id'];


$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->DEMHOS('','','','','','','','','','','');
//$pdf->MAJLIT($_GET["NOM"],$_GET["PRENOM"],$_GET["NLIT"]);
$pdf->Output();
?>



