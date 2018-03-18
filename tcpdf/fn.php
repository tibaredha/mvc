<?php
if ($_GET['MODESORTI']!=='') {
require('PDF0.php');
$pdf = new PDF0( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->fichenavette($_GET['id'],$_GET['IDDNR']);
$pdf->Output();
}
else
{
header('location: ../Pat/view/'.$_GET['IDDNR']);
}

?>



