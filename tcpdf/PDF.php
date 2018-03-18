<?php
require('PDF0.php');
$pdf = new PDF0( 'L', 'mm', 'A4',true,'UTF-8',false );
// $pdf->ENTETETCPDF();
$pdf->PROSDNRARA($_GET["uc"]);
?>
<?php 
//echo URL.'TCPDF/PDF.php?uc='.$value['id'];
?>



