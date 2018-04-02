<?php
require_once('inspection.php');
$pdf = new inspection('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->orderdemision("طيبة","رضا","طبيب مفتش في الصحة العمومية","الجلفـــــــــة",date('Y-m-d'),"نهاية المهمة","***************","***************","مهمة تفتيشية ");
$pdf->Output();
?>
