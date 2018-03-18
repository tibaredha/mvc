<?php
if ($_GET['MODESORTI']=='') {
require('PDF0.php');
$pdf = new PDF0( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->HOSPOBS($_GET["id"],$_GET["IDDNR"]);
}
else
{
header('location: ../Pat/view/'.$_GET['IDDNR']);
}
?>




